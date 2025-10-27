<?php include_once 'includes/templates/head.php';  ?>
<style>
  .ocultar{
    display: none;
  }
</style>
<header class="header">
  <div class="container">
    <h1 class="header__titulo">Registro<br>Sesiones Educativas</h1>
    <img src="img/linea.png" alt="" class="img-fluid">
  </div>
</header>
<div class="container my-5">
  <div class="row">
    <div class="col-md-5 col-sm-12 bg-light p-4" style="font-size: 0.9rem;">
      <!-- Instrucciones -->
      <h5 class="subtitulo text-center subtituloPMin">¡La convocatoria para sesiones educativas está ABIERTA!</h5>
      <p class="justify">¿Tienes una idea, proyecto o experiencia que pueda inspirar a la comunidad de parques? Este es el momento de compartirla. Te invitamos a enviar tu propuesta y ser parte del programa del <strong>Congreso Parques 2026</strong>, que se celebrará del <strong>26 de septiembre al 15 de mayo en Tijuana, Baja California, México.</strong></p>
      <p>La convocatoria está abierta a todos los interesados, <strong> no es necesario ser miembro ANPR para participar</strong>. Buscamos propuestas que aporten innovación, conocimiento y experiencias en torno a los ejes temáticos de esta edición.</p>
      <h5 class="subtitulo text-center subtituloPMin">Perfil de los Ponentes</h5>
      <ul class="pt-2">
        <li>Arquitectos, urbanistas, paisajistas y diseñadores del hábitat.</li>
        <li>Sociólogos, antropólogos, mercadólogos, economistas y administradores.</li>
        <li>Funcionarios públicos de los tres niveles de gobierno.</li>
        <li>Ambientalistas, asociaciones civiles y organizaciones sin fines de lucro.</li>
        <li>Cualquier persona con experiencia, conocimiento o proyectos que fortalezcan la gestión del espacio público.</li>
      </ul>
      <h5 class="subtitulo text-center subtituloPMin">Beneficios para ponentes</h5>
      <p>Los seleccionados recibirán una entrada de cortesía para los días del congreso, que incluye:
        <ul class="pt-2">
          <li>Diploma de participación como ponente.</li>
          <li>Acceso a todas las sesiones educativas y conferencias magistrales.</li>
          <li>Entrada a la exposición comercial.</li>
          <li>Participación en un taller vivencial o master class.</li>
          <li>Acceso a eventos sociales.</li>
        </ul>
        <i>Nota: Los gastos de inscripción a talleres adicionales, transporte, alojamiento, comidas y honorarios no están incluidos.</i>
      </p>
      <!-- <p>
          <ul>
            <li><a href="congreso_parques.php" class="" style="font-weight: bold; font-size:0.9em; color:#ff00ff;">Consultar Ejes Temáticos</a></li>
          </ul>
        </p>-->
      <strong> 
      Fechas clave de la convocatoria
    </strong>
      <ul class="pt-2">
        <li><strong>Inicio:</strong> 26 de septiembre de 2025</li>
        <li><strong>Cierre:</strong> 15 de mayo de 2026</li>
        <li><strong>Publicación:</strong> 15 de enero de 2026</li>
        <li><strong>Evaluación:</strong> 16–31 de enero de 2026</li>
        <li><strong>Resultados:</strong> 16 dePrimera semana de febrero de 2026</li>
      </ul>
      <h5 class="text-center subtituloPMin">Información a considerar:</h5>
      <ol>
        <li>Alentamos la difusión de esta convocatoria de sesiones educativas entre colegas, instituciones y organizaciones interesadas.</li>
        <li>Cada propuesta individual debe completarse en su totalidad a través del formulario de registro y enviarse antes del cierre de convocatoria (15 de enero de 2026).</li>
        <li>El Comité de Contenido del Congreso se reserva el derecho de seleccionar las ponencias finales y podrá ajustar títulos, descripciones y semblanzas de los presentadores para fines editoriales.</li>
        <li>Al enviar una propuesta, se entiende que la persona ponente se compromete a estar presente y participar de manera presencial según lo propuesto, en caso de ser aceptada. <strong> los gastos de participación (vuelos, hospedaje, transporte, alimentación, etc.) serán responsabilidad de cada ponente.</strong></li>
        <li>Los presentadores aceptados deberán registrarse al congreso y podrán acceder a una tarifa especial de presentador.</li>
        <li>ELas sesiones educativas tendrán una duración máxima de <strong>30 o 45 minutos</strong>, definida por el Comité organizador según la propuesta.</li>
        <li>Se enviará información adicional sobre la logística de la presentación y los detalles del congreso a todas las personas seleccionadas durante la primera semana de febrero de 2026.</li>
        <li>Si tu sesión es elegida, se alentará a poner a disposición los materiales de la presentación en formato digital, como parte de nuestro compromiso con un evento sostenible y para beneficio de los asistentes.
        </li>
        <li>El Comité de Contenido podrá seleccionar más de una propuesta de un mismo presentador, dependiendo de la disponibilidad de espacios.</li>
        <li>Nos reservamos el derecho de editar los documentos y materiales enviados con fines de publicación. Todo el contenido podrá ser utilizado para la promoción y el desarrollo académico del congreso.</li>
        <li>Las preguntas incluidas en el formulario sobre tipo, formato y público objetivo de la sesión buscan garantizar la diversidad de temas y estilos. Nos esforzaremos por considerar las preferencias, aunque el nivel de asistencia a cada sesión no puede garantizarse.</li>
        <li>La información enviada bajo esta convocatoria está protegida por la <strong>Política de Privacidad de la Asociación Nacional de Parques y Recreación de México</strong> y será utilizada únicamente por el Comité de Contenido del <strong>Congreso Parques 2026</strong> para la evaluación de propuestas.</li>
      </ol>
      <p>El Congreso Parques 2026 reunirá a profesionales, líderes y organizaciones de América Latina y el mundo para fortalecer la visión global sobre el futuro de los espacios públicos.
</p>
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
                <option value="11">Naturaleza y Sostenibilidad</option>
                <option value="12">Comunidad y Participación Ciudadana</option>
                <option value="13">Diseño, Operación y Gestión Eficiente</option>
                <option value="14">Tecnología e Innovación Urbana</option>
                <option value="15">Ciudad, Movilidad y Gobernanza</option>
                <option value="16">Finanzas, Patrocinios y Modelos de Ingreso</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="descripcion" class="form-label">Descripción (220 palabras máximo):</label>
              <textarea name="Descripcion" id="descripcion" rows="5" placeholder="(Esta información se utilizará con fines promocionales, por favor sea conciso y claro. )" required class="form-control"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="justificacion" class="form-label">Justificación (No hay límites de palabras):</label>
              <textarea name="Justificacion" id="justificacion" rows="5" placeholder="Justifique la importancia de su sesión educativa propuesta, identificando cómo su proyecto/iniciativa/investigación da solución a un problema relacionado con el espacio público y cómo se relaciona con las cinco temáticas del congreso." required class="form-control"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="Objetivos" class="form-label">Objetivos:</label>
              <textarea name="Objetivos" id="objetivos" rows="5" placeholder="La sesión debe contar con al menos 3 objetivos de aprendizaje, claros y medibles." required class="form-control"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="recursos" class="form-label">Fortalece tu propuesta:</label>
              <textarea name="Recursos" id="recursos" rows="5" placeholder="En esta sección puedes agregar varios recursos para apoyar tu propuesta. (Videos, investigaciones, artículos, noticias o cualquier otro recurso que apoye la evaluación de tu propuesta)." required class="form-control"></textarea>
            </div>
          </div>
        </fieldset>
        <div class="text-center">
        <input type="hidden" name="evento" value="3">
          <input type="submit" name="" value="Registrar" class="btn btn__primary">
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