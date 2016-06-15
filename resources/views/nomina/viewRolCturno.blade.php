@extends('layout')
@section('content')
	<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">USUARIOS AUTORIZADOS CUADROS DE TURNO</div>
						<div class="panel-body">
							@include('partials/errors')
							@include('partials/success')
							@include('partials/msg-ok')
							@if(isset($cturnorol_id))
                            
                            @inject('user','App\Http\Controllers\Auth\AuthController')
                            {{--*/ $nomusua = $user->show($cturnorol_idusu)->name  /*--}}
                            @inject('cuadro','App\Http\Controllers\CturnoController')
                            {{--*/ $nomcuadro = $cuadro->show($cturnorol_idtur)->nomcuadro  /*--}}

                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => ['upcturnorol',$cturnorol_id]]) !!}
                            
                            
                            @else
                            {{--*/ $cturnorol_idtur="" /*--}}
                            {{--*/ $nomusua="" /*--}}
                            {{--*/ $nomcuadro="" /*--}}
                            {{--*/ $cturnorol_idusu="" /*--}}
                            {{--*/ $cturnorol_rol=0 /*--}}
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'cturnorol']) !!}
                            @endif
								<input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Cuadro de Turno:</label> 
                                    <div class="col-md-4"> 
                                        <input type="text" class="form-control" id="nomcuadro" name="nomcuadro" value="{{$nomcuadro}}" required="required" />
                                        <input type="hidden" id="idcuadro" name="idcuadro" value="{{$cturnorol_idtur}}">   
                                    </div> 
                                </div>
                              

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Usuario:</label> 
                                    <div class="col-md-4"> 
                                        <input type="text" class="form-control" id="nomusua" name="nomusua" value="{{$nomusua}}" required="required" />
                                        <input type="hidden" id="idusu" name="idusu" value="{{$cturnorol_idusu}}">   
                                    </div> 
                                </div>

                                <div class="form-group">
                                <label class="col-md-4 control-label">Rol:</label>

                                    <div class="col-md-2">
                                        <select name="rol" id="rol" class="form-control">
                                            
                                            @if(($cturnorol_rol==0)|| ($cturnorol_rol==1))
                                             <option value="1" selected="selected">Elabora</option>
                                             <option value="2" >Visto Bueno</option>
                                             <option value="3" >Aprueba</option>
                                            @endif

                                            @if($cturnorol_rol==2)
                                             <option value="1" >Elabora</option>
                                             <option value="2" selected="selected">Visto Bueno</option>
                                             <option value="3" >Aprueba</option>
                                            @endif

                                            @if($cturnorol_rol==3)
                                             <option value="1" >Elabora</option>
                                             <option value="2" >Visto Bueno</option>
                                             <option value="3" selected="selected">Aprueba</option>
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
				@include('nomina.listcturnorol')
			</div>
		</div>
	</div>	
@endsection