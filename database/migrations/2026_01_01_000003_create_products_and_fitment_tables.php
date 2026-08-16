<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained('vendors')->cascadeOnDelete();
            $table->string('oem_code')->index();
            $table->string('title');
            $table->string('sku')->index();
            $table->decimal('price', 10, 2)->index();
            $table->text('description')->nullable();
            $table->unsignedInteger('stock_quantity')->default(0);
            $table->boolean('is_universal')->default(false)->index();
            $table->string('status')->default('published')->index();
            $table->string('slug')->nullable()->unique();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['vendor_id', 'status']);
        });

        Schema::create('product_vehicle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->foreignId('vehicle_id')->constrained('vehicles')->cascadeOnDelete();
            $table->string('notes')->nullable();
            $table->timestamps();

            $table->unique(['product_id', 'vehicle_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_vehicle');
        Schema::dropIfExists('products');
    }
};
