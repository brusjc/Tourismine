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
        //Paso 1: ejecutamos la consulta
        try {
            $datos = Estado::orderBy('nombre')->get();
        } catch (\Exception $e) {
            return response()->json(["status"=>['error'=>1, "message"=>"prmaster01: Error al obtener los estados"], 'data'=>null]);
        }        

        //Paso 2: enviamos el json
        if(count($datos)==0){
            return response()->json(["status"=>['error'=>2, "message"=>"prmaster02: No hay aún ningún estado"], 'data'=>null]);
        } else {
            return response()->json(["status"=>['error'=>0, "message"=>""], 'data'=>$datos]);
        }
    }

    public function getEstados(Request $request) {
        
        if (!Utils::autorizacionValida($request->header('Authorization'))) {
            abort(404);
        }

        $respuesta = Estado::get();
        $estados = [];

        if (count($respuesta) > 0) {
            $estados = $respuesta;
        }

        $success = [
            'error' => 0,
            'message' => ""
        ];

        $data = [
            'estados' => $estados
        ];

        return response()->json([
            'status' => $success,
            'data' => $data
        ]);
    }

    public function getPrueba(Request $request) {
        return response()->File(storage_path('icono'));
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
