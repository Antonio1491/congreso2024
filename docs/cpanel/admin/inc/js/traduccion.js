function traducir(idioma){
    var espanol = document.querySelectorAll('.es'),
    ingles = document.querySelectorAll('.in'),
    portugues = document.querySelectorAll('.port');

    switch(idioma){
        case 'es':
            for (var i=0; i < espanol.length; i++ ){
            espanol[i].style.display = "block";
            }
            for (var i=0; i < espanol.length; i++ ){
                portugues[i].style.display = "none";
            }
            for (var i=0; i < ingles.length; i++ ){
                ingles[i].style.display = "none";
            }
        break;
        
        case 'in':
            for (var i=0; i < espanol.length; i++ ){
                espanol[i].style.display = "none";
            }
            for (var i=0; i < espanol.length; i++ ){
                portugues[i].style.display = "none";
            }
            for (var i=0; i < ingles.length; i++ ){
               ingles[i].style.display = "block";
            }
        break;
        
        case 'port':
            for (var i=0; i < espanol.length; i++ ){
                espanol[i].style.display = "none";
            }
            for (var i=0; i < espanol.length; i++ ){
                portugues[i].style.display = "block";
            }
            for (var i=0; i < ingles.length; i++ ){
                ingles[i].style.display = "none";
            }
        break;
    }
}

