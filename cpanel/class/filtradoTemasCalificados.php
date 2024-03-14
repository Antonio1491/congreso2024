<?php 

include('funciones.php');
$propuestas = new Conferencia();
// 

$id = $_POST['id'];
// $array =$_POST['array'];

// $json = json_decode(file_get_contents("php://input"));

// foreach($json as $js){
//     print_r($js->nombre);
// }

$int = intval($id);

if(!is_int($int)){

    // $filtrar = $propuestas->filtrarPorNumeroDeTema($array);
}else{
    $filtrar = $propuestas->filtrarPorNumeroDeTemaCalificado($id);

}

?>