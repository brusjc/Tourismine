<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{

    //**************
    //* Relaciones *
    //**************

	//Creamos relación con la tabla provincia
	public function provincia() {
		return $this->belongsTo('App\Provincia');
	}

	//Creamos relación con la tabla punto
	public function punto() {
		return $this->hasMany('App\Punto');
	}
}
