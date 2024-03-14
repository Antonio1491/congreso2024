<?php session_start();
include('../class/funciones.php');
$preguntas = new PreguntasFrecuentes();
$usuario =  $_SESSION['idCredencial'];

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

          <form id="form" action="datosPreguntaFrecuente.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5 class ="tituloSeccion">Registro de preguntas Frecuentes</h5></legend>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-6">
                  <label for="">Pregunta</label>
                  <input type="text"  name="pregunta" class="">
                </div>
                <div class="column medium-6">
                  <label for="">Tema de pregunta</label>
                  <select name="tema" id="tipo" >
                  <option value="nulo">Seleccione una opción</option>
                    <?php  
                      echo $preguntas->htmlTemas();
                    ?>
              
             </select> 
                </div>
              </div>
              <div class="row ">
                <div class="column medium-12">
                  <label for="">Respuesta:</label>
                  <textarea id="respuesta" name="respuesta" rows="2" cols="50"></textarea>
                </div>
               
              </div>
              
              
              <div class="row ">
              <div class="column medium-12">

                <input type="submit" name="" value="Guardar" class="button">
              </div>
              </div>

            </fieldset>
          </div>
         
          <div class="registro2">
          </form>   
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
 <script src="../js/vendor/foundation.min.js" type="text/javascript"></script>

<script>
  $(document).foundation();
 </script> 
    
</body>
</html>