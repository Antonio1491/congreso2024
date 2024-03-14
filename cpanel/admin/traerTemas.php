<?php
include('../class/funciones.php');
// var_dump($_GET["id"]);

$listaTemas = new Tema();

$temas = $listaTemas->listaTemasUsuario($_GET["id"]);

// echo $temas;

?>