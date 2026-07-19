<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cari user berdasarkan email di MySQL
        $user = User::where('email', $request->email)->first();

        // Cek user dan password
        if ($user && Hash::check($request->password, $user->password)) {

            // Simpan data user ke session
            session([
                'user' => $user,
            ]);

            return redirect('/dashboard');
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    // Logout
    public function logout(Request $request)
    {
        session()->forget('user');

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}