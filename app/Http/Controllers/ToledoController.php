<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
use Illuminate\Support\Facades\DB;

class ToledoController extends Controller
{



//*******
//* WEB *
//*******

    public function Toledo($idm)
    {

        $pais = 'Espana';
        $ciudad = 'Toledo';
        $monumento = '';
        $miurl=app('App\Http\Controllers\CiudadController')->generaBC($idm, $pais, $ciudad, $monumento);
        return view('paginas.ciudades.Espana.'.$ciudad.'.'.$ciudad, compact('miurl'));
    }

    public function ToledoCatedral($idm)
    {
        $pais = 'Espana';
        $ciudad = 'Toledo';
        $monumento = 'ToledoCatedral';
        $miurl=app('App\Http\Controllers\CiudadController')->generaBC($idm, $pais, $ciudad, $monumento);
        return view('paginas.ciudades.'.$pais.'.'.$ciudad.'.'.$monumento, compact('miurl'));
    }

    
}
