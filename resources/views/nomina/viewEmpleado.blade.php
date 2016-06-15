@extends('layout')
@section('content')
	<div  class="top-c" >  
		<div class="container">
			<div class="row">
				<div id="draggable" style="position:absolute; z-index: 99;" class="col-xs-8">
					<div class="panel panel-primary class" >
						<div class="panel-heading" align="center">EMPLEADOS</div>
						<div class="panel-body">
							@include('partials/errors')
							@include('partials/success')
							@include('partials/msg-ok')
							@if(isset($emple_id))
                            
                            {{--*/ $selected="" /*--}}
                            {{--*/ $readonly="readonly" /*--}}
                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => ['upemple',$emple_id]]) !!}
                            
                            @else
                            {{--*/ $emple_ide=old('idemp') /*--}}
                            {{--*/ $emple_tid="1" /*--}}
                            {{--*/ $emple_ape1=old('apelli1') /*--}}
                            {{--*/ $emple_ape2=old('apelli2') /*--}}
                            {{--*/ $emple_nom1=old('nombre1') /*--}}
                            {{--*/ $emple_nom2=old('nombre2') /*--}}
                            {{--*/ $emple_est="1" /*--}}
                            {{--*/ $emple_fnac=old('fecnac') /*--}}
                            {{--*/ $emple_pais="0" /*--}}
                            {{--*/ $emple_dpto="0" /*--}}
                            {{--*/ $emple_ciu="0" /*--}}
                            {{--*/ $emple_sex=old('sexo') /*--}}
                            {{--*/ $emple_civ=old('estciv') /*--}}
                            {{--*/ $emple_dir=old('direc') /*--}}
                            {{--*/ $emple_tel=old('tel') /*--}}
                            {{--*/ $emple_cel=old('cel') /*--}}
                            {{--*/ $emple_mail=old('email') /*--}}
                            {{--*/ $emple_fing=old('fecing') /*--}}
                            {{--*/ $emple_fegr="" /*--}}
                            {{--*/ $emple_prof=old('idprof') /*--}}
                            {{--*/ $emple_ocu=old('idocupa') /*--}}
                            {{--*/ $emple_mcon=old('modcon') /*--}}
                            {{--*/ $emple_carg=old('idcargo') /*--}}
                            {{--*/ $emple_tcon=old('tipocon') /*--}}
                            {{--*/ $emple_pen=old('fpen') /*--}}
                            {{--*/ $emple_eps=old('eps') /*--}}
                            {{--*/ $emple_ces=old('fces') /*--}}
                            {{--*/ $emple_caj=old('caja') /*--}}
                            {{--*/ $emple_arl=old('arl') /*--}}
                            {{--*/ $emple_jor=old('jornada') /*--}}
                            {{--*/ $emple_fpag=old('forpag') /*--}}
                            {{--*/ $emple_bank=old('banco') /*--}}
                            {{--*/ $emple_cta=old('numcta') /*--}}
                            {{--*/ $emple_sal=old('salmin') /*--}}
                            {{--*/ $readonly="" /*--}}

                            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form','method' => 'POST','route' => 'emple']) !!}
                            @endif
								<input type="hidden" name="_token" id="_token" class="form-control" value="{{ csrf_token() }}">
								<div class="form-group">
                                	<label class="col-md-3 control-label">Número de identificación:</label> 
                                	<div class="col-md-2"> 
                                		<input type="number" class="form-control" style="width:150px; height: 40px; padding: 1px 15px;" id="idemp" name="idemp" value="{{$emple_ide}}" required="required" {{$readonly}}/> 
                                	</div> 
                                  <label class="col-md-2 control-label" style="width:130px;">Tipo identidad:</label>

                                    <div class="col-md-2">
                                        <select name="tipoid" id="tipoid" class="form-control" style="width:80px;">
                                            @inject('entipos','App\Http\Controllers\TipoIdentController')
                                            
                                            {{--*/ $selected="" /*--}}
                                            @foreach($entipos->list_tipoident() as $tipo)
                                            @if($emple_tid==$tipo->id)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                                <option value="{{$tipo->id}}" {{$selected}}>{{$tipo->abr}}</option>
                                                {{--*/ $selected="" /*--}}
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-md-1 control-label" style="text-align:left; padding-left: 10px; width:50px;">Sexo:</label>
                                    <div class="col-md-2">
                                    <select name="sexo" id="sexo" class="form-control" style="width:100px;">
                                      {{--*/ $selected="" /*--}}
                                      @if($emple_sex==0)
                                      {{--*/ $selected="selected" /*--}}
                                      @endif
                                       <option value="0" {{$selected}}>&nbsp;</option>
                                       {{--*/ $selected="" /*--}}
                                      @if($emple_sex=='M')
                                      {{--*/ $selected="selected" /*--}}
                                      @endif
                                      <option value="M" {{$selected}}>Masculino</option>
                                      {{--*/ $selected="" /*--}}
                                      @if($emple_sex=='F')
                                      {{--*/ $selected="selected" /*--}}
                                      @endif
                                      <option value="F" {{$selected}}>Femenino</option>
                                    </select> 
                                    </div>
                </div>
                                
                                <div id="nom" align="center" style="font-size: 16px; color: #920606;">&nbsp;</div>

                               <div class="form-group" >
                                   
                                    <label class="col-md-2 control-label">Apellidos:</label> 
                                   <div class="col-md-2" style="padding-left: 10px; padding-right: 10px; width: auto;"> 
                                       <input type="text" class="form-control" style=" width: 130px; margin-right: 0px;" id="apelli1" name="apelli1" onkeyup="var n1 = $('#nombre1').val()+' '+$('#nombre2').val()+' '+$('#apelli1').val()+' '+$('#apelli2').val(); $('#nom').text(n1); " value="{{$emple_ape1}}" required="required"/> 
                                   </div> 
                                   <div class="col-md-2" style="padding-left: 10px; padding-right: 10px; width: auto;"> 
                                       <input type="text" class="form-control" style=" width: 130px; margin-right: 0px;" id="apelli2" name="apelli2" onkeyup="var n1 = $('#nombre1').val()+' '+$('#nombre2').val()+' '+$('#apelli1').val()+' '+$('#apelli2').val(); $('#nom').text(n1); " value="{{$emple_ape2}}"/> 
                                   </div> 
                                   <label class="col-md-1 control-label" >Nombres:</label> 
                                   <div class="col-md-2" style="padding-left: 10px; padding-right: 10px; "> 
                                       <input type="text" class="form-control" style=" width: 130px; " id="nombre1" name="nombre1" onkeyup="var n1 = $('#nombre1').val()+' '+$('#nombre2').val()+' '+$('#apelli1').val()+' '+$('#apelli2').val(); $('#nom').text(n1); " value="{{$emple_nom1}}" required="required" /> 
                                   </div> 
                                   <!-- <label class="col-md-2 control-label" style="text-align: left; width: auto;">Segundo Nombre:</label>  -->
                                   <div class="col-md-2" style="padding-left: 10px; padding-right: 10px; width: auto;"> 
                                       <input type="text" class="form-control" style=" width: 130px; " id="nombre2" name="nombre2" onkeyup="var n1 = $('#nombre1').val()+' '+$('#nombre2').val()+' '+$('#apelli1').val()+' '+$('#apelli2').val(); $('#nom').text(n1); " value="{{$emple_nom2}}"/> 
                                   </div> 
                                   
                               </div>

                                 <div class="form-group" >
                                <label class="col-md-3 control-label">Estado Civil:</label>

                                    <div class="col-md-3">
                                        <select name="estciv" id="estciv" class="form-control" style="width:150px">
                                            @inject('activ','App\Http\Controllers\ActividadController')
                                            
                                            {{--*/ $selected="" /*--}}
                                            @foreach($activ->list_estciv() as $estado)
                                            @if($emple_civ==$estado->id)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                                <option value="{{$estado->id}}" {{$selected}}>{{$estado->nombre}}</option>
                                                {{--*/ $selected="" /*--}}
                                            @endforeach
                                        </select>
                                    </div>

                                    <label class="col-md-2 control-label" style=" ">Fecha de nacimiento:</label>
                                     <div class="col-md-2"> 
                                    <input type="date" id="fecnac" name="fecnac" class="form-control" style="width:150px;" value="{{$emple_fnac}}"/>
                                    </div>
                                </div>

                                <div class="form-group" style="padding-left: 0%; ">
                                  <label class="col-md-3 control-label" style="padding-left: 0px; ">Lugar de nacimiento:</label>
                                  @inject('ubi','App\Http\Controllers\UbiController')
                                  <div class="col-md-2"> 
                                    <select id="pais" name="pais" class="form-control"  onchange="cargarSelect('pais','depto','1',''); " >
                                         @if($emple_pais==0)
                                          <option value="0" selected>pais</option>
                                             @else
                                                <option value="0">pais</option>
                                         @endif
                                        @foreach ($ubi->list_pais() as $pais) 
                                            @if($pais->id==$emple_pais)
                                            <option value="{{$pais->id}}" selected>{{$pais->pai_nombre}}</option>
                                            @else
                                            <option value="{{$pais->id}}">{{$pais->pai_nombre}}</option>
                                            @endif
   
                                        @endforeach
                                      </select>
                                  </div>
                                  <div class="col-md-2"> 
                                    <select id="depto" name="depto" class="form-control" onchange="cargarSelect('depto','ciudad','2','');">
                                      @if($emple_dpto==0)
                                      <option value="0">Departamento</option>
                                      @else
                                      @foreach($ubi->listdepto($emple_pais) as $depto)
                                      @if($depto->dep_codigo == $emple_dpto)
                                      <option value="{{$depto->dep_codigo}}" selected>{{$depto->dep_nombre}}</option>
                                      @else
                                      <option value="{{$depto->dep_codigo}}" >{{$depto->dep_nombre}}</option>
                                      @endif
                                      @endforeach
                                      @endif
                                    </select>
                                  </div>
                                  <div class="col-md-2"> 
                                    <select id="ciudad" name="ciudad" class="form-control">
                                      @if($emple_ciu==0)
                                      <option value="0">Ciudad</option>
                                      @else
                                      @foreach($ubi->listciudad($emple_dpto) as $ciudad)
                                      @if($ciudad->cod_ciudad == $emple_ciu)
                                      <option value="{{$ciudad->cod_ciudad}}" selected>{{$ciudad->nom_ciudad}}</option>
                                      @else
                                      <option value="{{$ciudad->cod_ciudad}}">{{$ciudad->nom_ciudad}}</option>
                                      @endif
                                      @endforeach
                                      @endif
                                    </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-md-3 control-label" >Dirección Domicilio:</label>
                                  <div class="col-md-3">
                                  <input type="text" class="form-control" id="direc" name="direc" value="{{$emple_dir}}" required="required" /> 
                                  </div>
                                  <label class="col-md-2 control-label" >Teléfono Fijo:</label>
                                  <div class="col-md-2">
                                  <input type="text" class="form-control" id="tel" name="tel" value="{{$emple_tel}}"  /> 
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-md-3 control-label" >Correo Electrónico:</label>
                                  <div class="col-md-3">
                                  <input type="email" class="form-control" id="email" name="email" value="{{$emple_mail}}"  /> 
                                  </div>
                                  <label class="col-md-2 control-label" >Teléfono Móvil:</label>
                                  <div class="col-md-2">
                                  <input type="text" class="form-control" id="cel" name="cel" value="{{$emple_cel}}"  /> 
                                  </div>
                                </div>
                        
                                @if(isset($emple_id))
                                    @if($emple_prof!="")
                                    {{--*/ $nomprof = $activ->show_profesion($emple_prof)->prof_nom  /*--}}
                                    @else
                                    {{--*/ $nomprof="" /*--}}
                                    @endif
                                    @if($emple_ocu!="")
                                    {{--*/ $nomocupa = $activ->show_ocupacion($emple_ocu)->nombre  /*--}}
                                    @else
                                    {{--*/ $nomocupa="" /*--}}
                                    @endif
                                    @if($emple_carg!="")
                                    @inject('cargo','App\Http\Controllers\CargoController')
                                    {{--*/ $nomcargo = $cargo->show($emple_carg)->nomcargo  /*--}}
                                    @else
                                    {{--*/ $nomcargo="" /*--}}
                                    @endif
                                @else
                                    {{--*/ $nomprof=old('nomprof') /*--}}
                                    {{--*/ $nomocupa=old('nomocupa') /*--}}
                                    {{--*/ $nomcargo=old('nomcargo') /*--}}
                                @endif
                                
                                <div class="form-group">
                                  <label class="col-md-3 control-label" >Fecha de Ingreso:</label>
                                  <div class="col-md-3">
                                  <input type="date" class="form-control" id="fecing" name="fecing" value="{{$emple_fing}}" required="required" /> 
                                  </div>
                                  <label class="col-md-1 control-label" >Profesión:</label>
                                  <div class="col-md-3">
                                  <input type="text" class="form-control" id="nomprof" name="nomprof" value="{{$nomprof}}"  /> 
                                  <input type="hidden" id="idprof" name="idprof" value="{{$emple_prof}}">  
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-md-3 control-label" >Ocupación:</label>
                                  <div class="col-md-3">
                                  <input type="text" class="form-control" id="nomocupa" name="nomocupa" value="{{$nomocupa}}"  /> 
                                  <input type="hidden" id="idocupa" name="idocupa" value="{{$emple_ocu}}"> 
                                  </div>
                                  <label class="col-md-2 control-label" style="width: 140px;">Modelo Contable:</label>
                                  <div class="col-md-3">
                                    <select name="modcon" id="modcon" class="form-control">
                                    {{--*/ $selected="" /*--}}
                                            @foreach($activ->list_modcon() as $modcon)
                                            @if($emple_mcon==$modcon->id)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                                <option value="{{$modcon->id}}" {{$selected}}>{{$modcon->id}}--{{$modcon->nombre}}</option>
                                                {{--*/ $selected="" /*--}}
                                            @endforeach
                                      
                                    </select> 
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-md-3 control-label" >Cargo:</label>
                                  <div class="col-md-3">
                                        <input type="text" class="form-control" id="nomcargo" name="nomcargo" value="{{$nomcargo}}">
                                        <input type="hidden" id="idcargo" name="idcargo" value="{{$emple_carg}}">  
                                   </div>
                                   <label class="col-md-2 control-label" style="width: 140px;">Tipo de Contrato:</label>
                                   <div class="col-md-3">
                                    <select name="tipocon" id="tipocon" class="form-control">
                                    {{--*/ $selected="" /*--}}
                                            @foreach($activ->list_tipocon() as $tipocon)
                                            @if($emple_mcon==$tipocon->id)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                                <option value="{{$tipocon->id}}" {{$selected}}>{{$tipocon->nombre}}</option>
                                                {{--*/ $selected="" /*--}}
                                            @endforeach
                                      
                                    </select> 
                                  </div>
                                </div>

                                <div class="form-group">
                                @inject('entidad','App\Http\Controllers\EntiNominaController')
                                <label class="col-md-3 control-label">Fondo de Pensión:</label>
                                <div class="col-md-3">
                                    <select name="fpen" id="fpen" class="form-control">
                                    {{--*/ $selected="" /*--}}
                                         @if($emple_pen=="")
                                        <option value="0"{{$selected}}>Seleccione</option>
                                        @endif
                                            @foreach($entidad->show(3) as $fpen)
                                            @if($emple_pen==$fpen->id)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                                <option value="{{$fpen->id}}" {{$selected}}>{{$fpen->nombre}}</option>
                                                {{--*/ $selected="" /*--}}
                                            @endforeach
                                      
                                    </select> 
                                  </div>
                                  <label class="col-md-1 control-label">Eps:</label>
                                  <div class="col-md-3">
                                     <select name="eps" id="eps" class="form-control">
                                    {{--*/ $selected="" /*--}}
                                        @if($emple_eps=="")
                                        <option value="0"{{$selected}}>Seleccione</option>
                                        @endif
                                            @foreach($entidad->show(1) as $eps)
                                            @if($emple_eps==$eps->id)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                                <option value="{{$eps->id}}" {{$selected}}>{{$eps->nombre}}</option>
                                                {{--*/ $selected="" /*--}}
                                            @endforeach
                                      
                                    </select> 
                                    </div>

                                </div>

                                <div class="form-group">
                                <label class="col-md-3 control-label">Fondo de Cesantías:</label>
                                <div class="col-md-3">
                                    <select name="fces" id="fces" class="form-control">
                                    {{--*/ $selected="" /*--}}
                                        @if($emple_ces=="")
                                        <option value="0"{{$selected}}>Seleccione</option>
                                        @endif
                                            @foreach($entidad->show(3) as $fces)
                                            @if($emple_ces==$fces->id)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                                <option value="{{$fces->id}}" >{{$fces->nombre}}</option>
                                                {{--*/ $selected="" /*--}}
                                            @endforeach
                                      
                                    </select> 
                                  </div>
                                  <label class="col-md-3 control-label" style="width:180px;">Caja de Compensación:</label>
                                  <div class="col-md-3" style="width:220px;">
                                     <select name="caja" id="caja" class="form-control">
                                    {{--*/ $selected="" /*--}}
                                        @if($emple_caj=="")
                                        <option value="0"{{$selected}}>Seleccione</option>
                                        @endif
                                            @foreach($entidad->show(4) as $caja)
                                            @if($emple_caj==$caja->id)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                                <option value="{{$caja->id}}" {{$selected}}>{{$caja->nombre}}</option>
                                                {{--*/ $selected="" /*--}}
                                            @endforeach
                                      
                                    </select> 
                                    </div>

                                </div>

                                <div class="form-group">
                                  <label class="col-md-3 control-label">ARL:</label>
                                <div class="col-md-3">
                                    <select name="arl" id="arl" class="form-control">
                                    {{--*/ $selected="" /*--}}
                                        @if($emple_arl=="")
                                        <option value="0"{{$selected}}>Seleccione</option>
                                        @endif
                                            @foreach($entidad->show(6) as $arl)
                                            @if($emple_arl==$arl->id)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                                <option value="{{$arl->id}}" >{{$arl->nombre}}</option>
                                                {{--*/ $selected="" /*--}}
                                            @endforeach
                                      
                                    </select> 
                                  </div>

                                  <label class="col-md-1 control-label">Jornada:</label>
                                  <div class="col-md-3">
                                   <select name="jornada" id="jornada" class="form-control">
                                     @foreach($activ->list_jornadas() as $jor)
                                            @if($emple_jor==$jor->id)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                                <option value="{{$jor->id}}" >{{$jor->nombre}}</option>
                                                {{--*/ $selected="" /*--}}
                                      @endforeach
                                   </select>
                                   </div>

                                </div>

                                <div class="form-group">
                                    
                                    <label class="col-md-3 control-label" >Forma de Pago:</label>
                                   <div class="col-md-3">
                                    <select name="forpag" id="forpag" class="form-control" style="width:180px;">
                                    {{--*/ $selected="" /*--}}
                                            @foreach($activ->list_forpago() as $forpag)
                                            @if($emple_fpag==$forpag->id)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                                <option value="{{$forpag->id}}" >{{$forpag->nombre}}</option>
                                                {{--*/ $selected="" /*--}}
                                            @endforeach
                                      
                                    </select> 
                                  </div>

                                    <label class="col-md-1 control-label">Banco:</label>
                                    <div class="col-md-3">
                                    <select name="banco" id="banco" class="form-control">
                                    {{--*/ $selected="" /*--}}
                                        @if($emple_bank=="")
                                        <option value="0"{{$selected}}>Seleccione</option>
                                        @endif
                                            @foreach($entidad->show(5) as $banco)
                                            @if($emple_jor==$banco->id)
                                            {{--*/ $selected="selected" /*--}}
                                            @endif
                                                <option value="{{$banco->id}}" >{{$banco->nombre}}</option>
                                                {{--*/ $selected="" /*--}}
                                            @endforeach
                                      
                                    </select> 
                                  </div>

                                   
                                </div>

                                <div class="form-group">

                                  <label class="col-md-3 control-label">Número de Cuenta:</label>
                                   <div class="col-md-2">
                                   <input type="number" id="numcta" name="numcta" class="form-control" style="width:150px; height: 40px; padding: 1px 15px;" value="{{$emple_cta}}"/>
                                   </div>

                                  @inject('salmin','App\Http\Controllers\SalminController')
                                  {{--*/ $date = Carbon\Carbon::now(); /*--}}
                                  {{--*/ $date = $date->format('Y'); /*--}}
                                  <label class="col-md-2 control-label">Salario Base:</label>
                                  <input type="number" id="salmin" name="salmin" class="form-control" style="width:150px; height: 40px; padding: 1px 15px;" min="{{$salmin->show($date)->salmin}}" value="{{$emple_sal}}" required="required" />
                                </div>



                                <div class="form-group">
                                	<div class="col-md-12" align="center">
                                		<button type="submit" class="btn btn-primary">
                                			Guardar
                                		</button>
                                	</div>
                            	</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>	
@endsection