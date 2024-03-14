<?php
require 'includes/config/Database.php';
require 'Registro.php';

// $registro = new Registro();
// $registro->prueba();

// $registro = new Registro();

// $registro->prueba();


// if($_SERVER['REQUEST_METHOD'] === 'POST')
// {
//   // Datos personales del conferencista
//   $nombre = str_replace("'","´",$_POST['Nombre']);
//   $apellidoPaterno = str_replace("'","´",$_POST['ApellidoPaterno']);
//   $apellidoMaterno = str_replace("'","´",$_POST['ApellidoMaterno']);
//   $email = $_POST['Email'];
//   $emailAlternativo = $_POST['EmailAlternativo'];
//   $telefono = $_POST['Telefono'];
//   $telefonoAlternativo = $_POST['TelefonoAlternativo'];
//   $cargo = str_replace("'","´",$_POST['Cargo']);
//   $empresa = str_replace("'","´",$_POST['Empresa']);
//   $pais =  str_replace("'","´",$_POST['Pais']);
//   $estado =  str_replace("'","´",$_POST['Estado']);
//   $ciudad =  str_replace("'","´",$_POST['Ciudad']);
//   $biografia = str_replace("'","´",$_POST['Biografia']);
//   $nombre_foto = $_FILES['Fotografia']['name'];
//   $tipo_foto = $_FILES['Fotografia']['type'];
//   $temporal_foto = $_FILES['Fotografia']['tmp_name'];
  
//   $array = count($_POST['Nombre']);
  
//   // Datos sobre la sesión educativa
//   $titulo = filtrado($_POST['Titulo']);
//   $subtitulo = filtrado($_POST['Subtitulo']);
//   $tema = $_POST['Tema'];
//   $descripcion = filtrado($_POST['Descripcion']);
//   $justificacion = filtrado($_POST['Justificacion']);
//   $objetivos = filtrado($_POST['Objetivos']);
//   $recursos = $_POST['Recursos'];
//   $modalidad = $_POST['Modalidad'];

//   // $evento = $_POST['Evento'];

//   $sesion = $registro->savePonencia($modalidad, $titulo, $subtitulo, $tema, $descripcion, $justificacion, 
//             $objetivos , $recursos);
//   $id_ponencia = $sesion;
//   $usuario = $registro->saveUsuario($array, $nombre, $apellidoPaterno, $apellidoMaterno, $email,
//                 $emailAlternativo, $telefono, $telefonoAlternativo, $cargo, $empresa,
//                 $pais, $estado, $ciudad, $biografia, $nombre_foto,
//                 $tipo_foto, $temporal_foto, $id_ponencia);
  
//   if ( $usuario == true ) {

//     echo header("Location: gracias.php");
  
//   }
//   else{
//     echo" 
//     <script language='JavaScript'>
//         alert('Error: No pudimos realizar el registro');
//         </script>";
//     echo "<script>window.history.go(-1);</script>";
//   }
                                              
// }
// //En caso de no mandar datos del formulario redireccionaR a convocatoria
// else{
//   //Página web de la convocatoria
//   header('location: https://congresoparques.com/registro_sesiones.php');
// }
  
//   function filtrado($datos){
//     $datos = trim($datos); // Elimina espacios antes y después de los datos
//     $datos = stripslashes($datos); // Elimina backslashes \
//     $datos = addslashes($datos); // Inserta un \ para los apostrofes del texto (textos en inglés)
//     $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
//     return $datos;
//   }
  
  
