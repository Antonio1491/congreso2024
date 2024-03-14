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



$id = $_POST['id'];
$foto = $_FILES["foto"]["name"];
$tmp_name_foto = $_FILES["foto"]["tmp_name"];
$size_foto = $_FILES["foto"]["size"];
$type_foto = $_FILES["foto"]["type"];



$getNombreFoto = $testimoniales->getNameFotoById($id);
$url_base = 'testimoniales/'.$getNombreFoto;
$foto_format = $testimoniales -> setImg($foto, $size_foto, $type_foto);


$actualizar = $testimoniales->actualizarTestimonialFoto($foto_format,$id);

if($actualizar){
    $testimoniales -> guardarImg($foto_format, $tmp_name_foto);
    unlink($url_base);
    echo '<script>
    Swal.fire({
        icon: "success",
        title: "Registro guardado con exito",
        text: "Se realizo con exito la evaluación"
      }).then((result) => {
        if (result) {
        
            window.history.go(-2);
        }
      })
    
    </script>';
}



?>