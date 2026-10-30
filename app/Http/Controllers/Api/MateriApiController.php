<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\JsonResponse;

class MateriApiController extends Controller
{
    public function index(): JsonResponse
    {
        $materi = Materi::with('kategori')
            ->where('status', 'Diterbitkan')
            ->latest()
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'judul' => $item->judul,
                    'kategori_id' => $item->kategori_id,
                    'kategori' => $item->kategori?->nama_kategori,
                    'tipe' => $item->tipe,
                    'penulis' => $item->penulis,
                    'deskripsi' => $item->deskripsi,
                    'tanggal_dibuat' => $item->tanggal_dibuat,
                    'file_url' => $item->file
                        ? asset('storage/' . $item->file)
                        : null,
                    'thumbnail_url' => $item->thumbnail
                        ? asset('storage/' . $item->thumbnail)
                        : null,
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Data materi berhasil diambil.',
            'total' => $materi->count(),
            'data' => $materi,
        ]);
    }
}
