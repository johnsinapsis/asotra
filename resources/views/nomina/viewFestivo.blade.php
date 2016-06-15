@extends('layout')
@section('content')
	<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">DIAS FESTIVOS</div>
						<div class="panel-body">
							@include('partials/errors')
							@include('partials/success')
							@include('partials/msg-ok')
							@if(isset($festivo_id))
                            
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => ['upfestivo',$festivo_id]]) !!}
                            
                            
                            @else
                           
                            {{--*/ $festivo_nom="" /*--}}
                            {{--*/ $festivo_fec="" /*--}}
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'festivo']) !!}
                            @endif
								<input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nombre de la Fiesta:</label> 
                                    <div class="col-md-4"> 
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$festivo_nom}}" required="required" /> 
                                    </div> 
                                </div>
                              

                                <div class="form-group">
                                <label class="col-md-4 control-label">Fecha:</label>

                                    <div class="col-md-3">
                                        <input type="date" class="form-control" id="fecha" name="fecha" value="{{$festivo_fec}}" required="required" /> 
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
				@include('nomina.listfestivos')
			</div>
		</div>
	</div>	
@endsection