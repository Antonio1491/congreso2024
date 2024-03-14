<?php include_once 'includes/templates/head.php';  ?>
<header class="header">
  <div class="container">
    <h1 class="header__titulo">Registro Cerrado<br> Póster Científico</h1>
    <img src="img/linea.png" alt="">
  </div>
</header>
<div class="container my-5">
  <div class="row">
    <div class="col-md-5 col-sm-12 bg-light p-4">
      <!-- Instrucciones -->
      <h5 class="subtitulo text-center subtituloPMin">¡Convocatoria para pósters científicos CERRADA!</h5>
      <p class="justify">Puedes enviar tu póster para que lo considere el comité de contenido completando el registro. No necesitas ser miembro ANPR para registrarte, y alentamos a todos a enviar una propuesta sobre los temas que se relacionan al Congreso. ¡Gracias!</p>
      <p>*El registro es únicamente para <strong>pósters científicos.</strong></p>
      <span class="">El Congreso Parques 2023 será del 22 al 25 de noviembre de 2023 en León, México. Este Congreso explorará los siguientes temas:</span>
      <ul class="pt-2">
        <li>Participación, Inclusión y Sociabilidad</li>
        <li>Equidad, Economía y Financiación</li>
        <li>Medio ambiente y Sostenibilidad</li>
        <li>Diseño, Infraestructura y Equipamiento.</li>
        <li>Salud y Bienestar</li>
      </ul>
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
            <div class="row mb-3">
              <div class="col-6">
                <label for="telefono"  class="form-label">Teléfono:</label>
                <input type="text" id="telefono" name="Telefono[]" value="" class="form-control" placeholder="Clave de País y Teléfono)">
              </div>
              <div class="col-6">
                <label for="telefonoAlternativo"  class="form-label">Teléfono alternativo:</label>
                <input type="text" id="telefonoAlternativo" name="TelefonoAlternativo[]" value="" class="form-control" placeholder="Teléfono Alternativo">
              </div>
            </div>
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
                <label for="biografia"  class="form-label">Semblanza profesional:</label>
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
        <fieldset>
          <legend class="subtituloPMin">Acerca del póster científico:</legend>
          <hr>
          <div class="row mb-3">
            <div class="col">
            <label for="">Nombre del proyecto:</label>
            <input type="text" name="nombre_proyecto" value="" required class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <label for="" class="form-label">Temática:</label>
              <select class="form-select" name="tema">
                <option value="1">Participación, Inclusión y Sociabilidad</option>
                <option value="2">Equidad, Economía y Financiación</option>
                <option value="3">Medio ambiente y Sostenibilidad</option>
                <option value="4">Diseño, Infraestructura y Equipamiento</option>
                <option value="5">Salud y Bienestar</option>
              </select>
            </div>
            <div class="col-6">
              <label for="" class="form-label">Categoría:</label>
              <select class="form-select" name="categoria">
                <option value="1">Estudiante</option>
                <option value="2">Joven Profesional</option>
                <option value="3">Profesional</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="" class="form-label">Documento:</label>
              <input type="file" name="documento" accept=".doc, .docx, .pdf" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="" class="form-label">Póster:</label>
              <input type="file" name="poster" accept=".doc, .docx, .pdf" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="" class="form-label">Recursos:</label>
              <textarea name="recursos" rows="3" placeholder="La sesión debe contar con objetivos de aprendizaje, claros y medibles." required class="form-control"></textarea>
            </div>
          </div>
          
        </fieldset>
        <div class="text-center">
          <input type="submit" name="" value="Registrar" class="btn btn__primary disabled">
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