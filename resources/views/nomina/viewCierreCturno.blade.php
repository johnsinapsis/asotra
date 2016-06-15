@extends('layout')
@section('content')
	<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">CIERRE CUADRO DE TURNO</div>
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
                                
                           
                           <h3 align="center" style="color:red;" >CUADRO DE TURNO {{$cuadro_nom}}  AÑO:{{$ano}}  MES:{{$nommes}} </h3>
                           
                            {{--*/ $cuadro_emp=old('empleado') /*--}}
                            {{--*/ $cuadro_hor=old('horario') /*--}}
                            {{--*/ $horario_jor=old('jornada') /*--}}
                            {{--*/ $horario_det=old('detalle') /*--}}
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'cuadroturela']) !!}
                            
                                <input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								<input type="hidden" name="idcuadro" id="idcuadro" class="form-control" value="{{ $cuadro_id }}">
								
                                

                                <div class="form-group">
                                    <label class="col-md-8 control-label"><h3>Está seguro de cerrar este cuadro?</h3></label> 
                                    
                                </div>

                                <div class="form-group">
                                    <label style="color:#B71818" class="col-md-10 control-label">
                                    Recuerde que no se puede modificar un cuadro cerrado a menos que sea Rechazado por quien aprueba
                                    </label>
                                </div>
                                                              
                                 
                                
                                <div class="form-group">
                                	<div class="col-md-6" align="right">
                                		<button type="submit" class="btn btn-primary">
                                			Aceptar
                                		</button>
                                	</div>
                                    <div class="col-md-2" align="center">
                                        <button type="button" class="btn btn-danger" onclick="window.location.href = '/intranet/public/detacuadro'">
                                            Cancelar
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