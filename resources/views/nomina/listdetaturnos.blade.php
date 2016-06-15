<div  style="position:absolute; top:70%; z-index: 89;" class="col-xs-8">
	<div class="panel panel-primary class" >
		<div class="panel-heading" align="center">LISTADO TURNOS  AÑO: {{$ano}}  MES: {{$nommes}} {{$nom_emp}}</div>
		
		<div class="panel-body">
			<table class="table table-striped" style="width: 700px; " align="center">
				<tr>
					<th width="20px" style="text-align: center;">COD</th>
					<th width="250px"  style="text-align: center;">Nombre horario</th>
					<th width="50px" style="text-align: center;">Dia Mes</th>
					<th width="50px" style="text-align: center;">Dia Sem</th>
					<th>&nbsp;</th>
					
				</tr>
				@inject('cturno','App\Http\Controllers\CuadroTurDetController')

				@foreach($cturno->list_empt_tur($cuadro_id,$id_emp) as $turno)
				<tr style="color:#AD4A4A;">
					<td>{{$turno->abr}}</td>
					<td>{{$turno->nomhorario}}</td>
					<td>{{$turno->numdia}}</td>
					<td>{{$turno->dia}}</td>
					<td><!-- <button type="button" name="modif" class="btn btn-small btn-warning" >Modificar</button> -->
						<button type="button" name="eliminar_inf" id="eliminar_inf" class="btn btn-small btn-danger" onclick="eliminar_tur('{{$cuadro_id}}','{{$id_emp}}','{{$turno->id_horario}}','{{$turno->numdia}}')">Eliminar</button>
					</td>
				</tr>
				@endforeach
				
			</table>
					
					
			
		</div>
	</div>
</div>