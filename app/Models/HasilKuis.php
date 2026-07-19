<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilKuis extends Model
{
    use HasFactory;

    // nama tabel di database
    protected $table = 'hasil_kuis';

    // kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nama_siswa',
        'sekolah',
        'kuis',
        'skor',
        'status',
        'tanggal',
    ];

    // kalau tanggal kamu pakai format date otomatis
    protected $casts = [
        'tanggal' => 'date',
    ];
}