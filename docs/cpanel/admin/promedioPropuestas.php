<?php session_start();
include('../class/funciones.php');
$propuestas = new Propuesta();
$usuario =  $_SESSION['idCredencial'];

 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Administrador</title>
    <?php require ("inc/head.php") ?>
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

  </head>
  <body>
    <!-- <header>
      <div class="rows">
        <div class="column medium-10 medium-offset-2 text-center">
          <h4>Propuestas</h4>
        </div>
      </div>
    </header> -->
    <main class="row expanded">
      <div class="medium-2">
      <?php include("inc/menuEvento.php") ?>
      </div>
      <section class="column medium-10">

      <?php require ("inc/header.php") ?>

<td><a href=""></a></td>
         
      <table id="tabla" class="tablaResultados">
        <thead>
          <tr>
            <th>#</th>
            <th>Propuesta</th>
            <th>Modalidad</th>
            <th>Autor</th>
            <th>País</th>
            <th>Ciudad</th>
            <th>id tema</th>
            <th>Promedio</th>
            <th>Acciones</th>

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
  <script src="js/promedioPropuestas.js"></script>
  <script src="../js/vendor/foundation.min.js" type="text/javascript"></script>
  
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>


  <script>
    $(document).foundation();
    </script> 



  </body>
</html>
