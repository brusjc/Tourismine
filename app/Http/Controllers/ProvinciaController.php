<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;

class ProvinciaController extends Controller
{

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


}
