<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-5JBQPS6SX1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-5JBQPS6SX1');
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:url" content="https://www.congresoparques.com/" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Congreso Parques Mérida 2024" />
  <meta name="og:site_propiedad" content="Congreso Parques Mérida 2024">
  <meta property="og:description" content="A specialized event of educational and experiential content, aimed at public space professionals and urban parks" />
  <title>Congreso Parques Mérida 2024</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="./build/img/favicon.png" />
  <link rel="stylesheet" href="./build/css/app.css">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

</head>

<body>
  <?php include 'includes/templates/banner_header.php'; ?>
  <nav class="navbar sticky-top navbar-expand-md">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="./build/img/logo_congreso_parques_180x74.png" alt="Logotipo Congreso Parques" class="d-inline-block align-text-top">
      </a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrincipal" aria-controls="navbarPrincipal" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarPrincipal">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Acerca de
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="congreso_parques.php">Congreso</a></li>
              <li><a class="dropdown-item" href="comite.php">Organizadores</a></li>
              <li><a class="dropdown-item" href="preguntas.php">Preguntas Frecuentes</a></li>
              <li><a class="dropdown-item" href="preparate.php">Prepárate</a></li>
              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle" href="#">Galerías</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="https://www.flickr.com/photos/187067785@N06/albums/72177720318221804">LEÓN, MÉXICO 2023</a></li>
                  <li><a class="dropdown-item" href="https://www.flickr.com/photos/187067785@N06/albums/72177720304254471">MONTERREY, MÉXICO 2022</a></li>
                  <li><a class="dropdown-item" href="https://www.flickr.com/photos/181957383@N07/albums/72157716439617597/">LEÓN, MÉXICO 2020</a></li>
                  <li><a class="dropdown-item" href="https://www.flickr.com/photos/181957383@N07/albums/72157709039135088/">MONTERREY, MÉXICO 2019</a></li>
                  <li><a class="dropdown-item" href="https://www.flickr.com/photos/181957383@N07/albums/72157711451410436/">SALTA, ARGENTINA 2019</a></li>
                  <li><a class="dropdown-item" href="https://www.flickr.com/photos/181957383@N07/albums/72157712815040782/">MÉRIDA, MÉXICO 2018</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Actividades
            </a>
            <ul class="dropdown-menu">
              <!-- <li><a class="dropdown-item" href="programa.php">Programa</a></li> -->
            <li><a class="dropdown-item" href="talleres.php">Talleres</a></li>
            <!-- <li><a class="dropdown-item" href="expo_parques.php">Expo Parques</a></li> -->
            <li><a class="dropdown-item" href="sociales.php">Eventos Sociales</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Sede
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="sede.php">Mérida, Yucatán</a></li>
              <li><a class="dropdown-item" href="conectividad.php">Conectividad</a></li>
              <li><a class="dropdown-item" href="hospedaje.php">Hospedaje</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Convocatorias
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="sesiones.php">Sesiones Educativas</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="posters.php">Pósters Científicos</a></li>
              <li><a class="dropdown-item" href="voluntarios.php">Voluntarios</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.expoespaciopublico.com">
              Expo Espacio Público
            </a> 
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="header header_home">
    <div class="d-flex justify-content-evenly align-items-center p-sm-4">
      <img src="img/logotipos/recursomerida.png" class="img-fluid m-sm-4">
      <img src="build/img/recursomerida2.png" class="d-sm-block d-none">
    </div>
  </header>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+6zt3fwb6Y9Qp0D+NfPpb47CzXc8b" crossorigin="anonymous"></script>
