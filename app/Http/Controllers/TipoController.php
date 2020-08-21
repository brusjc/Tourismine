<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;

class TipoController extends Controller
{
    public function index()
    {
       try {
            $dato = Tipo::orderBy('nombre', 'asc')
                ->get();
       } catch (\Exception $e) {
            return response()->json(
                ['status'=>['error'=>1, 'message'=>"Error al obtener los tipo"], 'data'=>$e]
            );        
        }

        if(count($dato)==0){
            return response()->json(
                ['status'=>['error'=>2, 'message'=>"No hay ningún tipo"], 'data'=>null]
            );
        } else {
            return response()->json(
                ['status'=>['error'=>0, 'message'=>""], 'data'=>$dato]
            );
        } 
    }
}
