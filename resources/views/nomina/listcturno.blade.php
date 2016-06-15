<div  style="position:absolute; top:70%; z-index: 89;" class="col-xs-8">
	<div class="panel panel-primary class" >
		<div class="panel-heading" align="center">LISTADO CUADROS DE TURNO</div>
		<div class="col-md-2">&nbsp;</div>
		<div class="panel-body col-md-10" style="text-align: center;">
            <label class="col-md-3 control-label" style="padding-right: 0px; text-align: right;">Buscar Cuadros:</label>
            {!! Form::open(['method' => 'POST','route' => 'browcuadro']) !!}
            <div class="col-md-4">
                <input type="text" class="form-control" id="nomcuadro" name="nomcuadro" value="">
                <input type="hidden" id="idcuadro" name="idcuadro" value="0">  
            </div>
            <input type="submit" class="col-md-2 btn btn-small btn-primary"  value="Buscar">
            {!! Form::close() !!}

        </div>
        
		<div class="panel-body">
			<table class="table table-striped" style="width: 500px; " align="center">
				<tr>
					<th width="350px"  style="text-align: center;">Nombre del Cuadro</th>
					<th width="50px" style="text-align: center;">Estado</th>
					<th>&nbsp;</th>
					
				</tr>
				@inject('cuadros','App\Http\Controllers\CturnoController')

				@foreach($cuadros->list_cuadros() as $cuadro)
				<tr style="color:#AD4A4A;">
					<td>{{$cuadro->nomcuadro}}</td>
					<td>
					@if($cuadro->estado == 1)
					<span class="label label-success">Activo</span>
					@else
					<span class="label label-danger">Inactivo</span>
					@endif
					</td>
					<td><!-- <button type="button" name="modif" class="btn btn-small btn-warning" >Modificar</button> -->
						{!! Form::open(['method' => 'POST','route' => ['editcturno',$cuadro->id]]) !!}

    						<input type="submit" class="btn btn-small btn-warning"  value="Modificar" >
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
				
			</table>
					
					{!!$cuadros->list_cuadros()->render()!!}
			
		</div>
	</div>
</div>