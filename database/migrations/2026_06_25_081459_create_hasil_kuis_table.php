<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
{
    Schema::create('hasil_kuis', function (Blueprint $table) {
        $table->id();
        $table->string('nama_siswa');
        $table->string('sekolah');
        $table->string('kuis');
        $table->integer('skor');
        $table->string('status');
        $table->date('tanggal');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('hasil_kuis');
    }
};