<?php session_start();
$id = $_GET['id'];
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Alta de Conferencias</title>
    <?php require ("inc/head.php") ?>
    
  </head>
  <body>
    
    <main class="row expanded">
      <div class=" medium-2">
        <?php include("inc/menuEvento.php") ?>
      </div>

      <div class="column medium-10">
      <?php include('inc/header.php'); ?>
        <div class="row">
          <?php

            $traer_datos = new Conferencia();

            $resultado = $traer_datos->mostrarConferencia($id);

            foreach ($resultado as $valor) {

            echo '<form class="" action="actualizarConferencia.php?id='.$id.'" method="post">
                  <fieldset>
                    <div class="row">
                      <div class="column medium-8">
                        <legend><h1 class="tituloSeccion align-center">Edición de conferencia</h1></legend>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Conferencia:</label>
                        <input type="text" name="conferencia" value="'.$valor['titulo'].'" placeholder="Nombre de la Conferencia" required>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Subtitulo:</label>
                        <input type="text" name="subtitulo" value="'.$valor['subtitulo'].'" placeholder="Nombre de la Conferencia" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="column medium-2">
                        <label for="">Fecha (00/00/0000):</label>
                        <input type="date" name="fecha" value="'.$valor['fecha'].'" placeholder="Día/Mes/Año">
                      </div>
                      <div class="column medium-2">
                        <label for="">Inicio:</label>
                        <input type="time" name="inicio" value="'.$valor['hora_inicio'].'" placeholder="00:00">
                      </div>
                      <div class="column medium-2">
                        <label for="">Fin:</label>
                        <input type="time" name="fin" value="'.$valor['hora_fin'].'" placeholder="00:00:00">
                      </div>
                      <div class="column medium-2">
                        <label for="">Lugar:</label>
                        <input type="text" name="lugar" value="'.$valor['ubicacion'].'">
                      </div>
                    </div>
                    <div class="row ">
                    <div class="column medium-2">
                      <label>Categoría:
                        <select name="categoria">';
                            $listaTipo = new Conferencia();
                            $lista = $listaTipo->conferenciaTipo();
                            foreach ($lista as $value) {
                             ?> 
                             <option <?php echo $valor['id'] === $value['id'] ? 'selected' : ''; ?> value="<?php echo $value['id']; ?>"> <?php echo $value['categoria']; ?>
                             <?php
                           
                              }

                    echo '  </select>
                      </label>
                    </div>
                    <div class="column medium-2">
                      <label>Modalidad:
                        <select name="modalidad">';
                            $listaTipo = new Conferencia();
                            $lista = $listaTipo->conferenciaModalidad();
                            foreach ($lista as $value) {
                             ?> 
                             <option <?php echo $valor['id'] === $value['id'] ? 'selected' : ''; ?> value="<?php echo $value['id']; ?>"> <?php echo $value['modalidad']; ?>
                             <?php
                           
                              }

                    echo '  </select>
                      </label>
                    </div>
                    <div class="column medium-4">
                      <label>Tema:
                      <select name="tema">';
                          // $listaTipo = new Conferencia();
                          $lista = $listaTipo->temas();
                          foreach ($lista as $value) {
                            ?> 
                             <option <?php echo $valor['id'] === $value['id'] ? 'selected' : ''; ?> value="<?php echo $value['id']; ?>"> <?php echo $value['tema']; ?>
                             <?php
                              
                              }
                            echo '  </select>
                              </label>
                      </div>
                  </div>


                    <div class="row ">
                    <div class="column medium-8">
                      <label for="">Descripción:</label>
                      <textarea name="descripcion" rows="10" cols="1" value="'.$valor['ponencia_descripcion'].'">'.$valor['ponencia_descripcion'].'</textarea>
                    </div>
                    </div>
                    <div class="row">
                      <div class="column medium-8">
                        <label for="">Objetivos:</label>
                        <textarea name="objetivos" rows="10" cols="80" value="'.$valor['objetivos'].'">'.$valor['objetivos'].'</textarea>
                      </div>
                    </div>

                    <div class="row column text-center">
                      <input type="submit" name="" value="Actualizar" class="button success">
                    </div>
                  </fieldset>
              </form>

          </div>';
}
 ?>
