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
      <div id="botones">
      <a  id="preguntas" href="agregarTestimonial.php"  class="button margin-top-1" >Agregar Testimonial</a>
      </div>

<td><a href=""></a></td>
      <table id="tabla" class="tablaResultados">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Foto</th>
            <th class="text-center">Autor</th>
            <th class="text-center">Testimonio</th>
            <th class="text-center">Empresa</th>
            <th class="text-center">Acciones</th>
          </tr>
          </thead>
          <tbody id="cuerpoTabla">
          <tr>
    
        </tbody>
          
      </table>
      </section>
    </main>
    <footer></footer>

    <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
  <!-- <script src="../js/what-input.js" type="text/javascript"></script> -->
  <script src="../js/foundation.min.js" type="text/javascript"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <script src="js/testimoniales.js"></script>


  <script src="../js/vendor/foundation.min.js" type="text/javascript"></script>

<script>
  $(document).foundation();
  </script> 


  </body>
</html>
