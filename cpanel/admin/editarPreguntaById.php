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

$pregunta = $_POST["pregunta"];
$id_pregunta = $_POST["id_pregunta"];
$tipo_pregunta = $_POST["tipo"];
$area = $_POST["area"];
// $congreso = $_POST["congreso"];
$congreso = 'CPL2020';



//           
// $insertar = $conferencias->actualizarRespuestasBD($_POST,$id_congreso,$id_tema,$id_conferencia,$id_usuario);
$editar = $conferencias->actualizarPregunta($id_pregunta,$pregunta,$tipo_pregunta,$area,$congreso);

if($editar){
    echo '<script>
    Swal.fire({
        icon: "success",
        title: "Registro actualizado con exito",
        text: "Se realizo con exito la edición"
      }).then((result) => {
        if (result) {
        
            window.history.go(-2);
        }
      })
    
    </script>';
}


?>