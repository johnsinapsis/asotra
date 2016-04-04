<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
     public function menu()
    {
       
        $pepe = "una prueba";
        return View('main')->with('prueba',$pepe);   
    	
    }

    public function perfil()
    {
    	$perfil = DB::table('perfiles')->select('id','nombre')->where('estado',1)->orderBy('nombre')->get();
    	return $perfil;
    }
}
