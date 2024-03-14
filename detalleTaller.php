<?php require 'includes/templates/head.php'; ?>
<?php require ("class/clases.php"); 
  $id_taller = $_GET['id'];
?>
<header class="header">
  <div class="container">
    <h1 class="header__titulo">Taller</h1>
    <img src="build/img/linea.png" alt="">
  </div>
</header>
<main class="container mt-5">
  
  <?php	
  $talleres = new Taller();
  $info = $talleres->infoTaller($id_taller);
  echo $info;    

  ?>

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