<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;

class ProvinciaController extends Controller
{


//*******
//* API *
//*******
    public function getProvincias(Request $request) {

        if (!Utils::autorizacionValida($request->header('Authorization'))) {
            abort(404);
        }

        $estado_id = $request->estado_id;
        $provincias = [];

        if ($estado_id == null) {
            $success = [
                'error' => 1,
                'message' => "No se ha especificado el código del país"
            ];

            $data = [
                'provincias' => null
            ];

            return response()->json([
                'status' => $success,
                'data' => $data
            ]);
        }

        $respuesta = provincia::where('estado_id', $estado_id)->get();

        if (count($respuesta) > 0) {
            $provincias = $respuesta;
        } else {
            $success = [
                'error' => 1,
                'message' => "No hay ninguna provincia asociada al código del país"
            ];

            $data = [
                'provincias' => null
            ];

            return response()->json([
                'status' => $success,
                'data' => $data
            ]);
        }

        $success = [
            'error' => 0,
            'message' => ""
        ];

        $data = [
            'provincias' => $provincias
        ];

        return response()->json([
            'status' => $success,
            'data' => $data
        ]);
    }

    public function index()
    {
        try {
            $dato = Provincia::orderBy('nombre', 'asc')
                ->with('Estado')
                ->get();
        } catch (\Exception $e) {
            return response()->json(
                ['success'=>['error'=>1, 'message'=>"Error al obtener las provincias"], 'data'=>$e]
            );
        }

        if (count($dato)>0){
            return response()->json(
                ['success'=>['error'=>0, 'message'=>""], 'data'=>$dato]
            );
        } else {
            return response()->json(
                ['success'=>['error'=>2, 'message'=>"No hay ninguna provincia"], 'data'=>null]
            );
        }
    }

    public function showXEstado($estado)
    {
//var_dump(($estado);
        //1.- Prepara las variables
        $valor=(int)$estado;
        if ($valor==0) {
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales'], 'data'=>null]);
        }
        //return response()->json(['status' =>['error'=>9, 'message'=>'Todo ok'], 'data'=>$dato]);

        //2.- Hacemos la consulta
        try {
            $dato = Provincia::where('estado_id',  $valor)
                ->orderBy('nombre', 'asc')
                ->get();
        } catch (\Exception $e) {
            return response()->json(['status'=>['error'=>1, 'message'=>'Error al obtener los resultados'], 'data'=>null]);
        }        

        //3.-Retornamos resultado
        if(count($dato)==0){
            return response()->json(['status'=>['error'=>2, 'message'=>'No hay ningún dato con estas características'], 'data'=>null]);
        } else {
            return response()->json(['status'=>['error'=>0, 'message'=>''], 'data'=>$dato]);
        } 
    }





}
