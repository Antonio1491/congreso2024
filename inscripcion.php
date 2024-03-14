<?php require 'includes/templates/head.php'; ?>
<header class="header">
  <div class="container">
    <h1 class="header__titulo">Consigue tu entrada</h1>
    <img src="build/img/linea.png" alt="">
    <p>¡Ha llegado el momento de intercambiar tarjetas y divertirse!</p>
  </div>
</header>
<main>

  <?php include 'includes/templates/boletos.php'; ?>

  <div class="container mt-5 mb-5">
    <div class="row">
      <h1 class="subtituloPMin text-center">Actividades Adicionales</h1>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <article class="card">
          <img src="build/img/talleres_curriculares.png" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title mt-2 mb-3 text-center subtituloPMin">Master Clasess</h5>
            <div class="content_precio text-center">
              <h5 class="subtituloPMin">$980.<sup>00</sup>  <span style="font-size:0.8rem;">MXN</span></h5>
            </div>
            <p class="card-text">A great opportunity to extend our knowledge with techniques on various topics of public space spaces of the host city.</p>
            <div class="text-center">
              <a href="talleres.php" class="btn btn__primary">
              Más información</a>
            </div>
          </div> 
        </article>
      </div>
      <div class="col-sm-12 col-md-4">
        <article class="card">
          <img src="build/img/talleres_vivenciales.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title mt-2 mb-3 text-center subtituloPMin">Talleres Vivenciales</h5>
            <div class="content_precio text-center">
              <h5 class="subtituloPMin">$750.<sup>00</sup> <span style="font-size:0.8rem;">MXN</span></h5>
            </div>
            <p>Unique learning experiences visiting parks and iconic spaces of the host spaces of the host city spaces of the host city.</p>
            <div class="text-center">
              <a href="talleres.php" class="btn btn__primary">
              Más Información</a>
            </div>
          </div> 
        </article>
      </div>
      <div class="col-sm-12 col-md-4">
        <article class="card">
          <img src="build/img/eventos_sociales.png" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title mt-2 mb-3 text-center subtituloPMin">Eventos Sociales</h5>
            <div class="content_precio text-center">
              <h5 class="subtituloPMin">$700.<sup>00</sup> <span style="font-size:0.8rem;">MXN</span></h5>
            </div>
            <p>Add it to your student ticket or attend the Welcome or Closing Party with a companion. Have fun and network at this great event.</p>
            <div class="text-center">
              <a href="sociales.php" class="btn btn__primary">
              Más Información</a>
            </div>
          </div> 
        </article>
      </div>
    </div>
  </div>

</main>

  <div class="container">
    <div class="row mt-5 ">
      <img src="build/img/linea_gris.png" alt="">
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