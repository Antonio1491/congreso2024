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
$preguntas = new PreguntasFrecuentes();

$pregunta = $_POST["pregunta"];
$respuesta = $_POST["respuesta"];
$tema = $_POST["tema"];
$id = $_POST["id"];

// $id_usuario = $_GET["usuario"];

// echo $pregunta,$respuesta,$tema;

// var_dump($_POST);

$insertar = $preguntas->actulizarPreguntasFrecuentes($pregunta,$respuesta,$tema,$id);


if($insertar){
    echo '<script>
    Swal.fire({
        icon: "success",
        title: "Registro actualizado con éxito",
        text: "Se realizó con éxito la actualización"
      }).then((result) => {
        if (result) {
        
            window.history.go(-2);
        }
      })
    
    </script>';
}


?>