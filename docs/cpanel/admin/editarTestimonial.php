<?php session_start();
include('../class/funciones.php');
$testimonial = new Testimoniales();
$usuario =  $_SESSION['idCredencial'];
$id = $_GET['id'];

 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Administrador</title>
    <?php require ("inc/head.php") ?>
   
  </head>
  <body>
    <!-- <header>
      <div class="rows">
        <div class="column medium-10 medium-offset-2 text-center">
          <h4>Propuestas</h4>
        </div>
      </div>
    </header> -->
    <main class="row expanded">
      <div class="medium-2">
      <?php include("inc/menuEvento.php") ?>
      </div>
      <section class="column medium-10">
 


      <?php require ("inc/header.php") ?>
      <div class="column medium-8">

      <?php $datos = $testimonial->getTestimonialById($id);
      foreach($datos as $data){

        echo '
        <form id="form" action="datosEditarTestimonial.php" method="post" enctype="multipart/form-data">
        <fieldset>
          <div class="row">
            <div class="column">
              <legend><h5 class ="tituloSeccion">Registro de testimonial</h5></legend>
            </div>
          </div>
          <div class="row ">
          <div class="column medium-6">
              <label for="">Nombre</label>
              <input type="text" value="'.$data['nombre'].'" id="pregunta" name="nombre"></input>
            </div>
            <div class="column medium-6">
              <label for="">Comentario</label>
              <textarea type="text" id="pregunta"  name="comentario">'.$data['comentario'].'</textarea>
            </div>
          </div>
          <div class="row ">
          <div class="column medium-6">
              <label for="">Puesto</label>
              <input type="text" id="pregunta" value="'.$data['puesto'].'" name="puesto"></input>
            </div>
            <div class="column medium-6">
              <label for="">Empresa</label>
              <input type="text" id="pregunta" value="'.$data['empresa'].'"  name="empresa"></input>
            </div>
          </div>
          <div class="row ">
          <div class="column medium-12">
          <input type="hidden" name="id" value="'.$id.'" class="hollow button success">
            <input type="submit" name="" value="Guardar" class="hollow button success">
          </div>
          </div>
        </fieldset>
      </div>
          </form>   
        ';

      }
      
      
      
      ?>


    
          </div>
</div>

<script>

    // let formulario = document.getElementById('form');

    // formulario.addEventListener('submit', function(e){
    //   e.preventDefault();

    //   let pregunta = document.getElementById('pregunta');
    //   let tipo = document.getElementById('tipo');
    //   let area = document.getElementById('area');


    //   if(pregunta.value == ""|| area.value == "" || tipo.value=="nulo"){

    //     Swal.fire(
    //         'Completa todos los campos',
    //         'Antes de continuar necesitas llenar todos los campos',
    //         'warning'
    //             )
    //   }else{
    //     formulario.submit();
        
        
    //   }


    // });


    

</script>
    
</body>
</html>