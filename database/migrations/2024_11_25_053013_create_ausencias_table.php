<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ausencias', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('nombre_usuario');
            $table->enum('genero', ['Masculino', 'Femenino', 'Otro']);
            $table->string('motivo');
            $table->decimal('horas', 4, 1)->nullable();
            $table->decimal('horas_cargadas', 4, 1)->nullable(); // Hacer que la columna sea opcional
            $table->integer('cantidad_dias')->default(0) ->nullable(); // Agregar el campo de cantidad de días

            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ausencias');
    }
};
