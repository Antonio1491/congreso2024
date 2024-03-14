<?php session_start();
include('../class/funciones.php');

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hoteles</title>
    <?php require ("inc/head.php") ;
    ?>

  </head>
  <body>
    <main class="row expanded">
    <div class=" medium-2">
      <?php include("inc/menuEvento.php") ?>
    </div>
    <section class="column medium-10">
    <?php include('inc/header.php'); 
    ?>
      <h1 class="tituloSeccion">Hoteles</h1>
      <div class="column medium-12">
        <div class="row">
          <div class="column medium-12"> 
          <button type="button" name="button" id="agregar" class="button">
              <i class="fi-plus"></i> Agregar Hotel
            </button>
            <button type="button" name="button" id="agregarH" class="button">
              <i class="fi-plus"></i> Agregar Habitacion
            </button>
            <div class="registro" id="registro">
          <form id="form" action="altaHotel.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5>Registro de hoteles</h5></legend>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-6">
                  <label for="">Nombre del hotel:</label>
                  <input type="text" name="nombre" value="" required>
                </div>
                <div class="column medium-6">
                  <label for="">Logo:</label>
                  <input type="file" name="logo_empresa" value=""  required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-6">
                  <label for="">Ubicación:</label>
                  <input type="text" name="ubicacion" value="" placeholder="Dirección" required>
                </div>
                <div class="column medium-6">
                  <label for="">Clave de resevación:</label>
                  <input type="text" name="clave_reserv" value="" placeholder="Clave" required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-6">
                  <label for="">Teléfono:</label>
                  <input type="number" name="numero" value="" placeholder="Teléfono" required >
                </div>
                <div class="column medium-6">
                  <label for="">Correo:</label>
                  <input type="email" name="email" value="" placeholder="Correo" required>
                </div>
              </div> 
              <div class="row ">
                <div class="column medium-12">
                  <label for="">Congreso:</label>
                  <select name="congreso" >
                  <?php
                    // $boletos = new Boletos();
                    // $respuesta = $boletos->getCongreso();
                    // if ($respuesta == false){
                    //   echo "<option value='0'>No hay congresos proximos</option>";

                    // }else{
                    // foreach ($respuesta as $valor) {
                    //   echo "<option value=".$valor['id_congreso'].">".$valor['lugar']."</option>";
                    // }
                    // }
                    ?>
                </select>                
               </div>
              </div>
              
              <div class="row ">
              <input type="hidden" name="id" value=" <?php echo $id ?>" class="button success">
              <div class="column medium-12">

                <input type="submit" name="" value="Registrar" class="hollow button success">
              </div>
              </div>

            </fieldset>
          </div>
         
          <div class="registro2">
          </form>   
          <?php
                    $boletos = new Hoteles();
                    $respuesta = $boletos->getHoteles($_SESSION["evento"]);
                    if ($respuesta == false){
                      echo "<h3>No hay hoteles disponibles</h3>";

                    }else{
                      echo '
                      <form id="form2"  action="altaHabitacion.php" method="post" enctype="multipart/form-data">
                      <fieldset>
                      <label for="exampleInputEmail1" class="form-label mt-4">Habitaciones</label>
                      <div class="row ">
                      <div class="column medium-12">
                      <label for="">Hotel:</label>
                      <select name="id" >';
                        foreach ($respuesta as $valor) {
                          echo '<option value='.$valor['id_hotel'].">".$valor['nombre_hotel'].'</option>';
                        }
                     echo'   
                    </select>  
                    </div>
                    </div>
              <div class="row ">
              <div class="column medium-12">
                <label for="">Tipo de habitación</label>
                <input type="text" name="tipoH[]" value="" placeholder="Tipo" required >
              </div>
              <div class="column medium-6">
                <label for="">Precio Individual</label>
                <input type="number" name="precio_ind[]" value="" placeholder="Precio individual" required >
              </div>
              <div class="column medium-6">
                <label for="">Precio Doble</label>
                <input type="number" name="precio_doble[]" value="" placeholder="Precio Doble" required >
              </div>
            </div>
            <div id="listas1">

              </div>
            <div class="col-12 mt-2">
            <input type="button" id="add_field" value="Agregar Habitación" class="hollow button ">
            </div>
            <div class="row">
            <input type="submit" name="" value="Registrar" class="hollow button success">
          </div>
            </fieldset>
          </form>
            ';      
                    }
                    ?>
          </div>
          </div class="margin-bottom-1">
          <div class="row" id="listaConferencias">
          <?php
              $hotel = new Hoteles();
              $respuesta = $hotel->getHoteles($_SESSION["evento"]);
            echo "<table class='tablaResultados'>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>logo</th>
                        <th>nombre</th>
                        <th>ubicacion</th>
                        <th>Clave de reservacion</th>
                        <th>Numero de contacto</th>
                        <th>Correo Contacto</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $num = 0;
                    foreach ($respuesta as $valor) {

                        $num++;
                        echo "<tr>
                        <td>".$num ."</td>
                       <td><a href='editarImgHotel.php?id=".$valor['id_hotel']."'><img src='../img_hotel/".$valor['url_img']."'></a></td>
                        <td>" .$valor['nombre_hotel']. "</td>
                        
                        <td>" .substr($valor["ubicacion"], 0, 40)."...". "</td>
                        <td>" .$valor['clave_reservacion']. "</td>
                        <td>" .$valor['numero_contacto']. "</td>
                        <td>" .$valor['correo_contacto']. "</td>
                      
                        <td class='acciones'><a href='editarHotel.php?id=".$valor['id_hotel']."' title='Editar'><i class='fi-pencil'></i></a> |
                        <a class='eliminar' href='eliminarHotel.php?id=".$valor['id_hotel']."' title='Eliminar' class='eliminar'><i class='fi-x'></i> </a></td>
                        </tr>";
                      }
                    echo "
                    </tbody>
                  </table>";
           ?>

      </div>
     </div>
     </div>
     </div>
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/vendor/what-input.js" type="text/javascript"></script>
    <script src="../js/vendor/foundation.min.js" type="text/javascript"></script>

    <script>
        var x = 0;
  $('#add_field').click (function(e) {
    e.preventDefault();     //prevenir novos clicks
    
            $('#listas1').append(`
            <div class="algo">
               <div class="row ">
              <div class="column medium-6">
                <label for="">Tipo de habitacion</label>
                <input type="text" name="tipoH[]" value="" placeholder="Precio usd" required >
              </div>
              <div class="column medium-6">
                <label for="">Modalidad</label>
                <input type="text" name="modalidad[]" value="" placeholder="Precio usd" required >
              </div>
            </div>
            <div class="row ">
              <div class="column medium-12" id="listas1">
                <label for="">Precio</label>
                <input type="number" name="precio[]" value="" placeholder="Precio usd" required >
              </div>
              
            </div>
              <a href="#" class="remover_campo">Remover</a>
            </div> 

         `);
            x++;
    
  });
  // Remover o div anterior
  $('#listas1').on("click",".remover_campo",function(e) {
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  });
    </script>

<script>
    $(document).foundation();
    $(document).ready(function(){
    $("#agregar").click(function(){
      $("#agregarH").toggle();

      $(".registro").fadeToggle();
    });
    });


    $(".registro2").hide();
$("#agregarH").click(function(){ 
  $("#agregar").toggle();
  $(".registro2").fadeToggle();
});


    </script> 

<script>
$('.eliminar').click(function(e) {
e.preventDefault(); // Prevent the href from redirecting directly
var linkURL = $(this).attr("href");
warnBeforeRedirect(linkURL);
});

 function warnBeforeRedirect(linkURL) {
    Swal.fire({
      title: 'Estas seguro?',
    text: "No se puede deshacer este cambio",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, adelante',
    cancelButtonText:'No, cancelar'
    }).then((result) => {
  if (result.value) {
    window.location.href = linkURL;
  }
  return false;
})
  }
</script>

  </body>
</html>
