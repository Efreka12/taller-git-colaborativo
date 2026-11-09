<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crea la tabla de vehiculos que entran al parqueadero.
     */
    public function up(): void
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->string('placa');
            // moto o carro
            $table->string('tipo');
            $table->dateTime('hora_entrada');
            $table->dateTime('hora_salida')->nullable();
            $table->integer('tarifa_total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Borra la tabla si se revierte la migracion.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
