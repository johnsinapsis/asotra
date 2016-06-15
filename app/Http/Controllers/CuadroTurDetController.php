<?php

namespace App\Http\Controllers;

use App\CuadroTur_cab;
use App\CuadroTur_det;
use App\Empleado;

use Illuminate\Http\Request;

use Carbon\Carbon;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CuadroTurDetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('nomina.listcabcturno');
    }

    public function index2($id)
    {
        

        $turno = CuadroTur_cab:: select('idturno','nomcuadro','ano','mes')
                                ->join('nmcturnos_cab','nmcturnos_cab.id','=','nmcuadroturno_cab.idturno') 
                                ->where('nmcuadroturno_cab.id',$id)
                                ->first();

        $view = View('nomina.viewDetaCuadro',[
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
        $view = View('nomina.listcabcturno',['elimina' => '1']);
        return $view;
    }

    public function index4($id)
    {
        

        $turno = CuadroTur_cab:: select('idturno','nomcuadro','ano','mes')
                                ->join('nmcturnos_cab','nmcturnos_cab.id','=','nmcuadroturno_cab.idturno') 
                                ->where('nmcuadroturno_cab.id',$id)
                                ->first();

        $view = View('nomina.viewDetaElimturno',[
                'cuadro_id'  => $id,
                'cuadro_tur' => $turno->idturno,
                'cuadro_nom' => $turno->nomcuadro,
                'ano'        => $turno->ano,
                'mes'        => $turno->mes
                  ]);
        return $view;
        
      
    }


    public function index5($id)
    {
        

        $turno = CuadroTur_cab:: select('idturno','nomcuadro','ano','mes')
                                ->join('nmcturnos_cab','nmcturnos_cab.id','=','nmcuadroturno_cab.idturno') 
                                ->where('nmcuadroturno_cab.id',$id)
                                ->first();

        $view = View('nomina.viewDetaRevi',[
                'cuadro_id'  => $id,
                'cuadro_tur' => $turno->idturno,
                'cuadro_nom' => $turno->nomcuadro,
                'ano'        => $turno->ano,
                'mes'        => $turno->mes
                  ]);
        return $view;
        
      
    }

    public function index6($id)
    {
        

        $turno = CuadroTur_cab:: select('idturno','nomcuadro','ano','mes')
                                ->join('nmcturnos_cab','nmcturnos_cab.id','=','nmcuadroturno_cab.idturno') 
                                ->where('nmcuadroturno_cab.id',$id)
                                ->first();

        $view = View('nomina.viewDetaApru',[
                'cuadro_id'  => $id,
                'cuadro_tur' => $turno->idturno,
                'cuadro_nom' => $turno->nomcuadro,
                'ano'        => $turno->ano,
                'mes'        => $turno->mes
                  ]);
        return $view;
        
      
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
            'empleado.exists' => 'Datos incompletos'
        ];
        $v = \Validator::make($request->all(), [
             'empleado' => 'exists:empleados,id'

            ],$mensaje);
        if ($v->fails())
        {
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{
            $band=0;
            
            $val2 = CuadroTur_cab:: where('id',$request->get('idcuadro'))->first();
            $fecha2 = "01/".$val2->mes."/".$val2->ano;
            $date  = Carbon::createFromFormat('d/m/Y',$fecha2);
            $nextmonth =  $date->addMonth();
            $lastdateday   =  $date->subDay();
            $lastday =  $date->format('d')+0;
             
            $arrayday[0]="";
            $j=0;
            for($i=1;$i<=$lastday;$i++){
                if($request->get('d'.$i)=="on")
                {
                    $band = 1;
                    $arrayday[$j]=$i;
                    $j++;
                }
                
            }
            if($band==0){
                return redirect()->back()->withInput()->withErrors('No se eligio ningún día'); 
            }
            else {
                    $mes =  $val2->mes;
                    
                    for($i=0;$i<count($arrayday);$i++)
                    {
                        //dd($mes);
                        $fecha = Carbon::createFromFormat('d/m/Y',$arrayday[$i]."/".$mes."/".$val2->ano);
                        $numdia = $fecha->format('d')+0;
                        $day =  $fecha->format('l');
                        if($day=="Wednesday")
                            $dia = "x";
                        if($day=="Thursday")
                            $dia = 'j';
                        if($day=="Friday")
                            $dia = 'v';
                        if($day == "Saturday")
                            $dia = 's';
                        if($day=="Sunday")
                            $dia = 'd';
                        if($day== "Monday")
                            $dia = 'l';
                        if($day== "Tuesday")
                            $dia = 'm';  
                        $val = CuadroTur_det:: where('id_cuadrotur',$request->get('idcuadro'))
                                 ->where('id_emp',$request->get('empleado'))
                                 ->where('id_horario',$request->get('horario'))
                                 ->where('numdia',$numdia)
                                 ->get();  
                        $numreg = count($val);
                        if($numreg > 0){
                            $band= 0;
                        }
                        $diaarray[$i]=$dia;
                    }
                    
            
            
             if($band == 0)
            {
             return redirect()->back()->withInput()->withErrors('Uno de los dias elegidos ya fue asignado para el empleado y el cuadro de turno seleccionados');   
            } 
            else{
                
                for($i=0;$i<count($arrayday);$i++){
                
                    $turno = new CuadroTur_det([
    
                       'id_cuadrotur'=> $request->get('idcuadro'),
                       'id_emp'      => $request->get('empleado'),
                       'id_horario'  => $request->get('horario'),
                       'numdia'      => $arrayday[$i],
                       'dia'         => $diaarray[$i]
    
                       ]);
                    $turno->save();
                }

                $turno = CuadroTur_cab:: select('idturno','nomcuadro','ano','mes')
                                        ->join('nmcturnos_cab','nmcturnos_cab.id','=','nmcuadroturno_cab.idturno') 
                                        ->where('nmcuadroturno_cab.id',$request->get('idcuadro'))
                                        ->first();

                $view = View('nomina.viewDetaCuadro',[
                'mensaje'    => "Cuadro Creado Satisfactoriamente",
                'cuadro_id'  => $request->get('idcuadro'),
                'cuadro_tur' => $turno->idturno,
                'cuadro_nom' => $turno->nomcuadro,
                'ano'        => $turno->ano,
                'mes'        => $turno->mes
                  ]);
                return $view;
                
            } //2do else
        }// else band= 1
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

    public function list_emple_tur($id)
    {
        $sql = "select distinct id_cuadrotur, nmcuadroturno_det.id_emp,  CONCAT(ape1_emp,' ',trim(ape2_emp),' ',nom1_emp,' ',trim(nom2_emp)) as nombre
                from nmcuadroturno_det
                inner join empleados on nmcuadroturno_det.id_emp = empleados.id
                inner join nmcuadroturno_cab on nmcuadroturno_cab.id = id_cuadrotur
                inner join nmhorario_cab on nmhorario_cab.id = id_horario
                where id_cuadrotur = ".$id;
        $turno = DB::select($sql);
        
        return $turno;
    }

    public function list_emple_dia($id,$idcuadro){
        $sql = "select id_cuadrotur,id_horario,numdia, case DAYOFWEEK(CONCAT(ano,'-',mes,'-',numdia))
                when 1 then 'd' when 2 then 'l' when 3 then 'm' when 4 then 'x' when 5 then 'j' when 6 then 'v' when 7 then 's' end as dia,abr
                from 
                nmcuadroturno_det
                inner join  nmcuadroturno_cab on nmcuadroturno_cab.id = id_cuadrotur
                inner join nmhorario_cab on nmhorario_cab.id = id_horario
                where id_cuadrotur = ".$idcuadro." and id_emp = ".$id."
                order by numdia";
        $turno = DB::select($sql);
        return $turno;
    }


    public function cuadro_emp(Request $request){
        $idcuadro = $request->get('idcuadro');
        $idemp    = $request->get('empleado');
        $turno = CuadroTur_cab:: select('idturno','nomcuadro','ano','mes')
                                ->join('nmcturnos_cab','nmcturnos_cab.id','=','nmcuadroturno_cab.idturno') 
                                ->where('nmcuadroturno_cab.id',$idcuadro)
                                ->first();
        $nombre = DB::raw("CONCAT(ape1_emp,' ',trim(ape2_emp),' ',nom1_emp,' ',trim(nom2_emp)) as nombre");
        $emple = Empleado::select($nombre)->where('id',$idemp)->first();
        
        $view = View('nomina.viewDetaElimturno',[
                'id_emp'     => $idemp,
                'nom_emp'    => $emple->nombre,
                'cuadro_id'  => $idcuadro,
                'cuadro_tur' => $turno->idturno,
                'cuadro_nom' => $turno->nomcuadro,
                'ano'        => $turno->ano,
                'mes'        => $turno->mes
                  ]);
        return $view;

    }


    public function list_empt_tur($idcuadro,$idemp){
       $det = CuadroTur_det::select('abr','id_horario','nomhorario','numdia', 'dia')
                          ->join('nmhorario_cab','nmcuadroturno_det.id_horario','=','nmhorario_cab.id') 
                          ->where('id_cuadrotur',$idcuadro)
                          ->where('id_emp',$idemp)
                          ->orderBy('numdia')
                          ->get();

       return $det;
    }


    public function list_dias_turno(Request $request){
       if($request->ajax()){
        $idcuadro = $request->get('idcuadro');
        $idemp = $request->get('idemp');
       $det = CuadroTur_det::select('numdia')
                          ->join('nmhorario_cab','nmcuadroturno_det.id_horario','=','nmhorario_cab.id') 
                          ->where('id_cuadrotur',$idcuadro)
                          ->where('id_emp',$idemp)
                          ->groupBy('numdia')
                          ->orderBy('numdia')
                          ->get();

       return response()->json($det);

       }
    }



    public function list_turno_horario(Request $request){
       if($request->ajax()){
        $idcuadro = $request->get('idcuadro');
        $idemp = $request->get('idemp');
        $dia = $request->get('dia');
       $det = CuadroTur_det::select('id_horario','abr', 'nomhorario', 'numdia', 'dia')
                          ->join('nmhorario_cab','nmcuadroturno_det.id_horario','=','nmhorario_cab.id') 
                          ->where('id_cuadrotur',$idcuadro)
                          ->where('id_emp',$idemp)
                          ->where('numdia',$dia)
                          ->get();

       return response()->json($det);

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

    public function delete(Request $request)
    {
        if($request->ajax()){
        $idcuadro = $request->get('idcuadro');
        $idemp = $request->get('idemp');
        $idhorario = $request->get('idhorario');
        $dia = $request->get('dia');
        CuadroTur_det::where('id_cuadrotur',$idcuadro)
                     ->where('id_emp',$idemp)
                     ->where('id_horario',$idhorario)
                     ->where('numdia',$dia)
                   ->delete();
        $turno = CuadroTur_cab:: select('idturno','nomcuadro','ano','mes')
                                ->join('nmcturnos_cab','nmcturnos_cab.id','=','nmcuadroturno_cab.idturno') 
                                ->where('nmcuadroturno_cab.id',$idcuadro)
                                ->first();
        $nombre = DB::raw("CONCAT(ape1_emp,' ',trim(ape2_emp),' ',nom1_emp,' ',trim(nom2_emp)) as nombre");
        $emple = Empleado::select($nombre)->where('id',$idemp)->first();
        return response()->json(array(
            'mensaje'    =>'Registro eliminado Satisfactoriamente',
            'id_emp'     => $idemp,
            'nom_emp'    => $emple->nombre,
            'cuadro_id'  => $idcuadro,
            'cuadro_tur' => $turno->idturno,
            'cuadro_nom' => $turno->nomcuadro,
            'ano'        => $turno->ano,
            'mes'        => $turno->mes
            ));
        }
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
