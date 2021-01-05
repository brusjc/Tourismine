<?php

namespace App\Http\Controllers;
use App\Textosiglo;

use Illuminate\Http\Request;

class TextosigloController extends Controller
{


//*******
//* API *
//*******

    public function store($siglo)
    {
        //return $siglo;
        //Paso 1: Comprobamos las variables
        $errors=array();
        if($siglo['texto_id']!=(int)$siglo['texto_id'] || $siglo['texto_id']<=0)
        {
            $errors[]="Error al obtener datos del id deñ texto";
        }
        if($siglo['siglo']!=(int)$siglo['siglo'] || $siglo['siglo']<=0)
        {
            $errors[]="Error al obtener datos del siglo";
        }
        //return $errors;

        //Paso 2: Obtenemos el último registro creado
        $registroinicial = Textosiglo::latest('id')->first();

        //paso 3: incluimos el registro en la tabla
            $misiglo = new Textosiglo;
            $misiglo->texto_id = (int)$siglo["texto_id"];
            $misiglo->siglo = (int)$siglo["siglo"];
            //return $misiglo;
        try{
            $misiglo->save();
            $registrofinal = Textosiglo::latest('id')->first();
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

    public function update($siglo, $id)
    {
        //return $siglo;
        //Paso 1: Comprobamos las variables
        $errors=array();
        if($siglo['id']!=(int)$siglo['id']){
            $errors[]="Error al obtener datos del id del siglo ".$key;
        }
        if($siglo['siglo']!=strip_tags($siglo['siglo']) || strlen(str_replace(' ', '', $siglo['siglo']))==0)
        {
            $errors[]="Error al obtener datos del siglo del siglo ".$key;
        }
        if($siglo['orden']!=(int)str_replace('.', '', $siglo['orden']))
        {
            $errors[]="Error al obtener datos del orden del siglo";
        }
        if($siglo['tipo_id']!=(int)str_replace('.', '', $siglo['tipo_id']))
        {
            $errors[]="Error al obtener datos del tipo del siglo";
        }
        if($siglo['punto_id']!=(int)str_replace('.', '', $siglo['punto_id']))
        {
            $errors[]="Error al obtener datos del punto del siglo";
        }


        if(count($errors)>0) {
            return response()->json(['status'=>['error'=>2, 'message'=>'Error en datos iniciales'], 'data'=>null, 'errors'=>$errors]);
        }
        //return $siglo;

        //Paso 2: Creamos el registro en la tabla resultados
            $modsiglo = siglo::find($id);
            $modsiglo->siglo    = $siglo['siglo'];
            $modsiglo->orden    = $siglo['orden'];
            $modsiglo->tipo_id  = $siglo['tipo_id'];
            $modsiglo->punto_id = $siglo['punto_id'];
        //return $modsiglo;
        try {
            $modsiglo->save();
        } catch (\Exception $e) {
            return response()->json(['status'=>['error'=>1, 'message'=>'Error en consulta'], 'data'=>null]);
        }

        //Paso 3: Retornamos el resultado
        if(!$modsiglo)
        {
            return response()->json(['status'=>['error'=>2, 'message'=>'No hay datos'], 'data'=>null]);
        } else {
            return response()->json(['status'=>['error'=>0, 'message'=>''], 'data'=>$modsiglo]);
        }
    }

    public function showXPunto($texto) 
    {
        //Paso 1: sanetizamos las variables
        $texto = (int)$texto;
        if ($texto==0)
        {
            return response()->json(['status'=>['error'=>1, 'message'=>"Los campos introducidos no son correctos"],'data'=>null]);
        }

        try
        {
            $dato = Textosiglo::where('texto_id', $texto)
                ->with('Texto')
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


    public function showXId($id) 
    {
        //Paso 1: sanetizamos las variables
        $id = (int)$id;
        if ($id==0)
        {
            return response()->json(['status'=>['error'=>1, 'message'=>"Los campos introducidos no son correctos"],'data'=>null]);
        }

        //Paso 2: Hacdemos la consulta
        try 
        {
            $dato = siglo::where('id', $id)
                ->with('siglosiglo')
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
            $dato = Textosiglo::findOrFail($id);
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
