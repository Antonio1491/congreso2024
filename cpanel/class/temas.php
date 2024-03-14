<?php 

include('funciones.php');
$propuestas = new Conferencia();
$array=json_decode(file_get_contents('php://input'));


$mandar = $propuestas->getPropuestasByIdTema($array);
// echo json_encode($array);


?>