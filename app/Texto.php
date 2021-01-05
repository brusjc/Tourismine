<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{

    protected $fillable = ['texto', 'tipo_id', 'punto_id'];
    

    //**************
    //* Relaciones *
    //**************

    //Creamos relación con la tabla provincia
    public function punto() {
        return $this->belongsTo('App\Punto');
    }

    //Creamos relación con la tabla punto
    public function textosiglo() {
        return $this->hasMany('App\Textosiglo');
    }
}