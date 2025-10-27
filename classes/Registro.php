<?php

class Registro extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  /* ===========================
     1) GUARDAR PONENCIA
     =========================== */
  public function savePonencia($modalidad, $titulo, $subtitulo, $tema, $descripcion, $justificacion,
                               $objetivos , $recursos, $evento)
  {
    // Inserta ponencia
    $q = "INSERT INTO ponencias 
          (id, titulo, subtitulo, descripcion, fecha, hora_inicio, hora_fin, estatus, id_tema, ubicacion, id_modalidad, registro, id_evento )
          VALUES (NULL, 
            '".$this->conexion->real_escape_string($titulo)."',
            '".$this->conexion->real_escape_string($subtitulo)."',
            '".$this->conexion->real_escape_string($descripcion)."',
            NULL, NULL, NULL, 0,
            '".$this->conexion->real_escape_string($tema)."',
            NULL,
            '".$this->conexion->real_escape_string($modalidad)."',
            NOW(),
            ".intval($evento)."
          )";

    $ok = $this->conexion->query($q);
    if (!$ok) {
      echo "Error al guardar ponencia";
      return false;
    }

    // ID recién insertado
    $id = $this->conexion->insert_id;

    // Inserta detalle de conferencia
    return $this->saveConferencia($id, $justificacion, $objetivos, $recursos);
  }

  public function saveConferencia($id, $justificacion, $objetivos, $recursos)
  {
    $q = "INSERT INTO conferencias 
          (id, id_ponencia, justificacion, objetivos, recursos, id_categoria )
          VALUES (NULL, ".intval($id).", 
            '".$this->conexion->real_escape_string($justificacion)."',
            '".$this->conexion->real_escape_string($objetivos)."',
            '".$this->conexion->real_escape_string($recursos)."',
            1
          )";
    $ok = $this->conexion->query($q);
    if ($ok) {
      return $id;
    } else {
      echo "Error al guardar conferencia";
      return false;
    }
  }

  /* ===========================
     2) GUARDAR USUARIOS (PONENTES)
     =========================== */
  public function saveUsuario($array, $nombre, $apellidoPaterno, $apellidoMaterno, $email,
                              $emailAlternativo, $telefono, $telefonoAlternativo, $cargo, $empresa,
                              $pais, $estado, $ciudad, $biografia, $nombre_foto,
                              $tipo_foto, $temporal_foto, $id_ponencia, $evento)
  {
    $destino_foto = $_SERVER['DOCUMENT_ROOT'].'/imagenes/';
    if (!is_dir($destino_foto)) {
      @mkdir($destino_foto, 0775, true);
    }

    $todoOk = true;
    $this->conexion->begin_transaction();

    for ($i = 0; $i < $array; $i++) {

      $q = "INSERT INTO usuarios 
            (id, nombres, apellido_paterno, apellido_materno, email, password, email_alternativo, 
             telefono, telefono_alternativo, cargo, empresa, pais, estado, ciudad, biografia,
             fotografia, fecha_registro, estatus, id_categoria, id_evento, modificacion)
            VALUES (
              NULL,
              '".$this->conexion->real_escape_string($nombre[$i])."',
              '".$this->conexion->real_escape_string($apellidoPaterno[$i])."',
              '".$this->conexion->real_escape_string($apellidoMaterno[$i])."',
              '".$this->conexion->real_escape_string($email[$i])."',
              NULL,
              '".$this->conexion->real_escape_string($emailAlternativo[$i])."',
              ".(isset($telefono[$i]) ? "'".$this->conexion->real_escape_string($telefono[$i])."'" : "NULL").",
              ".(isset($telefonoAlternativo[$i]) ? "'".$this->conexion->real_escape_string($telefonoAlternativo[$i])."'" : "NULL").",
              '".$this->conexion->real_escape_string($cargo[$i])."',
              '".$this->conexion->real_escape_string($empresa[$i])."',
              '".$this->conexion->real_escape_string($pais[$i])."',
              '".$this->conexion->real_escape_string($estado[$i])."',
              '".$this->conexion->real_escape_string($ciudad[$i])."',
              '".$this->conexion->real_escape_string($biografia[$i])."',
              '".$this->conexion->real_escape_string($nombre_foto[$i])."',
              NOW(), 0, 5, ".intval($evento).", NOW()
            )";

      $ok = $this->conexion->query($q);
      if (!$ok) { $todoOk = false; break; }

      if (!empty($temporal_foto[$i])) {
        @move_uploaded_file($temporal_foto[$i], $destino_foto.$nombre_foto[$i]);
      }

      $id_usuario = $this->conexion->insert_id;

      $rel = "INSERT INTO usuarios_ponencias (id_usuario, id_ponencia) 
              VALUES (".intval($id_usuario).", ".intval($id_ponencia).")";
      $okRel = $this->conexion->query($rel);
      if (!$okRel) { $todoOk = false; break; }
    }

    if ($todoOk) {
      $this->conexion->commit();
      return true;
    } else {
      $this->conexion->rollback();
      return false;
    }
  }

  /* ===========================
     3) GUARDAR POSTER
     =========================== */
  public function savePoster($nombre_proyecto, $tema, $categoria, $documento,
                             $temporal_documento, $poster, $temporal_poster,
                             $recursos, $evento)
  {
    $q = "INSERT INTO posters (id, nombre, documento, poster, recursos, id_tema, id_categoria, id_evento)
          VALUES (
            NULL,
            '".$this->conexion->real_escape_string($nombre_proyecto)."',
            '".$this->conexion->real_escape_string($documento)."',
            '".$this->conexion->real_escape_string($poster)."',
            '".$this->conexion->real_escape_string($recursos)."',
            '".$this->conexion->real_escape_string($tema)."',
            '".$this->conexion->real_escape_string($categoria)."',
            '".intval($evento)."'
          )";

    $ok = $this->conexion->query($q);

    if (!$ok) {
      echo "Error al guardar póster.";
      return false;
    }

    // Mover PDFs a /docs/
    $destino = $_SERVER['DOCUMENT_ROOT'].'/docs/';
    if (!is_dir($destino)) {
      @mkdir($destino, 0775, true);
    }

    @move_uploaded_file($temporal_documento, $destino.$documento);
    @move_uploaded_file($temporal_poster, $destino.$poster);

    return $this->conexion->insert_id;
  }

  /* ===========================
     4) GUARDAR USUARIOS DE POSTER
     =========================== */
  public function saveUsuarioPoster($array, $nombre, $apellidoPaterno, $apellidoMaterno, $email,
                                    $emailAlternativo, $telefono, $cargo, $empresa,
                                    $pais, $ciudad, $id_poster, $evento)
  {
    $todoOk = true;
    $this->conexion->begin_transaction();

    for ($i = 0; $i < $array; $i++) {
      $q = "INSERT INTO usuarios 
            (id, nombres, apellido_paterno, apellido_materno, email, password, email_alternativo, 
             telefono, telefono_alternativo, cargo, empresa, pais, estado, ciudad, biografia,
             fotografia, fecha_registro, estatus, id_categoria, id_evento, modificacion)
            VALUES (
              NULL,
              '".$this->conexion->real_escape_string($nombre[$i])."',
              '".$this->conexion->real_escape_string($apellidoPaterno[$i])."',
              '".$this->conexion->real_escape_string($apellidoMaterno[$i])."',
              '".$this->conexion->real_escape_string($email[$i])."',
              NULL,
              '".$this->conexion->real_escape_string($emailAlternativo[$i])."',
              ".(isset($telefono[$i]) ? "'".$this->conexion->real_escape_string($telefono[$i])."'" : "NULL").",
              NULL,
              '".$this->conexion->real_escape_string($cargo[$i])."',
              '".$this->conexion->real_escape_string($empresa[$i])."',
              '".$this->conexion->real_escape_string($pais[$i])."',
              NULL,
              '".$this->conexion->real_escape_string($ciudad[$i])."',
              NULL,
              NULL,
              NOW(), 0, 5, ".intval($evento).", NOW()
            )";

      $ok = $this->conexion->query($q);
      if (!$ok) { $todoOk = false; break; }

      $id_usuario = $this->conexion->insert_id;

      $rel = "INSERT INTO usuarios_posters (id_usuario, id_poster) 
              VALUES (".intval($id_usuario).", ".intval($id_poster).")";
      $okRel = $this->conexion->query($rel);
      if (!$okRel) { $todoOk = false; break; }
    }

    if ($todoOk) {
      $this->conexion->commit();
      return true;
    } else {
      $this->conexion->rollback();
      return false;
    }
  }

  /* ===========================
     5) Catálogo de temas
     =========================== */
  public function temas(){
    $sql = "SELECT * FROM temas";
    $resultado = $this->conexion->query($sql);
    $temas = $resultado->fetch_all(MYSQLI_ASSOC);
    return $temas;
  }
}

?>