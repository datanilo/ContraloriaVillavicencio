<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudSoportesTable extends Migration
{
    public function up()
    {
        Schema::create('solicitud_soportes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_solicitante');
            $table->string('placa_equipo');
            $table->text('mensaje');
            $table->enum('estado', ['Pendiente', 'Completado'])->default('Pendiente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitud_soportes');
    }
}
