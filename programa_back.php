<?php require 'includes/templates/head.php'; 
require("class/clases.php");
$listaBloque = new Programa();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<header class="header">
  <div class="container">
    <h1 class="header__titulo">Programa</h1>
    <img src="build/img/linea.png" alt="">
    <p class="lead">*Sujeto a cambios sin previo aviso</p>
  </div>
</header>
<main>
  <div class="container mt-5">
  <div class="row">
    <?php
    $congreso = "1";
    $bloque = $listaBloque->contendorPrograma(); 
    echo $bloque
    ?>
  </div>
    <script>
      $(document).ready(function(){
        $("#taller").click(function()
        {
          $(".taller").fadeToggle();
        });
      });
    </script>

    <section class="taller">
      <div class="lista_talleres">
      <ul>
        <?php  $talleres = $listaBloque->talleres("2023-11-23", "16:00:00", "18:00:00", "1");
          foreach ($talleres as $valor) 
          {
            echo "<li>".$valor['titulo']." " .$valor['subtitulo']."</li>";
            $resumen = $listaBloque->resumen($valor['descripcion']);
            echo "<p class='resumen'>".$resumen." <small><a href='#' data-open='t".$valor['id_taller']."'>ver más</a></small></p>";
          }
        ?>
      </ul>
    </div>
    </section>

    <!-- <div class="row column align-center">
      <a href="assets/ProgramaPreliminar2019.pdf"><img src="img/programa_preliminar_2019.png"></a>
    </div> -->
  </main>


  <?php
  //  Modal de los talleres
  // $datosTaller = $listaBloque->taller($congreso);
  // foreach ($datosTaller as $valor) {
  // echo "<div class='reveal emergente' id='t".$valor['id_taller']."' data-reveal>
  //       <figure class='text-center'><img src='img/uploads/talleres/".$valor['foto']."'></figure>
  //       <h4 class='text-center'>".$valor['titulo']." " .$valor['subtitulo']."</h4>
  //       <p >".$valor['descripcion']."</p>
  //       <small>Fecha: ".$valor['fecha']."</small>
  //       <small>Horario: de ".$valor['inicio']." a ".$valor['fin']." </small>
  //       <small>Capacidad: ".$valor['capacidad']." personas.</small>
  //       <button class='close-button' data-close aria-label='Close modal' type='button'>
  //       <span aria-hidden='true'>&times;</span>
  //       </button>
  //       </div>";
  // }

      // Modal de las conferencias 
  // $datosConferencia = $listaBloque->datosConferencia();
  // foreach ($datosConferencia as $valor) {
  //   echo "<div class='reveal emergente' id='conf".$valor['id']."' data-reveal>
  //         <h4 class='text-center'>".$valor['titulo']."</h4>
  //         <p >".$valor['descripcion']."</p>
  //         <small>Fecha: ".$valor['fecha']."</small>
  //         <small>Horario: de ".$valor['hora_inicio']." a ".$valor['hora_fin']." </small>
  //         <small>Lugar: ".$valor['ubicacion']."</small>
  //         <button class='close-button' data-close aria-label='Close modal' type='button'>
  //         <span aria-hidden='true'>&times;</span>
  //         </button>
  //         </div>";
  //   }

 ?>

<script type = "text/javascript">
  let programa = document.querySelector('#contenido_programa .row');
  
  let dia6 = document.createElement('div');
  dia6.id = 'dia6';
  dia6.classList.add('column');
  dia6.classList.add('medium-6');
  dia6.classList.add('small-12');

  programa.appendChild(dia6);

  dia6.innerHTML = '<section class="dia"><div class="dia_titulo"><a>19th November</a></div><div class="itinerario"></div></section>';

//   dia6.appendChild(bannerConstruccion);
  
  
  //descripción registro
  let seleccionarRegistro = document.querySelectorAll('.Registro');
 
  seleccionarRegistro.forEach( (data, indice) => {
    let descripcionRegistro = document.createElement('p');
    descripcionRegistro.textContent = "Don't forget to stop by the registration area outside rooms A1 and A2 to pick up your welcome kit and badge.";
    data.appendChild(descripcionRegistro);
    descripcionRegistro.classList.add('descripcionRegistroOculto');
    
    data.addEventListener('click', mostrarDescRegistro);
    function mostrarDescRegistro(indice){
      // console.log(`click en ${indice}`);
      descripcionRegistro.classList.toggle('descripcionRegistroOculto');
    }

  });
  
  
  //descripción Expo parques
  let expoParques = document.querySelectorAll('.Expo-Parques');
 
  expoParques.forEach( (data, indice) => {
    let descripcionExpo = document.createElement('p');
    descripcionExpo.textContent = "A specialized event of educational and experiential content, aimed at public space professionals and urban parks. Do not miss it!";
    data.appendChild(descripcionExpo);
    descripcionExpo.classList.add('ocultar');
    
    data.addEventListener('click', mostrarDescExpo);
    function mostrarDescExpo(indice){
      // console.log(`click en ${indice}`);
      descripcionExpo.classList.toggle('ocultar');
    }

  });
  
</script>

  </div>

  <div class="container">
    <div class="row">
      <img src="build/img/linea_gris.png" alt="">
    </div>
  </div>

</main>

  <?php require 'includes/templates/sede.php'; ?>

  <?php require 'includes/templates/patrocinadores.php'; ?>

  <?php require 'includes/templates/expositores.php'; ?>

</main>
<?php require 'includes/templates/footer.php'; ?>