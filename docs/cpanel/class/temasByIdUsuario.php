<?php 
include('../class/funciones.php');
$conferencias = new Conferencia();

$id = $_POST["id"];

// echo json_encode($id);

//           
$consultar = $conferencias->temasByUsuario($id);


?>