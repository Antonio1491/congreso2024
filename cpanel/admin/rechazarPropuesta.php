<?php
include('../class/funciones.php');

$id = (int)$_GET['id'];

$propuestas = new Propuesta(); // o la clase donde agregaste `rechazar`
if ($propuestas->rechazar($id)) {
    
  header('Location: propuestas.php');
  exit;
} else {
  header('Location: propuestas.php?error=1');
  exit;
}
