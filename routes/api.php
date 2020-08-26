<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Rutas PASSPORT

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', 'Api\UserController@register');
Route::post('/crearUsuario', 'Api\UserController@register');
Route::get('/logout', 'Api\UserController@logout')->middleware('auth:api');
Route::post('/login', 'Api\UserController@login');



//Resto rutas

Route::get('/puntosSinAutorizacion', 'PuntoController@getPuntosxProvincia')->middleware('auth:api');

Route::get('/puntosXProvincia', 'PuntoController@getPuntosxProvincia')->middleware('auth:api');

Route::get('clients/puntosXProvincia', 'PuntoController@getPuntosxProvincia');





//*******
//* APP *
//*******
Route::group(['middleware' => 'auth'], function () {
	Route::get('/getPaises', 'EstadoController@show')->name('getPaises');
	Route::get('/getPunto/{id}', 'PuntoController@showXId')->name('getPunto');
	Route::get('/getPuntos/{request}', 'PuntoController@showXMap')->name('getPuntos');
	Route::get('/getLocalidades', 'CiudadController@showConPuntos')->name('getLocalidades');
});
