@extends('layout')

@section('content')
 <!-- TOP CONTENT -->
    <div class="top-c">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-lg-5 col-md-5 col-xs-offset-1 col-sm-5 col-xs-8 col-xs-offset-2">
                    <div class="topc-img">
                        <img src="images/tecsalud.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h3 class="topc-title">Area Digital</h3>
                    <ul>
                        <li><i class="fa fa-check"></i>Próximamente en este sitio encontrará información de su interés.</li>
                        <li><i class="fa fa-check"></i>Al iniciar sesión contará con herramientas de apoyo para sus labores diarias.</li>
                        <li><i class="fa fa-check"></i>Próximamente documentación de dominio interno.</li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::guest())
     
    <!-- SERVICES -->
    <div class="content-section" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-6 text-center">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <h3 class="service-title">NOTICIAS Y EVENTOS</h3>
                    </div> <!-- .service-item -->
                </div> <!-- .col-md-3 -->
                <div class="col-md-3 col-xs-6 text-center">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fa fa-cog"></i>
                        </div>
                        <h3 class="service-title">HERRAMIENTAS</h3>
                    </div> <!-- .service-item -->
                </div> <!-- .col-md-3 -->
                <div class="col-md-3 col-xs-6 text-center">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fa fa-line-chart"></i>
                        </div>
                        <h3 class="service-title">INDICADORES</h3>
                    </div> <!-- .service-item -->
                </div> <!-- .col-md-3 -->
                <div class="col-md-3 col-xs-6 text-center">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fa fa-support"></i>
                        </div>
                        <h3 class="service-title">Soporte</h3>
                    </div> <!-- .service-item -->
                </div> <!-- .col-md-3 -->
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- #services -->

    
    <!-- PRODUCTS -->
    <div class="content-section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-5 col-xs-12 text-center">
                        <img src="images/product-1.png" alt="">
                    </div>                    
                    <div class="product-content col-md-7 col-xs-12">
                        <h3>Areas Administrativas</h3>
                        <span>Departamentos Administrativos</span><br>
                        @inject('adm', 'App\Http\Controllers\DirectorioController')
                        {{--*/$i = 1/*--}}
                        @foreach($adm->listar('administrativo') as $adm)
                        <a id="x{{$i}}"  style="cursor: pointer">{{$adm->dependencia}}</a> <br>
                        <div id="dialog{{$i}}" title="{{$adm->dependencia}}">
                        	Nombre: {{$adm->nombre}}.  
							@if($adm->extension!="")
                        	Extensiones: {{$adm->extension}}.
                        	@endif
                        	@if($adm->linea_fija!="")
                        	Líneas Fijas: {{$adm->linea_fija}}. 
                        	@endif
                        	@if($adm->celular!="")
                        	Celular:{{$adm->celular}}
                        	@endif
                        </div>
                        {{--*/$i++/*--}}
                        @endforeach
                    </div>
                </div> <!-- .col-md-6 -->
                <div class="col-md-6">
                    <div class="product-content col-md-7 col-xs-12">
                        <h3>Areas Asistenciales</h3>
                        <span>Areas relacionadas con la Atención al Paciente</span><br>
                         @inject('med', 'App\Http\Controllers\DirectorioController')
                        {{--*/$i = 1/*--}}
                        @foreach($med->listar('asistencial') as $med)
                        <a id="y{{$i}}" style="cursor: pointer">{{$med->dependencia}}</a> <br>
                        <div id="modal{{$i}}" title="{{$med->dependencia}}">
                        	Nombre: {{$med->nombre}}.  Extensiones: {{$med->extension}}.
                        	@if($med->linea_fija!="")
                        	Líneas Fijas: {{$med->linea_fija}}. 
                        	@endif
                        	@if($med->celular!="")
                        	Celular:{{$med->celular}}
                        	@endif
                        </div>
                        {{--*/$i++/*--}}
                        @endforeach
                    </div>
                    <div class="col-md-5 col-xs-12 text-center">
                        <img src="images/product-2.png" alt="">
                    </div>
                </div> <!-- .col-md-6 -->
            </div>
        </div>
    </div> <!-- #products -->


    <!-- VIDEO FEATURe -->
    <div id="video" class="video-feature content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="video embed-responsive embed-responsive-16by9">
                       <iframe width="640" height="360" src="https://www.youtube.com/embed/nZLWA93z5oY" frameborder="0" allowfullscreen></iframe>
                        <!-- https://www.scorchsoft.com/blog/youtube-z-index-embed-iframe-fix/ -->
                    </div>
                </div> <!-- .col-md-8 -->
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .video-feature -->


    <!-- CONTACT -->
    <div class="content-section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center section-header">
                    <h2 class="section-title">Contact Us</h2>
                    <p>Esta sección se encuentra en prueba. Aún no se cuenta con un correo electrónico. Estamos a la espera de poder adquirir más cuentas de correo y así poder habilitar esta sección. Los comentarios que envíe aún no tendrán ningún efecto</p>
                </div>
            </div>
            <div class="row">
               <div class="col-md-5 contact-info">
                   <p>Etiam interdum elementum massa amaas, sit amet pretium orci sollicitudin pellenue. Aeneanss risus neque, dignissim nec orci in. <br><br>Hendrerit tempor ligula. Suspendisse sed nisi eget sapien ltrices.</p>
                   <ul>
                       <li><i class="fa fa-phone"></i> 090-080-0980</li>
                       <li><i class="fa fa-map-marker"></i> 360 Aenean Quis Semper, Maecenas 10450</li>
                       <li><i class="fa fa-envelope"></i> <a href="mailto:info@company.com">info@company.com</a></li>
                   </ul>
               </div> <!-- .col-md-5 -->
               <div class="col-md-7">
                    <div class="row">
                        <form class="contact-form" action="#" method="post">
                           <fieldset class="col-md-6">
                               <input type="text" name="name" placeholder="Name...">
                           </fieldset>
                           <fieldset class="col-md-6">
                               <input type="email" name="email" placeholder="Email...">
                           </fieldset>
                           <fieldset class="col-md-12">
                               <input type="text" name="subject" placeholder="Subject...">
                           </fieldset>
                           <fieldset class="col-md-12">
                               <textarea name="message" id="message" cols="30" rows="5" placeholder="Message..."></textarea>
                           </fieldset>
                           <fieldset class="col-md-12">
                               <input type="submit" value="Send Message" class="main-button">
                           </fieldset>
                        </form>
                    </div> <!-- .row -->
               </div> <!-- .col-md-8 -->
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- #contact -->
    @endif
@endsection