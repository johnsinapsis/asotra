@extends('layout')

@section('content')
   <div  class="top-c" >
    <div class="container">
        <div class="row">
            <div id="draggable" style="position:absolute; z-index: 99;" class="col-md-offset-2 col-xs-8">
                <div class="panel panel-primary class" >
                    <div class="panel-heading" align="center">REGISTRO DE INCIDENTES ADMINISTRATIVOS</div>
                    <div class="panel-body">
                      @include('partials/errors')
                        @include('partials/success')
                         @include('partials/msg-ok')

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('inciadm') }}">
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
                                <label class="col-md-4 control-label">Fecha del incidente</label>

                                <div class="col-md-3">
                                    <input type="date" class="form-control" name="fecha">
                                </div>
                                <div class="col-md-3">
                                    <input type="time" class="form-control" name="hora">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label">Descripción del incidente</label>

                                <div class="col-md-6">
                                    <textarea name="descripcion" rows="4" cols="46"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Posible Causa</label>

                                <div class="col-md-6">
                                    <textarea name="causa" rows="4" cols="46"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Posible tratamiento</label>

                                <div class="col-md-6">
                                    <textarea name="tratamiento" rows="4" cols="46"></textarea>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-12" align="center">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar
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