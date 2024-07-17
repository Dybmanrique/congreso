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
        Schema::create('miembros_comite', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comite_id')->constrained('comites')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('organizador_id')->constrained('organizadores')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('miembros_comite');
    }
};
