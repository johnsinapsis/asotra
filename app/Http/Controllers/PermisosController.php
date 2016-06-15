<?php

namespace App\Http\Controllers;

use App\Permiso;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('config.viewPermisos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $nomper = DB::table('perfiles')->select('nombre')->where('id',$request->get('perfil'))->first();

        $permiso = Permiso::select('id_funcion','id_role','nombre','nomfuncion','nivel','mayor','orden')
                        ->join('funciones','funciones.id','=','id_funcion')
                        ->join('perfiles','perfiles.id','=','id_role')
                        ->where('perfiles.id',$request->get('perfil'))
                        ->orderBy('nivel')
                        ->orderBy('orden')
                        ->get();
        $view = View('config.viewPermisos',[
                'perfil_id'  => $request->get('perfil'),
                'perfil_nom' => $nomper->nombre,
                 'permiso'   => $permiso
                  ]);
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $perfil)
    {
        $nomper = DB::table('perfiles')->select('nombre')->where('id',$perfil)->first();

        //dd($perfil);
        $per = new Permiso([
                'id_funcion' => $request->get('funcion'),
                'id_role'    => $perfil,
                ]);
        $per->save();
        
        $permiso = Permiso::select('id_funcion','id_role','nombre','nomfuncion','nivel','mayor','orden')
                        ->join('funciones','funciones.id','=','id_funcion')
                        ->join('perfiles','perfiles.id','=','id_role')
                        ->where('perfiles.id',$perfil)
                        ->orderBy('nivel')
                        ->orderBy('orden')
                        ->get();

        $view = View('config.viewPermisos',[
                'mensaje'    => 'Permiso asignado a Perfil Satisfactoriamente',
                'perfil_id'  => $perfil,
                'perfil_nom' => $nomper->nombre,
                 'permiso'   => $permiso
                  ]);

        return $view;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function list_funciones($id)
    {
        $list = DB::table('funciones')->select('id','nomfuncion')->whereRaw('id not in (select id_funcion from role_funcion where id_role = '.$id.')')->orderBy('nomfuncion')->get();
        return $list;
    }


    public function delete(Request $request)
    {

        if($request->ajax()){
        $perfil = $request->get('perfil');
        $funcion = $request->get('funcion');
        $nomper = DB::table('perfiles')->select('nombre')->where('id',$request->get('perfil'))->first();
        $permiso = Permiso::select('id_funcion','id_role','nombre','nomfuncion','nivel','mayor','orden')
                        ->join('funciones','funciones.id','=','id_funcion')
                        ->join('perfiles','perfiles.id','=','id_role')
                        ->where('perfiles.id',$request->get('perfil'))
                        ->orderBy('nivel')
                        ->orderBy('orden')
                        ->get();
        Permiso::where('id_role',$perfil)
               ->where('id_funcion',$funcion)
                   ->delete();
        return response()->json(array(
                        'mensaje'    =>'Registro eliminado Satisfactoriamente',
                        'perfil_id'  => $request->get('perfil'),
                        'perfil_nom' => $nomper->nombre,
                        'permiso'    => $permiso

                        ));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
