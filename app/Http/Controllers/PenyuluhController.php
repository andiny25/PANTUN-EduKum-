<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyuluh;

class PenyuluhController extends Controller
{
    public function index()
    {
        $penyuluh = Penyuluh::latest()->get();

        return view('penyuluh.index', compact('penyuluh'));
    }

    public function create()
    {
        return view('penyuluh.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'jabatan' => 'required',
            'instansi' => 'required',
            'status' => 'required',
            'foto' => 'nullable|image'
        ]);

        $foto = null;

        if($request->hasFile('foto')){

            $foto = $request->file('foto')
                ->store('penyuluh','public');
        }

        Penyuluh::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'instansi' => $request->instansi,
            'status' => $request->status,
            'foto' => $foto
        ]);

        return redirect('/penyuluh');
    }

    public function edit($id)
    {
        $penyuluh = Penyuluh::findOrFail($id);

        return view('penyuluh.edit', compact('penyuluh'));
    }

    public function update(Request $request, $id)
    {
        $penyuluh = Penyuluh::findOrFail($id);

        $foto = $penyuluh->foto;

        if($request->hasFile('foto')){

            $foto = $request->file('foto')
                ->store('penyuluh','public');
        }

        $penyuluh->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'instansi' => $request->instansi,
            'status' => $request->status,
            'foto' => $foto
        ]);

        return redirect('/penyuluh');
    }

    public function destroy($id)
    {
        $penyuluh = Penyuluh::findOrFail($id);

        $penyuluh->delete();

        return redirect('/penyuluh');
    }
}