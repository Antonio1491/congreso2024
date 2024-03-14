<?php session_start();
$id = $_GET['id'];
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php require ("inc/head.php") ?>
    <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="../js/vendor/what-input.js" type="text/javascript"></script>
    <script src="../js/vendor/foundation.min.js" type="text/javascript"></script>
    <!-- <script type="text/javascript" src="../js/app.js"></script> -->
  </head>
  <body>
  <main class="row expanded">
    <div class=" medium-2">
      <?php include("inc/menuEvento.php") ?>
    </div>
    <section class="column medium-10">
    <?php include('inc/header.php'); ?>
      <h1 class="tituloSeccion">Editar Taller</h1>
      <div class="column medium-12">
        <div class="row">
        <div class="">
          <?php

            $traer_datos = new Taller();
            $resultado = $traer_datos->mostrarTaller($id);
            foreach ($resultado as $valor) {
              echo '<form class="" action="actualizarTaller.php?id='.$id.'" method="post" enctype="multipart/form-data">
                  <fieldset>
                    <div class="row">
                      <div class="column">
                        <legend><h5>Registro Taller</h5></legend>
                      </div>
                    </div>
                   
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Título:</label>
                        <input type="text" name="taller" value="'.$valor['titulo'].'" placeholder="Nombre de la Conferencia" required>
                      </div>
                    </div>
                    
                  
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Subtítulo:</label>
                        <input type="text" name="subtitulo" value="'.$valor['subtitulo'].'" placeholder="Subtítulo Taller" required>
                      </div>
                    </div>
                  
                    <div class="row">
                      <div class="column medium-3">
                        <label for="">Fecha (00/00/0000):</label>
                        <input type="date" name="fecha" value="'.$valor['fecha'].'" placeholder="Día/Mes/Año">
                      </div>
                      <div class="column medium-2">
                        <label for="">Inicio:</label>
                        <input type="time" name="inicio" value="'.$valor['inicio'].'" placeholder="00:00:00">
                      </div>
                      <div class="column medium-2">
                        <label for="">Fin:</label>
                        <input type="time" name="fin" value="'.$valor['fin'].'" placeholder="00:00:00">
                      </div>
                      
                    </div>
                    <div class="row ">
                      <div class="column medium-3">
                        <label>Tipo de taller:
                          <select name="categoria" required>
                          <option value="'.$valor['categoria'].'">'.$valor['categoria'].'</option>
                            <option value="Vivencial">Vivencial</option>
                            <option value="Curricular">Curricular</option>
                          </select>
                        </label>
                      </div>
                      <div class="column medium-2">
                        <label for="">Capacidad:</label>
                        <input type="number" name="capacidad" value="'.$valor['capacidad'].'" >
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="file">Fotografía:</label>
                        <input type="file" name="fotografia" value="">
                      </div>
                    </div>
                   
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Descripción:</label>
                        <textarea name="descripcion" rows="4" cols="80" value="'.$valor['descripcion'].'">'.$valor['descripcion'].'</textarea>
                      </div>
                    </div>
                   

                    <div class="row ">
                      <input type="submit" name="" value="Actualizar" class="button success">
                    </div>
                  </fieldset>
                </form>';
            }
          ?>
