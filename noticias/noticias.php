<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NOM-035 - Noticias</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="../img/BBB.jpg" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="../css/style.css" rel="stylesheet">

</head>

<body>
    <!-- Header -->
    <header id="header" style="height: 80px;">

        <div class="container">

            <div class="logo float-left">
                <a href="../" class="scrollto"><img src="../img/logo.png" alt="" class="img-fluid"></a>
            </div>

            <nav class="main-nav float-right d-none d-lg-block">
                <ul>
                    <?php
                    session_start();
                    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                    ?>
                        <li class="active"><a href="../">Inicio</a></li>
                        <li class="drop-down"><a href="">Acerca de nostros</a>
                            <ul>
                                <li><a href="../#aboutus">¿Quiénes somos?</a></li>
                                <li><a href="../#services">Políticas</a></li>
                                <li><a href="../#why-us">Seguridad</a></li>
                                <li><a href="../#forma">Formación</a></li>
                                <li><a href="../#features">Comunicacion</a></li>
                                <li><a href="../#call-to-action">Reconocimientos</a></li>
                                <li><a href="../#eventos">Eventos</a></li>
                                <li><a href="../#autoevaluacion">Autoevaluación</a></li>
                            </ul>
                        </li>
                        <li><a href="../noticias/noticias.php">Noticias</a></li>
                        <li><a href="../calendario.php">Calendario</a></li>
                        <li><a href="../images/imagenes_public.php">Fotos</a></li>
                        <li><a href="../account/login.php">Iniciar Sesión</a></li>
                </ul>
            <?php
                    } else {
            ?>
                <li class="active"><a href="../">Inicio</a></li>
                <li class="drop-down"><a href="">Acerca de nostros</a>
                    <ul>
                        <li><a href="../#aboutus">¿Quiénes somos?</a></li>
                        <li><a href="../#services">Políticas</a></li>
                        <li><a href="../#why-us">Seguridad</a></li>
                        <li><a href="../#forma">Formación</a></li>
                        <li><a href="../#features">Comunicacion</a></li>
                        <li><a href="../#call-to-action">Reconocimientos</a></li>
                        <li><a href="../#eventos">Eventos</a></li>
                        <li><a href="../#autoevaluacion">Autoevaluación</a></li>
                    </ul>
                </li>
                <li><a href="../noticias/noticias.php">Noticias</a></li>
                <li><a href="../calendario.php">Calendario</a></li>
                <li><a href="../images/imagenes.php">Fotos</a></li>
                <li class="drop-down">
                    <a href="" style="height: 42px; padding-bottom: 0px; padding-top: 6px">
                        <img src="../account/user_pics/<?php echo $_SESSION['username'] . ".jpg" ?>" width="32" height="32" class="rounded-circle">
                        <?php echo $_SESSION['name'] ?>
                    </a>

                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <?php

                        switch ($_SESSION['role']) {
                            case "admin":
                        ?>
                                <li><a href="../images/upload.php">Subir Foto</a></li>
                                <li><a href="../images/all_img.php">Control de fotos</a></li>
                                <li><a href="../noticias/upload.php">Subir Noticia</a></li>
                                <li><a href="../noticias/control.php">Control de noticias</a></li>
                                <li><a href="../account/reset_password.php">Cambiar contraseña</a></li>
                                <li><a href="../account/logout.php">Cerrar sesión</a></li>
                            <?php
                                break;
                            case "user":
                            ?>
                                <li><a href="../account/reset_password.php">Cambiar contraseña</a></li>
                                <li><a href="../account/logout.php">Cerrar sesión</a></li>
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

    <!-- Calendario -->
    <main id="main">

        <section id="portfolio" class="section-bg">
            <div class="container">

                <header class="section-header">
                    <h3 class="section-title">Noticias</h3>
                </header>
                <hr>

                <div class="row">
                    <div class="col-lg-12">
                        <p style="text-align: center;">Esta sección muestra las noticas de BBB Industries.</p>
                    </div>
                </div>
                <style>
                    body {
                        background: #f5f8fd;
                        color: #444;
                        font-family: "Open Sans", sans-serif;
                    }
                </style>
                <!-- Connection -->
                <?php

                $error = false;
                $config = include '../config.php';

                try {
                    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
                    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

                    $consultaSQL = "SELECT * FROM tbl_noticias ORDER BY fcreate DESC;";

                    $sentencia = $conexion->prepare($consultaSQL);
                    $sentencia->execute();

                    $noticia = $sentencia->fetchAll();
                } catch (PDOException $error) {
                    $error = $error->getMessage();
                }
                ?>
                <!-- End connection -->

                <!-- Noticias -->
                <?php
                if ($noticia && $sentencia->rowCount() > 0) {
                    foreach ($noticia as $fila) {
                ?>
                        <div class="card mb-3 shadow p-3 mb-5 bg-body rounded">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../noticias/imagenes/<?php echo ($fila["image"]); ?>" alt="..." style="width: 338px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong><?php echo ($fila["title"]); ?></strong></h5>
                                        <p class="card-text"><?php echo ($fila["text"]); ?></p>
                                        <p class="card-text"><small class="text-muted">Publicado el: <?php echo ($fila["fcreate"]); ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
                }
                ?>

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
    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/jquery/jquery-migrate.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/mobile-nav/mobile-nav.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/counterup/counterup.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/isotope/isotope.pkgd.min.js"></script>
    <script src="../lib/lightbox/js/lightbox.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="../js/main.js"></script>

</body>

</html>