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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('congreso_id')->constrained('congresos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nombre', 100);
            $table->string('descripcion', 255);
            $table->dateTime('fecha');
            $table->string('lugar', 100);
            $table->string('tipo', 50); // Ponencia, Taller
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
