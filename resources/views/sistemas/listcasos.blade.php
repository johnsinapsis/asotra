<div  style="position:absolute; top:130%; z-index: 89;" class="col-xs-8">
	<div class="panel panel-primary class" >
		<div class="panel-heading" align="center">LISTADO DIAS FESTIVOS</div>
		<div class="col-md-2">&nbsp;</div>
		<div class="panel-body col-md-10" style="text-align: center;">
            <label class="col-md-3 control-label" style="padding-right: 0px; text-align: right;">Buscar Festivo:</label>
            {!! Form::open(['method' => 'POST','route' => 'browfestivo']) !!}
            <div class="col-md-4">
                <input type="date" class="form-control" id="festivo" name="festivo" value="">
            </div>
            <input type="submit" class="col-md-2 btn btn-small btn-primary"  value="Buscar">
            {!! Form::close() !!}

        </div>
        
		<div class="panel-body">
			<table class="table table-striped" style="width: 600px; " align="center">
				<tr>
					<th width="300px"  style="text-align: center;">Nombre de la fiesta</th>
					<th width="100px" style="text-align: center;">Fecha</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					
				</tr>
				@inject('festivos','App\Http\Controllers\FestivoController')
				
					@if(isset($browfestivo_id))
				
				<tr style="color:#AD4A4A;">
					<td>{{$browfestivo_nom}}</td>
					<td>{{$browfestivo_fec}}</td>
					
					
					<td><!-- <button type="button" name="modif" class="btn btn-small btn-warning" >Modificar</button> -->
						{!! Form::open(['method' => 'POST','route' => ['editfestivo',$browfestivo_id]]) !!}

    						<input type="submit" class="btn btn-small btn-warning"  value="Modificar" >
						{!! Form::close() !!}
					</td>
					<td>
						<button type="button" name="eliminar_inf" id="eliminar_inf" class="btn btn-small btn-danger" onclick="eliminar_fest('{{$browfestivo_id}}')">Eliminar</button>
					</td>
				</tr>
				
				@else

				@foreach($festivos->list_festivos() as $festivo)
				<tr style="color:#AD4A4A;">
					<td align="center">{{$festivo->nomfiesta}}</td>
					<td>{{$festivo->fecha}}</td>
					<td><!-- <button type="button" name="modif" class="btn btn-small btn-warning" >Modificar</button> -->
						{!! Form::open(['method' => 'POST','route' => ['editfestivo',$festivo->id]]) !!}

    						<input type="submit" class="btn btn-small btn-warning"  value="Modificar" >
						{!! Form::close() !!}
					</td>
					<td>
						<button type="button" name="eliminar_inf" id="eliminar_inf" class="btn btn-small btn-danger" onclick="eliminar_fest('{{$festivo->id}}')">Eliminar</button>
					</td>
				</tr>
				@endforeach
				@endif
				
			</table>
					
					{!!$festivos->list_festivos()->render()!!}
			
		</div>
	</div>
</div>