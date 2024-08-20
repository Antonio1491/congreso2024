<?php 
require 'includes/templates/head.php';
require ("class/clases.php");
$idConferencista = $_GET['id'];
$datos = new Programa();
?>
<header class="header">
  <div class="container">
    <h1 class="header__titulo">Datos del conferencista</h1>
    <img src="build/img/linea.png" alt="">
    <p>¡Ha llegado el momento de intercambiar tarjetas y divertirse!</p>
  </div>
</header>
<main class="container">
  <!-- <div class=" header header-8">
    <div class="row align-middle">
      <div class="column text-center">
        <h1 class="titulos">DETALLES DEL PONENTE</h1>
      </div>
    </div>
  </div> -->
  <section>

    <div class="row  biografias mt-5">
      <?php

        $conferencista = $datos->descripcionConferencista($idConferencista);
        foreach($conferencista as $valor) {
          echo"<section class='border border-secondary-subtle mt-4 p-4'>
                <div class='row inf_conferencista pb-3'>
                  <div class='col-sm-12 col-md-3 text-center'>
                    <img src='./imagenes/".$valor['fotografia']."' class='rounded-circle'>
                  </div>
                  <div class='col-sm-12 col-md-9 d-flex align-items-center'>
                    <div>
                      <h4>".$valor['nombres']." ".$valor['apellido_paterno']." ".$valor['apellido_materno']."</h4>
                      <h6>".$valor['cargo']." </h6>
                      <h6>".$valor['empresa']."</h6>
                      <h6>".$valor['ciudad'].", ".$valor['pais']."</h6>
                    </div>
                  </div>
                </div>
                <hr>
                <div class='row inf_conferencista'>
                  <div class='col-sm-12 col-md-12 mt-3'>
                    <h4>Biografía:</h4>
                    <p class=''>".$valor['biografia']."</p>
                  </div>
                </div>
              </section>"; 
                         
        }
        

       ?>
    </div>
  
  </section>

</main>

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