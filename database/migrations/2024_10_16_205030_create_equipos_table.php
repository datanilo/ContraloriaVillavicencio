<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->text('nombre_de_usuario')->nullable(); // Campo opcional
            $table->string('placa')->nullable(); // Campo opcional
            $table->string('equipo')->nullable(); // Campo opcional
            $table->date('fecha'); // Campo obligatorio
            $table->text('especificaciones')->nullable(); // Texto extenso opcional
            $table->string('monitor')->nullable(); // Campo opcional
            $table->string('sistema_operativo')->nullable(); // Campo opcional
            $table->string('licencia_antivirus')->nullable(); // Campo opcional
            $table->date('fecha_vencimiento')->nullable(); // Campo opcional
            $table->string('office')->nullable(); // Campo opcional
            $table->integer('can')->default(0); // Valor por defecto

            $table->timestamps(); // Campos `created_at` y `updated_at`
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipos'); // Borra la tabla si es necesario
    }
}
