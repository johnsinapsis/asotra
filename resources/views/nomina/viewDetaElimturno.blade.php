@extends('layout')
@section('content')
	<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
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
                           
                           <h3 align="center" style="color:red;" >CUADRO DE TURNO {{$cuadro_nom}}  AÑO:{{$ano}}  MES:{{$nommes}} </h3>
                           
                            {{--*/ $cuadro_emp=old('empleado') /*--}}
                            {{--*/ $cuadro_hor=old('horario') /*--}}
                            {{--*/ $horario_jor=old('jornada') /*--}}
                            {{--*/ $horario_det=old('detalle') /*--}}
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'detaelim']) !!}
                            @endif
                                <input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								<input type="hidden" name="idcuadro" id="idcuadro" class="form-control" value="{{ $cuadro_id }}">
								
                                <div class="form-group">&nbsp;</div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Empleado:</label> 
                                    <div class="col-md-4"> 
                                        <select name="empleado" id="empleado" class="form-control" >
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
                                	<div class="col-md-12" align="center">
                                		<button type="submit" class="btn btn-primary">
                                			Aceptar
                                		</button>
                                	</div>
                            	</div>
							{!! Form::close() !!}
                                                


						</div>
					</div>
				</div>
				
                    @if(isset($id_emp))

                        @include('nomina.listdetaturnos')

                    @endif
			</div>
		</div>
	</div>	
@endsection