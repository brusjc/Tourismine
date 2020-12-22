<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function home($idm)
    {
        //Paso 1: Comprobamos si la url corresponde al lenguaje
        if(!session('lang')) { session(['lang' => 'es']); }
        if($idm!=session('lang'))
        {
            if(session('lang')=="es")
            {
               return redirect('/es/');
            } else {
               return redirect('/en/');
            }
        }

        switch (session('lang'))
        {
            case "es":
                session(['BC1' => '/es/']);
                session(['BC1texto' => 'Inicio']);
                break;
            case "en":
                session(['BC1' => '/en/']);
                session(['BC1texto' => 'Home']);
                break;
            default:
                session(['BC1' => '/es/']);
                session(['BC1texto' => 'Inicio']);
                break;
        }
        $miurl='/'.session('lang').'/';

        //Paso 3: Redirigimos a la vista
        return view('paginas.home', compact('miurl'));
    }

    public function home2()
    {
        //Paso 1: Comprobamos si la url corresponde al lenguaje
        if(!session('lang')) { session(['lang' => 'es']); }
        if(session('lang')=="es")
        {
           return redirect('/es/');
        } else {
           return redirect('/en/');
        }
    }    

}
