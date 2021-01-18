<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiporuta extends Model
{

    //**************
    //* Relaciones *
    //**************

    //Creamos relación con la tabla rutas
    public function rutas() {
        return $this->belongsTo('App\Ruta');
    }
}
