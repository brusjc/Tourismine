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
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes


    //**********
    //* Master *
    //**********
    //Route::get('/master', function () { return view('paginas.master.master'); });
    Route::get('/master', 'PuntoController@PuntosxProvincia')->name('master');
    Route::get('/master/puntos', 'PuntoController@PuntosxEstado');

    //Nuevo punto 
    Route::get('/masterPuntoNuevo', 'PuntoController@create');  //Entrada a formulario crear
    Route::post('masterPuntoNuevo2', 'PuntoController@store')->name('masterPuntoNuevo2');  //Respuesta del formulario crear

    //Modificar punto 
    Route::get('/masterPuntoModificar/{id}', 'PuntoController@edit')->name('masterPuntoModificar1');  //Entrada a formulario editar
    Route::post('masterPuntoModificar2/{id}', 'PuntoController@update')->name('masterPuntoModificar2');  //Respuesta del formulario crear

    //Borrar punto
    Route::get('masterPuntoBorrar1/{id}', function ($id) { return view('paginas.master.masterPuntoBorrar1')->with('id', $id); });  //Confirmar borrar punto
    Route::get('masterPuntoBorrar2/{id}', 'PuntoController@destroy');  //Borrar punto



});

Auth::routes();


