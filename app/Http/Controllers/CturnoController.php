<?php

namespace App\Http\Controllers;

use App\Cturno;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CturnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('nomina.viewCuadroTurno');
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
        $mensaje = [
            'nombre.required' => 'El nombre del cuadro es requerido'
        ];
        $v = \Validator::make($request->all(), [
             'nombre' => 'required',
             'estado' => 'required',

            ],$mensaje);
          if ($v->fails())
        {
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{

            $turno = new Cturno([
                'nomcuadro' => $request->get('nombre'),
                'estado' => $request->get('estado'),
                ]);
            $turno->save();
            return View('nomina.viewCuadroTurno')->with('mensaje','Cuadro de turno registrado Satisfactoriamente');
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
        $turno = Cturno::where('id','=',$id)
                       ->first();
        return $turno;
    }


    public function browse(Request $request)
    {
        $turno = Cturno::where('id','=',$request->get('idcuadro'))
                        ->first();
                        //dd($request->get('ident'));
        $view = View('nomina.viewCuadroTurno',[
                'cturno_id' => $turno->id,
                'cturno_nom' => $turno->nomcuadro,
                'cturno_est' => $turno->estado,
            ]);
        return $view;
    }

    public function list_cuadros(){
        $turno = Cturno::select('id','nomcuadro','estado')
                 ->orderBy('nomcuadro')
                 ->paginate(10);
                $turno->setPath(route('cturno'));
        return $turno;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turno = Cturno::where('id','=',$id)
                        ->first();
        $view = View('nomina.viewCuadroTurno',[
                'cturno_id' => $turno->id,
                'cturno_nom' => $turno->nomcuadro,
                'cturno_est' => $turno->estado,
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
    public function update(Request $request, $id)
    {
         $mensaje = [
            'nombre.required' => 'El nombre del cuadro es requerido'
        ];
        $v = \Validator::make($request->all(), [
             'nombre' => 'required'
            ],$mensaje);
          if ($v->fails())
        {
             //dd('falló');
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{
            
            
            Cturno::where('id','=',$id)
                    ->update([
                'nomcuadro' => $request->get('nombre'),
                'estado' => $request->get('estado'),
                        ]);
            return View('nomina.viewCuadroTurno')->with('mensaje','Cuadro de Turno actualizado Satisfactoriamente');
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
