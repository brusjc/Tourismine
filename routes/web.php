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
//* Master *
//**********
    Route::get('/master', function () { return view('paginas.master.master'); }); 


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
    Route::get('/master/puntos', 'PuntoController@PuntosxEstado');
    Route::get('/master/punto/nuevo', 'PuntoController@create');
    Route::post('puntos', 'PuntoController@store');  //Respuesta del formulario crear



});

Auth::routes();


