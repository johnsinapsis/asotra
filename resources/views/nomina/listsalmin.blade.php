<div  style="position:absolute; top:70%; z-index: 89;" class="col-xs-8">
	<div class="panel panel-primary class" >
		<div class="panel-heading" align="center">LISTADO SALARIOS MINIMOS ANUALES</div>
		<div class="col-md-2">&nbsp;</div>
		
        
		<div class="panel-body">
			<table class="table table-striped" style="width: 500px; " align="center">
				<tr>
					<th width="20px" style="text-align: center;">Año</th>
					<th width="150px" style="text-align: center;">V/r Salario Mínimo</th>
					<th width="150px" style="text-align: center;">V/r Aux. Transporte</th>
					<th>&nbsp;</th>
					
				</tr>
				@inject('salmins','App\Http\Controllers\SalminController')

				@foreach($salmins->list_salmin() as $salmin)
				<tr style="color:#AD4A4A;">
					<td>{{$salmin->salano}}</td>
					<td align="right">{{number_format($salmin->salmin)}}</td>
					<td align="right">{{number_format($salmin->salauxtra)}}</td>
					<td><!-- <button type="button" name="modif" class="btn btn-small btn-warning" >Modificar</button> -->
						{!! Form::open(['method' => 'POST','route' => ['editsalmin',$salmin->salano]]) !!}

    						<input type="submit" class="btn btn-small btn-warning"  value="Modificar">
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
				
			</table>
					
					{!!$salmins->list_salmin()->render()!!}
			
		</div>
	</div>
</div>