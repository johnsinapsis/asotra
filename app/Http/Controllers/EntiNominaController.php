<?php

namespace App\Http\Controllers;

use App\EntiNomina;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EntiNominaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('nomina.viewEntidades');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $mensaje = [
            'tipent.exist' => 'Debe seleccionar un tipo de entidad',
            'nit.unique' => 'El código que intenta ingresar ya existe'
        ];
        $v = \Validator::make($request->all(), [
             'tipent' => 'required|exists:nmtipoent,id',
             'nombre' => 'required',
             'nit' => 'required|unique:nmentidades,nit',

            ],$mensaje);
          if ($v->fails())
        {
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{
             $ent = new EntiNomina([
                'nit' => $request->get('nit'),
                'nombre' => $request->get('nombre'),
                'tipo' => $request->get('tipent'),
                ]);
            $ent->save();
            return View('nomina.viewEntidades')->with('mensaje','Entidad registrada Satisfactoriamente');

        }
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

    public function browse(Request $request)
    {
        $ent = EntiNomina::where('nit','=',$request->get('ident'))
                        ->first();
        $view = View('nomina.viewEntidades',[
                'entidad_nit' => $ent->id,
                'entidad_nom' => $ent->nombre,
                'entidad_tipo' => $ent->tipo,
            ]);
        return $view;
    }

    public function list_entidades(){
        $ent = EntiNomina::select('nit','nmentidades.nombre','nmtipoent.nombre as tipo')
                 ->join('nmtipoent','nmentidades.tipo','=','nmtipoent.id')
                 ->orderBy('nmtipoent.nombre')
                 ->paginate(10);
                $ent->setPath(route('cargo'));
        return $ent;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nit)
    {
        $ent = EntiNomina::where('nit','=',$nit)
                        ->first();
        $view = View('nomina.viewEntidades',[
                'entidad_nit' => $ent->id,
                'entidad_nom' => $ent->nombre,
                'entidad_tipo' => $ent->tipo,
            ]);
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $mensaje = [
            'tipent.exist' => 'Debe seleccionar un tipo de entidad'
        ];
        $v = \Validator::make($request->all(), [
             'tipent' => 'required|exist:nmtipoent,id',
             'nombre' => 'required',
             'nit' => 'required|unique:nmentidades,nit',

            ],$mensaje);
          if ($v->fails())
        {
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{
            EntiNomina::where('nit','=',$request->get('nit'))
                    ->update([
                'nit' => $request->get('nit'),
                'nombre' => $request->get('nombre'),
                'tipo' => $request->get('tipo'),
                        ]);
            return View('nomina.viewEntidades')->with('mensaje','Entidad actualizada Satisfactoriamente');
        }
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
