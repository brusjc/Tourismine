<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Auth;
use App\Punto;
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
        if($punto){
            if($punto['nombre']!=strip_tags($punto['nombre']) || $punto['nombre'] == "" )
            {
                $errors="El nombre del punto no es correcto";
            }
            if((int)$punto['ciudad_id'] == 0 || $punto['ciudad_id']!=(int)$punto['ciudad_id'])
            {
                $errors="El valor de ciudad no es correcto";
            }
            if($punto['direccion']!=strip_tags($punto['direccion']) || $punto['direccion'] == "" )
            {
                $errors="La dirección del punto no es correcta";
            }
            if((int)$punto['cpostal'] == 0 || $punto['cpostal']!=(int)$punto['cpostal'])
            {
                $errors="El código postal no es correcto";
            }
            $punto['telefono'] = str_replace(' ', '', $punto['telefono']);
            if((int)$punto['telefono'] == 0 || $punto['telefono']!=(int)$punto['telefono'])
            {
                $errors="El teléfono no es correcto";
            }
            if((double)$punto['latitud'] == 0 || $punto['latitud']!=(double)$punto['latitud'])
            {
                $errors="La latitud no es correcta";
            }
            if((double)$punto['longitud'] == 0 || $punto['longitud']!=(double)$punto['longitud'])
            {
                $errors="La longitud no es correcta";
            }
            if((int)$punto['horario_id'] == 0 || $punto['horario_id']!=(int)$punto['horario_id'])
            {
                $errors="El valor del horario no es correcto";
            }
            if((int)$punto['tipo_id'] == 0 || $punto['tipo_id']!=(int)$punto['tipo_id'])
            {
                $errors="El valor del tipo no es correcto";
            }
            if((int)$punto['puntos'] == 0 || $punto['puntos']!=(int)$punto['puntos'])
            {
                $errors="Los puntos no son correctos";
            }
            if($punto['descripcion']!=strip_tags($punto['descripcion']) || $punto['descripcion'] == "" )
            {
                $errors="La descripción del punto no es correcta";
            }
            if($punto['etiquetas']!=strip_tags($punto['etiquetas']) || $punto['etiquetas'] == "" )
            {
                $errors="Las etiquetas del punto no son correctas";
            }
        }
        if(isset($errors)){
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales1'], 'data'=>$errors]);
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
            $mipunto->visible         = 0;
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
        if((int)$punto['visible']==0 || (int)$punto['visible']==1) {
        } else {
            $errors[]="Error al obtener datos del tipo de punto";
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
            $modpunto->visible      = $punto['visible'];
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
    public function showXProvincia() 
    {
        $roll = Auth::user()->roll_id;
        $usuario = Auth::user()->id;
        //return $roll;

        if($roll==99)
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
        } else if($roll==51){
            try
            {
                $dato = Punto::whereHas('Editorpunto', function($q) use ($usuario) {$q->where('user_id', $usuario);} )
                    ->with(['Ciudad' => function($query){ $query->orderBy('nombre','ASC');}])
                    ->with(['Provincia' => function($query){ $query->orderBy('nombre','ASC');}])
                    ->orderBy('ciudad_id', 'ASC')
                    ->get();
            } catch (\Exception $e) {
                return response()->json(['status'=>['error'=>1, 'message'=>"Error en consulta"], 'data'=>null]);
            }
        } else {
            try
            {
                $dato = Punto::orderBy('ciudad_id', 'asc')
                    ->with('Ciudad')
                    ->with('Provincia')
                    ->where('visible', '1')
                    ->get();
            } catch (\Exception $e) {
                return response()->json(['status'=>['error'=>1, 'message'=>"Error en consulta"], 'data'=>null]);
            }
        }

        if(count($dato)==0)
        {
            return response()->json(['status'=>['error'=>2, 'message'=>"No hay datos"], 'data'=>null]);
        } else {
            return response()->json(['status'=>['error'=>0, 'message'=>""], 'data'=>$dato]);
        } 
    }

    public function showXCiudad($id) 
    {
        //Paso 1: Sanitizamos las variables
        $id=(int)$id;
        if($id==0) {
            return response()->json(['status'=>['error'=>3, 'message'=>'Error en datos iniciales'], 'data'=>null]);
        }
        $roll = Auth::user()->roll_id;
        //return $roll;

        //Paso 2: realizamos la consulta
        if($roll==99)
        {
            try
            {
                $dato = Punto::where('ciudad_id', $id)
                    ->with('Ciudad')
                    ->with('Provincia')
                    ->orderBy('nombre', 'asc')
                    ->get();
            } catch (\Exception $e) {
                return response()->json(['status'=>['error'=>1, 'message'=>"Error en consulta"], 'data'=>null]);
            }
        } else if($roll==51){
            try
            {
                $dato = Punto::where('ciudad_id', $id)
                    ->with('Ciudad')
                    ->with('Provincia')
                    ->with('EditorPuntos')
                    ->orderBy('nombre', 'asc')
                    ->get();
            } catch (\Exception $e) {
                return response()->json(['status'=>['error'=>1, 'message'=>"Error en consulta"], 'data'=>null]);
            }
        } else {
            try
            {
                $dato = Punto::where('ciudad_id', $id)
                    ->where('visible', 1)
                    ->with('Ciudad')
                    ->with('Provincia')
                    ->orderBy('nombre', 'asc')
                    ->get();
            } catch (\Exception $e) {
                return response()->json(['status'=>['error'=>1, 'message'=>"Error en consulta"], 'data'=>null]);
            }
        }

        if(count($dato)==0)
        {
            return response()->json(['status'=>['error'=>2, 'message'=>"No hay datos"], 'data'=>null]);
        } else {
            return response()->json(['status'=>['error'=>0, 'message'=>""], 'data'=>$dato]);
        } 
    }

    public function showXCiudadOrden($id) 
    {
        //Paso 1: Sanitizamos las variables
        $id=(int)$id;
        if($id==0) {
            return response()->json(['status'=>['error'=>3, 'message'=>'Error en datos iniciales'], 'data'=>null]);
        }

        //Paso 2: realizamos la consulta
        try
        {
            $dato = Punto::where('ciudad_id', $id)
                ->with('Ciudad')
                ->with('Provincia')
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


    public function ordenTextos($textoreq, $orden)
    {
        //$orden es la matriz que indica el orden de cada elemento en el array

        //return $textoreq;
        return $orden;
        //Función que reordena los puntos de una ruta

        //1.- Solicitamos los puntos de la ruta ordenados por campo orden
        $rutapuntos = $this->showXCiudadOrden($textoreq['ruta_id']);
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
        $ordenes = array_diff($ordenes, array($textoreq['id']));
        //return $ordenes;
        array_splice($ordenes , (int)$textoreq['orden']-1, 0, (int)$textoreq['id']);
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

    //Master: Tabla con todos los puntos por provincia
    public function masterPuntos($message=null)
    {
        $puntos=$this->showXProvincia();
        //return $puntos;
        $puntos = @json_decode(json_encode($puntos), true);
        $puntos=$puntos['original'];
        if($message)
        {
            return view('paginas.master.index', compact('puntos', 'message'));
        } else {
            return view('paginas.master.index', compact('puntos'));
        }
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
        return view('paginas.master.PuntoNuevo', compact('tipos', 'ciudades'));
    }

    public function puntoNuevo2(Request $request)
    {
        //Paso 1: Sanitizamos las variables
        $punto=$request->all();
        //return $punto;
        if(isset($punto)){
            if($punto['nombre']!=strip_tags($punto['nombre']) || $punto['nombre'] == "")
            {
                $errors[]="Error al obtener el nombre del punto";
            }

            if($punto['ciudad_id']!=strip_tags($punto['ciudad_id']) || $punto['ciudad_id'] == "")
            {
                $errors[]="Error al obtener la ciudad del punto";
            }

            if($punto['direccion']!=strip_tags($punto['direccion']) || $punto['direccion'] == "")
            {
                $errors[]="Error al obtener la direccion del punto";
            }

            if($punto['cpostal'] != (int)$punto['cpostal'] || $punto['cpostal'] == 0)
            {
                $errors[]="Error al obtener el código postal del punto";
            }

            $punto['telefono'] = str_replace(' ', '', $punto['telefono']);
            if($punto['telefono'] != (int)$punto['telefono'] || strlen($punto['telefono'])==0 || $punto['telefono'] == 0)
            {
                $errors[]="Error al obtener el teléfono del punto";
            }

            if($punto['longitud'] != (float)$punto['longitud'] || $punto['longitud'] == 0)
            {
                $errors[]="Error al obtener la longitud del punto";
            }

            if($punto['latitud'] != (float)$punto['latitud'] || $punto['latitud'] == 0)
            {
                $errors[]="Error al obtener la latitud del punto";
            }

            if($punto['horario_id'] != (int)$punto['horario_id'] || $punto['horario_id'] == 0)
            {
                $errors[]="Error al obtener el horario del punto";
            }

            if($punto['tipo_id'] != (int)$punto['tipo_id'] || $punto['tipo_id'] == 0)
            {
                $errors[]="Error al obtener el horario del punto";
            }

            if($punto['puntos'] != (int)$punto['puntos'] || $punto['puntos'] == 0)
            {
                $errors[]="Error al obtener la puntuación del punto";
            }

            if($punto['descripcion']!=strip_tags($punto['descripcion']) || $punto['descripcion'] == "")
            {
                $errors[]="Error al obtener la descripcion del punto";
            }
            if($punto['etiquetas']!=strip_tags($punto['etiquetas']) || $punto['etiquetas'] == "")
            {
                $errors[]="Error al obtener las etiquetas del punto";
            }
        }
        //Paso 2: Creamos el punto nuevo
        if(!isset($errors))
        {
            //Incluimos el punto en la BD
            $respunto = $this->store($punto);
            $respunto = @json_decode(json_encode($respunto), true);
            //return $respunto;

            //Asignamos el punto al editor
            $editorpunto['user_id'] = Auth::user()->id;
            $editorpunto['punto_id'] = $respunto['original']['data']['id'];
            //return $editorpunto;
            $reseditor = app('App\Http\Controllers\EditorpuntoController')->store($editorpunto);
            //return $reseditor;
            $reseditor = @json_decode(json_encode($reseditor), true);
            //return $reseditor;

            if($respunto['original']['status']['error']==0)
            {
                $message="Punto de interés incluido en la base de datos";
                return redirect()->action('PuntoController@masterPuntos', compact('message'));            
            } else {
                $errors[] = $respunto['original']['status']['message'];

                //A: Obtenemos la tabla de tipod de monumento
                $tipos = app('App\Http\Controllers\TipoController')->index();
                $tipos = @json_decode(json_encode($tipos), true);
                $tipos=$tipos['original'];
                //return $tipos;

                //B: Obtenemos las ciudades
                $ciudades = app('App\Http\Controllers\CiudadController')->index();
                $ciudades = @json_decode(json_encode($ciudades), true);
                $ciudades=$ciudades['original'];
                //return $ciudades;

                //C: Vamos al formulario
                return view('paginas.master.masterPuntoNuevo', compact('tipos', 'ciudades', 'errors'));
            }
        } else {
            //A: Obtenemos la tabla de tipod de monumento
            $tipos = app('App\Http\Controllers\TipoController')->index();
            $tipos = @json_decode(json_encode($tipos), true);
            $tipos=$tipos['original'];
            //return $tipos;

            //B: Obtenemos las ciudades
            $ciudades = app('App\Http\Controllers\CiudadController')->index();
            $ciudades = @json_decode(json_encode($ciudades), true);
            $ciudades=$ciudades['original'];
            //return $ciudades;

            //return $errors;
            //C: Vamos al formulario
            return view('paginas.master.masterPuntoNuevo', compact('tipos', 'ciudades', 'errors'));
        }

    }

    public function puntoModificar1($id)
    {
        //Paso 1: Sanitizamos las variables
        $id=(int)$id;
        if($id==0) {
            return response()->json(['status'=>['error'=>1, 'message'=>'Error en datos iniciales'], 'data'=>null]);
        }

        //Paso 2: Obtenemos la tabla de tipos de monumento
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
        $punto=$punto['original']['data'];
        //return $punto;

        //Paso 5: Obtenemos los textos del punto de interés
        $textos=app('App\Http\Controllers\TextoController')->showXPuntoOrden($punto['id']);
        $textos = @json_decode(json_encode($textos), true);
        //return $textos;
        $textos=$textos['original']['data'];
        //return $textos;
        $punto['textos']=$textos;

        $punto['siglos']=app('App\Http\Controllers\TextoController')->creaSiglos();

        //return $textos;

        //Preparamos el arrahy de siglos marcados
        if(isset($punto['textos']))
        {
            foreach($punto['textos'] as $key1=>$texto)
            {
                //Actualizamos la tabla textosiglos
                $siglosBD = app('App\Http\Controllers\TextoController')->showXId($texto['id']);
                $siglosBD = @json_decode(json_encode($siglosBD), true);
                $siglosBD = $siglosBD['original']['data']['textosiglo'];
                //return $siglosBD;

                if(isset($punto['textos'][$key1]['textosiglo']))
                {
                    $sigloForm=array_fill(0, 21, false);
                    for($x=1; $x<=20; $x++)
                    {
                        $encontrado=0;
                        foreach ($siglosBD as $sigloBD)
                        {
                            if($sigloBD['siglo']==$x)
                            {
                                $encontrado=1;
                            }
                        }
                        if($encontrado==1)
                        {
                            $sigloForm[$x]=true;

                        }
                    }
                    $punto['textos'][$key1]['siglosmarcados']=$sigloForm;
                }
            }
        }
        //return $punto;

        //Obtenemos los datos del punto de interés
        return view('paginas.master.PuntoModificar', compact('punto', 'tipos','ciudades'));
    }

    public function puntoModificar2(Request $request, $id)
    {
        //Paso1: Sanitizamos las variables
        $errors=array();
        $punto=$request->all();
        //return $punto;

        if($punto)
        {
            if($punto['id']!=(int)$punto['id']){
                $errors[]="Error al obtener datos del id del registro";
            }
            if($punto['nombre']!=strip_tags($punto['nombre']) || strlen(str_replace(' ', '', $punto['nombre']))==0)
            {
                $errors[]="Error al obtener datos del nombre del registro";
            }
            if($punto['ciudad_id']!=(int)$punto['ciudad_id'])
            {
                $errors[]="Error al obtener datos de la ciudad del registro";
            }
            if($punto['direccion']!=strip_tags($punto['direccion']) || strlen(str_replace(' ', '', $punto['direccion']))==0)
            {
                $errors[]="Error al obtener datos de la dirección del registro";
            }
            if($punto['cpostal']!=(int)str_replace('.', '', $punto['cpostal']))
            {
                $errors[]="Error al obtener datos del código postal del registro";
            }
            if($punto['telefono']!=(int)str_replace('.', '', $punto['telefono']))
            {
                $errors[]="Error al obtener datos del teléfono del registro";
            }
            if($punto['web']!=strip_tags($punto['web']) || strlen(str_replace(' ', '', $punto['web']))==0)
            {
                $errors[]="Error al obtener datos de la dirección web del registro";
            }
            if($punto['latitud']!=(double)$punto['latitud'])
            {
                $errors[]="Error al obtener datos de la latitud del registro";
            }
            if($punto['longitud']!=(double)$punto['longitud'])
            {
                $errors[]="Error al obtener datos de la longitud del registro";
            }
            if($punto['puntos']!=(double)$punto['puntos'])
            {
                $errors[]="Error al obtener datos de los puntos del registro";
            }
            if($punto['horario_id']!=(int)str_replace('.', '', $punto['horario_id']))
            {
                $errors[]="Error al obtener datos del horario del registro";
            }
            if($punto['tipo_id']!=(int)str_replace('.', '', $punto['tipo_id']))
            {
                $errors[]="Error al obtener datos del tipo del registro";
            }
            if($punto['etiquetas']!=strip_tags($punto['etiquetas']) || strlen(str_replace(' ', '', $punto['etiquetas']))==0)
            {
                $errors[]="Error al obtener datos de las etiquetas del registro";
            }
            if($punto['descripcion']!=strip_tags($punto['descripcion']) || strlen(str_replace(' ', '', $punto['descripcion']))==0)
            {
                $errors[]="Error al obtener datos de las descripción del registro";
            }
            if((int)$punto['visible']==0 || (int)$punto['visible']==1)
            {
            }else{
                $errors[]="Error al obtener datos del horario del registro";
            }

            //Revisamos los textos
            if(isset($punto['textos']))
            {
                foreach($punto['textos'] as $key1=>$mipunto)
                {
                    if($mipunto['id']!=(int)$mipunto['id']){
                        $errors[]="Error al obtener datos del id del texto";
                    }
                    if($mipunto['texto']!=strip_tags($mipunto['texto']) || strlen(str_replace(' ', '', $mipunto['texto']))==0)
                    {
                        $errors[]="Error al obtener datos del texto del texto";
                    }
                    if($mipunto['orden']!=(int)str_replace('.', '', $mipunto['orden']))
                    {
                        $errors[]="Error al obtener datos del orden del texto";
                    }
                    if($mipunto['tipo_id']!=(int)str_replace('.', '', $mipunto['tipo_id']))
                    {
                        $errors[]="Error al obtener datos del tipo del texto";
                    }
                    $punto['textos'][$key1]['punto_id']=$punto['id'];

                    //Revisamos los siglos
                    if(isset($mipunto['siglosmarcados']))
                    {
                        //return $mipunto['siglosmarcados'];
                        foreach($mipunto['siglosmarcados'] as $key2=>$misiglo)
                        {
                            //return $siglo;
                            if($misiglo==1)
                            {
                                $punto['textos'][$key1]['siglosmarcados'][$key2]=1;
                            }
                        }
                    }
                }
            }

            //Revisamos el puntonuevo
            if(!is_null($punto['textonuevo']['texto']))
            {
                if($punto['textonuevo']['texto']!=strip_tags($punto['textonuevo']['texto']) || strlen(str_replace(' ', '', $punto['textonuevo']['texto']))==0)
                {
                    $errors[]="Error al obtener el texto del nuevo texto";
                }
                if($punto['textonuevo']['orden']!=(int)str_replace('.', '', $punto['textonuevo']['orden']) || is_null($punto['textonuevo']['orden']))
                {
                    $errors[]="Error al obtener el orden del nuevo texto";
                }
                if($punto['textonuevo']['tipo_id']!=(int)str_replace('.', '', $punto['textonuevo']['tipo_id']) || is_null($punto['textonuevo']['tipo_id']))
                {
                    $errors[]="Error al obtener el tipo del nuevo texto";
                }
                $punto['textonuevo']['punto_id']=$punto['id'];
            }

            $punto['siglos'] = app('App\Http\Controllers\TextoController')->creaSiglos();
        }
        //return $punto;

        //Paso2: si no hay errores grabamos los datos en la BD
        if(count($errors)==0)
        {

            //Actualizamos los datos de la tabla punto
            $respunto = $this->update($punto, $id);
            //return $respunto;
            $respunto = @json_decode(json_encode($respunto), true);
            //return $respunto;
            if($respunto['original']['status']['error']!=0)
            {
                $errors[]="Error interno al guardar el punto";
            }

            //Incorporamos el nuevo texto
            if(isset($punto['textonuevo']['texto']))
            {
                $restexto = app('App\Http\Controllers\TextoController')->store($punto['textonuevo']);
                $restexto = @json_decode(json_encode($restexto), true);
                //return $restexto;

                if($restexto['original']['status']['error']!=0)
                {
                    $errors[]="Error interno al guardar el texto nuevo";
                } else {
                    $restexto=$restexto['original']['data'];
                    $punto['textonuevo']['id']=$restexto['id'];
                    //Incorporamos los siglos
                    if(isset($punto['textonuevo']['siglosmarcados']))
                    {
                        foreach($punto['textonuevo']['siglosmarcados'] as $key2=>$sigloForm)
                        {
                            //incluimos el siglo en la BD
                            $siglo['texto_id']=$punto['textonuevo']['id'];
                            $siglo['siglo']=$key2;
                            //return $siglo;
                            $ressiglonuevo = app('App\Http\Controllers\TextosigloController')->store($siglo);
                        }
                    }
                }
                $punto['textos'][0]=$punto['textonuevo'];
            }
            //return $punto;

            //ordenamos los textos (cambiados) por el campo orden 
            if(isset($punto['textos']))
            {
                //Obtenemos los textos ordenados por orden
                $textosBDOrden = app('App\Http\Controllers\TextoController')->showXPuntoOrden($id);
                $textosBDOrden = @json_decode(json_encode($textosBDOrden), true);
                $textosBDOrden = $textosBDOrden['original']['data'];
                //return $textosBDOrden;

                //Creamos la matriz de textos ordenados por el campo orden
                for($x=1; $x<=count($punto['textos']); $x++)
                {
                    foreach($punto['textos'] as $key=>$mitexto)
                    {
                        if($mitexto['orden']==$x)
                        {
                            $ordentextos[]=$mitexto['id'];
                        }
                    }
                }
                //return $ordentextos;

                //Actualizamos cada uno de los textos
                foreach($ordentextos as $key1=>$ordentexto)
                {
                    //Buscamos el texto que coincide con el id
                    foreach($textosBDOrden as $key2=>$textoBD)
                    {
                        if((int)$textoBD['id']==$ordentexto)
                        {
                            //Actualizamos el texto
                            $textoBD['orden'] = $key1+1;
                            $restexto = app('App\Http\Controllers\TextoController')->update($textoBD, $textoBD['id']);
                            $restexto = @json_decode(json_encode($restexto), true);
                            //return $restexto;
                            if($restexto['original']['status']['error']!=0)
                            {
                                $errors[]="Error interno al guardar el texto";
                            }
                        }
                    }
                }                
                //return 'Hemos actualizado todos los textos';

                //Actualizamos los siglos de todos los puntos
                foreach($punto['textos'] as $key1=>$texto)
                {
                    //return $texto;
                    //Actualizamos la tabla textosiglos
                    $siglosBD = app('App\Http\Controllers\TextoController')->showXId($texto['id']);
                    $siglosBD = @json_decode(json_encode($siglosBD), true);
                    $siglosBD = $siglosBD['original']['data']['textosiglo'];
                    //return $siglosBD;

                    //Creamos la matriz de textos ordenados por el campo orden
                    foreach($siglosBD as $key=>$misiglo)
                    {
                        $BDsiglos[$misiglo['siglo']]=1;
                    }
                    //return $BDsiglos;

                    if(count($siglosBD)>0)
                    {
                        for($x=1; $x<=21; $x++)
                        {
                            if(isset($texto['siglosmarcados'][$x]))
                            {
                                if(!isset($BDsiglos[$x]))
                                {
                                    //incluimos el siglo en la BD
                                    $estesiglo['texto_id']=$texto['id'];
                                    $estesiglo['siglo']=$x;
                                    //return $estesiglo;
                                    $ressiglonuevo = app('App\Http\Controllers\TextosigloController')->store($estesiglo);
                                }
                            }
                        }
                    }
                }
            }
            //return $punto;
            //Comprobamos que no haya 2 textos con el mismo orden
            if(isset($punto['textos']))
            //if(count($punto['textos'])>1)
            {
                $resorden = app('App\Http\Controllers\TextoController')->showOrden($punto['id']);
                $resorden = @json_decode(json_encode($resorden), true);
                $resorden = $resorden['original']['data'];
                //return $resorden;
                $resorden = array_map(null, ...$resorden);  //Trasponemos la matriz
                //return $resorden;
                $resorden = $resorden[0];
                //return $resorden;
                $resorden=array_values(array_diff_assoc($resorden, array_unique($resorden)));
                if(count($resorden)>0) 
                {
                    $errors[] = "Hay varios textos con el mismo orden";
                }
            }
        }
        //return $punto;

        //Paso 3: Devolvemos a masterPuntoModificar
        return redirect()->action('PuntoController@puntoModificar1', compact('id'));
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

    public function Redactor($id)
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

    public function textoBorrar1($id)
    {
        //Paso 1: Comprobamos las variables
        if ($id==0 || $id!=(int)$id){
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales1'], 'data'=>null]);
        }

        //Paso 2: obtenemos datos del texto
        $restexto = app('App\Http\Controllers\TextoController')->showXId($id);
        $restexto = @json_decode(json_encode($restexto), true);
        $texto = $restexto['original']['data'];
        //return $texto;

        //Paso 3: mandamos a la vista
        return view('paginas.master.masterTextoBorrar1', compact('texto'));
    }

    public function textoBorrar2($id)
    {
        //Paso 1: Comprobamos las variables
        if ($id==0 || $id!=(int)$id){
            return response()->json(['status' =>['error'=>1, 'message'=>'Error en datos iniciales1'], 'data'=>null]);
        }
        $errors=array();

        //Paso 2: obtenemos datos del texto
        $texto = app('App\Http\Controllers\TextoController')->showXId($id);
        $texto = @json_decode(json_encode($texto), true);
        $texto = $texto['original']['data'];
        //return $texto;

        //Paso 3: Eliminamos los registros de textosiglo
        if(isset($texto['textosiglo']))
        {
            foreach($texto['textosiglo'] as $siglo)
            {
                $ressiglo = app('App\Http\Controllers\TextosigloController')->destroy($siglo['id']);
                $ressiglo = @json_decode(json_encode($ressiglo), true);
                //$ressiglo = $ressiglo['original']['status']['error'];
                if($ressiglo['original']['status']['error']!=0)
                {
                    $errors[]="Ha habido un error al eliminar el siglo";
                }
            }
        }
        //Paso 4: Eliminamos el registro de la tabla Textos
        if(count($errors)==0)
        {
            $restexto = app('App\Http\Controllers\TextoController')->destroy($texto['id']);
            $restexto = @json_decode(json_encode($restexto), true);
            //$restexto = $restexto['original']['status']['error'];
            if($restexto['original']['status']['error']!=0)
            {
                $errors[]="Ha habido un error al eliminar el texto";
            }
        }

        $punto = $texto['punto_id'];
        //return $punto;
        return redirect()->route('masterPuntoModificar', $punto);
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






































}
