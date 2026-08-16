<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. MySQL / MariaDB'de JSON CHECK kısıtlamalarını kaldırmak için sütunları standart TEXT tipine dönüştür
        try {
            DB::statement("ALTER TABLE `orders` MODIFY `shipping_address` TEXT NULL");
        } catch (\Throwable $e) {
            // SQLite veya alternatif sürücüler için fallback
            Schema::table('orders', function (Blueprint $table) {
                $table->text('shipping_address')->nullable()->change();
            });
        }

        try {
            DB::statement("ALTER TABLE `orders` MODIFY `billing_address` TEXT NULL");
        } catch (\Throwable $e) {
            Schema::table('orders', function (Blueprint $table) {
                $table->text('billing_address')->nullable()->change();
            });
        }
    }

    public function down(): void
    {
        //
    }
};
