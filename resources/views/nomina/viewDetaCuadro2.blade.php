<div class="form-group" >
	 {{--*/ $fecha = "01/".$mes."/".$ano /*--}}
	 {{--*/ $date  = Carbon\Carbon::createFromFormat('d/m/Y',$fecha) /*--}}
	 {{--*/   $day =  $date->format('l') /*--}}
	 {{--*/   $nextmonth =  $date->addMonth() /*--}}
	 {{--*/   $lastdateday   =  $date->subDay() /*--}}
	 {{--*/   $lastday =  $date->format('d')+0 /*--}}
	 
	 @if ($day== "Monday")
        {{--*/ $dia = 'l'; /*--}}
        {{--*/ $band = 0 /*--}}
     @elseif ($day== "Tuesday")
        {{--*/ $dia = 'm' /*--}}
        {{--*/ $band = 1 /*--}}
     @elseif ($day== "Wednesday")
        {{--*/ $dia = 'x' /*--}}
        {{--*/ $band = 2 /*--}}
     @elseif ($day== "Thursday")
        {{--*/ $dia = 'j' /*--}}
        {{--*/ $band = 3 /*--}}
     @elseif ($day== "Friday")
        {{--*/ $dia = 'v' /*--}}
        {{--*/ $band = 4 /*--}}
     @elseif ($day== "Saturday")
        {{--*/ $dia = 's' /*--}}
        {{--*/ $band = 5 /*--}}
     @else
        {{--*/ $dia = 'd' /*--}}
        {{--*/ $band = 6 /*--}}
     @endif

     {{--*/   $arrayday[0] = 'L' /*--}}
     {{--*/   $arrayday[1] = 'M' /*--}}
     {{--*/   $arrayday[2] = 'X' /*--}}
     {{--*/   $arrayday[3] = 'J' /*--}}
     {{--*/   $arrayday[4] = 'V' /*--}}
     {{--*/   $arrayday[5] = 'S' /*--}}
     {{--*/   $arrayday[6] = 'D' /*--}}

	 
     @if($band==6)
     {{--*/ $primdom = 1 /*--}}
     @endif
     @if($band==0)
     {{--*/ $primdom = 7 /*--}}
     @endif
     @if($band==1)
     {{--*/ $primdom = 6 /*--}}
     @endif
     @if($band==2)
     {{--*/ $primdom = 5 /*--}}
     @endif
     @if($band==3)
     {{--*/ $primdom = 4 /*--}}
     @endif
     @if($band==4)
     {{--*/ $primdom = 3 /*--}}
     @endif
     @if($band==5)
     {{--*/ $primdom = 2 /*--}}
     @endif

      {{--*/ $segdom = $primdom+7 /*--}}
      {{--*/ $terdom = $segdom+7 /*--}}
      {{--*/ $cuardom = $terdom+7 /*--}}
      {{--*/ $quindom = $cuardom+7 /*--}}


     @inject('festivos','App\Http\Controllers\FestivoController') 

     {{--*/ $i = 0 /*--}}
     @foreach($festivos->list_fest_ym($ano,$mes) as $fest)
			{{--*/   $arrayfest[$i] = $fest->dia+0 /*--}}
			{{--*/   $i ++ /*--}}
     @endforeach
	
	<table class="table table-striped" style="width: 1150px; " align="center" border="1">
		<tr>
			<th width="100px" style="font-size:10px;">Empleado</th>
			@for ($i = 0; $i < $lastday; $i++)
				{{--*/ $dia = $i+1  /*--}}
				@for($j = 0; $j < count($arrayfest); $j++)
					@if($dia == $arrayfest[$j])
					{{--*/ $fondo = "background-color:#CBE53A;"  /*--}}
					{{--*/ $j = count($arrayfest)  /*--}}
					@else
					 {{--*/ $fondo = ""  /*--}}
					@endif
				@endfor
				{{--*/ $fec =  Carbon\Carbon::createFromFormat('d/m/Y',$dia."/".$mes."/".$ano) /*--}}
				{{--*/ $day =  $fec->format('l') /*--}}
				@if ($day== "Sunday")
				{{--*/ $fondo = "background-color:#CBE53A;"  /*--}}
				
				@endif
			  	<th width="10px"  style="text-align: center; font-size:10px; {{$fondo}}">{{$dia}}</th>
			@endfor
					
		</tr>
		<tr>
			<th width="100px">&nbsp;</th>
			@for ($i = 0; $i < $lastday; $i++)
			  	{{--*/ $dia = $i+1  /*--}}
				@for($j = 0; $j < count($arrayfest); $j++)
					@if($dia == $arrayfest[$j])
					{{--*/ $fondo = "background-color:#CBE53A;"  /*--}}
					{{--*/ $j = count($arrayfest)  /*--}}
					@else
					 {{--*/ $fondo = ""  /*--}}
					@endif
				@endfor
				{{--*/ $fec =  Carbon\Carbon::createFromFormat('d/m/Y',$dia."/".$mes."/".$ano) /*--}}
				{{--*/ $day =  $fec->format('l') /*--}}
				@if ($day== "Sunday")
				{{--*/ $fondo = "background-color:#CBE53A;"  /*--}}
				@endif
			  	<th width="10px"  style="text-align: center; font-size:10px; {{$fondo}}">{{$arrayday[$band]}}</th>
			  	@if($band==6)
			  		{{--*/$band = 0/*--}}
			  	@else
			  		{{--*/$band ++/*--}}
			  	@endif
			@endfor
		</tr>

		@inject('turnosemp','App\Http\Controllers\CuadroTurDetController') 
		{{--*/   $arrayturno[0] = "" /*--}}
		{{--*/   $arrayabr[0]   = ""/*--}}
		{{--*/   $x  = 0/*--}}
		
		
		@inject('numhoras','App\Http\Controllers\HorarioDetController') 
		
		@foreach($turnosemp->list_emple_tur($cuadro_id) as $emp)
		<tr>
			<th width="100px" style="font-size:10px;">
			<a id="emptur{{$x}}"  style="cursor: pointer;" >{{$emp->nombre}}</a>
			</th>

			@for($l=0;$l<5;$l++)
			{{--*/   $hdo[$l]  = 0/*--}}
			{{--*/   $hno[$l]  = 0/*--}}
			{{--*/   $hdf[$l]  = 0/*--}}
			{{--*/   $hnf[$l]  = 0/*--}}
			@endfor
			
			
			{{--*/ $celda = "" /*--}}
			{{--*/ $i = 0 /*--}}
			@for($j = 0; $j <= $lastday; $j++)
		    {{--*/   $arrayturno[$j] = 0 /*--}}
		    {{--*/   $arrayabr[$j]   = ""/*--}}
		    {{--*/   $arrayhdo[$j]   =  0 /*--}}
		    {{--*/   $arrayhno[$j]   =  0/*--}}
		    {{--*/   $arrayhdf[$j]   =  0/*--}}
		    {{--*/   $arrayhnf[$j]   =  0/*--}}
		    @endfor
		     {{--*/   $xyz   = "pailas" /*--}}
			@foreach($turnosemp->list_emple_dia($emp->id_emp, $cuadro_id) as $tur)
			{{--*/   $arrayturno[$i] = $tur->numdia /*--}}
			{{--*/   $arrayabr[$i]   = $tur->abr /*--}}
			{{--*/   $band   = 1 /*--}}
			@if($arrayfest[0] == $tur->numdia)
			  {{--*/   $xyz   = "valida que es 6" /*--}}
			@endif
			
			@for($j = 0; $j < count($arrayfest); $j++)
					@if($tur->numdia == $arrayfest[$j])
					{{--*/   $band   = 0 /*--}}
					 {{--*/ $j = count($arrayfest)  /*--}}

					@endif
			@endfor
			@if($band==1)
			{{--*/   $arrayhdo[$i]   = $numhoras->tot_horas_turno($tur->id_horario,$tur->dia,1)+0 /*--}}
			{{--*/   $arrayhno[$i]   = $numhoras->tot_horas_turno($tur->id_horario,$tur->dia,2)+0 /*--}}
			@else
			{{--*/   $arrayhdf[$i]   = $numhoras->tot_horas_turno($tur->id_horario,$tur->dia,1)+0 /*--}}
			{{--*/   $arrayhnf[$i]   = $numhoras->tot_horas_turno($tur->id_horario,$tur->dia,2)+0 /*--}}
			@endif
			{{--*/   $arrayhdf[$i]   = $numhoras->tot_horas_turno($tur->id_horario,$tur->dia,3)+ $arrayhdf[$i] /*--}}
			{{--*/   $arrayhnf[$i]   = $numhoras->tot_horas_turno($tur->id_horario,$tur->dia,4)+ $arrayhnf[$i] /*--}}
			{{--*/   $i ++ /*--}}
			@endforeach
			
			<div id="detaemptur{{$x}}" title="Total horas por semana">
				@for($k=0; $k < count($arrayhdo); $k++)
					@if($arrayturno[$k]>$primdom)
						{{--*/ $l = $k /*--}}
						{{--*/ $k = count($arrayhdo)  /*--}}
					@else
					{{--*/   $hdo[0] = $hdo[0] + $arrayhdo[$k] /*--}}
					{{--*/   $hno[0] = $hno[0] + $arrayhno[$k] /*--}}
					{{--*/   $hdf[0] = $hdf[0] + $arrayhdf[$k] /*--}}
					{{--*/   $hnf[0] = $hnf[0] + $arrayhnf[$k] /*--}}
					{{--*/ $l = $k+1  /*--}}
					@endif
				@endfor
				@for($k=$l; $k< count($arrayhdo); $k++)
					@if($arrayturno[$k]>$segdom)
						{{--*/ $l = $k  /*--}}
						{{--*/ $k = count($arrayhdo)  /*--}}
					@else
					{{--*/   $hdo[1] = $hdo[1] + $arrayhdo[$k] /*--}}
					{{--*/   $hno[1] = $hno[1] + $arrayhno[$k] /*--}}
					{{--*/   $hdf[1] = $hdf[1] + $arrayhdf[$k] /*--}}
					{{--*/   $hnf[1] = $hnf[1] + $arrayhnf[$k] /*--}}
					{{--*/ $l = $k+1  /*--}}
					@endif
					
				@endfor
				
				@for($k=$l; $k< count($arrayhdo); $k++)
					@if($arrayturno[$k]>$terdom)
						{{--*/ $l = $k  /*--}}
						{{--*/ $k = count($arrayhdo)  /*--}}
					@else
					{{--*/   $hdo[2] = $hdo[2] + $arrayhdo[$k] /*--}}
					{{--*/   $hno[2] = $hno[2] + $arrayhno[$k] /*--}}
					{{--*/   $hdf[2] = $hdf[2] + $arrayhdf[$k] /*--}}
					{{--*/   $hnf[2] = $hnf[2] + $arrayhnf[$k] /*--}}
					{{--*/ $l = $k+1  /*--}}
					@endif
					
				@endfor

				@if($cuardom<=$lastday)
				@for($k=$l; $k< count($arrayhdo); $k++)
					@if($arrayturno[$k]>$cuardom)
						{{--*/ $l = $k  /*--}}
						{{--*/ $k = count($arrayhdo)  /*--}}
					@else
					{{--*/   $hdo[3] = $hdo[3] + $arrayhdo[$k] /*--}}
					{{--*/   $hno[3] = $hno[3] + $arrayhno[$k] /*--}}
					{{--*/   $hdf[3] = $hdf[3] + $arrayhdf[$k] /*--}}
					{{--*/   $hnf[3] = $hnf[3] + $arrayhnf[$k] /*--}}
					{{--*/ $l = $k+1  /*--}}
					@endif
					
				@endfor

				@endif

				@if($quindom<=$lastday)
				@for($k=$l; $k< count($arrayhdo); $k++)
					@if($arrayturno[$k]>$cuardom)
						{{--*/ $l = $k  /*--}}
						{{--*/ $k = count($arrayhdo)  /*--}}
					@else
					{{--*/   $hdo[4] = $hdo[4] + $arrayhdo[$k] /*--}}
					{{--*/   $hno[4] = $hno[4] + $arrayhno[$k] /*--}}
					{{--*/   $hdf[4] = $hdf[4] + $arrayhdf[$k] /*--}}
					{{--*/   $hnf[4] = $hnf[4] + $arrayhnf[$k] /*--}}
					{{--*/ $l = $k+1  /*--}}
					@endif
					
				@endfor
				@else
				@for($k=$l; $k< count($arrayhdo); $k++)
					{{--*/   $hdo[4] = $hdo[4] + $arrayhdo[$k] /*--}}
					{{--*/   $hno[4] = $hno[4] + $arrayhno[$k] /*--}}
					{{--*/   $hdf[4] = $hdf[4] + $arrayhdf[$k] /*--}}
					{{--*/   $hnf[4] = $hnf[4] + $arrayhnf[$k] /*--}}
				@endfor
				@endif
				
				
				<strong style="color:#1289DD">{{$emp->nombre}}</strong><br>
				<strong>Semana 1:</strong><br>
				Total HDO: {{$hdo[0] }}
				Total HNO: {{$hno[0] }} <br>
				Total HDF: {{$hdf[0] }}
				Total HNF: {{$hnf[0] }} <br>
				<strong>Semana 2: </strong><br>
				Total HDO: {{$hdo[1] }}
				Total HNO: {{$hno[1] }} <br>
				Total HDF: {{$hdf[1]}}
				Total HNF: {{$hnf[1] }} <br>
				<strong>Semana 3: </strong><br>
				Total HDO: {{$hdo[2] }}
				Total HNO: {{$hno[2] }} <br>
				Total HDF: {{$hdf[2] }}
				Total HNF: {{$hnf[2] }} <br>
				<strong>Semana 4: </strong><br>
				Total HDO: {{$hdo[3] }}
				Total HNO: {{$hno[3] }} <br>
				Total HDF: {{$hdf[3] }}
				Total HNF: {{$hnf[3] }} <br>
				<strong>Semana 5: </strong><br>
				Total HDO: {{$hdo[3] }}
				Total HNO: {{$hno[3] }} <br>
				Total HDF: {{$hdf[3] }}
				Total HNF: {{$hnf[3] }} <br>
				
			</div>
			{{--*/   $x ++/*--}}

			@for ($i = 0; $i < $lastday; $i++)
				{{--*/ $dia = $i+1  /*--}}
				@for($j = 0; $j < count($arrayfest); $j++)
					@if($dia == $arrayfest[$j])
					{{--*/ $fondo = "background-color:#CBE53A;"  /*--}}
					 {{--*/ $j = count($arrayfest)  /*--}}
					@else
					 {{--*/ $fondo = ""  /*--}}
					@endif
				@endfor
				{{--*/ $fec =  Carbon\Carbon::createFromFormat('d/m/Y',$dia."/".$mes."/".$ano) /*--}}
				{{--*/ $day =  $fec->format('l') /*--}}
				@if ($day== "Sunday")
				{{--*/ $fondo = "background-color:#CBE53A;"  /*--}}
				
				@endif
			  	
			  	@for($j = 0; $j < count($arrayturno); $j++)
			  		@if($dia == $arrayturno[$j])
			  			{{--*/ $celda = "$arrayabr[$j]" /*--}}
			  			@if($dia == $arrayturno[$j+1])
			  				{{--*/ $celda = $celda." ".$arrayabr[$j+1] /*--}}
			  			@endif
			  			{{--*/ $j = count($arrayturno)  /*--}}
			  		@else
			  		{{--*/ $celda = "" /*--}}
			  		@endif
			  	@endfor
			  	<th width="10px"  style="text-align: center; font-size:10px; {{$fondo}}">{{$celda}}</th>
			@endfor

		</tr>

		@endforeach

	</table>
</div>