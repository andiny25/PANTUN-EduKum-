<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketPenyuluhan extends Model
{
    use HasFactory;

    protected $table = 'paket_penyuluhans';

    protected $fillable = [
        'kategori_id',
        'thumbnail',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI KATEGORI
    |--------------------------------------------------------------------------
    */

    public function kategori()
    {
        return $this->belongsTo(
            Kategori::class,
            'kategori_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SEMUA MATERI DALAM KATEGORI
    |--------------------------------------------------------------------------
    */

    public function materi()
    {
        return $this->hasMany(
            Materi::class,
            'kategori_id',
            'kategori_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | MATERI PERTAMA UNTUK COVER
    |--------------------------------------------------------------------------
    */

    public function coverMateri()
    {
        return $this->hasOne(
            Materi::class,
            'kategori_id',
            'kategori_id'
        )->oldest('id');
    }

    /*
    |--------------------------------------------------------------------------
    | SEMUA KUIS DALAM KATEGORI
    |--------------------------------------------------------------------------
    */

    public function kuis()
    {
        return $this->hasMany(
            Kuis::class,
            'kategori_id',
            'kategori_id'
        );
    }
}