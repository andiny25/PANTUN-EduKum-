<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketPenyuluhan extends Model
{
    protected $fillable = [

        'judul',

        'kategori',

        'thumbnail',

        'jumlah_halaman',

        'views',

        'deskripsi'

    ];
}