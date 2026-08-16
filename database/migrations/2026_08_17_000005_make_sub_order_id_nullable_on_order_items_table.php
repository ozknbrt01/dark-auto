<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('order_items', 'sub_order_id')) {
            try {
                DB::statement("ALTER TABLE `order_items` MODIFY `sub_order_id` BIGINT UNSIGNED NULL");
            } catch (\Throwable $e) {
                Schema::table('order_items', function (Blueprint $table) {
                    $table->unsignedBigInteger('sub_order_id')->nullable()->change();
                });
            }
        }
    }

    public function down(): void
    {
        //
    }
};
