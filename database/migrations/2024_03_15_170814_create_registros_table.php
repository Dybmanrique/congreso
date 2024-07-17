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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participante_id')->constrained('participantes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('programa_id')->constrained('programa')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('fecha_registro');
            $table->char('uuid', length: 36)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
