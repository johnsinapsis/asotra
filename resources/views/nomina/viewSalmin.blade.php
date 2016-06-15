@extends('layout')
@section('content')
	<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">SALARIO MINIMO ANUAL</div>
						<div class="panel-body">
							@include('partials/errors')
							@include('partials/success')
							@include('partials/msg-ok')
							@if(isset($salmin_ano))
                            
                            
                            {{--*/ $readonly="readonly" /*--}}
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'upsalmin']) !!}
                            
                            @else
                            {{--*/ $salmin_ano="" /*--}}
                            {{--*/ $salmin_val="" /*--}}
                            {{--*/ $salmin_aux="" /*--}}
                            {{--*/ $readonly="" /*--}}
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'salmin']) !!}
                            @endif
								<input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								<div class="form-group">
                                	<label class="col-md-5 control-label">Año:</label> 
                                	<div class="col-md-2"> 
                                		<input type="number" class="form-control" style="width:80px; height: 40px; padding: 1px 15px;" id="salano" name="salano" value="{{$salmin_ano}}" required="required" {{$readonly}}/> 
                                	</div> 
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Salario Mínimo:</label> 
                                    <div class="col-md-6"> 
                                        <input type="number" class="form-control" style="width:150px; height: 40px; padding: 1px 15px;" id="salmin" name="salmin" value="{{$salmin_val}}" required="required" /> 
                                    </div> 
                                </div>
                               <!--  <div class="form-group">
                                   <label class="col-md-2 control-label" style="text-align: left; width: auto;">Primer Nombre:</label> 
                                   <div class="col-md-2" style="padding-left: 10px; padding-right: 10px; width: auto;"> 
                                       <input type="text" class="form-control" style=" width: 130px; " id="nombre1" name="nombre1" value=""/> 
                                   </div> 
                                   <label class="col-md-2 control-label" style="text-align: left; width: auto;">Segundo Nombre:</label> 
                                   <div class="col-md-2" style="padding-left: 10px; padding-right: 10px; width: auto;"> 
                                       <input type="text" class="form-control" style=" width: 130px; " id="nombre2" name="nombre2" value=""/> 
                                   </div> 
                                   <label class="col-md-2 control-label" style="text-align: left; width: auto;">Apellidos:</label> 
                                   <div class="col-md-2" style="padding-left: 10px; padding-right: 10px; width: auto;"> 
                                       <input type="text" class="form-control" style=" width: 130px; margin-right: 0px;" id="apelli1" name="apelli1" value=""/> 
                                   </div> 
                                   <div class="col-md-2" style="padding-left: 10px; padding-right: 10px; width: auto;"> 
                                       <input type="text" class="form-control" style=" width: 130px; margin-right: 0px;" id="apelli2" name="apelli2" value=""/> 
                                   </div> 
                               </div> -->

                                <div class="form-group">
                                <label class="col-md-5 control-label">Auxilio de transporte:</label>

                                    <div class="col-md-6">
                                        <input type="number" class="form-control" style="width:150px; height: 40px; padding: 1px 15px;" id="auxtra" name="auxtra" value="{{$salmin_aux}}">      
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
				@include('nomina.listsalmin')
			</div>
		</div>
	</div>	
@endsection