<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Auth;
use App\Punto;
use App\Provincia;
use App\usuariosPuntosInteres;

use App\Helpers\Utils;

class PuntoController extends Controller
{
    private $cliente;
    
    public function __construct(){
        $this->cliente = new Client([
            'base_uri'=>'http://localhost/api/',  // Base URI is used with relative requests
            'timeout' =>2.0,
        ]);
    }

    public function getPuntos(Request $request) {
        
        if (!Utils::autorizacionValida($request->header('Authorization'))) {
            abort(404);
        }

        $id_usuario = $request->user_id;
        $latitud_superior = $request->latitud_superior;
        $longitud_superior = $request->longitud_superior;
        $latitud_inferior = $request->latitud_inferior;
        $longitud_inferior = $request->longitud_inferior;

        if ($user_id == null || $latitud_superior == null || $longitud_superior == null || $latitud_inferior == null || $longitud_inferior == null) {

            $success = [
                'error' => 1,
                'message' => "Los campos introducidos no son correctos"
            ];

            $data = [
                'puntos_interes' => []
            ];

            return response()->json([
                'status' => $success,
                'data' => $data
            ]);

        }

        $respuesta = puntosInteres::where('latitud', '<', $latitud_superior)->where('latitud', '>', $latitud_inferior)->where('longitud', '<', $longitud_superior)->where('longitud', '>', $longitud_inferior)->get();
        $puntosInteres = [];

        if (count($respuesta) > 0) {
            for ($i = 0; $i < count($respuesta); $i++) {
                $visitado = usuariosPuntosInteres::where('user_id', $user_id)->where('id_punto_interes', $respuesta[$i]->id)->get();

                $puntoInteres = [
                    'id' => $respuesta[$i]->id,
                    'nombre' => $respuesta[$i]->nombre,
                    'latitud' => $respuesta[$i]->latitud,
                    'longitud' => $respuesta[$i]->longitud,
                    'tipo' => $respuesta[$i]->tipo,
                    'visitado' => (count($visitado) > 0 ? 1 : 0)
                ];

                $puntosInteres[] = $puntoInteres;
            }
        }

        $success = [
            'error' => 0,
            'message' => ""
        ];

        $data = [
            'puntos_interes' => $puntosInteres
        ];

        return response()->json([
            'status' => $success,
            'data' => $data
        ]);
    }

    public function getPunto(Request $request) {
        
        if (!Utils::autorizacionValida($request->header('Authorization'))) {
            abort(404);
        }

        $id_punto_interes = $request->id_punto_interes;

        if ($id_punto_interes == null) {

            $success = [
                'error' => 1,
                'message' => "Los campos introducidos no son correctos"
            ];

            $data = [
                'punto_interes' => null
            ];

            return response()->json([
                'status' => $success,
                'data' => $data
            ]);

        }

        $respuesta = puntosInteres::where('id', $id_punto_interes)->get();
        $puntoInteres = null;

        if (count($respuesta) > 0) {
            $respuesta_punto_interes = $respuesta[0];

            $puntoInteres = [
                'id' => $respuesta_punto_interes->id,
                'nombre' => $respuesta_punto_interes->nombre,
                'descripcion' => $respuesta_punto_interes->descripcion,
                'leyenda' => $respuesta_punto_interes->leyenda,
                'referencia' => $respuesta_punto_interes->referencia,
                'telefono' => $respuesta_punto_interes->telefono,
                'web' => $respuesta_punto_interes->web,
                'latitud' => $respuesta_punto_interes->latitud,
                'longitud' => $respuesta_punto_interes->longitud,
                'coste' => $respuesta_punto_interes->coste,
                'tipo' => $respuesta_punto_interes->tipo
            ];
        }

        $success = [
            'error' => 0,
            'message' => ""
        ];

        $data = [
            'punto_interes' => $puntoInteres
        ];

        return response()->json([
            'status' => $success,
            'data' => $data
        ]);
    }


    //API: Todos los puntos ordenados por provincia
    public function getPuntosxEstado() 
    {
       try {
            $dato = Punto::orderBy('provincia_id', 'asc')
                ->with('Provincia')
                ->with('Estado')
                ->get();
       } catch (\Exception $e) {
            return response()->json(
                ['status'=>['error'=>1, 'message'=>"Error al obtener los puntos"], 'data'=>$e]
            );        
        }

        if(count($dato)==0){
            return response()->json(
                ['status'=>['error'=>2, 'message'=>"No hay ningún punto por localidad"], 'data'=>null]
            );
        } else {
            return response()->json(
                ['status'=>['error'=>0, 'message'=>""], 'data'=>$dato]
            );
        } 
    }

    //Master: Tabla con todos los puntos por provincia
    public function PuntosxEstado()
    {
        //return "estamos en puntoxestado";
        $mirest='getPuntosxEstado';
        $response = $this->cliente->request('get', $mirest);
        $puntos = json_decode( $response->getBody()->getContents(), true );
        //return $puntos;
        return view('paginas.master.masterPuntos', compact('puntos'));
    }

    public function create()
    {
        return view('paginas.master.masterPuntoNuevo');
    }

    public function store(Request $request)
    {

        dd($request);
        return "estamos aqui";
        $punto = new Punto;
        $punto->provincia_id    = $request->input("provincia");
        $punto->nombre          = $request->input("nombre");
        $punto->descripcion     = $request->input("descripcion");
        $punto->leyenda         = $request->input("leyenda");
        $punto->referencia      = $request->input("referencia");
        $punto->telefono        = $request->input("telefono");
        $punto->web             = $request->input("web");
        $punto->longitud        = $request->input("longitud");
        $punto->latitud         = $request->input("latitud");
        $punto->coste           = $request->input("coste");
        $punto->horario_id      = $request->input("horario");
        $punto->tipo            = $request->input("tipo");
        $punto->puntos          = $request->input("puntos");
        $punto->save();





        return "estamos aqui";
    }

}
