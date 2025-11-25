<?php 
session_start();
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Alta Talleristas</title>
</head>

<?php

$nombre     = $_POST['nombre'];
$apellidos  = $_POST['apellidos'];
$cargo      = $_POST['cargo'];
$empresa    = $_POST['empresa'];
$taller     = $_POST['taller'];
$biografia  = addslashes($_POST['biografia']);
$evento     = $_POST['evento'];

/* ============================================================
   SUBIR IMAGEN
============================================================ */
$archivo = $_FILES['fotografia']['name'];
$temp    = $_FILES['fotografia']['tmp_name'];

if ($archivo != "") {

    $nombre_final = uniqid() . "_" . $archivo;

    $destino = dirname(__DIR__, 2) . "/imagenes/";

    if (!file_exists($destino)) {
        mkdir($destino, 0777, true);
    }

    if (!move_uploaded_file($temp, $destino . $nombre_final)) {
        echo "<script>alert('Error al guardar imagen'); history.back();</script>";
        exit;
    }

} else {
    $nombre_final = "";
}

/* ============================================================
   GUARDAR EN BD
============================================================ */

$tallerista = new Tallerista();

$registro = $tallerista->registroTallerista(
    $nombre,
    $apellidos,
    $cargo,
    $empresa,
    $biografia,
    $taller,
    $nombre_final,
    $evento
);

if ($registro) {
    header("Location: " . getenv('HTTP_REFERER'));
} else {
    echo "<script>alert('Error: No pudimos realizar el registro'); history.back();</script>";
}
?>
</html>