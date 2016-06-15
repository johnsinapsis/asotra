<div  style="position:absolute; top:70%; z-index: 89;" class="col-xs-8">
	<div class="panel panel-primary class" >
		<div class="panel-heading" align="center">USUARIOS AUTORIZADOS CUADROS DE TURNO</div>
		<div class="col-md-2">&nbsp;</div>
		<div class="panel-body col-md-10" style="text-align: center;">
            <label class="col-md-3 control-label" style="padding-right: 0px; text-align: right;">Buscar Cuadros:</label>
            {!! Form::open(['method' => 'POST','route' => 'browcuadrorol']) !!}
            <div class="col-md-4">
                <input type="text" class="form-control" id="nomcuadro2" name="nomcuadro2" value="">
                <input type="hidden" id="idcuadro2" name="idcuadro2" value="0">  
            </div>
            <input type="submit" class="col-md-2 btn btn-small btn-primary"  value="Buscar">
            {!! Form::close() !!}

        </div>
        
		<div class="panel-body">
			<table class="table table-striped" style="width: 700px; " align="center">
				<tr>
					<th width="250px" style="text-align: center;">Nombre del Cuadro</th>
					<th width="300px" style="text-align: center;">Usuario</th>
					<th width="50px" style="text-align: center;">Rol</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					
				</tr>
				@inject('cuadros','App\Http\Controllers\CturnoRolController')

				@if(isset($browturno))
				@foreach($browturno as $cuadro)
				<tr style="color:#AD4A4A;">
					<td>{{$cuadro->nomcuadro}}</td>
					<td>{{$cuadro->name}}</td>
					<td>
					@if($cuadro->usu_rol == 1)
					<span class="label label-default">ELABORA</span>
					@endif
					@if($cuadro->usu_rol == 2)
					<span class="label label-primary">REVISA</span>
					@endif
					@if($cuadro->usu_rol == 3)
					<span class="label label-success">APRUEBA</span>
					@endif
					</td>
					
					<td><!-- <button type="button" name="modif" class="btn btn-small btn-warning" >Modificar</button> -->
						{!! Form::open(['method' => 'POST','route' => ['editcturnorol',$cuadro->id]]) !!}

    						<input type="submit" class="btn btn-small btn-warning"  value="Modificar" >
						{!! Form::close() !!}
					</td>
					<td>
						<button type="button" name="eliminar_inf" id="eliminar_inf" class="btn btn-small btn-danger" onclick="eliminar_usu('{{$cuadro->id}}')">Eliminar</button>
					</td>
				</tr>
				@endforeach
				@else
				@foreach($cuadros->list_usucuadro() as $cuadro)
				<tr style="color:#AD4A4A;">
					<td>{{$cuadro->nomcuadro}}</td>
					<td>{{$cuadro->name}}</td>
					<td>
					@if($cuadro->usu_rol == 1)
					<span class="label label-default">ELABORA</span>
					@endif
					@if($cuadro->usu_rol == 2)
					<span class="label label-primary">REVISA</span>
					@endif
					@if($cuadro->usu_rol == 3)
					<span class="label label-success">APRUEBA</span>
					@endif
					</td>
					
					<td><!-- <button type="button" name="modif" class="btn btn-small btn-warning" >Modificar</button> -->
						{!! Form::open(['method' => 'POST','route' => ['editcturnorol',$cuadro->id]]) !!}

    						<input type="submit" class="btn btn-small btn-warning"  value="Modificar" >
						{!! Form::close() !!}
					</td>
					<td>
						<button type="button" name="eliminar_inf" id="eliminar_inf" class="btn btn-small btn-danger" onclick="eliminar_usu('{{$cuadro->id}}')">Eliminar</button>
					</td>
				</tr>
				@endforeach
				@endif
				
			</table>
					
					{!!$cuadros->list_usucuadro()->render()!!}
			
		</div>
	</div>
</div>