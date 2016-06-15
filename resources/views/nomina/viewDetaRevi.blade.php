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
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'detarevi']) !!}
                            
                                <input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								                <input type="hidden" name="idcuadro" id="idcuadro" class="form-control" value="{{ $cuadro_id }}">
								
                                <div class="form-group">&nbsp;</div>

                                

                                

                                 <div class="form-group">&nbsp;</div>

                                {{--*/ $fecha = "01/".$mes."/".$ano /*--}}
                                {{--*/ $date  = Carbon\Carbon::createFromFormat('d/m/Y',$fecha) /*--}}
                                {{--*/   $day =  $date->format('l') /*--}}
                                {{--*/   $nextmonth =  $date->addMonth() /*--}}
                                {{--*/   $lastdateday   =  $date->subDay() /*--}}
                                {{--*/   $lastday =  $date->format('d')+0 /*--}}
                               
                              
                             
                                 
                                
                                <div class="form-group">
                                	<div class="col-md-6" align="right">
                                		<button type="submit" class="btn btn-primary">
                                			Visto Bueno
                                		</button>
                                	</div>
                                  <div class="col-md-2">
                                    <button type="button" name="rev_cturno" id="rev_cturno" class="btn btn-small btn-danger" onclick="window.location.href = '/intranet/public/cuadroturrecha/{{$cuadro_id}}'">
                                    Rechazar
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