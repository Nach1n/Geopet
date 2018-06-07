<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>{{ $app_option->app_name }}</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('img/iconogeo.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/general.css') }}" rel="stylesheet">

</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <a href="#intro"><img src="{{ asset('img/logo.png') }}" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Inicio</a></li>
          <li><a href="#about">Planes</a></li>
          <li><a href="#producto">Productos</a></li>
          <li><a href="#services">F.A.Q</a></li>
          <li><a href="#contact">Contacto</a></li>
          @auth
          <li class="menu-has-children"><a class="sf-with-ul" style="color:#F2A51F;">Hola, {{auth()->user()->name}}</a>
            <ul style="display: none;">
              <li><a href="{{ route('home') }}">Panel</a></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  {{ csrf_field() }}
                  <button type="submit" id="front-logout-button" class="btn btn-link">Cerrar sesión</button>
                </form>
              </li>
            </ul>
          </li>
          @else
          <li><a href="{{ route('register') }}">Registrarse</a></li>
          <li><a href="{{ route('login') }}">Inicio de sesión</a></li>
          @endauth   
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <div class="carousel-background"><img src="{{ asset('img/intro-carousel/1.jpg') }}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>¿Quieres evitar la angustia</h2> 
                <h2>de perder tu mascota?</h2>
                <p>{{ $app_option->app_description }}</p>
                <div class="text-center"><a href="{{ route('register') }}" class="btn btn-success">¡Registrate ahora!</a></div>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{ asset('img/intro-carousel/2.jpg') }}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>¿Quieres evitar la angustia</h2> 
                <h2>de perder tu mascota?</h2>
                <p>{{ $app_option->app_description }}</p>
                <div class="text-center"><a href="{{ route('register') }}" class="btn btn-success">¡Registrate ahora!</a></div>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{ asset('img/intro-carousel/3.jpg') }}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>¿Quieres evitar la angustia</h2> 
                <h2>de perder tu mascota?</h2>
                <p>{{ $app_option->app_description }}</p>
                <div class="text-center"><a href="{{ route('register') }}" class="btn btn-success">¡Registrate ahora!</a></div>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">
    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Planes</h3>
        </header>
        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="{{ asset('img/plan1.png') }}" alt="" class="img-fluid">
              </div>
              <h2 class="title"><a href="#">Plan Normal</a></h2>
              <p>Compatibilidad GPS</p>
              <p>Compatibilidad 2G/3G</p>
              <p>Mensajes de alerta via SMS</p>
              <p>Monitorio 24/7</p>
              <p>Vinculación de 1 mascota</p>
              <button type="button" class="btn btn-link">Ver más...</button>
              <h2>Precio: $5.000 CLP al mes</h2>
              <div class="text-center"><button type="button" class="btn btn-success">Contratar</button></div>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="{{ asset('img/plan2.png') }}" alt="" class="img-fluid">
              </div>
              <h2 class="title"><a href="#">Plan Familiar</a></h2>
              <p>Compatibilidad GPS</p>
              <p>Compatibilidad 2G/3G</p>
              <p>Mensajes de alerta via SMS</p>
              <p>Monitorio 24/7</p>
              <p>Vinculación hasta 3 mascota</p>
              <button type="button" class="btn btn-link">Ver más...</button>
              <h2>Precio: $10.000 CLP al mes</h2>
              <div class="text-center"><button type="button" class="btn btn-success">Contratar</button></div>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="{{ asset('img/plan3.png') }}" alt="" class="img-fluid">
              </div>
              <h2 class="title"><a href="#">Plan Premium</a></h2>
              <p>Compatibilidad GPS</p>
              <p>Compatibilidad 2G/3G</p>
              <p>Mensajes de alerta via SMS</p>
              <p>Monitorio 24/7</p>
              <p>Vinculación de 5 o mas mascotas</p>
              <button type="button" class="btn btn-link">Ver más...</button>
              <h2>Precio: $15.000 CLP al mes</h2>
              <div class="text-center"><button type="button" class="btn btn-success">Contratar</button></div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      producto Section
    ============================-->
   <section id="producto">
      <div class="container">

        <header class="section-header">
          <h3>Productos</h3>
        </header>
        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="{{ asset('img/gpsnormal.png') }}" alt="" class="img-fluid">
              </div>
              <p>             </p>
              <p>Compatibilidad GPS</p>
              <p>Compatibilidad 2G/3G</p>
              <p>Duración activo 30 hrs.</p>
              <p>Duración en modo reposo 300 hrs.</p>
              <p>Tamaño 70mmx37mmx20mm</p>
              <p>Peso 65gr.</p>
              <button type="button" class="btn btn-link">Ver más...</button>
              <h2>Precio: $40.000 CLP</h2>
              <div class="text-center"><button type="button" class="btn btn-success">Comprar</button></div>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="{{ asset('img/gpsgato.png') }}" alt="" class="img-fluid">
              </div>
              <p>             </p>
              <p>Compatibilidad GPS</p>
              <p>Compatibilidad 2G/3G</p>
              <p>Duración activo 24 hrs.</p>
              <p>Duración en modo reposo 300 hrs.</p>
              <p>Tamaño 47mmx50mmx15mm</p>
              <p>Peso 40gr.</p>
              <button type="button" class="btn btn-link">Ver más...</button>
              <h2>Precio: $40.000 CLP</h2>
              <div class="text-center"><button type="button" class="btn btn-success">Comprar</button></div>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="{{ asset('img/gpspro.png') }}" alt="" class="img-fluid">
              </div>
              <p>             </p>
              <p>Compatibilidad GPS</p>
              <p>Compatibilidad 2G/3G</p>
              <p>Duración activo 30 hrs.</p>
              <p>Duración en modo reposo 300 hrs.</p>
              <p>Tamaño 45mmx35mmx22mm</p>
              <p>Peso 35gr.</p>
              <button type="button" class="btn btn-link">Ver más...</button>
              <h2>Precio: $50.000 CLP</h2>
              <div class="text-center"><button type="button" class="btn btn-success">Comprar</button></div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #about -->
    <!-- #producto -->

 <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Preguntas Frecuentes</h3>
          <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus, ad pro quaestio laboramus. Ei ubique vivendum pro. At ius nisl accusam lorenta zanos paradigno tridexa panatarel.</p>
        </header>

        <div class="row">

          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
            <h4 class="title"><a href="">Dolor Sitema</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-paper-outline"></i></div>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
            <h4 class="title"><a href="">Magni Dolores</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-barcode-outline"></i></div>
            <h4 class="title"><a href="">Nemo Enim</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-people-outline"></i></div>
            <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div>

        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contactanos</h3>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Dirección</h3>
              <address>{{$app_option->app_address_street}} #{{$app_option->app_address_number}}, {{$app_option->app_address_commune}}, {{$app_option->app_address_country}}</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Teléfono</h3>
              <p><a href="tel:+{{$app_option->app_phone}}">{{$app_option->app_phone}}</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:{{$app_option->app_email}}">{{$app_option->app_email}}</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" data-rule="minlen:4" data-msg="Por favor ingresar al menos 4 caracteres" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Por favor ingresar un email valido" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" data-rule="minlen:4" data-msg="Por favor ingresar al menos 8 caracteres" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Por favor escribe algo para nosotros" placeholder="Mensaje"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Enviar</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
  <script src="{{ asset('lib/touchSwipe/jquery.touchSwipe.min.js') }}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('contactform/contactform.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>