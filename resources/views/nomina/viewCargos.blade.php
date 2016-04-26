@extends('layout')
@section('content')
	<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">CARGOS</div>
						<div class="panel-body">
							@include('partials/errors')
							@include('partials/success')
							@include('partials/msg-ok')
							@if(isset($cargo_id))
                            @inject('jefe','App\Http\Controllers\CargoController')
                            @if($cargo_idj!="")
                            {{--*/ $nomjefe = $jefe->show($cargo_idj)->nomcargo  /*--}}
                            @else
                            {{--*/ $nomjefe="" /*--}}
                            @endif
                            {{--*/ $readonly="readonly" /*--}}
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'upcargo']) !!}
                            
                            @else
                            {{--*/ $cargo_id="" /*--}}
                            {{--*/ $cargo_nom="" /*--}}
                            {{--*/ $cargo_idj=0 /*--}}
                            {{--*/ $nomjefe="" /*--}}
                            {{--*/ $readonly="" /*--}}
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'cargo']) !!}
                            @endif
								<input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								<div class="form-group">
                                	<label class="col-md-4 control-label">Código:</label> 
                                	<div class="col-md-2"> 
                                		<input type="number" class="form-control" style="width:70px; height: 40px; padding: 1px 15px;" id="codigo" name="codigo" value="{{$cargo_id}}" required="required" {{$readonly}}/> 
                                	</div> 
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nombre:</label> 
                                    <div class="col-md-6"> 
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$cargo_nom}}" required="required" /> 
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
                                <label class="col-md-4 control-label">A cargo de:</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="nomcargo" name="nomcargo" value="{{$nomjefe}}">
                                        <input type="hidden" id="idcargo" name="idcargo" value="{{$cargo_idj}}">  
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
				@include('nomina.listcargos')
			</div>
		</div>
	</div>	
@endsection