<?php

require "includes/config/Database.php";
include "classes/Registro.php";

$registro = new Registro();

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  // ========= DATOS PERSONALES (en ARRAYS) =========
  // Nota: str_replace funciona con arrays, así mantenemos arrays intactos
  $nombre            = str_replace("'", "´", $_POST['Nombre']);            // []
  $apellidoPaterno   = str_replace("'", "´", $_POST['ApellidoPaterno']);   // []
  $apellidoMaterno   = str_replace("'", "´", $_POST['ApellidoMaterno']);   // []
  $email             = $_POST['Email'];                                     // []
  $emailAlternativo  = $_POST['EmailAlternativo'];                           // []
  $telefono          = $_POST['Telefono'] ?? [];                            // []
  $telefonoAlternativo = $_POST['TelefonoAlternativo'] ?? [];               // []
  $cargo             = str_replace("'", "´", $_POST['Cargo']);              // []
  $empresa           = str_replace("'", "´", $_POST['Empresa']);            // []
  $pais              = str_replace("'", "´", $_POST['Pais']);               // []
  $estado            = str_replace("'", "´", $_POST['Estado']);             // []
  $ciudad            = str_replace("'", "´", $_POST['Ciudad']);             // []
  $biografia         = str_replace("'", "´", $_POST['Biografia']);          // []

  // Archivos (también como arrays)
  $nombre_foto   = $_FILES['Fotografia']['name'];      // []
  $tipo_foto     = $_FILES['Fotografia']['type'];      // []
  $temporal_foto = $_FILES['Fotografia']['tmp_name'];  // []

  // Cantidad de ponentes
  $array = count($_POST['Nombre']);

  // ========= DATOS DE LA SESIÓN (una sola vez) =========
  $titulo        = filtrado($_POST['Titulo']);
  $subtitulo     = filtrado($_POST['Subtitulo']);
  $tema          = $_POST['Tema'];
  $descripcion   = filtrado($_POST['Descripcion']);
  $justificacion = filtrado($_POST['Justificacion']);
  $objetivos     = filtrado($_POST['Objetivos']);
  $recursos      = $_POST['Recursos']; // si quieres, aplica filtrado()
  $modalidad     = $_POST['Modalidad'];
  $evento        = $_POST['evento'];

  // 1) Guardar la ponencia y obtener su id
  $id_ponencia = $registro->savePonencia(
    $modalidad, $titulo, $subtitulo, $tema, $descripcion,
    $justificacion, $objetivos, $recursos, $evento
  );

  // 2) Guardar TODOS los usuarios en UNA llamada (saveUsuario itera internamente)
  $usuario = $registro->saveUsuario(
    $array,
    $nombre,
    $apellidoPaterno,
    $apellidoMaterno,
    $email,
    $emailAlternativo,
    $telefono,
    $telefonoAlternativo,
    $cargo,
    $empresa,
    $pais,
    $estado,
    $ciudad,
    $biografia,
    $nombre_foto,
    $tipo_foto,
    $temporal_foto,
    $id_ponencia,
    $evento
  );

  if ($usuario) {
    header("Location: gracias.php");
    exit;
  } else {
    echo "<script>
      alert('Error: No pudimos realizar el registro');
      window.history.back();
    </script>";
    exit;
  }

} else {
  // En caso de no mandar datos del formulario
  header('Location: https://congresoparques.com/registro_sesiones.php');
  exit;
}

function filtrado($datos){
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = addslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}