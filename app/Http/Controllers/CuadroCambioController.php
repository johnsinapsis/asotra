<?php

namespace App\Http\Controllers;

use Auth;
use App\CuadroTur_cab;
use App\CuadroCambio;
use DB;
use Illuminate\Pagination\Paginator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CuadroCambioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = View('nomina.listcabcturno4',['cambio' => '1']);
        return $view;
    }

    public function index2($id)
    {
        
        //dd("En desarrollo");
        $turno = CuadroTur_cab:: select('idturno','nomcuadro','ano','mes')
                                ->join('nmcturnos_cab','nmcturnos_cab.id','=','nmcuadroturno_cab.idturno') 
                                ->where('nmcuadroturno_cab.id',$id)
                                ->first();

        $view = View('nomina.viewCambioturno',[
                'cuadro_id'  => $id,
                'cuadro_tur' => $turno->idturno,
                'cuadro_nom' => $turno->nomcuadro,
                'ano'        => $turno->ano,
                'mes'        => $turno->mes
                  ]);
        return $view;
        
    }

    public function index3()
    {
        return View('nomina.listcambios');
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
            'emp_origen.exists' => 'Empleado no válido',
            'emp_destino.exists' => 'Empleado no válido',
            'emp_destino.not_in' => 'Empleado origen y destino deben ser diferentes:'
        ];
        $v = \Validator::make($request->all(), [
             'emp_origen' => 'exists:empleados,id',
             'emp_destino'=> 'exists:empleados,id|not_in:'.$request->get('emp_origen'),
             'diaor'      => 'exists:nmcuadroturno_det,numdia,id_cuadrotur,'.$request->get('idcuadro'),
             'diades'     => 'exists:nmcuadroturno_det,numdia,id_cuadrotur,'.$request->get('idcuadro'),

            ],$mensaje);
          if ($v->fails())
        {
             
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{
            
            $val = CuadroCambio:: where('id_cuadro',$request->get('idcuadro'))
                                 ->where('idemple_or',$request->get('emp_origen'))
                                ->get();
            $numreg = count($val);
            if($numreg>2){
                return redirect()->back()->withInput()->withErrors('El cambio solicitado supera el numero de cambios permitidos por cuadro');  
            }
            else{

                $cambio = new CuadroCambio([
                   'id_cuadro' => $request->get('idcuadro'),
                   'idemple_or'=> $request->get('emp_origen'),
                   'idemple_des'=> $request->get('emp_destino'),
                   'dia_or'     => $request->get('diaor'),
                   'dia_des'    => $request->get('diades'),
                   'idhorario_or'  => $request->get('horarioor'),
                   'idhorario_des' => $request->get('horariodes'),
                   'idusu'  => Auth::user()->id
                   ]);
                $cambio->save();
                $turno = CuadroTur_cab:: select('idturno','nomcuadro','ano','mes')
                                ->join('nmcturnos_cab','nmcturnos_cab.id','=','nmcuadroturno_cab.idturno') 
                                ->where('nmcuadroturno_cab.id',$request->get('idcuadro'))
                                ->first();
                $view = View('nomina.viewCambioturno',[
                'mensaje'    => "Cambio de Turno Registrado Satisfactoriamente",
                'cuadro_id'  => $request->get('idcuadro'),
                'cuadro_tur' => $turno->idturno,
                'cuadro_nom' => $turno->nomcuadro,
                'ano'        => $turno->ano,
                'mes'        => $turno->mes
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

    public function browse(Request $request)
    {
        
        $sql = "select nmcuadrocambio.id, id_cuadro, ano, mes, nomcuadro, CONCAT(a.ape1_emp,' ',trim(a.ape2_emp),' ',a.nom1_emp,' ',trim(a.nom2_emp)) as nombre_or, dia_or, 
b.nomhorario as horario_or, CONCAT(c.ape1_emp,' ',trim(c.ape2_emp),' ',c.nom1_emp,' ',trim(c.nom2_emp)) as nombre_des, dia_des, d.nomhorario as horario_des
from nmcuadrocambio 
inner join nmcuadroturno_cab on id_cuadro = nmcuadroturno_cab.id 
inner join nmcturnos_cab on nmcturnos_cab.id  = nmcuadroturno_cab.idturno
inner join empleados  a on a.id =  nmcuadrocambio.idemple_or
inner join nmhorario_cab b on idhorario_or = b.id
inner join empleados c on c.id = idemple_des
inner join nmhorario_cab d on idhorario_or = d.id
where id_cuadro = ".$request->get('idcuadro')."
order by ano desc, mes desc";
        $browcambio = DB::select($sql);
        return $browcambio;
    }

    public function list_cambios(){
        $sql = "select nmcuadrocambio.id, id_cuadro, ano, mes, nomcuadro, CONCAT(a.ape1_emp,' ',trim(a.ape2_emp),' ',a.nom1_emp,' ',trim(a.nom2_emp)) as nombre_or, dia_or, 
b.nomhorario as horario_or, CONCAT(c.ape1_emp,' ',trim(c.ape2_emp),' ',c.nom1_emp,' ',trim(c.nom2_emp)) as nombre_des, dia_des, d.nomhorario as horario_des
from nmcuadrocambio 
inner join nmcuadroturno_cab on id_cuadro = nmcuadroturno_cab.id 
inner join nmcturnos_cab on nmcturnos_cab.id  = nmcuadroturno_cab.idturno
inner join empleados  a on a.id =  nmcuadrocambio.idemple_or
inner join nmhorario_cab b on idhorario_or = b.id
inner join empleados c on c.id = idemple_des
inner join nmhorario_cab d on idhorario_or = d.id
order by ano desc, mes desc";
        $cambio = DB::select($sql);
        $pagination = new Paginator($cambio, 15, 1);
        return $pagination;
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
