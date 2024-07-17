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
        Schema::create('bases_congreso', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_id')->constrained('bases')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('congreso_id')->constrained('congresos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bases_congreso');
    }
};
