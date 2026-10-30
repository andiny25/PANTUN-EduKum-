<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::query();

        // Pencarian nama dan email
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
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

        // Mengambil data siswa
        $users = $query->latest()->paginate(10);

        // Daftar sekolah untuk filter
        $sekolahs = Siswa::select('sekolah')
            ->distinct()
            ->orderBy('sekolah')
            ->pluck('sekolah');

        // Daftar kelas untuk filter
        $kelas = Siswa::select('kelas')
            ->distinct()
            ->orderBy('kelas')
            ->pluck('kelas');

        return view('users.index', compact(
            'users',
            'sekolahs',
            'kelas'
        ));
    }

    // Menghapus data siswa
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}