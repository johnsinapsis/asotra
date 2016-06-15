<?php

namespace App\Http\Controllers;

use App\Caso;
use Auth;
use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CasoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd("En desarrollo");
        return View('sistemas.viewCasos');
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
            'nombre.required' => 'El título del caso es requerido',
            'fecha.required' => 'La fecha del caso es requerida',
           // 'descripcion.size' => 'La descripcion debe tener mínimo 100 caracteres ('.strlen($request->get('descripcion')).')',
        ];
        $v = \Validator::make($request->all(), [
             'nombre' => 'required',
             'fecha' => 'required|date',
             'descripcion' => 'required',
            ],$mensaje);
          if ($v->fails())
        {
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{
            
            if(strlen($request->get('descripcion'))<100){

                 return redirect()->back()->withInput()->withErrors('La descripcion debe tener mínimo 100 caracteres ('.strlen($request->get('descripcion')).')'); 

            }
            else
            {
                $caso = new Caso([
                'fec_caso'     => $request->get('fecha'),
                'titulo'       => $request->get('nombre'),
                'id_tipsopor'  => $request->get('tipo'),
                'id_areasopor' => $request->get('area'),
                'descripcion'  => $request->get('descripcion'),
                'estado'       => 'A',
                'usureg'       => Auth::user()->id,
                ]);
               $caso->save();

               $numcaso = Caso::max('id');

               $view = View('sistemas.viewArchicasos',[
                'mensaje'    => "Caso Creado Satisfactoriamente",
                'caso_id'    => $numcaso,
                  ]);
                return $view;
            }
            
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
