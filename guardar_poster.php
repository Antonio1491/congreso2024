<?php

require "includes/config/Database.php";
include "classes/Registro.php";

$registro = new Registro();

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
  // Si no viene por POST, redirige al formulario
  header('Location: registro_posters.php');
  exit;
}

/* ===== Helpers ===== */
function filtrado($datos){
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = addslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}
function backWithAlert($msg) {
  echo "<script>alert(".json_encode($msg)."); window.history.back();</script>";
  exit;
}
function isPdf($name, $type) {
  $isExt = (bool)preg_match('/\.pdf$/i', $name);
  $isMime = strtolower($type ?? '') === 'application/pdf';
  // Aceptamos por extensión por seguridad (navegadores pueden fallar en MIME)
  return $isExt || $isMime;
}

/* ===== Participantes (arrays) ===== */
if (empty($_POST['Nombre']) || !is_array($_POST['Nombre'])) {
  backWithAlert('Debes capturar al menos 1 participante.');
}

$nombre            = str_replace("'","´", $_POST['Nombre']);            // []
$apellidoPaterno   = str_replace("'","´", $_POST['ApellidoPaterno']);   // []
$apellidoMaterno   = str_replace("'","´", $_POST['ApellidoMaterno']);   // []
$email             = $_POST['Email'];                                    // []
$emailAlternativo  = $_POST['EmailAlternativo'] ?? [];                    // []
$telefono          = $_POST['Telefono'] ?? [];                            // []
$cargo             = str_replace("'","´", $_POST['Cargo'] ?? []);         // []
$empresa           = str_replace("'","´", $_POST['Empresa'] ?? []);       // []
$pais              = str_replace("'","´", $_POST['Pais']);                // []
$ciudad            = str_replace("'","´", $_POST['Ciudad'] ?? []);        // []

$array = count($_POST['Nombre']);

// Validación mínima por participante
for ($i = 0; $i < $array; $i++) {
  if (trim($nombre[$i] ?? '') === '' ||
      trim($apellidoPaterno[$i] ?? '') === '' ||
      trim($apellidoMaterno[$i] ?? '') === '' ||
      trim($email[$i] ?? '') === '' ||
      trim($pais[$i] ?? '') === '') {
    backWithAlert('Datos obligatorios faltantes en un participante.');
  }
}

/* ===== Datos del póster ===== */
$nombre_proyecto = filtrado($_POST['nombre_proyecto'] ?? '');
$tema            = $_POST['tema'] ?? '';
$categoria       = $_POST['categoria'] ?? '';
$recursos        = $_POST['recursos'] ?? '';
$evento          = $_POST['evento'] ?? '';

if ($nombre_proyecto === '' || $tema === '' || $categoria === '' || $recursos === '' || $evento === '') {
  backWithAlert('Faltan datos del póster.');
}

/* ===== Archivos: Documento y Póster (PDF ≤ 10MB) ===== */
$MAX_BYTES = 10 * 1024 * 1024;

if (empty($_FILES['documento']['name']) || empty($_FILES['poster']['name'])) {
  backWithAlert('Debes adjuntar el Documento y el Póster en PDF.');
}

// Documento
$documento_name = $_FILES['documento']['name'];
$documento_type = $_FILES['documento']['type'];
$documento_tmp  = $_FILES['documento']['tmp_name'];
$documento_size = $_FILES['documento']['size'] ?? 0;

if (!isPdf($documento_name, $documento_type)) {
  backWithAlert('El Documento debe ser un PDF.');
}
if ($documento_size > $MAX_BYTES) {
  backWithAlert('El Documento excede 10 MB.');
}

// Póster
$poster_name = $_FILES['poster']['name'];
$poster_type = $_FILES['poster']['type'];
$poster_tmp  = $_FILES['poster']['tmp_name'];
$poster_size = $_FILES['poster']['size'] ?? 0;

if (!isPdf($poster_name, $poster_type)) {
  backWithAlert('El Póster debe ser un PDF.');
}
if ($poster_size > $MAX_BYTES) {
  backWithAlert('El Póster excede 10 MB.');
}

/* ===== Guardar póster ===== */
$id_poster = $registro->savePoster(
  $nombre_proyecto,
  $tema,
  $categoria,
  $documento_name,
  $documento_tmp,
  $poster_name,
  $poster_tmp,
  $recursos,
  $evento
);

if (!$id_poster) {
  backWithAlert('No se pudo guardar el póster.');
}

/* ===== Guardar participantes (1 o 2) ===== */
$usuarioOk = $registro->saveUsuarioPoster(
  $array,
  $nombre,
  $apellidoPaterno,
  $apellidoMaterno,
  $email,
  $emailAlternativo,
  $telefono,
  $cargo,
  $empresa,
  $pais,
  $ciudad,
  $id_poster,
  $evento
);

if ($usuarioOk) {
  header("Location: gracias.php");
  exit;
} else {
  backWithAlert('No se pudieron registrar los participantes.');
}