<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Menampilkan daftar kategori.
     */
    public function index()
    {
        $kategoris = Kategori::withCount(['materi', 'kuis'])
            ->latest()
            ->get();

        return view('kategori.index', compact('kategoris'));
    }

    /**
     * Menampilkan form tambah kategori.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Menyimpan kategori baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori',
            'deskripsi' => 'nullable|string',
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.unique' => 'Kategori tersebut sudah ada.',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit kategori.
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Mengupdate kategori.
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori,' . $kategori->id,
            'deskripsi' => 'nullable|string',
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.unique' => 'Kategori tersebut sudah ada.',
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Menghapus kategori.
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->delete();

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
