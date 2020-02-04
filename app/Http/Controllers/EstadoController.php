<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstadoController extends Controller
{
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


}
