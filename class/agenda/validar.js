function validar (){
    let nombre, telefono, email, organizacion,expositor,fecha;


    nombre= document.getElementById("nombre").value;
    correo= document.getElementById("inputPassword4").value;
    telefono= document.getElementById("telefono").value;
    organizacion= document.getElementById("organizacion").value;
    expositor= document.getElementById("expositor").value;
    fecha= document.getElementById("fecha").value;

     let expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
     let nombreC =/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g;


  





    if (nombre == "" || telefono=="" || email=="" ||organizacion==""||expositor==0 ||  fecha==""){
        Swal.fire({ title: "Todos los campos son obligatorios",
        text: "Porfavor completa de manera correcta los campos",
        icon: "error",customClass: "swal-wide",}).then(okay => {
          if (okay) {

         }
       });
       return false;

    }


    else if (!nombreC.test(nombre)){
      
      Swal.fire({ title: "El nombre no es valido",
      text: "Porfavor escriba un nombre valido",
      icon: "error",customClass: "swal-wide",}).then(okay => {
        if (okay) {
       }
     });

     return false;
    }

    else if(!expresion.test(correo)){
      Swal.fire({ title: "El correo no es valido",
      text: "Porfavor escriba de manera correcta el correo",
      icon: "error",customClass: "swal-wide",}).then(okay => {
        if (okay) {
       }
     });

     return false;

    }

    
    else if(isNaN(telefono)){

      Swal.fire({ title: "El telefono no es un numero valido",
      text: "Porfavor escriba solo caracteres numericos",
      icon: "error",customClass: "swal-wide",}).then(okay => {
        if (okay) {
       }
     });

     return false;
    }


    
    // else if (!orga.test(organizacion)){
      
    //   Swal.fire({ title: "la organizacion tiene un nombre incorrecto",
    //   text: "Porfavor escriba un nombre valido",
    //   icon: "error",customClass: "swal-wide",}).then(okay => {
    //     if (okay) {
    //    }
    //  });

    //  return false;
    // }


    }



