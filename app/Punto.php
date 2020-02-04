<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Punto extends Model
{

    //**************
    //* Relaciones *
    //**************

	//Creamos relación con la tabla provincia
	public function provincia() {
		return $this->belongsTo('App\Provincia');
	}

	//Creamos relación con la tabla temanombre
	public function estado() {
        return $this->hasManyThrough('App\Estado', 'App\Provincia', 'id', 'id', 'provincia_id', 'estado_id');
	}

}
