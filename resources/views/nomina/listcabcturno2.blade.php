@extends('layout')
@section('content')
<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">LISTADO CUADROS DE TURNO</div>
						<div class="panel-body">
							
							@include('partials/errors')
							@include('partials/success')
							@include('partials/msg-ok')
							<div class="form-group">
								<table class="table table-striped" style="width: 700px; " align="center">
									<tr>
									    <th width="50px" style="text-align: center;">Año</th>
									    <th width="100px" style="text-align: center;">Mes</th>
										<th width="250px"  style="text-align: center;">Cuadro de Turno</th>
										
										<th width="150px">&nbsp;</th>

										 

									</tr>
									@inject('cuadros','App\Http\Controllers\CuadroTurCabController')

									
									
									@foreach($cuadros->list_cturnousu(Auth::user()->id,2,'C') as $cuadro)
									<tr style="color:#AD4A4A;">
										<td>{{$cuadro->ano}}</td>
										<td align="center">{{$cuadro->mes}}</td>
										<td align="center">{{$cuadro->nomcuadro}}</td>
										<td>
											 <input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
											
											 
											 <button type="button" name="rev_cturno" id="rev_cturno" class="btn btn-small btn-primary" onclick="window.location.href = 'cuadroturrev/{{$cuadro->id}}'">
											 Revisar
											 </button> 
											 
											 
										</td>
										
									</tr>
									@endforeach
									
								</table>
									{!!$cuadros->list_cturnousu(Auth::user()->id,1,'E')->render()!!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection