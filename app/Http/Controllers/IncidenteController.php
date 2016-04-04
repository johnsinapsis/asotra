<?php

namespace App\Http\Controllers;

use Auth;
use App\Incidente;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IncidenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('adm.incidente');
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function link_repor()
    {
        return View('adm.repinciden');
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

         $v = \Validator::make($request->all(), [
             'idunidad' => 'required',
             'idinvo' => 'required',
             'fecha' => 'required|date',
             'hora' => 'required',
             'descripcion' => 'required'
            ]);
          if ($v->fails())
        {
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else
         {

            $inci = new Incidente([
                'idunidad' => $request->get('idunidad'),
                'iduniinv' => $request->get('idinvo'),
                'iduser' => Auth::user()->id,
                'fecinci' => $request->get('fecha'),
                'horinci' => $request->get('hora'),
                'descripcion' => $request->get('descripcion'),
                'causa' => $request->get('causa'),
                'tratamiento' => $request->get('tratamiento'),
                ]);
            $inci->save();
            return View('adm.incidente')->with('mensaje','Resolución Registrada Satisfactoriamente');
        }
    }


    /**
     * Muestra un listado de incidentes del último mes
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function list_incidentes(Request $request)
    {
        $idunidad = $request->get('idunidad');
        $idinvo = $request->get('idinvo');
        $fechaini = $request->get('fechaini');
        $horaini = $request->get('horaini');
        $fechafin = $request->get('fechafin');
        $horafin = $request->get('horafin');
        $descri = $request->get('descri');
        $analisis = $request->get('analisis');
        $array = array($idunidad, $idinvo, $descri);
        $resul = Incidente::join('c_costo as a','incidentes.idunidad','=','a.id')
                          ->join('c_costo as b','incidentes.iduniinv','=','b.id')
                          ->join('users','incidentes.iduser','=','users.id')
                          ->select('fecinci','horinci','a.NOMBRE','b.NOMBRE','name','descripcion')
                          ->whereRaw('idunidad = ? and iduniinv = ? and descripcion like %?%', $array)
                          ->get();
        dd($resul);
        //whereRaw('columna1 = ?, columna2 = ? columna3 = ?', array(valor1, valor2, valor3))

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
