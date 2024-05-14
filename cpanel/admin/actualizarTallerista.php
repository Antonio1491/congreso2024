<?php session_start();
$id = $_GET['id'];
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar</title>
  </head>
<?php

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$cargo = $_POST['cargo'];
$empresa = $_POST['empresa'];
$taller = $_POST['taller'];
$biografia = addslashes($_POST['biografia']);
$fotografia = $_FILES['fotografia']['name'];

$actualizar = new Tallerista();

if ($_FILES['fotografia']['name'] == "") {
  //Actualizar sin foto nueva
  $actualizarTallerista = $actualizar->actualizarSinFoto($nombre, $apellidos, $cargo, $empresa, 
                                   $biografia, $taller, $id);

  $mensaje = "<script>window.history.go(-2);</script>";
  echo $mensaje;

}
else{
  $actualizarTallerista = $actualizar->actualizarTallerista($nombre, $apellidos, $cargo, $empresa,
                                   $biografia, $fotografia, $taller, $id);

  $extraerNombre = $_FILES['fotografia']['tmp_name'];
  // $destino= $_SERVER['DOCUMENT_ROOT'].'/img/uploads/talleristas/' ;
  $destino= $_SERVER['DOCUMENT_ROOT'].'/imagenes/' ;
  //local
  // $destino= $_SERVER['DOCUMENT_ROOT'].'/congreso2024/imagenes/' ;

  echo move_uploaded_file($extraerNombre,$destino.$fotografia);

  $mensaje = "<script>window.history.go(-2);</script>";
  echo $mensaje;

}


?>
</html>
