<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_profesion($id)
    {
        $list = DB::table('par_profesion')->select('id','prof_nom')->where('id','=',$id)->first();
        return $list;
    }

    public function show_ocupacion($id)
    {
        $list = DB::table('par_ocupacion')->select('id','nombre')->where('id','=',$id)->first();
        return $list;
    }

    public function show_jornada($id)
    {
        $list = DB::table('nmjornadas')->select('id','numhoras')->where('id','=',$id)->first();
        return $list;
    }


    public function list_profesion()
    {
        $list = DB::table('par_profesion')->select('id','prof_nom')->orderBy('prof_nom')->get();
        return $list;
    }

    public function list_ocupacion()
    {
        $list = DB::table('par_ocupacion')->select('id','nombre')->orderBy('nombre')->get();
        return $list;
    }

    public function list_modcon()
    {
        $list = DB::table('par_modcon')->select('id','nombre','codgema')->orderBy('nombre')->get();
        return $list;
    }

    public function list_estciv()
    {
        $list = DB::table('par_estciv')->select('id','nombre')->orderBy('nombre')->get();
        return $list;
    }


    public function list_jornadas()
    {
        $list = DB::table('nmjornadas')->select('id','nombre','numhoras')->orderBy('id')->get();
        return $list;
    }

    public function list_tipocon()
    {
        $list = DB::table('nmtipocon')->select('id','nombre')->orderBy('nombre')->get();
        return $list;
    }

    public function list_tipoent()
    {
        $list = DB::table('nmtipoent')->select('id','nombre')->orderBy('nombre')->get();
        return $list;
    }

    public function list_forpago()
    {
        $list = DB::table('nmforpago')->select('id','nombre')->orderBy('id')->get();
        return $list;
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
