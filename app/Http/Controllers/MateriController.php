<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;

class MateriController extends Controller
{
    public function index()
    {
        $materi = Materi::all();

        return view('materi.index', compact('materi'));
    }

    public function create()
    {
        return view('materi.create');
    }

public function store(Request $request)
{
    Materi::create([
        'judul' => $request->judul,
        'kategori' => $request->kategori,
        'tipe' => $request->tipe,
        'penulis' => $request->penulis,
        'deskripsi' => $request->deskripsi,
        'status' => 'Diterbitkan'
    ]);

    return redirect('/materi');
}



    /* ================= EDIT ================= */

    public function edit($id)
    {
        $materi = Materi::findOrFail($id);

        return view('materi.edit', compact('materi'));
    }

    /* ================= UPDATE ================= */

public function update(Request $request, $id)
{
    $materi = Materi::findOrFail($id);

    $materi->update([
        'judul' => $request->judul,
        'kategori' => $request->kategori,
        'tipe' => $request->tipe,
        'penulis' => $request->penulis,
        'deskripsi' => $request->deskripsi,
        'status' => $request->status
    ]);

    return redirect('/materi')
        ->with('success', 'Materi berhasil diupdate');
}



    /* ================= DELETE ================= */

    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);

        $materi->delete();

        return redirect('/materi')
            ->with('success', 'Materi berhasil dihapus');
    }
}
