<?php

require "includes/config/Database.php";
include "classes/Registro.php";

$registro = new Registro();

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // Datos personales del conferencista
  $nombre = str_replace("'","´",$_POST['Nombre']);
  $apellidoPaterno = str_replace("'","´",$_POST['ApellidoPaterno']);
  $apellidoMaterno = str_replace("'","´",$_POST['ApellidoMaterno']);
  $email = $_POST['Email'];
  $emailAlternativo = $_POST['EmailAlternativo'];
  $telefono = $_POST['Telefono'];
  // $telefonoAlternativo = $_POST['TelefonoAlternativo'];
  $cargo = str_replace("'","´",$_POST['Cargo']);
  $empresa = str_replace("'","´",$_POST['Empresa']);
  $pais =  str_replace("'","´",$_POST['Pais']);
  // $estado =  str_replace("'","´",$_POST['Estado']);
  $ciudad =  str_replace("'","´",$_POST['Ciudad']);
  // $biografia = str_replace("'","´",$_POST['Biografia']);
  // $nombre_foto = $_FILES['Fotografia']['name'];
  // $tipo_foto = $_FILES['Fotografia']['type'];
  // $temporal_foto = $_FILES['Fotografia']['tmp_name'];
  
  $array = count($_POST['Nombre']);
  
  // Datos sobre el póster
  $nombre_proyecto = filtrado($_POST['nombre_proyecto']);
  $tema = $_POST['tema'];
  $categoria = $_POST['categoria'];
  $documento = $_FILES['documento']['name'];
  $temporal_documento = $_FILES['documento']['tmp_name'];
  $poster = $_FILES['poster']['name'];
  $temporal_poster = $_FILES['poster']['tmp_name'];
  $recursos = $_POST['recursos'];

  $evento = $_POST['evento'];

  $poster = $registro->savePoster($nombre_proyecto, $tema, $categoria, $documento,
            $temporal_documento, $poster, $temporal_poster, $recursos, $evento);
  $id_poster = $poster;
  $usuario = $registro->saveUsuarioPoster($array, $nombre, $apellidoPaterno, $apellidoMaterno, $email,
                $emailAlternativo, $telefono, $cargo, $empresa,
                $pais, $ciudad, $id_poster, $evento);
  
  if ( $usuario == true ) {

    echo header("Location: gracias.php");
  
  }
  else{
    echo" 
    <script language='JavaScript'>
        alert('Error: No pudimos realizar el registro');
        </script>";
    echo "<script>window.history.go(-1);</script>";
  }
                                              
}
//En caso de no mandar datos del formulario redireccionaR a convocatoria
else{
  // Página web de la convocatoria
  header('location: ./../registro_sesiones.php');
}
  
  function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = addslashes($datos); // Inserta un \ para los apostrofes del texto (textos en inglés)
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
  }
  
  
