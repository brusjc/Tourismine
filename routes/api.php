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
Route::get('getPuntoInteres', 'PuntoController@getPunto');
Route::get('getPuntosxEstado', 'PuntoController@getPuntosxEstado');


//***********
//* Estados *
//***********
Route::get('getNaciones', 'NacionController@getNaciones');


//**************
//* Provincias *
//**************
Route::get('getLocalidades', 'LocalidadController@getLocalidades');


//***********
//* Pruebas *
//***********
Route::get('prueba', 'NacionController@getPrueba');




