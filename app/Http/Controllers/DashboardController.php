<?php

namespace App\Http\Controllers;

use App\Models\HasilKuis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', $this->getDashboardData());
    }

    private function getDashboardData(): array
    {
        // Statistik utama
        $totalMateri = Schema::hasTable('materi')
            ? DB::table('materi')->count()
            : 0;

        $totalKuis = Schema::hasTable('kuis')
            ? DB::table('kuis')->count()
            : 0;

        $totalPaket = Schema::hasTable('paket_penyuluhans')
            ? DB::table('paket_penyuluhans')->count()
            : 0;

        $totalUser = Schema::hasTable('users')
            ? DB::table('users')->count()
            : 0;

        if (Schema::hasTable('penyuluh')) {
            $totalPenyuluh = DB::table('penyuluh')->count();
        } elseif (
            Schema::hasTable('users') &&
            Schema::hasColumn('users', 'role')
        ) {
            $totalPenyuluh = DB::table('users')
                ->where('role', 'penyuluh')
                ->count();
        } else {
            $totalPenyuluh = 0;
        }

        // Statistik hasil kuis
        $totalPeserta = 0;
        $rataRataNilai = 0;
        $nilaiTertinggi = 0;
        $jumlahLulus = 0;
        $jumlahRemedial = 0;
        $belumMengerjakan = 0;

        if (Schema::hasTable('hasil_kuis')) {
            $totalPeserta = HasilKuis::count();

            $rataRataNilai = round(
                (float) HasilKuis::avg('skor'),
                1
            );

            $nilaiTertinggi = (int) (
                HasilKuis::max('skor') ?? 0
            );

            $jumlahLulus = HasilKuis::whereRaw(
                'LOWER(status) = ?',
                ['lulus']
            )->count();

            $jumlahRemedial = HasilKuis::whereRaw(
                'LOWER(status) = ?',
                ['remedial']
            )->count();

            $belumMengerjakan = HasilKuis::whereRaw(
                'LOWER(status) = ?',
                ['belum']
            )->count();
        }

        // Grafik hasil kuis per bulan pada tahun berjalan
        $namaBulan = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'Mei',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Agu',
            9 => 'Sep',
            10 => 'Okt',
            11 => 'Nov',
            12 => 'Des',
        ];

        $tahun = now()->year;
        $hasilBulanan = collect();

        if (Schema::hasTable('hasil_kuis')) {
            $hasilBulanan = DB::table('hasil_kuis')
                ->selectRaw(
                    'MONTH(tanggal) AS bulan, COUNT(*) AS total'
                )
                ->whereYear('tanggal', $tahun)
                ->groupByRaw('MONTH(tanggal)')
                ->pluck('total', 'bulan');
        }

        $pesertaBulanan = [];

        foreach ($namaBulan as $nomor => $nama) {
            $pesertaBulanan[] = [
                'bulan' => $nama,
                'total' => (int) ($hasilBulanan[$nomor] ?? 0),
            ];
        }

        // Materi berdasarkan kategori
        $kategoriMateri = collect();

        if (
            Schema::hasTable('materi') &&
            Schema::hasTable('kategoris') &&
            Schema::hasColumn('materi', 'kategori_id')
        ) {
            $kategoriMateri = DB::table('kategoris')
                ->leftJoin(
                    'materi',
                    'kategoris.id',
                    '=',
                    'materi.kategori_id'
                )
                ->select(
                    'kategoris.id',
                    'kategoris.nama_kategori'
                )
                ->selectRaw('COUNT(materi.id) AS total')
                ->groupBy(
                    'kategoris.id',
                    'kategoris.nama_kategori'
                )
                ->orderBy('kategoris.nama_kategori')
                ->get();
        }

        // Materi terbaru
        $recentMateri = collect();

        if (Schema::hasTable('materi')) {
            $queryMateri = DB::table('materi');

            $queryMateri->orderByDesc(
                Schema::hasColumn('materi', 'created_at')
                    ? 'created_at'
                    : 'id'
            );

            $recentMateri = $queryMateri
                ->limit(5)
                ->get();
        }

        // Hasil kuis terbaru
        $hasilKuisTerbaru = collect();

        if (Schema::hasTable('hasil_kuis')) {
            $hasilKuisTerbaru = HasilKuis::orderByDesc('tanggal')
                ->orderByDesc('id')
                ->limit(5)
                ->get();
        }

        return [
            'tahun' => $tahun,
            'totalMateri' => $totalMateri,
            'totalKuis' => $totalKuis,
            'totalPaket' => $totalPaket,
            'totalUser' => $totalUser,
            'totalPenyuluh' => $totalPenyuluh,

            'totalPeserta' => $totalPeserta,
            'rataRataNilai' => $rataRataNilai,
            'nilaiTertinggi' => $nilaiTertinggi,
            'jumlahLulus' => $jumlahLulus,
            'jumlahRemedial' => $jumlahRemedial,
            'belumMengerjakan' => $belumMengerjakan,

            'pesertaBulanan' => $pesertaBulanan,
            'kategoriMateri' => $kategoriMateri,
            'recentMateri' => $recentMateri,
            'hasilKuisTerbaru' => $hasilKuisTerbaru,
        ];
    }

    public function data()
    {
        return response()->json([
            'success' => true,
            'data' => $this->getDashboardData(),
            'updated_at' => now()->format('H:i:s'),
        ]);
    }
}
