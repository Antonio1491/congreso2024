<?php session_start();
include('../class/funciones.php');
$propuestas = new Propuesta();
$usuario =  $_SESSION['idCredencial'];
// var_dump($usuario);
  if (!isset($usuario))
   {
      header("location: ../index.html");
   }

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Administrador</title>
    <?php require ("inc/head.php") ?>
   
  </head>
  <body>
    <?php include("inc/traductor.php") ?>
    <main class="row expanded">
      <div class="medium-2">
        <?php include("inc/menu_consejo.php") ?>
      </div>
      <section class="column medium-10">
        <?php require ("inc/header.php") ?>
        <h6>* Clic sobre la propuesta para visualizar toda la información.</h6>
        <h6>* En esta sección podrás visualizar todas las propuestas que te fueron asignadas.</h6>
        <div id="botones">
          <a  id="totaltemas" href=""  class="button margin-top-1" >Todas las propuestas</a>
        </div>
        <table id="tabla" class="tablaResultados">
          <thead>
            <tr>
              <th>#</th>
              <th>Propuesta</th>
              <!-- <th>Modality</th> -->
              <th>Autor</th>
              <th>País</th>
              <th>Ciudad</th>
              <th>Tema</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="cuerpoTabla">
          </tbody>
        </table>
      </section>
    </main>
    <footer></footer>

    <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
  <!-- <script src="../js/what-input.js" type="text/javascript"></script> -->
  <script src="../js/foundation.min.js" type="text/javascript"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <script src="js/propuestas.js"></script>
  <script>
      $('.fi-home').hide();
    </script>
  </body>
</html>
