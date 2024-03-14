              <?php session_start();
include('../class/funciones.php');
$propuestas = new Propuesta();
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

          <form id="form" action="datosTestimonial.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5 class ="tituloSeccion">Registro de testimonial</h5></legend>
                </div>
              </div>
              <div class="row ">
              <div class="column medium-6">
                  <label for="">Nombre</label>
                  <input type="text" id="pregunta" name="nombre"></input>
                </div>
                <div class="column medium-6">
                  <label for="">Comentario</label>
                  <input type="text" id="pregunta" name="comentario"></input>
                </div>
              </div>
              <div class="row ">
              <div class="column medium-6">
                  <label for="">Puesto</label>
                  <input type="text" id="pregunta" name="puesto"></input>
                </div>
                <div class="column medium-6">
                  <label for="">Empresa</label>
                  <input type="text" id="pregunta" name="empresa"></input>
                </div>
               
              </div>
              <div class="row ">
              <div class="column medium-12">
                  <label for="">Foto</label>
                  <input type="file" id="pregunta" name="foto"></input>
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