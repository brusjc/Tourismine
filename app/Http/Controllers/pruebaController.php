<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pruebaController extends Controller
{
    public function list()
    {
        return response()->json(['success'=>['error'=>0, 'message'=>""], 'data'=>'hola']);
    }




}
