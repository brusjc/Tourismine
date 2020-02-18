<?php

use Illuminate\Http\Request;


//********
//* User *
//********
Route::get('login', 'usuariosController@login');
Route::post('crearUsuario', 'usuariosController@crearUsuario');


//**********
//* Puntos *
//**********
Route::get('puntoNuevoApi', 'PuntoController@puntoNuevoApi');
Route::get('getPuntosInteres', 'PuntoController@getPuntos');
Route::get('getPuntoInteres/{id}', 'PuntoController@getPunto');
Route::get('getPuntosxEstado', 'PuntoController@getPuntosxEstado')->name('getPuntosxEstado');
Route::get('getPuntosxProvincia', 'PuntoController@getPuntosxProvincia')->name('getPuntosxProvincia');


//***********
//* Estados *
//***********
Route::get('getNaciones', 'EstadoController@getNaciones');


//**************
//* Provincias *
//**************
Route::get('provinciasGet', 'ProvinciaController@index')->name('provinciasGet');

//**************
//* Provincias *
//**************
Route::get('getCiudades', 'CiudadController@index')->name('getCiudades');


//***********
//* Pruebas *
//***********
Route::get('prueba', 'EstadoController@getPrueba');


//*********
//* Tipos *
//*********
Route::get('tiposGet', 'TipoController@index')->name('tiposGet');




