@extends('layout')
@section('content')
	<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">ARCHIVOS ADJUNTOS CASO No. {{$caso_id}}</div>
						<div class="panel-body">
							@include('partials/errors')
							@include('partials/success')
							@include('partials/msg-ok')
							
                            
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'archicaso', 'files' => true]) !!}
                            
                            
                            
                           
                            {{--*/ $caso_nom=old('nombre') /*--}}
                            {{--*/ $caso_des=old('descripcion') /*--}}
                            {{--*/ $caso_area=old('area') /*--}}
                            {{--*/ $caso_tipo=old('tipo') /*--}}
                            {{--*/ $fecha = Carbon\Carbon::now()->format('Y-m-d') /*--}}
                            {{--*/ $selected="" /*--}}
                            
                            
                            
                                <input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">

                                <input type="hidden" name="caso" id="caso" class="form-control" value="{{ $caso_id }}">
								
                                <input type="hidden" name="numarchi" id="numarchi" class="form-control" value="0">
								
                                <table id="tarchi" class="table table-striped" style="width: 600px; " align="center">

                                    <tr>
                                        <th width="300px"  style="text-align: center;">Titulo</th>
                                        <th><button type="button" name="agregar" id="agregar" class="btn btn-small btn-default" onclick="agregaArchivo()">Agregar</button></th>
                                        <th width="20px"  style="text-align: center;">&nbsp;</th>
                                    </tr>
                                
                                </table>

                                

                              

                                
                                <div class="form-group">
                                	<div class="col-md-6" align="right">
                                		<button type="submit" class="btn btn-primary">
                                			Guardar
                                		</button>
                                	</div>
                                    <div class="col-md-2" align="left">
                                        <button type="button" class="btn btn-succes" onclick="location.href = 'http://srvasotra/intranet/public/'">
                                            Sin archivos
                                        </button>
                                    </div>
                            	</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>	
@endsection