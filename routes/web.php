<?php


Route::group(['middleware' => ['web']], function () {
 
	Route::get('/', function () { return view('paginas.home'); });
	Route::get('/home', function () { return view('paginas.home'); });
 
    Route::get('lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return \Redirect::back();
    })->where([
        'lang' => 'en|es'
    ]);




//**********
//* Puntos *
//**********


});



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

Auth::routes();


