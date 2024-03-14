<?php 
include('../class/funciones.php');
$conferencias = new Conferencia();

$id = $_POST["id"];

// echo json_encode($id);

//           
$eliminar = $conferencias->eliminarPregunta($id);


?>