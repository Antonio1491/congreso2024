<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

<?php 
include('../class/funciones.php');
$testimonial = new Testimoniales();

// $congreso = $_POST["congreso"];


$id = $_GET['id'];


$getNombreFoto = $testimonial->getNameFotoById($id);
$url_base = 'testimoniales/'.$getNombreFoto;
//           
$borrar = $testimonial->borrarTestimonial($id);
if($borrar){
    unlink($url_base);
    header('Location:' . getenv('HTTP_REFERER'));

}

?>