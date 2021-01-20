<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorpunto extends Model
{

    //**************
    //* Relaciones *
    //**************

    //Creamos relación con la tabla user
    public function user() {
        return $this->belongsTo('App\User');
    }

    //Creamos relación con la tabla punto
    public function punto() {
        return $this->belongsTo('App\Punto');
    }
}
