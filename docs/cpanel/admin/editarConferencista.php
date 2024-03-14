<?php session_start();
include('../class/funciones.php');
$id = $_GET['id'];
$conferencista = new Conferencistas();
$array_datos_usuario = $conferencista->mostrarDatosEdit($id);
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
      <div class=" medium-2">
        <?php include("inc/menuEvento.php") ?>
      </div>

      <div class="column medium-10">
      <?php include('inc/header.php'); ?>
      <div class="row">
      <h1 class="tituloSeccion align-center">Edición de conferencia</h1>
      </div>
        <div class="row">
          <?php

// $sql = "SELECT a.nombre, a.cargo, a.empresa, a.biografia, a.foto, a.id_conferencia, b.nombre
// FROM usuarios  AS a
// LEFT JOIN conferencias AS b ON a.id_conferencia = b.id_conferencia
// WHERE id_usuario = '$id' ";
// $resultado = $conexion->consultar($sql);
$tabla = '';
        foreach ($array_datos_usuario as $valor) {

        $tabla = '<div id="formularioUsuarios">
                  <form class="" action="actualizarConferencista.php?id='.$id.'" method="post" enctype="multipart/form-data">
                    <fieldset>';

        $tabla = $tabla.'<div class="row ">
                        <div class="column medium-6">
                          <label for="">Usuario (e-mail):</label>
                          <input type="text" name="usuario" value="'.$valor['email'].'" placeholder="Usuario" >
                        </div>
                        <div class="column medium-6">
                          <label for="">Password:</label>
                          <input type="text" name="password" value="'.$valor['password'].'" placeholder="" >
                        </div>
                        
                      </div>
                    <div class="row ">
                      <div class="column medium-4">
                        <label for="">Nombres:</label>
                        <input type="text" name="nombres" value="'.$valor['nombres'].'" placeholder="Nombre" >
                      </div>
                      <div class="column medium-4">
                        <label for="">Apellido Paterno:</label>
                        <input type="text" name="apellido_paterno" value="'.$valor['apellido_paterno'].'" placeholder="Apellidos" >
                      </div>
                      <div class="column medium-4">
                        <label for="">Apellido Materno:</label>
                        <input type="text" name="apellido_materno" value="'.$valor['apellido_materno'].'" placeholder="Apellidos" >
                      </div>
                    </div>
                    ';

        $tabla = $tabla.'<div class="row ">
                          <div class="column medium-6">
                            <label for="">Cargo:</label>
                            <input type="text" name="cargo" value="'.$valor['cargo'].'" placeholder="Cargo">
                          </div>
                          <div class="column medium-6">
                            <label for="">Empresa:</label>
                            <input type="text" name="empresa" value="'.$valor['empresa'].'" placeholder="Empresa" >
                          </div>
                        </div>';
    
  
        $tabla = $tabla.'<div class="row">
                        <div class="column medium-6">
                          <label for="">País:</label>
                          <input type="text" name="pais" value="'.$valor['pais'].'" placeholder="País, Ciudad" required>
                        </div>
                        <div class="column medium-6">
                          <label for="">Ciudad:</label>
                          <input type="text" name="ciudad" value="'.$valor['ciudad'].'" placeholder="País, Ciudad" required>
                        </div>
                      </div>';
        $tabla = $tabla.'<div class="row ">
                          <div class="column medium-12">
                            <label for="">Biografía:</label>
                            <textarea name="biografia" rows="4" cols="1" value="'. $valor['biografia'].'">'.  $valor['biografia'].'</textarea>
                          </div>
                        </div>';
       
        $tabla = $tabla. '<div class="row ">
                            <div class="column medium-12">
                              <label for="">Fotografía:</label>
                              <input type="file" name="fotografia" value="">
                            </div>
                          </div>
                          <div class="row">
                            <div class="column medium-12">
                            <label>Conferencía:
                              <select name="conferencia">
                              <option value="'.$valor['id_ponencia'].'">'.$valor['titulo'].'</option>';
                                $lista_conferencias = new Conferencia();
                                $lista_desplegable = $lista_conferencias->listaConferencias($_SESSION["evento"]);
                                foreach ($lista_desplegable as $value) {
        $tabla = $tabla.        '<option value="'.$value['id_ponencia'].'">'.$value['titulo'].'</option>';
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
