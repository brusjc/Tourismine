<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{

    //**************
    //* Relaciones *
    //**************

	//Creamos relación con la tabla provincia
	public function Provincia() {
		return $this->belongsTo('App\Provincia');
	}

	//Creamos relación con la tabla punto
	public function Punto() {
		return $this->hasMany('App\Punto');
	}
}
