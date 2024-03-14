<?php session_start();
include('../class/funciones.php');
$id = $_GET['id']; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Administrador</title>
    <?php require ("inc/head.php") ?>
   <script>
      $('.fi-home').hide();
    </script>
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
        <?php include("inc/menu_propuesta.php") ?>
      </div>
    
      <section class="column medium-10">
     <br>

      <div class="rows">
        <div class="column  text-center">
          <h4>Datos Propuesta</h4>
        </div>
      </div>
        <?php
          $datos = new Propuesta();
          $array_descripcion = $datos->descripcionPropuesta($id);

          $carpetaImagenes = 'https://congresoparques.com/imagenes/';

          foreach ($array_descripcion as $valor) {
            ?>
            <section class="contentPropuesta">
              <div class="row align-center">
              <?php
                echo "<h5>".$valor['titulo']."</h5>";
              ?>
              </div>
            <div class="row  infoPropuesta">
              <div class="column medium-12">
            <?php
              echo "<span>Tema: </span>".$valor['tema']."</p>";
              echo "<p><span>Descripción: </span>".$valor['ponencia_descripcion']."</p>";
              echo "<p><span>Justificación:</span> ".$valor['justificacion']."</p>";
              echo "<p><span>Objetivos:</span> ".$valor['objetivos']."</p>";
              
          }
            ?>
              </div>
            </div>
        </section>
        <?php
          $autores = $datos->mostrarAutores($id);
          foreach ($autores as $valor) {
        ?>
        <div class="row datosConferencista">
          <div class="column medium-2">
          <?php
            
            echo "<img src='".$carpetaImagenes .$valor['fotografia']."' class='fotoAutor'>";
          ?>
          </div>
          <div class="column medium-10">
          <?php
            echo "<hr>";
            echo "<span>Nombre: </span> ".$valor['nombres']." ".$valor['apellido_paterno']." ".$valor['apellido_materno']."<br>";
            echo "<span>Email: </span> ".$valor['email']."<br>";
            echo "<span>Email Asistente: </span> ".$valor['email_alternativo']."</br>";
            echo "<span>Teléfono: </span> ".$valor['telefono']."</br>";
            echo "<span>Cargo: </span> ".$valor['cargo']."</br>";
            echo "<span>Empresa: </span> ".$valor['empresa']."</br>";
            echo "<span>País: </span> ".$valor['pais']."</br>";
            echo "<span>Ciudad: </span> ".$valor['ciudad']."</br>";
            echo "<p><span>Semblanza: </span> ".$valor['biografia']."</p><hr>";
          ?>
                </div>
        </div>
        <?php } ?>
      </section>
    </main>
    <footer></footer>
  </body>
  
   
</html>
