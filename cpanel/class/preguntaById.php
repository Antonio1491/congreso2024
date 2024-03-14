
<?php 
include('../class/funciones.php');
$conferencias = new Conferencia();

$id_pregunta = $_POST["id_pregunta"];

$buscarPregunta = $conferencias->preguntaById($id_pregunta);


?>