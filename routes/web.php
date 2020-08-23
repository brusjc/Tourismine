<?php
Route::get('/formanidados', 'estadoController@formanidados')->name('formanidados');

Auth::routes();

//Ruta para cliente Password
Route::get('/client', 'ClientController@index')->middleware('auth');


Route::get('lang/{lang}', function($lang) {
  \Session::put('lang', $lang);
  return \Redirect::back();
})->middleware('web')->name('change_lang');


Route::get('/', function () { return view('paginas.home'); });
Route::get('/homeprueba', function () { return view('paginas.home'); });
Route::get('/home', function () { return view('paginas.home'); });



Route::group(['middleware' => 'auth'], function () {

    //**********
    //* Master *
    //**********
    //Route::get('/master', function () { return view('paginas.master.master'); });
    Route::get('/master', 'PuntoController@masterPuntos')->name('master');
    Route::get('/master/puntos', 'PuntoController@PuntosxEstado');

    //Nuevo punto 
    Route::get('/masterPuntoNuevo', 'PuntoController@puntoNuevo1')->name('masterPuntoNuevo1');
    //Route::get('/masterPuntoNuevo', 'PuntoController@create')->name('masterPuntoNuevo1');
    Route::post('masterPuntoNuevo2', 'PuntoController@puntoNuevo2')->name('masterPuntoNuevo2');

    //Modificar punto 
    Route::get('/masterPuntoModificar/{id}', 'PuntoController@puntoModificar1')->name('masterPuntoModificar1'); 
    Route::post('masterPuntoModificar2/{id}', 'PuntoController@puntoModificar2');

    //Borrar punto
    Route::get('masterPuntoBorrar1/{id}', function($id){ return view('paginas.master.masterPuntoBorrar1')->with('id', $id);});
    Route::get('masterPuntoBorrar2/{id}', 'PuntoController@puntoBorrar2')->name('masterPuntoBorrar2');

});

//Prueba formularios anidados
Route::get('/provinciasXEstado/{estado}', 'provinciaController@showXEstado')->name('provinciasXEstado');
Route::get('/ciudades', 'ciudadController@ciudades')->name('ciudades');
