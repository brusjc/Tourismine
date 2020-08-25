<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Punto extends Model
{

    protected $fillable = ['ciudad_id', 'nombre', 'descripcion', 'leyenda', 'referencia', 'telefono', 'web', 'longitud', 'latitud', 'coste', 'horario_id', 'tipo_id', 'puntos', 'siglo', 'etiquetas', 'curiosidades'];

    //**************
    //* Relaciones *
    //**************

	//Creamos relación con la tabla ciudad
	public function ciudad() {
		return $this->belongsTo('App\Ciudad');
	}

	//Creamos relación con la tabla provincia
	public function provincia() {
        return $this->hasManyThrough('App\Provincia', 'App\Ciudad', 'id', 'id', 'ciudad_id', 'provincia_id');
	}

	//Creamos relación con la tabla estado
	public function estado() {
        return $this->hasManyThrough('App\Estado', 'App\Provincia', 'id', 'id', 'provincia_id', 'estado_id');
	}

	//Creamos relación con la tabla tipo
	public function tipo() {
        return $this->belongsTo('App\Tipo');
	}

}
