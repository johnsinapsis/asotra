<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <!-- templatemo 420 ocean -->
    <!-- 
    Ocean Template
    http://www.templatemo.com/tm-420-ocean
    -->
    <title>Intranet Asotrauma</title>
    <!-- <link rel="shortcut icon" type="image/x-icon" href="aso.ico"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{{ asset('aso.ico') }}}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    
   
    <!-- Bootstrap Stylesheet -->
    <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
    {!! Html::style('css/bootstrap.min.css')!!}

    <!-- Animate -->
    <!-- <link rel="stylesheet" href="css/animate.min.css"> -->
    {!! Html::style('css/animate.min.css')!!}

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- FontAwesome Icons -->
    <!-- <link rel="stylesheet" href="css/awesome/font-awesome.min.css"> -->
    {!! Html::style('css/awesome/font-awesome.min.css')!!}
    
    <!-- Normailize Stylesheet -->
    <!-- <link rel="stylesheet" href="css/normalize.min.css"> -->
    {!! Html::style('css/normalize.min.css')!!}

    <!-- Main Styles -->
    <!-- <link rel="stylesheet" href="css/templatemo_style.css"> -->
    {!! Html::style('css/templatemo_style.css')!!}
    {!! Html::style('css/intranet.css')!!}

    <!-- <link rel="stylesheet" href="plugins/jquery-ui-1.11.4/jquery-ui.css"> -->
    {!! Html::style('plugins/jquery-ui-1.11.4/jquery-ui.css')!!}

    <!-- <script src="js/vendor/modernizr-2.6.2.min.js"></script> -->
    {!! Html::script('js/vendor/modernizr-2.6.2.min.js') !!}

    <style>
        .ui-dialog .ui-widget-header

        {

            background: #48508A;
    
        }

    </style>

</head>
<body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    

    <div id="responsive-menu">
        <ul class="menu-holder">
            <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
            <li><a href="#services"><i class="fa fa-cogs"></i>Services</a></li>
            <li><a href="#products"><i class="fa fa-list"></i>Products</a></li>
            <li><a href="#video"><i class="fa fa-list"></i>Video</a></li>
            <li><a href="#contact"><i class="fa fa-envelope"></i>Contact</a></li>
        </ul>
    </div>

    <!-- HEADER -->
    <header class="site-header" style="overflow:visible;">
        <div class="container">
            <div class="row">
                <div class="menu-holder">
                    <div class="col-md-3 col-sm-2 logo">
                        <a href="{{route('main')}}" title="templatemo 420 ocean">
                            <!-- <img src="images/asotrauma.png" alt="templatemo 420 ocean" width="70%" height="70%"> -->
                            {!! Html::image('images/asotrauma.png', "Asotrauma", array('width' => '70%', 'height' => '70%')) !!}
                        </a>
                    </div>
                    <div class="col-md-7 col-sm-8">
                        @if(Auth::guest())
                        <nav class="main-menu hidden-xs">
                            <ul>
                                <li><a href="#">Inicio</a></li>
                                <li><a href="#services">Servicios</a></li>
                                <li><a href="#products">Directorio</a></li>
                                <li><a href="#video">Video</a></li>
                                <li><a href="#contact">Contact</a></li>
                            </ul>
                        </nav>
                        @else
                        <!-- Static navbar -->
<div class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
      @inject('menu','App\Http\Controllers\MenuController')
      {{--*/ $numnivel = $menu->numnivel() /*--}}
      {{--*/ $i=0; /*--}}
      @foreach ($menu->listmenu(Auth::user()->id_role,$i) as $menu)
      {{--*/ $id=$menu->id; /*--}}
      {{--*/ $nivel=$menu->nivel; /*--}}
      {{--*/ $id=$menu->id; /*--}}
      {{--*/ $orden=$menu->orden; /*--}}
      {{--*/ $mayor=$menu->mayor; /*--}}
      {{--*/ $ruta=$menu->ruta; /*--}}
      {{--*/ $nomfuncion=$menu->nomfuncion; /*--}}
      @if($ruta=="")
         <li>
         <a href="#">{{$nomfuncion}}<span class="caret"></span></a>
         <ul class="dropdown-menu">
             @inject('x','App\Http\Controllers\MenuController')
            @foreach($x->submenu(Auth::user()->id_role,$id) as $hijo)
                {{--*/ $ruta=$hijo->ruta; /*--}}
                {{--*/ $nomfuncion=$hijo->nomfuncion; /*--}}
                {{--*/ $id=$hijo->id; /*--}}
                 @if($ruta=="")
                 <li>
                 <a href="#">{{$nomfuncion}}<span class="caret"></span></a>
                 <ul class="dropdown-menu">
                    @foreach($x->submenu(Auth::user()->id_role,$id) as $nieto)
                        {{--*/ $ruta=$nieto->ruta; /*--}}
                        {{--*/ $nomfuncion=$nieto->nomfuncion; /*--}}
                        {{--*/ $id=$nieto->id; /*--}}
                        @if($ruta=="")
                            <li>
                            <a href="#">{{$nomfuncion}}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach($x->submenu(Auth::user()->id_role,$id) as $bisnieto)
                                    {{--*/ $ruta=$bisnieto->ruta; /*--}}
                                    {{--*/ $nomfuncion=$bisnieto->nomfuncion; /*--}}
                                    {{--*/ $id=$bisnieto->id; /*--}}
                                     <li><a href="{{route($ruta)}}">{{$nomfuncion}}</a></li>
                                @endforeach
                            </ul>
                            </li>
                         @else
                            <li><a href="{{route($ruta)}}">{{$nomfuncion}}</a></li>
                        @endif
                    @endforeach
                </ul>
                </li>
                 @else
                    <li><a href="{{route($ruta)}}">{{$nomfuncion}}</a></li>
                 @endif
            @endforeach
         </ul>
         </li>
      @else
        <li><a href="{{route($ruta)}}">{{$nomfuncion}}</a></li>
      @endif
      @endforeach
     
    </ul>

    <!-- Left nav -->
    <!--<ul class="nav navbar-nav">
      <li><a href="#">Administrativos<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="{{route('inciadm')}}">Incidentes Administrativos</a></li>
        </ul>
      </li>
      <li><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
      <li><a href="#">Reportes<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li class="dropdown-header">Nav header</li>
          <li><a href="#">Separated link</a></li>
          <li><a href="#">One more separated link <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">A long sub menu <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="disabled"><a class="disabled" href="#">Disabled item</a></li>
                  <li><a href="#">One more link</a></li>
                  <li><a href="#">Menu item 1</a></li>
                  <li><a href="#">Menu item 2</a></li>
                  <li><a href="#">Menu item 3</a></li>
                  <li><a href="#">Menu item 4</a></li>
                  <li><a href="#">Menu item 5</a></li>
                  <li><a href="#">Menu item 6</a></li>
                  <li><a href="#">Menu item 7</a></li>
                  <li><a href="#">Menu item 8</a></li>
                  <li><a href="#">Menu item 9</a></li>
                  <li><a href="#">Menu item 10</a></li>
                  <li><a href="#">Menu item 11</a></li>
                  <li><a href="#">Menu item 12</a></li>
                  <li><a href="#">Menu item 13</a></li>
                  <li><a href="#">Menu item 14</a></li>
                  <li><a href="#">Menu item 15</a></li>
                  <li><a href="#">Menu item 16</a></li>
                  <li><a href="#">Menu item 17</a></li>
                  <li><a href="#">Menu item 18</a></li>
                  <li><a href="#">Menu item 19</a></li>
                  <li><a href="#">Menu item 20</a></li>
                  <li><a href="#">Menu item 21</a></li>
                  <li><a href="#">Menu item 22</a></li>
                  <li><a href="#">Menu item 23</a></li>
                  <li><a href="#">Menu item 24</a></li>
                  <li><a href="#">Menu item 25</a></li>
                  <li><a href="#">Menu item 26</a></li>
                  <li><a href="#">Menu item 27</a></li>
                  <li><a href="#">Menu item 28</a></li>
                  <li><a href="#">Menu item 29</a></li>
                  <li><a href="#">Menu item 30</a></li>
                  <li><a href="#">Menu item 31</a></li>
                  <li><a href="#">Menu item 32</a></li>
                  <li><a href="#">Menu item 33</a></li>
                  <li><a href="#">Menu item 34</a></li>
                  <li><a href="#">Menu item 35</a></li>
                  <li><a href="#">Menu item 36</a></li>
                  <li><a href="#">Menu item 37</a></li>
                  <li><a href="#">Menu item 38</a></li>
                  <li><a href="#">Menu item 39</a></li>
                  <li><a href="#">Menu item 40</a></li>
                  <li><a href="#">Menu item 41</a></li>
                  <li><a href="#">Menu item 42</a></li>
                  <li><a href="#">Menu item 43</a></li>
                  <li><a href="#">Menu item 44</a></li>
                  <li><a href="#">Menu item 45</a></li>
                  <li><a href="#">Menu item 46</a></li>
                  <li><a href="#">Menu item 47</a></li>
                  <li><a href="#">Menu item 48</a></li>
                  <li><a href="#">Menu item 49</a></li>
                  <li><a href="#">Menu item 50</a></li>
                  <li><a href="#">Menu item 51</a></li>
                  <li><a href="#">Menu item 52</a></li>
                  <li><a href="#">Menu item 53</a></li>
                  <li><a href="#">Menu item 54</a></li>
                  <li><a href="#">Menu item 55</a></li>
                  <li><a href="#">Menu item 56</a></li>
                  <li><a href="#">Menu item 57</a></li>
                  <li><a href="#">Menu item 58</a></li>
                  <li><a href="#">Menu item 59</a></li>
                  <li><a href="#">Menu item 60</a></li>
                </ul>
              </li>
              <li><a href="#">Another link</a></li>
              <li><a href="#">One more link</a></li>
            </ul>
          </li>
        </ul>
      </li>
      
      <li><a href="#">Configuración<span class="caret"></span></a>
       <ul class="dropdown-menu">
        @if(Auth::user()->id_role==1)
       
            <li><a href="{{route('register')}}">Registrar Usuarios</a></li>
        
        @endif

            <li><a href="{{route('resetpass')}}">Cambiar contraseña</a></li>

        </ul>
      </li>

    </ul>-->

  </div><!--/.nav-collapse -->
</div>

                        @endif
                    </div>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <ul class="nav navbar-nav">
                            @if(Auth::guest())
                            <li><a href="{{route('login')}}"><i class="fa fa-user"></i><span class="hidden-xs">Iniciar sesión</span></a></li>
                            @else
                            <li><a href="{{route('logout')}}"><i class="fa fa-user"></i><span class="hidden-xs">{{Auth::user()->name}}</span></a></li>
                            @endif
                            <!-- <li><a href="#"><i class="fa fa-twitter"></i><span class="hidden-xs">Twitter</span></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i><span class="hidden-xs">Instagram</span></a></li> -->
                        </ul>
                    </div>
                </div>


                <div class="text-right visible-xs">
                    <a href="#" id="mobile_menu"><span class="fa fa-bars"></span></a>
                </div>
            </div>
        </div>
    </header> <!-- .site-header -->
    
    @yield('content')
   

     @if(Auth::guest())
    <!-- FOOTER -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-right">
                    <p>Copyright &copy; 2015 Asotrauma JJG</p>
                </div> <!-- .col-md-12 -->
            </div> <!-- .row -->
        </div> <!-- .container -->
    </footer> <!-- .site-footer -->
    @endif
    

    <!-- <script src="js/vendor/jquery-1.10.1.min.js"></script> -->
    {!! Html::script('js/vendor/jquery-1.10.1.min.js') !!}
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    
    <!-- <script src="js/bootstrap.min.js"></script> -->
    {!! Html::script('js/bootstrap.min.js') !!}
    
    <!-- <script src="js/plugins.js"></script> -->
    {!! Html::script('js/plugins.js') !!}

    <!-- <script src="js/config.js"></script> -->
    {!! Html::script('js/config.js') !!}

    <!-- <script src="js/templatemo_custom.js"></script>  -->
    {!! Html::script('js/templatemo_custom.js') !!}

    <!-- <script src="plugins/jquery-ui-1.11.4/jquery-ui.js"></script> -->
    {!! Html::script('plugins/jquery-ui-1.11.4/jquery-ui.js') !!}

    <!-- SmartMenus jQuery plugin -->
    <!-- <script src="plugins/jquery.smartmenus.js"></script> -->
    {!! Html::script('plugins/jquery.smartmenus.js') !!}

    <!-- SmartMenus jQuery Bootstrap Addon -->
    <!-- <script src="plugins/addons/bootstrap/jquery.smartmenus.bootstrap.js"></script> -->
    {!! Html::script('plugins/addons/bootstrap/jquery.smartmenus.bootstrap.js') !!}
    <script>
    $( "#draggable" ).draggable();

     $(document).ready(function(){
        $("#unifun").bind({
        });
        $("#unifun").autocomplete({
          minLength:3,
          autoFocus:true,
          source : "{{URL('uni/autocomplete')}}",
          //source:disponible,
          select : function(event, ui){
            $("#idunidad").val(ui.item.id);
          }
        });

        $("#uniinv").bind({
        });
        $("#uniinv").autocomplete({
          minLength:3,
          autoFocus:true,
          source : "{{URL('uni/autocomplete')}}",
          //source:disponible,
          select : function(event, ui){
            $("#idinvo").val(ui.item.id);
          }
        });

      });

     //*********autocomplete de cargos*******
     $(document).ready(function(){
        $("#nomcargo").bind({
        });
        $("#nomcargo").autocomplete({
          minLength:3,
          autoFocus:true,
          source : "{{URL('cargo/autocomplete')}}",
          //source:disponible,
          select : function(event, ui){
            $("#idcargo").val(ui.item.id);
          }
        });

         $("#nomcargo2").bind({
        });
        $("#nomcargo2").autocomplete({
          minLength:3,
          autoFocus:true,
          source : "{{URL('cargo/autocomplete')}}",
          //source:disponible,
          select : function(event, ui){
            $("#idcargo2").val(ui.item.id);
          }
        });


      });
     //***************************************

     //*******autocomplete de entidades

     $(document).ready(function(){
        $("#nomentidad").bind({
        });
        $("#nomentidad").autocomplete({
          minLength:3,
          autoFocus:true,
          source : "{{URL('entidad/autocomplete')}}",
          //source:disponible,
          select : function(event, ui){
            $("#ident").val(ui.item.id);
          }
        });

      });

     //**********************************

      //*******autocomplete de profesiones

     $(document).ready(function(){
        $("#nomprof").bind({
        });
        $("#nomprof").autocomplete({
          minLength:3,
          autoFocus:true,
          source : "{{URL('prof/autocomplete')}}",
          //source:disponible,
          select : function(event, ui){
            $("#idprof").val(ui.item.id);
          }
        });

      });

     //**********************************

      //*******autocomplete de ocupaciones

     $(document).ready(function(){
        $("#nomocupa").bind({
        });
        $("#nomocupa").autocomplete({
          minLength:3,
          autoFocus:true,
          source : "{{URL('ocupa/autocomplete')}}",
          //source:disponible,
          select : function(event, ui){
            $("#idocupa").val(ui.item.id);
          }
        });

      });

     //**********************************

     //*******autocomplete de empleados

     $(document).ready(function(){
        $("#nomemple").bind({
        });
        $("#nomemple").autocomplete({
          minLength:3,
          autoFocus:true,
          source : "{{URL('emple/autocomplete')}}",
          //source:disponible,
          select : function(event, ui){
            $("#idemple").val(ui.item.id);
          }
        });

      });

     //**********************************

     //*******autocomplete de cuadros

     $(document).ready(function(){
        $("#nomcuadro").bind({
        });
        $("#nomcuadro").autocomplete({
          minLength:3,
          autoFocus:true,
          source : "{{URL('cuadro/autocomplete')}}",
          //source:disponible,
          select : function(event, ui){
            $("#idcuadro").val(ui.item.id);
          }
        });

      });

     $(document).ready(function(){
        $("#nomcuadro2").bind({
        });
        $("#nomcuadro2").autocomplete({
          minLength:3,
          autoFocus:true,
          source : "{{URL('cuadro/autocomplete')}}",
          //source:disponible,
          select : function(event, ui){
            $("#idcuadro2").val(ui.item.id);
          }
        });

      });


     //**********************************

     //*******autocomplete de usuarios

     $(document).ready(function(){
        $("#nomusua").bind({
        });
        $("#nomusua").autocomplete({
          minLength:3,
          autoFocus:true,
          source : "{{URL('user/autocomplete')}}",
          //source:disponible,
          select : function(event, ui){
            $("#idusu").val(ui.item.id);
          }
        });

      });

     //**********************************


 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);

    </script>

    @if(Auth::guest())
    @inject('adm', 'App\Http\Controllers\DirectorioController')
             {{--*/$i = 1/*--}}
             @foreach($adm->listar('administrativo') as $adm)
    <script>
                
                $( "#dialog{{$i}}" ).dialog({ autoOpen: false });
                $( "#x{{$i}}" ).click(function() {
                $( "#dialog{{$i}}" ).dialog( "open" );
                            });
    </script>
           {{--*/$i++/*--}}
            @endforeach

    @inject('med', 'App\Http\Controllers\DirectorioController')
             {{--*/$i = 1/*--}}
             @foreach($med->listar('asistencial') as $med)
    <script>
                
                $( "#modal{{$i}}" ).dialog({ autoOpen: false });
                $( "#y{{$i}}" ).click(function() {
                $( "#modal{{$i}}" ).dialog( "open" );
                            });
    </script>
           {{--*/$i++/*--}}
            @endforeach
    @else
      @for($i=0;$i<50;$i++)
      <script>
        
        $( "#detaemptur{{$i}}" ).dialog({ autoOpen: false });        
        $( "#emptur{{$i}}" ).click(function() {
                $( "#detaemptur{{$i}}" ).dialog( "open" );
                            });
        
      </script>
        @endfor
    @endif
</body>
</html>