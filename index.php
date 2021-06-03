<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>NOM-035</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/BBB.jpg" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
  <!-- Header -->
  <header id="header" style="height: 80px;">

    <div class="container">

      <div class="logo float-left">
        <a href="./" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <?php
          session_start();
          if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
          ?>
            <li class="active"><a href="#intro">Inicio</a></li>
            <li class="drop-down"><a href="">Acerca de nostros</a>
              <ul>
                <li><a href="#aboutus">¿Quiénes somos?</a></li>
                <li><a href="#services">Políticas</a></li>
                <li><a href="#why-us">Seguridad</a></li>
                <li><a href="#forma">Formación</a></li>
                <li><a href="#features">Comunicacion</a></li>
                <li><a href="#call-to-action">Reconocimientos</a></li>
                <li><a href="#eventos">Eventos</a></li>
                <li><a href="#autoevaluacion">Autoevaluación</a></li>
              </ul>
            </li>
            <li><a href="noticias/noticias.php">Noticias</a></li>
            <li><a href="calendario.php">Calendario</a></li>
            <li><a href="images/imagenes_public.php">Fotos</a></li>
            <li><a href="account/login.php">Iniciar Sesión</a></li>
        </ul>
      <?php
          } else {
      ?>
        <li class="active"><a href="#intro">Inicio</a></li>
        <li class="drop-down"><a href="">Acerca de nostros</a>
          <ul>
            <li><a href="#aboutus">¿Quiénes somos?</a></li>
            <li><a href="#services">Políticas</a></li>
            <li><a href="#why-us">Seguridad</a></li>
            <li><a href="#forma">Formación</a></li>
            <li><a href="#features">Comunicacion</a></li>
            <li><a href="#call-to-action">Reconocimientos</a></li>
            <li><a href="#eventos">Eventos</a></li>
            <li><a href="#autoevaluacion">Autoevaluación</a></li>
          </ul>
        </li>
        <li><a href="noticias/noticias.php">Noticias</a></li>
        <li><a href="calendario.php">Calendario</a></li>
        <li><a href="images/imagenes.php">Fotos</a></li>
        <li class="drop-down">
          <a href="" style="height: 42px; padding-bottom: 0px; padding-top: 6px">
            <img src="account/user_pics/<?php echo $_SESSION['username'] . ".jpg" ?>" width="32" height="32" class="rounded-circle">
            <?php echo $_SESSION['name'] ?>
          </a>

          <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <?php

            switch ($_SESSION['role']) {
              case "admin":
            ?>
                <li><a href="images/upload.php">Subir Foto</a></li>
                <li><a href="images/all_img.php">Control de fotos</a></li>
                <li><a href="noticias/upload.php">Subir Noticia</a></li>
                <li><a href="noticias/control.php">Control de noticias</a></li>
                <li><a href="account/reset_password.php">Cambiar contraseña</a></li>
                <li><a href="account/logout.php">Cerrar sesión</a></li>
              <?php
                break;
              case "user":
              ?>
                <li><a href="account/reset_password.php">Cambiar contraseña</a></li>
                <li><a href="account/logout.php">Cerrar sesión</a></li>
            <?php
                break;
            }
            ?>
          </ul>
        </li>
        </ul>
      <?php
          }
      ?>
      </nav>

    </div>
  </header>
  <!-- #header -->

  <!-- Intro section -->
  <section id="intro" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
        <div class="col-md-12 intro-info order-md-first order-last">
          <h2 style="font-size: 100px;">NOM-035</h2>
          <div>
            <a href="#aboutus" class="btn-get-started scrollto">Empezar</a>
          </div>
        </div>

        <!-- <div class="col-md-6 intro-img order-md-last order-first">
          <img src="img/nom035/bg.png" alt="" class="img-fluid">
        </div> -->
      </div>

    </div>
  </section>

  <main id="main">

    <!-- Mision, vision, meta valores -->
    <section id="aboutus">
      <br>
      <div class="section-header">
        <p>
        <h3>¿Quiénes somos?</h3>
        </p>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-6  wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <h4 class="title"><a href="">Misión</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
          </div>
          <div class="col-md-6  wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <h4 class="title"><a href="">Visión</a></h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
            </div>
          </div>

          <div class="col-md-6  wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <h4 class="title"><a href="">Meta</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
          </div>
          <div class="col-md-6  wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <h4 class="title"><a href="">Valores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
          </div>
        </div>
      </div>
      <br>
    </section>


    <!-- Politicas -->
    <section id="services" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Políticas</h3><br>
          <h4 style="text-align:center; color:#413e66;"><strong>¿Cómo nos regimos?</strong></h4>
          <!-- <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus.</p> -->
        </header>

        <div class="row feature-item pt-5">
          <div class="col-lg-4 wow fadeInUp order-1 order-lg-2">
            <img src="img/policies.png" class="img-fluid" alt="" style="height: 300px;">
            </style>
          </div>



          <div class="col-lg-8 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1">
            <h5>
              <li class="shadow-sm p-3 mb-5 bg-white rounded">Politicas</li>
            </h5>
            <h5>
              <li class="shadow-sm p-3 mb-5 bg-white rounded">Reglamento Internet de Trabajo</li>
            </h5>
            <h5>
              <li class="shadow-sm p-3 mb-5 bg-white rounded">Protocolos de actuación</li>
            </h5>
          </div>

        </div>

      </div>
    </section>

    <!-- Seguridad -->
    <section id="why-us" class="wow fadeIn">
      <div class="container-fluid">

        <header class="section-header">
          <h3>Seguridad</h3><br>
          <h4 style="text-align:center; color:#413e66;"><strong>¿Cómo nos cuidamos?</strong></h4>
          <p>
        </header>

        <div class="row">

          <div class="col-lg-6">
            <div class="why-us-img">
              <img src="img/risk2.jpg" alt="" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="why-us-content">
              <div class="features wow bounceInUp clearfix">
                <i class="fa fa-check-circle" style="color: #002395cf;"></i>
                <p>
                <h4>Brigadas</h4>
                <p>
              </div>

              <div class="features wow bounceInUp clearfix">
                <i class="fa fa-check-circle" style="color: #002395cf;"></i>
                <h4>Comisión Mixta de Seguridad e Higiene</h4>
                <p>
              </div>

              <div class="features wow bounceInUp clearfix">
                <i class="fa fa-check-circle" style="color: #002395cf;"></i>
                <h4>Matriz de uso de EPP </h4>
                <p>
              </div>

              <div class="features wow bounceInUp clearfix">
                <i class="fa fa-check-circle" style="color: #002395cf;"></i>
                <h4>Simulacros</h4>
                <p>
              </div>

              <div class="features wow bounceInUp clearfix">
                <i class="fa fa-check-circle" style="color: #002395cf;"></i>
                <h4>Comisión de Capacitación, Adiestramiento y Productividad</h4>
                <p>
              </div>

              <div class="features wow bounceInUp clearfix">
                <i class="fa fa-check-circle" style="color: #002395cf;"></i>
                <h4>Línea Etica, Recepción de Quejas de Violencia Laboral</h4>
                <p>
              </div>

              <div class="features wow bounceInUp clearfix">
                <i class="fa fa-check-circle" style="color: #002395cf;"></i>
                <h4>Campañas y Servicios Médicos</h4>
                <p>
              </div>

            </div>

          </div>

        </div>

      </div>
    </section>



    <!-- Reconocimientos -->
    <section id="call-to-action" class="wow fadeInUp">
      <div class="container"><br>
        <h3 style="text-align:center; color:#413e66; font-size: 36px;">Reconocientos</h3><br>
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <!-- <h3 style="text-align:center; color:#413e66;" class="cta-title">Reconocientos</h3> -->
          </div>
          <div class="col-lg-6 col-md-6 feature-grid">
            <div class="feature-body service1">
              <div class="feature-img" style="color: #002395;">
                <span class="fa fa-clock-o" aria-hidden="true"></span>
              </div>
              <div class="feature-info mt-4">
                <h3 class="feature-titel mb-2">Antiguedad</h3>
              </div>
            </div>

          </div>

          <div class="col-lg-6 col-md-6 feature-grid">
            <div class="feature-body service1">
              <div class="feature-img" style="color: #002395;">
                <span class="fa fa-check-square" aria-hidden="true"></span>
              </div>
              <div class="feature-info mt-4">
                <h3 class="feature-titel mb-2">Lean Manufacturing</h3>
              </div>
            </div>

          </div>

          <div class="col-lg-6 col-md-6 feature-grid">
            <div class="feature-body service1">
              <div class="feature-img" style="color: #002395;">
                <span class="fa fa-cogs" aria-hidden="true"></span>
              </div>
              <div class="feature-info mt-4">
                <h3 class="feature-titel mb-2">5 S's</h3>
              </div>
            </div>

          </div>

          <div class="col-lg-6 col-md-6 feature-grid">
            <div class="feature-body service1">
              <div class="feature-img" style="color: #002395;">
                <span class="fa fa-star" aria-hidden="true"></span>
              </div>
              <div class="feature-info mt-4">
                <h3 class="feature-titel mb-2">Reconocimiento al Desempeño</h3>
              </div>
            </div>

          </div>


        </div>
      </div>
    </section>

    <!-- Comunicacion -->
    <section id="features">
      <div class="container">

        <div class="row feature-item">
          <div class="col-lg-6 wow fadeInUp">
            <img src="img/features-1.svg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
            <h4 style="color:#413e66; font-size: 36px;">Comunicación</h4><br>

            <div class="container">
              <div class="row">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                  <div class="card-text">
                    <h5 class="card-text">Canales de Difusión de la Información</h5>
                    <hr>
                    <h5 class="card-text">Pantallas</h5>
                    <hr>
                    <h5 class="card-text">Comunicados</h5>
                    <hr>
                    <h5 class="card-text">Medios Electrónicos</h5>
                    <hr>
                    <h5 class="card-text">Pizarrones</h5>
                    <hr>
                    <h5 class="card-text">Reuniones de arranque</h5>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>


        <div id="forma" class="row feature-item mt-5 pt-5">
          <div class="col-lg-6 wow fadeInUp order-1 order-lg-2" style="visibility: visible; animation-name: fadeInUp;">
            <img src="img/team.jpg" class="img-fluid" alt="" style="height: 500px;">
          </div>

          <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1" style="visibility: visible; animation-name: fadeInUp;">
            <h4 style="color:#413e66; font-size: 36px;">Formación</h4><br>
            <div class="container">
              <div class="row">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                  <div class="card-text">
                    <h5 class="card-text">Programas de Mejora Continua</h5>
                    <hr>
                    <h5 class="card-text">5 S’s</h5>
                    <hr>
                    <h5 class="card-text">Kaisen</h5>
                    <hr>
                    <h5 class="card-text">Lean Manufacturing</h5>
                    <hr>
                    <h5 class="card-text">Cartas de Procesos</h5>
                    <hr>
                    <h5 class="card-text">Plan Anual de Capacitación</h5>
                    <hr>
                    <h5 class="card-text">Planes de Educación (ITEA, bachillerato, educación superior, maestrías, etc.)</h5>
                    <hr>
                    <h5 class="card-text">Planes de Crecimiento Laboraln</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>


        <div class="row feature-item mt-5 pt-5">
          <!-- <div class="col-lg-6 wow fadeInUp order-1 order-lg-2">
            <img src="img/features-2.svg" class="img-fluid" alt="">
          </div> -->

          <div id="eventos" class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1">
            <h4 style="color:#413e66; font-size: 36px;">Eventos</h4><br>
            <h4>¿Cómo nos Divertimos?</h4>
            <div class="row">
              <div class="col">
                <p>
                  <li>Cumpleaños</i>
                </p>
                <p>
                  <li>Día del Medio Ambiente</li>
                </p>
                <p>
                  <li>Torneos de Futbol</li>
                </p>
                <p>
                  <i>Mi Voz BBB</i>
                </p>
              </div>

              <div class="col">
                <p>
                  <li>Exatlon</li>
                </p>
                <p>
                  <li>Día del Niño</li>
                </p>
                <p>
                  <li>Día de la Madre</li>
                </p>
                <p>
                  <li>Semana de la Salud</li>
                </p>

              </div>
            </div>
          </div>

          <div id="autoevaluacion" class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1">
            <h4 style="color:#413e66; font-size: 36px;">Autoevaluación</h4><br>
            <h4>¿Cómo nos Fortalecemos?</h4>
            <div class="row">
              <div class="col">
                <p>
                  <li>Evaluación del Clima Laboral</i>
                </p>
                <p>
                  <li>Aplicación de Encuestas de la Nom 035</li>
                </p>
                <p>
                  <li>Resultados del Ejercicio</li>
                </p>
              </div>

              <div class="col">
                <p>
                  <li>Plan de Acciones Correctivas</li>
                </p>
                <p>
                  <li>Atención de Afectados</li>
                </p>
                <p>
                  <li>Detección de Necesidades de Capacitación</li>
                </p>

              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

  </main>

  <!-- Footer -->
  <footer id="footer" style="background-color: #f5f8fd;">
    <div class="container">
      <div class="copyright">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script> BBB Industries.
      </div>
      <div class="credits">
        Desarrollado por <a href="http://emirhernandez.epizy.com/" target="_blank">Emir Hernandez</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>

</html>