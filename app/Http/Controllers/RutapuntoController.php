<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rutapunto;

class RutapuntoController extends Controller
{


//*******
//* API *
//*******
    
    public function store($punto)
    {
        if(
            $punto['ciudad_id'] != (int)$punto['ciudad_id'] ||
            $punto['ruta_id'] != (int)$punto['ruta_id'] ||
            $punto['punto_id'] != (int)$punto['punto_id'] ||
            $punto['orden'] != (int)$punto['orden']
        )
        {
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales1'], 'data'=>null]);
        }

        //Paso 2: Obtenemos el último registro creado
        $registroinicial = Rutapunto::latest('id')->first();

        //paso 3: incluimos el registro en la tabla
        $mipunto = new Rutapunto;
        $mipunto->ruta_id   = $punto["ruta_id"];
        $mipunto->punto_id  = $punto["punto_id"];
        $mipunto->orden     = $punto["orden"];
        //return $mipunto;

        try{
            $mipunto->save();
            $registrofinal = Rutapunto::latest('id')->first();
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

    public function showXId($id) 
    {
        //Paso 1: sanetizamos las variables
        $id = (int)$id;
        if ($id==0)
        {
            return response()->json(['status'=>['error'=>1, 'message'=>"Los campos introducidos no son correctos"],'punto_interes'=>null]);
        }

        //Paso 2: realizamos la consulta
        try
        {
            $dato = Rutapunto::where('id', $id)
                ->with('Ruta')
                ->orderBy('orden', 'asc')
                ->get();
        } catch (\Exception $e) {
            return response()->json(['status'=>['error'=>1, 'message'=>"Error en consulta"], 'data'=>null]);
        }

        //Paso 3: devolvemos la respuesta
        if(count($dato)==0)
        {
            return response()->json(['status'=>['error'=>2, 'message'=>"No hay datos"], 'data'=>null]);
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
            $punto = Rutapunto::findOrFail($id);
            $punto->delete();
        } catch (\Exception $e) {
            return response()->json(['status'=>['error'=>2, 'message'=>"Error en consulta"]]); 
        }

        //Paso 3: retornamos el resultado
        if($punto){
            return response()->json(['status'=>['error'=>0, 'message'=>""]]);
        } 
    }


//*******
//* WEB *
//*******

    public function rutaPuntoNuevo2(Request $request, $id)
    {
        //Paso 1: Sanitizamos las variables
        $punto=$request->all();
        //return $punto;
        if($punto['id']!=(int)$punto['id'] || $punto['punto_id']!=(int)$punto['punto_id'] || $punto['orden']!=(int)$punto['orden'])
        {
            return response()->json(['status'=>['error'=>1, 'message'=>'Error en datos iniciales'], 'data'=>null]);
        }
        
        if($id!=(int)$id || (int)$punto['id']!=(int)$id)
        {
            return response()->json(['status'=>['error'=>2, 'message'=>'Error en datos iniciales'], 'data'=>null]);
        }
        $punto['ruta_id']=$id;
        //return $punto;

        //Paso 2: Obtenemos los puntos de la ciudad
        $puntos = $this->store($punto);
        //return $puntos;
        $puntos = @json_decode(json_encode($puntos), true);
        //return $puntos;
        $puntos = $puntos['original']['data'];
        //return $puntos;

        //Paso 3: Enviamos a la vista
        $id=$punto['ciudad_id'];
        return redirect()->action('RutaController@rutasXCiudad', compact('id'));
    }

    public function rutaPuntoNuevo($id)
    {
        //Paso 1: Sanitizamos las variables
        $id=(int)$id;
        if($id==0) {
            return response()->json(['status'=>['error'=>1, 'message'=>'Error en datos iniciales'], 'data'=>null]);
        }

        //Paso 2: Obtenemos los datos de la ciudad
        $ruta = app('App\Http\Controllers\RutaController')->showXId($id);
        //return $ruta;
        $ruta = @json_decode(json_encode($ruta), true);
        //return $ruta;
        $ruta = $ruta['original']['data'];
        //return $ruta;


        //Paso 3: Obtenemos los puntos de la ruta
        $rutapuntos = app('App\Http\Controllers\rutaController')->showXCiudad($id);
        //return $rutapuntos;
        $rutapuntos = @json_decode(json_encode($rutapuntos), true);
        //return $rutapuntos;
        $rutapuntos = $rutapuntos['original']['data'][0];
        //Obtenemos el array de puntos
        //return $rutapuntos['rutapunto'];
        $puntosruta=array();
        foreach($rutapuntos['rutapunto'] as $rutapunto)
        {
            $puntosruta[]=$rutapunto['punto_id'];
        }
        //return $puntosruta;

        //Paso 3: Obtenemos los puntos de la ciudad
        $puntos = app('App\Http\Controllers\PuntoController')->showXCiudad($ruta['ciudad_id']);
        //return $puntos;
        $puntos = @json_decode(json_encode($puntos), true);
        //return $puntos;
        $puntos = $puntos['original']['data'];
        //return $puntos;

        //Paso 4: comprobamos que los puntos no están aún en la ruta
        $buenos=array();
        foreach($puntos as $todo)
        {
            if (!in_array($todo['id'], $puntosruta))
            {
                $buenos[]=$todo;
            }
        }
        //return $buenos;
        $puntos=$buenos;

        //Paso 5: Enviamos a la vista
        return view('paginas.master.RutaPuntoNuevo', compact('id', 'puntos', 'ruta'));
    }

    public function rutaPuntoBorrar($id)
    {
        //Paso 1: Sanitizamos las variables
        $id=(int)$id;
        if($id==0) {
            return response()->json(['status'=>['error'=>1, 'message'=>'Error en datos iniciales'], 'data'=>null]);
        }

        //Paso 2: retornamos a la página rutas
        $resruta = $this->showXId($id);
        //return $resruta;
        $resruta = @json_decode(json_encode($resruta), true);
        $resruta = $resruta['original']['data'][0]['ruta']['ciudad_id'];
        //return $resruta;

        //Paso 3: Obtenemos los puntos de la ciudad
        $respunto = $this->destroy($id);
        //return $respunto;
        $respunto = @json_decode(json_encode($respunto), true);
        //return $respunto;

        if($respunto['original']['status']['error']!=0)
        {
            $errors[]="Error interno al borrar el punto";
        }
        $id=$resruta;
        return redirect()->action('RutaController@rutasXCiudad', compact('id'));
    }

}
