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
							@if(isset($cuadro_id))
                            
                            
                            <!-- en revision -->
                            
                            
                            @else
                           
                            {{--*/ $cuadro_ano = Carbon\Carbon::now()->format('Y') /*--}}
                            {{--*/ $cuadro_ctur=old('cturno') /*--}}
                            {{--*/ $cuadro_mes = Carbon\Carbon::now()->format('m') /*--}}
                            {{--*/ $cuadro_mes ++  /*--}}
                            @if($cuadro_mes==13)
                            {{--*/ $cuadro_mes = 1 /*--}}
                            @endif
                            {{--*/ $horario_det=old('detalle') /*--}}
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'cuadrotur']) !!}
                            @endif
								<input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Cuadro de Turno:</label> 
                                    <div class="col-md-4"> 
                                        @inject('cuadros','App\Http\Controllers\CturnoRolController') 
                                        <select name="cturno" id="cturno" class="form-control">
                                            {{--*/ $selected="" /*--}}
                                            @foreach($cuadros->list_cusuauto(Auth::user()->id,1) as $cuadro)
                                                @if($cuadro_ctur==$cuadro->id)
                                                    {{--*/ $selected="selected" /*--}}
                                                @endif
                                                <option value="{{$cuadro->id}}" {{$selected}}>{{$cuadro->nomcuadro}}</option>
                                                {{--*/ $selected="" /*--}}
                                            @endforeach
                                        </select>
                                    </div> 
                                </div>

                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Año:</label> 
                                    <div class="col-md-2"> 
                                        <input type="text" class="form-control" style="width: 70px;" id="ano" name="ano" value="{{$cuadro_ano}}" required="required" /> 
                                    </div> 
                                </div>

                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Mes:</label> 
                                    <div class="col-md-2"> 
                                        <select name="mes" id="mes" class="form-control">
                                            {{--*/ $selected="" /*--}}
                                            @if($cuadro_mes==1)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                            <option value="1" {{$selected}}> Enero</option>
                                            {{--*/ $selected="" /*--}}
                                            @if($cuadro_mes==2)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                            <option value="2" {{$selected}}> Febrero</option>
                                            {{--*/ $selected="" /*--}}
                                            @if($cuadro_mes==3)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                            <option value="3" {{$selected}}> Marzo</option>
                                            {{--*/ $selected="" /*--}}
                                            @if($cuadro_mes==4)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                            <option value="4" {{$selected}}> Abril</option>
                                            {{--*/ $selected="" /*--}}
                                            @if($cuadro_mes==5)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                            <option value="5" {{$selected}}> Mayo</option>
                                            {{--*/ $selected="" /*--}}
                                            @if($cuadro_mes==6)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                            <option value="6" {{$selected}}> Junio</option>
                                            {{--*/ $selected="" /*--}}
                                            @if($cuadro_mes==7)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                            <option value="7" {{$selected}}> Julio</option>
                                            {{--*/ $selected="" /*--}}
                                            @if($cuadro_mes==8)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                            <option value="8" {{$selected}}> Agosto</option>
                                            {{--*/ $selected="" /*--}}
                                            @if($cuadro_mes==9)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                            <option value="9" {{$selected}}> Septiembre</option>
                                            {{--*/ $selected="" /*--}}
                                            @if($cuadro_mes==10)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                            <option value="10"{{$selected}}> Octubre</option>
                                            {{--*/ $selected="" /*--}}
                                            @if($cuadro_mes==11)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                            <option value="11"{{$selected}}> Noviembre</option>
                                            {{--*/ $selected="" /*--}}
                                            @if($cuadro_mes==12)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                            <option value="12"{{$selected}}> Diciembre</option>
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
				
			</div>
		</div>
	</div>	
@endsection