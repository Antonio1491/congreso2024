<?php
class Taller extends Conexion{
  public function __construct(){
      parent::__construct();
  }

  //Método para obtener los datos de la tabla talleres -> información individual
     public function infoTaller($id_taller){
      $sql = "SELECT * FROM talleres WHERE id_taller = $id_taller ";
      $consulta = $this->conexion_db->query($sql);
      $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
      $html = '';

      foreach($resultado as $data){

        $precios = '';
        if($data['categoria'] == 'Vivencial'){
          $precios = "<div class='text-center'>$750 MXN <br><h6><strike>$1220 Mxn</strike></h6><div>";
        }else{
          $precios = "<div class='text-center'>$980 MXN <br><h6><strike>$1500 Mxn</strike></h6><div>";

        }

        // setlocale(LC_ALL,"es_ES");
        $date=date_create($data['fecha']);
      $format = date_format($date,"d / F / Y ");
        // $format = strftime($date,"d / F / Y ");

      $hora_inicio = date_create($data['inicio']);
      $hora_format_inicio = date_format($hora_inicio,"g:i");

      $hora_inicio2 = date_create($data['fin']);
      $hora_format_inicio2 = date_format($hora_inicio2,"G:i");

        $html .= '
        <section class="informacion__taller">
  <div class="row seccion">
      <div class="col-md-9 col-sm-12 textoPrincipal">
        <h2 class="subtituloPMin mb-2">'.$data['titulo'].'</h2>
        <h4 class="aprendiendo">'.$data['subtitulo'].'</h4>
        <div class="row text-center">
        <img src="build/img/'.$data['foto'].'" alt="" class="mt-3 mb-5">
        </div>
        
          <h5 class="subtituloPMin">Descripción</h5>
          <p>'.$data['descripcion'].'</p>
        </div>
      <div class="col-md-3 col-sm-12 cuadroAzul">
          <h2 id="taller-'.$id_taller.'" class="text-center subtituloBMin">'.$precios.'</h2>
          <div class="text-center">
            <a class="btn btn__primary justify-content-center" href="https://www.ticketopolis.com/congresoleon2023/tickets.aspx">
            <i class="fi-shopping-cart"></i>Comprar ahora</a>
          </div>
          
          <hr class="mt-4 mb-4">
          <p ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
          <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
        </svg>  '.$format.'</p>
          <p > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
          <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
        </svg>  '.$hora_format_inicio.' - '.$hora_format_inicio2.' hrs</p>
          <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
          <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
        </svg>  '.$data['capacidad'].' Personas</p>
          <p class="verde"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
          <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
          <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
        </svg> <strong>Constancia de participación digital</strong></p>
 <hr class="mt-4 mb-4">
  <!--<h5>Talleristas:</h5>-->
  <div class="representante">';
  // $html .= $this->getTalleristas($id_taller);
  $html .= ' </div>
      </div>
  </div>
  </section>
        ';
      }

      return $html;


    }

    public function getTalleristas($id){
      $sql = "SELECT * FROM talleres 
      INNER JOIN talleristas ON talleristas.id_taller = talleres.id_taller
      WHERE talleres.id_taller = '$id'";
       $consulta = $this->conexion_db->query($sql);
       $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
      $html = '';
       foreach($resultado as $data){

        $html .= '<img class="imgRedonda" src="../img/uploads/talleristas/'.$data['fotografia'].'" alt="">
        <div class="texto">
          <h6>'.$data['nombre'].' '.$data['apellidos'].'</h6>
          <p class="negritas">'.$data['cargo'].'</p>
          <p>'.$data['empresa'].'</p>
        </div>';

      }
            return $html;

    }
  public function htmlTalleresVivenciales(){
    $sql = "SELECT * FROM talleres WHERE categoria = 'Vivencial' ORDER BY fecha, inicio";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

    $html = '';

    foreach($resultado as $res){
      $piezas = explode(" ", $res['descripcion']);
      $cadena = implode(" ", array_splice($piezas, 0, 60));
  
      $date = date_create($res['fecha']);
      $format = date_format($date,"M. d  ");
      $hora_inicio = date_create($res['inicio']);
      $hora_format_inicio = date_format($hora_inicio,"g:i a ");
     
      $html.='
      <div class="contenedor__talleres--taller" id="resumen-taller-'.$res['id_taller'].'">
        <div class="overflow-hidden">
          <img src="imagenes/'.$res['foto'].'" alt="" class="img_fluid mb-2" width="100%">
        </div>
        <div class="contenido__taller">
          <div class="iconos__taller">
            <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
            </svg> '.$format.'</p>
            <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
            </svg> '.$hora_format_inicio.'</p>
            <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
            </svg> ' .$res['capacidad'].' personas </p>
          </div>

          <h6 class="subtituloPMin text-center mt-2">'.$res['titulo'].'</h6>
          <h5 class="text-center">'.$res['subtitulo'].'</h5>
          <p class="desc_taller">'.$cadena.'...'.'</p>

          <div class="precio">
          </div>

          <div class="boleto__btn">
            <a href="detalleTaller.php?id='.$res['id_taller'].'" class="btn btn__primary">Ver Detalles</a>
          </div>

        </div>
      </div>
  ';
    }

    return $html;
  }

  public function htmlTalleresCurrriculares(){
    $sql = "SELECT * FROM talleres WHERE categoria = 'Master Class' ORDER BY fecha, inicio";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

    $html = '';

   
    foreach($resultado as $res){
      $piezas = explode(" ", $res['descripcion']);
      $cadena = implode(" ", array_splice($piezas, 0, 60));
  

      $date=date_create($res['fecha']);
      $format = date_format($date,"M. d  ");
      $hora_inicio = date_create($res['inicio']);
      $hora_format_inicio = date_format($hora_inicio,"g:i a ");
     
      $html.='
      <div class="contenedor__talleres--taller">
      <img src="build/img/'.$res['foto'].'" alt="" class="img_fluid mb-2" width="100%">
  
          <div class="contenido__taller">
          <div class="iconos__taller">
  <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg> '.$format.'</p>
  <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
  <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
</svg> '.$hora_format_inicio.'</p>
  <p><i class="fi-torso verde"></i> ' .$res['capacidad'].' people </p>
  
  </div>
  <h6 class="subtituloPMin text-center">'.$res['titulo'].'</h6>
  <h5 class="text-center">'.$res['subtitulo'].'</h5>
  <p class="desc_taller">'.$cadena.'...'.'</p>

  
  <div class="precio">
  </div>
  <div class="boleto__btn">
    <a href="detalleTaller.php?id='.$res['id_taller'].'" class="btn btn__primary">Ver Detalles
    </a>
  </div>
  
  </div>
  </div>

  ';
    }

    return $html;
  }
  public function taller($taller){
    $sql = "SELECT * FROM talleres WHERE id_taller = '$taller'";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    return $resultado;
  }
  public function tallerVivencial($congreso){
    $sql = "SELECT * FROM talleres WHERE categoria = 'Vivencial' ORDER BY fecha, inicio";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    return $resultado;
  }
  public function tallerCurricular($congreso){
    $sql = "SELECT * FROM talleres WHERE categoria = 'Curricular' ORDER BY fecha, inicio";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    return $resultado;
  }

  public function talleristas($congreso){
    $sql = "SELECT * FROM talleristas WHERE id_congreso = '$congreso' ";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    return $resultado;
  }

  public function talleristaImparte($taller){
    $sql = "SELECT a.nombre, a.apellidos, a.cargo, a.cargo_ing, a.cargo_port, a.empresa, a.empresa_ing, 
    a.empresa_port, a.fotografia, a.biografia, a.biografia_ing, a.biografia_port
    FROM talleristas as a 
    INNER JOIN talleres as b 
    ON a.id_taller = b.id_taller
    WHERE a.id_taller = '$taller' ";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    
    return $resultado;
  }

  function resumenTaller($texto, $largor = 30, $puntos = "...")
  {
   $palabras = explode(' ', $texto);
   if (count($palabras) > $largor)
    {
     return implode(' ', array_slice($palabras, 0, $largor)) ." ". $puntos;
    } else
         {
           return $texto;
         }
    }

    
    public function listaTalleres($id_congreso){
      $sql = "SELECT * FROM talleres  ORDER BY id_taller DESC";
      $resultado = $this->conexion_db->query($sql);
      $talleres = $resultado->fetch_all(MYSQLI_ASSOC);
      return $talleres;
    }
 
  //Taller
    public function registrarTaller($taller, $taller_ing, $taller_port, $subtitulo, 
                    $subtitulo_ing, $subtitulo_port, $fecha,
                    $inicio, $fin, $capacidad, $tallerista, $tipo,
                    $descripcion, $descripcion_ing, $descripcion_port, $fotografia, $evento){
      $sql = "INSERT INTO talleres VALUES
      (null, '$taller', '$taller_ing', '$taller_port',  '$subtitulo', 
                    '$subtitulo_ing', '$subtitulo_port','$descripcion', '$descripcion_ing','$descripcion_port',
      '$fecha', '$inicio', '$fin', '$tallerista', '$capacidad', '$tipo', '$fotografia',1 , '$evento')";
      $resultado = $this->conexion_db->query($sql);
      return $resultado;
    }

    public function mostrarTaller($id){
      $resultado = $this->conexion_db->query("SELECT *
      FROM talleres
      WHERE id_taller = '$id' ");
      $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
      return $respuesta;
    }

    public function eliminarFoto($id){
      $sql = "SELECT foto FROM talleres WHERE id_taller = $id ";
      $consulta = $this->conexion_db->query($sql);
      $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
      foreach ($resultado as $valor) {
        unlink($_SERVER['DOCUMENT_ROOT']."/congresoparques/img/uploads/leon/talleres/".$valor['foto']);
      }
    }

    public function actualizar($taller, $taller_ing, $taller_port, $subtitulo, 
    $subtitulo_ing, $subtitulo_port, $fecha,
                    $inicio, $fin, $capacidad, $tallerista, $tipo,
                    $descripcion, $descripcion_ing, $descripcion_port, $fotografia, $id){

      $eliminarFoto = $this->eliminarFoto($id);

      $sql = "UPDATE talleres SET
              taller = '$taller',
              taller_ing = '$taller_ing',
              taller_port = '$taller_port',
              subtitulo = '$subtitulo',
              subtitulo_ing = '$subtitulo_ing',
              subtitulo_port = '$subtitulo_port',
              descripcion = '$descripcion',
              descripcion_ing = '$descripcion_ing',
              descripcion_port = '$descripcion_port',
              fecha = '$fecha',
              inicio = '$inicio',
              fin = '$fin',
              tallerista = '$tallerista',
              capacidad = '$capacidad',
              tipo = '$tipo',
              foto = '$fotografia'
              WHERE id_taller = '$id'
              ";
      $consultar = $this->conexion_db->query($sql);
    }

    public function actualizarSinFoto($taller, $taller_ing, $taller_port, $subtitulo, 
    $subtitulo_ing, $subtitulo_port, $fecha,
                    $inicio, $fin, $capacidad, $tallerista, $tipo,
                    $descripcion, $descripcion_ing, $descripcion_port, $id){
      $sql = "UPDATE talleres SET
              taller = '$taller',
              taller_ing = '$taller_ing',
              taller_port = '$taller_port',
              subtitulo = '$subtitulo',
              subtitulo_ing = '$subtitulo_ing',
              subtitulo_port = '$subtitulo_port',
              descripcion = '$descripcion',
              descripcion_ing = '$descripcion_ing',
              descripcion_port = '$descripcion_port',
              fecha = '$fecha',
              inicio = '$inicio',
              fin = '$fin',
              tallerista = '$tallerista',
              capacidad = '$capacidad',
              tipo = '$tipo'
              WHERE id_taller = '$id'
              ";
      $consultar = $this->conexion_db->query($sql);
    }


    public function eliminar($id){
     $sql = $this->conexion_db->query("DELETE FROM talleres
    WHERE id_taller = $id ");
     return $sql;
    }
  

}

 ?>


