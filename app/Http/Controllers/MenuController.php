<?php

namespace App\Http\Controllers;
use App\RoleFuncion;
use App\Funcion;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Funcion::where('estado',1)
                      ->first();
        return $item;
    }

    
      /**
     * Para realizar las cajas
     *
     * 
     * @param  string  $id
     * @return Response
     */
    public function box($funcion,$role)
    {
        $count = RoleFuncion::where('id_funcion', $funcion)
                                    ->where('role',$role)
                                    ->count();
        return $count;
    }


     /**
     * Para listar el menu
     *
     * 
     * @param  string  $id
     * @return Response
     */
    public function listmenu($role,$nivel)
    {
      
      $list =  Funcion::whereIn('id', function($query) use ($role){
    $query->select('id_funcion')
    ->from(with(new RoleFuncion)->getTable())
    ->where('id_role', $role);
  })->where('nivel', $nivel)->orderBy('nivel','desc')->orderBy('orden')->get();
        /*$list = Funcion::whereIn('id', function($query){
            $query->select('id_funcion')
            ->from(with(new RoleFuncion)->getTable())
                  ->where('id_role',$role)
        })->get()*/
        
       
        /*$list = RoleFuncion:: where('id_role',$role)

                                    ->get();*/


        return $list;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function submenu($role,$id)
    {
    $item = Funcion::whereIn('id', function($query) use ($role){
    $query->select('id_funcion')
    ->from(with(new RoleFuncion)->getTable())
    ->where('id_role', $role);
  })->where('mayor',$id)->orderBy('orden')->get();
        return $item;
    }




    /**
     * Cuenta los niveles
     *
     * @param  int  $id
     * @return 
     */
    public function numnivel()
    {
        $max = Funcion::where('estado',1)
                      ->max('nivel');
        return $max;
    }


    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function link_dc()
    {
        return View('calidad.calidad-dc');
    }
}
