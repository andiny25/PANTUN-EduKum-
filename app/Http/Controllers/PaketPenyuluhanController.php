<?php

namespace App\Http\Controllers;

use App\Models\PaketPenyuluhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaketPenyuluhanController extends Controller
{
    /**
     * Menampilkan daftar paket penyuluhan.
     */
    public function index()
    {
        $paket = PaketPenyuluhan::latest()->paginate(8);

        return view('paket_penyuluhan.index', compact('paket'));
    }

    /**
     * Form tambah paket.
     */
    public function create()
    {
        return view('paket_penyuluhan.create');
    }

    /**
     * Simpan paket baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('paket', 'public');
        }

        PaketPenyuluhan::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'thumbnail' => $thumbnail,
            'deskripsi' => $request->deskripsi,
            'jumlah_halaman' => 8,
            'views' => 0,
        ]);

        return redirect()
            ->route('paket-penyuluhan.index')
            ->with('success', 'Paket penyuluhan berhasil ditambahkan.');
    }

    /**
     * Detail paket.
     */
    public function show(PaketPenyuluhan $paket_penyuluhan)
    {
        return view('paket_penyuluhan.show', compact('paket_penyuluhan'));
    }

    /**
     * Form edit paket.
     */
    public function edit(PaketPenyuluhan $paket_penyuluhan)
    {
        return view('paket_penyuluhan.edit', [
            'paket' => $paket_penyuluhan
        ]);
    }

    /**
     * Update paket.
     */
    public function update(Request $request, PaketPenyuluhan $paket_penyuluhan)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $thumbnail = $paket_penyuluhan->thumbnail;

        if ($request->hasFile('thumbnail')) {

            if ($thumbnail && Storage::disk('public')->exists($thumbnail)) {
                Storage::disk('public')->delete($thumbnail);
            }

            $thumbnail = $request->file('thumbnail')->store('paket', 'public');
        }

        $paket_penyuluhan->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'thumbnail' => $thumbnail,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('paket-penyuluhan.index')
            ->with('success', 'Paket penyuluhan berhasil diperbarui.');
    }

    /**
     * Hapus paket.
     */
    public function destroy(PaketPenyuluhan $paket_penyuluhan)
    {
        if (
            $paket_penyuluhan->thumbnail &&
            Storage::disk('public')->exists($paket_penyuluhan->thumbnail)
        ) {
            Storage::disk('public')->delete($paket_penyuluhan->thumbnail);
        }

        $paket_penyuluhan->delete();

        return redirect()
            ->route('paket-penyuluhan.index')
            ->with('success', 'Paket penyuluhan berhasil dihapus.');
    }
}