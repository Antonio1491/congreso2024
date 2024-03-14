<?php session_start();
include('../class/funciones.php');
?>
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
$data = [
"bloque_ing" => addslashes($_POST['bloque_ing']),
"fecha" => $_POST['fecha'],
"inicio" => $_POST['inicio'],
"fin" => $_POST['fin'],
"tipo" => $_POST['tipoBloque'],
"congreso" => $_POST['evento']
];
// $data = json_encode($data);
// var_dump(json_decode($data));
// die();

$programa = new Programa();
$resultado = $programa->guardarBloque(json_encode($data));
if ($resultado) {
  $mensaje = '
  <script>
Swal.fire({
    icon: "success",
    title: "Agregado con éxito",
    text: "Datos guardados correctamente"
  }).then((result) => {
    if (result.isConfirmed) {
      window.history.go(-1);
    }
  })

</script>
  
  ';
  echo $mensaje;
  }
  else{
    echo'<script>
    Swal.fire({
            icon: "error",
            title: "Error",
            text: "No pudimos crear el evento"
          }).then((result) => {
            if (result.isConfirmed) {
              window.history.go(-1);
            }
          })
    
    </script>';
  }
 ?>

