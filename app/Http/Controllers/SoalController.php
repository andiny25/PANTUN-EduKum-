<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuis;
use App\Models\Soal;

class SoalController extends Controller
{

    // ===============================
    // HALAMAN DAFTAR SOAL
    // ===============================

    public function index($id)
    {
        $kuis = Kuis::findOrFail($id);

        $soal = Soal::where('kuis_id', $id)->get();

        return view('kuis.show', compact('kuis', 'soal'));
    }

    // ===============================
    // HALAMAN TAMBAH SOAL
    // ===============================

    public function create($id)
    {
        $kuis = Kuis::findOrFail($id);

        return view('soal.create', compact('kuis'));
    }

    // ===============================
    // SIMPAN SOAL
    // ===============================

    public function store(Request $request, $id)
    {

        $request->validate([

            'pertanyaan'    => 'required',

            'opsi_a'        => 'required',
            'opsi_b'        => 'required',
            'opsi_c'        => 'required',
            'opsi_d'        => 'required',

            'jawaban_benar' => 'required',

        ]);

        Soal::create([

            'kuis_id'       => $id,

            'pertanyaan'    => $request->pertanyaan,

            'opsi_a'        => $request->opsi_a,
            'opsi_b'        => $request->opsi_b,
            'opsi_c'        => $request->opsi_c,
            'opsi_d'        => $request->opsi_d,

            'jawaban_benar' => $request->jawaban_benar,

            'status'        => $request->status,

        ]);

        return redirect()
            ->route('soal.index', $id)
            ->with('success', 'Soal berhasil ditambahkan');
    }

    // ===============================
    // HALAMAN EDIT SOAL
    // ===============================

    public function edit($id)
    {
        $soal = Soal::findOrFail($id);

        return view('soal.edit', compact('soal'));
    }

    // ===============================
    // UPDATE SOAL
    // ===============================

    public function update(Request $request, $id)
    {

        $soal = Soal::findOrFail($id);

        $request->validate([

            'pertanyaan'    => 'required',

            'opsi_a'        => 'required',
            'opsi_b'        => 'required',
            'opsi_c'        => 'required',
            'opsi_d'        => 'required',

            'jawaban_benar' => 'required',

        ]);

        $soal->update([

            'pertanyaan'    => $request->pertanyaan,

            'opsi_a'        => $request->opsi_a,
            'opsi_b'        => $request->opsi_b,
            'opsi_c'        => $request->opsi_c,
            'opsi_d'        => $request->opsi_d,

            'jawaban_benar' => $request->jawaban_benar,

            'status'        => $request->status,

        ]);

        return redirect()
            ->back()
            ->with('success', 'Soal berhasil diupdate');
    }

    // ===============================
    // HAPUS SOAL
    // ===============================

    public function destroy($id)
    {

        $soal = Soal::findOrFail($id);

        $kuisId = $soal->kuis_id;

        $soal->delete();

        return redirect()
            ->route('soal.index', $kuisId)
            ->with('success', 'Soal berhasil dihapus');
    }

}