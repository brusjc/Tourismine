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
Route::get('getPuntosxEstado', 'PuntoController@getPuntosxEstado');


//***********
//* Estados *
//***********
Route::get('getNaciones', 'EstadoController@getNaciones');


//**************
//* Provincias *
//**************
Route::get('getLocalidades', 'ProvinciaController@getLocalidades');
Route::get('provinciasGet', 'ProvinciaController@index');


//***********
//* Pruebas *
//***********
Route::get('prueba', 'EstadoController@getPrueba');


//*********
//* Tipos *
//*********
Route::get('tiposGet', 'TipoController@index');




