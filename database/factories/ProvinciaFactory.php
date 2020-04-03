<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'id' 			=> $faker->id,
        'estado_id'     => $faker->estado_id,
        'nombre'        => $faker->nombre,
        'longitud'   	=> $faker->longitud,
        'latitud'       => $faker->latitud,
    ];
});
