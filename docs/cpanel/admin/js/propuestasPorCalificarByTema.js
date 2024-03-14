
const propuestas_calificar = async() =>{
  let fecha_hoy = new Date();
  let fecha_vencimiento = new Date('2022-07-10');

  if(fecha_hoy>= fecha_vencimiento){
    Swal.fire(
      'Tiempo expirado',
      'La fecha para calificar propuestas ya expiró',
      'warning'
    )
  }else{
  const urlSearchParams = new URLSearchParams(window.location.search);
  const params = Object.fromEntries(urlSearchParams.entries());

  const dataTemas = new FormData();
  dataTemas.append('id', params.id_usuario )

  const peticion_temas = await fetch('../class/temasByIdUsuario.php',{
    method: 'POST',
     body: dataTemas
    });

    const arreglo = [];
    
    const respuesta_temas = await peticion_temas.json();
    for(temas of respuesta_temas){
      arreglo.push(parseInt(temas.id_tema));
    }

      //  const arreglo = [2,4];
       const arreglo2 =  [{
        nombre: "Diseño y Planeación",
        id_tema: 2
      },
      {
        nombre: "La ciudad",
        id_tema: 4
      }
    ]
    const array = JSON.stringify(arreglo);


    
    let cuerpotabla = document.getElementById('cuerpoTabla');
    
    const peticion = await fetch('../class/temas.php',{
    method: 'POST',
     body: array
    });
    
    
    
    const respuesta = await peticion.text();
    console.log(respuesta);
    
    cuerpotabla.innerHTML= respuesta;

    const calificados = async() =>{
      const urlSearchParams = new URLSearchParams(window.location.search);
      const params = Object.fromEntries(urlSearchParams.entries());
      
      const data = new FormData();
      
      data.append('id_usuario', params.id_usuario)
      const peticion2 = await fetch('../class/calificado.php',{
        method: 'POST',
         body: data
        });
        const respuesta2 = await peticion2.json();
        console.log(respuesta2);
      
        // for(buscar of respuesta2){
        //   let id = buscar.id_conferencia
      
        //    let botonOcultar = document.querySelectorAll(`i.num-${id}`);
      
        //    for(boton_ocultar of botonOcultar ){
        //     boton_ocultar.parentElement.parentElement.parentElement.style.display = "none";
      
        //    }
        // }

        for(buscar of respuesta2){
          let id = buscar.id_conferencia
      
           let botonOcultar = document.querySelectorAll(`i.num-${id}`);
      
           let btnOcultar = document.querySelectorAll('.ocultar');
           let btnMostrar = document.querySelectorAll(`i.edit-${id}`);
      
      
           for(boton_ocultar of botonOcultar ){
            boton_ocultar.parentElement.parentElement.parentElement.style.display = "none";
      
           }

           for (ocultar of btnOcultar){
             ocultar.style.display = "none";
            
           }
      
           for(mostrar of btnMostrar){
            mostrar.style.display = "block";
          }
      
      
           for(boton_ocultar of botonOcultar ){
            boton_ocultar.style.display = "none";
      
           }
          //  botonOcultar.style.display = "none";
        }
      
    }

  
        $('#tabla').DataTable(
        {
          "processing": true,
            "order": [[ 6, "asc" ]],
            "pageLength" : 20,
            "lengthMenu" : [15, 20, 50, 100, 200, 500]         
        }
      );
    
    
     
      // console.log(arr);
      calificados();

    
    
    
    
      let botonTema= document.getElementById('botones');


      for (item of respuesta_temas){
        let id_tema = item.id_tema;

        let createboton = `<a  id="tema-${item.id_tema}"  class="tema button margin-top-1" href="${item.id_tema}">${item.tema}</a> `;


        botonTema.innerHTML+=createboton;


        let botonclik= document.querySelectorAll(`.tema`);

        let botonTodos = document.getElementById('totaltemas')

        botonTodos.addEventListener('click',function(){
          window.reload();
        });

        for(btnp of botonclik){
  
          btnp.addEventListener('click', async function(e){
            e.preventDefault();
            const nuevaStr = this.id.replace('tema-', "");
            let textfinal = parseInt(nuevaStr);
  
            $('#tabla').DataTable().destroy();
            cuerpotabla.innerHTML="";
  
            // const arreglofiltrado = JSON.stringify(textfinal);
            // const arreglofiltrado2 = JSON.stringify(arreglo2);

            let dataareeglo = new FormData();
            dataareeglo.append('id', textfinal);
            // dataareeglo.append('array', JSON.stringify(arreglofiltrado2));

         

          
            const peticion3 = await fetch('../class/filtradoTemasPorCalificar.php',{
              method: 'POST',
               body: dataareeglo
              });
              const respuesta3 = await peticion3.text();
              console.log(respuesta3);
              cuerpotabla.innerHTML+=respuesta3;
                  $('#tabla').DataTable(
                        {
                          "processing": true,
                            "order": [[ 6, "asc" ]],
                            "pageLength" : 20,
                            "lengthMenu" : [15, 20, 50, 100, 200, 500]         
                        }
                      );
    
              calificados();


          })
     // let botonTotalPropuestas =`<a  id="totaltemas" href=""  class="tema button margin-top-1" >Todas las propuestas</a>`;
      // botonTema.innerHTML+=botonTotalPropuestas;
        }
   

      }
    
      
    }
    
    }
    
    
    
    propuestas_calificar();
    
    