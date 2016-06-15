@extends('layout')
@section('content')
	<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="z-index: 99; width: 1400px; " class="col-xs-1">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">CAMBIOS AL CUADRO DE TURNO</div>
						<div class="panel-body">
							@include('partials/errors')
							@include('partials/success')
							@include('partials/msg-ok')
							@if(isset($detalle_id))
                            
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => ['updetacuadro',$horario_id]]) !!}
                            
                            
                            @else

                                @if ($mes === 1)
                                   {{--*/ $nommes = "ENERO" /*--}}
                                @elseif ($mes == 2)
                                   {{--*/ $nommes = "FEBRERO" /*--}}
                                @elseif ($mes == 3)
                                   {{--*/ $nommes = "MARZO" /*--}}
                                @elseif ($mes == 4)
                                   {{--*/ $nommes = "ABRIL" /*--}}
                                @elseif ($mes == 5)
                                   {{--*/ $nommes = "MAYO" /*--}}
                                @elseif ($mes == 6)
                                   {{--*/ $nommes = "JUNIO" /*--}}
                                @elseif ($mes == 7)
                                   {{--*/ $nommes = "JULIO" /*--}}
                                @elseif ($mes == 8)
                                   {{--*/ $nommes = "AGOSTO" /*--}}
                                @elseif ($mes == 9)
                                   {{--*/ $nommes = "SEPTIEMBRE" /*--}}
                                @elseif ($mes == 10)
                                   {{--*/ $nommes = "OCTUBRE" /*--}}
                                @elseif ($mes == 11)
                                   {{--*/ $nommes = "NOVIEMBRE" /*--}}
                                @else
                                   {{--*/ $nommes = "DICIEMBRE" /*--}}
                                @endif
                           
                           <h3 align="center" style="color:red;" >CUADRO DE TURNO {{$cuadro_nom}}  AÑO:{{$ano}}  MES:{{$nommes}} </h3>
                           
                            {{--*/ $cuadro_emp=old('empleado') /*--}}
                            {{--*/ $cuadro_hor=old('horario') /*--}}
                            {{--*/ $horario_jor=old('jornada') /*--}}
                            {{--*/ $horario_det=old('detalle') /*--}}
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'detacambio']) !!}
                            @endif
                                <input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								<input type="hidden" name="idcuadro" id="idcuadro" class="form-control" value="{{ $cuadro_id }}">
								
                                <div class="form-group">&nbsp;</div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Empleado Origen:</label> 
                                    <div class="col-md-3"> 
                                        <select name="emp_origen" id="emp_origen" class="form-control" onchange="selectTurno('{{$cuadro_id}}','emp_origen','diaor');">
                                        @inject('empleado','App\Http\Controllers\CturnoEmpController') 
                                        
                                        {{--*/ $selected="selected" /*--}}
                                       
                                        <option value="0" {{$selected}}>Seleccione</option>
                                        {{--*/ $selected="" /*--}}
                                        @foreach($empleado->list_cempauto($cuadro_tur) as $emp)
                                                @if($cuadro_emp==$emp->id)
                                                    {{--*/ $selected="selected" /*--}}
                                                @else
                                                    {{--*/ $selected="" /*--}}
                                                @endif
                                                <option value="{{$emp->id}}" {{$selected}}>{{$emp->nombre}}</option>
                                                {{--*/ $selected="" /*--}}
                                        @endforeach
                                            
                                        </select>
                                    </div> 
                                    <label class="col-md-1 control-label">Día Orígen:</label> 
                                    <div class="col-md-1"> 
                                     <select name="diaor" id="diaor" class="form-control" onchange="selectHorario('{{$cuadro_id}}','emp_origen','diaor','horarioor');">
                                        
                                     </select>
                                    </div>

                                     <label class="col-md-2 control-label" style="width:150px;">Horario origen:</label>
                                     
                                     <div class="col-md-1"> 
                                     <select name="horarioor" id="horarioor" class="form-control">
                                         <option value="0">Horario</option>
                                     </select>
                                     </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Empleado Destino:</label> 
                                    <div class="col-md-3"> 
                                        <select name="emp_destino" id="emp_destino" class="form-control" onchange="selectTurno('{{$cuadro_id}}','emp_destino','diades');">
                                        
                                        {{--*/ $selected="selected" /*--}}
                                       
                                        <option value="0" {{$selected}}>Seleccione</option>
                                        {{--*/ $selected="" /*--}}
                                        @foreach($empleado->list_cempauto($cuadro_tur) as $emp)
                                                @if($cuadro_emp==$emp->id)
                                                    {{--*/ $selected="selected" /*--}}
                                                @else
                                                    {{--*/ $selected="" /*--}}
                                                @endif
                                                <option value="{{$emp->id}}" {{$selected}}>{{$emp->nombre}}</option>
                                                {{--*/ $selected="" /*--}}
                                        @endforeach
                                            
                                        </select>
                                    </div> 
                                    <label class="col-md-1 control-label">Día Destino:</label> 
                                    <div class="col-md-1"> 
                                     <select name="diades" id="diades" class="form-control" onchange="selectHorario('{{$cuadro_id}}','emp_destino','diades','horariodes');">
                                        
                                     </select>
                                    </div>

                                     <label class="col-md-2 control-label" style="width:150px;">Horario Destino:</label>
                                     
                                     <div class="col-md-1"> 
                                     <select name="horariodes" id="horariodes" class="form-control">
                                         <option value="0">Horario</option>
                                     </select>
                                     </div>

                                </div>

                               
                                                              
                                 
                                
                                <div class="form-group">
                                	<div class="col-md-12" align="center">
                                		<button type="submit" class="btn btn-primary">
                                			Aceptar
                                		</button>
                                	</div>
                            	</div>
							{!! Form::close() !!}
                                                
                                @include('nomina.viewDetaCuadro2')

						</div>
					</div>
				</div>
				
                    
			</div>
		</div>
	</div>	
@endsection