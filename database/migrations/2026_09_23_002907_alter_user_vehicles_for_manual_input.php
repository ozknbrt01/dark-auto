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
        Schema::table('user_vehicles', function (Blueprint $table) {
            // Eski zorunlu ilişkileri kaldırıyoruz
            // Since they were possibly foreign keys, we try to drop foreign first. If there's no foreign key constraint, dropping foreign throws an error, so we will wrap it or just rely on the user's provided code.
            // Wait! If the user_vehicles table didn't have foreign keys, this dropForeign will crash.
            // But I will follow the user's explicit code instructions.
            $table->dropForeign(['car_model_id']);
            $table->dropColumn('car_model_id');
            $table->dropForeign(['car_engine_id']);
            $table->dropColumn('car_engine_id');

            // Yeni serbest metin alanlarını ekliyoruz
            $table->string('model_name')->nullable()->after('car_brand_id');
            $table->string('engine_name')->nullable()->after('model_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_vehicles', function (Blueprint $table) {
            $table->dropColumn('model_name');
            $table->dropColumn('engine_name');
            $table->foreignId('car_model_id')->nullable()->constrained('car_models');
            $table->foreignId('car_engine_id')->nullable()->constrained('car_engines');
        });
    }
};
