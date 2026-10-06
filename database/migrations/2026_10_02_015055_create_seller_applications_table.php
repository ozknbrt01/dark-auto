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
        Schema::create('seller_applications', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('tc_identity', 11);
            $table->string('tax_number')->nullable(); // Set nullable just in case, wait, the user said 'Vergi Numarası (Opsiyonel)' in the UI. But in instructions they didn't specify nullable. I'll make it nullable.
            $table->string('birth_year', 4);
            $table->boolean('accepted_terms')->default(true);
            $table->string('status')->default('bekliyor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_applications');
    }
};
