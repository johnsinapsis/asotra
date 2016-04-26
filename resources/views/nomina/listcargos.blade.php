<div  style="position:absolute; top:70%; z-index: 89;" class="col-xs-8">
	<div class="panel panel-primary class" >
		<div class="panel-heading" align="center">LISTADO CARGOS</div>
		<div class="col-md-2">&nbsp;</div>
		<div class="panel-body col-md-10" style="text-align: center;">
            <label class="col-md-2 control-label" style="padding-right: 0px; text-align: right;">Buscar Cargo:</label>
            {!! Form::open(['method' => 'POST','route' => 'browcargo']) !!}
            <div class="col-md-4">
                <input type="text" class="form-control" id="nomcargo2" name="nomcargo2" value="">
                <input type="hidden" id="idcargo2" name="idcargo2" value="0">  
            </div>
            <input type="submit" class="col-md-2 btn btn-small btn-primary"  value="Buscar">
            {!! Form::close() !!}

        </div>
        
		<div class="panel-body">
			<table class="table table-striped" style="width: 700px; " align="center">
				<tr>
					<th width="20px" style="text-align: center;">Código</th>
					<th width="250px"  style="text-align: center;">Nombre del cargo</th>
					<th width="250px" style="text-align: center;">Cargo Jefe</th>
					<th>&nbsp;</th>
					
				</tr>
				@inject('cargos','App\Http\Controllers\CargoController')

				@foreach($cargos->list_cargo() as $cargo)
				<tr style="color:#AD4A4A;">
					<td>{{$cargo->id}}</td>
					<td>{{$cargo->nomcargo}}</td>
					<td>{{$cargo->nomjefe}}</td>
					<td><!-- <button type="button" name="modif" class="btn btn-small btn-warning" >Modificar</button> -->
						{!! Form::open(['method' => 'POST','route' => ['editcargo',$cargo->id]]) !!}

    						<input type="submit" class="btn btn-small btn-warning"  value="Modificar">
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
				
			</table>
					
					{!!$cargos->list_cargo()->render()!!}
			
		</div>
	</div>
</div>