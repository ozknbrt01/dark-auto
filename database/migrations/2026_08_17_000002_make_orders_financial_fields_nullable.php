<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'subtotal')) {
                $table->decimal('subtotal', 12, 2)->nullable()->default(0.00)->change();
            } else {
                $table->decimal('subtotal', 12, 2)->nullable()->default(0.00)->after('user_id');
            }

            if (Schema::hasColumn('orders', 'grand_total')) {
                $table->decimal('grand_total', 12, 2)->nullable()->default(0.00)->change();
            }

            if (Schema::hasColumn('orders', 'shipping_total')) {
                $table->decimal('shipping_total', 12, 2)->nullable()->default(0.00)->change();
            }

            if (Schema::hasColumn('orders', 'discount_total')) {
                $table->decimal('discount_total', 12, 2)->nullable()->default(0.00)->change();
            }

            if (Schema::hasColumn('orders', 'billing_address')) {
                $table->text('billing_address')->nullable()->change();
            }
        });
    }

    public function down(): void
    {
        //
    }
};
