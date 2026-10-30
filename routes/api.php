<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\MateriApiController;
use App\Http\Controllers\Api\PaketPenyuluhanApiController;
use App\Http\Controllers\Api\KuisApiController;
use App\Http\Controllers\Api\SiswaApiController;


// =====================================================
// TEST API
// =====================================================

Route::get('/test', function () {
    return response()->json([
        'success' => true,
        'message' => 'REST API EduKum berhasil diakses.',
    ]);
});


// =====================================================
// API MATERI
// =====================================================

Route::get('/materi', [
    MateriApiController::class,
    'index'
]);


// =====================================================
// API PAKET PENYULUHAN
// =====================================================

Route::get('/paket-penyuluhan', [
    PaketPenyuluhanApiController::class,
    'index'
]);

Route::get('/paket-penyuluhan/{id}', [
    PaketPenyuluhanApiController::class,
    'show'
]);


// =====================================================
// API KUIS
// =====================================================

Route::get('/kuis', [
    KuisApiController::class,
    'index'
]);

Route::get('/kuis/{id}', [
    KuisApiController::class,
    'show'
]);

Route::post('/kuis/{id}/submit', [
    KuisApiController::class,
    'submit'
]);


// =====================================================
// API SISWA
// =====================================================

// Mengambil daftar siswa
Route::get('/siswa', [
    SiswaApiController::class,
    'index'
]);

// Pendaftaran siswa dari aplikasi mobile
Route::post('/siswa', [
    SiswaApiController::class,
    'store'
]);

// Mengambil detail siswa
Route::get('/siswa/{id}', [
    SiswaApiController::class,
    'show'
]);