<?php 
require 'includes/templates/head.php'; 
require 'class/clases.php';
$data = new Conferencistas();
?>
<header class="header">
  <div class="container">
    <h1 class="header__titulo">Ponentes</h1>
    <img src="build/img/linea.png" alt="">
    <p>Las personas más reconocidas de nuestra industria en todo el mundo Compartirán sus experiencias profesionales con todos los presentes. 
    Los temas más atractivos, los casos de éxito y mejores prácticas se desvelarán en las Conferencias Magistrales. 
    </p>
  </div>
</header>
<main id="ponentes">
  <div class="container mt-5">
    <div class="row">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><h5 class="subtituloPMin">Magistrales</h5></button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><h5 class="subtituloPMin">Sesiones Educativas</h5></button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><h5 class="subtituloPMin">Talleristas</h5></button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
          <div class="container">
            <div class="row mt-3">
              <?php 
                $magistrales = $data->magistrales(2);
                foreach ($magistrales as $value) 
                {
                  echo "
                    <figure class='col-sm-12 col-md-3 contenido_conferencista'>
                      <img src='./imagenes/".$value['fotografia']."' class='rounded-circle'>
                      <figcaption>
                        <a href='conferencista.php?id=".$value["id_usuario"]."'>
                          <h3 class='nombre'>".$value['nombres']." ".$value['apellido_paterno']."</h3>
                        </a>
                        <h4>".$value['cargo']."</h4>
                        <hr>
                        <h5>".$value['empresa']."</h5>
                      </figcaption>
                    </figure>
                  ";
                }
              ?>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        <div class="container">
            <!-- <div class="row mt-3">
              <div class="col-md-12">
                <p>Sesiones educativas con ponentes excepcionales tanto nacionales como internacionales.</p>
                <p>Este será el momento designado para el aprendizaje y la formación. En función de tu tema de interés, podrás seleccionar 1 de las 4 sesiones educativas simultáneas en la que desees participar. </p>
                <p>Revisa los días y horarios de las sesiones en nuestro programa final.</p>
              </div>
            </div> -->
            <div class="row mt-3">
              <?php 
                $conferencistas = $data->sesionesEducativas(2);
                foreach ($conferencistas as $value) 
                {
                  echo "
                    <figure class='col-sm-12 col-md-3 contenido_conferencista'>
                      <img src='./imagenes/".$value['fotografia']."' class='rounded-circle'>
                      <figcaption>
                        <a href='conferencista.php?id=".$value["id"]."'>
                          <h3 class='nombre'>".$value['nombres']." ".$value['apellido_paterno']."</h3>
                        </a>
                        <h4>".$value['cargo']."</h4>
                        <hr>
                        <h5>".$value['empresa']."</h5>
                      </figcaption>
                    </figure>
                  ";
                }
              ?>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
          <div class="container">
          <div class="row mt-3">
          <?php 
$talleristas = $data->talleristas(2);
foreach ($talleristas as $value) {  
    echo "
    <figure class='col-sm-12 col-md-3 contenido_conferencista'>
      <img src='./imagenes/".$value['fotografia']."' class='rounded-circle'>
      <figcaption>
        <a href='talleristas.php?id=".$value["id_tallerista"]."'>
          <h3 class='nombre'>".$value['nombre']." ".$value['apellidos']."</h3>
        </a>
        <h4>".$value['cargo']."</h4>
        <hr>
        <h5>".$value['empresa']."</h5>
      </figcaption>
    </figure>
    ";
}
?>







            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</main>



  <?php require 'includes/templates/sede.php'; ?>

  <?php require 'includes/templates/patrocinadores.php'; ?>

  <?php require 'includes/templates/expositores.php'; ?>

</main>
<?php require 'includes/templates/footer.php'; ?>