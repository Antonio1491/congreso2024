<?php require 'includes/templates/head.php'; ?>
<header class="header">
  <div class="container">
    <h1 class="header__titulo">Eventos Sociales</h1>
    <img src="build/img/linea.png" alt="">
    <p>¡Ha llegado el momento de intercambiar tarjetas y divertirse!</p>
  </div>
</header>
<main>
  <div class="container-fluid bgDegradado">
    <div class="container">
      <div class="row">
        <div class="col col-sm-12 col-md-12 text-center p-md-5">
          <p class="lead white">Expande tus horizontes profesionales y sumérgete en una experiencia única con los dos eventos sociales exclusivos que hemos organizado especialmente para ti; donde la diversión se mezcla con la innovación y el networking, en un ambiente relajado y lleno de posibilidades;<strong class="verde bolded"> disfruta, conecta y forja relaciones</strong> que impulsarán el futuro de los parques y espacios públicos.
          </p>
        </div>
      </div>
    </div>
  </div>
  
  <!-- <div class="container-fluid ">
    <article class="row bgApertura">
      <div class="col-sm-12 col-md-6"></div>
      <div class="col-sm-12 col-md-6 align-self-center">
        <h2 class="subtituloBMin">Evento de Apertura</h2>
        <h4 class="subtituloComplementario">23 de octubre</h4>
        <p class="white">No te puedes perder nuestro Evento de Apertura donde podrás experimentar una muestra de Mérida, su música y antojitos mexicanos. ¡ Sin duda, el ambiente ideal para socializar y relajarse después del primer día del congreso!
        </p>
        <div class="row detalles_evento">
          <div class="col-md-6 col-sm-12">
            <span><i class="bi bi-clock "></i><p class="subtituloComplementario">  Hora:</p></span>
             <p class="white">8:00 p.m. - 11 p.m.</p>
          </div>
          <div class="col-md-6 col-sm-12">
            <span><i class="fi-marker"></i><p class="subtituloComplementario"> Lugar:</p></span>
            <p><a href="https://goo.gl/maps/F4EUNkGaD9SjH2Xy8" class="white">Museo de Ciencias Explora </a></p>
          </div>
        </div>
      </div>
    </article>
  </div> -->
  <div class="container-fluid ">
    <article class="row bgBeerparty">
      <div class="col-sm-12 col-md-6 align-self-center">
        <h2 class="subtituloBMin">Beer and Mix Party</h2>
        <h4 class="subtituloComplementario">24 de octubre</h4>
        <p class="white">Únete a nosotros en la Beer and Mix Party, un evento social vibrante y lleno de sabor que se celebra en el corazón del Congreso Parques. Disfruta de una noche única en la que la cerveza artesanal, la música y el buen ambiente se combinan para ofrecerte una experiencia inolvidable. ¡No te pierdas esta oportunidad de brindar por el futuro de nuestros espacios públicos!
        </p>
        <div class="row detalles_evento">
          <div class="col-md-6 col-sm-12">
          <span><i class="bi bi-clock"></i><p class="subtituloComplementario"> Hora:</span>
          <p class="white">5:30 p.m. - 8:00 p.m.</p>
          </div>
          <div class="col-md-6 col-sm-12">
            <span><i class="fi-marker"></i><p class="subtituloComplementario">  Lugar:</p></span>
            <p class="white">Expo Espacio Público</p>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6"></div>
    </article>
  </div>
  <div class="container-fluid">
    <article class="row bgClausura">
      <div class="col-sm-12 col-md-6"></div>
      <div class="col-sm-12 col-md-6 align-self-center">
      <h2 class="subtituloBMin">Evento de Clausura</h2>
        <h4 class="subtituloComplementario">25 de octubre</h4>
        <p class="white">Después de aprender de los expertos y adquirir nuevas experiencias, ¡es hora de celebrar en el Evento de Clausura! Participa en el ambiente vibrante de una de las cantinas botaneras más típicas de Mérida, donde te esperan antojitos yucatecos, música, baile y un ambiente único. Disfruta de la deliciosa comida local y la buena compañía, mientras brindas por los logros compartidos durante el Congreso Parques. 
        </p>
        <div class="row detalles_evento">
          <div class="col-md-6 col-sm-12">
            <span><i class="bi bi-clock"></i><p class="subtituloComplementario">  Hora:</p></span>
          <p class="white">6:30 p.m. - 10 p.m.</p>
          </div>
          <div class="col-md-6 col-sm-12">
            <span><i class="fi-marker"></i><p class="subtituloComplementario">  Lugar:</p></span>
           <p><a href="https://maps.app.goo.gl/JSKqgaNStcb9obuo7" class="white">Eladios Bar Galerías </a></p>
          </div>
        </div>
      </div>
    </article>
  </div>
</main>

<div class="container mt-5 border p-4">
  <div class="row">
    <div class="col-md-12">
      <h5 class="primary"><strong>Recomendaciones:</strong></h5>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <ul>
        <li>Las fiestas no cuentan con un código de vestimenta estricto.</li>
        <li>Al momento del registro se te proporcionarán los tickets correspondientes a los alimentos y bebidas de cada fiesta. Estos tickets tienen que ser entregados en los eventos por lo que es indispensable llevarlos.</li>
        <li>Si los tickets anteriormente mencionados no son presentados en la fiesta, las personas encargadas de las áreas de alimentos y bebidas no podrán entregar ninguno de estos servicios.</li>
      </ul>
    </div>
  </div>
</div>

  <?php require 'includes/templates/sede.php'; ?>

  <div class="container">
    <div class="row mt-5 ">
      <img src="build/img/linea_gris.png" alt="">
    </div>
  </div>

  <?php require 'includes/templates/patrocinadores.php'; ?>

  <?php require 'includes/templates/expositores.php'; ?>

</main>
<?php require 'includes/templates/footer.php'; ?>