
@if(isset($horario_id))

@else
@for ($hora = 0; $hora < 24; $hora++)
{{--*/ $lunes[$hora]=old('l'.$hora) /*--}}
{{--*/ $martes[$hora]=old('m'.$hora) /*--}}
{{--*/ $miercoles[$hora]=old('x'.$hora) /*--}}
{{--*/ $jueves[$hora]=old('j'.$hora) /*--}}
{{--*/ $viernes[$hora]=old('v'.$hora) /*--}}
{{--*/ $sabado[$hora]=old('s'.$hora) /*--}}
{{--*/ $domingo[$hora]=old('d'.$hora) /*--}}
@endfor
@endif


<div class="form-group" >
	<input type="hidden" name="l0" id="l0" class="form-control" value="{{$lunes[0]}}">
	<input type="hidden" name="l1" id="l1" class="form-control" value="{{$lunes[1]}}">
	<input type="hidden" name="l2" id="l2" class="form-control" value="{{$lunes[2]}}">
	<input type="hidden" name="l3" id="l3" class="form-control" value="{{$lunes[3]}}">
	<input type="hidden" name="l4" id="l4" class="form-control" value="{{$lunes[4]}}">
	<input type="hidden" name="l5" id="l5" class="form-control" value="{{$lunes[5]}}">
	<input type="hidden" name="l6" id="l6" class="form-control" value="{{$lunes[6]}}">
	<input type="hidden" name="l7" id="l7" class="form-control" value="{{$lunes[7]}}">
	<input type="hidden" name="l8" id="l8" class="form-control" value="{{$lunes[8]}}">
	<input type="hidden" name="l9" id="l9" class="form-control" value="{{$lunes[9]}}">
	<input type="hidden" name="l10" id="l10" class="form-control" value="{{$lunes[10]}}">
	<input type="hidden" name="l11" id="l11" class="form-control" value="{{$lunes[11]}}">
	<input type="hidden" name="l12" id="l12" class="form-control" value="{{$lunes[12]}}">
	<input type="hidden" name="l13" id="l13" class="form-control" value="{{$lunes[13]}}">
	<input type="hidden" name="l14" id="l14" class="form-control" value="{{$lunes[14]}}">
	<input type="hidden" name="l15" id="l15" class="form-control" value="{{$lunes[15]}}">
	<input type="hidden" name="l16" id="l16" class="form-control" value="{{$lunes[16]}}">
	<input type="hidden" name="l17" id="l17" class="form-control" value="{{$lunes[17]}}">
	<input type="hidden" name="l18" id="l18" class="form-control" value="{{$lunes[18]}}">
	<input type="hidden" name="l19" id="l19" class="form-control" value="{{$lunes[19]}}">
	<input type="hidden" name="l20" id="l20" class="form-control" value="{{$lunes[20]}}">
	<input type="hidden" name="l21" id="l21" class="form-control" value="{{$lunes[21]}}">
	<input type="hidden" name="l22" id="l22" class="form-control" value="{{$lunes[22]}}">
	<input type="hidden" name="l23" id="l23" class="form-control" value="{{$lunes[23]}}">
	<input type="hidden" name="m0" id="m0" class="form-control" value="{{$martes[0]}}">
	<input type="hidden" name="m1" id="m1" class="form-control" value="{{$martes[1]}}">
	<input type="hidden" name="m2" id="m2" class="form-control" value="{{$martes[2]}}">
	<input type="hidden" name="m3" id="m3" class="form-control" value="{{$martes[3]}}">
	<input type="hidden" name="m4" id="m4" class="form-control" value="{{$martes[4]}}">
	<input type="hidden" name="m5" id="m5" class="form-control" value="{{$martes[5]}}">
	<input type="hidden" name="m6" id="m6" class="form-control" value="{{$martes[6]}}">
	<input type="hidden" name="m7" id="m7" class="form-control" value="{{$martes[7]}}">
	<input type="hidden" name="m8" id="m8" class="form-control" value="{{$martes[8]}}">
	<input type="hidden" name="m9" id="m9" class="form-control" value="{{$martes[9]}}">
	<input type="hidden" name="m10" id="m10" class="form-control" value="{{$martes[10]}}">
	<input type="hidden" name="m11" id="m11" class="form-control" value="{{$martes[11]}}">
	<input type="hidden" name="m12" id="m12" class="form-control" value="{{$martes[12]}}">
	<input type="hidden" name="m13" id="m13" class="form-control" value="{{$martes[13]}}">
	<input type="hidden" name="m14" id="m14" class="form-control" value="{{$martes[14]}}">
	<input type="hidden" name="m15" id="m15" class="form-control" value="{{$martes[15]}}">
	<input type="hidden" name="m16" id="m16" class="form-control" value="{{$martes[16]}}">
	<input type="hidden" name="m17" id="m17" class="form-control" value="{{$martes[17]}}">
	<input type="hidden" name="m18" id="m18" class="form-control" value="{{$martes[18]}}">
	<input type="hidden" name="m19" id="m19" class="form-control" value="{{$martes[19]}}">
	<input type="hidden" name="m20" id="m20" class="form-control" value="{{$martes[20]}}">
	<input type="hidden" name="m21" id="m21" class="form-control" value="{{$martes[21]}}">
	<input type="hidden" name="m22" id="m22" class="form-control" value="{{$martes[22]}}">
	<input type="hidden" name="m23" id="m23" class="form-control" value="{{$martes[23]}}">
	<input type="hidden" name="x0" id="x0" class="form-control" value="{{$miercoles[0]}}">
	<input type="hidden" name="x1" id="x1" class="form-control" value="{{$miercoles[1]}}">
	<input type="hidden" name="x2" id="x2" class="form-control" value="{{$miercoles[2]}}">
	<input type="hidden" name="x3" id="x3" class="form-control" value="{{$miercoles[3]}}">
	<input type="hidden" name="x4" id="x4" class="form-control" value="{{$miercoles[4]}}">
	<input type="hidden" name="x5" id="x5" class="form-control" value="{{$miercoles[5]}}">
	<input type="hidden" name="x6" id="x6" class="form-control" value="{{$miercoles[6]}}">
	<input type="hidden" name="x7" id="x7" class="form-control" value="{{$miercoles[7]}}">
	<input type="hidden" name="x8" id="x8" class="form-control" value="{{$miercoles[8]}}">
	<input type="hidden" name="x9" id="x9" class="form-control" value="{{$miercoles[9]}}">
	<input type="hidden" name="x10" id="x10" class="form-control" value="{{$miercoles[10]}}">
	<input type="hidden" name="x11" id="x11" class="form-control" value="{{$miercoles[11]}}">
	<input type="hidden" name="x12" id="x12" class="form-control" value="{{$miercoles[12]}}">
	<input type="hidden" name="x13" id="x13" class="form-control" value="{{$miercoles[13]}}">
	<input type="hidden" name="x14" id="x14" class="form-control" value="{{$miercoles[14]}}">
	<input type="hidden" name="x15" id="x15" class="form-control" value="{{$miercoles[15]}}">
	<input type="hidden" name="x16" id="x16" class="form-control" value="{{$miercoles[16]}}">
	<input type="hidden" name="x17" id="x17" class="form-control" value="{{$miercoles[17]}}">
	<input type="hidden" name="x18" id="x18" class="form-control" value="{{$miercoles[18]}}">
	<input type="hidden" name="x19" id="x19" class="form-control" value="{{$miercoles[19]}}">
	<input type="hidden" name="x20" id="x20" class="form-control" value="{{$miercoles[20]}}">
	<input type="hidden" name="x21" id="x21" class="form-control" value="{{$miercoles[21]}}">
	<input type="hidden" name="x22" id="x22" class="form-control" value="{{$miercoles[22]}}">
	<input type="hidden" name="x23" id="x23" class="form-control" value="{{$miercoles[23]}}">
	<input type="hidden" name="j0" id="j0" class="form-control" value="{{$jueves[0]}}">
	<input type="hidden" name="j1" id="j1" class="form-control" value="{{$jueves[1]}}">
	<input type="hidden" name="j2" id="j2" class="form-control" value="{{$jueves[2]}}">
	<input type="hidden" name="j3" id="j3" class="form-control" value="{{$jueves[3]}}">
	<input type="hidden" name="j4" id="j4" class="form-control" value="{{$jueves[4]}}">
	<input type="hidden" name="j5" id="j5" class="form-control" value="{{$jueves[5]}}">
	<input type="hidden" name="j6" id="j6" class="form-control" value="{{$jueves[6]}}">
	<input type="hidden" name="j7" id="j7" class="form-control" value="{{$jueves[7]}}">
	<input type="hidden" name="j8" id="j8" class="form-control" value="{{$jueves[8]}}">
	<input type="hidden" name="j9" id="j9" class="form-control" value="{{$jueves[9]}}">
	<input type="hidden" name="j10" id="j10" class="form-control" value="{{$jueves[10]}}">
	<input type="hidden" name="j11" id="j11" class="form-control" value="{{$jueves[11]}}">
	<input type="hidden" name="j12" id="j12" class="form-control" value="{{$jueves[12]}}">
	<input type="hidden" name="j13" id="j13" class="form-control" value="{{$jueves[13]}}">
	<input type="hidden" name="j14" id="j14" class="form-control" value="{{$jueves[14]}}">
	<input type="hidden" name="j15" id="j15" class="form-control" value="{{$jueves[15]}}">
	<input type="hidden" name="j16" id="j16" class="form-control" value="{{$jueves[16]}}">
	<input type="hidden" name="j17" id="j17" class="form-control" value="{{$jueves[17]}}">
	<input type="hidden" name="j18" id="j18" class="form-control" value="{{$jueves[18]}}">
	<input type="hidden" name="j19" id="j19" class="form-control" value="{{$jueves[19]}}">
	<input type="hidden" name="j20" id="j20" class="form-control" value="{{$jueves[20]}}">
	<input type="hidden" name="j21" id="j21" class="form-control" value="{{$jueves[21]}}">
	<input type="hidden" name="j22" id="j22" class="form-control" value="{{$jueves[22]}}">
	<input type="hidden" name="j23" id="j23" class="form-control" value="{{$jueves[23]}}">
	<input type="hidden" name="v0" id="v0" class="form-control" value="{{$viernes[0]}}">
	<input type="hidden" name="v1" id="v1" class="form-control" value="{{$viernes[1]}}">
	<input type="hidden" name="v2" id="v2" class="form-control" value="{{$viernes[2]}}">
	<input type="hidden" name="v3" id="v3" class="form-control" value="{{$viernes[3]}}">
	<input type="hidden" name="v4" id="v4" class="form-control" value="{{$viernes[4]}}">
	<input type="hidden" name="v5" id="v5" class="form-control" value="{{$viernes[5]}}">
	<input type="hidden" name="v6" id="v6" class="form-control" value="{{$viernes[6]}}">
	<input type="hidden" name="v7" id="v7" class="form-control" value="{{$viernes[7]}}">
	<input type="hidden" name="v8" id="v8" class="form-control" value="{{$viernes[8]}}">
	<input type="hidden" name="v9" id="v9" class="form-control" value="{{$viernes[9]}}">
	<input type="hidden" name="v10" id="v10" class="form-control" value="{{$viernes[10]}}">
	<input type="hidden" name="v11" id="v11" class="form-control" value="{{$viernes[11]}}">
	<input type="hidden" name="v12" id="v12" class="form-control" value="{{$viernes[12]}}">
	<input type="hidden" name="v13" id="v13" class="form-control" value="{{$viernes[13]}}">
	<input type="hidden" name="v14" id="v14" class="form-control" value="{{$viernes[14]}}">
	<input type="hidden" name="v15" id="v15" class="form-control" value="{{$viernes[15]}}">
	<input type="hidden" name="v16" id="v16" class="form-control" value="{{$viernes[16]}}">
	<input type="hidden" name="v17" id="v17" class="form-control" value="{{$viernes[17]}}">
	<input type="hidden" name="v18" id="v18" class="form-control" value="{{$viernes[18]}}">
	<input type="hidden" name="v19" id="v19" class="form-control" value="{{$viernes[19]}}">
	<input type="hidden" name="v20" id="v20" class="form-control" value="{{$viernes[20]}}">
	<input type="hidden" name="v21" id="v21" class="form-control" value="{{$viernes[21]}}">
	<input type="hidden" name="v22" id="v22" class="form-control" value="{{$viernes[22]}}">
	<input type="hidden" name="v23" id="v23" class="form-control" value="{{$viernes[23]}}">
	<input type="hidden" name="s0" id="s0" class="form-control" value="{{$sabado[0]}}">
	<input type="hidden" name="s1" id="s1" class="form-control" value="{{$sabado[1]}}">
	<input type="hidden" name="s2" id="s2" class="form-control" value="{{$sabado[2]}}">
	<input type="hidden" name="s3" id="s3" class="form-control" value="{{$sabado[3]}}">
	<input type="hidden" name="s4" id="s4" class="form-control" value="{{$sabado[4]}}">
	<input type="hidden" name="s5" id="s5" class="form-control" value="{{$sabado[5]}}">
	<input type="hidden" name="s6" id="s6" class="form-control" value="{{$sabado[6]}}">
	<input type="hidden" name="s7" id="s7" class="form-control" value="{{$sabado[7]}}">
	<input type="hidden" name="s8" id="s8" class="form-control" value="{{$sabado[8]}}">
	<input type="hidden" name="s9" id="s9" class="form-control" value="{{$sabado[9]}}">
	<input type="hidden" name="s10" id="s10" class="form-control" value="{{$sabado[10]}}">
	<input type="hidden" name="s11" id="s11" class="form-control" value="{{$sabado[11]}}">
	<input type="hidden" name="s12" id="s12" class="form-control" value="{{$sabado[12]}}">
	<input type="hidden" name="s13" id="s13" class="form-control" value="{{$sabado[13]}}">
	<input type="hidden" name="s14" id="s14" class="form-control" value="{{$sabado[14]}}">
	<input type="hidden" name="s15" id="s15" class="form-control" value="{{$sabado[15]}}">
	<input type="hidden" name="s16" id="s16" class="form-control" value="{{$sabado[16]}}">
	<input type="hidden" name="s17" id="s17" class="form-control" value="{{$sabado[17]}}">
	<input type="hidden" name="s18" id="s18" class="form-control" value="{{$sabado[18]}}">
	<input type="hidden" name="s19" id="s19" class="form-control" value="{{$sabado[19]}}">
	<input type="hidden" name="s20" id="s20" class="form-control" value="{{$sabado[20]}}">
	<input type="hidden" name="s21" id="s21" class="form-control" value="{{$sabado[21]}}">
	<input type="hidden" name="s22" id="s22" class="form-control" value="{{$sabado[22]}}">
	<input type="hidden" name="s23" id="s23" class="form-control" value="{{$sabado[23]}}">
	<input type="hidden" name="d0" id="d0" class="form-control" value="{{$domingo[0]}}">
	<input type="hidden" name="d1" id="d1" class="form-control" value="{{$domingo[1]}}">
	<input type="hidden" name="d2" id="d2" class="form-control" value="{{$domingo[2]}}">
	<input type="hidden" name="d3" id="d3" class="form-control" value="{{$domingo[3]}}">
	<input type="hidden" name="d4" id="d4" class="form-control" value="{{$domingo[4]}}">
	<input type="hidden" name="d5" id="d5" class="form-control" value="{{$domingo[5]}}">
	<input type="hidden" name="d6" id="d6" class="form-control" value="{{$domingo[6]}}">
	<input type="hidden" name="d7" id="d7" class="form-control" value="{{$domingo[7]}}">
	<input type="hidden" name="d8" id="d8" class="form-control" value="{{$domingo[8]}}">
	<input type="hidden" name="d9" id="d9" class="form-control" value="{{$domingo[9]}}">
	<input type="hidden" name="d10" id="d10" class="form-control" value="{{$domingo[10]}}">
	<input type="hidden" name="d11" id="d11" class="form-control" value="{{$domingo[11]}}">
	<input type="hidden" name="d12" id="d12" class="form-control" value="{{$domingo[12]}}">
	<input type="hidden" name="d13" id="d13" class="form-control" value="{{$domingo[13]}}">
	<input type="hidden" name="d14" id="d14" class="form-control" value="{{$domingo[14]}}">
	<input type="hidden" name="d15" id="d15" class="form-control" value="{{$domingo[15]}}">
	<input type="hidden" name="d16" id="d16" class="form-control" value="{{$domingo[16]}}">
	<input type="hidden" name="d17" id="d17" class="form-control" value="{{$domingo[17]}}">
	<input type="hidden" name="d18" id="d18" class="form-control" value="{{$domingo[18]}}">
	<input type="hidden" name="d19" id="d19" class="form-control" value="{{$domingo[19]}}">
	<input type="hidden" name="d20" id="d20" class="form-control" value="{{$domingo[20]}}">
	<input type="hidden" name="d21" id="d21" class="form-control" value="{{$domingo[21]}}">
	<input type="hidden" name="d22" id="d22" class="form-control" value="{{$domingo[22]}}">
	<input type="hidden" name="d23" id="d23" class="form-control" value="{{$domingo[23]}}">

	<table class="table table-striped" style="width: 800px; " align="center" border="1">
		<tr>
			<th width="200px">&nbsp;</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t0" name="t0" onchange="selhora('0')" /> 00</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t1" name="t1" onchange="selhora('1')" /> 01</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t2" name="t2" onchange="selhora('2')" /> 02</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t3" name="t3" onchange="selhora('3')" /> 03</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t4" name="t4" onchange="selhora('4')" /> 04</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t5" name="t5" onchange="selhora('5')" /> 05</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t6" name="t6" onchange="selhora('6')" /> 06</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t7" name="t7" onchange="selhora('7')" /> 07</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t8" name="t8" onchange="selhora('8')" /> 08</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t9" name="t9" onchange="selhora('9')" /> 09</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t10" name="t10" onchange="selhora('10')" /> 10</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t11" name="t11" onchange="selhora('11')" /> 11</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t12" name="t12" onchange="selhora('12')" /> 12</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t13" name="t13" onchange="selhora('13')" /> 13</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t14" name="t14" onchange="selhora('14')" /> 14</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t15" name="t15" onchange="selhora('15')" /> 15</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t16" name="t16" onchange="selhora('16')" /> 16</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t17" name="t17" onchange="selhora('17')" /> 17</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t18" name="t18" onchange="selhora('18')" /> 18</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t19" name="t19" onchange="selhora('19')" /> 19</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t20" name="t20" onchange="selhora('20')" /> 20</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t21" name="t21" onchange="selhora('21')" /> 21</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t22" name="t22" onchange="selhora('22')" /> 22</th>
			<th width="20px"  style="text-align: center;"><input type="checkbox" id="t23" name="t23" onchange="selhora('23')" /> 23</th>
			
			
					
		</tr>
		<tr style="color:#AD4A4A;">
			<td>Lunes</td>
			{{--*/ $hora=0 /*--}}
			@for ($hora = 0; $hora < 24; $hora++)
			 @if($lunes[$hora]==1)
			 {{--*/ $fondo = 'background-color: #1541D1;' /*--}}
			 @else
			 {{--*/ $fondo = 'background-color: white;' /*--}}
			 @endif
			<td>
				<div id="lu{{$hora}}" style="cursor:pointer; cursor: hand; width: 15px; {{$fondo}}" class="circle" onclick="selhorario($(this).attr('id'),'l{{$hora}}')">&nbsp;</div>
			</td>
			@endfor
			{{--*/ $hora=0 /*--}}
		</tr>
		<tr style="color:#AD4A4A;">
			<td>Martes</td>
			{{--*/ $hora=0 /*--}}
			@for ($hora = 0; $hora < 24; $hora++)
			@if($martes[$hora]==1)
			 {{--*/ $fondo = 'background-color: #1541D1;' /*--}}
			 @else
			 {{--*/ $fondo = 'background-color: white;' /*--}}
			 @endif
			<td>
				<div id="ma{{$hora}}" style="cursor:pointer; cursor: hand; width: 15px; {{$fondo}}" class="circle" onclick="selhorario($(this).attr('id'),'m{{$hora}}')">&nbsp;</div>
			</td>
			@endfor
			{{--*/ $hora=0 /*--}}
		</tr>
		<tr style="color:#AD4A4A;">
			<td>Miércoles</td>
			{{--*/ $hora=0 /*--}}
			@for ($hora = 0; $hora < 24; $hora++)
			@if($miercoles[$hora]==1)
			 {{--*/ $fondo = 'background-color: #1541D1;' /*--}}
			 @else
			 {{--*/ $fondo = 'background-color: white;' /*--}}
			 @endif
			<td>
				<div id="mi{{$hora}}" style="cursor:pointer; cursor: hand; width: 15px; {{$fondo}}" class="circle" onclick="selhorario($(this).attr('id'),'x{{$hora}}')">&nbsp;</div>
			</td>
			@endfor
			{{--*/ $hora=0 /*--}}
		</tr>
		<tr style="color:#AD4A4A;">
			<td>Jueves</td>
			{{--*/ $hora=0 /*--}}
			@for ($hora = 0; $hora < 24; $hora++)
			@if($jueves[$hora]==1)
			 {{--*/ $fondo = 'background-color: #1541D1;' /*--}}
			 @else
			 {{--*/ $fondo = 'background-color: white;' /*--}}
			 @endif
			<td>
				<div id="ju{{$hora}}" style="cursor:pointer; cursor: hand; width: 15px; {{$fondo}}" class="circle" onclick="selhorario($(this).attr('id'),'j{{$hora}}')">&nbsp;</div>
			</td>
			@endfor
			{{--*/ $hora=0 /*--}}
		</tr>
		<tr style="color:#AD4A4A;">
			<td>Viernes</td>
			{{--*/ $hora=0 /*--}}
			@for ($hora = 0; $hora < 24; $hora++)
			@if($viernes[$hora]==1)
			 {{--*/ $fondo = 'background-color: #1541D1;' /*--}}
			 @else
			 {{--*/ $fondo = 'background-color: white;' /*--}}
			 @endif
			<td>
				<div id="vi{{$hora}}" style="cursor:pointer; cursor: hand; width: 15px; {{$fondo}}" class="circle" onclick="selhorario($(this).attr('id'),'v{{$hora}}')">&nbsp;</div>
			</td>
			@endfor
			{{--*/ $hora=0 /*--}}
		</tr>
		<tr style="color:#AD4A4A;">
			<td>Sábado</td>
			{{--*/ $hora=0 /*--}}
			@for ($hora = 0; $hora < 24; $hora++)
			@if($sabado[$hora]==1)
			 {{--*/ $fondo = 'background-color: #1541D1;' /*--}}
			 @else
			 {{--*/ $fondo = 'background-color: white;' /*--}}
			 @endif
			<td>
				<div id="sa{{$hora}}" style="cursor:pointer; cursor: hand; width: 15px; {{$fondo}}" class="circle" onclick="selhorario($(this).attr('id'),'s{{$hora}}')">&nbsp;</div>
			</td>
			@endfor
			{{--*/ $hora=0 /*--}}
		</tr>
		<tr style="color:#AD4A4A;">
			<td>Domingo</td>
			{{--*/ $hora=0 /*--}}
			@for ($hora = 0; $hora < 24; $hora++)
			@if($domingo[$hora]==1)
			 {{--*/ $fondo = 'background-color: #1541D1;' /*--}}
			 @else
			 {{--*/ $fondo = 'background-color: white;' /*--}}
			 @endif
			<td>
				<div id="do{{$hora}}" style="cursor:pointer; cursor: hand; width: 15px; {{$fondo}}" class="circle" onclick="selhorario($(this).attr('id'),'d{{$hora}}')">&nbsp;</div>
			</td>
			@endfor
			{{--*/ $hora=0 /*--}}
		</tr>

	</table>
	
				
</div>
