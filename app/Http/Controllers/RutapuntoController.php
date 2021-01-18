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

    public function update($punto, $id)
    {
        //return $punto;
        //Paso 1: Comprobamos las variables
        if($id!=(int)$id)
        {
            $errors[]="Error al obtener datos del id del registro";
        }
        if((int)$punto['id']==0 || (int)$punto['id']!=(int)$id)
        {
            $errors[]="Error al obtener datos del id del registro";
        }
        if((int)$punto['ruta_id']==0 || (int)$punto['ruta_id']!=$punto['ruta_id'])
        {
            $errors[]="Error al obtener datos de la ruta";
        }
        if((int)$punto['punto_id']==0 || (int)$punto['punto_id']!=$punto['punto_id'])
        {
            $errors[]="Error al obtener datos de la ruta";
        }
        if((int)$punto['orden']==0 || (int)$punto['orden']!=$punto['orden'])
        {
            $errors[]="Error al obtener datos de la ruta";
        }
        //return $punto;

        //Paso 2: Creamos el registro en la tabla resultados
        $modpunto = Rutapunto::find($punto['id']);
        $modpunto->ruta_id  = $punto['ruta_id'];
        $modpunto->punto_id = $punto['punto_id'];
        $modpunto->orden    = $punto['orden'];
        //return $modpunto;

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

    public function showXRutaOrden($id) 
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
            $dato = Rutapunto::where('ruta_id', $id)
                ->with('Ruta')
                ->with('Punto')
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
                ->with('Ciudad')
                ->with('Punto')
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

    public function ordenPuntos($puntoreq)
    {
        //return $puntoreq;
        //return $rutapuntos;
        //Función que reordena los puntos de una ruta

        //1.- Solicitamos los puntos de la ruta ordenados por campo orden
        $rutapuntos = $this->showXRutaOrden($puntoreq['ruta_id']);
        $rutapuntos = @json_decode(json_encode($rutapuntos), true);
        $rutapuntos = $rutapuntos['original']['data'];
        //return $rutapuntos;


        //1.- Creamos la patriz de orden de puntos
        foreach($rutapuntos as $key=>$rutapunto)
        {
            $ordenes[]=$rutapunto['id'];
        }
        //return $ordenes;     

        //Borramos el orden anterior
        $ordenes = array_diff($ordenes, array($puntoreq['id']));
        //return $ordenes;
        array_splice($ordenes , (int)$puntoreq['orden']-1, 0, (int)$puntoreq['id']);
        //return $ordenes;

        foreach($rutapuntos as $key=>$rutapunto)
        {
            $pos = array_search($rutapunto['id'], $ordenes);
            $rutapuntos[$key]['orden']=$pos+1;
        }
        return $rutapuntos;

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

        //Paso 5: Obtenemos los puntos de la ruta por orden
        $puntosorden = $this->showXRutaOrden($ruta['id']);
        //return $puntosorden;
        $puntosorden = @json_decode(json_encode($puntosorden), true);
        //return $puntosorden;
        $puntosorden = $puntosorden['original']['data'];
        //return $puntosorden;

        //Paso 6: Enviamos a la vista
        return view('paginas.master.RutaPuntoNuevo', compact('id', 'puntos', 'ruta', 'puntosorden'));
    }

    public function rutaPuntoModificar($id)
    {
        //Paso 1: Sanitizamos las variables
        if($id!=(int)$id || $id==0) {
            return response()->json(['status'=>['error'=>1, 'message'=>'Error en datos iniciales'], 'data'=>null]);
        }

        //Paso 2: Obtenemos los datos del punto
        $punto = $this->showXId($id);
        $punto = @json_decode(json_encode($punto), true);
        $punto = $punto['original']['data'][0];
        //return $punto;

        //Paso 3: Obtenemos los puntos actuales de la ruta
        $rutapuntos = app('App\Http\Controllers\rutaController')->showXId($punto['ruta']['id']);
        $rutapuntos = @json_decode(json_encode($rutapuntos), true);
        //return $rutapuntos;
        $rutapuntos = $rutapuntos['original']['data'];

        //Obtenemos el array de puntos
        //return $rutapuntos['rutapunto'];
        $puntosruta=array();
        foreach($rutapuntos['rutapunto'] as $rutapunto)
        {
            $puntosruta[]=$rutapunto['id'];
        }
        //return $puntosruta;

        //Paso 4: Obtenemos los puntos de la ciudad
        $puntos = app('App\Http\Controllers\PuntoController')->showXCiudad($punto['ciudad'][0]['id']);
        $puntos = @json_decode(json_encode($puntos), true);
        $puntos = $puntos['original']['data'];
        //return $puntos;

        //Paso 5: comprobamos que los puntos no están aún en la ruta
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
        //return $puntos;

        //Paso 6: Obtenemos los puntos de la ruta por orden
        $puntosorden = $this->showXRutaOrden($punto['ruta_id']);
        $puntosorden = @json_decode(json_encode($puntosorden), true);
        $puntosorden = $puntosorden['original']['data'];
        //return $puntosorden;
        //return $punto;

        //Paso 7: Enviamos a la vista
        return view('paginas.master.RutaPuntoModificar', compact('id', 'punto', 'puntos', 'puntosorden'));
    }

    public function rutaPuntoModificar2(Request $request, $id)
    {
        //Paso 1: Sanitizamos las variables
        $puntoreq=$request->all();
        //return $puntoreq;

        if($puntoreq['id']!=(int)$puntoreq['id'] || $puntoreq['id']==0)
        {
            $errors[] = "Error en los datos del punto";
        }
        if($puntoreq['punto_id']!=(int)$puntoreq['punto_id'] || $puntoreq['punto_id']==0)
        {
            $errors[] = "Error en los datos del id de punto";
        }
        if($puntoreq['ciudad_id']!=(int)$puntoreq['ciudad_id'] || $puntoreq['ciudad_id']==0)
        {
            $errors[] = "Error en los datos de la ciudad";
        }
        if($puntoreq['ruta_id']!=(int)$puntoreq['ruta_id'] || $puntoreq['ruta_id']==0)
        {
            $errors[] = "Error en los datos de la ruta";
        }
        if($puntoreq['orden']!=(int)$puntoreq['orden'] || $puntoreq['orden']==0)
        {
            $errors[] = "Error en los datos del orden del punto";
        }
        if($id!=(int)$id || $id==0) {
            $errors[] = "Error en datos iniciales";
        }

        //Paso 3: Obtenemos los puntos actuales de la ruta
        $rutapuntos = app('App\Http\Controllers\rutaController')->showXId($puntoreq['ruta_id']);
        $rutapuntos = @json_decode(json_encode($rutapuntos), true);
        $rutapuntos = $rutapuntos['original']['data'];
        //return $rutapuntos;

        //Obtenemos el array de puntos
        //return $rutapuntos['rutapunto'];
        $puntosruta=array();
        foreach($rutapuntos['rutapunto'] as $rutapunto)
        {
            $puntosruta[]=$rutapunto['id'];
        }
        //return $puntosruta;

        //Paso 4: Obtenemos los puntos de la ciudad
        $orden = $this->ordenPuntos($puntoreq);
        //return $orden;
        $orden = @json_decode(json_encode($orden), true);
        //return $orden;

        //Paso 5: cambiamos el array de puntos por los nuevos
        unset($rutapuntos['rutapunto']);
        $rutapuntos['rutapunto']=$orden;
        //return $rutapuntos;
        //return $rutapuntos['rutapunto'];

        //Paso 6: Actualizamos los datos de los puntos
        foreach($rutapuntos['rutapunto'] as $key=>$rutapunto)
        {
            $puntomod = $this->update($rutapunto, $id);
            //return $puntomod;
        }

        //Paso 6: Realizamos nuevamente la consulta
        $rutapuntos = app('App\Http\Controllers\rutaController')->showXId($puntoreq['ruta_id']);
        $rutapuntos = @json_decode(json_encode($rutapuntos), true);
        $rutapuntos = $rutapuntos['original']['data'];
        //return $rutapuntos;


        //Paso 4: Obtenemos los puntos de la ciudad
        $puntos = app('App\Http\Controllers\PuntoController')->showXCiudad($puntoreq['ciudad_id']);
        $puntos = @json_decode(json_encode($puntos), true);
        $puntos = $puntos['original']['data'];
        //return $puntos;

        //Paso 5: comprobamos que los puntos no están aún en la ruta
        $buenos=array();
        foreach($puntos as $todo)
        {
            if (!in_array($todo['id'], $puntosruta))
            {
                $buenos[]=$todo;
            }
        }
        $puntos=$buenos;
        //return $puntos;

        //Paso 6: Enviamos a la vista
        return redirect()->action('RutapuntoController@rutaPuntoModificar', compact('id'));

        //return view('paginas.master.RutaPuntoModificar', compact('id', 'punto', 'puntos', 'puntosorden'));
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
