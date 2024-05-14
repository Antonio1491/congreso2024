<?php session_start();
$id = $_GET['id'];
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Usuarios</title>
  </head>
<?php

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$nombres = $_POST['nombres'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$cargo = $_POST['cargo'];
$empresa = $_POST['empresa'];
$conferencia = $_POST['conferencia'];
$pais = $_POST['pais'];
$ciudad = $_POST['ciudad'];
$biografia = addslashes($_POST['biografia']);
$fotografia = $_FILES['fotografia']['name'];

$actualizar = new Conferencistas();

if ($_FILES['fotografia']['name'] == "") {
  //Actualizar sin foto nueva
  $actualizarConferencista = $actualizar->actualizarSinFoto($usuario, $password, $nombres, $apellido_paterno, $apellido_materno, $cargo, $empresa, $biografia, $pais, $ciudad, $conferencia, $id);

  $mensaje = "<script>window.history.go(-2);</script>";
  echo $mensaje;

}
else{
  $actualizarConferencista = $actualizar->actualizarConferencista($usuario, $password, $nombres, $apellido_paterno, $apellido_materno, $cargo, $empresa, $biografia, $pais, $ciudad, $conferencia, $id, $fotografia);

  $extraerNombre = $_FILES['fotografia']['tmp_name'];
  //local
  // $destino= $_SERVER['DOCUMENT_ROOT'].'/congreso2024/imagenes/' ;
  $destino= $_SERVER['DOCUMENT_ROOT'].'/imagenes/' ;
  echo move_uploaded_file($extraerNombre,$destino.$fotografia);

  $mensaje = "<script>window.history.go(-2);</script>";
  echo $mensaje;

}


// if ($resultado) {
//
//           $mensaje = "<script>window.history.go(-2);</script>";
//
//           echo $mensaje;
//     }
//     else{
//     echo"<script language='JavaScript'>
//     alert('Error: No pudimos actualizar');
//     </script>";
//     echo "<script>window.history.go(-2);</script>";
//     }

?>
</html>
