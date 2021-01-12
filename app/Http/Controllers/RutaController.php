<?php

namespace App\Http\Controllers;

use App\Ruta;
use Illuminate\Http\Request;

class RutaController extends Controller
{


//*******
//* API *
//*******
    
    public function store($punto)
    {
        $punto['telefono'] = str_replace(' ', '', $punto['telefono']);
        if(
            $punto['nombre']!=strip_tags($punto['nombre']) ||
            $punto['ciudad_id'] != (int)$punto['ciudad_id'] ||
            $punto['direccion']!=strip_tags($punto['direccion']) ||
            $punto['cpostal'] != (int)$punto['cpostal'] ||
            $punto['telefono'] != (int)$punto['telefono'] ||
            $punto['longitud'] != (double)$punto['longitud'] ||
            $punto['latitud'] != (double)$punto['latitud'] ||
            $punto['horario_id'] != (int)$punto['horario_id'] ||
            $punto['tipo_id'] != (int)$punto['tipo_id'] ||
            $punto['puntos'] != (int)$punto['puntos'] ||
            $punto['descripcion']!=strip_tags($punto['descripcion']) ||
            $punto['etiquetas']!=strip_tags($punto['etiquetas'])
        )
        {
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales1'], 'data'=>null]);
        }
        
        if (
            $punto['nombre'] == "" || 
            $punto['ciudad_id'] == "" ||
            $punto['direccion'] == "" ||
            $punto['cpostal'] == "" ||
            $punto['longitud'] == "" ||
            $punto['latitud'] == "" ||
            $punto['horario_id'] == "" ||
            $punto['tipo_id'] == "" ||
            $punto['puntos'] == "" ||
            $punto['descripcion'] == "" ||
            $punto['etiquetas'] == ""
        )
        {
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales2'], 'data'=>null]);
        }

        //Paso 2: Obtenemos el último registro creado
        $registroinicial = Punto::latest('id')->first();

        //paso 3: incluimos el registro en la tabla
            $mipunto = new Punto;
            $mipunto->ciudad_id       = $punto["ciudad_id"];
            $mipunto->nombre          = $punto["nombre"];
            $mipunto->direccion       = $punto["direccion"];
            $mipunto->cpostal         = $punto["cpostal"];
            $mipunto->descripcion     = $punto["descripcion"];
            $mipunto->telefono        = $punto["telefono"];
            $mipunto->web             = $punto["web"];
            $mipunto->longitud        = $punto["longitud"];
            $mipunto->latitud         = $punto["latitud"];
            $mipunto->horario_id      = $punto["horario_id"];
            $mipunto->tipo_id         = $punto["tipo_id"];
            $mipunto->puntos          = $punto["puntos"];
            $mipunto->etiquetas       = $punto["etiquetas"];
            //return $mipunto;
        try{
            $mipunto->save();
            $registrofinal = Punto::latest('id')->first();
        } catch (\Exception $e) {
            //return $e;
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
        //return $punto;
        //Paso 1: Comprobamos las variables
        $errors=array();
        if((int)$punto['id']==0 || (int)$punto['id']!=(int)$id){
            $errors[]="Error al obtener datos del id del registro";
        }        

        if($punto['nombre']!=strip_tags($punto['nombre']) || strlen($punto['nombre'])==0) {
            $errors[]="Error al obtener datos del nombre";
        }        

        if((int)$punto['ciudad_id']==0) {
            $errors[]="Error al obtener datos de la ciudad";
        }

        if($punto['direccion']!=strip_tags($punto['direccion']) || strlen($punto['direccion'])==0) {
            $errors[]="Error al obtener datos de la dirección";
        }        

        if((int)$punto['cpostal']==0) {
            $errors[]="Error al obtener datos del código postal";
        }

        $punto['telefono'] = str_replace(' ', '', $punto['telefono']);
        if(strlen($punto['telefono'])==0){$punto['telefono'] = 0;}
        if($punto['telefono']!=(int)$punto['telefono']) {
            $errors[]="Error al obtener datos del teléfono";
        }

        if($punto['web']!=strip_tags($punto['web'])) {
            $errors[]="Error al obtener datos de la web";
        }        

        if($punto['latitud']!=(double)$punto['latitud']) {
            $errors[]="Error al obtener datos de la latitud del geoposicionamiento";
        }

        if($punto['longitud']!=(double)$punto['longitud']) {
            $errors[]="Error al obtener datos de la longitud del geoposicionamiento";
        }

        if((int)$punto['puntos']==0) {
            $errors[]="Error al obtener datos de la puntuación";
        }

        if((int)$punto['horario_id']==0) {
            $errors[]="Error al obtener datos del horario de apertura";
        }

        if((int)$punto['tipo_id']==0) {
            $errors[]="Error al obtener datos del tipo de punto";
        }

        if($punto['etiquetas']!=strip_tags($punto['etiquetas']) || strlen($punto['etiquetas'])==0) {
            $errors[]="Error al obtener datos de las etiquetas";
        }        

        if($punto['descripcion']!=strip_tags($punto['descripcion']) || strlen($punto['descripcion'])==0) {
            $errors[]="Error al obtener datos de la descripción";
        }        

        if(count($errors)>0) {
            return response()->json(['status'=>['error'=>2, 'message'=>'Error en datos iniciales'], 'data'=>null, 'errors'=>$errors]);
        }
        //return $punto;

        //Paso 2: Creamos el registro en la tabla resultados
            $modpunto = Punto::find($id);
            $modpunto->ciudad_id    = $punto['ciudad_id'];
            $modpunto->nombre       = $punto['nombre'];
            $modpunto->direccion    = $punto['direccion'];
            $modpunto->cpostal      = $punto['cpostal'];
            $modpunto->telefono     = $punto['telefono'];
            $modpunto->web          = $punto['web'];
            $modpunto->latitud      = $punto['latitud'];
            $modpunto->longitud     = $punto['longitud'];
            $modpunto->horario_id   = $punto['horario_id'];
            $modpunto->tipo_id      = $punto['tipo_id'];
            $modpunto->puntos       = $punto['puntos'];
            $modpunto->etiquetas    = $punto['etiquetas'];
            $modpunto->descripcion  = $punto['descripcion'];
        try {
            $modpunto->save();
        } catch (\Exception $e) {
            return response()->json(['status'=>['error'=>1, 'message'=>'Error en consulta'], 'data'=>null]);
        }

        //Paso 3: Retornamos el resultado
        if(!$modpunto)
        {
            return response()->json(['status'=>['error'=>2, 'message'=>'No hay datos'], 'data'=>null]);
        } else {
            return response()->json(['status'=>['error'=>0, 'message'=>''], 'data'=>$modpunto]);
        }
    }

    //API: Todos los puntos ordenados por provincia
    public function showXCiudad() 
    {
        try
        {
            $dato = Ruta::orderBy('ciudad_id', 'asc')
                ->with('Rutapunto')
                ->with('Ciudad')
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
            $dato = Ruta::where('id', $id)
            ->with('Rutapunto')
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



//*******
//* WEB *
//*******

    public function rutasXCiudad($id)
    {
        //Paso 1: Sanitizamos las variables
        $id=(int)$id;
        if($id==0) {
            return response()->json(['status'=>['error'=>1, 'message'=>'Error en datos iniciales'], 'data'=>null]);
        }

        //Paso 2: Obtenemos la tabla de tipos de monumento
        $rutas=$this->showXCiudad($id);
        $rutas = @json_decode(json_encode($rutas), true);
        $rutas=$rutas['original']['data'];
        //return $rutas;

        //Paso 3: Obtenemos datos de cada punto
        if(isset($rutas))
        {
            foreach($rutas as $key1=>$ruta)
            {
                foreach($ruta['rutapunto'] as $key2=>$punto)
                {
                    $respunto = app('App\Http\Controllers\PuntoController')->showXId($punto['punto_id']);
                    $respunto = @json_decode(json_encode($respunto), true);
                    $respunto=$respunto['original']['data'];
                    //return $respunto;

                    $rutas[$key1]['rutapunto'][$key2]['datospunto']=$respunto;
                }
            }
        } else {
            $rutas=array();
        }
        //return $rutas;

        //Paso 3: Redirigimos a la vista
        return view('paginas.master.rutas', compact('rutas'));
    }

}
