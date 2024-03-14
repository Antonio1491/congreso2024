
const propuestas_calificar = async() =>{

    
    
    // const data = new FormData();
    // data.append('temas', arreglo);
    
    let cuerpotabla = document.getElementById('cuerpoTabla');
    
    const peticion = await fetch('../class/listarPreguntasFrecuentes.php',{
    method: 'POST'
    });
    
    
    
    const respuesta = await peticion.text();
    console.log(respuesta);
    
    cuerpotabla.innerHTML= respuesta;

    let botonEliminar = document.querySelectorAll('.borrar');

    for(boton of botonEliminar){

      boton.addEventListener("click", function(event){
        event.preventDefault()
        Swal.fire({
          title: 'Estas seguro que quieres eliminar esto',
          text: "Eeste cambio no se puede revertir",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
          if (result.isConfirmed) {
            // window.location= this.href;
            Swal.fire(
              'Archivo eliminado con éxito',
              'el archivo se eliminó con éxito',
              'success'
            ).then((result)=>{
              if (result) {
                            window.location= this.href;

              }
            })
          }
        })
      });
    }
    
    $('#tabla').DataTable(
        {
          "processing": true,
            "order": [[ 0, "asc" ]],
            "pageLength" : 20,
            "lengthMenu" : [15, 20, 50, 100, 200, 500],
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            
        }
      );
    
    
    }
    
    
    
    propuestas_calificar();
    
    