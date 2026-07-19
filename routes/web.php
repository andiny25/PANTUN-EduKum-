<?php

use Illuminate\Support\Facades\Route;

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

// =======================
// LOGIN
// =======================

Route::get('/', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);


// =======================
// DASHBOARD
// =======================

Route::get('/dashboard', function () {

    if (!session('user')) {
        return redirect('/');
    }

    return app(DashboardController::class)->index();

});


// =======================
// TEST SUPABASE
// =======================

Route::get('/test-supabase', [SupabaseController::class, 'index']);


// =======================
// MATERI
// =======================

Route::resource('materi', MateriController::class);


// =======================
// KUIS
// =======================

Route::resource('kuis', KuisController::class);


// =======================
// PENYULUH
// =======================

Route::resource('penyuluh', PenyuluhController::class);


// =======================
// SOAL
// =======================

// daftar soal berdasarkan kuis
Route::get('/kuis/{id}/soal', [SoalController::class, 'index'])
    ->name('soal.index');

// form tambah soal
Route::get('/kuis/{id}/soal/create', [SoalController::class, 'create'])
    ->name('soal.create');

// simpan soal
Route::post('/kuis/{id}/soal/store', [SoalController::class, 'store'])
    ->name('soal.store');

// form edit soal
Route::get('/soal/{id}/edit', [SoalController::class, 'edit'])
    ->name('soal.edit');

// update soal
Route::put('/soal/{id}', [SoalController::class, 'update'])
    ->name('soal.update');

// hapus soal
Route::delete('/soal/{id}', [SoalController::class, 'destroy'])
    ->name('soal.destroy');

Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');

    Route::get('/hasil-kuis', [HasilKuisController::class, 'index']);
    Route::get('/hasil-kuis/export/pdf', [HasilKuisController::class, 'exportPDF'])
    ->name('hasil-kuis.pdf');

Route::get('/hasil-kuis/export/excel', [HasilKuisController::class, 'exportExcel'])
    ->name('hasil-kuis.excel');

Route::get('/hasil-kuis/download', [HasilKuisController::class, 'download'])
    ->name('hasil-kuis.download');

Route::resource('paket-penyuluhan', PaketPenyuluhanController::class);