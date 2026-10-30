<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupabaseController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\PenyuluhController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HasilKuisController;
use App\Http\Controllers\PaketPenyuluhanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\NotifikasiController;


// =====================================================
// LOGIN
// =====================================================

Route::get('/', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// =====================================================
// GOOGLE LOGIN
// =====================================================

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])
    ->name('google.login');

Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])
    ->name('google.callback');


// =====================================================
// FORGOT PASSWORD
// =====================================================

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'email' => 'required|email',
    ]);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with('status', __($status))
        : back()->withErrors([
            'email' => __($status),
        ]);
})->name('password.email');


// =====================================================
// DASHBOARD
// =====================================================

Route::middleware([])->group(function () {

    Route::get('/dashboard', function () {
        if (!session('user')) {
            return redirect()->route('login');
        }

        return app(DashboardController::class)->index();
    })->name('dashboard');

    // Data JSON untuk pembaruan otomatis dashboard
    Route::get('/dashboard/data', function () {
        if (!session('user')) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan login kembali.',
            ], 401);
        }

        return app(DashboardController::class)->data();
    })->name('dashboard.data');

});


// =====================================================
// TEST SUPABASE
// =====================================================

Route::get('/test-supabase', [
    SupabaseController::class,
    'index',
]);


// =====================================================
// MATERI
// =====================================================

Route::resource('materi', MateriController::class);


// =====================================================
// KUIS
// =====================================================

Route::resource('kuis', KuisController::class);

Route::get('/kuis/{id}/preview', [
    KuisController::class,
    'preview',
])->name('kuis.preview');

Route::put('/kuis/{id}/publish', [
    KuisController::class,
    'publish',
])->name('kuis.publish');


// =====================================================
// PENYULUH
// =====================================================

Route::resource('penyuluh', PenyuluhController::class);


// =====================================================
// SOAL
// =====================================================

Route::get('/kuis/{id}/soal', [
    SoalController::class,
    'index',
])->name('soal.index');

Route::get('/kuis/{id}/soal/create', [
    SoalController::class,
    'create',
])->name('soal.create');

Route::post('/kuis/{id}/soal/store', [
    SoalController::class,
    'store',
])->name('soal.store');

Route::get('/soal/{id}/edit', [
    SoalController::class,
    'edit',
])->name('soal.edit');

Route::put('/soal/{id}', [
    SoalController::class,
    'update',
])->name('soal.update');

Route::delete('/soal/{id}', [
    SoalController::class,
    'destroy',
])->name('soal.destroy');


// =====================================================
// USERS
// =====================================================

Route::get('/users', [
    UserController::class,
    'index',
])->name('users.index');


// =====================================================
// HASIL KUIS
// =====================================================

Route::get('/hasil-kuis', [
    HasilKuisController::class,
    'index',
])->name('hasil-kuis.index');

// Export Excel
Route::get('/hasil-kuis/export/excel', [
    HasilKuisController::class,
    'exportExcel',
])->name('hasil-kuis.excel');

// Download hasil kuis
Route::get('/hasil-kuis/download', [
    HasilKuisController::class,
    'download',
])->name('hasil-kuis.download');


// =====================================================
// PAKET PENYULUHAN
// =====================================================

Route::resource(
    'paket-penyuluhan',
    PaketPenyuluhanController::class
);


// =====================================================
// KATEGORI
// =====================================================

Route::resource('kategori', KategoriController::class);


// =====================================================
// GLOBAL SEARCH
// =====================================================

Route::get('/global-search', [
    SearchController::class,
    'search',
])->name('global.search');

Route::get('/notifikasi', [NotifikasiController::class, 'index'])
    ->name('notifikasi.index');

Route::patch('/notifikasi/{id}/dibaca', [
    NotifikasiController::class,
    'tandaiDibaca'
])->name('notifikasi.dibaca');

Route::patch('/notifikasi-dibaca-semua', [
    NotifikasiController::class,
    'tandaiSemuaDibaca'
])->name('notifikasi.dibaca-semua');