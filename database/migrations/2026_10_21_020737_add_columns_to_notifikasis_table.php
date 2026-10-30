
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('notifikasis', 'target_role')) {
            Schema::table('notifikasis', function (Blueprint $table) {
                $table->string('target_role')->nullable();
            });
        }

        if (!Schema::hasColumn('notifikasis', 'url')) {
            Schema::table('notifikasis', function (Blueprint $table) {
                $table->string('url')->nullable();
            });
        }

        if (!Schema::hasColumn('notifikasis', 'dibaca_pada')) {
            Schema::table('notifikasis', function (Blueprint $table) {
                $table->timestamp('dibaca_pada')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('notifikasis', 'dibaca_pada')) {
            Schema::table('notifikasis', function (Blueprint $table) {
                $table->dropColumn('dibaca_pada');
            });
        }

        if (Schema::hasColumn('notifikasis', 'url')) {
            Schema::table('notifikasis', function (Blueprint $table) {
                $table->dropColumn('url');
            });
        }

        if (Schema::hasColumn('notifikasis', 'target_role')) {
            Schema::table('notifikasis', function (Blueprint $table) {
                $table->dropColumn('target_role');
            });
        }
    }
};

