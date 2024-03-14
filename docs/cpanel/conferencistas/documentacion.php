<?php session_start();

require ("../class/funciones.php");
$id_usuario = $_SESSION['id_usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documentación</title>
    <link rel="stylesheet" href="../css/foundation/foundation.min.css">
  <link rel="stylesheet"  href="../css/style.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
  </head>
  <body>
    <main>
      <div class="row collapse expanded">
        <div class="column medium-2">
          <?php include("inc/menu.php"); ?>
        </div>
        <div class="column medium-10">
                    <?php include('../admin/inc/header.php'); ?>

          <div class="documentos">
            <div class="row">
              <section class="container">
                <h5>Documents</h5>
                <p>In this section you can upload the audiovisual material that you will use in your keynote or educational session.</p>
                <p>It is necessary that you upload all the files that you will use in your presentation before SUNDAY, NOVEMBER 13TH, 2022, since your presentation will be pre-loaded on the computer of your assigned room.</p>
                  <strong>Formats and recommendations:</strong>
                  <ul>
                    <li>Only Power Point presentations (.pptx) and PDF will be accepted.</li>
                    <li>16:9 display</li>
                    <li>Recommended font size 18 or larger</li>
                    <strong>Formats and recommendations for video:</strong>
                    <li>If you will use videos in your presentation, it is necessary to attach them to this platform, these will also be preloaded on the computer of your assigned room.</li>
                      <li>Note: You can upload more than one file at a time.</li>
                      <li>IMPORTANT: If your video is on YouTube, please send the link.</li>
                  </ul>
              </section>
               <form id="form" action="altaDocumentos.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5>Register Documents</h5></legend>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-6">
                  <label for="">Document:</label>
                  <input type="file" name="archivo" value="" placeholder="Nombre" required>
                </div>
                <div class="column medium-6">
                  <label for="">Link video 1</label>
                  <input type="text" name="video1" value="" placeholder="Link Video 1">
                </div>
                <div class="column medium-6">
                  <label for="">Link video 2</label>
                  <input type="text" name="video2" value="" placeholder="Link Video 2">
                </div>
                <div class="column medium-6">
                  <label for="">Link video 2</label>
                  <input type="text" name="video3" value="" placeholder="Link Video 3">
                </div>
              
              </div>
              
             
              <div class="row align-center">
                <input type="hidden" value="<?php echo $id_usuario; ?>" name="id">
                <button type="submit" name=""  class="button">
                  <i class="fi-save"></i> Save
                </button>
              </div>
            </fieldset>
          </form>
           <div class="cajaFirmado text-center">
              <i class="fi-check"></i> <span>Documents Saved</span>
            </div>
            </div>
          </div>

              <div class="row column medium-12">
                <script type="text/javascript" src="https://form.jotform.co/jsform/90786208222861"></script>
              </div>
          </div>


          <?php

            // $comprobar_documentos = new Conferencista();
            //
            // $respuesta = $comprobar_documentos->comprobarDocumentos($id_usuario);
            //
            // if ($respuesta == true) {
            //
            //   $mensaje = "<div class='row carga-doc'><div class='column medium-12'><h4 >¡Archivos cargados!</h4></div></div>
            //               <div class='row'><img src='../img/check-documentos.png' class='check_doc'></div>";
            //
            //   echo $mensaje;
            // }
            // else {
            //
            //   echo'
            //   <section id="form-portafolio">
            //
            //     <form class="" action="cargarDocumentos.php" method="post" enctype="multipart/form-data">
            //
            //       <div class="row">
            //         <div class="column medium-4">
            //           <label for="exampleFileUpload" class="">1.- Seleccionar Presentación</label>
            //           <input type="file" name="presentacion" required>
            //         </div>
            //       </div>
            //       <div class="row">
            //         <div class="column medium-4">
            //           <label for="exampleFileUpload" >2.- Seleccionar Video</label>
            //           <input type="file" name="video" >
            //         </div>
            //
            //       </div>
            //       <div class="row">
            //         <div class="column medium-4">
            //           <label for="">Link de video: </label>
            //           <input type="text" name="link" value="">
            //         </div>
            //       </div>
            //
            //       <button type="submit" name="" value="Subir Archivos" class="button ">Cargar Archivos <i class="fi-upload"></i></button>
            //     </form>
            //   </section>';
            //
            // }

           ?>
        </div>
    </main>
    <footer>
      <?php include ("inc/footer.php"); ?>
        <?php
                $conf = new Conferencistas();
                $respuesta = $conf->validarDocumentos($_SESSION['id_usuario']);
                if ($respuesta) {
                      echo "
                            <script>
                              $('#form').hide();
                              $('.cajaFirmado').show();
                              $('.cajaFirmado span').css({
                                       'font-size' : '25px',
                                        'color' : '#32502e',
                                        'font-weight' : 'bold',


                                    });
                                     $('.cajaFirmado i').css({
                                       'font-size' : '25px',
                                        'color' : '#32502e',


                                    });
                            </script>
                      ";
                }else{
                      echo "
                            <script>
                              $('.cajaFirmado').hide();
                                    
                            </script>
                      ";
                }
              ?>
    </footer>
  </body>
</html>
