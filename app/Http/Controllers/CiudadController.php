<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;

class CiudadController extends Controller
{
    public function index()
    {
        try {
            $dato = Ciudad::orderBy('nombre', 'asc')
                ->with('Provincia')
                ->get();
        } catch (\Exception $e) {
            return response()->json(
                ['success'=>['error'=>1, 'message'=>"Error al obtener las ciudades"], 'data'=>$e]
            );
        }

        if (count($dato)>0){
            return response()->json(
                ['success'=>['error'=>0, 'message'=>""], 'data'=>$dato]
            );
        } else {
            return response()->json(
                ['success'=>['error'=>2, 'message'=>"No hay ninguna ciudad"], 'data'=>null]
            );
        }
    }
}
