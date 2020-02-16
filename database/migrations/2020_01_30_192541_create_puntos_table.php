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
            $table->string('descripcion')->nullable();
            $table->string('leyenda')->nullable();
            $table->string('referencia')->nullable();
            $table->bigInteger('telefono')->nullable();
            $table->string('web')->nullable();
            $table->double('longitud')->nullable();
            $table->double('latitud')->nullable();
            $table->double('coste')->nullable();
            $table->bigInteger('horario_id');
            $table->bigInteger('tipo');
            $table->double('puntos')->nullable();
            $table->integer('siglo')->nullable();
            $table->integer('etiquetas')->nullable();
            $table->integer('curiosidades')->nullable();
            $table->timestamp('tiempo')->nullable();
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
