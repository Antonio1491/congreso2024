<?php  session_start();
require ("../class/funciones.php");
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Conferencia </title>
    <link rel="stylesheet" href="../css/foundation/foundation.min.css">
  <link rel="stylesheet"  href="../css/style.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
  </head>
  <body>
    <main>
      <div class="row collapse expanded">
        <div class="column medium-2">
          <?php include("inc/menu.php"); ?>
        </div>
        <div class="column medium-10">
                    <?php include('../admin/inc/header.php'); ?>
          <section class="container">
            <div class="datos_conferencia">
              <?php
                $datos_conferencia = new Conferencistas();
                $array_datos = $datos_conferencia->datosConferencia($_SESSION['id_usuario']);
                foreach ($array_datos as $datos) {

                  echo "<div class='row'>
                          <div class='column medium-6'>
                            <div class='row'>
                              <span>Session Name: </span> ".$datos['conferencia']."
                            </div>
                            <div class='row'>
                              <span>Date of participation: </span> ".$datos['fecha']."
                            </div>
                            <div class='row'>
                              <span>Start time: </span> ".$datos['inicio']."
                            </div>
                            <div class='row'>
                              <span>End Time: </span> ".$datos['fin']."
                            </div>
                            <div class='row'>
                              <span>Place: </span> ".$datos['salon']."
                            </div>
                            <div class='row'>
                              <span>Description: </span> ".$datos['descripcion']."
                            </div>
                            <div class='row'>
                              <span>Track to which it belongs: </span> ".$datos['tema']."
                            </div>
                          </div>
                        ";
                }
               ?>
                  <div class="column medium-6">
                    <img src="../img/conferencia.png" alt="">
                  </div>
                </div>
            </div>
          </section>

        </div>
      </div>
    </main>
    <footer>
                <?php include('inc/footer.php'); ?>

    </footer>
  </body>
</html>
