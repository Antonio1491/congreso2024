<?php

class Registro extends Database
{
  public function __construct()
  {
       parent::__construct();
  }

  public function savePonencia($modalidad, $titulo, $subtitulo, $tema, $descripcion, $justificacion, 
  $objetivos , $recursos, $evento)
  {
    //  var_dump($modalidad, $titulo, $subtitulo, $tema, $descripcion, $justificacion, 
    //  $objetivos , $recursos, $evento);
    $query = "INSERT INTO ponencias 
              (id, titulo, subtitulo, descripcion, fecha, hora_inicio, hora_fin, estatus, id_tema, ubicacion, id_modalidad, registro, id_evento )
              VALUES (null, '$titulo', '$subtitulo', '$descripcion',
              NULL, NULL, NULL, 0, '$tema', null, '$modalidad', NOW(), $evento )
              ";
    $ejecutar = $this->conexion->query($query);
    // var_dump($ejecutar);
    // die();
    //consultar ID de la sesión recientemente guardada
    $query = "SELECT id FROM ponencias ORDER BY id DESC LIMIT 1";
    $ejecutar = $this->conexion->query($query);
    
    $resultado =mysqli_fetch_assoc($ejecutar);
    //forma correcta de trabajar ^
    // var_dump($tresultado);
    $id = $resultado['id'];
    // var_dump($id);
    if($ejecutar){
      
      return $this->saveConferencia($id, $justificacion, $objetivos, $recursos);

    }
    else{
      echo "Error al guardar ponencia";
    }
              
  }

  public function saveConferencia($id, $justificacion, $objetivos, $recursos)
  {
    //   var_dump($id, $justificacion, $objetivos, $recursos);
    $query = "INSERT INTO conferencias 
              (id, id_ponencia, justificacion, objetivos, recursos, id_categoria )
              VALUES (null, '$id', '$justificacion', '$objetivos', '$recursos', 1)
              ";
      $ejecutar = $this->conexion->query($query);
      if($ejecutar){
        return $id;
      }
      else{
        echo "Error al guardar conferencia";
      }

  }

  public function saveUsuario($array, $nombre, $apellidoPaterno, $apellidoMaterno, $email,
  $emailAlternativo, $telefono, $telefonoAlternativo, $cargo, $empresa,
  $pais, $estado, $ciudad, $biografia, $nombre_foto,
  $tipo_foto, $temporal_foto, $id_ponencia, $evento)
  {

    for ($i=0; $i < $array ; $i++){
      $query = " INSERT INTO usuarios 
              (id, nombres, apellido_paterno, apellido_materno, email, password, email_alternativo, 
              telefono, telefono_alternativo, cargo, empresa, pais, estado, ciudad, biografia,
              fotografia, fecha_registro, estatus, id_categoria, id_evento, modificacion)
              VALUES (null, '$nombre[$i]', '$apellidoPaterno[$i]', '$apellidoMaterno[$i]', '$email[$i]', null, '$emailAlternativo[$i]',
              null, null, '$cargo[$i]', '$empresa[$i]', '$pais[$i]', '$estado[$i]', '$ciudad[$i]', '$biografia[$i]',
              '$nombre_foto[$i]', NOW(), 0, 5, $evento, NOW())";
              
      $ejecutar =  $this->conexion->query($query);

      //Directorio para guardar las imagenes
      $destino_foto = $_SERVER['DOCUMENT_ROOT'].'/imagenes/';

      if ($ejecutar)
      {
        move_uploaded_file($temporal_foto[$i], $destino_foto.$nombre_foto[$i]);
        $query = "SELECT id FROM usuarios ORDER BY id DESC LIMIT 1";
        $ejecutar = $this->conexion->query($query);
        $resultado =mysqli_fetch_assoc($ejecutar);
        $id_usuario = $resultado['id'];

        $sql = "INSERT INTO usuarios_ponencias (id_usuario, id_ponencia) 
                VALUES ('$id_usuario','$id_ponencia')";
        $ejecutar =  $this->conexion->query($sql);

        return $ejecutar;
      }
    }

    return $ejecutar;

  }

  // Pósters 
  public function savePoster($nombre_proyecto, $tema, $categoria, $documento,
                  $temporal_documento, $poster, $temporal_poster, $recursos, $evento)
  {

    $query = "INSERT INTO posters (id, nombre, documento, poster, recursos, id_tema, id_categoria, id_evento)
              VALUES (null, '$nombre_proyecto', '$documento', '$poster', '$recursos', '$tema', '$categoria', '$evento')";
    
    $ejecutar = $this->conexion->query($query);

    if($ejecutar)
    {
      //Directorio para guardar los archivos
      $destino_archivos = $_SERVER['DOCUMENT_ROOT'].'/docs/';
      move_uploaded_file($temporal_documento, $destino_archivos.$documento);
      move_uploaded_file($temporal_poster, $destino_archivos.$poster);
    }
    else 
    {
      return false;
    }

    //consultar ID de póster recientemente guardado
    $query = "SELECT id FROM posters ORDER BY id DESC LIMIT 1";
    $ejecutar = $this->conexion->query($query);
     $resultado =mysqli_fetch_assoc($ejecutar);
    $id = $resultado['id'];

    if($ejecutar){
      return $id;
    }
    else{
      return false;
    }


  }

  public function saveUsuarioPoster($array, $nombre, $apellidoPaterno, $apellidoMaterno, $email,
                                    $emailAlternativo, $telefono, $cargo, $empresa,
                                    $pais, $ciudad, $id_poster, $evento)
  {
    for ($i=0; $i < $array ; $i++){
      $query = " INSERT INTO usuarios 
              (id, nombres, apellido_paterno, apellido_materno, email, password, email_alternativo, 
              telefono, telefono_alternativo, cargo, empresa, pais, estado, ciudad, biografia,
              fotografia, fecha_registro, estatus, id_categoria, id_evento, modificacion)
              VALUES (null, '$nombre[$i]', '$apellidoPaterno[$i]', '$apellidoMaterno[$i]', '$email[$i]', null, '$emailAlternativo[$i]', '$telefono[$i]', null, '$cargo[$i]', '$empresa[$i]', '$pais[$i]', null, '$ciudad[$i]', null, null, NOW(), 0, 5, $evento, NOW())";
              
      $ejecutar =  $this->conexion->query($query);

      //Directorio para guardar las imagenes
      $destino_foto = $_SERVER['DOCUMENT_ROOT'].'/imagenes/';

      if ($ejecutar){
          
        // move_uploaded_file($temporal_foto[$i], $destino_foto.$nombre_foto[$i]);
        
        $query = "SELECT id FROM usuarios ORDER BY id DESC LIMIT 1";
        $ejecutar = $this->conexion->query($query);
        $resultado =mysqli_fetch_assoc($ejecutar);
        $id_usuario = $resultado['id'];

        $sql = "INSERT INTO usuarios_posters (id_usuario, id_poster) 
                VALUES ('$id_usuario','$id_poster')";
        $ejecutar =  $this->conexion->query($sql);

        return $ejecutar;
      }
    }

    return $ejecutar;

  }


  public function temas(){
    $sql = "SELECT * FROM temas";
    $resultado = $this->conexion->query($sql);
    $temas = $resultado->fetch_all(MYSQLI_ASSOC);
    
    return $temas;
  }
  

}

?>