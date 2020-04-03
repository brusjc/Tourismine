<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Punto;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'id' 			=> $faker->id,
        'ciudad_id'     => $faker->ciudad_id,
        'nombre'        => $faker->nombre,
        'descripcion'   => $faker->descripcion,
        'leyenda'       => $faker->leyenda,
        'referencia'    => $faker->referencia,
        'telefono'      => $faker->telefono,
        'web'           => $faker->web,
        'longitud'      => $faker->longitud,
        'latitud'       => $faker->latitud,
        'coste'         => $faker->coste,
        'horario_id'    => $faker->horario_id,
        'tipo_id'       => $faker->tipo_id,
        'puntos'        => $faker->puntos,
        'siglo'         => $faker->siglo,
        'etiquetas'     => $faker->etiquetas,
        'curiosidades'  => $faker->curiosidades,
        'created_at' 	=> $faker->created_at,
        'updated_at' 	=> $faker->updated_at,
    ];
});
