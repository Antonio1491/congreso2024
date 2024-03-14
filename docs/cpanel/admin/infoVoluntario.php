<?php session_start();
include('../class/funciones.php');
$id = $_GET['id']; ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Información del Voluntario</title>
    <?php require ("inc/head.php") ?>

  </head>
  <body>
  <main class="row expanded">
    <div class=" medium-2">
      <?php include("inc/menuEvento.php") ?>
    </div>
    <section class="column medium-10">
    <?php include('inc/header.php'); ?>
      <h1 class="tituloSeccion">Datos Voluntario</h1>
      <div class="column medium-12">
        <?php
          $datos = new Voluntarios();
          $array_descripcion = $datos->infoVoluntario($id);
          foreach ($array_descripcion as $valor) {
            ?>
            <section class="contentPropuesta">
              <div class="row align-center">
              <?php
                echo "<h5>".$valor['nombre']." ".$valor['apellidos']." </h5>";
              ?>
              </div>
            <div class="row  infoPropuesta">
              <div class="column medium-12">
            <?php
              echo "<span>E-mail: </span>".$valor['email']."<br>";
              echo "<span>Celular: </span>".$valor['celular']."</br>";
              echo "<span>Organización/Universidad: </span>".$valor['universidad']."</br>";
              echo "<span>Turno: </span> ".$valor['turno']."</br>";
              echo "<span>Fecha: </span> ".$valor['fecha']."</br>";
              echo "<span>Horario: </span> ".$valor['hora_inicio']." - ".$valor['hora_fin']."</br>";
              echo "<p><span>Semblanza: </span> ".$valor['semblanza']."</p>";
              echo "<p><span>Razones: </span> ".$valor['razones']."</p>";
              
          }
            ?>
              </div>
            </div>
        </section>
        
    </main>
    <footer></footer>
    <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="../js/vendor/what-input.js" type="text/javascript"></script>
    <script src="../js/vendor/foundation.min.js" type="text/javascript"></script>
    <script>
    $(document).foundation();

    $(document).ready(function(){
    $("#agregar").click(function(){
      $(".registro").fadeToggle();
    });
    });
    </script>
  </body>
</html>
