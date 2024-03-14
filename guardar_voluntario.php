<?php
include ('class/clases.php');
$registro = new Voluntarios();

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
// $apMaterno = $_POST["apellidoMaterno"];
$email = $_POST["email"];
$celular = $_POST["celular"];
// $genero = $_POST["genero"];
$universidad = $_POST["universidad"];
$city = $_POST["city"];
$country = $_POST["country"];
$semblanza = $_POST["semblanza"];
$razones = $_POST["razones"];
$turno = $_POST["turno"];
$evento = $_POST["evento"];

$nuevoVoluntario = $registro->registroVoluntario($nombre, $apellidos,  $email, $celular, $universidad, $city, $country, $semblanza, $razones, $turno, $evento );

if ($nuevoVoluntario){
  // $turnoAsignado = $registro->turnoAsignado($turno);
  echo header("Location: VoluntarioRegistrado.html");
}
else{
  echo"<script language='JavaScript'>
        alert('Error: No pudimos realizar el registro');
        </script>";
}


?>
