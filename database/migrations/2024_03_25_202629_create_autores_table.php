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
        Schema::create('autores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('institucion_id')->constrained('instituciones')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('grupo_investigacion_id')->constrained('grupos_investigacion')->onDelete('cascade')->onUpdate('cascade');
            $table->string('orcid_id');
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
        Schema::dropIfExists('autores');
    }
};
