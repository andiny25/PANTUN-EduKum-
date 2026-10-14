<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyuluh extends Model
{
    protected $table = 'penyuluhs';

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'jabatan',
        'instansi',
        'status',
    ];
}