
var contenedorM = document.getElementById("mexico");
var contenedorS = document.getElementById("sudamerica");

contenedorM.addEventListener("mouseover", backMexico);
contenedorM.addEventListener("mouseout", back);

contenedorS.addEventListener("mouseover", backSudamerica);
contenedorS.addEventListener("mouseout", back);


    function backMexico(){
        document.body.style.background = "#E2F3FB url('img/fondo_2.jpg') no-repeat bottom center "; 
        document.body.style.backgroundSize = "cover";
        contenedorM.style.opacity = "0.9";
        document.body.style.transition = "all 1s";
    }
    function back(){
        document.body.style.backgroundImage = "url('img/fondo.jpg')"; 
        contenedorM.style.opacity = "1";
        contenedorS.style.opacity = "1";
        document.body.style.transition = "all 1s";
    }
    function backSudamerica(){
        document.body.style.background = "#E2F3FB no-repeat bottom center"; 
        document.body.style.background = "#E2F3FB url('img/fondo_3.png') no-repeat bottom center"; 
        document.body.style.backgroundSize = "cover";
        contenedorS.style.opacity = "0.9";
        document.body.style.transition = "all 1s";
    }

//  ======= traducción =======

var traduccionIngles = document.getElementById("traduccionIngles"),
    traduccionPortugues = document.getElementById("traduccionPortugues"),
    traduccionEspanol = document.getElementById("traduccionEspanol"),
    espanol = document.querySelectorAll('.es'),
    ingles = document.querySelectorAll('.in'),
    portugues = document.querySelectorAll('.port');


traduccionIngles.addEventListener("click", traducirIngles);
traduccionPortugues.addEventListener("click", traducirPortugues);
traduccionEspanol.addEventListener("click", traducirEspanol);

function traducirIngles(){
    for (var i=0; i < espanol.length; i++ ){
        espanol[i].style.display = "none";
    }
    for (var i=0; i < espanol.length; i++ ){
        portugues[i].style.display = "none";
    }
   for (var i=0; i < ingles.length; i++ ){
       ingles[i].style.display = "block";
   }
  
}
function traducirPortugues(){
    for (var i=0; i < espanol.length; i++ ){
        espanol[i].style.display = "none";
    }
    for (var i=0; i < espanol.length; i++ ){
        portugues[i].style.display = "block";
    }
   for (var i=0; i < ingles.length; i++ ){
       ingles[i].style.display = "none";
   }
 }
 function traducirEspanol(){
    for (var i=0; i < espanol.length; i++ ){
        espanol[i].style.display = "block";
    }
    for (var i=0; i < espanol.length; i++ ){
        portugues[i].style.display = "none";
    }
   for (var i=0; i < ingles.length; i++ ){
       ingles[i].style.display = "none";
   }

 }

// ==============  móviles =============

var media = window.matchMedia("(max-width: 600px)");
movil(media);
media.addListener(movil);

function movil(media){
    var textoFigcaption = document.getElementsByTagName('figcaption');
    // var parrafos = document.querySelectorAll("p");
    if (media.matches){ //ejecutar si es dispositivo móvil
        document.getElementById("logo_mexico").src = "img/logo_leon.png";
        document.getElementById("logo_sudamerica").src = "guayaquil/img/logotipos/congreso_guayaquil.png";

        textoFigcaption[0].style.display = "block";
        // for (var i=0; i < textoFigcaption.length; i++ ){
        //     textoFigcaption[i].style.display = "block";
        // }

        var btnMexico = document.getElementById("mexico_figure");
        var btnSudamerica = document.getElementById("sudamerica_figure");

        btnMexico.addEventListener("click", redirigirMexico);
        btnSudamerica.addEventListener("click", redirigirSudamerica);

        function redirigirMexico(){
            window.location="https://www.congresoparques.com/leon/";
        }
        function redirigirSudamerica(){
            window.location="https://www.congresoparques.com/guayaquil";
        }

    }
    else{
        document.getElementById("logo_mexico").src = "img/logo_mexico.svg";
        document.getElementById("logo_sudamerica").src = "guayaquil/img/logotipos/congreso_guayaquil.png";

        for (var i=0; i < textoFigcaption.length; i++ ){
            textoFigcaption[i].style.display = "none";
        }

        traduccionIngles.addEventListener("click", ocultarFig);
        traduccionEspanol.addEventListener("click", ocultarFig);
        traduccionPortugues.addEventListener("click", ocultarFig);
        function ocultarFig(){
            var textFig = document.querySelectorAll('figcaption');
            for (var i=0; i < textFig.length; i++ ){
                textFig[i].style.display = "none";
            }
        }
        
        
    
    }
}





// var figcaptionEspanol = document.querySelectorAll('figcaption.es'); 




