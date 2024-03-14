<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php 
include('../class/funciones.php');
$testimoniales = new Testimoniales();

$nombre = $_POST["nombre"];
$comentario = $_POST["comentario"];
$puesto = $_POST["puesto"];
$empresa = $_POST["empresa"];
$id = $_POST['id'];



$actualizar = $testimoniales->actualizarTestimonial($nombre,$comentario,$puesto,$empresa,$id);



if($actualizar){
    echo '<script>
    Swal.fire({
        icon: "success",
        title: "Registro actualizado con exito",
        text: "Se realizo con exito la actualización"
      }).then((result) => {
        if (result) {
        
            window.history.go(-2);
        }
      })
    
    </script>';
}


?>