<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.all.min.js"></script>
    <title>Document</title>
</head>
<body>

    
</body>
</html>
<?php
include("clases.php");

$formulario = new Agenda();


$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$organizacion = $_POST["organizacion"];
$fecha = $_POST['fecha'];
$id_expo = $_POST["id_expo"];
$congreso = $_POST["congreso"];
// $fecha = mysqli_real_escape_string($_POST['fecha']);

$nuevoRegistro = $formulario->guardarCita($nombre,$telefono,$email,$organizacion,$id_expo,$fecha, $congreso);
$mail2 = $formulario->getNombreExpositor($id_expo);
$nom3 = $formulario->getEmailExpo($id_expo);
 $mail1 = $formulario ->sendCorrreoUsuario($nombre,$email,$fecha,$id_expo);
$mail3 = $formulario ->correoExpo($nombre,$telefono,$email,$organizacion,$fecha);

if($nuevoRegistro && $mail1 && $mail3 ){
    echo '<script>
                  Swal.fire({ title: "Registro completo",
                      text: "Tu registro se ha guardado con éxito, el expositor se pondrá en contacto contigo para confirmar los detalles de la cita.",
                      icon: "success",customClass: "swal-wide",}).then(okay => {
                        if (okay) {
                         window.location.href = "../index.php";
                       }
                     });
                
              </script>';
}else {

  echo '<script>
                  Swal.fire({ title: "Hubo un problema al procesar tus datos",
                      text: "Intentelo mas tarde hubo un error al agendar la cita",
                      icon: "error",customClass: "swal-wide",}).then(okay => {
                        if (okay) {
                         window.location.href = "../index.php";
                       }
                     });
                
              </script>';
}

?>