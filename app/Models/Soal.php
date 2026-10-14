<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal';

    protected $fillable = [
        'kuis_id',
        'pertanyaan',
        'pilihan_a',
        'pilihan_b',
        'pilihan_c',
        'pilihan_d',
        'jawaban_benar',
        'kesulitan',
        'poin',
    ];

    public function kuis()
    {
        return $this->belongsTo(Kuis::class, 'kuis_id');
    }
}