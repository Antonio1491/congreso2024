<?php 
require 'includes/templates/head.php'; 
include ('class/clases.php');
?>
<header class="header">
  <div class="container">
    <h1 class="header__titulo">Registro de voluntarios</h1>
    <img src="build/img/linea.png" alt="">
  </div>
</header>
<main>
  <div class="container my-5">
    <div class="row">
      <div class="col-md-5 col-sm-12 bg-light p-4">
        <!-- Instrucciones -->
        <h5 class="subtituloPMin text-center">Convocatoria - Registro de voluntarios</h5>
        <p class="justify">Al ser parte de este equipo y cumplir con el turno de voluntariado podrás obtener un gran descuento en el Congreso Parques.</p>
        <p>Instrucciones:</p>
        <ul class="pt-2">
          <li>Seleccionar el turno (1) disponible que prefieras. Al seleccionar el turno te comprometes a cumplirlo y no puede haber cambios.</li>
          <li>Dejar tus datos personales. Todos los campos son necesarios.</li>
          <li>Espera un correo de confirmación, con más detalles para tu registro al congreso.</li>
          <li>Asistir a la capacitación en línea de voluntarios. El equipo del congreso se pondrá en contacto para hacerte saber el día y horario disponible para la capacitación. Asistir a la capacitación de voluntarios es indispensable. </li>
        </ul>
        <p class="justify">Si tienes dudas o inconvenientes para llenar este formulario, comunícate con Vitoria Martín, Directora de Contenido y Educación de la ANPR México a la dirección contenido@congresoparques.com con copia a Sarahi Leal, Auxiliar de Contenido y Educación a asistente@congresoparques.com
        </p>
      </div>

      <div class="col-md-6 col-sm-12 offset-md-1">
        <!-- formulario -->
        <form action="guardar_voluntario.php" method="POST" enctype="multipart/form-data">
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
              <div class="row mb-3">
                <div class="col-6">
                  <label for="pais"  class="form-label">País:</label>
                  <input type="text" id="pais" name="country" value="" placeholder="" required class="form-control">
                </div>
                <div class="col-6">
                  <label for="ciudad"  class="form-label">Ciudad:</label>
                  <input type="text" id="ciudad" name="city" value="" placeholder="" class="form-control">
                </div>
              </div>
        
              <div class="row mb-3">
                <div class="col">
                  <label for="empresa"  class="form-label">Escuela/Organización de procedencia:</label>
                  <input type="text" id="empresa" name="universidad" value="" class="form-control">
                </div>
              </div>
              
              <div class="row mb-3">
                <div class="col">
                  <label  class="form-label">¿Cuál es tu breve semblanza:</label>
                  <textarea name="semblanza" id="biografia" rows="2" cols="80" class="form-control" placeholder="Esta debe de ser 200 palabras máximo"></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label">¿Por qué quieres ser voluntario? :</label>
                  <textarea name="razones" id="biografia" rows="2" cols="80" class="form-control" placeholder="Esta debe de ser 200 palabras máximo"></textarea>
                </div>
              </div>

              <legend class="subtituloPMin">Horarios:</legend>
              <div class="row column">
                <p class="nota">**<em>Recuerda que solo puedes seleccionar <span> 1 opción</span></em>.</p>
              </div>
              <div class="row mb-4">
                <div class="col-sm-12">
                  <!-- <h5 for="">14 de Mayo - Mañana</h5> -->
                    <table class="horarios_voluntarios table">
                      <th class="col-2"></th>
                      <th class="col-2 text-center">Turno</th>
                      <th class="col-2 text-center">Fecha</th>
                      <th class="col-2 text-center">Inicio</th>
                      <th class="col-2 text-center">Fin</th>
                      <th class="col-2 text-center">Disponibilidad</th>
                      <?php
                      $horarios = new Voluntarios();
                      $array = $horarios->turnos('CPL2023');
                      foreach ($array as $valor) {
                      ?>
                      <tr>
                        <td>
                        <input type="radio" name="turno" value="<?php echo $valor['id_turno'] ?>" required></input>
                        </td>
                        <td class="col-2 text-center"><?php echo $valor['turno'] ?> </td>
                        <td class="col-2 text-center"><?php echo $valor['fecha'] ?> </td>
                        <td class="col-2 text-center"><?php echo $valor['hora_inicio'] ?></td>
                        <td class="col-2 text-center"><?php echo $valor['hora_fin'] ?></td>
                        <td class="col-2 text-center"><?php echo $valor['capacidad'] ?></td>
                      </tr>
                      <?php
                      }
                      ?>
                    </table>
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