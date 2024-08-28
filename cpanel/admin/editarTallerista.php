<?php session_start();
include('../class/funciones.php');
$id = $_GET['id'];
$tallerista = new Tallerista();
$array_datos_usuario = $tallerista->mostrarDatosEdit($id);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edición Conferencias</title>
    <?php require ("inc/head.php") ?>
  </head>
  <body>
   
    <main class="row expanded">
      <div class="medium-2">
        <?php include("inc/menuEvento.php") ?>
      </div>
      <div class="column medium-10 contenido">
              <?php include('inc/header.php'); ?>

        <div class="">
          <?php

// $sql = "SELECT a.nombre, a.cargo, a.empresa, a.biografia, a.foto, a.id_conferencia, b.nombre
// FROM usuarios  AS a
// LEFT JOIN conferencias AS b ON a.id_conferencia = b.id_conferencia
// WHERE id_usuario = '$id' ";
// $resultado = $conexion->consultar($sql);

        foreach ($array_datos_usuario as $valor) {

        $tabla = '<div id="formularioUsuarios">
                  <form class="" action="actualizarTallerista.php?id='.$id.'" method="post" enctype="multipart/form-data">
                    <fieldset>';

      $tabla = $tabla.'
                    <div class="row ">
                      <div class="column medium-4">
                        <label for="">Nombre:</label>
                        <input type="text" name="nombre" value="'.$valor['nombre'].'" placeholder="Nombre" >
                      </div>
                      <div class="column medium-4">
                        <label for="">Apellidos:</label>
                        <input type="text" name="apellidos" value="'.$valor['apellidos'].'" placeholder="Apellidos" >
                      </div>
                    </div>
                    ';

        $tabla = $tabla.'<div class="row ">
                          <div class="column medium-4">
                            <label for="">Cargo:</label>
                            <input type="text" name="cargo" value="'.$valor['cargo'].'" placeholder="Cargo">
                          </div>
                          <div class="column medium-4">
                            <label for="">Empresa:</label>
                            <input type="text" name="empresa" value="'.$valor['empresa'].'" placeholder="Empresa" >
                          </div>
                        </div>';
        
        $tabla = $tabla.'<div class="row ">
                          <div class="column medium-8">
                            <label for="">Biografía:</label>
                            <textarea name="biografia" rows="4" cols="1" value="'. $valor['biografia'].'">'.  $valor['biografia'].'</textarea>
                          </div>
                        </div>';
        $tabla = $tabla. '<div class="row ">
                            <div class="column medium-8">
                              <label for="">Fotografía:</label>
                              <input type="file" name="fotografia" value="">
                            </div>
                          </div>
                          <div class="row">
                            <div class="column medium-8">
                            <label>Taller:
                              <select name="taller">
                              <option value="'.$valor['id_taller'].'">'.$valor['titulo'].'</option>';
                                $lista_conferencias = new Taller();
                                $lista_desplegable = $lista_conferencias->listaTalleres('2');
                                foreach ($lista_desplegable as $value) {
        $tabla = $tabla.        '<option value="'.$value['id_taller'].'">'.$value['titulo'].'</option>';
                                }
        $tabla = $tabla.'    </select>
                            </label>
                          </div>
                        </div>';
        $tabla = $tabla . '<div class="row">
                            <div class="column">
                              <input type="submit" name="" value="Actualizar" class="success button">
                            </div>
                          </div>
                          </fieldset>
                        </form>
                      </div>';
        }

        echo $tabla;
















 ?>
