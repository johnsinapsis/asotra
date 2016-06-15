@extends('layout')
@section('content')
<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">LISTADO EMPLEADOS</div>
						<div class="panel-body">
							<div class="form-group">
								<div class="col-md-2"></div>
							    <label class="col-md-2 control-label" >Buscar Empleado:</label>
							    {!! Form::open(['method' => 'POST','route' => 'browemple']) !!}
							    <div class="col-md-4">
							    	<input type="text" class="form-control" id="nomemple" name="nomemple" value="">
							    	<input type="hidden" id="idemple" name="idemple" value="0">  
							    </div>
							    <div class="col-md-3">
							    <input type="submit" class="btn btn-small btn-primary" class="form-control" value="Buscar">
							    </div>
							    {!! Form::close() !!}
							</div>
							<div class="form-group">
							<div class="col-md-12">&nbsp</div>
							</div>
							<div class="form-group">
								<table class="table table-striped" style="width: 700px; " align="center">
									<tr>
									    <th width="20px" style="text-align: center;">Cédula</th>
										<th width="250px"  style="text-align: center;">Nombre del Empleado</th>
										<th width="250px" style="text-align: center;">Móvil</th>
										<th>&nbsp;</th>

									</tr>
									@inject('empleados','App\Http\Controllers\EmpleadoController')

									@if(isset($browemple))
									@foreach($browemple as $emp)
									<tr style="color:#AD4A4A;">
										<td>{{$emp->id_emp}}</td>
										<td align="center">{{$emp->nombre}}</td>
										<td align="center">{{$emp->cel_emp}}</td>
										<td><!-- <button type="button" name="modif" class="btn btn-small btn-warning" >Modificar</button> -->
											{!! Form::open(['method' => 'POST','route' => ['editemple',$emp->id]]) !!}

											<input type="submit" class="btn btn-small btn-warning"  value="Modificar">
											{!! Form::close() !!}
										</td>
									</tr>
									@endforeach
									@else
									@foreach($empleados->list_emple() as $emp)
									<tr style="color:#AD4A4A;">
										<td>{{$emp->id_emp}}</td>
										<td align="center">{{$emp->nombre}}</td>
										<td align="center">{{$emp->cel_emp}}</td>
										<td><!-- <button type="button" name="modif" class="btn btn-small btn-warning" >Modificar</button> -->
											{!! Form::open(['method' => 'POST','route' => ['editemple',$emp->id]]) !!}

											<input type="submit" class="btn btn-small btn-warning"  value="Modificar">
											{!! Form::close() !!}
										</td>
									</tr>
									@endforeach
									@endif	
								</table>
									{!!$empleados->list_emple()->render()!!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection