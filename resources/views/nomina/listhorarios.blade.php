@extends('layout')
@section('content')
<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">LISTADO HORARIOS</div>
						<div class="panel-body">
							
							
							<div class="form-group">
								<table class="table table-striped" style="width: 700px; " align="center">
									<tr>
									    <th width="20px" style="text-align: center;">Cod</th>
										<th width="250px"  style="text-align: center;">Título del horario</th>
										<th width="350px" style="text-align: center;">Descripción</th>
										<th width="80px" style="text-align: center;">Jornada</th>
										<th>&nbsp;</th>

									</tr>
									@inject('horarios','App\Http\Controllers\HorarioCabController')

									@foreach($horarios->list_horario() as $hor)
									<tr style="color:#AD4A4A;">
										<td>{{$hor->abr}}</td>
										<td align="center">{{$hor->nomhorario}}</td>
										<td align="center">{{$hor->descripcion}}</td>
										<td align="center">{{$hor->nombre}}</td>
										<td><!-- <button type="button" name="modif" class="btn btn-small btn-warning" >Modificar</button> -->
											{!! Form::open(['method' => 'POST','route' => ['edithorario',$hor->id]]) !!}

											<input type="submit" class="btn btn-small btn-warning"  value="Modificar">
											{!! Form::close() !!}
										</td>
									</tr>
									@endforeach
				
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection