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
        Schema::create('reserva_insumo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_insumos');
            $table->unsignedBigInteger('id_alumnos');
            $table->integer('cantidad_reservada');
            $table->foreign('id_insumos')->references('id')->on('insumos')->onDelete('cascade');
            $table->foreign('id_alumnos')->references('id')->on('alumnos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva_insumo');
    }
};
