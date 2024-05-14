<?php session_start();
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Usuarios</title>
  </head>
<?php
$email = $_POST['email'];
$password = $_POST['password'];
$nombres = $_POST['nombres'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$cargo = $_POST['cargo'];
$empresa = $_POST['empresa'];
$pais = $_POST['pais'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$conferencia = $_POST['conferencia'];
$fotografia = $_FILES['fotografia']['name'];
$biografia = addslashes($_POST['biografia']);
$evento = $_POST['evento'];

$insertar = new Conferencistas();


// $credencial = $insertar->registroCredencial($nombre,$usuario, $password);

$resultado = $insertar->registroConferencista($email, $password, $nombres, $apellido_paterno, $apellido_materno, $cargo, $empresa,
                                          $pais, $ciudad, $estado, $conferencia, $fotografia, $biografia,
                                          $evento);
var_dump($resultado);
    if ($resultado == true) {

      $extraerNombre = $_FILES['fotografia']['tmp_name'];
      $destino= $_SERVER['DOCUMENT_ROOT'].'/imagenes/' ;
      //local
      // $destino= $_SERVER['DOCUMENT_ROOT'].'/congreso2024/imagenes/' ;

      // var_dump($destino.$fotografia);
      // exit();
      move_uploaded_file($extraerNombre,$destino.$fotografia);

      $mensaje = header("Location:". getenv('HTTP_REFERER'));

      echo $mensaje;

      }
    else{
      echo"<script language='JavaScript'>
          alert('Error: No pudimos realizar el registro');
          </script>";
      echo "<script>window.history.go(-1);</script>";
    }

 ?>
</html>
