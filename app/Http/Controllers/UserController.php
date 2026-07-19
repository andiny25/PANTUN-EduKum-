<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::query();

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('sekolah')) {
            $query->where('sekolah', $request->sekolah);
        }

        if ($request->filled('kelas')) {
            $query->where('kelas', $request->kelas);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $users = $query->latest()->paginate(10);

        $sekolahs = Siswa::select('sekolah')
                        ->distinct()
                        ->pluck('sekolah');

        $kelas = Siswa::select('kelas')
                    ->distinct()
                    ->pluck('kelas');

        return view('users.index', compact(
            'users',
            'sekolahs',
            'kelas'
        ));
    }
}