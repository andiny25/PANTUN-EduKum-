<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materi', function (Blueprint $table) {

            $table->id();

            $table->foreignId('kategori_id')
                ->constrained('kategoris')
                ->restrictOnDelete();

            $table->string('judul');
            $table->string('tipe');
            $table->string('penulis')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('status')->default('Aktif');
            $table->string('file')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};