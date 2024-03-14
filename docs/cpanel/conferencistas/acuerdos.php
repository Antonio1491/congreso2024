<?php session_start();
require ("../class/funciones.php");
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

        <section id="acuerdos" class="container">
          <div class="row">
            <article>
              <h5>AGREEMENTS, TERMS AND CONDITIONS.</h5>
              <!-- <h6><strong>Asociación Nacional de Parques y Recreación de México</strong></h6> -->
              <p>Thank you for agreeing to participate in the World Urban Parks Congress 2022 that will take place from November 14th to 18th in Monterrey, México. In this document you will find the agreements, terms, and conditions in relation to the session that you will present at the WUP Congress. Please, review the details of this document and sign that you agree with the conditions before Friday SEPTEMBER, 23rd, 2022.</p>
              <p>Similarly, we ask you to review your personal information and general data of your conference or session to ensure that they are correct. Any comments or difficulties in correcting the data, contact Votoria Martin, Director of Content and Education, at the email: contenido@anpr.org.mx with a copy to latam@worldurbanparks.org </p>
            </article>
            <article class="">
              <h6><strong>Audiovisual equipment</strong></h6>
              <p>Each room will have a computer (PC - Windows), a projector, a projection screen, a podium with a presidential microphone and two wireless microphones. You do not need to bring a laptop for your presentation, as there will be one in each room, but you will need to bring your presentation on USB the day you present, in addition to sending your audiovisual material in a compatible format to the computer that will be provided 3 weeks prior to the congress (PC - Windows).</p>
                <p>The audiovisual material must be uploaded in the DOCUMENTS section of this system, before SUNDAY, OCTOBER 2ND, 2022.</p>
                <strong>Accepted formats:</strong>
                  <ul>
                    <li>Power Point (.pptx). </li>
                    <li>PDF</li>
                  </ul>
                    <strong>Additional Information:</strong>
                    <ul>
                      <li>The audiovisual material that you provide us will be available to members of World Urban Parks and the National Association of Parks and Recreation of Mexico on its official website, after the dates of the congress.</li>
                      <li>The organizing committee of the World Urban Parks Congress 2022 will not provide printed material for the educational sessions. If the speaker wishes to provide this material, he must do so at his own expense and provide enough material for all those attending the session - maximum capacity of the rooms: 250 people.</li>
                  </ul>
                </p>

            </article>
            <article class="">
              <strong>Terms and Conditions</strong>
              <p>For educational purposes, World Urban Parks and the National Association of Parks and Recreation of Mexico invites speakers to agree to share their presentation material with all attendees after the congress, as well as agree to take photos and video during their presentation.</p>
              <p>The above requests are not mandatory, however, of great importance. Please agree or disagree with the terms and conditions.</p>
              <p>Accepting to be a speaker at the World Urban Parks Congress 2022, I hereby grant World Urban Parks and the National Association of Parks and Recreation of Mexico the right to:</strong>
              <ol>
                <li>The taking of photographs and video during my presentation for advertising purposes in any format (printed or electronic) of the World Urban Parks Congress 2022 in its future editions.</li>
              </ol>

              <form class="" action="firmar_acuerdo.php" method="post">
                <fieldset class="firmar">
                  <legend>Sign:</legend>
                    <input type="radio" name="usoDeImagen" value="1" required> In agreement
                    <input type="radio" name="usoDeImagen" value="0"> In disagreement
                    <span>*Note: You must sign the distribution agreement.</span>
                </fieldset>
                <br>
              <strong>About distribution of the presentation and privacy notice:</strong>
              <ol>
                <li>Distribute my presentation and additional materials in PDF format in the system of the World Urban Parks Congress 2022.</li>
                <li>This signing of agreements, terms and conditions, corresponds to the materials delivered on your keynote or educational session at the World Urban Parks Congress 2022 and does not limit in any way the personal use of these materials. Ownership of this presentation and materials remains with you or any other party involved. In this signature you also declare that your presentation will not infringe any copyright or include any material that is defamatory, scandalous or an invasion of privacy towards third parties.</li>
                <li>I understand that the opinions expressed in my educational session are mine and not those of World Urban Parks and the National Association of Parks and Recreation of Mexico. I hereby warrant that the audiovisual materials and any other material prepared for my presentation do not infringe any copyright or violate any other rights of any person or party. I agree to always hold World Urban Parks and the National Association of Parks and Recreation of Mexico and its members harmless against all claims, liabilities, losses, damages, costs and expenses, including attorneys' fees, arising from my personal use or World Urban Parks and the National Association of Parks and Recreation of Mexico's use of the materials mentioned for a breach of the foregoing warranty.</li>
              <li>It is important to remember that the keynote sessions and educational sessions of the World Urban Parks Congress 2022 are not a space for the promotion and/or sale of products and/or services. The networking moments before or after the learning moment will be adequate for these purposes.</li>
              </ol>
              <fieldset class="firmar">
                <legend>Sign: </legend>
                <input type="radio" name="distribucionMaterial" value="1" required> In agreement
                <input type="radio" name="distribucionMaterial" value="0"> In disagreement
              </fieldset>
              <br>
              <input type="submit" name="" value="Send Signatures" class="button">
            </form>
            <div class="cajaFirmado text-center">
              <i class="fi-check"></i> <span>Signed</span>
            </div>
            </article>

          </div>

          <div class="row align-center">
            <span style="font-size: 17px;">Atte. Vitoria Martin Director of Education and Content.</span><br>
          </div><br>
          <div class="row">
              <?php
                $firma = new Conferencistas();
                $respuesta = $firma->comprobarFirma($_SESSION['id_usuario']);
                if ($respuesta) {
                      echo "
                            <script>
                              $('.firmar').hide();
                              $('.button').hide();
                              $('.cajaFirmado').show();
                            </script>
                      ";
                }
              ?>
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
