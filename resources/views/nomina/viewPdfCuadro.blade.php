<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Cuadro</title>
    {!! Html::style('css/pdfcuadro.css') !!}
   

</head>

<body>

<div>
    {!! Html::image('images/asotrauma.png', "User image", array('class' => 'marcborde')) !!}
</div>

@if ($mes === 1)
                                   {{--*/ $nommes = "ENERO" /*--}}
                                @elseif ($mes == 2)
                                   {{--*/ $nommes = "FEBRERO" /*--}}
                                @elseif ($mes == 3)
                                   {{--*/ $nommes = "MARZO" /*--}}
                                @elseif ($mes == 4)
                                   {{--*/ $nommes = "ABRIL" /*--}}
                                @elseif ($mes == 5)
                                   {{--*/ $nommes = "MAYO" /*--}}
                                @elseif ($mes == 6)
                                   {{--*/ $nommes = "JUNIO" /*--}}
                                @elseif ($mes == 7)
                                   {{--*/ $nommes = "JULIO" /*--}}
                                @elseif ($mes == 8)
                                   {{--*/ $nommes = "AGOSTO" /*--}}
                                @elseif ($mes == 9)
                                   {{--*/ $nommes = "SEPTIEMBRE" /*--}}
                                @elseif ($mes == 10)
                                   {{--*/ $nommes = "OCTUBRE" /*--}}
                                @elseif ($mes == 11)
                                   {{--*/ $nommes = "NOVIEMBRE" /*--}}
                                @else
                                   {{--*/ $nommes = "DICIEMBRE" /*--}}
                                @endif
                           
                           <h3 align="center" style="color:red;" >CUADRO DE TURNO {{$cuadro_nom}}  AÑO:{{$ano}}  MES:{{$nommes}}</h3>
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
			{{--*/   $arrayfest[$i] = $fest->dia /*--}}
			{{--*/   $i ++ /*--}}
     @endforeach
	<br>
	<table class="table" style="width: 900px; " align="center" border="1">
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
			@for($j = 0; $j < $lastday; $j++)
		    {{--*/   $arrayturno[$j] = 0 /*--}}
		    {{--*/   $arrayabr[$j]   = ""/*--}}
		    {{--*/   $arrayhdo[$j]   =  0 /*--}}
		    {{--*/   $arrayhno[$j]   =  0/*--}}
		    {{--*/   $arrayhdf[$j]   =  0/*--}}
		    {{--*/   $arrayhnf[$j]   =  0/*--}}
		    @endfor
			@foreach($turnosemp->list_emple_dia($emp->id_emp, $cuadro_id) as $tur)
			{{--*/   $arrayturno[$i] = $tur->numdia /*--}}
			{{--*/   $arrayabr[$i]   = $tur->abr /*--}}
			{{--*/   $band   = 1 /*--}}
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
			{{--*/   $arrayhdf[$i]   = $numhoras->tot_horas_turno($tur->id_horario,$tur->dia,3)+0 /*--}}
			{{--*/   $arrayhnf[$i]   = $numhoras->tot_horas_turno($tur->id_horario,$tur->dia,4)+0 /*--}}
			{{--*/   $i ++ /*--}}
			@endforeach
			
		
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
<br><br>
@inject('usus','App\Http\Controllers\CuadroTurCabController') 
<div class="form-group" > 
	<div class="elabora">
	<strong>ELABORA:&nbsp;</strong>
	@foreach($usus->show($cuadro_id) as $usu)
	{{$usu->nomela}}
	@endforeach
	&nbsp;&nbsp;&nbsp;
	<strong>REVISA:&nbsp;</strong>
	@foreach($usus->show($cuadro_id) as $usu)
	{{$usu->nomerevi}}
	@endforeach

	&nbsp;&nbsp;&nbsp;
	<strong>APRUEBA:&nbsp;</strong>
	@foreach($usus->show($cuadro_id) as $usu)
	{{$usu->nomeapru}}
	@endforeach
	</div>
	
</div>
</body>
</html>