<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PaketPenyuluhan;
use Illuminate\Http\JsonResponse;

class PaketPenyuluhanApiController extends Controller
{
    /**
     * Menampilkan seluruh daftar paket penyuluhan.
     */
    public function index(): JsonResponse
    {
        $paket = PaketPenyuluhan::with([
            'kategori',
            'coverMateri',
        ])
            ->withCount(['materi', 'kuis'])
            ->latest()
            ->get()
            ->map(function ($item) {
                $thumbnail = $item->thumbnail
                    ?: $item->coverMateri?->thumbnail;

                return [
                    'id' => $item->id,
                    'kategori_id' => $item->kategori_id,
                    'nama_kategori' => $item->kategori?->nama_kategori,

                    'thumbnail_url' => $thumbnail
                        ? asset('storage/' . $thumbnail)
                        : null,

                    'jumlah_materi' => $item->materi_count,
                    'jumlah_kuis' => $item->kuis_count,

                    'cover_materi' => $item->coverMateri
                        ? [
                            'id' => $item->coverMateri->id,
                            'judul' => $item->coverMateri->judul,
                            'tipe' => $item->coverMateri->tipe,
                        ]
                        : null,
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Data paket penyuluhan berhasil diambil.',
            'total' => $paket->count(),
            'data' => $paket,
        ]);
    }

    /**
     * Menampilkan detail paket penyuluhan berdasarkan ID.
     */
    public function show($id): JsonResponse
    {
        $paket = PaketPenyuluhan::with([
            'kategori',
            'coverMateri',
            'materi',
            'kuis',
        ])->find($id);

        if (!$paket) {
            return response()->json([
                'success' => false,
                'message' => 'Paket penyuluhan tidak ditemukan.',
            ], 404);
        }

        $thumbnail = $paket->thumbnail
            ?: $paket->coverMateri?->thumbnail;

        return response()->json([
            'success' => true,
            'message' => 'Detail paket penyuluhan berhasil diambil.',
            'data' => [
                'id' => $paket->id,
                'kategori_id' => $paket->kategori_id,
                'nama_kategori' => $paket->kategori?->nama_kategori,

                'thumbnail_url' => $thumbnail
                    ? asset('storage/' . $thumbnail)
                    : null,

                'jumlah_materi' => $paket->materi->count(),
                'jumlah_kuis' => $paket->kuis->count(),

                'cover_materi' => $paket->coverMateri
                    ? [
                        'id' => $paket->coverMateri->id,
                        'judul' => $paket->coverMateri->judul,
                        'tipe' => $paket->coverMateri->tipe,
                    ]
                    : null,

                'materi' => $paket->materi->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'judul' => $item->judul,
                        'kategori_id' => $item->kategori_id,
                        'tipe' => $item->tipe,
                        'penulis' => $item->penulis,
                        'deskripsi' => $item->deskripsi,
                        'thumbnail' => $item->thumbnail,
                        'file' => $item->file,
                        'status' => $item->status,
                    ];
                })->values(),

                'kuis' => $paket->kuis->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'judul' => $item->judul,
                        'kategori_id' => $item->kategori_id,
                        'jumlah_soal' => $item->jumlah_soal,
                        'status' => $item->status,
                    ];
                })->values(),
            ],
        ]);
    }
}
