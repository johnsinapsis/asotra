@extends('layout')

@section('content')
   <div  class="top-c" >
    <div class="container">
        <div class="row">
            <div id="draggable" style="position:absolute; z-index: 99;" class="col-md-offset-2 col-xs-8">
                <div class="panel panel-primary class" >
                    <div class="panel-heading" align="center">DISTRIBUCIÓN DE DOCUMENTOS - SIGC</div>
                    <div class="panel-body">
                      @include('partials/errors')
                        @include('partials/success')
                         @include('partials/msg-ok')
                        <div id="MainMenu">
                            <div class="list-group panel">
                                <a href="#gerencia" class="list-group-item list-group-item-info" data-toggle="collapse" data-parent="#MainMenu">GERENCIA</a>
                                <div class="collapse" id="gerencia">
                                     <!-- <a href="#SubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Subitem 1 <i class="fa fa-caret-down"></i></a>
                                     <div class="collapse list-group-submenu" id="SubMenu1">
                                         <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 1 a</a>
                                         <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 2 b</a>
                                         <a href="#SubSubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubSubMenu1">Subitem 3 c <i class="fa fa-caret-down"></i></a>
                                        <div class="collapse list-group-submenu list-group-submenu-1" id="SubSubMenu1">
                                            <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 1</a>
                                            <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 2</a>
                                       </div>
                                        <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 4 d</a>
                                                                         </div> -->
                                    <a href="http://srvasotra/filetree/explorer.php?dir=cinterno"  target="_blank" class="list-group-item">Control Interno</a>
                                    <a href="http://srvasotra/filetree/explorer.php?dir=calidad" target="_blank" class="list-group-item">Aseguramiento de la calidad</a>
                                </div>
                                <a href="#dcien" class="list-group-item list-group-item-warning" data-toggle="collapse" data-parent="#MainMenu">DIRECCIÓN CIENTÍFICA</a>
                                <div class="collapse" id="dcien">
                                  <a href="http://srvasotra/filetree/explorer.php?dir=uniasistencial" target="_blank" class="list-group-item">Unidad Asistencial</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=urgencias" target="_blank" class="list-group-item">Urgencias</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=uniqx" target="_blank" class="list-group-item">Unidad Médico Quirúrgica</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=conexterna" target="_blank" class="list-group-item">Consulta Externa</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=ayudiagno" target="_blank" class="list-group-item">Ayudas diagnósticas</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=farmacia" target="_blank" class="list-group-item">Servicio Farmacéutico</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=terapia" target="_blank" class="list-group-item">Apoyo Terapéutico</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=uti" target="_blank" class="list-group-item">Unidad de Terapia Intensiva</a>
                                </div>
                                <a href="#dadm" class="list-group-item list-group-item-info" data-toggle="collapse" data-parent="#MainMenu">DIRECCIÓN ADMINISTRATIVA Y FINANCIERA</a>
                                <div class="collapse" id="dadm">
                                  <a href="http://srvasotra/filetree/explorer.php?dir=cooradmi" target="_blank" class="list-group-item">Coordinación Administrativa</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=tesoreria" target="_blank" class="list-group-item">Tesorería</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=contabilidad" target="_blank" class="list-group-item">Contabilidad</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=cartera" target="_blank" class="list-group-item">Cartera</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=thumano" target="_blank" class="list-group-item">Telento Humano</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=sst" target="_blank" class="list-group-item">Seguridad y Salud en el Trabajo</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=facturacion" target="_blank" class="list-group-item">Facturación</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=sistemas" target="_blank" class="list-group-item">Sistemas</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=archivo" target="_blank" class="list-group-item">Archivo</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=fisicos" target="_blank" class="list-group-item">Recursos Físicos</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=mantenimiento" target="_blank" class="list-group-item">Mantenimiento</a>
                                  <a href="http://srvasotra/filetree/explorer.php?dir=formatos" target="_blank" class="list-group-item">Formatos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection