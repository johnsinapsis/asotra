@extends('layout')
@section('content')
	<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">CUADROS DE TURNO</div>
						<div class="panel-body">
							@include('partials/errors')
							@include('partials/success')
							@include('partials/msg-ok')
							@if(isset($cturno_id))
                            
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => ['upcturno',$cturno_id]]) !!}
                            
                            
                            @else
                           
                            {{--*/ $cturno_nom="" /*--}}
                            {{--*/ $cturno_est=0 /*--}}
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'cturno']) !!}
                            @endif
								<input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nombre:</label> 
                                    <div class="col-md-4"> 
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$cturno_nom}}" required="required" /> 
                                    </div> 
                                </div>
                              

                                <div class="form-group">
                                <label class="col-md-4 control-label">Estado:</label>

                                    <div class="col-md-2">
                                        <select name="estado" id="estado" class="form-control">
                                            
                                            @if($cturno_est==0)
                                             <option value="1" >Activo</option>
                                             <option value="0" selected="">Inactivo</option>
                                            @else
                                             <option value="1" selected="">Activo</option>
                                             <option value="0">Inactivo</option>
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                	<div class="col-md-12" align="center">
                                		<button type="submit" class="btn btn-primary">
                                			Guardar
                                		</button>
                                	</div>
                            	</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				@include('nomina.listcturno')
			</div>
		</div>
	</div>	
@endsection