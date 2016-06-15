<?php

namespace App\Http\Controllers;

use App\Festivo;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FestivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('nomina.viewFestivo');
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
            'nombre.required' => 'El nombre de la fiesta es requerido',
            'fecha.required' => 'La fecha de la fiesta es requerida',
        ];
        $v = \Validator::make($request->all(), [
             'nombre' => 'required',
             'fecha' => 'required|date',

            ],$mensaje);
          if ($v->fails())
        {
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{

             $val = Festivo:: where('fecha',$request->get('fecha'))
                             ->get();
            $numreg = count($val);
            if($numreg > 0)
            {
             return redirect()->back()->withInput()->withErrors('El Festivo ya se encuentra en la base de datos');   
            } 
            else{
            $fest = new Festivo([
                'nomfiesta' => $request->get('nombre'),
                'fecha'     => $request->get('fecha'),
                ]);
            $fest->save();
            return View('nomina.viewFestivo')->with('mensaje','Festivo registrado Satisfactoriamente');
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

    public function browse(Request $request)
    {
        $fest = Festivo::where('fecha','=',$request->get('festivo'))
                        ->first();
                        //dd($request->get('ident'));
        $view = View('nomina.viewFestivo',[
                'browfestivo_id' =>  $fest->id,
                'browfestivo_nom' => $fest->nomfiesta,
                'browfestivo_fec' => $fest->fecha,
            ]);
        return $view;
    }

    public function list_festivos()
    {
        $fest = Festivo:: orderBy('fecha','desc')
                         ->paginate(10);
                $fest->setPath(route('festivo'));
        return $fest;
    }

    public function list_fest_ym($ano,$mes)
    {
        $sql = "select day(fecha) as dia from par_festivos where year(fecha)= ".$ano." and month(fecha) = ".$mes;
        $fest = DB::select($sql);
        return $fest;
    }


    public function delete(Request $request)
    {

        if($request->ajax()){
        $id = $request->get('cod');
        Festivo::where('id',$id)
                   ->delete();
        return response()->json(array('mensaje'=>'Registro eliminado Satisfactoriamente'));
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
        $fest = Festivo::where('id','=',$id)
                        ->first();
        $view = View('nomina.viewFestivo',[
                'festivo_id' =>  $fest->id,
                'festivo_nom' => $fest->nomfiesta,
                'festivo_fec' => $fest->fecha,
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
             'nombre.required' => 'El nombre de la fiesta es requerido',
            'fecha.required' => 'La fecha de la fiesta es requerida',
        ];
        $v = \Validator::make($request->all(), [
             'nombre' => 'required',
             'fecha' => 'required|date',
            ],$mensaje);
          if ($v->fails())
        {
             //dd('falló');
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{
            
             $val = Festivo:: where('fecha',$request->get('fecha'))
                             ->get();
            $numreg = count($val);
            if($numreg > 1)
            {
             return redirect()->back()->withInput()->withErrors('El Festivo ya se encuentra en la base de datos');   
            } 
            else{
            Festivo::where('id','=',$id)
                    ->update([
                'nomfiesta' => $request->get('nombre'),
                'fecha' => $request->get('fecha'),
                        ]);
            return View('nomina.viewFestivo')->with('mensaje','Cuadro de Turno actualizado Satisfactoriamente');
           }
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
