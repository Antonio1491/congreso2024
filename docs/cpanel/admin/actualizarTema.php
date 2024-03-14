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

$tema= $_POST['tema'];
$descripcion = addslashes($_POST['descripcion']);

$icono = $_FILES['icono']['name'];

$actualizar = new Tema();

if ($_FILES['icono']['name'] == "") {
  //Actualizar sin foto nueva
  $actualizarTaller = $actualizar->actualizarSinFoto($tema,
                  $descripcion,$id);

  $mensaje = "<script>window.history.go(-2);</script>";
  echo $mensaje;

}
else{
  $actualizarTaller = $actualizar->actualizar($tema,
                  $descripcion, $icono, $id);

  $extraerNombre = $_FILES['icono']['tmp_name'];
  $destino = "uploads/ejes/".$icono;
  copy($extraerNombre, $destino);

  $mensaje = "<script>window.history.go(-2);</script>";
  echo $mensaje;

}

?>
</html>
