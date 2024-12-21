<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->string('placa'); // Placa del equipo
            $table->string('nombre_usuario'); // Nombre del usuario
            $table->string('elemento_prestado')->nullable();
            $table->date('fecha_prestamo'); // Fecha en que se realiza el préstamo
            $table->date('fecha_devolucion')->nullable(); // Fecha de devolución (opcional)
            $table->timestamps(); // timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
