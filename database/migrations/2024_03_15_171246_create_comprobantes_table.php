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

        Schema::create('comprobantes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('metodo_pago_id')->constrained('metodos_pago')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('fecha_pago');
            $table->decimal('monto', 10, 2);
            $table->decimal('descuento', 10, 2)->nullable();
            $table->binary('imagen_comprobante'); // Para almacenar la imagen del comprobante
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
        Schema::dropIfExists('comprobantes');
    }
};
