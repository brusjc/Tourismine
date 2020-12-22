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

    public function usuarioActual()
    {
        $usuario = Auth::user()->id;
        return $usuario;
    }

    private $cliente;
    
    public function __construct()
    {
        $this->cliente = new Client([
            'base_uri'=>'http://localhost/api/',  // Base URI is used with relative requests
            'timeout' =>10.0,
        ]);
    }


//*******
//* API *
//*******
    
    public function store($punto)
    {

        if(
            $punto['ciudad_id'] != (int)$punto['ciudad_id'] ||
            $punto['telefono'] != (int)$punto['telefono'] ||
            $punto['longitud'] != (double)$punto['longitud'] ||
            $punto['latitud'] != (double)$punto['latitud'] ||
            $punto['coste'] != (int)$punto['coste'] ||
            $punto['horario_id'] != (int)$punto['horario_id'] ||
            $punto['tipo_id'] != (int)$punto['tipo_id'] ||
            $punto['puntos'] != (int)$punto['puntos']
        ){
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales1'], 'data'=>null]);
        }
        
        if ($punto['nombre']!=strip_tags($punto['nombre']) || 
            $punto['descripcion']!=strip_tags($punto['descripcion']) ||
            $punto['leyenda']!=strip_tags($punto['leyenda']) ||
            $punto['referencia']!=strip_tags($punto['referencia']) || 
            $punto['siglo']!=strip_tags($punto['siglo']) || 
            $punto['etiquetas']!=strip_tags($punto['etiquetas']) || 
            $punto['curiosidades']!=strip_tags($punto['curiosidades'])
        ){
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales2'], 'data'=>null]);
        }

        //Paso 2: Obtenemos el último registro creado
        $registroinicial = Punto::latest('id')->first();

        //paso 3: incluimos el registro en la tabla
        try{
            $mipunto = new Punto;
            $mipunto->ciudad_id       = $punto["ciudad_id"];
            $mipunto->nombre          = $punto["nombre"];
            $mipunto->descripcion     = $punto["descripcion"];
            $mipunto->leyenda         = $punto["leyenda"];
            $mipunto->referencia      = $punto["referencia"];
            $mipunto->telefono        = $punto["telefono"];
            $mipunto->web             = $punto["web"];
            $mipunto->longitud        = $punto["longitud"];
            $mipunto->latitud         = $punto["latitud"];
            $mipunto->coste           = $punto["coste"];
            $mipunto->horario_id      = $punto["horario_id"];
            $mipunto->tipo_id         = $punto["tipo_id"];
            $mipunto->puntos          = $punto["puntos"];
            $mipunto->siglo           = $punto["siglo"];
            $mipunto->etiquetas       = $punto["etiquetas"];
            $mipunto->curiosidades    = $punto["curiosidades"];
            $mipunto->save();
            $registrofinal = Punto::latest('id')->first();
        } catch (\Exception $e) {
            return response()->json(['status'=>['error'=>1, 'message'=>"Error en consulta"], 'data'=>null]);
        }

        //Paso 4: Devolvemos la respuesta
        if($registroinicial['id'] == $registrofinal['id'])
        {
            return response()->json(['status'=>['error'=>2, 'message'=>"No hay datos"], 'data'=>null]);
        } else {
            return response()->json(['status'=>['error'=>0, 'message'=>""], 'data'=>$registrofinal]);
        } 
    }

    public function update($punto, $id)
    {
        //Paso 1: Comprobamos las variables
        $id=(int)$id;
        $punto['id'] = (int)$punto['id'];
        $punto['ciudad_id'] = (int)$punto['ciudad'];
        $punto['telefono'] = (int)$punto['telefono'];
        $punto['longitud'] = (double)$punto['longitud'];
        $punto['latitud'] = (double)$punto['latitud'];
        $punto['coste'] = (int)$punto['coste'];
        $punto['horario_id'] = (int)$punto['horario_id'];
        $punto['tipo_id'] = (int)$punto['tipo_id'];
        $punto['puntos'] = (int)$punto['puntos'];
        if ($id==0 || $punto['id']==0 || $punto['ciudad_id']==0 || $punto['telefono']==0 || $punto['longitud']==0 || $punto['latitud']==0 || $punto['coste']==0 || $punto['horario_id']==0 || $punto['tipo_id']==0 || $punto['puntos']==0)
        {
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales1'], 'data'=>null]);
        }
        
        if ($id!=$punto['id']  ||
            $punto['nombre']!=strip_tags($punto['nombre']) || 
            $punto['descripcion']!=strip_tags($punto['descripcion']) ||
            $punto['leyenda']!=strip_tags($punto['leyenda']) ||
            $punto['referencia']!=strip_tags($punto['referencia']) || 
            $punto['siglo']!=strip_tags($punto['siglo']) || 
            $punto['etiquetas']!=strip_tags($punto['etiquetas']) || 
            $punto['curiosidades']!=strip_tags($punto['curiosidades']))
        {
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales2'], 'data'=>null]);
        }

        //Paso 2: Creamos el registro en la tabla resultados
        try {
            $modpunto = Punto::find($id);
            $modpunto->ciudad_id = $punto['ciudad_id'];
            $modpunto->nombre = $punto['nombre'];
            $modpunto->descripcion = $punto['descripcion'];
            $modpunto->leyenda = $punto['leyenda'];
            $modpunto->referencia = $punto['referencia'];
            $modpunto->telefono = $punto['telefono'];
            $modpunto->web = $punto['web'];
            $modpunto->longitud = $punto['longitud'];
            $modpunto->latitud = $punto['latitud'];
            $modpunto->coste = $punto['coste'];
            $modpunto->horario_id = $punto['horario_id'];
            $modpunto->tipo_id = $punto['tipo_id'];
            $modpunto->puntos = $punto['puntos'];
            $modpunto->siglo = $punto['siglo'];
            $modpunto->etiquetas = $punto['etiquetas'];
            $modpunto->curiosidades = $punto['curiosidades'];
            $modpunto->save();
        } catch (\Exception $e) {
            return response()->json(['status'=>['error'=>1, 'message'=>'Error en consulta'], 'data'=>null]);
        }

        //Paso 3: Retornamos el resultado
        if(!$modpunto)
        {
            return response()->json(['status'=>['error'=>2, 'message'=>'No hay datos'], 'data'=>null]);
        } else {
            return response()->json(['status'=>['error'=>0, 'message'=>''], 'data'=>1]);
        }
    }

    //API: Todos los puntos ordenados por provincia
    public function showXProvincia() 
    {
        try
        {
            $dato = Punto::orderBy('ciudad_id', 'asc')
                ->with('Ciudad')
                ->with('Provincia')
                ->get();
        } catch (\Exception $e) {
            return response()->json(['status'=>['error'=>1, 'message'=>"Error en consulta"], 'data'=>null]);
        }

        if(count($dato)==0)
        {
            return response()->json(['status'=>['error'=>2, 'message'=>"No hay datos"], 'data'=>null]);
        } else {
            return response()->json(['status'=>['error'=>0, 'message'=>""], 'data'=>$dato]);
        } 
    }

    public function showXId($id) 
    {
        //Utilizado en la API getPunto

        //Paso 1: sanetizamos las variables
        $id = (int)$id;
        if ($id==0)
        {
            return response()->json(['status'=>['error'=>1, 'message'=>"Los campos introducidos no son correctos"],'punto_interes'=>null]);
        }

        //Paso 2: Hacdemos la consulta
        try 
        {
            $dato = Punto::where('id', $id)
                ->with('Ciudad')
                ->with('Tipo')
            ->get();
        } catch (\Exception $e) {
            return response()->json(['status'=>['error'=>1, 'message'=>'Error en consulta'], 'data'=>null]);
        }        

        //Paso 3: Devolvemos la respuesta
        if(count($dato)==0)
        {
            return response()->json(['status'=>['error'=>2, 'message'=>"No hay datos"],'data'=>null]);
        } else {
            return response()->json(['status'=>['error'=>0, 'message'=>''], 'data'=>$dato[0]]);
        }
    }

    public function showXMaps(Request $request) 
    {
        //Utilizado en la API getPuntos

        //1.- Comprobamos las variables
        $id_usuario = (int)$request->user_id;
        $latitud_superior = (float)$request->latitud_superior;
        $longitud_superior = (float)$request->longitud_superior;
        $latitud_inferior = (float)$request->latitud_inferior;
        $longitud_inferior = (float)$request->longitud_inferior;

        if ($user_id == null || $latitud_superior == null || $longitud_superior == null || $latitud_inferior == null || $longitud_inferior == null)
        {
            return response()->json(['status'=>['error'=>1, 'message'=>"Error en datos iniciales"], 'data'=>null]);
        }

        //Paso2: ejecutamos la consulta
        try
        {
            $dato = puntosInteres::where('latitud', '<', $latitud_superior)
                ->where('latitud', '>', $latitud_inferior)
                ->where('longitud', '<', $longitud_superior)
                ->where('longitud', '>', $longitud_inferior)
                ->get();
        } catch (\Exception $e) {
            return response()->json(['status'=>['error'=>2, 'message'=>"Error en la consulta"], 'data'=>null]);
        }

        //Paso 3: Devolvemos la respuesta
        if(count($dato)==0)
        {
            return response()->json(['status'=>['error'=>3, 'message'=>'No hay datos'], 'data'=>null]);
        } else {
            return response()->json(['status'=>['error'=>0, 'message'=>""], 'data'=>$dato]);
        }
    }

    public function destroy($id)
    {
        //Paso 1: Comprobamos las variables
        if ($id==0 || $id!=(int)$id){
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales1'], 'data'=>null]);
        }
        $id=(int)$id;

        //Paso 2: creamos la consulta
        try {
            $punto = Punto::findOrFail($id);
            $punto->delete();
        } catch (\Exception $e) {
            return response()->json(['status'=>['error'=>1, 'message'=>"Error en consulta"]]); 
        }

        //Paso 3: retornamos el resultado
        if($punto){
            return response()->json(['status'=>['error'=>0, 'message'=>""]]);
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
            return response()->json(['status'=>['error'=>1, 'message'=>"Error en consulta"], 'data'=>null]);        
        }

        if(count($dato)==0){
            return response()->json(['status'=>['error'=>2, 'message'=>"No hay datos"], 'data'=>null]);
        } else {
            return response()->json(['status'=>['error'=>0, 'message'=>""], 'data'=>$dato]);
        } 
    }



//*******
//* WEB *
//*******

    //Master: Tabla con todos los puntos por provincia
    public function masterPuntos()
    {
        $puntos=$this->showXProvincia();
        $puntos = @json_decode(json_encode($puntos), true);
        $puntos=$puntos['original'];
        return view('paginas.master.index', compact('puntos'));
    }

    public function puntoNuevo1()
    {
        //Paso 1: Obtenemos la tabla de tipod de monumento
        $tipos = app('App\Http\Controllers\TipoController')->index();
        $tipos = @json_decode(json_encode($tipos), true);
        $tipos=$tipos['original'];
        //return $tipos;

        //Paso 2: Obtenemos las ciudades
        $ciudades = app('App\Http\Controllers\CiudadController')->index();
        $ciudades = @json_decode(json_encode($ciudades), true);
        $ciudades=$ciudades['original'];
        //return $ciudades;

        //Paso 3: Vamos al formulario
        return view('paginas.master.masterPuntoNuevo', compact('tipos', 'ciudades'));
    }

    public function puntoNuevo2(Request $request)
    {
        //Paso 1: Sanitizamos las variables
        $punto=$request->all();
        //return $punto;

        if(
            $punto['ciudad_id'] != (int)$punto['ciudad_id'] ||
            $punto['telefono'] != (int)$punto['telefono'] ||
            $punto['longitud'] != (double)$punto['longitud'] ||
            $punto['latitud'] != (double)$punto['latitud'] ||
            $punto['coste'] != (int)$punto['coste'] ||
            $punto['horario_id'] != (int)$punto['horario_id'] ||
            $punto['tipo_id'] != (int)$punto['tipo_id'] ||
            $punto['puntos'] != (int)$punto['puntos'] ||
            $punto['nombre']!=strip_tags($punto['nombre']) || 
            $punto['descripcion']!=strip_tags($punto['descripcion']) ||
            $punto['leyenda']!=strip_tags($punto['leyenda']) ||
            $punto['referencia']!=strip_tags($punto['referencia']) || 
            $punto['siglo']!=strip_tags($punto['siglo']) || 
            $punto['etiquetas']!=strip_tags($punto['etiquetas']) || 
            $punto['curiosidades']!=strip_tags($punto['curiosidades'])
        ){
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales1'], 'data'=>null]);
        }

        if(
            $punto['ciudad_id'] == "" ||
            $punto['telefono'] == "" ||
            $punto['longitud'] == "" ||
            $punto['latitud'] == "" ||
            $punto['coste'] == "" ||
            $punto['horario_id'] == "" ||
            $punto['tipo_id'] == "" ||
            $punto['puntos'] == "" ||
            $punto['nombre'] == "" || 
            $punto['descripcion'] == "" ||
            $punto['leyenda'] == "" ||
            $punto['referencia'] == "" || 
            $punto['siglo'] == "" || 
            $punto['etiquetas'] == "" || 
            $punto['curiosidades'] == ""
        ){
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales2'], 'data'=>null]);
        }

        //Paso 2: Creamos el punto nuevo
        $respunto = $this->store($punto);
        $respunto = @json_decode(json_encode($respunto), true);
        $respunto=$respunto['original'];
        //return $respunto;

        //Paso 3: redirigimos a la vista
        return redirect()->action('PuntoController@masterPuntos', compact('mipunto'));
    }

    public function puntoModificar1($id)
    {
        //Paso 1: Sanitizamos las variables
        $id=(int)$id;
        if($id==0) {
            return response()->json(['status'=>['error'=>1, 'message'=>'Error en datos iniciales'], 'data'=>null]);
        }

        //Paso 2: Obtenemos la tabla de tipod de monumento
        $tipos = app('App\Http\Controllers\TipoController')->index();
        $tipos = @json_decode(json_encode($tipos), true);
        $tipos=$tipos['original'];
        //return $tipos;

        //Paso 3: Obtenemos las ciudades
        $ciudades = app('App\Http\Controllers\CiudadController')->index();
        $ciudades = @json_decode(json_encode($ciudades), true);
        $ciudades=$ciudades['original'];
        //return $ciudades;

        //Paso 4: Obtenemos los datos del punto de interés
        $punto=$this->showXId($id);
        $punto = @json_decode(json_encode($punto), true);
        $punto=$punto['original'];
        //return $punto;

        //Obtenemos los datos del punto de interés
        return view('paginas.master.masterPuntoModificar', compact('punto', 'tipos','ciudades'));
    }


    public function puntoModificar2(Request $request, $id)
    {
        $punto=$request->all();
        //return $punto;


        if(
            $id != (int)$id ||
            $punto['ciudad_id'] != (int)$punto['ciudad_id'] ||
            $punto['telefono'] != (int)$punto['telefono'] ||
            $punto['longitud'] != (double)$punto['longitud'] ||
            $punto['latitud'] != (double)$punto['latitud'] ||
            $punto['coste'] != (int)$punto['coste'] ||
            $punto['horario_id'] != (int)$punto['horario_id'] ||
            $punto['tipo_id'] != (int)$punto['tipo_id'] ||
            $punto['puntos'] != (int)$punto['puntos']
        ){
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales1'], 'data'=>null]);
        }




        $id=(int)$id;
        $punto['id'] = (int)$punto['id'];
        $punto['ciudad_id'] = (int)$punto['ciudad'];
        $punto['telefono'] = (int)$punto['telefono'];
        $punto['longitud'] = (double)$punto['longitud'];
        $punto['latitud'] = (double)$punto['latitud'];
        $punto['coste'] = (int)$punto['coste'];
        $punto['horario_id'] = (int)$punto['horario_id'];
        $punto['tipo_id'] = (int)$punto['tipo_id'];
        $punto['puntos'] = (int)$punto['puntos'];
        if ($id==0 || $punto['id']==0 || $punto['ciudad_id']==0 || $punto['telefono']==0 || $punto['longitud']==0 || $punto['latitud']==0 || $punto['coste']==0 || $punto['horario_id']==0 || $punto['tipo_id']==0 || $punto['puntos']==0){
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales1'], 'data'=>null]);
        }
        if ($id!=$punto['id']  ||
            $punto['nombre']!=strip_tags($punto['nombre']) || 
            $punto['descripcion']!=strip_tags($punto['descripcion']) ||
            $punto['leyenda']!=strip_tags($punto['leyenda']) ||
            $punto['referencia']!=strip_tags($punto['referencia']) || 
            $punto['siglo']!=strip_tags($punto['siglo']) || 
            $punto['etiquetas']!=strip_tags($punto['etiquetas']) || 
            $punto['curiosidades']!=strip_tags($punto['curiosidades'])
        ){
            return response()->json(['status'=>['error'=>1, 'message'=>'Error en datos iniciales2'], 'data'=>null]);
        }
        //return $punto;

        //Paso 2: Actualizamos la tabla punto
        $respunto = $this->update($punto, $id);
        //return $respunto;

        $respunto = @json_decode(json_encode($respunto), true);
        //return $respunto;

        //Paso 3: reornamos a la página de vuelta
        return redirect()->action('PuntoController@masterPuntos');
    }

    public function puntoBorrar2($id)
    {
        //Paso 1: Comprobamos las variables
        if ($id==0 || $id!=(int)$id){
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales1'], 'data'=>null]);
        }
        $id=(int)$id;

        //Paso 2: Llamamos a la función destroy
        $respunto = $this->destroy($id);
        //return $respunto;

        //Paso 3: reornamos a la página de vuelta
         return redirect()->action('PuntoController@masterPuntos');
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
            return response()->json(['status'=>['error'=>1, 'message'=>"Error al obtener los puntos"], 'data'=>null]);
        }

        if(count($dato)==0){
            return response()->json(['status'=>['error'=>2, 'message'=>"No hay ningún punto por localidad"], 'data'=>null]);
        } else {
            return response()->json(['status'=>['error'=>0, 'message'=>""], 'data'=>$dato]);
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


    //Respuesta Formulario Borrar API





































//**************
//* Desechados *
//**************

    //Respuesta Formulario Modificar API
    public function updateApi($id)
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
        return $punto;
    }

    public function storeanterior(PuntoRequest $request)
    {
        try{
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
            $registrofinal = Punto::latest('id')->first();
        } catch (\Exception $e) {
            $mipunto = response()->json(
                ['status'=>['error'=>1, 'message'=>"Error al crear el punto"], 'data'=>null]
            );        
        }

        if(!$registrofinal){
            $mipunto = response()->json(
                ['status'=>['error'=>2, 'message'=>"No hay ningún punto para crear"], 'data'=>null]
            );
        } else {
            $mipunto = response()->json(
                ['status'=>['error'=>0, 'message'=>""], 'data'=>$registrofinal]
            );
        } 
        return redirect()->action('PuntoController@PuntosxEstado', compact('mipunto'));
    }

    //Formulario crear punto
    public function createviejo()
    {
        $mirest='tiposGet';
        $response = $this->cliente->request('get', $mirest);
        $tipos = json_decode($response->getBody()->getContents(), true);
        //return $tipos;

        $mirest='getCiudades';
        $response = $this->cliente->request('get', $mirest);
        $ciudades = json_decode($response->getBody()->getContents(), true);
        //return $ciudades;
        return view('paginas.master.masterPuntoNuevo', compact('tipos', 'ciudades'));
    }

    public function masterPuntoNuevo2anterior(PuntoRequest $request)
    {
        //return "estamos en puntoxestado";
        $mirest='getPuntoStore/'.$request;
        $response = $this->cliente->request('get', $mirest);
        $puntos = json_decode($response->getBody()->getContents(), true);
        //return $puntos;
        return redirect()->action('PuntoController@PuntosxEstado');
    }


}
