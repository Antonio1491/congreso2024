<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.all.min.js"></script> 
  <link rel="stylesheet" href="../css/foundation/foundation.min.css">
  <title>Document</title>
</head>
<body>
</body>
</html>
<?php
include('../class/funciones.php');
$conferencista = new Conferencistas();

$documento = $_FILES["archivo"]["name"];
$tmp_documento = $_FILES["archivo"]["tmp_name"];
$size_documento = $_FILES["archivo"]["size"];
$type_documento = $_FILES["archivo"]["type"];
$video1 = $_POST['video1'];
$video2 = $_POST['video2'];
$video3 = $_POST['video3'];
$id_credencial = $_POST['id'];

$doc = $conferencista -> setImg($documento, $size_documento, $type_documento);



$datos = $conferencista->guardarDocumentos($doc,$video1,$video2,$video3,$id_credencial);

$conferencista -> guardarImg($doc, $tmp_documento);


if($datos ){
        echo '<script>
                      Swal.fire({ title: "Documents Saved",
                          icon: "success",customClass: "swal-wide",}).then(okay => {
                            if (okay) {
                        window.location.href = "documentacion.php";
                           }
                         });
                    
                  </script>';
    }else{
        echo  '<script>
        Swal.fire({ title: "Error",
            text: "Upps Your Documents arent saved",
            icon: "error",customClass: "swal-wide",}).then(okay => {
              if (okay) {
                        window.location.href = "documentacion.php";

             }
           });
      
    </script>';
        }

 ?>
