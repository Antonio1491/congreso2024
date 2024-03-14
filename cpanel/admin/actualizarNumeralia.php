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
$numeralia = new Numeralia();

$asistentes = $_POST["asistentes"];
$paises = $_POST["paises"];
$ponentes = $_POST["ponentes"];
$conferencistas = $_POST["conferencistas"];
$expositores = $_POST["expositores"];
$talleres = $_POST["talleres"];
$numeralia_id = $_POST["numeralia"];


// var_dump($_POST);

// echo $asistentes,$paises,$ponentes,$conferencistas,$expositores,$talleres,$numeralia;

$actualizar= $numeralia->actualizarDatosNumeralia($asistentes,$paises,$ponentes,$conferencistas,$expositores,$talleres,$numeralia_id);


if($actualizar){
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