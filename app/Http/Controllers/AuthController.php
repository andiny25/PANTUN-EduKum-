<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penyuluh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    // =====================================================
    // TAMPILKAN HALAMAN LOGIN
    // =====================================================

    public function showLogin()
    {
        return view('login');
    }


    // =====================================================
    // LOGIN EMAIL & PASSWORD
    // =====================================================

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

        // =================================================
        // CARI AKUN USER
        // =================================================

        $user = User::where('email', $email)->first();

        // EMAIL TIDAK TERDAFTAR
        if (!$user) {
            return back()
                ->withErrors([
                    'email' => 'Email tidak terdaftar.',
                ])
                ->withInput(
                    $request->only('email')
                );
        }


        // =================================================
        // CEK DATA PENYULUH
        // =================================================

        $penyuluh = Penyuluh::where(
            'email',
            $email
        )->first();

        // AKUN USER ADA TAPI BUKAN PENYULUH
        if (!$penyuluh) {
            return back()
                ->withErrors([
                    'email' =>
                        'Akun Anda belum terdaftar sebagai penyuluh.',
                ])
                ->withInput(
                    $request->only('email')
                );
        }


        // =================================================
        // CEK STATUS AKSES
        // =================================================

        if ($penyuluh->status !== 'Aktif') {

            if ($penyuluh->status === 'Pending') {

                $pesan =
                    'Akun Anda masih menunggu persetujuan admin.';

            } else {

                $pesan =
                    'Akun Anda sudah dinonaktifkan oleh admin.';
            }

            return back()
                ->withErrors([
                    'email' => $pesan,
                ])
                ->withInput(
                    $request->only('email')
                );
        }


        // =================================================
        // CEK PASSWORD
        // =================================================

        if (
            !$user->password ||
            !Hash::check(
                $request->password,
                $user->password
            )
        ) {

            return back()
                ->withErrors([
                    'password' =>
                        'Kata sandi yang Anda masukkan salah.',
                ])
                ->withInput(
                    $request->only('email')
                );
        }


        // =================================================
        // LOGIN BERHASIL
        // =================================================

        $request->session()->regenerate();

        $request->session()->put('user', [
            'id' => $user->id,
            'name' => $user->name ?? $user->nama ?? $user->email,
            'email' => $user->email,
        ]);

        $request->session()->save();

        return redirect()->route('dashboard');
    }


    // =====================================================
    // REDIRECT KE GOOGLE
    // =====================================================

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    // =====================================================
    // CALLBACK GOOGLE
    // =====================================================

    public function handleGoogleCallback()
    {
        try {

            // =================================================
            // AMBIL DATA DARI GOOGLE
            // =================================================

            $googleUser =
                Socialite::driver('google')->user();


            // =================================================
            // AMBIL EMAIL
            // =================================================

            $email = strtolower(
                trim($googleUser->getEmail())
            );


            // =================================================
            // CARI AKUN USER
            // =================================================

            $user = User::where(
                'email',
                $email
            )->first();


            // EMAIL BELUM TERDAFTAR DI USERS
            if (!$user) {

                return redirect('/')
                    ->withErrors([
                        'email' =>
                            'Email Google Anda belum terdaftar atau belum mendapatkan akses.',
                    ]);
            }


            // =================================================
            // CARI DATA PENYULUH
            // =================================================

            $penyuluh = Penyuluh::where(
                'email',
                $email
            )->first();


            // AKUN TIDAK TERDAFTAR SEBAGAI PENYULUH
            if (!$penyuluh) {

                return redirect('/')
                    ->withErrors([
                        'email' =>
                            'Email Anda belum terdaftar sebagai penyuluh.',
                    ]);
            }


            // =================================================
            // CEK STATUS PENYULUH
            // =================================================

            if ($penyuluh->status !== 'Aktif') {

                if ($penyuluh->status === 'Pending') {

                    $pesan =
                        'Akun Anda masih menunggu persetujuan admin.';

                } else {

                    $pesan =
                        'Akun Anda sudah dinonaktifkan oleh admin.';
                }

                return redirect('/')
                    ->withErrors([
                        'email' => $pesan,
                    ]);
            }


            // =================================================
            // AMBIL FOTO GOOGLE
            // =================================================

            $avatar = $googleUser->getAvatar();


            // =================================================
            // SIMPAN FOTO GOOGLE
            // =================================================

            if ($avatar) {

                $user->avatar = $avatar;

                $user->save();
            }


            // Refresh user
            $user->refresh();


            // =================================================
            // LOGIN
            // =================================================

            session([
                'user' => $user,
            ]);


            return redirect('/dashboard');

        } catch (\Exception $e) {

            return redirect('/')
                ->withErrors([
                    'email' =>
                        'Login dengan Google gagal. Silakan coba lagi.',
                ]);
        }
    }


    // =====================================================
    // LOGOUT
    // =====================================================

    public function logout(Request $request)
    {
        session()->forget('user');

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}