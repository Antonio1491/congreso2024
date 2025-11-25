<?php 
session_start();
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Alta Taller</title>
</head>

<?php

$taller      = addslashes($_POST['titulo']);
$subtitulo   = addslashes($_POST['subtitulo']);
$fecha       = $_POST['fecha'];
$inicio      = $_POST['inicio'];
$fin         = $_POST['fin'];
$capacidad   = $_POST['capacidad'];
$tipo        = $_POST['tipo'];
$descripcion = addslashes($_POST['descripcion']);
$evento      = $_POST['evento'];

/* ============================================================
   1) PROCESAR SUBIDA DE IMAGEN
============================================================ */

$archivo   = $_FILES['fotografia']['name'];
$temp      = $_FILES['fotografia']['tmp_name'];

if ($archivo != "") {

    // Crear nombre único
    $nombre_final = uniqid() . "_" . $archivo;

    // ⛔ ANTES: $_SERVER['DOCUMENT_ROOT'] . "/imagenes/"
    // ✅ AHORA: ruta REAL ../../imagenes/
    $destino = dirname(__DIR__, 2) . "/imagenes/";

    // Crear carpeta si no existe
    if (!file_exists($destino)) {
        mkdir($destino, 0777, true);
    }

    // Mover archivo
    if (!move_uploaded_file($temp, $destino . $nombre_final)) {
        echo "<script>alert('Error al guardar la imagen'); window.history.go(-1);</script>";
        exit;
    }

} else {
    $nombre_final = "";
}

/* ============================================================
   2) GUARDAR EN LA BASE DE DATOS
============================================================ */

$insertar = new Taller();

$nuevoTaller = $insertar->registrarTaller(
    $taller,
    $subtitulo,
    $fecha,
    $inicio,
    $fin,
    $capacidad,
    $tipo,
    $descripcion,
    $nombre_final,
    $evento
);

if ($nuevoTaller) {
    header("Location: " . getenv('HTTP_REFERER'));
} else {
    echo "<script>alert('Error: No pudimos realizar el registro');</script>";
    echo "<script>window.history.go(-1);</script>";
}

?>
</html>