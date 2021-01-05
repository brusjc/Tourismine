<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Textosiglo extends Model
{

    //**************
    //* Relaciones *
    //**************

    //Creamos relación con la tabla provincia
    public function texto() {
        return $this->belongsTo('App\Texto');
    }
}
