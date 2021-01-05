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
            $table->bigInteger('ciudad_id');
            $table->string('nombre');
            $table->longtext('direccion');
            $table->integer('cpostal');
            $table->bigInteger('horario_id');
            $table->longtext('descripcion');
            $table->integer('telefono');
            $table->string('web');
            $table->double('longitud');
            $table->double('latitud');
            $table->bigInteger('tipo_id');
            $table->double('puntos');
            $table->longtext('etiquetas');
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
