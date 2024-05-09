<?php session_start();
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Conferencias</title>
  </head>
<?php
$titulo = $_POST['conferencia'];
$subtitulo = $_POST['subtitulo'];
$fecha = $_POST['fecha'];
$hora = $_POST['inicio'];
$hora_fin = $_POST['fin'];
$estatus = $_POST['estatus'];
$ubicacion = $_POST['lugar'];
$id_tema = $_POST['tema'];
$id_modalidad = $_POST['modalidad'];
$id_categoria = $_POST['categoria'];
$descripcion = filtrado($_POST['descripcion']);
$objetivos = filtrado($_POST['objetivos']);
$evento = $_POST['evento'];

$registro = new Conferencia();

$resultado = $registro->registrar($titulo, $subtitulo, $fecha, $hora, $hora_fin, $estatus,
$id_tema, $ubicacion, $id_modalidad, $id_categoria, $descripcion, $objetivos, $evento);

if ($resultado) {

  $mensaje = header("Location:". getenv('HTTP_REFERER'));

  echo $mensaje;

}

else{

  echo"<script language='JavaScript'>
      alert('Error: No pudimos realizar el registro');
      </script>";

  echo "<script>window.history.go(-1);</script>";

}


// $sql = "INSERT INTO conferencias VALUES (null, '$conferencia', '$fecha', '$hora', '$hora_fin', '$lugar',
//   '$descripcion', '$tema' )";
// $conexion->insertarDatos($sql);

 ?>
</html>