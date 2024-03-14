<?php session_start();
include('../class/funciones.php');

$id = $_GET['id'];

$titulo = $_POST['conferencia'];
$subtitulo = $_POST['subtitulo'];
$fecha = $_POST['fecha'];
$hora = $_POST['inicio'];
$hora_fin = $_POST['fin'];
$ubicacion = $_POST['lugar'];
$id_tema = $_POST['tema'];
$id_modalidad = $_POST['modalidad'];
$id_categoria = $_POST['categoria'];
$descripcion = filtrado($_POST['descripcion']);
$objetivos = filtrado($_POST['objetivos']);

$registro = new Conferencia();

$resultado = $registro->actualizar($titulo, $subtitulo, $fecha, $hora, $hora_fin,
            $id_tema, $ubicacion, $id_modalidad, $id_categoria, $descripcion, $objetivos, $id);

  if ($resultado) {

      $mensaje = "<script>window.history.go(-2);</script>";

      echo $mensaje;

      }

      else{

        echo"<script language='JavaScript'>
              alert('Error: No pudimos actualizar');
              </script>";
        echo "<script>window.history.go(-2);</script>";

      }


 ?>
