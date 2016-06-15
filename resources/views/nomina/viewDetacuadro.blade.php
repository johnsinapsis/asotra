@extends('layout')
@section('content')
	<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="z-index: 99; width: 1400px; " class="col-xs-1">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">CUADRO DE TURNO</div>
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
                           
                           <h3 align="center" style="color:red;" >CUADRO DE TURNO {{$cuadro_nom}}  AÑO:{{$ano}}  MES:{{$nommes}}</h3>
                           
                            {{--*/ $cuadro_emp=old('empleado') /*--}}
                            {{--*/ $cuadro_hor=old('horario') /*--}}
                            {{--*/ $horario_jor=old('jornada') /*--}}
                            {{--*/ $horario_det=old('detalle') /*--}}
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'detacuadro']) !!}
                            @endif
                                <input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								<input type="hidden" name="idcuadro" id="idcuadro" class="form-control" value="{{ $cuadro_id }}">
								
                                <div class="form-group">&nbsp;</div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Empleado:</label> 
                                    <div class="col-md-3"> 
                                        <select name="empleado" id="empleado" class="form-control" onchange="cargarSelect('empleado','horario','3','');">
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
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Horario:</label> 
                                    <div class="col-md-3"> 
                                        <select name="horario" id="horario" class="form-control" onchange="cargar_cturno('horario','{{$mes}}');  ">
                                            <option value="0">Horario</option>
                                        </select>
                                    </div> 
                                </div>

                                 <div id="desc"  style="font-size: 12px; color: #920606; text-align: center; ">&nbsp;</div>

                                 <div class="form-group">&nbsp;</div>

                                {{--*/ $fecha = "01/".$mes."/".$ano /*--}}
                                {{--*/ $date  = Carbon\Carbon::createFromFormat('d/m/Y',$fecha) /*--}}
                                {{--*/   $day =  $date->format('l') /*--}}
                                {{--*/   $nextmonth =  $date->addMonth() /*--}}
                                {{--*/   $lastdateday   =  $date->subDay() /*--}}
                                {{--*/   $lastday =  $date->format('d')+0 /*--}}
                                <div class="form-group">
                                    <!-- <label class="col-md-4 control-label">Dia:</label>  -->
                                    
                                      <div class="col-md-2">&nbsp;</div>  
                                     @for($i=1;$i<=15;$i++)
                                        <label class="col-md-1 control-label" style="width:5px; margin-right:0px; padding-right:5px;">{{$i}}</label> 
                                        <div class="col-md-1" style="width:15px; marging-left:0px; "> 
                                        <input type="checkbox" name="d{{$i}}" id="d{{$i}}" class="form-control" style="width:15px; " align="left">
                                        </div>    
                                     @endfor
                                       
                                   
                                </div>

                                <div class="form-group">
                                    <!-- <label class="col-md-4 control-label">Dia:</label>  -->
                                    
                                      <div class="col-md-2">&nbsp;</div>  
                                     @for($i=16;$i<=$lastday;$i++)
                                        <label class="col-md-1 control-label" style="width:5px; margin-right:0px; padding-right:5px;">{{$i}}</label> 
                                        <div class="col-md-1" style="width:15px; marging-left:0px; "> 
                                        <input type="checkbox" name="d{{$i}}" id="d{{$i}}" class="form-control" style="width:15px; " align="left">
                                        </div>    
                                     @endfor
                                       
                                   
                                </div>
                              
                              
                             
                                 
                                
                                <div class="form-group">
                                	<div class="col-md-12" align="center">
                                		<button type="submit" class="btn btn-primary">
                                			Guardar
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