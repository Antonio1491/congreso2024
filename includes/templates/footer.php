<footer class="container-fluid mt-5">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <h6>Organizado por</h6>
        <img src="./build/img/anpr_blanco.png" alt="" class="logoFooter">
      </div>
      <div class="col">
        <h4 class="subtitulo">¡Mantente informado!</h4>
      </div>
      <div class="col">
        <h6 class="pb-3">Contacto</h6>
        <a href="https://www.facebook.com/CongresoParques/">
          <img src="./build/img/icon_facebook.png" alt="" class="iRedes">
        </a>
        <a href="https://www.instagram.com/congreso_parques/">
          <img src="./build/img/icon_instagram.png" alt="" class="iRedes">
        </a>
        <a href="https://www.youtube.com/channel/UC_ExzrmxP5er7qZHeVpWidQ">
          <img src="./build/img/icon_youtube.png" alt="" class="iRedes">
        </a>
        <a href="https://twitter.com/congreso_parque">
          <img src="./build/img/icon_twitter.png" alt="" class="iRedes">
        </a>
        <div>
          <span>WhatsApp +52 999 353 0691</span><br>
          <span>info@congresoparques.com</span>
        </div>
      </div>
    </div>
  </div>
</footer>

  <?php 
$imagesDir = './build/img/headers/';

$images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

$randomImage = $images[array_rand($images)];

?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script type="text/javascript">
    let contenedorFondo = document.querySelector('.header');

if(contenedorFondo){
  // background-image: radial-gradient( circle farthest-corner at 0.1% 44.3%,  rgba(29,12,101,1) 0%, rgba(187,187,187,0) 67.4% );
  contenedorFondo.style.backgroundImage= "linear-gradient(90deg, rgba(29,12,101,1) 25%, rgba(255,255,255,0) 100%), url('<?php echo$randomImage ?>')";

}
  </script>
  <!-- //slick  -->
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.js"></script>
  <!-- Meta Pixel Code -->
  <script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '600435220388083');
  fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=600435220388083&ev=PageView&noscript=1"
  />
  </noscript>
  <!-- End Meta Pixel Code -->
  <script type="text/javascript">
    $('.slider_expositores').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 300,
    });

    $('.slider_conferencistas').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 300,
    });
  </script>
  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v8.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="433605833658855"
        theme_color="#0084ff"
        logged_in_greeting="¡Hola!, cómo puedo ayudarte?"
        logged_out_greeting="¡Hola!, cómo puedo ayudarte?">
        </div>
</body>
</html>