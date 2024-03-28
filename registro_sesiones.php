<?php include_once 'includes/templates/head.php';  ?>
<style>
  .ocultar{
    display: none;
  }
</style>
<header class="header">
  <div class="container">
    <h1 class="header__titulo">Registro<br>Sesiones Educativas</h1>
    <img src="img/linea.png" alt="">
  </div>
</header>
<div class="container my-5">
  <div class="row">
    <div class="col-md-5 col-sm-12 bg-light p-4">
      <!-- Instrucciones -->
      <h5 class="subtitulo text-center subtituloPMin">¡La convocatoria para sesiones educativas está ABIERTA!</h5>
      <p class="justify">Puedes enviar tu propuesta para que lo considere el comité de contenido completando el registro. No necesitas ser miembro ANPR para registrarte, y alentamos a todos a enviar una propuesta sobre los temas que se relacionan al Congreso. ¡Gracias!</p>
      <p>*El registro es únicamente para Sesiones Educativas.</p>
      <span class="">El Congreso Parques 2024 será del 23 al 25 de Octubre de 2024 en Mérida, México. Este Congreso explorará los siguientes temas:</span>
      <ul class="pt-2">
        <li>Medio Ambiente y Sustentabilidad</li>
        <li>Salud y Bienestar</li>
        <li>Eventos, Recreación y Participación Ciudadana</li>
        <li>Diseño, Infraestructura y Equipamiento.</li>
        <li>Innovación y Tecnología</li>
        <li>Ciudad y Movilidad</li>
      </ul>
      <p>
      Los líderes de parques no están solos, y el Congreso Parques 2024 reunirá a profesionales de todo el mundo y América Latina para desarrollar una nueva visión para el futuro.
      </p>
      <ol>
        <li>Alentamos la distribución de esta convocatoria de sesiones educativas.</li>
        <li>Para cada propuesta individual, el formulario de registro debe completarse en su totalidad y enviarse.</li>
        <li>El Comité de Contenido del Congreso se reserva el derecho de hacer selecciones de presentaciones finales y editar descripciones y biografías de los presentadores.</li>
        <li>Al enviar una propuesta, se entiende que usted se compromete a estar presente y participar según lo propuesto si es aceptado. Este congreso será presencial.</li>
        <li>Los presentadores aceptados deberán registrarse y podrán acceder al descuento de presentador.</li>
        <li>Es importante considerar que los tiempos máximos de sesiones educativas son de 30 y 45 minutos. El tiempo será asignado por el comité organizador, dependiendo de la propuesta.</li>
        <li>Se enviará información adicional sobre la logística de la presentación y los detalles del congreso a todos los solicitantes seleccionados.</li>
        <li>Si se elige su sesión, alentamos que haga que los materiales de su presentación estén disponibles en formato electrónico en el sitio web después de la conferencia. Esto nos permite proporcionar a los delegados los materiales de presentación, al mismo tiempo que contribuye a nuestro objetivo de ser un "evento verde".
        </li>
        <li>El Comité de Contenido podrá elegir más de una propuesta de un solo presentador. Esto se decidirá caso por caso dada la cantidad de oportunidades disponibles para hablar.</li>
        <li>Nos reservamos el derecho de editar los documentos enviados con fines de publicación. Todo el contenido será objeto de uso en el desarrollo del congreso.</li>
        <li>El propósito de las preguntas de selección de tipo, tamaño, formato y audiencia de la sesión es para garantizar una diversidad de temas y estilos de sesión. Nos esforzaremos por adaptarnos a sus preferencias de estilo y tamaño de la audiencia. Sin embargo, debido al formato de este congreso, no se puede garantizar el nivel de asistencia a ninguna sesión.</li>
        <li>La información enviada bajo esta convocatoria de presentaciones está protegida por la Política de privacidad de la Asociación Nacional de Parques y Recreación de México. La información recopilada será utilizada por el Comité de Contenido del Congreso 2024 para determinar las propuestas seleccionadas.</li>
      </ol>
    </div>

    <div class="col-md-6 col-sm-12 offset-md-1">
      <!-- formulario -->
      <form action="guardar_sesion.php" method="POST" enctype="multipart/form-data">
        <fieldset>
          <legend class="subtituloPMin">Sobre la persona responsable de la propuesta:</legend>
          <hr>
          <section class="datosUsuario">
            <div class="row mb-3">
              <div class="col-12">
                <label for="Nombre" class="form-label">Nombres:</label>
                <input type="text" id="Nombre" name="Nombre[]" value="" class="form-control" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label for="apellidoPaterno" class="form-label">Apellido Paterno:</label>
                <input type="text" id="apellidoPaterno" name="ApellidoPaterno[]" value="" class="form-control" required>
              </div>
              <div class="col-6">
                <label for="apellidoMaterno" class="form-label">Apellido Materno:</label>
                <input type="text" id="apellidoMaterno" name="ApellidoMaterno[]" value="" class="form-control" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label for="email" class="form-label">E-mail:</label>
                <input type="text" id="email" name="Email[]" value="" class="form-control" required placeholder="">
              </div>
              <div class="col-6">
                <label for="emailAlternativo" class="form-label">E-mail alternativo:</label>
                <input type="text" id="emailAlternativo" name="EmailAlternativo[]" value="" class="form-control" placeholder="">
              </div>
            </div>
            <!-- <div class="row mb-3">
              <div class="col-6">
                <label for="telefono"  class="form-label">Teléfono:</label>
                <input type="text" id="telefono" name="Telefono[]" value="" class="form-control" placeholder="Clave de País y Teléfono)">
              </div> -->
              <!-- <div class="col-6">
                <label for="telefonoAlternativo"  class="form-label">Teléfono alternativo:</label>
                <input type="text" id="telefonoAlternativo" name="TelefonoAlternativo[]" value="" class="form-control" placeholder="Teléfono Alternativo">
              </div>
            </div> -->
            <div class="row mb-3">
              <div class="col">
                <label for="empresa"  class="form-label">Empresa:</label>
                <input type="text" id="empresa" name="Empresa[]" value="" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label for="cargo"  class="form-label">Cargo:</label>
                <input type="text" id="cargo" name="Cargo[]" value="" class="form-control">
              </div>
              <div class="col-6">
                <label for="pais"  class="form-label">País:</label>
                <input type="text" id="pais" name="Pais[]" value="" placeholder="" required class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label for="estado"  class="form-label">Estado:</label>
                <input type="text" id="estado" name="Estado[]" value="" placeholder="" required class="form-control">
              </div>
              <div class="col-6">
                <label for="ciudad"  class="form-label">Ciudad:</label>
                <input type="text" id="ciudad" name="Ciudad[]" value="" placeholder="" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label for="biografia"  class="form-label">Breve semblanza:</label>
                <textarea name="Biografia[]" id="biografia" rows="4" cols="80" class="form-control" placeholder="Incluya experiencia de trabajo, investigaciones, colaboraciones o información de relevancia. Esta descripción deberá ser una breve biografía."></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <img src="img/icono_perfil.png" alt="" class="perfil">
                <label for="fotografia"  class="form-label">Fotografía: (Perfil del ponente, medidas recomendadas 800px por 800px) </label>
                <input type="file" id="fotografia" name="Fotografia[]" value="" class="form-control" required accept="image/png, image/jpeg">
              </div>
            </div>
          </section>
          <div class="row mb-3">
            <div class="col">
              <label for=""  class="form-label">Modalidad:</label><br>
              <input type="radio" name="Modalidad" value="1"  id="individual" required checked> Individual</input>
              <input type="radio" name="Modalidad" value="2" id="mesaPanel" required > Mesa Panel (2 participantes máximo)</input>
            </div>
          </div>
          <div class="row mb-3">
            <p class="fst-italic">La semblanza profesional y foto enviada en este apartado se utilizará para fines promocionales del congreso y la sesión, en caso de ser seleccionada esta propuesta. 
            La foto debe ser de cara y hombros a color y en alta calidad.</p>
          </div>
          <div class="ocultar" id="contenedorBtn">
            <div class="row text-center" id="">
              <div class="col">
                <button type="button" name="Autor" class="btn btn__primary" id="btnAgregar">
                  <i class="fi-plus"></i> Añadir Ponente</button>
              </div>
            </div>
          </div>
          <div class="nuevo">
          </div>
        </fieldset>
        <fieldset>
          <legend class="subtituloPMin">Sobre la propuesta:</legend>
          <hr>
          <div class="row mb-3">
            <div class="col">
              <label for="titulo" class="form-label">Nombre de la Sesión (12 palabras máximo):</label>
              <input type="text" id="titulo" name="Titulo" value="" required class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="titulo" class="form-label">Subtítulo de la Sesión:</label>
              <input type="text" id="titulo" name="Subtitulo" value="" required class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="tematica class="form-label">Eje Temático:</label>
              <select class="form-select" name="Tema">
                <option value="1">Medio Ambiente y Sustentabilidad</option>
                <option value="5">Salud y Bienestar</option>
                <option value="2">Eventos, Recreación y Participación Ciudadana</option>
                <option value="3">Diseño, Mantenimiento y Equipamiento</option>
                <option value="4">Innovación y Tecnología</option>
                <option value="6">Ciudad y Movilidad</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="descripcion" class="form-label">Descripción (220 palabras máximo):</label>
              <textarea name="Descripcion" id="descripcion" rows="3" placeholder="(Esta información se utilizará con fines promocionales, por favor sea conciso y claro. )" required class="form-control"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="justificacion" class="form-label">Justificación (No hay límites de palabras):</label>
              <textarea name="Justificacion" id="justificacion" rows="4" placeholder="Justifique la importancia de su sesión educativa propuesta, identificando cómo su proyecto/iniciativa/investigación da solución a un problema relacionado con el espacio público y cómo se relaciona con las cinco temáticas del congreso." required class="form-control"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="Objetivos" class="form-label">Objetivos:</label>
              <textarea name="Objetivos" id="objetivos" rows="3" placeholder="La sesión debe contar con al menos 3 objetivos de aprendizaje, claros y medibles." required class="form-control"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="recursos" class="form-label">Fortalece tu propuesta:</label>
              <textarea name="Recursos" id="recursos" rows="4" placeholder="En esta sección puedes agregar varios recursos para apoyar tu propuesta. (Videos, investigaciones, artículos, noticias o cualquier otro recurso que apoye la evaluación de tu propuesta)." required class="form-control"></textarea>
            </div>
          </div>
        </fieldset>
        <div class="text-center">
        <input type="hidden" name="evento" value="2">
          <input type="submit" name="" value="Registrar" class="btn btn__primary ">
        </div>
        <div>
      
</div>
      </form>
      <!-- Fin de formulario -->
    </div>
  </div>
</div>
<?php include_once 'includes/templates/footer.php'; ?>
<script type="text/javascript">
  let maxNumUsuarios = 2;
  let btnAgregar = document.querySelector('#btnAgregar');
  let nuevoUsuario = document.querySelector('.nuevo');
  let datosUsuario = document.querySelector('.datosUsuario').cloneNode(true);
  let usuario = 1;
  let mesaPanel = document.querySelector('#mesaPanel');
  let individual = document.querySelector('#individual');

  //mostrar botón de gregar usuario extra
  mesaPanel.onclick = mostrarBtn;
  individual.onclick = ocultarBtn;
  function mostrarBtn()
  {
    document.querySelector('.ocultar').style.display = 'block';
  }

  function ocultarBtn()
  {
    document.querySelector('.ocultar').style.display = 'none';
    console.log("click en individual");
  }

  btnAgregar.onclick = nuevoFormulario;

  function nuevoFormulario()
  {
    if(usuario < maxNumUsuarios){
      usuario++;
      //insertar formulario
      console.log('Click en el botón');
      nuevoUsuario.append(datosUsuario);
    }

  }

</script>