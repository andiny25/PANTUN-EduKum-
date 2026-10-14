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

        $table->foreignId('kategori_id')
            ->constrained('kategoris')
            ->restrictOnDelete();

        $table->string('thumbnail')->nullable();

        $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paket_penyuluhans');
    }
};