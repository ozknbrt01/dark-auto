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
            $table->foreignId('car_model_id')->nullable()->constrained('car_models')->nullOnDelete();
            $table->foreignId('car_engine_id')->nullable()->constrained('car_engines')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_vehicles', function (Blueprint $table) {
            $table->dropForeign(['car_model_id']);
            $table->dropColumn('car_model_id');
            $table->dropForeign(['car_engine_id']);
            $table->dropColumn('car_engine_id');
        });
    }
};
