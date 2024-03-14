

<?php 
include('funciones.php');
$conferencias = new Conferencia();


$calificado = $_POST['id_usuario'];
// $insertar = $conferencias->buscarCalificados($pregunta1,$pregunta2,$pregunta3,$pregunta4,$pregunta5,$usuario,$congreso,$conferencia,$tema);
$verificar = $conferencias->propuestasCalifcadasPorUsuario($calificado)

// echo json_encode($calificado);

?>