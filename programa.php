<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<?php require 'includes/templates/head.php'; 
require("class/clases.php");
$listaBloque = new Programa();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.8.1/js/foundation.min.js"></script> -->
<header class="header">
  <div class="container">
    <h1 class="header__titulo">Programa</h1>
    <img src="build/img/linea.png" alt="">
    <p class="lead">*Sujeto a cambios sin previo aviso</p>
  </div>
</header>
 
<main>
  <div class="container mt-5 mb-5">
  <div class="row">
    <?php
    $congreso = "2";
    $bloque = $listaBloque->contendorPrograma($congreso); 
    echo $bloque
    ?>
  </div>
    <script>
      $(document).ready(function(){
        $("#taller").click(function()
        {
          $(".taller").fadeToggle();
        });
      });
    </script>

    <!-- <div class="row column align-center">
      <a href="assets/ProgramaPreliminar2019.pdf"><img src="img/programa_preliminar_2019.png"></a>
    </div> -->
  </main>


  <?php


  //  Modal de los talleres
  $datosTaller = $listaBloque->taller($congreso);
  foreach ($datosTaller as $valor) {
  echo "
  <div class='modal fade' id='t".$valor['id_taller']."'  tabindex='-1' aria-labelledby='t".$valor['id_taller']."' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h3 class='modal-title fs-5 subtituloPMin' id='exampleModalLabel'>".$valor['titulo']. "</br> " .$valor['subtitulo']."</h3>
          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
          <figure class='text-center'>
            <img src='imagenes/".$valor['foto']."' style='width:100%'>
          </figure>
          <p style='text-align: justify;'>".$valor['descripcion']."</p>
          <small><strong>Fecha:</strong> ".$valor['fecha']."</small><br>
          <small><strong>Horario:</strong> de ".$valor['inicio']." a ".$valor['fin']." </small><br>
          <small><strong>Capacidad:</strong> ".$valor['capacidad']." personas.</small><br>
          </button>
        </div>
      </div>
    </div>
  </div>        
  ";
  }

  

      // Modal de las conferencias 
  $datosConferencia = $listaBloque->datosConferencia();
  foreach ($datosConferencia as $valor) {
    echo "
      <div class='modal fade' id='c".$valor['ponenciasID']."'  tabindex='-1' aria-labelledby='c".$valor['ponenciasID']."' aria-hidden='true'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h1 class='modal-title fs-5' id='exampleModalLabel'>".$valor['titulo']." " .$valor['subtitulo']."</h1>
              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
              <p >".$valor['descripcion']."</p>
              <small>Fecha: ".$valor['fecha']."</small>
              <small>Horario: de ".$valor['hora_inicio']." a ".$valor['hora_fin']." </small>
              <small>Lugar: ".$valor['ubicacion']."</small>
            </div>
          </div>
        </div>
      </div> 
      ";
    }

 ?>



  </div>

  <div class="container">
    <div class="row">
      <img src="build/img/linea_gris.png" alt="">
    </div>
  </div>

</main>

  <?php require 'includes/templates/sede.php'; ?>

  <?php require 'includes/templates/patrocinadores.php'; ?>

  <?php require 'includes/templates/expositores.php'; ?>

</main>
<?php require 'includes/templates/footer.php'; ?>

<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>-->
