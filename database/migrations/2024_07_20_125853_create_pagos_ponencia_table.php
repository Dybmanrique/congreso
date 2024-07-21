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
        Schema::create('pagos_ponencia', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_registro');
            $table->foreignId('comprobante_id')->constrained('comprobantes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('ponente_ponencia_id')->constrained('ponentes_ponencia')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos_ponencia');
    }
};
