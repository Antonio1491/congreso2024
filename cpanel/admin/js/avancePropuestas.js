
const propuestas_calificar = async() =>{

    
    
    // const data = new FormData();
    // data.append('temas', arreglo);
    
    let cuerpotabla = document.getElementById('cuerpoTabla');
    
    const peticion = await fetch('../class/avancePropuestas.php',{
    method: 'POST'
    });
    
    
    
    const respuesta = await peticion.text();
    console.log(respuesta);
    
    cuerpotabla.innerHTML= respuesta;
    // 
    // $('#tabla').DataTable(
    //     {
    //       "processing": true,
    //         "order": [[ 6, "asc" ]],
    //         "pageLength" : 20,
    //         "lengthMenu" : [15, 20, 50, 100, 200, 500],
    //         "language": {
    //         "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    //         },
            
    //     }
    //   );
    
    
    
    
    
    
    
    
    
    
    
    }
    
    
    
    propuestas_calificar();
    
    