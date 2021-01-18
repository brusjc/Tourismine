<?php

namespace App\Http\Controllers;

use App\Ruta;
use Illuminate\Http\Request;

class RutaController extends Controller
{


//*******
//* API *
//*******
    
    public function store($ruta)
    {
        if($ruta['nombre']!=strip_tags($ruta['nombre']) || $ruta['nombre'] == "")
        {
            $errors[]="Error al obtener datos del nombre del registro";
        }
        if((int)$ruta['ciudad_id']==0 || $ruta['ciudad_id']!=(int)$ruta['ciudad_id'])
        {
            $errors[]="Error al obtener datos de la ciudad del registro";
        }
        if((int)$ruta['tipo_id']==0 || $ruta['tipo_id']!=(int)$ruta['tipo_id'])
        {
            $errors[]="Error al obtener datos del tipo del registro";
        }
        if((int)$ruta['dias']==0 || $ruta['dias']!=(int)$ruta['dias'])
        {
            $errors[]="Error al obtener datos de los días del registro";
        }

        //Paso 2: Obtenemos el último registro creado
        $registroinicial = Ruta::latest('id')->first();

        //paso 3: incluimos el registro en la tabla
        $miruta = new Ruta;
        $miruta->nombre     = $ruta["nombre"];
        $miruta->ciudad_id  = $ruta["ciudad_id"];
        $miruta->tipo_id    = $ruta["tipo_id"];
        $miruta->dias       = $ruta["dias"];
        //return $miruta;
        try{
            $miruta->save();
            $registrofinal = Ruta::latest('id')->first();
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

    public function update($ruta, $id)
    {
        //return $ruta;
        //Paso 1: Comprobamos las variables
        $errors=array();
        if((int)$ruta['id']==0 || (int)$ruta['id']!=(int)$id)
        {
            $errors[]="Error al obtener datos del id del registro";
        }        
        if($ruta['nombre']!=strip_tags($ruta['nombre']) || strlen($ruta['nombre'])==0)
        {
            $errors[]="Error al obtener datos del nombre";
        }        
        if((int)$ruta['ciudad_id']==0 || (int)$ruta['ciudad_id']!=$ruta['ciudad_id'])
        {
            $errors[]="Error al obtener datos de la ciudad del registro";
        }        
        if((int)$ruta['tipo_id']==0 || (int)$ruta['tipo_id']!=$ruta['tipo_id'])
        {
            $errors[]="Error al obtener datos del tipo del registro";
        }        
        if((int)$ruta['dias']==0 || (int)$ruta['dias']!=$ruta['dias'])
        {
            $errors[]="Error al obtener datos de los días del registro";
        }        

        if(count($errors)>0) {
            return response()->json(['status'=>['error'=>2, 'message'=>'Error en datos iniciales'], 'data'=>null, 'errors'=>$errors]);
        }
        //return $ruta;

        //Paso 2: Creamos el registro en la tabla resultados
        $modruta = Ruta::find($id);
        $modruta->nombre       = $ruta['nombre'];
        $modruta->ciudad_id    = $ruta['ciudad_id'];
        $modruta->tipo_id      = $ruta['tipo_id'];
        $modruta->dias         = $ruta['dias'];
        try {
            $modruta->save();
        } catch (\Exception $e) {
            return response()->json(['status'=>['error'=>1, 'message'=>'Error en consulta'], 'data'=>null]);
        }

        //Paso 3: Retornamos el resultado
        if(!$modruta)
        {
            return response()->json(['status'=>['error'=>2, 'message'=>'No hay datos'], 'data'=>null]);
        } else {
            return response()->json(['status'=>['error'=>0, 'message'=>''], 'data'=>$modruta]);
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

    public function destroy($id)
    {
        //Paso 1: Comprobamos las variables
        if ($id==0 || $id!=(int)$id){
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales1'], 'data'=>null]);
        }

        //Paso 2: creamos la consulta
        try {
            $ruta = Ruta::findOrFail($id);
            $ruta->delete();
        } catch (\Exception $e) {
            return response()->json(['status'=>['error'=>1, 'message'=>"Error en consulta"]]); 
        }

        //Paso 3: retornamos el resultado
        if($ruta){
            return response()->json(['status'=>['error'=>0, 'message'=>""]]);
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

    public function rutaNuevo()
    {
        //Obtenemos las ciudades
        $ciudades = app('App\Http\Controllers\CiudadController')->index();
        $ciudades = @json_decode(json_encode($ciudades), true);
        $ciudades=$ciudades['original']['data'];
        //return $ciudades;

        //Obtenemos los tipos de ruta
        $tiporutas = app('App\Http\Controllers\TiporutaController')->index();
        $tiporutas = @json_decode(json_encode($tiporutas), true);
        $tiporutas=$tiporutas['original']['data'];
        //return $tiporutas;

        return view('paginas.master.rutaNuevo', compact('ciudades', 'tiporutas', 'errors'));
    }

    public function rutaNuevo2(Request $request)
    {
        //Paso1: Sanitizamos las variables
        $errors=array();
        $rutareq=$request->all();
        //return $rutareq;

        if($rutareq)
        {
            if($rutareq['nombre']!=strip_tags($rutareq['nombre']) || strlen(str_replace(' ', '', $rutareq['nombre']))==0)
            {
                $errors[]="Error al obtener datos del nombre del registro";
            }
            if($rutareq['ciudad_id']!=(int)$rutareq['ciudad_id'] || $rutareq['ciudad_id']==0)
            {
                $errors[] = "Error en los datos de la ciudad";
            }
            if($rutareq['tipo_id']!=(int)$rutareq['tipo_id'] || $rutareq['tipo_id']==0)
            {
                $errors[] = "Error en los datos del tipo de ruta";
            }
            if($rutareq['dias']!=(int)$rutareq['dias'] || $rutareq['dias']==0)
            {
                $errors[] = "Error en los datos de los días de la ruta";
            }
        }

        if(!$errors){
            //Insertamos la ruta en la BD
            $rutaBD = $this->store($rutareq);
            $rutaBD = @json_decode(json_encode($rutaBD), true);
            $rutaBD=$rutaBD['original']['data'];
            //return $rutaBD;
            $id=$rutareq['ciudad_id'];
            return redirect()->action('RutaController@rutasXCiudad', compact('id'));
        } else {
            //Obtenemos las ciudades
            $ciudades = app('App\Http\Controllers\CiudadController')->index();
            $ciudades = @json_decode(json_encode($ciudades), true);
            $ciudades=$ciudades['original']['data'];
            //return $ciudades;

            //Obtenemos los tipos de ruta
            $tiporutas = app('App\Http\Controllers\TiporutaController')->index();
            $tiporutas = @json_decode(json_encode($tiporutas), true);
            $tiporutas=$tiporutas['original']['data'];
            //return $tiporutas;

            return view('paginas.master.rutaNuevo', compact('ciudades', 'tiporutas', 'errors'));
        }
    }

    public function rutaModificar($id)
    {
        //Paso 1: Sanitizamos las variables
        $id=(int)$id;
        if($id==0) {
            return response()->json(['status'=>['error'=>1, 'message'=>'Error en datos iniciales'], 'data'=>null]);
        }

        //Paso 2: Obtenemos la ruta
        $ruta = $this->showXId($id);
        $ruta = @json_decode(json_encode($ruta), true);
        $ruta=$ruta['original']['data'];
        //return $ruta;

        //Obtenemos las ciudades
        $ciudades = app('App\Http\Controllers\CiudadController')->index();
        $ciudades = @json_decode(json_encode($ciudades), true);
        $ciudades=$ciudades['original']['data'];
        //return $ciudades;

        //Obtenemos los tipos de ruta
        $tiporutas = app('App\Http\Controllers\TiporutaController')->index();
        $tiporutas = @json_decode(json_encode($tiporutas), true);
        $tiporutas=$tiporutas['original']['data'];
        //return $tiporutas;

        return view('paginas.master.rutaModificar', compact('ruta', 'ciudades', 'tiporutas', 'errors'));
    }

    public function rutaModificar2($id, Request $request)
    {
        //Paso1: Sanitizamos las variables
        $errors=array();
        $rutareq=$request->all();
        //return $rutareq;

        if($rutareq)
        {
            if($rutareq['nombre']!=strip_tags($rutareq['nombre']) || strlen(str_replace(' ', '', $rutareq['nombre']))==0)
            {
                $errors[]="Error al obtener datos del nombre del registro";
            }
            if($rutareq['ciudad_id']!=(int)$rutareq['ciudad_id'] || $rutareq['ciudad_id']==0)
            {
                $errors[] = "Error en los datos de la ciudad";
            }
            if($rutareq['tipo_id']!=(int)$rutareq['tipo_id'] || $rutareq['tipo_id']==0)
            {
                $errors[] = "Error en los datos del tipo de ruta";
            }
            if($rutareq['dias']!=(int)$rutareq['dias'] || $rutareq['dias']==0)
            {
                $errors[] = "Error en los datos de los días de la ruta";
            }
            if($id!=(int)$id || $id==0)
            {
                $errors[] = "Error en los datos de identificación de la ruta";
            }
        }
        $rutareq['id']=$id;

        if(!$errors){
            //Insertamos la ruta en la BD
            $rutaBD = $this->update($rutareq, $id);
            //return $rutaBD;
            $rutaBD = @json_decode(json_encode($rutaBD), true);
            $rutaBD=$rutaBD['original']['data'];
            //return $rutaBD;
            $id=$rutareq['ciudad_id'];
            return redirect()->action('RutaController@rutasXCiudad', compact('id'));
        } else {
            //Obtenemos las ciudades
            $ciudades = app('App\Http\Controllers\CiudadController')->index();
            $ciudades = @json_decode(json_encode($ciudades), true);
            $ciudades=$ciudades['original']['data'];
            //return $ciudades;

            //Obtenemos los tipos de ruta
            $tiporutas = app('App\Http\Controllers\TiporutaController')->index();
            $tiporutas = @json_decode(json_encode($tiporutas), true);
            $tiporutas=$tiporutas['original']['data'];
            //return $tiporutas;
            $ruta=$rutareq;
            return view('paginas.master.rutaModificar', compact('$id', 'ruta', 'ciudades', 'tiporutas', 'errors'));
        }
    }



    public function rutaBorrar1($id)
    {
        //Paso 1: Comprobamos las variables
        if ($id==0 || $id!=(int)$id){
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales1'], 'data'=>null]);
        }

        //Paso 2: obtenemos datos del texto
        $ruta = app('App\Http\Controllers\RutaController')->showXId($id);
        $ruta = @json_decode(json_encode($ruta), true);
        $ruta = $ruta['original']['data'];
        //return $ruta;

        //Paso 3: mandamos a la vista
        return view('paginas.master.RutaBorrar1', compact('ruta'));
    }

    public function rutaBorrar2($id)
    {
        //Paso 1: Comprobamos las variables
        if ($id==0 || $id!=(int)$id){
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales1'], 'data'=>null]);
        }

        //Paso 2: obtenemos datos de la ruta
        $ruta = $this->showXId($id);
        $ruta = @json_decode(json_encode($ruta), true);
        $ruta = $ruta['original']['data'];
        //return $ruta;

        //Paso 3: Eliminamos el registro de la tabla ruta
        $resruta = $this->destroy($id);
        $resruta = @json_decode(json_encode($resruta), true);
        //$resruta = $resruta['original']['status']['error'];
        if($resruta['original']['status']['error']!=0)
        {
            $errors[]="Ha habido un error al eliminar la ruta";
        }

        $id = $ruta['ciudad_id'];
        return $ruta['ciudad_id'];
        return redirect()->action('RutaController@rutasXCiudad', compact('id'));
    }

}
