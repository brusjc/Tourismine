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
    Route::get('/master', 'PuntoController@PuntosxEstado');
    Route::get('/master/puntos', 'PuntoController@PuntosxEstado');

    //Nuevo punto 
    Route::get('/masterPuntoNuevo', 'PuntoController@create');  //Entrada a formulario crear
    Route::post('masterPuntoNuevo2', 'PuntoController@store');  //Respuesta del formulario crear

    //Modificar punto 
    Route::get('/masterPuntoModificar/{id}', 'PuntoController@edit');  //Entrada a formulario editar
    Route::post('masterPuntoModificar2/{id}', 'PuntoController@update');  //Respuesta del formulario crear



});

Auth::routes();


