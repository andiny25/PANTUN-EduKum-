<?php

namespace App\Http\Controllers;

use App\Models\PaketPenyuluhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaketPenyuluhanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DAFTAR PAKET
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $paket = PaketPenyuluhan::with([
            'kategori',
            'materi',
            'kuis',
            'coverMateri'
        ])
        ->latest()
        ->paginate(8);

        return view(
            'paket_penyuluhan.index',
            compact('paket')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE COVER MANUAL
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        PaketPenyuluhan $paket_penyuluhan
    ) {
        $request->validate([
            'thumbnail' =>
                'required|image|mimes:jpg,jpeg,jfif,png,webp|max:2048',
        ]);

        $thumbnailLama =
            $paket_penyuluhan->thumbnail;

        $thumbnailBaru =
            $request
                ->file('thumbnail')
                ->store(
                    'paket',
                    'public'
                );

        if (
            $thumbnailLama &&
            Storage::disk('public')->exists(
                $thumbnailLama
            )
        ) {
            Storage::disk('public')->delete(
                $thumbnailLama
            );
        }

        $paket_penyuluhan->update([
            'thumbnail' => $thumbnailBaru,
        ]);

        return redirect()
            ->route(
                'paket-penyuluhan.index'
            )
            ->with(
                'success',
                'Cover paket berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DETAIL
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $paket = PaketPenyuluhan::with([
            'kategori',
            'materi',
            'kuis',
            'coverMateri'
        ])
        ->findOrFail($id);

        return view(
            'paket_penyuluhan.show',
            compact('paket')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $paket =
            PaketPenyuluhan::findOrFail($id);

        if (
            $paket->thumbnail &&
            Storage::disk('public')->exists(
                $paket->thumbnail
            )  
        ) {
            Storage::disk('public')->delete(
                $paket->thumbnail
            );
        }

        $paket->delete();

        return redirect()
            ->route(
                'paket-penyuluhan.index'
            )
            ->with(
                'success',
                'Paket penyuluhan berhasil dihapus.'
            );
    }
}