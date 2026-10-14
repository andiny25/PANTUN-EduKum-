<?php

namespace App\Http\Controllers;

use App\Models\Kuis;
use App\Models\Soal;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\PaketPenyuluhan;

class KuisController extends Controller
{
    // =====================================================
    // HALAMAN LIST KUIS
    // =====================================================

    public function index()
    {
        $kuis = Kuis::with('kategori')
            ->latest()
            ->get();

        return view('kuis.index', compact('kuis'));
    }


    // =====================================================
    // FORM TAMBAH KUIS
    // =====================================================

    public function create()
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();

        return view('kuis.create', compact('kategoris'));
    }


    // =====================================================
    // SIMPAN DATA KUIS
    // =====================================================

    public function store(Request $request)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'jumlah_soal' => 'required|integer|min:1',
            'status'      => 'required|in:Aktif,Draft,Nonaktif',
        ]);

        $kuis = Kuis::create([
            'judul'       => $request->judul,
            'kategori_id' => $request->kategori_id,
            'jumlah_soal' => $request->jumlah_soal,
            'status'      => $request->status,
        ]);

        // Membuat Paket Penyuluhan berdasarkan kategori
        PaketPenyuluhan::firstOrCreate([
            'kategori_id' => $kuis->kategori_id
        ]);

        return redirect()
            ->route('kuis.index')
            ->with('success', 'Kuis berhasil ditambahkan');
    }


    // =====================================================
    // DETAIL KUIS + DAFTAR SOAL
    // =====================================================

    public function show($id)
    {
        $kuis = Kuis::with('kategori')
            ->findOrFail($id);

        $soal = Soal::where('kuis_id', $id)
            ->latest()
            ->get();

        return view('kuis.show', compact('kuis', 'soal'));
    }


    // =====================================================
    // FORM EDIT KUIS
    // =====================================================

    public function edit($id)
    {
        $kuis = Kuis::findOrFail($id);

        $kategoris = Kategori::orderBy('nama_kategori')->get();

        return view('kuis.edit', [
            'kuis' => $kuis,
            'kategoris' => $kategoris
        ]);
    }


    // =====================================================
    // UPDATE DATA KUIS
    // =====================================================

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'jumlah_soal' => 'required|integer|min:1',
            'status'      => 'required|in:Aktif,Draft,Nonaktif',
        ]);

        $kuis = Kuis::findOrFail($id);

        $kuis->update([
            'judul'       => $request->judul,
            'kategori_id' => $request->kategori_id,
            'jumlah_soal' => $request->jumlah_soal,
            'status'      => $request->status,
        ]);

        return redirect()
            ->route('kuis.index')
            ->with('success', 'Kuis berhasil diperbarui');
    }


    // =====================================================
    // PREVIEW KUIS
    // =====================================================

    public function preview($id)
    {
        $kuis = Kuis::with('kategori')
            ->findOrFail($id);

        $soal = Soal::where('kuis_id', $id)
            ->orderBy('id', 'asc')
            ->get();

        return view('kuis.preview', compact('kuis', 'soal'));
    }


    // =====================================================
    // PUBLISH KUIS
    // =====================================================

    public function publish($id)
    {
        $kuis = Kuis::findOrFail($id);

        // Cek apakah sudah ada soal
        $jumlahSoal = Soal::where('kuis_id', $id)->count();

        if ($jumlahSoal == 0) {
            return redirect()
                ->back()
                ->with('error', 'Kuis belum dapat dipublish karena belum memiliki soal.');
        }

        // Update status menjadi Aktif
        $kuis->update([
            'status' => 'Aktif'
        ]);

        return redirect()
            ->back()
            ->with('success', 'Kuis berhasil dipublish dan sekarang berstatus Aktif.');
    }


    // =====================================================
    // HAPUS KUIS
    // =====================================================

    public function destroy($id)
    {
        $kuis = Kuis::findOrFail($id);

        // Hapus semua soal yang berkaitan
        Soal::where('kuis_id', $id)->delete();

        // Hapus kuis
        $kuis->delete();

        return redirect()
            ->route('kuis.index')
            ->with('success', 'Kuis berhasil dihapus');
    }
}