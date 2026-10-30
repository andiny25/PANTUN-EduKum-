<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penyuluh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session()->has('user')) {
            return redirect()->route('dashboard');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        $email = strtolower(trim($request->email));
        $user = User::where('email', $email)->first();

        if (!$user || !$user->password ||
            !Hash::check($request->password, $user->password)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau kata sandi salah.',
                ])
                ->withInput($request->only('email'));
        }

        $role = strtolower(trim($user->role ?? ''));

        // Admin tidak perlu memiliki data pada tabel penyuluh.
        if ($role === 'penyuluh') {
            $penyuluh = Penyuluh::where('email', $email)->first();

            if (!$penyuluh) {
                return back()
                    ->withErrors([
                        'email' => 'Data penyuluh belum terdaftar.',
                    ])
                    ->withInput($request->only('email'));
            }

            $status = strtolower(trim($penyuluh->status ?? ''));

            if ($status !== 'aktif') {
                $pesan = $status === 'pending'
                    ? 'Akun Anda masih menunggu persetujuan admin.'
                    : 'Akun Anda sudah dinonaktifkan oleh admin.';

                return back()
                    ->withErrors(['email' => $pesan])
                    ->withInput($request->only('email'));
            }
        } elseif ($role !== 'admin') {
            return back()
                ->withErrors([
                    'email' => 'Role akun tidak valid. Hubungi admin.',
                ])
                ->withInput($request->only('email'));
        }

        $request->session()->regenerate();

        $request->session()->put('user', [
            'id' => $user->id,
            'name' => $user->name ?? $user->nama ?? $user->email,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'role' => $role,
        ]);

        return redirect()->route('dashboard');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $email = strtolower(trim($googleUser->getEmail() ?? ''));

            if (!$email) {
                return redirect('/')
                    ->withErrors([
                        'email' => 'Email Google tidak berhasil diperoleh.',
                    ]);
            }

            $user = User::where('email', $email)->first();

            if (!$user) {
                return redirect('/')
                    ->withErrors([
                        'email' => 'Email Google belum terdaftar atau belum mendapatkan akses.',
                    ]);
            }

            $role = strtolower(trim($user->role ?? ''));

            // Hanya penyuluh yang harus memiliki data penyuluh aktif.
            if ($role === 'penyuluh') {
                $penyuluh = Penyuluh::where('email', $email)->first();

                if (!$penyuluh) {
                    return redirect('/')
                        ->withErrors([
                            'email' => 'Data penyuluh belum terdaftar.',
                        ]);
                }

                $status = strtolower(trim($penyuluh->status ?? ''));

                if ($status !== 'aktif') {
                    $pesan = $status === 'pending'
                        ? 'Akun Anda masih menunggu persetujuan admin.'
                        : 'Akun Anda sudah dinonaktifkan oleh admin.';

                    return redirect('/')->withErrors([
                        'email' => $pesan,
                    ]);
                }
            } elseif ($role !== 'admin') {
                return redirect('/')->withErrors([
                    'email' => 'Role akun tidak valid. Hubungi admin.',
                ]);
            }

            $avatar = $googleUser->getAvatar();

            if (!empty($avatar)) {
                $user->avatar = $avatar;
                $user->save();
            }

            $request->session()->regenerate();

            $request->session()->put('user', [
                'id' => $user->id,
                'name' => $user->name ?? $user->nama ?? $user->email,
                'email' => $user->email,
                'avatar' => $user->avatar ?? $avatar,
                'role' => $role,
            ]);

            return redirect()->route('dashboard');

        } catch (\Throwable $e) {
            report($e);

            return redirect('/')
                ->withErrors([
                    'email' => 'Login Google gagal. Periksa konfigurasi Google OAuth dan coba lagi.',
                ]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
