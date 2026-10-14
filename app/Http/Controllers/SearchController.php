<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Kategori;
use App\Models\Kuis;
use App\Models\PaketPenyuluhan;
use App\Models\Penyuluh;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = trim($request->get('q', ''));

        if ($keyword === '') {
            return response()->json([
                'success' => true,
                'data' => []
            ]);
        }

        $results = [];

        /*
        |--------------------------------------------------------------------------
        | MATERI
        |--------------------------------------------------------------------------
        */

        $materi = Materi::where('judul', 'like', "%{$keyword}%")
            ->limit(5)
            ->get();

        foreach ($materi as $item) {
            $results[] = [
                'title' => $item->judul,
                'description' => 'Materi literasi hukum',
                'icon' => 'book-open',
                'url' => url('/materi/' . $item->id),
                'type' => 'Materi',
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | KATEGORI
        |--------------------------------------------------------------------------
        */

        $kategori = Kategori::where(
                'nama_kategori',
                'like',
                "%{$keyword}%"
            )
            ->limit(5)
            ->get();

        foreach ($kategori as $item) {
            $results[] = [
                'title' => $item->nama_kategori,
                'description' => 'Kategori materi dan kuis',
                'icon' => 'tags',
                'url' => url('/kategori'),
                'type' => 'Kategori',
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | KUIS
        |--------------------------------------------------------------------------
        */

        $kuis = Kuis::where('judul', 'like', "%{$keyword}%")
            ->limit(5)
            ->get();

        foreach ($kuis as $item) {
            $results[] = [
                'title' => $item->judul,
                'description' => 'Kuis literasi hukum',
                'icon' => 'badge-help',
                'url' => url('/kuis/' . $item->id),
                'type' => 'Kuis',
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | PAKET PENYULUHAN
        |--------------------------------------------------------------------------
        */

        $paket = PaketPenyuluhan::with('kategori')
            ->whereHas('kategori', function ($query) use ($keyword) {
                $query->where(
                    'nama_kategori',
                    'like',
                    "%{$keyword}%"
                );
            })
            ->limit(5)
            ->get();

        foreach ($paket as $item) {

            $namaKategori = $item->kategori->nama_kategori ?? 'Paket Penyuluhan';

            $results[] = [
                'title' => 'Paket Penyuluhan ' . $namaKategori,
                'description' => 'Paket penyuluhan',
                'icon' => 'archive',
                'url' => url('/paket-penyuluhan/' . $item->id),
                'type' => 'Paket',
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | PENYULUH
        |--------------------------------------------------------------------------
        */

        $penyuluh = Penyuluh::where('nama', 'like', "%{$keyword}%")
            ->limit(5)
            ->get();

        foreach ($penyuluh as $item) {
            $results[] = [
                'title' => $item->nama,
                'description' => 'Data penyuluh',
                'icon' => 'briefcase',
                'url' => url('/penyuluh'),
                'type' => 'Penyuluh',
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | BATASI HASIL
        |--------------------------------------------------------------------------
        */

        $results = array_slice($results, 0, 10);


        return response()->json([
            'success' => true,
            'data' => $results
        ]);
    }
}