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

$foto = $_FILES["foto"]["name"];
$tmp_name_foto = $_FILES["foto"]["tmp_name"];
$size_foto = $_FILES["foto"]["size"];
$type_foto = $_FILES["foto"]["type"];

$foto_format = $testimoniales -> setImg($foto, $size_foto, $type_foto);


$insertar = $testimoniales->guardarTestimonial($nombre,$foto_format,$comentario,$puesto,$empresa);

if($insertar){
    $testimoniales -> guardarImg($foto_format, $tmp_name_foto);
}


if($insertar){
    echo '<script>
    Swal.fire({
        icon: "success",
        title: "Registro guardado con éxito",
        text: "El registro se guardo con éxito"
      }).then((result) => {
        if (result) {
        
            window.history.go(-2);
        }
      })
    
    </script>';
}


?>