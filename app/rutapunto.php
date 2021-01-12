<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rutapunto extends Model
{

    //**************
    //* Relaciones *
    //**************

    //Creamos relación con la tabla ruta
    public function ruta() {
        return $this->belongsTo('App\Ruta');
    }

    //Creamos relación con la tabla punto
    public function punto() {
        return $this->belongsTo('App\Punto');
    }

    //Creamos relación con la tabla ciudad
    public function ciudad() {
        return $this->hasManyThrough('App\Ciudad', 'App\Ruta', 'id', 'id', 'ruta_id', 'ciudad_id');
    }

    
    

}
