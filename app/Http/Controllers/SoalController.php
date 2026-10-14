<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuis;
use App\Models\Soal;

class SoalController extends Controller
{
    // =====================================================
    // DAFTAR SOAL
    // =====================================================

    public function index($id)
    {
        $kuis = Kuis::with('kategori')
            ->findOrFail($id);

        $soal = Soal::where(
                'kuis_id',
                $id
            )
            ->latest()
            ->get();

        return view(
            'kuis.show',
            compact(
                'kuis',
                'soal'
            )
        );
    }


    // =====================================================
    // FORM TAMBAH SOAL
    // =====================================================

    public function create($id)
    {
        $kuis = Kuis::findOrFail($id);

        // Hitung jumlah soal yang sudah dibuat
        $jumlahSoalSaatIni =
            Soal::where(
                'kuis_id',
                $kuis->id
            )->count();


        // =================================================
        // CEK TARGET
        // =================================================

        if (
            $jumlahSoalSaatIni
            >= $kuis->jumlah_soal
        ) {

            return redirect()
                ->route(
                    'soal.index',
                    $kuis->id
                )
                ->with(
                    'error',
                    'Jumlah soal sudah mencapai target ' .
                    $kuis->jumlah_soal .
                    ' soal.'
                );
        }


        return view(
            'soal.create',
            compact(
                'kuis',
                'jumlahSoalSaatIni'
            )
        );
    }


    // =====================================================
    // SIMPAN SOAL
    // =====================================================

    public function store(
        Request $request,
        $id
    ) {

        $kuis = Kuis::findOrFail($id);


        // =================================================
        // HITUNG SOAL SAAT INI
        // =================================================

        $jumlahSoalSaatIni =
            Soal::where(
                'kuis_id',
                $kuis->id
            )->count();


        // =================================================
        // CEK TARGET SEBELUM SIMPAN
        // =================================================

        if (
            $jumlahSoalSaatIni
            >= $kuis->jumlah_soal
        ) {

            return redirect()
                ->route(
                    'soal.index',
                    $kuis->id
                )
                ->with(
                    'error',
                    'Jumlah soal sudah mencapai target ' .
                    $kuis->jumlah_soal .
                    ' soal.'
                );
        }


        // =================================================
        // VALIDASI
        // =================================================

        $request->validate([

            'pertanyaan' =>
                'required|string',

            'pilihan_a' =>
                'required|string',

            'pilihan_b' =>
                'required|string',

            'pilihan_c' =>
                'required|string',

            'pilihan_d' =>
                'required|string',

            'jawaban_benar' =>
                'required|in:A,B,C,D',

            'kesulitan' =>
                'required|in:Mudah,Sedang,Sulit',

        ], [

            'pertanyaan.required' =>
                'Pertanyaan wajib diisi.',

            'pilihan_a.required' =>
                'Pilihan A wajib diisi.',

            'pilihan_b.required' =>
                'Pilihan B wajib diisi.',

            'pilihan_c.required' =>
                'Pilihan C wajib diisi.',

            'pilihan_d.required' =>
                'Pilihan D wajib diisi.',

            'jawaban_benar.required' =>
                'Jawaban benar wajib dipilih.',

            'kesulitan.required' =>
                'Tingkat kesulitan wajib dipilih.',

        ]);


        // =================================================
        // SIMPAN SOAL
        // =================================================

        Soal::create([

            'kuis_id' =>
                $kuis->id,

            'pertanyaan' =>
                $request->pertanyaan,

            'pilihan_a' =>
                $request->pilihan_a,

            'pilihan_b' =>
                $request->pilihan_b,

            'pilihan_c' =>
                $request->pilihan_c,

            'pilihan_d' =>
                $request->pilihan_d,

            'jawaban_benar' =>
                $request->jawaban_benar,

            'kesulitan' =>
                $request->kesulitan,

            'poin' =>
                10,

        ]);


        // =================================================
        // PENTING
        // =================================================
        //
        // JANGAN UPDATE jumlah_soal DI SINI.
        //
        // jumlah_soal adalah TARGET.
        //
        // Jumlah soal yang sudah dibuat dihitung dari
        // tabel soal.
        //


        return redirect()
            ->route(
                'soal.index',
                $kuis->id
            )
            ->with(
                'success',
                'Soal berhasil ditambahkan.'
            );
    }


    // =====================================================
    // FORM EDIT SOAL
    // =====================================================

    public function edit($id)
    {
        $soal = Soal::findOrFail($id);

        $kuis = Kuis::findOrFail(
            $soal->kuis_id
        );


        return view(
            'soal.edit',
            compact(
                'soal',
                'kuis'
            )
        );
    }


    // =====================================================
    // UPDATE SOAL
    // =====================================================

    public function update(
        Request $request,
        $id
    ) {

        $soal = Soal::findOrFail($id);


        $request->validate([

            'pertanyaan' =>
                'required|string',

            'pilihan_a' =>
                'required|string',

            'pilihan_b' =>
                'required|string',

            'pilihan_c' =>
                'required|string',

            'pilihan_d' =>
                'required|string',

            'jawaban_benar' =>
                'required|in:A,B,C,D',

            'kesulitan' =>
                'required|in:Mudah,Sedang,Sulit',

        ], [

            'pertanyaan.required' =>
                'Pertanyaan wajib diisi.',

            'pilihan_a.required' =>
                'Pilihan A wajib diisi.',

            'pilihan_b.required' =>
                'Pilihan B wajib diisi.',

            'pilihan_c.required' =>
                'Pilihan C wajib diisi.',

            'pilihan_d.required' =>
                'Pilihan D wajib diisi.',

            'jawaban_benar.required' =>
                'Jawaban benar wajib dipilih.',

            'kesulitan.required' =>
                'Tingkat kesulitan wajib dipilih.',

        ]);


        $soal->update([

            'pertanyaan' =>
                $request->pertanyaan,

            'pilihan_a' =>
                $request->pilihan_a,

            'pilihan_b' =>
                $request->pilihan_b,

            'pilihan_c' =>
                $request->pilihan_c,

            'pilihan_d' =>
                $request->pilihan_d,

            'jawaban_benar' =>
                $request->jawaban_benar,

            'kesulitan' =>
                $request->kesulitan,

        ]);


        return redirect()
            ->route(
                'soal.index',
                $soal->kuis_id
            )
            ->with(
                'success',
                'Soal berhasil diperbarui.'
            );
    }


    // =====================================================
    // HAPUS SOAL
    // =====================================================

    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);

        $kuisId =
            $soal->kuis_id;


        $soal->delete();


        // =================================================
        // JANGAN UPDATE jumlah_soal
        // =================================================
        //
        // Karena jumlah_soal adalah TARGET.
        //
        // Setelah soal dihapus, jumlah soal aktual otomatis
        // berkurang karena record soal sudah dihapus.
        //


        return redirect()
            ->route(
                'soal.index',
                $kuisId
            )
            ->with(
                'success',
                'Soal berhasil dihapus.'
            );
    }
}