<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Empleado;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Controllers\SalminController;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('nomina.viewEmpleado');
    }

    public function index2()
    {
        return View('nomina.listempleados');
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
        $date = Carbon::now()->format('Y');
        $obj =  new SalminController();
        $sal = $obj->show($date)->salmin;

        $mensaje = [
            'idemp.unique' => 'El código que intenta ingresar ya existe',
            'sexo.in' => 'Debe elegir sexo',
            'idprof.required' => 'Debe seleccionar una profesión',
            'idocupa.required' => 'Debe seleccionar una Ocupación',
            'idocupa.required' => 'El emplado debe tener un cargo',
        ];
        $v = \Validator::make($request->all(), [
             'idemp'   => 'required|unique:empleados,id_emp',
             'tipoid'  => 'required',
             'sexo'    => 'required|in:M,F',
             'nombre1' => 'required',
             'apelli1' => 'required',
             'estado'  => 'exists:nmestados,id',
             'fecnac'  => 'required',
             'pais'    => 'exists:par_pais,id',
             'depto'   => 'required',
             'ciudad'  => 'required',
             'direc'   => 'required',
             'email'   => 'required',
             'cel'     => 'required',
             'fecing'  => 'required',
             'idprof'  => 'required',
             'idocupa' => 'required',
             'modcon'  => 'exists:par_modcon,id',
             'idcargo' => 'required',
             'fpen'    => 'exists:nmentidades,id',
             'eps'     => 'exists:nmentidades,id',
             'fces'    => 'exists:nmentidades,id',
             'caja'    => 'exists:nmentidades,id',
             'arl'     => 'exists:nmentidades,id',
             'banco'   => 'exists:nmentidades,id',
             'numcta'  => 'numeric',
             'salmin'  => 'numeric|min:'.$sal
            ],$mensaje);
            if ($v->fails())
        {
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else
        {
            $emple = new Empleado([
                'id_emp'    => $request->get('idemp'),
                'tipo_id'   => $request->get('tipoid'),
                'ape1_emp'  => $request->get('apelli1'),
                'ape2_emp'  => $request->get('apelli2'),
                'nom1_emp'  => $request->get('nombre1'),
                'nom2_emp'  => $request->get('nombre2'),
                'estado'    => 1,
                'fec_nac'   => $request->get('fecnac'),
                'pais_nac'  => $request->get('pais'),
                'depto_nac' => $request->get('depto'),
                'ciudad_nac'=> $request->get('ciudad'),
                'sexo'      => $request->get('sexo'),
                'est_civ'   => $request->get('estciv'),
                'dir_emp'   => $request->get('direc'),
                'tel_emp'   => $request->get('tel'),
                'cel_emp'   => $request->get('cel'),
                'mail_emp'  => $request->get('email'),
                'fec_ing'   => $request->get('fecing'),
                'id_prof'   => $request->get('idprof'),
                'id_ocupa'  => $request->get('idocupa'),
                'id_modcon' => $request->get('modcon'),
                'idcargo'   => $request->get('idcargo'),
                'id_tipocon'=> $request->get('tipocon'),
                'id_fpen'   => $request->get('fpen'),
                'id_eps'    => $request->get('eps'),
                'id_ces'    => $request->get('fces'),
                'id_caja'   => $request->get('caja'),
                'id_arl'    => $request->get('arl'),
                'id_jor'    => $request->get('jornada'),
                'id_forpag' => $request->get('forpag'),
                'id_banco'  => $request->get('banco'),
                'num_cta'   => $request->get('numcta'),
                'salbasico' => $request->get('salmin'),
                ]);
            $emple->save();
            return View('nomina.viewEmpleado')->with('mensaje','Empleado registrado Satisfactoriamente');
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

    public function list_emple()
    {
        $nombre = DB::raw("CONCAT(ape1_emp,' ',trim(ape2_emp),' ',nom1_emp,' ',trim(nom2_emp)) as nombre");
        $emple = Empleado::select('id','id_emp','tipo_id',$nombre,'cel_emp')
                                ->orderBy('ape1_emp')
                                ->orderBy('ape2_emp')
                                ->paginate(15);
                //$emple->setPath(route('emple'));
        return $emple;
    }

     public function browse(Request $request)
    {
        $nombre = DB::raw("CONCAT(ape1_emp,' ',trim(ape2_emp),' ',nom1_emp,' ',trim(nom2_emp)) as nombre");
        $browemple = Empleado::select('id','id_emp','tipo_id',$nombre,'cel_emp')
                        ->where('id','=',$request->get('idemple'))
                        ->get();
        return view('nomina.listempleados',compact('browemple'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emple = Empleado::where('id','=',$id)
                        ->first();
        $view = View('nomina.viewEmpleado',[
                'emple_id'  =>  $emple->id,
                'emple_ide' =>  $emple->id_emp,
                'emple_tid' =>  $emple->tipo_id,
                'emple_ape1'=>  $emple->ape1_emp,
                'emple_ape2'=>  $emple->ape2_emp,
                'emple_nom1'=>  $emple->nom1_emp,
                'emple_nom2'=>  $emple->nom2_emp,
                'emple_fnac'=>  $emple->fec_nac,
                'emple_pais'=>  $emple->pais_nac,
                'emple_dpto'=>  $emple->depto_nac,
                'emple_ciu' =>  $emple->ciudad_nac,
                'emple_sex' =>  $emple->sexo,
                'emple_civ' =>  $emple->est_civ,
                'emple_dir' =>  $emple->dir_emp,
                'emple_tel' =>  $emple->tel_emp,
                'emple_cel' =>  $emple->cel_emp,
                'emple_mail'=>  $emple->mail_emp,
                'emple_fing'=>  $emple->fec_ing,
                'emple_fegr'=>  $emple->fec_egr,
                'emple_prof'=>  $emple->id_prof,
                'emple_ocu' =>  $emple->id_ocupa,
                'emple_mcon'=>  $emple->id_modcon,
                'emple_carg'=>  $emple->idcargo,
                'emple_tcon'=>  $emple->id_tipocon,
                'emple_pen' =>  $emple->id_fpen,
                'emple_eps' =>  $emple->id_eps,
                'emple_ces' =>  $emple->id_ces,
                'emple_caj' =>  $emple->id_caja,
                'emple_arl' =>  $emple->id_arl,
                'emple_jor' =>  $emple->id_jor,
                'emple_fpag'=>  $emple->id_forpag,
                'emple_bank'=>  $emple->id_banco,
                'emple_cta' =>  $emple->num_cta,
                'emple_sal' =>  $emple->salbasico
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
        $date = Carbon::now()->format('Y');
        $obj =  new SalminController();
        $sal = $obj->show($date)->salmin;

        $mensaje = [
            'idemp.unique' => 'El código que intenta ingresar ya existe',
            'sexo.in' => 'Debe elegir sexo',
            'idprof.required' => 'Debe seleccionar una profesión',
            'idocupa.required' => 'Debe seleccionar una Ocupación',
            'idocupa.required' => 'El emplado debe tener un cargo',
        ];
        $v = \Validator::make($request->all(), [
             'idemp'   => 'required|unique:empleados,id_emp,'.$id.',id',
             'tipoid'  => 'required',
             'sexo'    => 'required|in:M,F',
             'nombre1' => 'required',
             'apelli1' => 'required',
             'estado'  => 'exists:nmestados,id',
             'fecnac'  => 'required',
             'pais'    => 'exists:par_pais,id',
             'depto'   => 'required',
             'ciudad'  => 'required',
             'direc'   => 'required',
             'email'   => 'required',
             'cel'     => 'required',
             'fecing'  => 'required',
             'idprof'  => 'required',
             'idocupa' => 'required',
             'modcon'  => 'exists:par_modcon,id',
             'idcargo' => 'required',
             'fpen'    => 'exists:nmentidades,id',
             'eps'     => 'exists:nmentidades,id',
             'fces'    => 'exists:nmentidades,id',
             'caja'    => 'exists:nmentidades,id',
             'arl'     => 'exists:nmentidades,id',
             'banco'   => 'exists:nmentidades,id',
             'numcta'  => 'numeric',
             'salmin'  => 'numeric|min:'.$sal
            ],$mensaje);

            if ($v->fails())
            {
                 //$request->flash();
                return redirect()->back()->withInput()->withErrors($v->errors());
            }
            
            else{
                 

                Empleado::where('id','=',$id)
                    ->update([
                             'id_emp'    => $request->get('idemp'),
                             'tipo_id'   => $request->get('tipoid'),
                             'ape1_emp'  => $request->get('apelli1'),
                             'ape2_emp'  => $request->get('apelli2'),
                             'nom1_emp'  => $request->get('nombre1'),
                             'nom2_emp'  => $request->get('nombre2'),
                             'fec_nac'   => $request->get('fecnac'),
                             'pais_nac'  => $request->get('pais'),
                             'depto_nac' => $request->get('depto'),
                             'ciudad_nac'=> $request->get('ciudad'),
                             'sexo'      => $request->get('sexo'),
                             'est_civ'   => $request->get('estciv'),
                             'dir_emp'   => $request->get('direc'),
                             'tel_emp'   => $request->get('tel'),
                             'cel_emp'   => $request->get('cel'),
                             'mail_emp'  => $request->get('email'),
                             'fec_ing'   => $request->get('fecing'),
                             'id_prof'   => $request->get('idprof'),
                             'id_ocupa'  => $request->get('idocupa'),
                             'id_modcon' => $request->get('modcon'),
                             'idcargo'   => $request->get('idcargo'),
                             'id_tipocon'=> $request->get('tipocon'),
                             'id_fpen'   => $request->get('fpen'),
                             'id_eps'    => $request->get('eps'),
                             'id_ces'    => $request->get('fces'),
                             'id_caja'   => $request->get('caja'),
                             'id_arl'    => $request->get('arl'),
                             'id_jor'    => $request->get('jornada'),
                             'id_forpag' => $request->get('forpag'),
                             'id_banco'  => $request->get('banco'),
                             'num_cta'   => $request->get('numcta'),
                             'salbasico' => $request->get('salmin')

                        ]);

                return View('nomina.viewEmpleado')->with('mensaje','Empleado actualizado Satisfactoriamente');
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
