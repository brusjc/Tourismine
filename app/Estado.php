<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{

    //**************
    //* Relaciones *
    //**************

	//Creamos relación con la tabla provincias
	public function Provincia() {
		return $this->hasMany('App\Provincia');
	}

	//Creamos relación con la tabla puntos
	public function punto() {
        return $this->hasManyThrough('App\Punto', 'App\Provincia', 'estado_id', 'provincia_id', 'id', 'id');
	}

}
