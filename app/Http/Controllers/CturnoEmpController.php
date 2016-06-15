<?php

namespace App\Http\Controllers;

use DB;
use App\Cturno;
use App\CturnoEmp;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CturnoEmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('nomina.viewEmpCturno');
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
            'idcuadro.exists' => 'Debe registrar un cuadro de turno válido',
            'idemple.exists' => 'Debe registrar un empleado válido'
        ];
        $v = \Validator::make($request->all(), [
             'idcuadro' => 'required|exists:nmcturnos_cab,id',
             'idemple'   => 'required|exists:empleados,id',

            ],$mensaje);
          if ($v->fails())
        {
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{

            $val = CturnoEmp:: where('id_turno',$request->get('idcuadro'))
                             ->where('id_emp',$request->get('idemple'))
                             ->get();
            $numreg = count($val);
            if($numreg > 0)
            {
             return redirect()->back()->withInput()->withErrors('El Empleado ya se encuentra asignado para ese cuadro de turno');   
            } 
            else{



                  $turno = new CturnoEmp([
                      'id_turno' => $request->get('idcuadro'),
                      'id_emp'   => $request->get('idemple'),
                      
                      ]);
                  $turno->save();
                  return View('nomina.viewEmpCturno')->with('mensaje','Empleado asignado a cuadro de turno Satisfactoriamente');
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
        $nombre = DB::raw("CONCAT(ape1_emp,' ',trim(ape2_emp),' ',nom1_emp,' ',trim(nom2_emp)) as nombre");
        $browturno = CturnoEmp::where('id_turno','=',$request->get('idcuadro2'))
                            ->select('nmcturnos_det.id','nmcturnos_cab.nomcuadro',$nombre)
                            ->join('nmcturnos_cab', 'nmcturnos_cab.id', '=', 'nmcturnos_det.id_turno')
                            ->join('empleados', 'empleados.id', '=', 'nmcturnos_det.id_emp')
                            ->orderBy('nomcuadro')
                            ->paginate(10);
                        
                        //dd($request->get('ident'));
       
        return view('nomina.viewEmpCturno',compact('browturno'));
    }

    public function list_empcuadro()
    {
        $nombre = DB::raw("CONCAT(ape1_emp,' ',trim(ape2_emp),' ',nom1_emp,' ',trim(nom2_emp)) as nombre");
        $turno = CturnoEmp::select('nmcturnos_det.id','nmcturnos_cab.nomcuadro',$nombre)
                        ->join('nmcturnos_cab', 'nmcturnos_cab.id', '=', 'nmcturnos_det.id_turno')
                        ->join('empleados', 'empleados.id', '=', 'nmcturnos_det.id_emp')
                        ->orderBy('nomcuadro','name')
                        ->paginate(10);
                $turno->setPath(route('cturnoemp'));
        return $turno;
    }

    public function list_cempauto($cuadro)
    {
        $nombre = DB::raw("CONCAT(ape1_emp,' ',trim(ape2_emp),' ',nom1_emp,' ',trim(nom2_emp)) as nombre");
        $turno = CturnoEmp::select('empleados.id',$nombre)
                        ->join('nmcturnos_cab', 'nmcturnos_cab.id', '=', 'nmcturnos_det.id_turno')
                        ->join('empleados', 'empleados.id', '=', 'nmcturnos_det.id_emp')
                        ->where('id_turno',$cuadro)
                        ->orderBy('ape1_emp')
                        ->get();
                
        return $turno;
    }

    public function delete(Request $request)
    {

        if($request->ajax()){
        $id = $request->get('cod');
        CturnoEmp::where('id',$id)
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
        $turno = CturnoEmp::where('id','=',$id)
                        ->first();

        $view = View('nomina.viewEmpCturno',[
                'cturnoemp_id'    => $turno->id,
                'cturnoemp_idtur' => $turno->id_turno,
                'cturnoemp_idemp' => $turno->id_emp,
                
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
            'idcuadro.exists' => 'Debe registrar un cuadro de turno válido',
            'idemple.exists' => 'Debe registrar un Empleado válido'
        ];
        $v = \Validator::make($request->all(), [
             'idcuadro' => 'required|exists:nmcturnos_cab,id',
             'idemple'   => 'required|exists:users,id',
            ],$mensaje);
          if ($v->fails())
        {
             //dd('falló');
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{
            
             $val = CturnoEmp:: where('id_turno',$request->get('idcuadro'))
                             ->where('id_emp',$request->get('idemple'))
                             ->get();
            $numreg = count($val);
            if($numreg > 1)
            {
             return redirect()->back()->withInput()->withErrors('El Empleado ya se encuentra asignado para ese cuadro de turno');   
            } 

            else{
            
            CturnoEmp::where('id','=',$id)
                    ->update([
                'id_turno' => $request->get('idcuadro'),
                'id_emp'   => $request->get('idemple'),
                
                        ]);
            return View('nomina.viewRolCturno')->with('mensaje','usario y rol actualizado en cuadro Satisfactoriamente');
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
