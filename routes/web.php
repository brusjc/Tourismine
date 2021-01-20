<?php

Auth::routes();

Route::get('lang/{lang}', function($lang) {
  \Session::put('lang', $lang);
  return \Redirect::back();
})->middleware('web')->name('change_lang');

Route::get('/', 'HomeController@home2');
Route::get('/home', 'HomeController@home2');
Route::get('/{idm}/', 'HomeController@home')->name('Home');

//Prueba formularios anidados
Route::get('/provinciasXEstado/{estado}', 'provinciaController@showXEstado')->name('provinciasXEstado');
Route::get('/{idm}/ciudades', 'CiudadController@ciudades')->name('ciudades');
Route::get('/{idm}/Espana', 'EspanaController@Espana')->name('Espana');
Route::get('/{idm}/Toledo', 'ToledoController@Toledo')->name('Toledo');
Route::get('/{idm}/ToledoCatedral', 'ToledoController@ToledoCatedral')->name('ToledoCatedral');
Route::get('/{idm}/Valencia', 'ValenciaController@Valencia')->name('Valencia');
Route::get('/{idm}/Valencia-lonja-seda', 'ValenciaController@ValenciaLonja')->name('ValenciaLonja');
Route::get('/{idm}/Valencia-mercado-central', 'ValenciaController@ValenciaMercadoC')->name('ValenciaMercadoC');
Route::get('/{idm}/Valencia-Ciudad-Artes-Ciencias', 'ValenciaController@CiudadArtesCiencias')->name('ValenciaCiudadArtesCiencias');
Route::get('/{idm}/Valencia-Plaza-Redonda', 'ValenciaController@PlazaRedonda')->name('ValenciaPlazaRedonda');




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
    Route::get('/es/master/{message?}', 'PuntoController@masterPuntos')->name('master');
    //Route::get('/master', function () { return view('paginas.master.index'); });
    Route::get('/master/puntos', 'PuntoController@PuntosxEstado');

    //Nuevo punto 
    Route::get('/es/PuntoNuevo', 'PuntoController@puntoNuevo1')->name('masterPuntoNuevo1');
    Route::post('/es/masterPuntoNuevo2', 'PuntoController@puntoNuevo2')->name('masterPuntoNuevo2');

    //Modificar punto 
    Route::get('/es/masterPuntoModificar/{id}', 'PuntoController@puntoModificar1')->name('masterPuntoModificar'); 
    Route::post('/es/masterPuntoModificar2/{id}', 'PuntoController@puntoModificar2');

    //Borrar punto
    Route::get('/es/PuntoBorrar1/{id}', function($id){ return view('paginas.master.masterPuntoBorrar1')->with('id', $id);});
    Route::get('/es/masterPuntoBorrar2/{id}', 'PuntoController@puntoBorrar2')->name('masterPuntoBorrar2');

    //Borrar texto
    Route::get('/es/masterTextoBorrar1/{id}', 'PuntoController@textoBorrar1')->name('masterTextoBorrar1'); 
    Route::get('/es/masterTextoBorrar2/{id}', 'PuntoController@textoBorrar2'); 

    //Rutas
    Route::get('/es/rutas/{id}', 'RutaController@rutasXCiudad')->name('rutasXCiudad');

    //Ruta Nuevo
    Route::get('/es/ruta-nuevo/{errors?}', 'RutaController@rutaNuevo')->name('rutaNuevo');
    Route::post('/es/ruta-nuevo2', 'RutaController@rutaNuevo2')->name('rutaNuevo2');

    //Ruta Modificar
    Route::get('/es/ruta-modificar/{id}', 'RutaController@rutaModificar')->name('rutaModificar');
    Route::post('/es/ruta-modificar2/{id}', 'RutaController@rutaModificar2')->name('rutaModificar2');

    //Ruta Borrar
    Route::get('/es/ruta-borrar1/{id}', 'RutaController@rutaBorrar1')->name('rutaBorrar1');
    Route::get('/es/ruta-borrar2/{id}', 'RutaController@rutaBorrar2')->name('rutaBorrar2');

    //Ruta Punto Nuevo
    Route::get('/es/ruta-punto-nuevo/{id}', 'RutaPuntoController@rutaPuntoNuevo')->name('rutaPuntoNuevo');
    Route::post('/es/ruta-punto-nuevo2/{id}', 'RutaPuntoController@rutaPuntoNuevo2')->name('rutaPuntoNuevo2');

    //Ruta Punto Modificar
    Route::get('/es/ruta-punto-modificar/{id}', 'RutapuntoController@rutaPuntoModificar')->name('rutaPuntoModificar');
    Route::post('/es/ruta-punto-modificar2/{id}', 'RutapuntoController@rutaPuntoModificar2')->name('rutaPuntoModificar2');

    //Ruta Punto Borrar
    Route::get('/es/ruta-punto-borrar1/{id}', function($id){ return view('paginas.master.rutaPuntoBorrar1')->with('id', $id);});
    Route::get('/es/ruta-punto-borrar2/{id}', 'RutapuntoController@rutaPuntoBorrar')->name('rutaPuntoBorrar');

    Route::get('/master/redactor', 'PuntoController@Redactor');

});

//Pruebas
    //Route::get('/formanidados', 'estadoController@formanidados')->name('formanidados');
    //Route::get('/es/prueba', function(){ return view('paginas.pruebas.bootstrap');});


//Ruta para cliente Password
//Route::get('/client', 'ClientController@index')->middleware('auth');
//Route::get('/client', function(){ return view('paginas.client'); })->middleware('auth');
