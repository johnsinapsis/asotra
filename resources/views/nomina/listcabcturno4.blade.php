@extends('layout')
@section('content')
<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">LISTADO CUADROS DE TURNO</div>
						<div class="panel-body">
							
							
							<div class="form-group">
								<table class="table table-striped" style="width: 700px; " align="center">
									<tr>
									    <th width="50px" style="text-align: center;">Año</th>
									    <th width="100px" style="text-align: center;">Mes</th>
										<th width="250px"  style="text-align: center;">Cuadro de Turno</th>
										
										<th width="150px">&nbsp;</th>
										

										 

									</tr>
									@inject('cuadros','App\Http\Controllers\CuadroTurCabController')

									
									
									@foreach($cuadros->list_cturnoimp(Auth::user()->id) as $cuadro)
									<tr style="color:#AD4A4A;">
										<td>{{$cuadro->ano}}</td>
										<td align="center">{{$cuadro->mes}}</td>
										<td align="center">{{$cuadro->nomcuadro}}</td>
										
										     
										<td>
											 <input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
											
											 @if(isset($cambio))
											 <button type="button" name="rev_cturno" id="rev_cturno" class="btn btn-small btn-default" onclick="window.location.href = 'ccambio/{{$cuadro->id}}'">
											 Aceptar
											 </button> 
											 @else
											 <button type="button" name="imp_cturno" id="imp_cturno" class="btn btn-small btn-info" onclick="window.open ('cuadroturimp/{{$cuadro->id}}','_blank')">
											 Imprimir
											 </button> 
											 @endif
											 
										</td>
											
										
										
										
									</tr>
									@endforeach
									
								</table>
									{!!$cuadros->list_cturnoimp(Auth::user()->id)->render()!!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection