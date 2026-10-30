<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $table = 'notifikasis';

    protected $fillable = [
        'judul',
        'pesan',
        'tipe',
        'target_role',
        'url',
        'dibaca',
        'dibaca_pada',
    ];

    protected $casts = [
        'dibaca' => 'boolean',
        'dibaca_pada' => 'datetime',
    ];
}
