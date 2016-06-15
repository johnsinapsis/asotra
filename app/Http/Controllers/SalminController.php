<?php

namespace App\Http\Controllers;

use App\Salmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SalminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('nomina.viewSalmin');
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
            'salano.unique' => 'El año que intenta ingresar ya existe'
        ];
        $v = \Validator::make($request->all(), [
             'salano' => 'required|numeric|unique:nmsalmin,salano',
             'salmin' => 'required|numeric',
             'auxtra' => 'required|numeric',
            ],$mensaje);
          if ($v->fails())
        {
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{
                                
                $salmin = new Salmin([
                'salano' => $request->get('salano'),
                'salmin' => $request->get('salmin'),
                'salauxtra' => $request->get('auxtra'),
                ]);
            $salmin->save();
            return View('nomina.viewSalmin')->with('mensaje','Salario Mínimo registrado Satisfactoriamente');
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
        $salmin = Salmin::where('salano','=',$id)
                        ->first();
        return $salmin;
    }

    public function list_salmin()
    {
        $salmin = Salmin::orderBy('salano','desc')
                                ->paginate(10);
                $salmin->setPath(route('salmin'));
        return $salmin;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salmin = Salmin::where('salano','=',$id)
                        ->first();
        $view = View('nomina.viewSalmin',[
                'salmin_ano' => $salmin->salano,
                'salmin_val' => $salmin->salmin,
                'salmin_aux' => $salmin->salauxtra,
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
             'salano' => 'required|numeric',
             'salmin' => 'required|numeric',
             'auxtra' => 'required|numeric',
            ]);
          if ($v->fails())
        {
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{
                
                Salmin::where('salano','=',$request->get('salano'))
                    ->update([
                            'salmin' => $request->get('salmin'),
                            'salauxtra'   => $request->get('auxtra')

                        ]);
                return View('nomina.viewSalmin')->with('mensaje','Salario Mínimo actualizado Satisfactoriamente');
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
