<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editorpunto;

class EditorpuntoController extends Controller
{


//*******
//* API *
//*******
    
    public function store($editorpunto)
    {
        if(isset($editorpunto)){
            if((int)$editorpunto['user_id'] == 0 || $editorpunto['user_id']!=(int)$editorpunto['user_id'])
            {
                $errors="El valor del usuario no es correcto";
            }
            if((int)$editorpunto['punto_id'] == 0 || $editorpunto['punto_id']!=(int)$editorpunto['punto_id'])
            {
                $errors="El valor del punto no es correcto";
            }
        }
        if(isset($errors)){
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales1'], 'data'=>$errors]);
        }

        //Paso 2: Obtenemos el último registro creado
        $registroinicial = Editorpunto::latest('id')->first();

        //paso 3: incluimos el registro en la tabla
        $mieditor = new Editorpunto;
        $mieditor->user_id       = $editorpunto["user_id"];
        $mieditor->punto_id          = $editorpunto["punto_id"];
        //return $mieditor;
        try{
            $mieditor->save();
            $registrofinal = Editorpunto::latest('id')->first();
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

}
