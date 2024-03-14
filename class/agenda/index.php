<?php
 require ("class/clases.php");
 $congreso = "CPSG2020";
//  echo $congreso;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.all.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&display=swap" rel="stylesheet">
    <script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <script src="validar.js"></script>
    
    <title>Agenda Expo Parques</title>
</head>
<body>
  <header id="header">
    <div class="con-img">
    <figure>
   <img src="img/logo.png" alt="" srcset="">
   </figure>
   </div>

   <div class="texto-header">
     <h1>EXPO PARQUES</h1>
   </div>
  </header>
<div class="content">
  <section class="mid">
  <div class="main">
<div class="container-fluid">

  <h1 class="text-center mt-3">Agendar cita</h1>


<form class="row g-3 form" action="class/registro_cita.php" method="post"  onsubmit="return validar();">
  <div class="d-flex justify-content-around">

  <div class="col-md-11 col-sm-12 mt-3 col-12">
    <label for="inputEmail4" class="form-label">Nombre del contacto</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
  </div>
</div>

<div class="d-flex justify-content-around bajar">

<div class="col-md-5 col-sm-12  col-12">
  <label for="inputPassword4" class="form-label">Telefono</label>
  <input type="text" class="form-control campos" id="telefono" name="telefono">
</div>
<div class="col-md-5 col-sm-12  col-12">
  <label for="inputPassword4" class="form-label">Email</label>
  <input type="text" class="form-control campos" id="inputPassword4" name="email">
</div>
</div>

  
  <div class="d-flex justify-content-around">

  <div class="col-md-11 col-sm-12 col-12">
    <label for="inputEmail4" class="form-label">Organizacion/Empresa</label>
    <input type="text" class="form-control" id="organizacion" name="organizacion">
  </div>
  </div>


  <div class="d-flex justify-content-around bajar">

    <div class="col-md-5 col-sm-12 col-12">
      <label for="inputEmail4" class="form-label">Expositor</label>
      <select  name="id_expo" class="form-select" id="expositor">
        <option selected value="">Seleccione Expositor</option>
        <?php
        $datos = new Agenda;
        $expositor = $datos->getExpositores($congreso);
        foreach($expositor as $valor) {
          echo "<option value='".$valor["id_expositor"]."'>".$valor["nombre_expositor"]."</option>";
        }


?>
      </select>
      <br>    
    </div> 
    <div class="col-md-5 col-sm-12 col-12">
      <label for="inputEmail4" class="form-label">Fecha</label>
      <?php
      $datos_fecha = new Agenda;
      $fechas = $datos_fecha->getFecha($congreso);
    
      foreach($fechas as $valor){
            $fecha_inicio = $valor['fecha_inicio'];
            $fecha_fin = $valor['fecha_fin'];
    
      }
      echo "<input class='form-control' id='fecha' type='date' name='fecha' min=".$fecha_inicio." max='".$fecha_fin."'>";
    
    
      
      ?>
    </div>  
    </div>
    
    
  </div>
  <div class="col-12 ">
    <div class="d-flex justify-content-center align-items-center">
    <input type="hidden" name="congreso" value="<?php echo $congreso; ?>">
    <button type="submit" class="btn btn-success mt-5">Agendar</button>
  </div>
  </div>
</form>
</div>
</section>
</div>

<footer>
  <h4>DATOS DE CONTACTO</h2>
  <p>WhatsApp +52 999 353 0691</p>
  <p>info@congresoparques.com</p>
</footer>


</body>
</html>

