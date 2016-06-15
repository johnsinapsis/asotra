@extends('layout')
@section('content')
	<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">ENTIDADES</div>
						<div class="panel-body">
							@include('partials/errors')
							@include('partials/success')
							@include('partials/msg-ok')
							@if(isset($entidad_nit))
                            {{--*/ $selected="" /*--}}
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'upentinom']) !!}
                            
                            @else
                            {{--*/ $entidad_nit="" /*--}}
                            {{--*/ $entidad_nom="" /*--}}
                            {{--*/ $entidad_tipo=0 /*--}}
                            
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'entinom']) !!}
                            @endif
								<input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								<div class="form-group">
                                	<label class="col-md-4 control-label">NIT:</label> 
                                	<div class="col-md-2"> 
                                		<input type="number" class="form-control" style="width:150px; height: 40px; padding: 1px 15px;" id="nit" name="nit" value="{{$entidad_nit}}" required="required" /> 
                                	</div> 
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nombre:</label> 
                                    <div class="col-md-6"> 
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$entidad_nom}}" required="required" /> 
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
                                <label class="col-md-4 control-label">Tipo de entidad:</label>

                                    <div class="col-md-6">
                                        <select name="tipent" id="tipent" class="form-control">
                                            @inject('entipos','App\Http\Controllers\ActividadController')
                                            @if($entidad_tipo==0)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                            <option value="0" {{$selected}}>Seleccione</option>
                                            {{--*/ $selected="" /*--}}
                                            @foreach($entipos->list_tipoent() as $tipo)
                                            @if($entidad_tipo==$tipo->id)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                                <option value="{{$tipo->id}}" {{$selected}}>{{$tipo->nombre}}</option>
                                                {{--*/ $selected="" /*--}}
                                            @endforeach
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
				@include('nomina.listentidades')
			</div>
		</div>
	</div>	
@endsection