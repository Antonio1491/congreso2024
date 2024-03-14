
const propuestas_calificar = async() =>{


    let cuerpotabla = document.getElementById('cuerpoTabla');
    
    const peticion = await fetch('../class/editarPreguntas.php',{
    method: 'POST'
});
    
    
    
    const respuesta = await peticion.json();
    console.log(respuesta);
    

    let i = 0;
    let datosTabla;
    for(resp of respuesta){
        i++;

        let datosTabla = `      
        <tr>
        <td>${i}</td>
        <td>${resp.pregunta}</td>
        <td>${resp.nombre}</td>
        <td class="text-center acciones">
        <a href="editarPreguntasById.php?id_pregunta=${resp.id_pregunta}" class="link_encuesta"><i class="fi-checkbox"></i></a>
        <a class="link_encuesta"><i id="${resp.id_pregunta}" class="fi-trash eliminar"></i></a>
        </td>
        </tr>
        `
        cuerpotabla.innerHTML += datosTabla;
    }

    let btnEliminar = document.querySelectorAll('.eliminar');

    for(eliminar of btnEliminar){
      eliminar.addEventListener('click', function(e){
        e.preventDefault();

        Swal.fire({
          title: 'Estas seguro que quieres eliminar esto',
          text: "Este cambio no se puede revertir",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, adelante',
          cancelButtonText: 'No, cancelar'

        }).then(async(result) => {
          if (result.isConfirmed) {
            const data_eliminar = new FormData();
            data_eliminar.append('id', this.id);
            const peticion_eliminar = await fetch('../class/eliminarPregunta.php',{
              method: 'POST',
              body: data_eliminar
          });

          const respuesta_eliminar = await peticion_eliminar.json();
          console.log(respuesta_eliminar);

          if(respuesta_eliminar == 'ok'){
             Swal.fire(
              'Registro Eliminado!',
              'Se eliminó con éxito el registro',
              'success'
            ).then((result) => {
              if(result){
                window.location.reload();
              }
            })
          }

    
            // Swal.fire(
            //   'Deleted!',
            //   'Your file has been deleted.',
            //   'success'
            // )
          }
        })

     

      })
    }

    const tabla = () => {
      
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

      tabla();
    
    }
    
    
    

    



    propuestas_calificar();
    
    