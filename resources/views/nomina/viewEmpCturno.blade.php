@extends('layout')
@section('content')
	<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">ASIGNACIÓN EMPLEADOS A CUADROS DE TURNO</div>
						<div class="panel-body">
							@include('partials/errors')
							@include('partials/success')
							@include('partials/msg-ok')
							@if(isset($cturnoemp_id))
                            
                            @inject('emple','App\Http\Controllers\Auth\AuthController')
                            {{--*/ $nomemple = $emple->show($cturnoemp_idemp)->nombre  /*--}}
                            @inject('cuadro','App\Http\Controllers\CturnoController')
                            {{--*/ $nomcuadro = $cuadro->show($cturnoemp_idtur)->nomcuadro  /*--}}

                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => ['upcturnoemp',$cturnoemp_id]]) !!}
                            
                            
                            @else
                            {{--*/ $cturnoemp_idtur="" /*--}}
                            {{--*/ $nomemple="" /*--}}
                            {{--*/ $nomcuadro="" /*--}}
                            {{--*/ $cturnoemp_idemp="" /*--}}
                         
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'cturnoemp']) !!}
                            @endif
								<input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Cuadro de Turno:</label> 
                                    <div class="col-md-4"> 
                                        <input type="text" class="form-control" id="nomcuadro" name="nomcuadro" value="{{$nomcuadro}}" required="required" />
                                        <input type="hidden" id="idcuadro" name="idcuadro" value="{{$cturnoemp_idtur}}">   
                                    </div> 
                                </div>
                              

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Empleado:</label> 
                                    <div class="col-md-4"> 
                                        <input type="text" class="form-control" id="nomemple" name="nomemple" value="{{$nomemple}}" required="required" />
                                        <input type="hidden" id="idemple" name="idemple" value="{{$cturnoemp_idemp}}">   
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
				@include('nomina.listcturnoemp')
			</div>
		</div>
	</div>	
@endsection