<?php session_start();
include('../class/funciones.php');
$propuestas = new Propuesta();
// var_dump($_SESSION["usuario"]);

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Administrador</title>
    <?php require ("inc/head.php") ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
  </head>
  <body>
    <main class="row expanded">
    <div class=" medium-2">
      <?php include("inc/menuEvento.php") ?>
    </div>
    <section class="column medium-10">
      <?php include('inc/header.php'); ?>
      <h1 class="tituloSeccion">Propuestas</h1>
      <section class="column medium-12">
        <?php
        
          $formateo = '%A %d %B %Y ';
          setlocale(LC_ALL, "es_ES");
          // $mex = strftime($formateo);
          $total_propuestas = $propuestas->totalPropuestas($_SESSION["evento"]); 
          "<p>Propuestas Registradas: ". $total_propuestas. " </p>";

          $array_propuestas = $propuestas->listaPropuestas($_SESSION["evento"]);

          echo "<table class='tablaResultados' id='tablaPropuestas'>
                <thead>
                  <tr>
                    <th>#</th>
                    <!--<th>Folio</th>-->
                    <th>Título</th>
                    <th>Subtítulo</th>
                    <th>Registro</th>
                    <th>Tema</th>
                    <th>Evaluación</th>
                    <th>Acciones</th>
                    
                  </tr>
                </thead>";
                    $i=0;
                    foreach ($array_propuestas as $valor) {
                      $i += 1;

                  echo"<tr id='".$valor['id_ponencia']."'>
                        <td>".$i ."</td>
                        <td><a href='descripcionPropuesta.php?id=".$valor['id_ponencia']."'>".$valor['titulo']."<a></td>
                        <td>".$valor['subtitulo']."</td>
                        <td>".$valor['registro']."</td>
                        <td>".$valor['tema']."</td>
                        <!--<td></td>-->";
                        
                        
                        if( $valor['estatus'] == 0){
                            echo "<td class='text-center'><a class='noAceptada button tiny' href='aceptarPropuesta.php?id=".$valor['id_ponencia']."'>Aceptar</a></td>";
                        }
                        else{
                          echo "<td class='aceptada'>Aprobada</a></td>";
                        }
                  
                  echo "<td class='acciones text-center'>
                        <!--<a href='' target='_blank' class='link_encuesta'><i class='fi-check'></i> Calificar </a>-->
                        <a href='eliminarPropuesta.php?id=".$valor['id_ponencia']."' title='Eliminar' class='eliminar'><i class='fi-x'></i></a> 
                        <!--<a href='editarEnlace.php?id=".$valor['id_ponencia']."' title='Editar Enlace' class='editarEnlace'><i class='fi-link'></i> </a></td>-->
                        </tr>"
                        ;

        }

        echo"</table>";


         ?>
      </section>
    </main>
    <footer></footer>

    <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="../js/vendor/what-input.js" type="text/javascript"></script>
    <script src="../js/vendor/foundation.min.js" type="text/javascript"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

    <script charset="utf8" src="https://cdnjs.cl   oudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script src="../js/vendor/foundation.min.js" type="text/javascript"></script>
      <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="../js/vendor/foundation.min.js" type="text/javascript"></script>

  <script>
    $(document).foundation();
    </script> 
  <script>
    $(document).ready(function() {
      $('#tablaPropuestas').DataTable( {
    processing: true,
    order: [[ 0, "asc" ]],
    pageLength : 20,
    lengthMenu : [15, 20, 50, 100, 200, 500],
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'excel',
            title: 'Datos Propuestas',
            text: 'Exportar a Excel',
            exportOptions: {
              columns: [ 0,1,2,3,4,5,6]
            }
        }
      
    ],
    language: {
              url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
              }

} );
} );
  </script>
<?php require('inc/footer.php') ?>

  </body>
</html>
