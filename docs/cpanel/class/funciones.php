<?php
require('conexion.php');
include "classLogin.php";
include "classCongreso1.php";
include "classUsuarios.php";
include "classPropuestas.php";
include "classConferencistas.php";
include "classTaller.php";
include "classTallerista.php";
include "classBoletos.php";
include "classHoteles.php";
include "classHabitacion.php";
include "classTemas.php";
include "classRecorridos.php";
include "classEventos.php";
include "classVoluntarios.php";
include "classPatrocinadores.php";
include "classExpositor.php";
include "classConferencia.php";
include "classPrograma.php";
include "classNumeralia.php";
include "classTestimoniales.php";
include "preguntasFrecuentes1.php";
include "classPoster.php";

function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = addslashes($datos); // Inserta un \ para los apostrofes del texto (textos en inglés)
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
  }


  
 ?>
