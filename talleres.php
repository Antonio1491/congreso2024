<?php require 'includes/templates/head.php'; ?>
<?php require ("class/clases.php"); ?>
<header class="header">
  <div class="container">
    <h1 class="header__titulo">Talleres</h1>
    <img src="build/img/linea.png" alt="" class="img-fluid">
  </div>
</header>
<main>
  <div class="container-fluid bgDegradado">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 text-center p-md-5">
          <p class="lead white">
          <strong class="verde bolded">Los más de 10 talleres</strong> se celebrarán el día miércoles <span class="dt" style="color: white;"> 23 de octubre</span>,<br> antes de las secisiones educativas, las sesiones magistrales y la Expo Espacio Público. 
          <br> 
          </p> 
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid bgVivencial">
    <div class="container row">
      <div class="col-sm-12 col-md-6 p-4"></div>
      <div class="col-sm-12 col-md-6 align-self-center ">
        <article>
          <h2 class="subtituloBMin">Talleres Vivenciales</h2>
          <h6 class="subtituloComplementario">¡Visita los parques más emblemáticos de la ciudad!</h6>
          <p class="white text-justify">¡Conoce Mérida y aprende al mismo tiempo! En los talleres vivenciales conocerás atractivos turísticos y proyectos ciudadanos relacionados con el espacio público; habrá expertos en el tema y colaboradores de la ciudad anfitriona que compartirán durante 4 horas sus experiencias en la administración de estos espacios, los retos que han enfrentado y las actividades que han implementado. </p>
        </article>
      </div>
    </div>
  </div>

  <section class="talleres mt-5">
    <div class="container contenedor__talleres">
    <?php
      $talleres = new Taller();

      $html = $talleres->htmlTalleresVivenciales(2);
        echo $html;    
      ?>
    </div>
  </section>

  <div class="container-fluid bgMaster mt-4 mb-4">
    <article class="container row ">
      <div class="col-sm-12 col-md-6 align-self-center">
        <article>
          <h2 class="subtituloBMin">Master Classes</h2>
          <!-- <h6 class="subtituloComplementario">¡Visita los parques más emblemáticos de la ciudad!</h6> -->
          <p class="white text-justify">Obtén conocimientos técnicos sobre un tema especializado, las master classes cuentan con la orientación de un especialista que te ayudará a ampliar tus conocimientos y aprender técnicas sobre diversos temas del espacio público.
          </p>
        </article>
      </div>
      <div class="col-sm-12 col-md-6"></div>
    </article>
  </div>

  <section class="talleres">
    <div class="container contenedor__talleres">
    <?php
      $talleres = new Taller();

      $html = $talleres->htmlTalleresCurrriculares(2);
        echo $html;    
      ?>
    </div>
  </section>

</main>

  <div class="container">
    <div class="row">
      <img src="build/img/linea_gris.png" alt="" class="img-fluid">
    </div>
  </div>

  <?php require 'includes/templates/sede.php'; ?>

  <div class="container">
    <div class="row mt-5">
      <img src="build/img/linea_gris.png" alt="" class="img-fluid">
    </div>
  </div>

  <?php require 'includes/templates/patrocinadores.php'; ?>

  <?php require 'includes/templates/expositores.php'; ?>

</main>
<?php require 'includes/templates/footer.php'; ?>