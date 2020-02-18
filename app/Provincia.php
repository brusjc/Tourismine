<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{

    //**************
    //* Relaciones *
    //**************

	//Creamos relación con la tabla estado
	public function estado() {
		return $this->belongsTo('App\Estado');
	}

	//Creamos relación con la tabla ciudad
	public function ciudad() {
		return $this->hasMany('App\Ciudad');
	}

	//Creamos relación con la tabla punto
	public function punto() {
		return $this->hasMany('App\Punto');
	}

}
