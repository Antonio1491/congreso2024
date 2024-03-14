<?php session_start();
include('../class/funciones.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta de Conferencias</title>
    <?php require ("inc/head.php") ?>
    
  </head>
  <body>
    <main class="row expanded">
    <div class=" medium-2">
      <?php include("inc/menuEvento.php") ?>
    </div>
    <section class="column medium-10">
      <?php include('inc/header.php'); ?>
      <div class="row ">
        <h1 class="tituloSeccion align-center">Conferencias</h1>
      </div>
      <div class="column medium-12">
        <div class="row">
          <div class="column medium-12">
            <button type="button" name="button" id="agregar" class="button">
              <i class="fi-plus"></i> Agregar Conferencia
            </button>
          </div>
        </div>
        <div class="registro">
          <form class="" action="altaConferencias.php" method="post">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5>Registro Conferencias</h5></legend>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Título:</label>
                  <input type="text" name="conferencia" value="" placeholder="Nombre de la Conferencia" required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Subtítulo:</label>
                  <input type="text" name="subtitulo" value="" placeholder="Nombre de la Conferencia" required>
                </div>
              </div>
        
              <div class="row">
                <div class="column medium-2">
                  <label for="">Fecha (00/00/0000):</label>
                  <input type="date" name="fecha" value="" placeholder="Día/Mes/Año">
                </div>
                <div class="column medium-2">
                  <label for="">Hora Inicio:</label>
                  <input type="time" name="inicio" value="" placeholder="00:00:00">
                </div>
                <div class="column medium-2">
                  <label for="">Hora Fin:</label>
                  <input type="time" name="fin" value="" placeholder="00:00:00">
                </div>
                <div class="column medium-2">
                  <label for="">Lugar:</label>
                  <input type="text" name="lugar" value="">
                </div>
              </div>
              <div class="row ">
                <div class="column medium-4">
                  <label>Tema:
                    <select name="tema">
                      <?php
                          $lista_de_temas = new Conferencia();
                          $lista = $lista_de_temas->temas();
                          foreach ($lista as $valor) {
                            echo "<option value='".$valor['id']."'>".$valor['tema']."</option>";

                          }
                      ?>
                    </select>
                  </label>
                </div>
                <div class="column medium-2">
                  <label>Categoría:
                    <select name="categoria">
                      <?php
                          $lista_tipo = new Conferencia();
                          $lista = $lista_de_temas->conferenciaTipo();
                          foreach ($lista as $valor) {
                            echo "<option value='".$valor['id']."'>".$valor['categoria']."</option>";
                          }
                      ?>
                    </select>
                  </label>
                </div>
                <div class="column medium-2">
                  <label>Modalidad:
                    <select name="modalidad">
                      <?php
                          $lista_tipo = new Conferencia();
                          $lista = $lista_de_temas->conferenciaModalidad();
                          foreach ($lista as $valor) {
                            echo "<option value='".$valor['id']."'>".$valor['modalidad']."</option>";
                          }
                      ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Descripción:</label>
                  <textarea name="descripcion" rows="10" cols="80"></textarea>
                </div>
              </div>
             
              <div class="row">
                <div class="column medium-8">
                  <label for="">Objetivos:</label>
                  <textarea name="objetivos" rows="10" cols="80" placeholder="" required></textarea>
                </div>
              </div>
              
              <div class="row ">
              <input type="hidden" name="estatus" value="1">
              <input type="hidden" name="evento" value="<?php echo $_SESSION["evento"]; ?>">
                <input type="submit" name="" value="Registrar" class="button">
              </div>
            </fieldset>
          </form>
        </div>

      <div class="" id="listaConferencias">
          <?php
              $lista_conferencias = new Conferencia();
              $respuesta = $lista_conferencias->listaConferencias($_SESSION["evento"]);
            echo "<table class='tablaResultados' id='tablaConferencias'>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Subtítulo</th>
                        <th>Fecha</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Lugar</th>
                        <th>calendar</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $num = 0;
                    foreach ($respuesta as $valor) {
                        $num++;
                        echo "<tr>
                        <td>".$num ."</td>
                        <td>" .$valor['titulo']. "</td>
                        <td>" .$valor['subtitulo']. "</td>
                        <td>" .$valor['fecha']. "</td>
                        <td>" .$valor['hora_inicio']. "</td>
                        <td>" .$valor['hora_fin']. "</td>
                        <td>" .$valor['ubicacion']. "</td>
                        <td>
                        <a href='" .$lista_conferencias->linkGoogleCalendar($valor['id_ponencia'])."' target='_blank'>
                        <img src='https://lh3.ggpht.com/oGR9I1X9No3SfFEXrq655tETtVVzI3jIphhmEVPGPEVuM5gfwh8lOGWHQFf6gjSTvw=s180' border='0'></a>
                         </td>
                        <td class='acciones'><a href='editarConferencia.php?id=".$valor['id_ponencia']."' title='Editar'><i class='fi-pencil'></i></a> |
                        <a href='eliminarConferencia.php?id=".$valor['id_ponencia']."' title='Eliminar' class='eliminar'><i class='fi-x'></i> </a></td>
                        </tr>";
                      }
                    echo "
                    </tbody>
                  </table>";
           ?>

      </div>
    </div>

    </main>
    <footer></footer>
    <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="../js/vendor/what-input.js" type="text/javascript"></script>
    <script src="../js/vendor/foundation.min.js" type="text/javascript"></script>

    <script charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script charset="utf8" src="https://cdn.datatables.net/1.11.3/js/dataTables.foundation.min.js"></script>

    <script charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script>
    $(document).foundation();

    $(document).ready(function(){
    $("#agregar").click(function(){
      $(".registro").fadeToggle();
    });
    });
    </script>
  <script>
    $(document).ready(function() {
    $('#tablaConferencias').DataTable(
      {
        "processing": true,
          "order": [[ 0, "asc" ]],
          "pageLength" : 15,
          "lengthMenu" : [15, 20, 50, 100, 200, 500],
          "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
          },
          
      }
    );
} );
  </script>
   <?php require('inc/footer.php') ?>

  </body>
</html>
