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
        Schema::table('equipos', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(); // Esta columna es la que relaciona al equipo con el usuario
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // Relación
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipos', function (Blueprint $table) {
            //
        });
    }
};
