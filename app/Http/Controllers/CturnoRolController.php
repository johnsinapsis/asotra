<?php

namespace App\Http\Controllers;

use App\Cturno;
use App\CturnoRol;
use App\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CturnoRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('nomina.viewRolCturno');
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
            'idusu.exists' => 'Debe registrar un usuario válido'
        ];
        $v = \Validator::make($request->all(), [
             'idcuadro' => 'required|exists:nmcturnos_cab,id',
             'idusu'   => 'required|exists:users,id',

            ],$mensaje);
          if ($v->fails())
        {
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{

            $val = CturnoRol:: where('id_turno',$request->get('idcuadro'))
                             ->where('id_usu',$request->get('idusu'))
                             ->get();
            $numreg = count($val);
            if($numreg > 0)
            {
             return redirect()->back()->withInput()->withErrors('El usuario ya se encuentra asignado para ese cuadro de turno');   
            } 
            else{
               $turno = new CturnoRol([
                   'id_turno' => $request->get('idcuadro'),
                   'id_usu'   => $request->get('idusu'),
                   'usu_rol'  => $request->get('rol'),
                   ]);
               $turno->save();
               return View('nomina.viewRolCturno')->with('mensaje','usuario asignado a cuadro de turno Satisfactoriamente');
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
        $browturno = CturnoRol::where('id_turno','=',$request->get('idcuadro2'))
                            ->select('nmcturnos_usu.id','nmcturnos_cab.nomcuadro','name','usu_rol')
                            ->join('nmcturnos_cab', 'nmcturnos_cab.id', '=', 'nmcturnos_usu.id_turno')
                            ->join('users', 'users.id', '=', 'nmcturnos_usu.id_usu')
                            ->orderBy('nomcuadro','name')
                            ->paginate(10);
                        
                        //dd($request->get('ident'));
       
        return view('nomina.viewRolCturno',compact('browturno'));
    }



    public function list_usucuadro()
    {
        $turno = CturnoRol::select('nmcturnos_usu.id','nmcturnos_cab.nomcuadro','name','usu_rol')
                        ->join('nmcturnos_cab', 'nmcturnos_cab.id', '=', 'nmcturnos_usu.id_turno')
                        ->join('users', 'users.id', '=', 'nmcturnos_usu.id_usu')
                                ->orderBy('nomcuadro','name')
                                ->paginate(10);
                $turno->setPath(route('cturnorol'));
        return $turno;
    }



    public function list_cusuauto($user,$rol)
    {
        $turno = CturnoRol::select('nmcturnos_cab.id','nmcturnos_cab.nomcuadro')
                        ->join('nmcturnos_cab', 'nmcturnos_cab.id', '=', 'nmcturnos_usu.id_turno')
                        ->where('estado',1)
                        ->where('id_usu',$user)
                        ->where('usu_rol',$rol)
                        ->orderBy('nomcuadro')
                        ->get();
                
        return $turno;
    }

   
    public function delete(Request $request)
    {

        if($request->ajax()){
        $id = $request->get('cod');
        CturnoRol::where('id',$id)
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
        
        $turno = CturnoRol::where('id','=',$id)
                        ->first();

        $view = View('nomina.viewRolCturno',[
                'cturnorol_id'    => $turno->id,
                'cturnorol_idtur' => $turno->id_turno,
                'cturnorol_idusu' => $turno->id_usu,
                'cturnorol_rol'   => $turno->usu_rol,
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
            'idusu.exists' => 'Debe registrar un usuario válido'
        ];
        $v = \Validator::make($request->all(), [
             'idcuadro' => 'required|exists:nmcturnos_cab,id',
             'idusu'   => 'required|exists:users,id',
            ],$mensaje);
          if ($v->fails())
        {
             //dd('falló');
             //$request->flash();
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        else{
            
             $val = CturnoRol:: where('id_turno',$request->get('idcuadro'))
                             ->where('id_usu',$request->get('idusu'))
                             ->get();
            $numreg = count($val);
            if($numreg > 1)
            {
             return redirect()->back()->withInput()->withErrors('El usuario ya se encuentra asignado para ese cuadro de turno');   
            } 

            else{
            
            CturnoRol::where('id','=',$id)
                    ->update([
                'id_turno' => $request->get('idcuadro'),
                'id_usu'   => $request->get('idusu'),
                'usu_rol'  => $request->get('rol'),
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
