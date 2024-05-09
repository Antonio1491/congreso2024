<?php session_start();
$id = $_GET['id'];
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar Taller</title>
  </head>
<?php

$taller = addslashes($_POST['taller']);
$subtitulo = addslashes($_POST['subtitulo']);
$fecha = $_POST['fecha'];
$inicio = $_POST['inicio'];
$fin = $_POST['fin'];
$capacidad = $_POST['capacidad'];
$tipo = $_POST['categoria'];
$descripcion = addslashes($_POST['descripcion']);

$fotografia = $_FILES['fotografia']['name'];


$actualizar = new Taller();

if ($_FILES['fotografia']['name'] == "") {
  //Actualizar sin foto nueva
  $actualizarTaller = $actualizar->actualizarSinFoto($taller, 
                  $subtitulo, $fecha,
                  $inicio, $fin, $capacidad, $tipo,
                   $descripcion, $id);

  $mensaje = "<script>window.history.go(-2);</script>";
  echo $mensaje;

}
else{
  $actualizarTaller = $actualizar->actualizar($taller, $subtitulo, $fecha, $inicio, $fin, $capacidad, $tipo, $descripcion, $fotografia, $id);

                  $extraerNombre = $_FILES['fotografia']['tmp_name'];
                  // $destino= $_SERVER['DOCUMENT_ROOT'].'/build/img/' ;
                  //servidor local
                  $destino= $_SERVER['DOCUMENT_ROOT'].'/congreso2024/build/img/' ;
                  echo move_uploaded_file($extraerNombre,$destino.$fotografia);

  $mensaje = "<script>window.history.go(-2);</script>";
  echo $mensaje;

}

?>
</html>
