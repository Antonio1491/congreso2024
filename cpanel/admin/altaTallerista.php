<?php session_start();
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Talleristas</title>
  </head>
<?php
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$cargo = $_POST['cargo'];
$empresa = $_POST['empresa'];
$taller = $_POST['taller'];
$biografia = addslashes($_POST['biografia']);
$fotografia = $_FILES['fotografia']['name'];
// $prioridad = $_POST['prioridad'];

$evento = $_POST['evento'];

$tallerista = new Tallerista();
$registro = $tallerista->registroTallerista($nombre, $apellidos, $cargo, 
                                             $empresa,
                                             $biografia, 
                                            $taller, $fotografia, $evento);

    if ($registro) {

      $extraerNombre = $_FILES['fotografia']['tmp_name'];
      // $destino= $_SERVER['DOCUMENT_ROOT'].'/imagenes/' ;
      //local
      $destino= $_SERVER['DOCUMENT_ROOT'].'/congreso2024/imagenes/' ;
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
