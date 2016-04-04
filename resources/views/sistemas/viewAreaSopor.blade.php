@extends('layout')
@section('content')
	<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">CREAR AREAS DE SOPORTE</div>
						<div class="panel-body">
							@include('partials/errors')
							@include('partials/success')
							@include('partials/msg-ok')
							{!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'areasopor']) !!}
								<input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								<div class="form-group">
                                	<label class="col-md-4 control-label">Nombre del área:</label> 
                                	<div class="col-md-6"> 
                                		<input type="text" class="form-control" id="nombre" name="nombre" value="" required="required" /> 
                                	</div> 
                                </div>
                                <div class="form-group">
                                	<label class="col-md-4 control-label">Estado:</label> 
                                	<div class="col-md-6"> 
                                		<select name="estado" id="estado" class="form-control" style=" width: 130px; ">
                                			<option value="0">Inactivo</option>
                                			<option value="1" selected>Activo</option>
                                		</select>
                                	</div> 
                                </div>
                                <div class="form-group">
                                	<label class="col-md-4 control-label">Observación:</label> 
                                	<div class="col-md-6"> 
                                		<input type="text" class="form-control" id="observacion" name="observacion" value=""/> 
                                	</div> 
                                </div>
                                <div class="form-group">
                                	<div class="col-md-12" align="center">
                                		<button type="submit" class="btn btn-primary">
                                			Registrar
                                		</button>
                                	</div>
                            	</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				@include('sistemas.listareas')
			</div>
		</div>
	</div>	
@endsection