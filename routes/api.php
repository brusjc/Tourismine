<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Rutas PASSPORT

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', 'Api\UserController@register');
Route::get('/logout', 'Api\UserController@logout')->middleware('auth:api');
Route::post('/login', 'Api\UserController@login');



//Resto rutas

Route::get('/puntosSinAutorizacion', 'PuntoController@getPuntosxProvincia')->middleware('auth:api');

Route::get('/puntosXProvincia', 'PuntoController@getPuntosxProvincia')->middleware('auth:api');

Route::get('clients/puntosXProvincia', 'PuntoController@getPuntosxProvincia');


