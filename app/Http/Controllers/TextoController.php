<?php

namespace App\Http\Controllers;
use App\Texto;

use Illuminate\Http\Request;

class TextoController extends Controller
{


//*******
//* API *
//*******

    public function store($texto)
    {
        //return $texto;
        //Paso 1: Comprobamos las variables
        $errors=array();
        if($texto['texto']!=strip_tags($texto['texto']) || strlen(str_replace(' ', '', $texto['texto']))==0)
        {
            $errors[]="Error al obtener datos del texto del texto ".$key;
        }
        if($texto['orden']!=(int)str_replace('.', '', $texto['orden']))
        {
            $errors[]="Error al obtener datos del orden del texto";
        }
        if($texto['tipo_id']!=(int)str_replace('.', '', $texto['tipo_id']))
        {
            $errors[]="Error al obtener datos del tipo del texto";
        }
        if($texto['punto_id']!=(int)str_replace('.', '', $texto['punto_id']))
        {
            $errors[]="Error al obtener datos del punto del texto";
        }

        if(count($errors)>0) {
            return response()->json(['status'=>['error'=>2, 'message'=>'Error en datos iniciales'], 'data'=>null, 'errors'=>$errors]);
        }
        //return $texto;

        //Paso 2: Obtenemos el último registro creado
        $registroinicial = Texto::latest('id')->first();

        //paso 3: incluimos el registro en la tabla
            $mitexto = new Texto;
            $mitexto->texto = $texto["texto"];
            $mitexto->tipo_id = $texto["tipo_id"];
            $mitexto->orden = $texto["orden"];
            $mitexto->punto_id = $texto["punto_id"];
            //return $mitexto;
        try{
            $mitexto->save();
            $registrofinal = Texto::latest('id')->first();
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

    public function update($texto, $id)
    {
        //return $texto;
        //Paso 1: Comprobamos las variables
        $errors=array();
        if($texto['id']!=(int)$texto['id']){
            $errors[]="Error al obtener datos del id del texto ".$key;
        }
        if($texto['texto']!=strip_tags($texto['texto']) || strlen(str_replace(' ', '', $texto['texto']))==0)
        {
            $errors[]="Error al obtener datos del texto del texto ".$key;
        }
        if($texto['orden']!=(int)str_replace('.', '', $texto['orden']))
        {
            $errors[]="Error al obtener datos del orden del texto";
        }
        if($texto['tipo_id']!=(int)str_replace('.', '', $texto['tipo_id']))
        {
            $errors[]="Error al obtener datos del tipo del texto";
        }
        if($texto['punto_id']!=(int)str_replace('.', '', $texto['punto_id']))
        {
            $errors[]="Error al obtener datos del punto del texto";
        }

        if(count($errors)>0) {
            return response()->json(['status'=>['error'=>2, 'message'=>'Error en datos iniciales'], 'data'=>null, 'errors'=>$errors]);
        }
        //return $texto;

        //Paso 2: Creamos el registro en la tabla resultados
            $modtexto = Texto::find($id);
            $modtexto->texto    = $texto['texto'];
            $modtexto->orden    = $texto['orden'];
            $modtexto->tipo_id  = $texto['tipo_id'];
            $modtexto->punto_id = $texto['punto_id'];
        //return $modtexto;
        try {
            $modtexto->save();
        } catch (\Exception $e) {
            return response()->json(['status'=>['error'=>1, 'message'=>'Error en consulta'], 'data'=>null]);
        }

        //Paso 3: Retornamos el resultado
        if(!$modtexto)
        {
            return response()->json(['status'=>['error'=>2, 'message'=>'No hay datos'], 'data'=>null]);
        } else {
            return response()->json(['status'=>['error'=>0, 'message'=>''], 'data'=>$modtexto]);
        }
    }

    public function showOrden($punto) 
    {
        //Paso 1: sanetizamos las variables
        $punto = (int)$punto;
        if ($punto==0)
        {
            return response()->json(['status'=>['error'=>1, 'message'=>"Los campos introducidos no son correctos"],'punto_interes'=>null]);
        }

        try
        {
            $dato = Texto::select('orden')
                ->where('punto_id', $punto)
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

    public function creaSiglos() 
    {
        $siglos['nombre']=['Prehistoria', 'Edad Antigua', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII', 'XIII', 'XIV', 'XV', 'XVI', 'XVII', 'XVIII', 'XIX', 'XX', 'XXI'];
        $siglos['valor']=array_fill(0, 19, false);
        return $siglos;
    }

    public function showXPunto($punto) 
    {
        //Paso 1: sanetizamos las variables
        $punto = (int)$punto;
        if ($punto==0)
        {
            return response()->json(['status'=>['error'=>1, 'message'=>"Los campos introducidos no son correctos"],'punto_interes'=>null]);
        }

        try
        {
            $dato = Texto::where('punto_id', $punto)
                ->with('Textosiglo')
                ->orderBy('id', 'asc')
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

    public function showXPuntoOrden($punto) 
    {
        //Paso 1: sanetizamos las variables
        $punto = (int)$punto;
        if ($punto==0)
        {
            return response()->json(['status'=>['error'=>1, 'message'=>"Los campos introducidos no son correctos"],'punto_interes'=>null]);
        }

        try
        {
            $dato = Texto::where('punto_id', $punto)
                ->with('Textosiglo')
                ->orderBy('orden', 'asc')
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
        //Paso 1: sanetizamos las variables
        $id = (int)$id;
        if ($id==0)
        {
            return response()->json(['status'=>['error'=>1, 'message'=>"Los campos introducidos no son correctos"],'data'=>null]);
        }

        //Paso 2: Hacemos la consulta
        try 
        {
            $dato = Texto::where('id', $id)
                ->with('Textosiglo')
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
        $id=(int)$id;

        //Paso 2: creamos la consulta
        try {
            $dato = Texto::findOrFail($id);
            $dato->delete();
        } catch (\Exception $e) {
            return response()->json(['status'=>['error'=>1, 'message'=>"Error en consulta"]]); 
        }

        //Paso 3: retornamos el resultado
        if($dato){
            return response()->json(['status'=>['error'=>0, 'message'=>""]]);
        } 
    }









}
