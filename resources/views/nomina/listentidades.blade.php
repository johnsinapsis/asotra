<div  style="position:absolute; top:70%; z-index: 89;" class="col-xs-8">
	<div class="panel panel-primary class" >
		<div class="panel-heading" align="center">LISTADO ENTIDADES</div>
		<div class="col-md-2">&nbsp;</div>
		<div class="panel-body col-md-10" style="text-align: center;">
            <label class="col-md-3 control-label" style="padding-right: 0px; text-align: right;">Buscar Entidades:</label>
            {!! Form::open(['method' => 'POST','route' => 'brownomenti']) !!}
            <div class="col-md-4">
                <input type="text" class="form-control" id="nomentidad" name="nomentidad" value="">
                <input type="hidden" id="ident" name="ident" value="0">  
            </div>
            <input type="submit" class="col-md-2 btn btn-small btn-primary"  value="Buscar">
            {!! Form::close() !!}

        </div>
        
		<div class="panel-body">
			<table class="table table-striped" style="width: 700px; " align="center">
				<tr>
					<th width="20px" style="text-align: center;">Nit</th>
					<th width="250px"  style="text-align: center;">Nombre de la Entidad</th>
					<th width="250px" style="text-align: center;">Tipo</th>
					<th>&nbsp;</th>
					
				</tr>
				@inject('entinom','App\Http\Controllers\EntiNominaController')

				@foreach($entinom->list_entidades() as $ent)
				<tr style="color:#AD4A4A;">
					<td>{{$ent->nit}}</td>
					<td>{{$ent->nombre}}</td>
					<td>{{$ent->tipo}}</td>
					<td><!-- <button type="button" name="modif" class="btn btn-small btn-warning" >Modificar</button> -->
						{!! Form::open(['method' => 'POST','route' => ['editnomenti',$ent->nit]]) !!}

    						<input type="submit" class="btn btn-small btn-warning"  value="Modificar">
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
				
			</table>
					
					{!!$entinom->list_entidades()->render()!!}
			
		</div>
	</div>
</div>