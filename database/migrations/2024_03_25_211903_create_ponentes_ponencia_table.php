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
        Schema::create('ponentes_ponencia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ponente_id')->constrained('ponentes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('ponencia_id')->constrained('ponencias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('eje_tematico_id')->constrained('eje_tematicos')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('estado')->default(0);
            $table->boolean('es_valido')->default(0);
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
        Schema::dropIfExists('ponentes_ponencia');
    }
};
