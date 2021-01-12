<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Rutas PASSPORT

Route::post('/register', 'PassportAuthController@register');
Route::get('/logout', 'Api\UserController@logout')->middleware('auth:api');
Route::post('list', 'pruebaController@list')->middleware('auth:api');


//Resto rutas
Route::get('/puntosSinAutorizacion', 'PuntoController@getPuntosxProvincia')->middleware('auth:api');
Route::get('/puntosXProvincia', 'PuntoController@getPuntosxProvincia')->middleware('auth:api');
Route::get('clients/puntosXProvincia', 'PuntoController@getPuntosxProvincia');




//*******
//* APP *
//*******
    Route::post('/login', 'PassportAuthController@login');
    Route::post('/crearUsuario', 'PassportAuthController@register');

    Route::group(['middleware' => 'auth:api'], function ()
    {
        Route::get('/user', function(Request $request) { return $request->user();});
    	Route::get('/getPaises', 'EstadoController@show')->name('getPaises');
        Route::get('/getLocalidades', 'CiudadController@showConPuntos')->name('getLocalidades');


        
        Route::get('/getPunto/{id}', 'PuntoController@showXId')->name('getPunto');
    	Route::get('/getPuntos/{request}', 'PuntoController@showXMap')->name('getPuntos');
        Route::get('/getPuntoInteres/{id}', 'PuntoController@showXId')->name('getPuntoInteres');
    });
