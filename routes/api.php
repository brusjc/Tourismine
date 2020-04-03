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
Route::get('getPuntoStore/{request}', 'PuntoController@store')->name('getPuntoStore');  //API Crear punto
Route::post('postPuntoUpdate/[request}/{id}', 'PuntoController@update')->name('postPuntoUpdate');  //API Modificar punto


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




