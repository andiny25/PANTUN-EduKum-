<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    private function queryNotifikasi()
    {
        $role = strtolower(session('user.role', ''));

        $query = Notifikasi::query();

        if ($role !== '') {
            $query->where(function ($q) use ($role) {
                $q->whereRaw('LOWER(target_role) = ?', [$role])
                    ->orWhere('target_role', 'all')
                    ->orWhereNull('target_role');
            });
        }

        return $query;
    }

    public function index()
    {
        $query = $this->queryNotifikasi();

        $notifikasi = (clone $query)
            ->latest()
            ->limit(10)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'judul' => $item->judul,
                    'pesan' => $item->pesan,
                    'tipe' => $item->tipe,
                    'target_role' => $item->target_role,
                    'url' => $item->url,
                    'dibaca' => !is_null($item->dibaca_pada)
                        || (bool) $item->dibaca,
                    'waktu' => $item->created_at
                        ? $item->created_at->diffForHumans()
                        : '',
                ];
            });

        $totalBelumDibaca = (clone $query)
            ->where('dibaca', false)
            ->whereNull('dibaca_pada')
            ->count();

        return response()->json([
            'notifikasi' => $notifikasi,
            'total_belum_dibaca' => $totalBelumDibaca,
        ]);
    }

    public function tandaiDibaca($id)
    {
        $notifikasi = $this->queryNotifikasi()
            ->whereKey($id)
            ->firstOrFail();

        $notifikasi->update([
            'dibaca' => true,
            'dibaca_pada' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Notifikasi berhasil ditandai sudah dibaca.',
        ]);
    }

    public function tandaiSemuaDibaca()
    {
        $this->queryNotifikasi()
            ->where('dibaca', false)
            ->whereNull('dibaca_pada')
            ->update([
                'dibaca' => true,
                'dibaca_pada' => now(),
            ]);

        return response()->json([
            'success' => true,
            'message' => 'Semua notifikasi berhasil ditandai sudah dibaca.',
        ]);
    }
}
