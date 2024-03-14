<?php session_start();
include('../class/funciones.php');
$propuestas = new Propuesta();
$usuario =  $_SESSION['idCredencial'];
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

    <!-- <header>
      <div class="rows">
        <div class="column medium-10 medium-offset-2 text-center">
          <h4>Propuestas</h4>
        </div>
      </div>
    </header> -->
    <main class="row expanded">
      <div class="medium-2">
        <?php include("inc/menu_consejo.php") ?>
      </div>
      <section class="column medium-10">

      <?php require ("inc/header.php") ?>
      <h6>* By clicking on the name of the proposal you can view all the information of it *</h6>
      <h6>* In this section you will be able to visualize all the proposals that were assigned to you and you will be able to evaluate or edit your assesment as the case may be.</h6>
      <div id="botones">
      <a  id="totaltemas" href=""  class="button margin-top-1" >All proposals</a>
</div>
<td><a href=""></a></td>
      <table id="tabla" class="tablaResultados">
        <thead>
          <tr>
            <th>#</th>
            <th>Proposals</th>
            <th>Modality</th>
            <th>Author</th>
            <th>Country</th>
            <th>City</th>
            <th>Track</th>
            <th>Actions</th>


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
