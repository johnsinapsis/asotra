@extends('layout')
@section('content')
<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">LISTADO CAMBIOS DE TURNO</div>
						<div class="panel-body">
							<div class="form-group">
								<div class="col-md-2"></div>
							    <label class="col-md-2 control-label" >Buscar Cuadro:</label>
							    {!! Form::open(['method' => 'POST','route' => 'browcambio']) !!}
            					<div class="col-md-4">
            					    <input type="text" class="form-control" id="nomcuadro" name="nomcuadro" value="">
            					    <input type="hidden" id="idcuadro" name="idcuadro" value="0">  
            					</div>
            					<input type="submit" class="col-md-2 btn btn-small btn-primary"  value="Buscar">
            					{!! Form::close() !!}
							</div>
							<div class="form-group">
							<div class="col-md-12">&nbsp</div>
							</div>
							<div class="form-group">
								<table class="table table-striped" style="width: 900px; " align="center">
									<tr>
									    <th width="20px" style="text-align: center;">Año</th>
										<th width="20px"  style="text-align: center;">Mes</th>
										<th width="100px" style="text-align: center;">Cuadro</th>
										<th width="150px" style="text-align: center;">Solicitante</th>
										<th width="20px" style="text-align: center;">Día</th>
										<th width="50px" style="text-align: center;">Horario</th>
										<th width="150px" style="text-align: center;">Destino</th>
										<th width="20px" style="text-align: center;">Día</th>
										<th width="50px" style="text-align: center;">Horario</th>

									</tr>
									@inject('cambios','App\Http\Controllers\CuadroCambioController')

									@if(isset($browcambio))
									@foreach($browcambio as $cambio)
										<td align="center">{{$cambio->ano}}</td>
										<td align="center">{{$cambio->mes}}</td>
										<td align="center">{{$cambio->nomcuadro}}</td>
										<td align="center">{{$cambio->nombre_or}}</td>
										<td align="center">{{$cambio->dia_or}}</td>
										<td align="center">{{$cambio->horario_or}}</td>
										<td align="center">{{$cambio->nombre_des}}</td>
										<td align="center">{{$cambio->dia_des}}</td>
										<td align="center">{{$cambio->horario_des}}</td>
									</tr>
									@endforeach
									@else
									@foreach($cambios->list_cambios() as $cambio)
									<tr style="color:#AD4A4A;">
										<td align="center">{{$cambio->ano}}</td>
										<td align="center">{{$cambio->mes}}</td>
										<td align="center">{{$cambio->nomcuadro}}</td>
										<td align="center">{{$cambio->nombre_or}}</td>
										<td align="center">{{$cambio->dia_or}}</td>
										<td align="center">{{$cambio->horario_or}}</td>
										<td align="center">{{$cambio->nombre_des}}</td>
										<td align="center">{{$cambio->dia_des}}</td>
										<td align="center">{{$cambio->horario_des}}</td>
									</tr>
									@endforeach
									@endif	
								</table>
									{!!$cambios->list_cambios()->render()!!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection