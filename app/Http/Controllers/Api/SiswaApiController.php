<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaApiController extends Controller
{
    /**
     * Mengambil daftar siswa.
     */
    public function index(Request $request)
    {
        $query = Siswa::query();

        // Pencarian berdasarkan nama, email, dan sekolah
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('sekolah', 'like', "%{$search}%");
            });
        }

        // Filter sekolah
        if ($request->filled('sekolah')) {
            $query->where('sekolah', $request->sekolah);
        }

        // Filter kelas
        if ($request->filled('kelas')) {
            $query->where('kelas', $request->kelas);
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $siswa = $query->latest()->paginate(10);

        return response()->json([
            'success' => true,
            'message' => 'Data siswa berhasil diambil.',
            'data' => $siswa
        ], 200);
    }

    /**
     * Mendaftarkan siswa dari aplikasi mobile.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:siswas,email',
            'sekolah' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
        ]);

        $siswa = Siswa::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'sekolah' => $validated['sekolah'],
            'kelas' => $validated['kelas'],
            'status' => 'aktif',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran siswa berhasil.',
            'data' => $siswa
        ], 201);
    }

    /**
     * Mengambil detail siswa.
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json([
                'success' => false,
                'message' => 'Data siswa tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail siswa berhasil diambil.',
            'data' => $siswa
        ], 200);
    }
}