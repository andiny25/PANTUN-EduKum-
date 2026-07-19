<?php

namespace App\Http\Controllers;

use App\Models\Kuis;
use App\Models\Soal;
use Illuminate\Http\Request;

class KuisController extends Controller
{

    // =========================
    // HALAMAN LIST KUIS
    // =========================
    public function index()
    {
        $kuis = Kuis::latest()->get();

        return view('kuis.index', compact('kuis'));
    }

    // =========================
    // FORM TAMBAH KUIS
    // =========================
    public function create()
    {
        return view('kuis.create');
    }

    // =========================
    // SIMPAN DATA KUIS
    // =========================
    public function store(Request $request)
    {

        $request->validate([
            'judul'             => 'required',
            'kategori'          => 'required',
            'paket_penyuluhan'  => 'required',
            'jumlah_soal'       => 'required|numeric',
            'status'            => 'required',
        ]);

        Kuis::create([
            'judul'             => $request->judul,
            'kategori'          => $request->kategori,
            'paket_penyuluhan'  => $request->paket_penyuluhan,
            'jumlah_soal'       => $request->jumlah_soal,
            'status'            => $request->status,
        ]);

        return redirect('/kuis')
            ->with('success', 'Kuis berhasil ditambahkan');
    }

    // =========================
    // DETAIL KUIS + DAFTAR SOAL
    // =========================
    public function show($id)
    {

        // ambil data kuis
        $kuis = Kuis::findOrFail($id);

        // ambil semua soal berdasarkan kuis
        $soal = Soal::where('kuis_id', $id)
                    ->latest()
                    ->get();

        return view('kuis.show', compact('kuis', 'soal'));
    }

    // =========================
    // FORM EDIT KUIS
    // =========================
    public function edit($id)
    {
        $kuis = Kuis::findOrFail($id);

        return view('kuis.edit', compact('kuis'));
    }

    // =========================
    // UPDATE DATA KUIS
    // =========================
    public function update(Request $request, $id)
    {

        $request->validate([
            'judul'             => 'required',
            'kategori'          => 'required',
            'paket_penyuluhan'  => 'required',
            'jumlah_soal'       => 'required|numeric',
            'status'            => 'required',
        ]);

        $kuis = Kuis::findOrFail($id);

        $kuis->update([
            'judul'             => $request->judul,
            'kategori'          => $request->kategori,
            'paket_penyuluhan'  => $request->paket_penyuluhan,
            'jumlah_soal'       => $request->jumlah_soal,
            'status'            => $request->status,
        ]);

        return redirect('/kuis')
            ->with('success', 'Kuis berhasil diupdate');
    }

    // =========================
    // HAPUS KUIS
    // =========================
    public function destroy($id)
    {

        $kuis = Kuis::findOrFail($id);

        // hapus semua soal yang terkait
        Soal::where('kuis_id', $id)->delete();

        // hapus kuis
        $kuis->delete();

        return redirect('/kuis')
            ->with('success', 'Kuis berhasil dihapus');
    }

}