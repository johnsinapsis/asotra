@extends('layout')
@section('content')
	<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">HORARIOS</div>
						<div class="panel-body">
							@include('partials/errors')
							@include('partials/success')
							@include('partials/msg-ok')
							@if(isset($horario_id))
                            
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => ['uphorario',$horario_id]]) !!}
                            
                            
                            @else
                           
                            {{--*/ $horario_abr=old('abr') /*--}}
                            {{--*/ $horario_nom=old('nombre') /*--}}
                            {{--*/ $horario_jor=old('jornada') /*--}}
                            {{--*/ $horario_det=old('detalle') /*--}}
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'horario']) !!}
                            @endif
								<input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nomenclatura:</label> 
                                    <div class="col-md-2"> 
                                        <input type="text" class="form-control" style="width: 70px;" id="abr" name="abr" value="{{$horario_abr}}" required="required" /> 
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Título del Horario:</label> 
                                    <div class="col-md-4"> 
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$horario_nom}}" required="required" /> 
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Detalle del Horario:</label> 
                                    <div class="col-md-4"> 
                                        <textarea class="form-control" id="detalle" name="detalle" required="required" >{{ltrim($horario_det)}}</textarea>
                                    </div> 
                                </div>
                              
                              

                                <div class="form-group">
                                <label class="col-md-4 control-label">Jornada:</label>
                                    @inject('activ','App\Http\Controllers\ActividadController')
                                    <div class="col-md-3">
                                   <select name="jornada" id="jornada" class="form-control">
                                     @foreach($activ->list_jornadas() as $jor)
                                            {{--*/ $selected="" /*--}}
                                            @if($horario_jor==$jor->id)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                                <option value="{{$jor->id}}" {{$selected}}>{{$jor->nombre}}</option>
                                            {{--*/ $selected="" /*--}}
                                      @endforeach
                                   </select>
                                   </div>
                                </div>
                                 
                                 @include('nomina.viewHorarioDet')
                                
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
				
			</div>
		</div>
	</div>	
@endsection