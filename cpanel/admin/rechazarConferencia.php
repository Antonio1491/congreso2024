<?php
include('../class/funciones.php');

$id = (int)$_GET['id'];

$conferencias = new Propuesta(); // o la clase donde agregaste `rechazar`
if ($conferencias->rechazar($id)) {
    
  header('Location: conferencias.php');
  exit;
} else {
  header('Location: conferencias.php?error=1');
  exit;
}
