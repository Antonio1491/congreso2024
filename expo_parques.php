<?php require 'includes/templates/head.php'; ?>
<header class="header">
  <div class="container">
    <h1 class="header__titulo">Expo Espacio Público</h1>
    <img src="build/img/linea.png" alt="" class="img-fluid">
  </div>
</header>
<main>
  <div class="container-fluid bgDegradado">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 text-center p-md-5">
          <p class="lead white">
          Expo Espacio Público 2024 es una exposición especializada que se realiza dentro del Congreso Parques 2024,  <br>
          <strong class="verde bolded"> y que reúne a los principales proveedores de productos y servicios</strong><br> 
          a los principales proveedores de productos y servicios para el diseño, planeación, construcción, operación y mantenimiento de áreas verdes, áreas comunes y de convivencia dentro de los desarrollos residenciales, parques, plazas públicas, cruceros, ciclovías, andadores, etc., con el objetivo de tener más y mejores espacios públicos que eleven la calidad de vida de los ciudadanos.
          </p> 
        </div>
      </div>
    </div>
  </div>

  <div class="container d-flex">
    <div>
      <img src="build/img/expo.jpg" alt="" width="100%">
    </div>
    <div>
      <img src="build/img/expo.jpg" alt="" width="100%">
    </div>
  </div>

  <!-- <div class="container-fluid primaryBg pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <div class="text-center mb-3">
            <img src="build/img/expo.png" alt="" class="img_150">
          </div>
          <h3 class="subtituloBMin text-center">EXPO PARQUES<br>
            <h5 class="subtituloBMin text-center" style="margin-top: -10px">BENEFICIOS DE PARTICIPAR</h5>
          </h3>
          <ul class="mt-4">
            <li>Explora el mercado</li>
            <li>Conoce a los proveedores</li>
            <li>Intercambia experiencias</li>
            <li>Conoce las tendencias y los productos innovadores</li>
            <li>Compara calidad, precios y prestaciones</li>
          </ul>
        </div>
        <div class="col-sm-12 col-md-6 text-center">
          <img src="build/img/expo_foto.jpg" alt="" class="img_350">
        </div>
      </div>
    </div>
  </div> -->

  <div class="container mt-2 mb-5">
    <!-- <div class="row">
      <div class="col-sm-12 col-md-12">
        <h2 class="subtituloPMin text-center">Expositores Participantes</h2>
      </div>
    </div> -->
    <div class="row mb-5">
      <?php require 'includes/templates/expositores.php'; ?>
    </div>
  </div>

  <div class="container-fluid primaryBg pt-5 pb-5">
    <div class="container">
      <div class="row">
        <h4 class="white text-center subtituloCMin mb-4">Datos Generales</h4>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <h5 class="subtituloBMin">Duración:</h5>
          <p>2 días</p>
          <hr>
          <h5 class="subtituloBMin">Lugar:</h5>
          <p>León, Guanajuato, México</p>
          <hr>
          <h5 class="subtituloBMin">Fecha:</h5>
          <p>Del 23 al 24 de noviembre</p>

        </div>
        <div class="col-sm-12 col-md-8">
          <h5 class="subtituloBMin">Objetivo del evento:</h5>
          <p>Presentar a los visitantes a los mejores proveedores de productos y servicios para el diseño, la construcción y el equipamiento de parques urbanos y espacios públicos. 
          </p>
          <div class="row">
            <div class="row">
              <h5 class="subtituloBMin">Tipo de expositores:</h5>
            </div>
            <div class="col-sm-12 col-md-6">
              <ul>
                <li>Equipo de mantenimiento</li>
                <li>Sistemas de riego / equipos hidráulicos</li>
                <li>Viveros y jardines</li>
                <li>Árboles de gran tamaño</li>
                <li>Productos recreativos</li>
                <li>Juegos para niños</li>
                <li>Juegos acuáticos</li>
              </ul>
            </div>
            <div class="col-sm-12 col-md-6">
              <ul>
                <li>Equipo deportivo</li>
                <li>Mobiliario para parques caninos</li>
                <li>Muebles para monopatines y bicicletas</li>
                <li>Barras</li>
                <li>Superficies</li>
                <li>Sombras y velarías</li>
                <li>Luminarias</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <h5 class="subtituloPMin text-center mb-3">¡Participa como un expositor!</h5>
        <p class="text-center">En ediciones anteriores de Expo Parques, los expositores tuvieron la oportunidad de conocer clientes potenciales, contactar funcionarios públicos y promotores inmobiliarios a nivel regional y nacional, logrando así fortalecer alianza entre ellos. </p>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-sm-12 col-md-6">
        <p>
        <strong>Nuestra área de exhibición: </strong><br>
        Para más información sobre patrocinios o venta de puestos: <br>
        De miércoles a viernes<br>
        A partir de las 9:00 am hasta las 6:00 pm (GMT-6)<br>
        Teléfono 01 999 944 4060<br>
        WhatsApp +52 999 960 0765<br>
        comercial@congresoparques.com<br>
        expo@congresoparques.com
        </p>
        <p><strong>Aparta tu puesto con un 30%</strong><br>
        <em>*Precios en Pesos Mexicanos y dólares americanos más IVA<br>
        (Tasa de IVA 16%)</em>
        </p>
      </div>
      <div class="col-sm-12 col-md-6 text-center">
        <a href="build/img/plano-expo.png" data-lightbox="plano-expo" data-title="Expo Parques">
          <img src="build/img/plano-expo.png" alt="" class="img_300" >
        </a>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <img src="build/img/linea_gris.png" alt="">
    </div>
  </div>

</main>

  <?php require 'includes/templates/sede.php'; ?>

  <div class="container mt-5">
    <div class="row">
      <img src="build/img/linea_gris.png" alt="">
    </div>
  </div>

  <?php require 'includes/templates/patrocinadores.php'; ?>

</main>
<?php require 'includes/templates/footer.php'; ?>