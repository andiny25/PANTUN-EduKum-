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

            $table->foreignId('kategori_id')
                ->constrained('kategoris')
                ->cascadeOnDelete();

            $table->integer('jumlah_soal')->default(0);

            $table->enum('status', [
                'Aktif',
                'Draft',
                'Nonaktif'
            ])->default('Draft');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kuis');
    }
};