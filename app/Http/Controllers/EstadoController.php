<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado;
class EstadoController extends Controller
{


//*******
//* API *
//*******

    public function show()
    {
        //1.- Comprobamos las variables

        //Paso2: ejecutamos la consulta
        try
        {
            $dato = Estado::orderBy('nombre')->get();
        } catch (\Exception $e) {
            return response()->json(['status'=>['error'=>2, 'message'=>"Error en consulta"], 'data'=>null]);
        }

        //Paso 3: Devolvemos la respuesta
        if(count($dato)==0)
        {
            return response()->json(['status'=>['error'=>3, 'message'=>'No hay datos'], 'data'=>null]);
        } else {
            return response()->json(['status'=>['error'=>0, 'message'=>""], 'data'=>$dato]);
        }

    }


//*******
//* WEB *
//*******

    public function formanidados()
    {
        //Paso 1: Sanitizamos las variables

        //Paso 2: Obtenemos datos de estados
        $estados=$this->show();
        $estados = @json_decode(json_encode($estados), true);
        $estados=$estados['original']['data'];
        //var_dump($estados);
        //return $resultado;
        
        //url de vuelta
        session(['BC1' => '/examenes-jqcv']);
        session(['BC1texto' => 'Exàmens JQCV']);

        return view('paginas.pruebas.formanidados', compact('estados'));
    }




}
