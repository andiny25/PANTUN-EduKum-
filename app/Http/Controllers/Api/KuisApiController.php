<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kuis;
use App\Models\HasilKuis;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class KuisApiController extends Controller
{
    /**
     * Daftar kuis aktif.
     */
    public function index(): JsonResponse
    {
        $kuis = Kuis::with('kategori')
            ->withCount('soal')
            ->where('status', 'Aktif')
            ->latest()
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'judul' => $item->judul,
                    'kategori_id' => $item->kategori_id,
                    'kategori' => $item->kategori?->nama_kategori,
                    'jumlah_soal' => $item->soal_count,
                    'status' => $item->status,
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Daftar kuis berhasil diambil.',
            'total' => $kuis->count(),
            'data' => $kuis,
        ]);
    }

    /**
     * Detail kuis dan pilihan jawaban.
     * Kunci jawaban tidak dikirim ke aplikasi.
     */
    public function show(string $id): JsonResponse
    {
        $kuis = Kuis::with(['kategori', 'soal'])
            ->where('status', 'Aktif')
            ->findOrFail($id);

        $dataSoal = $kuis->soal->map(function ($soal) {
            return [
                'id' => $soal->id,
                'pertanyaan' => $soal->pertanyaan,
                'pilihan' => [
                    'A' => $soal->pilihan_a,
                    'B' => $soal->pilihan_b,
                    'C' => $soal->pilihan_c,
                    'D' => $soal->pilihan_d,
                ],
                'kesulitan' => $soal->kesulitan,
                'poin' => $soal->poin,
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'Detail kuis berhasil diambil.',
            'data' => [
                'id' => $kuis->id,
                'judul' => $kuis->judul,
                'kategori_id' => $kuis->kategori_id,
                'kategori' => $kuis->kategori?->nama_kategori,
                'jumlah_soal' => $dataSoal->count(),
                'soal' => $dataSoal,
            ],
        ]);
    }

    /**
     * Menerima jawaban dan menyimpan hasil kuis siswa.
     */
    public function submit(Request $request, string $id): JsonResponse
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'sekolah' => 'required|string|max:255',
            'jawaban' => 'required|array',
        ]);

        $kuis = Kuis::with('soal')
            ->where('status', 'Aktif')
            ->findOrFail($id);

        $daftarSoal = $kuis->soal;

        if ($daftarSoal->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Kuis belum memiliki soal.',
            ], 422);
        }

        $jawabanSiswa = $validated['jawaban'];

        $idSoalValid = $daftarSoal->pluck('id')
            ->map(fn ($idSoal) => (string) $idSoal)
            ->all();

        foreach ($jawabanSiswa as $idSoal => $pilihan) {
            if (
                !in_array((string) $idSoal, $idSoalValid, true) ||
                !is_string($pilihan) ||
                !in_array(strtoupper(trim($pilihan)), ['A', 'B', 'C', 'D'], true)
            ) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data jawaban tidak valid.',
                ], 422);
            }
        }

        $jumlahBenar = 0;
        $totalSoal = $daftarSoal->count();

        foreach ($daftarSoal as $soal) {
            $pilihanSiswa = strtoupper(trim(
                (string) ($jawabanSiswa[$soal->id] ?? '')
            ));

            $kunciJawaban = trim((string) $soal->jawaban_benar);

            $opsi = [
                'A' => trim((string) $soal->pilihan_a),
                'B' => trim((string) $soal->pilihan_b),
                'C' => trim((string) $soal->pilihan_c),
                'D' => trim((string) $soal->pilihan_d),
            ];

            $kunciHuruf = strtoupper($kunciJawaban);

            $benar = in_array($kunciHuruf, ['A', 'B', 'C', 'D'], true)
                ? $pilihanSiswa === $kunciHuruf
                : isset($opsi[$pilihanSiswa]) &&
                    $opsi[$pilihanSiswa] === $kunciJawaban;

            if ($benar) {
                $jumlahBenar++;
            }
        }

        $skor = round(($jumlahBenar / $totalSoal) * 100, 2);
        $status = $skor >= 75 ? 'Lulus' : 'Remedial';

        $hasil = DB::transaction(function () use (
            $validated, $kuis, $skor, $status
        ) {
            return HasilKuis::create([
                'nama_siswa' => $validated['nama_siswa'],
                'sekolah' => $validated['sekolah'],
                'kuis' => $kuis->judul,
                'skor' => $skor,
                'status' => $status,
                'tanggal' => now()->toDateString(),
            ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Kuis berhasil dikumpulkan.',
            'data' => [
                'id_hasil' => $hasil->id,
                'nama_siswa' => $hasil->nama_siswa,
                'sekolah' => $hasil->sekolah,
                'kuis' => $hasil->kuis,
                'jumlah_soal' => $totalSoal,
                'jumlah_benar' => $jumlahBenar,
                'jumlah_salah' => $totalSoal - $jumlahBenar,
                'skor' => $skor,
                'status' => $status,
                'tanggal' => $hasil->tanggal,
            ],
        ]);
    }
}
