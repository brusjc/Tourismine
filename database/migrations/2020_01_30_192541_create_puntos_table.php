<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('provincia_id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('leyenda');
            $table->string('referencia');
            $table->bigInteger('telefono');
            $table->string('web');
            $table->double('longitud');
            $table->double('latitud');
            $table->double('coste');
            $table->bigInteger('horario_id');
            $table->bigInteger('tipo');
            $table->double('puntos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puntos');
    }
}
