@extends('layout')

@section('content')
   <div  class="top-c" >
    <div class="container">
        <div class="row">
            <div id="draggable" style="position:absolute; z-index: 99;" class="col-md-offset-2 col-xs-8">
                <div class="panel panel-primary class" >
                    <div class="panel-heading" align="center">REPORTE DE INCIDENTES ADMINISTRATIVOS</div>
                    <div class="panel-body">
                     

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('rinciadm')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Unidad Funcional</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="unifun" name="unifun" value="">
                                    <input type="hidden" id="idunidad" name="idunidad" value="0">  
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label">Unidad Involucrada</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="uniinv" name="uniinv" value="">
                                    <input type="hidden" id="idinvo" name="idinvo" value="0"> 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Fecha Inicial del incidente</label>

                                <div class="col-md-3">
                                    <input type="date" class="form-control" name="fechaini">
                                </div>
                                <div class="col-md-3">
                                    <input type="time" class="form-control" name="horaini">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Fecha Final del incidente</label>

                                <div class="col-md-3">
                                    <input type="date" class="form-control" name="fechafin">
                                </div>
                                <div class="col-md-3">
                                    <input type="time" class="form-control" name="horafin">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label">Descripción del incidente</label>

                                <div class="col-md-6">
                                    <input id="descri" name="descri" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Clasificación</label>

                                <div class="col-md-6">
                                    <select id="analisis" name="analisis" class="form-control">
                                        <option value="0">Sin Análisis</option>
                                        <option value="1" selected="">Con Análisis</option>
                                        <option value="2" selected="">Todos</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12" align="center">
                                    <button type="submit" class="btn btn-primary">
                                        Buscar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection