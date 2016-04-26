<?php

namespace App\Http\Controllers;

use App\Cargo;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('nomina.viewCargos');
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
            'codigo.unique' => 'El código que intenta ingresar ya existe'
        ];
        $v = \Validator::make($request->all(), [
             'codigo' => 'required|unique:nmcargos,id',
             'nombre' => 'required'
            ],$mensaje);
          if ($v->fails())
        {
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{
                if($request->get('idcargo')==0)
                    $jefe=NULL;
                else
                    $jefe= $request->get('idcargo');
                //dd(strlen($request->get('codigo')));
                
                $cargo = new Cargo([
                'id' => $request->get('codigo'),
                'nomcargo' => $request->get('nombre'),
                'idjefe' => $jefe
                ]);
            $cargo->save();
            return View('nomina.viewCargos')->with('mensaje','Cargo registrado Satisfactoriamente');
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
        $cargo = Cargo::where('id','=',$id)
                        ->first();
        return $cargo;
    }

    public function browse(Request $request)
    {
        $cargo = Cargo::where('id','=',$request->get('idcargo2'))
                        ->first();
        $view = View('nomina.viewCargos',[
                'cargo_id' => $cargo->id,
                'cargo_nom' => $cargo->nomcargo,
                'cargo_idj' => $cargo->idjefe,
            ]);
        return $view;
    }

    public function list_cargo()
    {
        $cargo = Cargo::select('nmcargos.id','nmcargos.nomcargo','x.nomcargo as nomjefe')
                        ->join('nmcargos as x', 'nmcargos.idjefe', '=', 'x.id')
                                ->orderBy('nmcargos.nomcargo')
                                ->paginate(10);
                $cargo->setPath(route('cargo'));
        return $cargo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $cargo = Cargo::where('id','=',$id)
                        ->first();
        $view = View('nomina.viewCargos',[
                'cargo_id' => $cargo->id,
                'cargo_nom' => $cargo->nomcargo,
                'cargo_idj' => $cargo->idjefe,
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
        $v = \Validator::make($request->all(), [
             'codigo' => 'required',
             'nombre' => 'required'
            ]);
          if ($v->fails())
        {
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{
                if($request->get('idcargo')==0)
                    $jefe=NULL;
                else
                    $jefe= $request->get('idcargo');

                Cargo::where('id','=',$request->get('codigo'))
                    ->update([
                            'nomcargo' => $request->get('nombre'),
                            'idjefe'   => $jefe

                        ]);
                return View('nomina.viewCargos')->with('mensaje','Cargo actualizado Satisfactoriamente');
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
