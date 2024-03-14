
const propuestas_calificar = async() =>{

 let cuerpotabla = document.getElementById('cuerpoTabla');
 
 const peticion = await fetch('../class/promedioPreguntas.php',{
 method: 'POST'
 });
 
 const respuesta = await peticion.text();
 console.log(respuesta);


 
 cuerpotabla.innerHTML= respuesta;
  let botonAceptar = document.querySelectorAll('.noAceptada');
  let botonRechazar = document.querySelectorAll('.rechazar');


 for(boton of botonAceptar){
     boton.addEventListener('click', function (e) {
         e.preventDefault();
                            Swal.fire({
                    title: 'Estas seguro que quieres eliminar esto',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, adelante',
                    cancelButtonText: "No, cancelar",

                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Propuesta Aceptada',
                            'Se aceptó la propuesta con éxito',
                            'success'
                            ).then((result) => {
                    if (result) {
               window.location = this.href;}})} })
     })
 }
 for(botonR of botonRechazar){
  botonR.addEventListener('click', function (e) {
      e.preventDefault();
                         Swal.fire({
                 title: 'Estas seguro que quieres rechazar la propuesta',
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Si, adelante',
                 cancelButtonText: "No, cancelar",

                 }).then((result) => {
                 if (result.isConfirmed) {
                     Swal.fire(
                         'Propuesta Rechazada',
                         'Se rechazó la propuesta con éxito',
                         'info'
                         ).then((result) => {
                 if (result) {
            window.location = this.href;}})} })
  })
}
 $('#tabla').DataTable(
     {
        processing: true,
      order: [[ 0, "asc" ]],
      pageLength : 20,
      lengthMenu : [15, 20, 50, 100, 200, 500],
      dom: 'Bfrtip',
      buttons: [
          {
              extend: 'excel',
              title: 'Exportar',
              text: 'Exportar a Excel',
              exportOptions: {
                columns: [ 0,1,2,3, 4,5,6,7 ]
              }
          }
        
      ],
      language: {
      url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
         
     }
   );
 


 
 }
 
 
 propuestas_calificar();
 
 