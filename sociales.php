<?php require 'includes/templates/head.php'; ?>
<header class="header">
  <div class="container">
    <h1 class="header__titulo">Eventos Sociales</h1>
    <img src="build/img/linea.png" alt="">
    <p>¡Ha llegado el momento de intercambiar tarjetas y divertirse!</p>
  </div>
</header>
<main>
  <div class="container-fluid bgDegradado">
    <div class="container">
      <div class="row">
        <div class="col col-sm-12 col-md-12 text-center p-md-5">
          <p class="lead white">Amplía tu red profesional y disfruta de los 3 eventos organizados especialmente para ti. <strong class="verde bolded">Asiste a la fiesta de Apertura, la Beer Party y al Evento de Clausura del Congreso Parques</strong>. Reúnete en un ambiente relajado, diviértete y establece contactos. 
          </p>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container-fluid ">
    <article class="row bgApertura">
      <div class="col-sm-12 col-md-6"></div>
      <div class="col-sm-12 col-md-6 align-self-center">
        <h2 class="subtituloBMin">Evento de Apertura</h2>
        <h4 class="subtituloComplementario">23 de octubre</h4>
        <p class="white">No te puedes perder nuestro Evento de Apertura donde podrás experimentar una muestra de Mérida, su música y antojitos mexicanos. ¡ Sin duda, el ambiente ideal para socializar y relajarse después del primer día del congreso!
        </p>
        <div class="row detalles_evento">
          <div class="col-md-6 col-sm-12">
           <!--  <span><i class="bi bi-clock "></i><p class="subtituloComplementario">  Hora:</p></span>
             <p class="white">8:00 p.m. - 11 p.m.</p> -->
          </div>
          <div class="col-md-6 col-sm-12">
            <!-- <span><i class="fi-marker"></i><p class="subtituloComplementario"> Lugar:</p></span>
            <p><a href="https://goo.gl/maps/F4EUNkGaD9SjH2Xy8" class="white">Museo de Ciencias Explora </a></p> -->
          </div>
        </div>
      </div>
    </article>
  </div>
  <div class="container-fluid ">
    <article class="row bgBeerparty">
      <div class="col-sm-12 col-md-6 align-self-center">
        <h2 class="subtituloBMin">Beer Party</h2>
        <h4 class="subtituloComplementario">24 de octubre</h4>
        <p class="white">Asiste a la Beer Party dentro de  Expo Espacio Público, donde tendrás la oportunidad de probar la deliciosa cerveza artesanal de Mérida, conocer a los expositores y hacer networking. 
        </p>
        <div class="row detalles_evento">
          <!-- <div class="col-md-6 col-sm-12">
            <span><i class="bi bi-clock"></i> Hora:</span>
            <p>8:00 p.m. - 11 p.m.</p>
          </div> -->
          <div class="col-md-6 col-sm-12">
            <!-- <span><i class="fi-marker"></i><p class="subtituloComplementario">  Lugar:</p></span>
            <p class="white">Poliforum León</p> -->
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6"></div>
    </article>
  </div>
  <div class="container-fluid">
    <article class="row bgClausura">
      <div class="col-sm-12 col-md-6"></div>
      <div class="col-sm-12 col-md-6 align-self-center">
      <h2 class="subtituloBMin">Evento de Clausura</h2>
        <h4 class="subtituloComplementario">25 de octubre</h4>
        <p class="white">Ya que hemos aprendido de los expertos, adquirido nuevas experiencias, ¡Es hora de celebrar e intercambiar tarjetas! Qué mejor escenario que este Evento de Clausura en el que encontrarás deliciosa comida local, música, baile y mucho ambiente rodeado por un gran parque. 
        </p>
        <div class="row detalles_evento">
          <div class="col-md-6 col-sm-12">
            <!-- <span><i class="bi bi-clock"></i><p class="subtituloComplementario">  Hora:</p></span>
          <p class="white">8:00 p.m. - 11 p.m.</p> -->
          </div>
          <div class="col-md-6 col-sm-12">
           <!--  <span><i class="fi-marker"></i><p class="subtituloComplementario">  Lugar:</p></span>
           <p><a href="https://goo.gl/maps/F4EUNkGaD9SjH2Xy8" class="white">Museo de Ciencias Explora </a></p> -->
          </div>
        </div>
      </div>
    </article>
  </div>
</main>

<div class="container mt-5 border p-4">
  <div class="row">
    <div class="col-md-12">
      <h5 class="primary"><strong>Recomendaciones:</strong></h5>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <ul>
        <li>Las fiestas no cuentan con un código de vestimenta estricto por lo que recomendamos llevar ropa cómoda y zapatos que sean prácticos para poder caminar en césped.</li>
        <li>Al momento del registro se te proporcionarán los tickets correspondientes a los alimentos y bebidas de cada fiesta. Estos tickets tienen que ser entregados en las fiestas por lo que es indispensable llevarlos.</li>
        <li>Si los tickets anteriormente mencionados no son presentados en la fiesta, las personas encargadas de las áreas de alimentos y bebidas no podrán entregar ninguno de estos servicios.</li>
      </ul>
    </div>
  </div>
</div>

  <?php require 'includes/templates/sede.php'; ?>

  <div class="container">
    <div class="row mt-5 ">
      <img src="build/img/linea_gris.png" alt="">
    </div>
  </div>

  <?php require 'includes/templates/patrocinadores.php'; ?>

  <?php require 'includes/templates/expositores.php'; ?>

</main>
<?php require 'includes/templates/footer.php'; ?>