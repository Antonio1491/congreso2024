<?php session_start();

 $_SESSION['id_usuario'] = $_GET['id_usuario'];

// echo $_SESSION['id_usuario'];
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bienvenidos Conferencistas</title>
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

        <section class="container">
          <div class="row align-center">
            <div class="mensajeBienvenida">
              <h5>¡Thank you for being part of the World Urban Parks Congress 2022.</h5>
              <p>This is an exclusive platform for keynote speakers and educational session speakers. In it, you will be able to carry out essential actions to make your moment of your conference easy and efficient, such as:
                <ul>
                  <li>Review all your personal and professional information in <a href="perfil.php" class="subrayado"> Profile</a>.</li>
                  <li>Sign the <a href="acuerdos.php" class="subrayado">Agreements </a>of your participation</li>
                  <li><a href="documentacion.php" class="subrayado">Upload your material</a> audiovisual such as: PowerPoint presentation, videos and additional information.</li>
                  <li>Consult <a href="conferencia.php" class="subrayado">information about your session</a>, such as: schedule and room.  </li>
                </ul>
              </p>
            </div>
          </div>
        </section>
      </div>
    </div>
  </main>
  <footer>
    <?php include ("inc/footer.php"); ?>
  </footer>
</body>
</html>
