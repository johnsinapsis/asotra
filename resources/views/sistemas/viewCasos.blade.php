@extends('layout')
@section('content')
	<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">CASOS DE SOPORTE</div>
						<div class="panel-body">
							@include('partials/errors')
							@include('partials/success')
							@include('partials/msg-ok')
							@if(isset($festivo_id))
                            
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => ['upfestivo',$festivo_id]]) !!}
                            
                            
                            @else
                           
                            {{--*/ $caso_nom=old('nombre') /*--}}
                            {{--*/ $caso_des=old('descripcion') /*--}}
                            {{--*/ $caso_area=old('area') /*--}}
                            {{--*/ $caso_tipo=old('tipo') /*--}}
                            {{--*/ $fecha = Carbon\Carbon::now()->format('Y-m-d') /*--}}
                            {{--*/ $selected="" /*--}}
                            
                             {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'caso']) !!}
                            @endif
								<input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								
                                <div class="form-group">
                                <label class="col-md-4 control-label">Fecha:</label>

                                    <div class="col-md-3">
                                        <input type="date" class="form-control" id="fecha" name="fecha" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" required="required" /> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Titulo del Caso, Incidente o Solicitud:</label> 
                                    <div class="col-md-4"> 
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$caso_nom}}" required="required" /> 
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Tipo de soporte:</label> 
                                    <div class="col-md-3"> 
                                        <select name="tipo" id="tipo" class="form-control">
                                            @inject('tipo','App\Http\Controllers\TipoSoporteController') 
                                            @foreach($tipo->show() as $sop) 
                                            <option value="{{$sop->id}}">{{$sop->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Area:</label> 
                                    <div class="col-md-3"> 
                                        <select name="area" id="area" class="form-control">
                                            @inject('areas','App\Http\Controllers\AreaSoporController') 
                                            @foreach($areas->listareas2() as $area) 
                                            <option value="{{$area->id}}">{{$area->nom_area}}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Descripción:</label> 
                                    <div class="col-md-4"> 
                                        <textarea name="descripcion" id="descripcion" class="form-control" cols="30" rows="10" onkeyup="cuentachar('descripcion','numchar')">{{$caso_des}}</textarea>
                                    </div> 
                                </div>

                                <div class="form-group">
                                <div id="numchar" align="center"></div>
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