<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    protected $table = 'kuis';

    protected $fillable = [
        'judul',
        'kategori_id',
        'jumlah_soal',
        'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(
            Kategori::class,
            'kategori_id'
        );
    }

    public function soal()
    {
        return $this->hasMany(
            Soal::class,
            'kuis_id'
        );
    }
}