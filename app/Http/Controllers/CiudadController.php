<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
use Illuminate\Support\Facades\DB;

class CiudadController extends Controller
{

    public function index()
    {
        try 
        {
            $dato = Ciudad::orderBy('nombre', 'asc')
                ->with('Provincia')
                ->get();
        } catch (\Exception $e) {
            return response()->json(['success'=>['error'=>1, 'message'=>"Error al obtener las ciudades"], 'data'=>$e]);
        }

        if (count($dato)>0)
        {
            return response()->json(['success'=>['error'=>0, 'message'=>""], 'data'=>$dato]);
        } else {
            return response()->json(['success'=>['error'=>2, 'message'=>"No hay ninguna ciudad"], 'data'=>null]);
        }
    }

    public function ciudadesConPuntos()
    {
        //1.- Ejecutamos la consulta
        try
        {
            $dato = DB::table('ciudads')
            ->distinct()
            ->join('puntos', 'puntos.ciudad_id', '=', 'ciudads.id')
            ->join('provincias', 'provincias.id', '=', 'ciudads.provincia_id')
            ->join('estados', 'estados.id', '=', 'provincias.estado_id')
            ->select('ciudads.nombre as ciudad', 'provincias.nombre as provincia', 'estados.nombre as estado')
            ->orderBy('estados.nombre')
            ->orderBy('provincias.nombre')
            ->orderBy('ciudads.nombre')
            ->get();
        } catch (\Exception $e) {
            return response()->json(['success'=>['error'=>1, 'message'=>"Error al obtener las ciudades"], 'data'=>$e]);
        }

        //2.- Devolvemos la respuesta
        if (count($dato)>0)
        {
            return response()->json(['success'=>['error'=>0, 'message'=>""], 'data'=>$dato]);
        } else {
            return response()->json(['success'=>['error'=>2, 'message'=>"No hay ninguna ciudad"], 'data'=>null]);
        }
    }


//*******
//* WEB *
//*******
    public function ciudades()
    {
        //1.- Ejecutamos la consulta
        $ciudades=$this->ciudadesConPuntos();
        $ciudades = @json_decode(json_encode($ciudades), true);
        $ciudades=$ciudades['original']['data'];

//var_dump($ciudades);

        //2.-Enviamos a la vista
        return view('paginas.ciudades', compact('ciudades'));
    }

    
}
