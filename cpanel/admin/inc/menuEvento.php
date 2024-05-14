<?php
$logo = new Congreso();
$logo = json_decode($logo -> logoById($_SESSION['evento']));

?>

<nav class="menuPrincipal">
  <div class="text-center">
    <figure class="logotipoMenu">
      <?php
      echo "<img style='height:70%' src='https://congresoparques.com/img/logo_congreso_parques_180x74.png'>";
      ?>
    </figure>
  </div>
  <ul class="vertical menu accordion-menu" data-accordion-menu data-submenu-toggle="true" >
    <!-- <li><a href="boletos.php"><i class="fi-ticket"></i> Boletos del Evento</a></li> -->
    <li class="prueba">
      <a><span><i class="fi-list"></i> Convocatoria</span></a>
      <ul class="vertical menu">
      <li><a href="propuestas.php"><i class="fi-results"></i> Propuestas</a> </li>
      <li><a href="poster.php"><i class="fi-bookmark"></i> Posters</a></li>
      </ul> 
    </li>
    <!-- <li><a href="temas.php"><i class="fi-lightbulb"></i> Ejes Temáticos</a></li> -->
    <li><a href="conferencias.php"><i class="fi-projection-screen"></i> Conferencias</a></li>
    <li><a href="conferencista.php"><i class="fi-torsos-all"></i> Conferencistas</a></li>
    <li><a href="talleres.php"><i class="fi-megaphone"></i> Talleres</a></li>
    <li><a href="talleristas.php"><i class="fi-torsos-all"></i> Talleristas</a></li>
    <!--<li><a href="expositores.php"><i class="fi-trophy"></i> Expositores</a></li> -->
    <!-- <li><a href="recorridos.php"><i class="fi-mountains"></i> Recorridos Turísticos</a></li> -->
    <!-- <li><a href="eventos.php"><i class="fi-ticket"></i> Eventos Sociales</a></li>-->
    <li><a href="programa.php"><i class="fi-calendar"></i> Programa</a></li>
    <!-- <li><a href="hoteles.php"><i class="fi-marker"></i> Hoteles</a></li>  -->
    <!-- <li><a href="patrocinadores.php"><i class="fi-trophy"></i> Patrocinadores</a></li> -->
    <li><a href="voluntarios.php" ><i class="fi-torsos-all"></i> Voluntarios</a></li>
    <!-- <li><a href="agregarPreguntas.php"><i class="fi-results"></i>Añadir preguntas</a> -->
    <!-- <li><a href="boletos.php"><i class="fi-ticket"></i> Boletos del Evento</a></li> -->
    <!-- <li class="prueba">
      <a><span><i class="fi-list"></i> Comité congreso</span></a>
      <ul class="vertical menu ">
      <li><a href="editarPreguntas.php"><i class="fi-comments"></i>Preguntas Comité</a>
    <li><a href="avancePropuestas.php"><i class="fi-graph-bar"></i>Avance Representantes</a>
    <li><a href="promedioPropuestas.php"><i class="fi-graph-pie"></i>Resultados Propuestas</a>        -->
  </ul> 
    </li>
    <!-- <li><a href="editarPreguntas.php"><i class="fi-comments"></i>Preguntas Comité</a>
    <li><a href="avancePropuestas.php"><i class="fi-graph-bar"></i>Avance Representantes</a>
    <li><a href="promedioPropuestas.php"><i class="fi-graph-pie"></i>Resultados Propuestas</a>     -->
    <!-- <li><a href="numeralia.php"><i class="fi-book-bookmark"></i>Numeralia</a>    
    <li><a href="testimoniales.php"><i class="fi-comment-quotes"></i>Testimoniales</a>    
    <li><a href="preguntasFrecuentes.php"><i class="fi-comment"></i>Preguntas Frecuentes</a>     -->

  </li>
  </ul>
</nav>
