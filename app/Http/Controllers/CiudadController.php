<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
use Illuminate\Support\Facades\DB;

class CiudadController extends Controller
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
            session(['BC2texto' => $ciudad.'.'.$ciudad.'_breadcrumb' ]);
        }
        if($monumento!="")
        {
            session(['BC3' => '/'.session('lang').'/'.$monumento]);
            session(['BC3texto' => $ciudad.'.'.$monumento.'_breadcrumb' ]);
        }

        //Paso 4: Redirigimos a la vista
        $miurl='/'.session('lang').'/'.$url;

        return $miurl;
    }

    public function index()
    {
        //1.- Comprobamos las variables

        //Paso2: ejecutamos la consulta
        try 
        {
            $dato = Ciudad::orderBy('nombre', 'asc')
                ->with('Provincia')
                ->get();
        } catch (\Exception $e) {
            return response()->json(['success'=>['error'=>1, 'message'=>"Error en consulta"], 'data'=>null]);
        }

        //Paso 3: Devolvemos la respuesta
        if (count($dato)==0)
        {
            return response()->json(['success'=>['error'=>2, 'message'=>"No hay datos"], 'data'=>null]);
        } else {
            return response()->json(['success'=>['error'=>0, 'message'=>""], 'data'=>$dato]);
        }
    }

    public function showConPuntos()
    {
        //1.- Comprobamos las variables

        //Paso2: ejecutamos la consulta
        try
        {
            $dato = DB::table('ciudads')
            ->distinct()
            ->join('puntos', 'puntos.ciudad_id', '=', 'ciudads.id')
            ->join('provincias', 'provincias.id', '=', 'ciudads.provincia_id')
            ->join('estados', 'estados.id', '=', 'provincias.estado_id')
            ->select('ciudads.nombre as ciudad', 'provincias.nombre as provincia', 'estados.nombre as estado')
            ->where('ciudads.visible', '=', 1)
            ->orderBy('estados.nombre')
            ->orderBy('provincias.nombre')
            ->orderBy('ciudads.nombre')
            ->get();
        } catch (\Exception $e) {
            return response()->json(['success'=>['error'=>1, 'message'=>"Error en consulta"], 'data'=>null]);
        }

        //Paso 3: Devolvemos la respuesta
        if (count($dato)==0)
        {
            return response()->json(['success'=>['error'=>2, 'message'=>"No hay datos"], 'data'=>null]);
        } else {
            return response()->json(['success'=>['error'=>0, 'message'=>""], 'data'=>$dato]);
        }
    }


//*******
//* WEB *
//*******
    public function ciudades($idm)
    {

        //Paso 1.- Ejecutamos la consulta
        $ciudades=$this->showConPuntos();
        $ciudades = @json_decode(json_encode($ciudades), true);
        $ciudades=$ciudades['original']['data'];
        //return $ciudades;

        //Paso 2: Comprobamos si la url corresponde al lenguaje
        if(!session('lang')) { session(['lang' => 'es']); }
        if($idm!=session('lang'))
        {
            if(session('lang')=="es")
            {
               return redirect('/es/ciudades');
            } else {
               return redirect('/en/ciudades');
            }
        }

        //Paso 3: Creamos los breadcrumbs
        switch (session('lang'))
        {
            case "es":
                session(['BC1' => '/es/ciudades']);
                session(['BC1texto' => 'Ciudades']);
                break;
            case "en":
                session(['BC1' => '/en/ciudades']);
                session(['BC1texto' => 'Cities']);
                break;
            default:
                session(['BC1' => '/es/ciudades']);
                session(['BC1texto' => 'Ciudades']);
                break;
        }
        $miurl='/'.session('lang').'/ciudades';

        //Paso 4: Redirigimos a la vista
        return view('paginas.ciudades.ciudades', compact('ciudades'));
    }

    
}
