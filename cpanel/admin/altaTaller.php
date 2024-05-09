<?php session_start();
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Taller</title>
  </head>
<?php
$taller= addslashes($_POST['titulo']);
$subtitulo = addslashes($_POST['subtitulo']);
$fecha = $_POST['fecha'];
$inicio = $_POST['inicio'];
$fin = $_POST['fin'];
$capacidad = $_POST['capacidad'];
$tipo = $_POST['tipo'];
$descripcion = addslashes($_POST['descripcion']);

$fotografia = $_FILES['fotografia']['name'];
$extraerNombre = $_FILES['fotografia']['tmp_name'];
// $destino= $_SERVER['DOCUMENT_ROOT'].'/build/img/' ;
// servidor local 
$destino= $_SERVER['DOCUMENT_ROOT'].'/congreso2024/build/img/' ;
// $destino = "uploads/talleres/".$fotografia ;
$evento = $_POST['evento'];

$insertar = new Taller();
$nuevoTaller = $insertar->registrarTaller( $taller,
                $subtitulo, $fecha,
                $inicio, $fin, $capacidad, $tipo,
               $descripcion, $fotografia, $evento);

    if ($nuevoTaller) {
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
