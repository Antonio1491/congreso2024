<!doctype html>
<html class="no-js" lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas Frecuentes | Congreso Parques León 2020</title>
    <?php  require("inc/head-guay.php");
    include('../class/funciones.php');
    $preguntas = new PreguntasFrecuentes();
    
    ?>

</head>
<body onload="countdown('contador')">
  <header class="header h_preguntas">
    <?php include'inc/menu.php'; ?>
    <div class="titulo_pagina">
      <div class="figure_header">
        <figure class="">
          <img src="../img/iconos/sudamerica/i_preguntas.png" alt="">
        </figure>
      </div>
        <hgroup class="titulo_pagina">
          <h2>preguntas</h2>
          <h1>frecuentes</h1>
        </hgroup>
      </div>
  </header>
<main id="preguntas">
  <article class="">
  <?php  
    echo $preguntas->htmlPreguntas();   
    ?>
    
  </article>
</main>
<?php include'inc/footer-guay.php'; ?>
