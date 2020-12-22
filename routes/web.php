<?php

Auth::routes();

//Ruta para cliente Password
Route::get('/client', 'ClientController@index')->middleware('auth');


Route::get('lang/{lang}', function($lang) {
  \Session::put('lang', $lang);
  return \Redirect::back();
})->middleware('web')->name('change_lang');


Route::get('/', 'HomeController@home2');
Route::get('/home', 'HomeController@home2');
Route::get('/{idm}/', 'HomeController@home')->name('Home');

//Prueba formularios anidados
Route::get('/formanidados', 'estadoController@formanidados')->name('formanidados');
Route::get('/provinciasXEstado/{estado}', 'provinciaController@showXEstado')->name('provinciasXEstado');
Route::get('/{idm}/ciudades', 'CiudadController@ciudades')->name('ciudades');
Route::get('/{idm}/Espana', 'EspanaController@Espana')->name('Espana');
Route::get('/{idm}/Toledo', 'ToledoController@Toledo')->name('Toledo');
Route::get('/{idm}/ToledoCatedral', 'ToledoController@ToledoCatedral')->name('ToledoCatedral');
Route::get('/{idm}/Valencia', 'ValenciaController@Valencia')->name('Valencia');
Route::get('/{idm}/Valencia-lonja-seda', 'ValenciaController@ValenciaLonja')->name('ValenciaLonja');
Route::get('/{idm}/Valencia-mercado-central', 'ValenciaController@ValenciaMercadoC')->name('ValenciaMercadoC');




//*******
//* APP *
//*******

Route::get('/getPaises', 'EstadoController@show')->name('getPaises');
Route::get('/getPunto/{id}', 'PuntoController@showXId')->name('getPunto');
Route::get('/getPuntos/{request}', 'PuntoController@showXMap')->name('getPuntos');
Route::get('/getLocalidades', 'CiudadController@showConPuntos')->name('getLocalidades');



Route::group(['middleware' => 'auth'], function () {

    //**********
    //* Master *
    //**********
    Route::get('/es/master', 'PuntoController@masterPuntos')->name('master');
    //Route::get('/master', function () { return view('paginas.master.index'); });
    Route::get('/master/puntos', 'PuntoController@PuntosxEstado');

    //Nuevo punto 
    Route::get('/es/masterPuntoNuevo', 'PuntoController@puntoNuevo1')->name('masterPuntoNuevo1');
    //Route::get('/masterPuntoNuevo', 'PuntoController@create')->name('masterPuntoNuevo1');
    Route::post('/es/masterPuntoNuevo2', 'PuntoController@puntoNuevo2')->name('masterPuntoNuevo2');

    //Modificar punto 
    Route::get('/es/masterPuntoModificar/{id}', 'PuntoController@puntoModificar1')->name('masterPuntoModificar1'); 
    Route::post('/es/masterPuntoModificar2/{id}', 'PuntoController@puntoModificar2');

    //Borrar punto
    Route::get('/es/masterPuntoBorrar1/{id}', function($id){ return view('paginas.master.masterPuntoBorrar1')->with('id', $id);});
    Route::get('/es/masterPuntoBorrar2/{id}', 'PuntoController@puntoBorrar2')->name('masterPuntoBorrar2');

});

//Pruebas
    Route::get('/es/prueba', function(){ return view('paginas.pruebas.bootstrap');});
