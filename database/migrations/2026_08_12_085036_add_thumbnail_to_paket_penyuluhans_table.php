<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('paket_penyuluhans', function (Blueprint $table) {
            $table->string('thumbnail')->nullable()->after('kategori_id');
        });
    }

    public function down(): void
    {
        Schema::table('paket_penyuluhans', function (Blueprint $table) {
            $table->dropColumn('thumbnail');
        });
    }
};