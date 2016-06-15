<?php

namespace App\Http\Controllers;

use Auth;
use App\CuadroTur_cab;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use DB;

class CuadroTurCabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('nomina.viewCreacuadro');
    }

    public function index2($id)
    {
        $turno = CuadroTur_cab:: select('idturno','nomcuadro','ano','mes')
                                ->join('nmcturnos_cab','nmcturnos_cab.id','=','nmcuadroturno_cab.idturno') 
                                ->where('nmcuadroturno_cab.id',$id)
                                ->first();

        $view = View('nomina.viewCierreCturno',[
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
        return View('nomina.listcabcturno2');
    }

    public function index4()
    {
        return View('nomina.listcabcturno3');
    }

    public function index5()
    {
        return View('nomina.listcabcturno4');
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
            'cturno.required' => 'Debe registrar un cuadro de turno válido',
            'ano.required' => 'Debe registrar un año'
        ];
        $v = \Validator::make($request->all(), [
             'ano' => 'required',
             'mes'   => 'required',
             'cturno'   => 'required',

            ],$mensaje);
          if ($v->fails())
        {
             
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{

            $val = CuadroTur_cab:: where('idturno',$request->get('cturno'))
                                 ->where('ano',$request->get('ano'))
                                 ->where('mes',$request->get('mes'))
                                ->get();
            $numreg = count($val);
            if($numreg > 0)
            {
             return redirect()->back()->withInput()->withErrors('El Cuadro de turno ya ha sido Creado antes');   
            } 
            else{

                $turno = new CuadroTur_cab([
                   'idturno' => $request->get('cturno'),
                   'ano'     => $request->get('ano'),
                   'mes'     => $request->get('mes'),
                   'estado'  => 'E',
                   'usuela'  => Auth::user()->id,
                   'fecela'  => Carbon::now()
                   ]);
               $turno->save();

               $sel = CuadroTur_cab::max('id');

               $turno = CuadroTur_cab:: select('idturno','nomcuadro','ano','mes')
                                        ->join('nmcturnos_cab','nmcturnos_cab.id','=','nmcuadroturno_cab.idturno') 
                                        ->where('nmcuadroturno_cab.id',$sel)
                                        ->first();
               
               $view = View('nomina.viewDetaCuadro',[
                'mensaje'    => "Cuadro Creado Satisfactoriamente",
                'cuadro_id'  => $sel,
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
    public function imprimir($id)
    {
        $turno = CuadroTur_cab:: select('idturno','nomcuadro','ano','mes')
                                ->join('nmcturnos_cab','nmcturnos_cab.id','=','nmcuadroturno_cab.idturno') 
                                ->where('nmcuadroturno_cab.id',$id)
                                ->first();

        $view = View('nomina.viewPdfCuadro',[
                'cuadro_id'  => $id,
                'cuadro_tur' => $turno->idturno,
                'cuadro_nom' => $turno->nomcuadro,
                'ano'        => $turno->ano,
                'mes'        => $turno->mes
                  ]);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('letter', 'landscape');
       return $pdf->stream('cuadro.pdf');
        //return $view;
    }

    public function cerrar(Request $request)
    {
        //$request->get('idcuadro'),
        CuadroTur_cab::where('id','=',$request->get('idcuadro'))
                    ->update([
                            'estado' => 'C'
                        ]);
        return View('nomina.listcabcturno')->with('mensaje','Cuadro de Turno Cerrado Satisfactoriamente');
    }

    public function revisar(Request $request)
    {
        //$request->get('idcuadro'),
        CuadroTur_cab::where('id','=',$request->get('idcuadro'))
                    ->update([
                            'estado' => 'R',
                            'usurevi'=> Auth::user()->id,
                            'fecrevi' => Carbon::now()
                        ]);
        return View('nomina.listcabcturno2')->with('mensaje','Cuadro de Turno Cerrado Satisfactoriamente');
    }

    public function aprobar(Request $request)
    {
        //$request->get('idcuadro'),
        CuadroTur_cab::where('id','=',$request->get('idcuadro'))
                    ->update([
                            'estado' => 'A',
                            'usuapru'=> Auth::user()->id,
                            'fecapru' => Carbon::now()
                        ]);
        return View('nomina.listcabcturno2')->with('mensaje','Cuadro de Turno Cerrado Satisfactoriamente');
    }


    public function reprobar($id)
    {
        
        //dd($id);
        CuadroTur_cab::where('id','=',$id)
                    ->update([
                            'estado' => 'E',
                            'usurevi'=> Auth::user()->id,
                            'fecrevi' => Carbon::now()
                        ]);
        return View('nomina.listcabcturno2')->with('mensaje','Cuadro de Turno Abierto Satisfactoriamente');
    }

    public function list_cturnousu($user,$rol,$estado)
    {
        
        if($rol==3)
        {
            $turno = CuadroTur_cab:: select('nmcuadroturno_cab.id','nomcuadro','ano','mes','nmcuadroturno_cab.estado')
                               ->join('nmcturnos_cab','nmcturnos_cab.id','=','nmcuadroturno_cab.idturno') 
                               ->join('nmcturnos_usu', 'nmcturnos_cab.id', '=', 'nmcturnos_usu.id_turno')
                               ->where('nmcturnos_cab.estado',1)
                               ->whereIn('nmcuadroturno_cab.estado',['R','C'])
                               ->where('id_usu',$user)
                               ->where('usu_rol',$rol)
                               ->orderBy('ano','desc')
                               ->orderBy('mes','desc')
                               ->orderBy('nomcuadro')
                               ->paginate(10);
        }
        else{
            $turno = CuadroTur_cab:: select('nmcuadroturno_cab.id','nomcuadro','ano','mes','nmcuadroturno_cab.estado')
                               ->join('nmcturnos_cab','nmcturnos_cab.id','=','nmcuadroturno_cab.idturno') 
                               ->join('nmcturnos_usu', 'nmcturnos_cab.id', '=', 'nmcturnos_usu.id_turno')
                               ->where('nmcturnos_cab.estado',1)
                               ->where('nmcuadroturno_cab.estado',$estado)
                               ->where('id_usu',$user)
                               ->where('usu_rol',$rol)
                               ->orderBy('ano','desc')
                               ->orderBy('mes','desc')
                               ->orderBy('nomcuadro')
                               ->paginate(10);
        }
        return $turno;
    }


    public function list_cturnoimp($user){

        if($user==1){
            $turno = CuadroTur_cab:: select('nmcuadroturno_cab.id','nomcuadro','ano','mes','nmcuadroturno_cab.estado')
                               ->join('nmcturnos_cab','nmcturnos_cab.id','=','nmcuadroturno_cab.idturno') 
                               ->join('nmcturnos_usu', 'nmcturnos_cab.id', '=', 'nmcturnos_usu.id_turno')
                               ->where('nmcturnos_cab.estado',1)
                               ->where('nmcuadroturno_cab.estado','<>','E')
                               ->groupBy('nmcuadroturno_cab.id','nomcuadro','ano','mes','nmcuadroturno_cab.estado')
                               ->orderBy('ano','desc')
                               ->orderBy('mes','desc')
                               ->orderBy('nomcuadro')
                               ->paginate(10);
        }
        else{
            $turno = CuadroTur_cab:: select('nmcuadroturno_cab.id','nomcuadro','ano','mes','nmcuadroturno_cab.estado')
                               ->join('nmcturnos_cab','nmcturnos_cab.id','=','nmcuadroturno_cab.idturno') 
                               ->join('nmcturnos_usu', 'nmcturnos_cab.id', '=', 'nmcturnos_usu.id_turno')
                               ->where('nmcturnos_cab.estado',1)
                               ->where('nmcuadroturno_cab.estado','<>','E')
                               ->where('id_usu',$user)
                               ->groupBy('nmcuadroturno_cab.id','nomcuadro','ano','mes','nmcuadroturno_cab.estado')
                               ->orderBy('ano','desc')
                               ->orderBy('mes','desc')
                               ->orderBy('nomcuadro')
                               ->paginate(10);
        }
        return $turno;
    }


    public function show($id)
    {
        $sql= "select usuela, a.name as nomela, usurevi, b.name as nomerevi, usuapru, c.name as nomeapru 
                from nmcuadroturno_cab 
                inner join users a on usuela = a.id  
                left join users b  on usurevi = b.id
                left join users c  on usuapru = c.id  
                where nmcuadroturno_cab.id = ".$id;
        $turno = DB::select($sql);
        return $turno;
    }


    public function cambio_turno(Request $request){
      dd("En desarrollo");
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
