<?php

namespace App\Http\Controllers;

use App\HorarioCab;
use App\HorarioDet;
use App\Empleado;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\Http\Controllers\ActividadController;


class HorarioCabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('nomina.viewHorario');
    }

    public function index2()
    {
        return View('nomina.listhorarios');
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
            'abr.required' => 'La nomenclatura es requerida',
            'nombre.required' => 'El nombre es requerido',
            'detalle.required' => 'La descripción es requerida',
            'jornada.required' => 'La jornada es requerida',
            
        ];
        $v = \Validator::make($request->all(), [
             'abr' => 'required',
             'nombre' => 'required',
             'detalle' => 'required',
             

            ],$mensaje);
          if ($v->fails())
        {
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{
            $cont = 0;
            $i = 0;
            for ($i=0; $i < 24 ; $i++) { 
                if($request->get('l'.$i)==1)
                    $cont++;
                if($request->get('m'.$i)==1)
                    $cont++;
                if($request->get('x'.$i)==1)
                    $cont++;
                if($request->get('j'.$i)==1)
                    $cont++;
                if($request->get('v'.$i)==1)
                    $cont++;
                if($request->get('s'.$i)==1)
                    $cont++;
                if($request->get('d'.$i)==1)
                    $cont++;
            }

            $obj =  new ActividadController();
            $numhoras = $obj->show_jornada($request->get('jornada'))->numhoras;

            if($cont < $numhoras)
            {
              $dif = $numhoras - $cont;
              return redirect()->back()->withInput()->withErrors('El mínimo de horas es de '.$numhoras.'. Faltan '.$dif.' horas');   
            }
            else
             {
               
               $abr = $request->get('abr');
               $nombre = $request->get('nombre');
               $detalle = $request->get('detalle');
               $jornada = $request->get('jornada');
               for ($i=0; $i < 24 ; $i++) { 
                if($request->get('l'.$i)==1)
                    $lunes[$i] = 1;
                else
                    $lunes[$i] = 0;
                if($request->get('m'.$i)==1)
                    $martes[$i] = 1;
                else
                    $martes[$i] = 0;
                if($request->get('x'.$i)==1)
                    $miercoles[$i] = 1;
                else
                    $miercoles[$i] = 0;
                if($request->get('j'.$i)==1)
                    $jueves[$i] = 1;
                else
                    $jueves[$i] = 0;
                if($request->get('v'.$i)==1)
                    $viernes[$i] = 1;
                else
                    $viernes[$i] = 0;
                if($request->get('s'.$i)==1)
                    $sabado[$i] = 1;
                else
                    $sabado[$i] = 0;
                if($request->get('d'.$i)==1)
                    $domingo[$i] = 1;
                else
                    $domingo[$i] = 0;
               }

               DB::transaction(function () use ($lunes, $martes,$miercoles,$jueves,$viernes,$sabado,$domingo,$abr,$nombre,$detalle,$jornada) {

                    $cab = new HorarioCab([
                        'abr' => $abr,
                        'nomhorario' => $nombre,
                        'descripcion' => $detalle,
                        'id_jornada' => $jornada,
                         ]);
                    $cab->save();

                    $sel = HorarioCab::max('id');
                    $idhorario = $sel;

                    for ($i=0; $i < 24 ; $i++) { 

                        if($lunes[$i]==1)
                        {
                            $det = new HorarioDet([
                                'id_horario' => $idhorario,
                                'dia' => 'l',
                                'hora' => $i,
                             ]);
                            $det->save();
                        }

                        if($martes[$i]==1)
                        {
                            $det = new HorarioDet([
                                'id_horario' => $idhorario,
                                'dia' => 'm',
                                'hora' => $i,
                             ]);
                            $det->save();
                        }

                        if($miercoles[$i]==1)
                        {
                            $det = new HorarioDet([
                                'id_horario' => $idhorario,
                                'dia' => 'x',
                                'hora' => $i,
                             ]);
                            $det->save();
                        }

                        if($jueves[$i]==1)
                        {
                            $det = new HorarioDet([
                                'id_horario' => $idhorario,
                                'dia' => 'j',
                                'hora' => $i,
                             ]);
                            $det->save();
                        }

                        if($viernes[$i]==1)
                        {
                            $det = new HorarioDet([
                                'id_horario' => $idhorario,
                                'dia' => 'v',
                                'hora' => $i,
                             ]);
                            $det->save();
                        }

                        if($sabado[$i]==1)
                        {
                            $det = new HorarioDet([
                                'id_horario' => $idhorario,
                                'dia' => 's',
                                'hora' => $i,
                             ]);
                            $det->save();
                        }

                        if($domingo[$i]==1)
                        {
                            $det = new HorarioDet([
                                'id_horario' => $idhorario,
                                'dia' => 'd',
                                'hora' => $i,
                             ]);
                            $det->save();
                        }

                    } //fin del for

                });

             }
            return View('nomina.viewHorario')->with('mensaje','Horario registrado Satisfactoriamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_ajax(Request $request)
    {
        if($request->ajax()){
        $id = $request->get('cod');
        $horario = HorarioCab:: where('id',$id)
                             ->first();
        return response()->json($horario);
       }
    }

    public function list_horario()
    {
        
        $horario = HorarioCab::select('nmhorario_cab.id','abr','nomhorario','descripcion','nmjornadas.nombre')
                                ->join('nmjornadas','nmjornadas.id','=','id_jornada')
                                ->orderBy('abr')
                                ->paginate(15);
                 //$horario->setPath(route('horario'));
        return $horario;
    }


    public function list_hor_jor_emp(Request $request)
    {
        
        if($request->ajax()){
         $idemp = $request->get('cod');
         $emp = Empleado::select('id_jor')->where('id',$idemp)->first();
         $horario = DB::table('nmhorario_cab')->select('id','nomhorario','descripcion')
                       ->where('id_jornada',$emp->id_jor)
                       ->orderBy('nomhorario')->get();
         return response()->json($horario);
        }
        
    }


    public function list_hor_jor(Request $request)
    {
        
        if($request->ajax()){
         $id = $request->get('cod');
         $sql = "select id,numdia from par_dias  where id not in (select dia from nmhorario_det where id_horario = ".$id.") order by numdia";
         $horario = DB::select($sql);
         return response()->json($horario);
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
        
        for ($i=0; $i < 24 ; $i++) {
            $lnombre[$i]="l".$i;
            $lvalor[$i]=0;
            $mnombre[$i]="m".$i;
            $mvalor[$i]=0;
            $xnombre[$i]="x".$i;
            $xvalor[$i]=0;
            $jnombre[$i]="j".$i;
            $jvalor[$i]=0;
            $vnombre[$i]="v".$i;
            $vvalor[$i]=0;
            $snombre[$i]="s".$i;
            $svalor[$i]=0;
            $dnombre[$i]="d".$i;
            $dvalor[$i]=0;
        }

        $horario = HorarioCab::where('id','=',$id)
                        ->first();
        $detalle = HorarioDet::where('id_horario','=',$id)
                        ->get();
        foreach ($detalle as $det) {
            if($det->dia == 'l')
                $lvalor[$det->hora] = 1;
            if($det->dia == 'm')
                $mvalor[$det->hora] = 1;
            if($det->dia == 'x')
                $xvalor[$det->hora] = 1;
            if($det->dia == 'j')
                $jvalor[$det->hora] = 1;
            if($det->dia == 'v')
                $vvalor[$det->hora] = 1;
            if($det->dia == 's')
                $svalor[$det->hora] = 1;
            if($det->dia == 'd')
                $dvalor[$det->hora] = 1;
        }

        $array["horario_id"]  = $horario->id;
        $array["horario_abr"] = $horario->abr;
        $array["horario_nom"] = $horario->nomhorario;
        $array["horario_det"] = $horario->descripcion;
        $array["horario_jor"] = $horario->id_jornada;
        $array["lunes"]     = $lvalor;
        $array["martes"]    = $mvalor;
        $array["miercoles"] = $xvalor;
        $array["jueves"]    = $jvalor;
        $array["viernes"]   = $vvalor;
        $array["sabado"]    = $svalor;
        $array["domingo"]   = $dvalor;

        //dd($array);
        $view = View('nomina.viewHorario',$array);
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
            'abr.required' => 'La nomenclatura es requerida',
            'nombre.required' => 'El nombre es requerido',
            'detalle.required' => 'La descripción es requerida',
            'jornada.required' => 'La jornada es requerida',
            
        ];
        $v = \Validator::make($request->all(), [
             'abr' => 'required',
             'nombre' => 'required',
             'detalle' => 'required',
             

            ],$mensaje);
          if ($v->fails())
        {
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{

             $cont = 0;
            $i = 0;
            for ($i=0; $i < 24 ; $i++) { 
                if($request->get('l'.$i)==1)
                    $cont++;
                if($request->get('m'.$i)==1)
                    $cont++;
                if($request->get('x'.$i)==1)
                    $cont++;
                if($request->get('j'.$i)==1)
                    $cont++;
                if($request->get('v'.$i)==1)
                    $cont++;
                if($request->get('s'.$i)==1)
                    $cont++;
                if($request->get('d'.$i)==1)
                    $cont++;
            }

            $obj =  new ActividadController();
            $numhoras = $obj->show_jornada($request->get('jornada'))->numhoras;

            if($cont < $numhoras)
            {
              $dif = $numhoras - $cont;
              return redirect()->back()->withInput()->withErrors('El mínimo de horas es de '.$numhoras.'. Faltan '.$dif.' horas');   
            }
            else
             {
               $abr = $request->get('abr');
               $nombre = $request->get('nombre');
               $detalle = $request->get('detalle');
               $jornada = $request->get('jornada');
               for ($i=0; $i < 24 ; $i++) { 
                if($request->get('l'.$i)==1)
                    $lunes[$i] = 1;
                else
                    $lunes[$i] = 0;
                if($request->get('m'.$i)==1)
                    $martes[$i] = 1;
                else
                    $martes[$i] = 0;
                if($request->get('x'.$i)==1)
                    $miercoles[$i] = 1;
                else
                    $miercoles[$i] = 0;
                if($request->get('j'.$i)==1)
                    $jueves[$i] = 1;
                else
                    $jueves[$i] = 0;
                if($request->get('v'.$i)==1)
                    $viernes[$i] = 1;
                else
                    $viernes[$i] = 0;
                if($request->get('s'.$i)==1)
                    $sabado[$i] = 1;
                else
                    $sabado[$i] = 0;
                if($request->get('d'.$i)==1)
                    $domingo[$i] = 1;
                else
                    $domingo[$i] = 0;
               }

               DB::transaction(function () use ($id, $lunes, $martes,$miercoles,$jueves,$viernes,$sabado,$domingo,$abr,$nombre,$detalle,$jornada) {

                HorarioCab::where('id', $id)
                    ->update([
                        'abr' => $abr,
                        'nomhorario' => $nombre,
                        'descripcion' => $detalle,
                        'id_jornada' => $jornada,

                        ]);

                HorarioDet::where('id_horario', $id)->delete();

                $idhorario = $id;

                for ($i=0; $i < 24 ; $i++) { 

                        if($lunes[$i]==1)
                        {
                            $det = new HorarioDet([
                                'id_horario' => $idhorario,
                                'dia' => 'l',
                                'hora' => $i,
                             ]);
                            $det->save();
                        }

                        if($martes[$i]==1)
                        {
                            $det = new HorarioDet([
                                'id_horario' => $idhorario,
                                'dia' => 'm',
                                'hora' => $i,
                             ]);
                            $det->save();
                        }

                        if($miercoles[$i]==1)
                        {
                            $det = new HorarioDet([
                                'id_horario' => $idhorario,
                                'dia' => 'x',
                                'hora' => $i,
                             ]);
                            $det->save();
                        }

                        if($jueves[$i]==1)
                        {
                            $det = new HorarioDet([
                                'id_horario' => $idhorario,
                                'dia' => 'j',
                                'hora' => $i,
                             ]);
                            $det->save();
                        }

                        if($viernes[$i]==1)
                        {
                            $det = new HorarioDet([
                                'id_horario' => $idhorario,
                                'dia' => 'v',
                                'hora' => $i,
                             ]);
                            $det->save();
                        }

                        if($sabado[$i]==1)
                        {
                            $det = new HorarioDet([
                                'id_horario' => $idhorario,
                                'dia' => 's',
                                'hora' => $i,
                             ]);
                            $det->save();
                        }

                        if($domingo[$i]==1)
                        {
                            $det = new HorarioDet([
                                'id_horario' => $idhorario,
                                'dia' => 'd',
                                'hora' => $i,
                             ]);
                            $det->save();
                        }

                    } //fin del for

               });
             }

             return View('nomina.viewHorario')->with('mensaje','Horario modificado Satisfactoriamente');
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
