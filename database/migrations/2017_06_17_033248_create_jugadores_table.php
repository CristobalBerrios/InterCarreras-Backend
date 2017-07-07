<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJugadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matricula');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo');
            $table->json('estadistica');
            $table->integer('carrera_id')->unsigned();
            $table->integer('equipo_id')->unsigned();

            $table->foreign('carrera_id')->references('id')->on('carreras');
            $table->foreign('equipo_id')->references('id')->on('equipos');


        });
    }

    /**
     * Reverse the migrations.
     *031627

     
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugadores');
    }
}
