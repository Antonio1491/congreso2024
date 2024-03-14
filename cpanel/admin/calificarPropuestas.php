<?php session_start();
include('../class/funciones.php');
$propuestas = new Propuesta();
$conferencias = new Conferencia();


$conferencia = $_GET['id_conferencia'];
$congreso = $_GET['id_congreso'];
$tema = $_GET['id_tema'];
$usuario =  $_SESSION['idCredencial'];

$variable = 'conferencia='.$conferencia.'&congreso='.$congreso.'&tema='.$tema.'&usuario='.$usuario;

 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Administrador</title>
    <?php require ("inc/head.php") ?>
  </head>
  <body>
      <?php include("inc/traductor.php") ?>
    <!-- <header>
      <div class="rows">
        <div class="column medium-10 medium-offset-2 text-center">
          <h4>Propuestas</h4>
        </div>
      </div>
    </header> -->
    <main class="row expanded">
      <div class="medium-2">
        <?php include("inc/menu_consejo.php") ?>
      </div>
      <section class="column medium-10">


      <?php require ("inc/header.php") ?>

      <form class="" action="datosRespuesta.php?<?php echo $variable?>" method="post" enctype="multipart/form-data">
              <div class="row ">
                  <?php
                   echo $conferencias->preguntas();
                  
                  ?>
                   <br><div class="column medium-8">
                
                <input type="submit" name="" value="Calificar" class="button success">
              </div>
             </div>            
          </form>         
      </section>
    </main>
    <footer></footer>

    <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
  <!-- <script src="../js/what-input.js" type="text/javascript"></script> -->
  <script src="../js/foundation.min.js" type="text/javascript"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

  <script>

        let divOcular = document.getElementById('7');


        divOcular.style.display = "none";


        let dinamico = document.querySelectorAll('input[name="5"]');


        for(algo of dinamico){
            algo.addEventListener("change", function(){

                if(this.value =='Regular' || this.value=='Mala'){
                    divOcular.style.display = "block";

                }else{
                    divOcular.style.display = "none";

                }
            });


        }




  //       const seenIDs = {};
  // for (const item of document.querySelectorAll(' .unique')) {
  //     if (seenIDs[item.dataset.id]) item.parentNode.removeChild(item);
  //     else seenIDs[item.dataset.id] = true;
  // }




  </script>
   <script>
      $('.fi-home').hide();
    </script>


  </body>
</html>
