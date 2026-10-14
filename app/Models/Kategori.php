<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class, 'kategori_id');
    }

    public function kuis()
    {
        return $this->hasMany(Kuis::class, 'kategori_id');
    }

    public function paketPenyuluhan()
    {
        return $this->hasOne(
            PaketPenyuluhan::class,
            'kategori_id'
        );
    }
}