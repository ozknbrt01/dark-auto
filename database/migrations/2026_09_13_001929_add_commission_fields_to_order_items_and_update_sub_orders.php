<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->decimal('commission_rate', 5, 2)->default(0)->after('total_price');
            $table->decimal('commission_amount', 12, 2)->default(0)->after('commission_rate');
        });

        Schema::table('sub_orders', function (Blueprint $table) {
            $table->decimal('commission_rate', 5, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_orders', function (Blueprint $table) {
            $table->decimal('commission_rate', 5, 2)->default(10.00)->change();
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn(['commission_rate', 'commission_amount']);
        });
    }
};
