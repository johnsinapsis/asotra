@extends('layout')
@section('content')
	<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						@if(isset($perfil_id))
                        <div class="panel-heading" align="center">{{$perfil_nom}}</div>
                        @else
                        <div class="panel-heading" align="center">PERMISOS POR PERFIL</div>
                        @endif
						<div class="panel-body">
							@include('partials/errors')
							@include('partials/success')
							@include('partials/msg-ok')
							@if(isset($perfil_id))
                            
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => ['creapermiso',$perfil_id]]) !!}

                               <input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Función:</label> 
                                    <div class="col-md-4"> 
                                        <select name="funcion" id="funcion" class="form-control">
                                            @inject('funciones','App\Http\Controllers\PermisosController') 
                                            <option value="0" selected>Seleccione</option>
                                            @foreach($funciones->list_funciones($perfil_id) as $fun)
                                            <option value="{{$fun->id}}">{{$fun->id}} - {{$fun->nomfuncion}}</option>
                                            @endforeach
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
                            @else
                           
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'permisos']) !!}
                            
								<input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Perfil:</label> 
                                    <div class="col-md-4"> 
                                        <select name="perfil" id="perfil" class="form-control">
                                            @inject('perfiles','App\Http\Controllers\PerfilesController') 
                                            <option value="0" selected>Seleccione</option>
                                            @foreach($perfiles->list_perfiles() as $per)
                                            <option value="{{$per->id}}">{{$per->nombre}}</option>
                                            @endforeach
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
                            @endif
						</div>
					</div>
				</div>
				@include('config.listpermisos')
			</div>
		</div>
	</div>	
@endsection