<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kuis', function (Blueprint $table) {

            $table->id();

            $table->string('judul');
            $table->string('kategori');
            $table->string('paket_penyuluhan');

            $table->integer('jumlah_soal');

            $table->enum('status', [
                'Aktif',
                'Draft',
                'Nonaktif'
            ]);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kuis');
    }
};