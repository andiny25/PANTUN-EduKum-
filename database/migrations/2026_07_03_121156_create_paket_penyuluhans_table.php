<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paket_penyuluhans', function (Blueprint $table) {

            $table->id();

            $table->string('judul');

            $table->string('kategori');

            $table->string('thumbnail')->nullable();

            $table->integer('jumlah_halaman')->default(8);

            $table->integer('views')->default(0);

            $table->text('deskripsi')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paket_penyuluhans');
    }
};