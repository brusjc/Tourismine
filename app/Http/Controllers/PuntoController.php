<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Auth;
use App\Punto;
use App\Provincia;
use App\usuariosPuntosInteres;
use App\Http\Requests\PuntoRequest;

//app\Http\Requests\PuntoRequest;

use App\Helpers\Utils;

class PuntoController extends Controller
{
    private $cliente;
    
    public function __construct(){
        $this->cliente = new Client([
            'base_uri'=>'http://localhost/api/',  // Base URI is used with relative requests
            'timeout' =>10.0,
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
                'error'=>1,
                'message'=>"Los campos introducidos no son correctos"
            ];

            $data = [
                'puntos_interes'=>[]
            ];

            return response()->json([
                'status'=>$success,
                'data'=>$data
            ]);

        }

        $respuesta = puntosInteres::where('latitud', '<', $latitud_superior)->where('latitud', '>', $latitud_inferior)->where('longitud', '<', $longitud_superior)->where('longitud', '>', $longitud_inferior)->get();
        $puntosInteres = [];

        if (count($respuesta) > 0) {
            for ($i = 0; $i < count($respuesta); $i++) {
                $visitado = usuariosPuntosInteres::where('user_id', $user_id)->where('id_punto_interes', $respuesta[$i]->id)->get();

                $puntoInteres = [
                    'id'=>$respuesta[$i]->id,
                    'nombre'=>$respuesta[$i]->nombre,
                    'latitud'=>$respuesta[$i]->latitud,
                    'longitud'=>$respuesta[$i]->longitud,
                    'tipo'=>$respuesta[$i]->tipo,
                    'visitado'=>(count($visitado) > 0 ? 1 : 0)
                ];

                $puntosInteres[] = $puntoInteres;
            }
        }

        $success = [
            'error'=>0,
            'message'=>""
        ];

        $data = [
            'puntos_interes'=>$puntosInteres
        ];

        return response()->json([
            'status'=>$success,
            'data'=>$data
        ]);
    }

//    public function getPunto(Request $request) {
    public function getPunto($id) {
        /*
        if (!Utils::autorizacionValida($request->header('Authorization'))) {
            abort(404);
        }
        $id_punto_interes = $request->id_punto_interes;
        */

        $id_punto_interes = $id;

        //Comprobamos las variables del request
        if ($id_punto_interes == null) {
            return response()->json([
                'status'=>['error'=>1, 'message'=>"Los campos introducidos no son correctos"],
                'punto_interes'=>null
            ]);
        }

        //Hacdemos la consulta
        $respuesta = Punto::where('id', $id_punto_interes)->get();
        //$puntoInteres = null;

        //Devolvemos la respuesta
        if(count($respuesta)>0){
            return response()->json([
                'status'=>['error'=>0, 'message'=>""],
                'data'=>[
                    'id'=>$respuesta[0]->id,
                    'provincia_id'=>$respuesta[0]->provincia_id,
                    'nombre'=>$respuesta[0]->nombre,
                    'descripcion'=>$respuesta[0]->descripcion,
                    'leyenda'=>$respuesta[0]->leyenda,
                    'referencia'=>$respuesta[0]->referencia,
                    'telefono'=>$respuesta[0]->telefono,
                    'web'=>$respuesta[0]->web,
                    'longitud'=>$respuesta[0]->longitud,
                    'latitud'=>$respuesta[0]->latitud,
                    'coste'=>$respuesta[0]->coste,
                    'horario_id'=>$respuesta[0]->horario_id,
                    'tipo'=>$respuesta[0]->tipo,
                    'puntos'=>$respuesta[0]->puntos,
                    'siglo'=>$respuesta[0]->siglo,
                    'etiquetas'=>$respuesta[0]->etiquetas,
                    'curiosidades'=>$respuesta[0]->curiosidades
                ]
            ]);
        }
        return response()->json([
            'status'=>['error'=>2, 'message'=>"No hay datos para este punto de interés"],
            'data'=>null
        ]);
    }


    //API: Todos los puntos ordenados por Estado
    public function getPuntosxEstado() 
    {
       try {
            $dato = Punto::orderBy('ciudad_id', 'asc')
                ->with('Ciudad')
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

    //API: Todos los puntos ordenados por provincia
    public function getPuntosxProvincia() 
    {
       try {
            $dato = Punto::orderBy('ciudad_id', 'asc')
                ->with('Ciudad')
                ->with('Provincia')
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
        $puntos = json_decode($response->getBody()->getContents(), true);
       //return $puntos;
        return view('paginas.master.masterPuntos', compact('puntos'));
    }

    //Master: Tabla con todos los puntos por provincia
    public function PuntosxProvincia()
    {
        //return "estamos en puntoxestado";
        $mirest='getPuntosxProvincia';
        $response = $this->cliente->request('get', $mirest);
        $puntos = json_decode($response->getBody()->getContents(), true);
        //return $puntos;
        return view('paginas.master.masterPuntos', compact('puntos'));
    }

    public function create()
    {
        $mirest='tiposGet';
        $response = $this->cliente->request('get', $mirest);
        $tipos = json_decode($response->getBody()->getContents(), true);
        //return $tipos;

        $mirest='provinciasGet';
        $response = $this->cliente->request('get', $mirest);
        $puntos = json_decode($response->getBody()->getContents(), true);
        //return $puntos;
        return view('paginas.master.masterPuntoNuevo', compact('puntos', 'tipos'));
    }

    public function store(PuntoRequest $request)
    {
        $punto = new Punto;
        $punto->ciudad_id       = $request->input("ciudad");
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
        $punto->tipo_id         = $request->input("tipo");
        $punto->puntos          = $request->input("puntos");
        $punto->siglo           = $request->input("siglo");
        $punto->etiquetas       = $request->input("etiqueta");
        $punto->curiosidades    = $request->input("curiosidades");
        $punto->save();
        return redirect()->action('PuntoController@PuntosxEstado');
    }

    public function edit($id)
    {
        //Obtenemos los tipos de monumentos
        $mirest='tiposGet';
        $response = $this->cliente->request('get', $mirest);
        $tipos = json_decode($response->getBody()->getContents(), true);
        //return $tipos;

        //Obtenemos las provincias
        $mirest='getCiudades';
        $response = $this->cliente->request('get', $mirest);
        $ciudades = json_decode($response->getBody()->getContents(), true);
        //return $ciudades;

        //Obtenemos los datos del punto de interés
        $midato['id_punto_interes']=$id;
        $dato = (object)$midato;
        //$mirest='getPuntoInteres/'.$dato;
        $mirest='getPuntoInteres/'.$id;
        //return $mirest;
        $response = $this->cliente->request('get', $mirest);
        $punto = json_decode($response->getBody()->getContents(), true);
        //return $punto;

        return view('paginas.master.masterPuntoModificar', compact('punto', 'tipos','ciudades'));
    }

    public function update(PuntoRequest $request, $id)
    {
        $punto = Punto::where('id', $id)->firstOrFail();
        $punto->id              = $request->get("id");
        $punto->ciudad_id       = $request->get("ciudad");
        $punto->nombre          = $request->get("nombre");
        $punto->descripcion     = $request->get("descripcion");
        $punto->leyenda         = $request->get("leyenda");
        $punto->referencia      = $request->get("referencia");
        $punto->telefono        = $request->get("telefono");
        $punto->web             = $request->get("web");
        $punto->longitud        = $request->get("longitud");
        $punto->latitud         = $request->get("latitud");
        $punto->coste           = $request->get("coste");
        $punto->horario_id      = $request->get("horario");
        $punto->tipo_id         = $request->get("tipo");
        $punto->puntos          = $request->get("puntos");
        $punto->siglo           = $request->get("siglo");
        $punto->etiquetas       = $request->get("etiqueta");
        $punto->curiosidades    = $request->get("curiosidades");
        $punto->save();
        return redirect()->action('PuntoController@PuntosxEstado');
    }

    public function destroy($id)
    {
        try {
            $punto = Punto::findOrFail($id);
            $punto->delete();
        } catch (\Exception $e) {
            unset($punto);
            $respuesta = response()->json(['status'=>['error'=>1, 'message'=>"Error al borrar el punto"]]); 
        }

        if($punto){
            $respuesta = response()->json(['status'=>['error'=>0, 'message'=>""]]);
        } 
        return redirect('/master');
    }

}
