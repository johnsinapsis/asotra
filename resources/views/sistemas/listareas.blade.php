<div id="draggable" style="position:absolute; top:60%; z-index: 89;" class="col-xs-8">
	<div class="panel panel-danger class" >
		<div class="panel-heading" align="center">LISTADO AREAS DE SOPORTE</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered" style="width: 600px; " align="center">
				<tr>
					<th width="250px" style="text-align: center;">Nombre del área</th>
					<th width="20px"  style="text-align: center;">Estado</th>
					<th width="230px" style="text-align: center;">Observaciones</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
				@inject('areas','App\Http\Controllers\AreaSoporController')

				@foreach($areas->listareas() as $area)
				<tr>
					<td>{{$area->nom_area}}</td>
					<td>{{$area->estado}}</td>
					<td>{{$area->obs_area}}</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				@endforeach
				
			</table>
			<div class="panel-footer" style="color: red;">
					
					{!!$areas->listareas()->render()!!}
			</div>
		</div>
	</div>
</div>