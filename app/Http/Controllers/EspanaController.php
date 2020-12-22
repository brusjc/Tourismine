<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EspanaController extends Controller
{



    public function generaBC($idm, $pais, $ciudad, $monumento)
    {
        //Paso 1: Definimos la página fin
        if ($monumento!=""){
            $url = $monumento;
        } else if ($ciudad!=""){
            $url = $ciudad;
        } else {
            $url = $pais;
        }
        //Paso 2: Comprobamos si la url corresponde al lenguaje
        if(!session('lang')) { session(['lang' => 'es']); }
        if($idm!=session('lang'))
        {
            switch (session('lang'))
            {
                case "es":
                   return redirect('/es/'.$url);
                   break;
                case "en":
                   return redirect('/en/'.$url);
                   break;
                default:
                    session(['lang' => 'es']);
                   return redirect('/es/'.$url);
                   break;
            }
        }

        //Paso 3: Creamos los breadcrumb
        session(['BC1' => '/'.session('lang').'/'.$pais]);
        session(['BC1texto' => 'ciudades.'.$pais.'_breadcrumb' ]);
        if($ciudad!="")
        {
            session(['BC2' => '/'.session('lang').'/'.$ciudad]);
            session(['BC2texto' => 'ciudades.'.$ciudad.'_breadcrumb' ]);
        }
        if($monumento!="")
        {
            session(['BC3' => '/'.session('lang').'/'.$monumento]);
            session(['BC3texto' => 'ciudades.'.$monumento.'_breadcrumb' ]);
        }

        //Paso 4: Redirigimos a la vista
        $miurl='/'.session('lang').'/'.$url;

        return $miurl;
    }


//*******
//* WEB *
//*******

    public function Espana($idm)
    {
        $pais = 'Espana';
        $ciudad = '';
        $monumento = '';
        $miurl=$this->generaBC($idm, $pais, $ciudad, $monumento);
        return view('paginas.ciudades.Espana.Espana', compact('miurl'));
    }

    
}
