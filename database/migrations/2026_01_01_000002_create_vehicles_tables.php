<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('make')->index();
            $table->string('model')->index();
            $table->string('generation')->nullable();
            $table->integer('year_from')->index();
            $table->integer('year_to')->nullable()->index();
            $table->string('engine')->nullable();
            $table->timestamps();

            $table->index(['make', 'model', 'year_from', 'year_to']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
