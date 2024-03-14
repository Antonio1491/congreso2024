<?php session_start();
include('../class/funciones.php');
$usuario =  $_SESSION['idCredencial'];
$congreso =  $_SESSION["evento"];

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

          <form id="form" action="datosNumeralia.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5 class ="tituloSeccion">Registro Numeralia</h5></legend>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-4">
                  <label for="">Asistentes</label>
                  <input type="number" id="pregunta" name="asistentes" ></input>
                </div>
                <div class="column medium-4">
                  <label for="">Países</label>
                  <input type="number" id="pregunta" name="paises" ></input>
                </div>
                <div class="column medium-4">
                  <label for="">Ponentes</label>
                  <input type="number" id="pregunta" name="ponentes" "></input>
                </div>
                <div class="column medium-4">
                  <label for="">Conferencistas</label>
                  <input type="number" id="pregunta" name="conferencistas" ></input>
                </div>
                <div class="column medium-4">
                  <label for="">Expositores</label>
                  <input type="number" id="pregunta" name="expositores""></input>
                </div>
                <div class="column medium-4">
                  <label for="">Talleres</label>
                  <input type="number" id="pregunta" name="talleres"  ></input>
                </div>
           
              </div>
              
              <div class="row ">
              <div class="column medium-12">
              <input type="hidden" name="congreso" value="<?php echo $congreso?>">
                <input type="submit" name="" value="Guardar" class="hollow button success">
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
    
</body>
</html>