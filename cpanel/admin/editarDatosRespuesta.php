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
$conferencias = new Conferencia();

$id_congreso = $_GET["congreso"];
$id_tema = $_GET["tema"];
$id_conferencia = $_GET["conferencia"];
$id_usuario = $_GET["usuario"];




$insertar = $conferencias->actualizarRespuestasBD($_POST,$id_congreso,$id_tema,$id_conferencia,$id_usuario);


if($insertar){
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