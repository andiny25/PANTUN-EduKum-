<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';

    protected $fillable = [
        'judul',
        'kategori_id',
        'tipe',
        'penulis',
        'deskripsi',
        'tanggal_dibuat',
        'status',
        'file',
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
    | RELASI PAKET PENYULUHAN
    |--------------------------------------------------------------------------
    */

    public function paketPenyuluhan()
    {
        return $this->belongsTo(
            PaketPenyuluhan::class,
            'kategori_id',
            'kategori_id'
        );
    }
}