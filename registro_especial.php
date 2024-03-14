<?php 
require 'includes/templates/head.php'; 
include ('class/clases.php');
?>
<header class="header">
  <div class="container">
    <h1 class="header__titulo">Registro Especial</h1>
    <img src="build/img/linea.png" alt="">
  </div>
</header>
<main>
  <div class="container my-5">
    <div class="row">
      <div class="col-md-4 col-sm-12 bg-light p-4">
        <!-- Instrucciones -->
        <h5 class="subtituloPMin text-center">Registro Especial</h5>
        <p class="justify">Este espacio está designado para el registro de las personas que forman parte de las empresas patrocinadoras y gobierno.<p> 
        <p>Si tienes alguna duda o incoveniente al llenar este registro comunícate con Blanca Anaya al email: conexion@anpr.org.mx</p>
      </div>

      <div class="col-md-7 col-sm-12 offset-md-1">
        <!-- formulario -->
        <form action="guardar_especial.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend class="subtituloPMin">Datos personales:</legend>
            <hr>
            <section class="datosUsuario">
              <div class="row mb-3">
                <div class="col-6">
                  <label for="Nombre" class="form-label">Nombres:</label>
                  <input type="text" id="Nombre" name="nombre" value="" class="form-control" required>
                </div>
                <div class="col-6">
                  <label for="apellidoPaterno" class="form-label">Apellidos:</label>
                  <input type="text" id="apellidoPaterno" name="apellidos" value="" class="form-control" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-6">
                  <label for="email" class="form-label">E-mail:</label>
                  <input type="text" id="email" name="email" value="" class="form-control" required placeholder="">
                </div>
                <div class="col-6">
                  <label for="telefono"  class="form-label">Teléfono:</label>
                  <input type="text" id="telefono" name="celular" value="" class="form-control" placeholder="Clave de País y Teléfono">
                </div>
              </div>
              <!-- <div class="row mb-3">
                <div class="col-6">
                  <label for="pais"  class="form-label">País:</label>
                  <input type="text" id="pais" name="country" value="" placeholder="" required class="form-control">
                </div>
                <div class="col-6">
                  <label for="ciudad"  class="form-label">Ciudad:</label>
                  <input type="text" id="ciudad" name="city" value="" placeholder="" class="form-control">
                </div>
              </div> -->
        
              <div class="row mb-3">
                <div class="col">
                  <label for="empresa"  class="form-label">Organización/Empresa de procedencia:</label>
                    <select name="empresa" class="form-select">
                      <option >-- Seleccionar --</option>
                      <option value="Gobierno">Gobierno de León Guanajuato</option>
                      <option value="Play Club"> Play Club</option>
                      <option value="Buggy">Buggy</option>
                      <option value="Buggy">Invitado</option>
                    </select>
                </div>
              </div>
              
            </section>

          </fieldset>
          <div class="text-center">
            <input type="hidden" name="evento" value="1">
            <input type="submit" name="" value="Registrar" class="btn btn__primary">
          </div>
        </form>
        <!-- Fin de formulario -->
      </div>
    </div>
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