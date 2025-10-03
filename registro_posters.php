<?php include_once 'includes/templates/head.php';  ?>
<header class="header">
  <div class="container">
    <h1 class="header__titulo">Registro<br> Póster Científico</h1>
    <img src="img/linea.png" alt="" class="img-fluid">
  </div>
</header>
<div class="container my-5">
  <div class="row">
    <div class="col-md-5 col-sm-12 bg-light p-4">
      <!-- Instrucciones -->
      <h5 class="subtitulo text-center subtituloPMin mb-4">¡Convocatoria para Pósters Científicos!</h5>
      <p class="justify">El <strong>Congreso Parques 2026</strong> abre sus puertas a la investigación. Si cuentas con un proyecto académico, estudio técnico o investigación aplicada que aporte al desarrollo de parques y espacios públicos, te invitamos a participar en la <strong>exposición de pósters científicos.</strong></p>
      <p>La convocatoria está abierta a todos los interesados; no es necesario ser miembro ANPR para enviar tu propuesta. Queremos visibilizar y difundir investigaciones que se relacionen con los ejes temáticos del congreso:</p>
      <ol>
        <li>Naturaleza y Sostenibilidad</li>
        <li>Comunidad y Participación Ciudadana</li>
        <li>Diseño, Operación y Gestión Eficiente</li>
        <li>Tecnología e Innovación Urbana</li>
        <li>Ciudad, Movilidad y Gobernanza</li>
        <li>Finanzas, Patrocinios y Modelos de Ingreso</li>
      </ol>
        <p> 
      Fechas clave de la convocatoria
      </p>
      <ul class="pt-2">
        <li><strong>Inicio:</strong> 26 de septiembre de 2025</li>
        <li><strong>Cierre:</strong> 15 de mayo de 2026</li>
        <li><strong>Publicación:</strong> 15 de enero de 2026</li>
        <li><strong>Evaluación:</strong> 16–31 de enero de 2026</li>
        <li><strong>Resultados:</strong> Primera semana de febrero de 2026</li>
      </ul>
      <p><strong>El Congreso se llevará a cabo del 13 al 15 de mayo de 2026 en Tijuana, Baja California, México.</strong></p>
      <h5 class="subtitulo subtituloPMin text-center">Requisitos para envío</h5>
      <ul>
        <li>El registro es exclusivamente para pósters científicos.</li>
        <li>Los trabajos deben enviarse en formato PDF, con un tamaño máximo de 10 MB y resolución de 72 ppp.</li>
        <li>Cada propuesta debe completarse en el formulario de registro correspondiente.</li>
        <li>Los pósters seleccionados se exhibirán durante el congreso y formarán parte de la memoria académica del evento.</li>
      </ul>
      <p>El Congreso Parques es el punto de encuentro más importante de Latinoamérica para profesionales, investigadores y líderes del sector. ¡Comparte tu conocimiento y sé parte de esta edición en Tijuana!
      </p>
    </div>

    <div class="col-md-6 col-sm-12 offset-md-1">
      <!-- formulario -->
      <form action="guardar_poster.php" method="POST" enctype="multipart/form-data">
      <fieldset>
          <legend class="subtitulo subtituloPMin">Sobre la persona responsable de la propuesta:</legend>
          <hr>
          <section class="datosUsuario">
            <div class="row mb-3">
              <div class="col-12">
                <label for="Nombre" class="form-label">Nombres:</label>
                <input type="text" id="Nombre" name="Nombre[]" value="" class="form-control" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6 col-sm-12">
                <label for="apellidoPaterno" class="form-label">Apellido Paterno:</label>
                <input type="text" id="apellidoPaterno" name="ApellidoPaterno[]" value="" class="form-control" required>
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="apellidoMaterno" class="form-label">Apellido Materno:</label>
                <input type="text" id="apellidoMaterno" name="ApellidoMaterno[]" value="" class="form-control" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6 col-sm-12">
                <label for="email" class="form-label">E-mail:</label>
                <input type="text" id="email" name="Email[]" value="" class="form-control" required placeholder="">
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="emailAlternativo" class="form-label">E-mail alternativo:</label>
                <input type="text" id="emailAlternativo" name="EmailAlternativo[]" value="" class="form-control" placeholder="">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6 col-sm-12">
                <label for="telefono"  class="form-label">Teléfono:</label>
                <input type="text" id="telefono" name="Telefono[]" value="" class="form-control" placeholder="Código de País y Teléfono">
              </div>
              <!-- <div class="col-6">
                <label for="telefonoAlternativo"  class="form-label">Teléfono alternativo:</label>
                <input type="text" id="telefonoAlternativo" name="TelefonoAlternativo[]" value="" class="form-control" placeholder="Teléfono Alternativo">
              </div> -->
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label for="empresa"  class="form-label">Empresa/Institución:</label>
                <input type="text" id="empresa" name="Empresa[]" value="" class="form-control">
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="cargo"  class="form-label">Puesto de Trabajo:</label>
                <input type="text" id="cargo" name="Cargo[]" value="" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6 col-sm-12">
                <label for="pais"  class="form-label">País:</label>
                <input type="text" id="pais" name="Pais[]" value="" placeholder="" required class="form-control">
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="ciudad"  class="form-label">Ciudad:</label>
                <input type="text" id="ciudad" name="Ciudad[]" value="" placeholder="" class="form-control">
              </div>
            </div>
            <!-- <div class="row mb-3">
              <div class="col-6">
                <label for="estado"  class="form-label">Estado:</label>
                <input type="text" id="estado" name="Estado[]" value="" placeholder="" required class="form-control">
              </div>
            </div> -->
            <!-- <div class="row mb-3">
              <div class="col">
                <label for="biografia"  class="form-label">Semblanza profesional:</label>
                <textarea name="Biografia[]" id="biografia" rows="4" cols="80" class="form-control" placeholder="Incluya experiencia de trabajo, investigaciones, colaboraciones o información de relevancia. Esta descripción deberá ser una breve biografía."></textarea>
              </div>
            </div> -->
            <!-- <div class="row mb-3">
              <div class="col">
                <img src="img/icono_perfil.png" alt="" class="perfil">
                <label for="fotografia"  class="form-label">Fotografía: (Perfil del ponente, medidas recomendadas 800px por 800px) </label>
                <input type="file" id="fotografia" name="Fotografia[]" value="" class="form-control" required accept="image/png, image/jpeg">
              </div>
            </div> -->
          </section>
          <div class="row mb-3">
            <div class="col">
              <label for=""  class="form-label">¿Hay más de un participante?:</label><br>
              <input type="radio" name="Modalidad" value="1"  id="individual" required checked> No</input>
              <input type="radio" name="Modalidad" value="2" id="mesaPanel" required > Sí (2 participantes máximo)</input>
            </div>
          </div>
          <div class="ocultar" id="contenedorBtn">
            <div class="row text-center" id="">
              <div class="col">
                <button type="button" name="Autor" class="btn btn__primary disabled" id="btnAgregar">
                  <i class="fi-plus"></i> Añadir Participante</button>
              </div>
            </div>
          </div>
          <div class="nuevo">
          </div>
        </fieldset>
        <fieldset class="mt-5">
          <legend class="subtituloPMin">Acerca del póster científico:</legend>
          <hr>
          <div class="row mb-3">
            <div class="col">
            <label for="">Nombre del proyecto:</label>
            <input type="text" name="nombre_proyecto" value="" required class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6 col-sm-12">
              <label for="" class="form-label">Eje temático al que se apega:</label>
              <select class="form-select" name="tema">
                <option value="11">Naturaleza y Sostenibilidad</option>
                <option value="12">Comunidad y Participación Ciudadana</option>
                <option value="13">Diseño, Operación y Gestión Eficiente</option>
                <option value="14">Tecnología e Innovación Urbana</option>
                <option value="15">Ciudad, Movilidad y Gobernanza</option>
                <option value="16">Finanzas, Patrocinios y Modelos de Ingreso</option>
              </select>
            </div>
            <div class="col-md-6 col-sm-12">
              <label for="" class="form-label">Categoría:</label>
              <select class="form-select" name="categoria">
                <option value="1">Alumno</option>
                <option value="2">Joven Profesional</option>
                <option value="3">Profesional</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <h5 class="subtitulo subtituloPMin">Acerca del póster científico:</h5>
              <p>En esta sección puedes agregar varios recursos para apoyar tu proyecto. (Videos, investigaciones, artículos, noticias o cualquier otro recurso que apoye la evaluación de tu póster científico).</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="" class="form-label">Recursos:</label>
              <textarea name="recursos" rows="3" required class="form-control"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="" class="form-label">Documento:</label>
              <input type="file" name="documento" accept=".doc, .docx, .pdf" class="form-control">
            </div>
          </div><br>
          <div class="row">
            <div class="col">
              <label for="" class="form-label">Póster:</label>
              <input type="file" name="poster" accept=".doc, .docx, .pdf" class="form-control">
            </div>
          </div>
        </fieldset>
        <div class="text-center mt-4">
          <input type="hidden" name="evento" value="3">
          <input type="submit" name="" value="Registrar" class="btn btn__primary">
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