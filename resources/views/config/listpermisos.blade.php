<div  style="position:absolute; top:40%; z-index: 89;" class="col-xs-8">
	<div class="panel panel-primary class" >
		@if(isset($perfil_id))
		<div class="panel-heading" align="center">Listado Permisos {{$perfil_nom}}</div>
		<div class="col-md-2">&nbsp;</div>
		
        
		<div class="panel-body">
			<table class="table table-striped" style="width: 500px; " align="center">
				<tr>
					<th width="50px"  style="text-align: center;">Id</th>
					<th width="150px" style="text-align: center;">Función</th>
					<th width="50px"  style="text-align: center;">Nivel</th>
					<th width="50px"  style="text-align: center;">Mayor</th>
					<th>&nbsp;</th>
					
					
				</tr>
				
				

				@foreach($permiso as $per)
				<tr style="color:#AD4A4A;">
					<td align="center">{{$per->id_funcion}}</td>
					<td>{{$per->nomfuncion}}</td>
					<td style="text-align: center;">{{$per->nivel}}</td>
					<td style="text-align: center;">{{$per->mayor}}</td>
					
					<td>
						<button type="button" name="eliminar_inf" id="eliminar_inf" class="btn btn-small btn-danger" onclick="eliminar_perm('{{$perfil_id}}','{{$per->id_funcion}}')">Eliminar</button>
					</td>
				</tr>
				@endforeach
				
				
			</table>
					
					
			
		</div>
		@endif
	</div>
</div>