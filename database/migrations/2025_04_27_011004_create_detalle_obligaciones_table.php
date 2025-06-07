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
        Schema::create('detalle_obligaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_obligaciones');
            $table->unsignedBigInteger('id_alumnos');
            $table->integer('monto');
            $table->timestamp('fecha_pago')->nullable();
            $table->timestamp('fecha_vencimiento');
            $table->foreign('id_obligaciones')->references('id')->on('tipo_obligaciones')->onDelete('cascade');
            $table->foreign('id_alumnos')->references('id')->on('alumnos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_obligaciones');
    }
};
