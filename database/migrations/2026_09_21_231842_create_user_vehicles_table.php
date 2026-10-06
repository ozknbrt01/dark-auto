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
        Schema::dropIfExists('user_vehicles');
        
        Schema::create('user_vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('car_brand_id')->constrained('car_brands')->cascadeOnDelete();
            $table->foreignId('car_model_id')->constrained('car_models')->cascadeOnDelete();
            $table->foreignId('car_engine_id')->constrained('car_engines')->cascadeOnDelete();
            $table->string('plate_number')->nullable(); // Opsiyonel plaka (örn: 34 ABC 123)
            $table->string('color')->nullable(); // Opsiyonel renk
            $table->integer('year')->nullable(); // Opsiyonel araç yılı
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_vehicles');
    }
};
