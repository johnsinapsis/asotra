function cargarSelect(origen,destino,op,valor){
  var val1= $('#'+origen).val();
  var token = $("#_token").val();
  if (op==1)
  var route = "depto";
  if(op==2)
  var route = "ciudad";
  if(op==3)
  var route = "/intranet/public/horemp";
  if(op==4){
  var route = "/intranet/public/diaturno";
  var currentTime = new Date();
   var minDate = new Date(currentTime.getFullYear(), valor-1 , 1);
   var maxDate = new Date(currentTime.getFullYear(), valor , 0);

   }

  $("#"+destino+" option").remove();
  $.ajax({
	   url: route,
       headers:{'X-CSRF-TOKEN':token},
       type: "POST",
       dataType: "json",
	   data:{cod:val1},
	   success: function(data) {
                data.forEach(function(i){
				//console.log(i);
				
        if(op==1)
				$('#'+destino).append("<option value='"+i.dep_codigo+"'>"+i.dep_nombre+"</option>");
				if(op==2)
				$('#'+destino).append("<option value='"+i.cod_ciudad+"'>"+i.nom_ciudad+"</option>");
        if(op==3){
        $('#'+destino).append("<option value='"+i.id+"'>"+i.nomhorario+"</option>");
        
            }
        if(op==4){
          
          
          $("#diaturno").datepicker({
               dateFormat: "dd/mm/yy",
               minDate:  minDate,
               maxDate:  maxDate,
               beforeShowDay: function (day) { 
                  var day = day.getDay();
                  return [(day != i.numdia ), ''];
               }
          });
            }
				});


           
       // });

             } //cierra success
  }); // cierra ajax
 
} // cierra funcion


function cargar_cturno(origen,valor){
  var token = $("#_token").val();
  var val1= $('#'+origen).val();
  var route = "/intranet/public/horades";
  var currentTime = new Date();
  var minDate = new Date(currentTime.getFullYear(), valor-1 , 1);
  var maxDate = new Date(currentTime.getFullYear(), valor , 0);

$.ajax({
  url: route,
  headers:{'X-CSRF-TOKEN':token},
  type: "POST",
    dataType: "json",
  data:{cod:val1},
   success: function(data) {
    
    $("#desc").text(data.descripcion);
    
   
   }
 });

var route = "/intranet/public/diaemp";
var dias = new Array(); 
var y = 0;
$.ajax({
     url: route,
       headers:{'X-CSRF-TOKEN':token},
       type: "POST",
       dataType: "json",
     data:{cod:val1},
     success: function(data) {
                data.forEach(function(i){
        //console.log(i);
                
          
          dias[y] = i.numdia; 
          y++;
          
           
        });
            
            


             } //cierra success
  }); // cierra ajax



}



function eliminar_usu(id){
var token = $("#_token").val();
var route = 'erase_usucuadro';
if (confirm('¿Est\u00E1 seguro de eliminar este registro?')){ 
       $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN':token},
      type: "POST",
      dataType: "json",
      data:{cod:id},
      success: function(data) {
      window.location.href = "cturnorol";
      }
     });
    } 
}



function eliminar_emp(id){
var token = $("#_token").val();
var route = 'erase_empcuadro';
if (confirm('¿Est\u00E1 seguro de eliminar este registro?')){ 
       $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN':token},
      type: "POST",
      dataType: "json",
      data:{cod:id},
      success: function(data) {
      window.location.href = "cturnoemp";
      }
     });
    } 
}


function eliminar_fest(id){
var token = $("#_token").val();
var route = 'erase_festivo';
if (confirm('¿Est\u00E1 seguro de eliminar este registro?')){ 
       $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN':token},
      type: "POST",
      dataType: "json",
      data:{cod:id},
      success: function(data) {
      window.location.href = "festivo";
      }
     });
    } 
}



function eliminar_perm(perfil, funcion){
var token = $("#_token").val();
var route = 'erase_permiso';
if (confirm('¿Est\u00E1 seguro de eliminar este registro?')){ 
       $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN':token},
      type: "POST",
      dataType: "json",
      data:{perfil:perfil,funcion:funcion},
      success: function(data) {
      window.location.href = "permisos";
      }
     });
    } 
}

function eliminar_tur(idcuadro,idemp,idhorario,dia){
var token = $("#_token").val();
var route = 'erase_turnoemp';
if (confirm('¿Est\u00E1 seguro de eliminar este registro?')){ 
       $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN':token},
      type: "POST",
      dataType: "json",
      data:{idcuadro:idcuadro,idemp:idemp,idhorario:idhorario,dia:dia},
      success: function(data) {
      window.location.href = "turdetelim/"+idcuadro;
      alert("Registro eliminado");
      }
     });
    } 
}



function selhorario(id,input){
 var valor = $("#"+input).val();
 if(valor == 0)
 {
  $("#"+id).css('background-color', '#1541D1');
  $("#"+input).val(1);
 }
 else
 {
  $("#"+id).css('background-color', 'white');
  $("#"+input).val(0);
 }
 
 
}

function selhora(hora){
  if( $("#t"+hora).prop('checked') ) {
    $("#lu"+hora).css('background-color', '#1541D1');
    $("#ma"+hora).css('background-color', '#1541D1');
    $("#mi"+hora).css('background-color', '#1541D1');
    $("#ju"+hora).css('background-color', '#1541D1');
    $("#vi"+hora).css('background-color', '#1541D1');
    $("#sa"+hora).css('background-color', '#1541D1');
    $("#do"+hora).css('background-color', '#1541D1');
    $("#l"+hora).val(1);
    $("#m"+hora).val(1);
    $("#x"+hora).val(1);
    $("#j"+hora).val(1);
    $("#v"+hora).val(1);
    $("#s"+hora).val(1);
    $("#d"+hora).val(1);
  }
  else{
    $("#lu"+hora).css('background-color', 'white');
    $("#ma"+hora).css('background-color', 'white');
    $("#mi"+hora).css('background-color', 'white');
    $("#ju"+hora).css('background-color', 'white');
    $("#vi"+hora).css('background-color', 'white');
    $("#sa"+hora).css('background-color', 'white');
    $("#do"+hora).css('background-color', 'white');
    $("#l"+hora).val(0);
    $("#m"+hora).val(0);
    $("#x"+hora).val(0);
    $("#j"+hora).val(0);
    $("#v"+hora).val(0);
    $("#s"+hora).val(0);
    $("#d"+hora).val(0);
  }
}


function selectTurno(idcuadro,emp,destino){
         var idemp = $("#"+emp).val();
         var route = "/intranet/public/diaturno";
         var token = $("#_token").val();
         $("#"+destino+" option").remove();
         $("#"+destino).append("<option value='0' >Día </option>");
   $.ajax({
     url: route,
       headers:{'X-CSRF-TOKEN':token},
       type: "POST",
       dataType: "json",
     data:{idemp:idemp,idcuadro:idcuadro},
     success: function(data) {
                data.forEach(function(i){
        //console.log(i);
        
        
        $("#"+destino).append("<option value='"+i.numdia+"'>"+i.numdia+"</option>");
        
        
        });


             } //cierra success
  }); // cierra ajax

}


function selectHorario(idcuadro,emp,origen,destino){
         var idemp = $("#"+emp).val();
         var dia = $("#"+origen).val();
         var route = "/intranet/public/diahorario";
         var token = $("#_token").val();
         $("#"+destino+" option").remove();
   $.ajax({
     url: route,
       headers:{'X-CSRF-TOKEN':token},
       type: "POST",
       dataType: "json",
     data:{dia:dia,idemp:idemp,idcuadro:idcuadro},
     success: function(data) {
                data.forEach(function(i){
        //console.log(i);
        
        
        $("#"+destino).append("<option value='"+i.id_horario+"'>"+i.abr+"</option>");
        
        
        });


             } //cierra success
  }); // cierra ajax

}

function cuentachar(origen,destino){

  $("#"+destino).text($("#"+origen).val().length);

}

function agregaArchivo(){
  var numfilas = $("#numarchi").val();
  numfilas ++;
  //alert(numfilas);
  $("#numarchi").val(numfilas)
  $("#tarchi").append("<tr><td><input type='text' id='nom"+numfilas+"' name='nom"+numfilas+"' class='form-control' /></td><td><input type='file' id='archi"+numfilas+"' name='archi"+numfilas+"' class='form-control' /></td></tr>");
}