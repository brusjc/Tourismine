<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{

    //**************
    //* Relaciones *
    //**************

    //Creamos relación con la tabla ciudad
    public function ciudad() {
        return $this->belongsTo('App\Ciudad');
    }

    //Creamos relación con la tabla punto
    public function rutaPunto() {
        return $this->hasMany('App\RutaPunto');
    }

}
