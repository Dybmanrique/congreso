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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_documento_id');
            $table->unsignedBigInteger('persona_id');
            $table->string('numero');
            $table->char('uuid', length: 36)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tipo_documento_id')->references('id')->on('tipos_documento')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
