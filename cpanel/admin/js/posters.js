const propuestas_calificar = async() =>{
<<<<<<< HEAD
  // const data = new FormData();
  // data.append('temas', arreglo);
=======

>>>>>>> convocatorias2025
  let cuerpotabla = document.getElementById('cuerpoTabla');

  // listarPosters.php toma el id del evento desde $_SESSION['evento']
  const peticion = await fetch('../class/listarPosters.php', {
    method: 'POST'
  });
<<<<<<< HEAD
  
=======

>>>>>>> convocatorias2025
  const respuesta = await peticion.text();
  console.log(respuesta);

  cuerpotabla.innerHTML = respuesta;

  let botonEliminar = document.querySelectorAll('.borrar');

  for (const boton of botonEliminar) {
    boton.addEventListener("click", function(event){
      event.preventDefault();
      Swal.fire({
        title: 'Estas seguro que quieres eliminar esto',
        text: "Este cambio no se puede revertir",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Archivo eliminado con éxito',
            'El archivo se eliminó con éxito',
            'success'
          ).then((result)=>{
            if (result) {
              window.location = this.href;
            }
          })
        }
      })
    });
  }

  $('#tabla').DataTable({
    processing: true,
    order: [[ 0, "asc" ]],
    pageLength : 20,
    lengthMenu : [15, 20, 50, 100, 200, 500],
    dom: 'Bfrtip',
    buttons: [
      {
        extend: 'excel',
        title: 'Datos Poster',
        text: 'Exportar a Excel',
        exportOptions: { columns: [ 0, 1 ] }
      }
    ],
    language: {
      url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
    }
  });

}

propuestas_calificar();