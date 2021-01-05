<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
use Illuminate\Support\Facades\DB;

class ValenciaController extends Controller
{


//*******
//* WEB *
//*******

    public function Valencia($idm)
    {
        $pais = 'Espana';
        $ciudad = 'Valencia';
        $monumento = '';
        $miurl=app('App\Http\Controllers\CiudadController')->generaBC($idm, $pais, $ciudad, $monumento);
        session(['BC1' => '/'.$idm.'/'.$pais]);
        return view('paginas.ciudades.Espana.'.$ciudad.'.'.$ciudad, compact('miurl'));
    }

    public function ValenciaLonja($idm)
    {
        $pais = 'Espana';
        $ciudad = 'Valencia';
        $monumento = 'ValenciaLonja';
        $miurl=app('App\Http\Controllers\CiudadController')->generaBC($idm, $pais, $ciudad, $monumento);
        session(['BC1' => '/'.$idm.'/'.$pais]);
        session(['BC2' => '/'.$idm.'/'.$ciudad]);
        return view('paginas.ciudades.Espana.'.$ciudad.'.ValenciaLonja', compact('miurl'));
    }

    public function ValenciaMercadoC($idm)
    {
        $pais = 'Espana';
        $ciudad = 'Valencia';
        $monumento = 'ValenciaMercadoC';
        $miurl=app('App\Http\Controllers\CiudadController')->generaBC($idm, $pais, $ciudad, $monumento);
        session(['BC1' => '/'.$idm.'/'.$pais]);
        session(['BC2' => '/'.$idm.'/'.$ciudad]);
        return view('paginas.ciudades.Espana.'.$ciudad.'.ValenciaMercadoCentral', compact('miurl'));
    }

    public function CiudadArtesCiencias($idm)
    {
        $pais = 'Espana';
        $ciudad = 'Valencia';
        $monumento = 'ValenciaCiudadArtesCiencias';
        $miurl=app('App\Http\Controllers\CiudadController')->generaBC($idm, $pais, $ciudad, $monumento);
        session(['BC1' => '/'.$idm.'/'.$pais]);
        session(['BC2' => '/'.$idm.'/'.$ciudad]);
        return view('paginas.ciudades.Espana.'.$ciudad.'.ValenciaCiudadArtesCiencias', compact('miurl'));
    }

    public function PlazaRedonda($idm)
    {
        $pais = 'Espana';
        $ciudad = 'Valencia';
        $monumento = 'ValenciaPlazaRedonda';
        $miurl=app('App\Http\Controllers\CiudadController')->generaBC($idm, $pais, $ciudad, $monumento);
        session(['BC1' => '/'.$idm.'/'.$pais]);
        session(['BC2' => '/'.$idm.'/'.$ciudad]);
        return view('paginas.ciudades.Espana.'.$ciudad.'.ValenciaPlazaRedonda', compact('miurl'));
    }



}