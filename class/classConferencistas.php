<?php
class Conferencistas extends Conexion{
  public function __construct(){
      parent::__construct();
  }
  // public function magistrales($congreso){
  //   $sql = "SELECT * FROM conferencistas as a
  //           LEFT JOIN conferencias as b
  //           ON a.id_conferencia = b.id_conferencia
  //           WHERE b.id_tipo = 2 AND b.id_congreso = '$congreso'
  //           ORDER BY prioridad";
  //   // Ordenar por prioridad
  //   $consulta = $this->conexion_db->query($sql);
  //   $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
  //   return $resultado;
  // }

  public function magistrales($congreso){
    // $sql = "SELECT * FROM conferencistas as a
    // WHERE 	a.id_congreso = '$congreso'
    // ORDER BY prioridad";
    // Ordenar por prioridad
    //   $sql = "SELECT * FROM conferencistas as a
    // INNER JOIN conferencias as b
    // ON a.id_conferencia = b.id_conferencia
    // WHERE b.id_tipo = 2 AND b.id_congreso = '$congreso'  AND a.id_congreso ='$congreso'
    // ORDER BY prioridad";
    $sql = "SELECT * from usuarios
      LEFT JOIN usuarios_ponencias
      ON usuarios.id = usuarios_ponencias.id_usuario
      Left JOIN conferencias 
      ON usuarios_ponencias.id_ponencia = conferencias.id_ponencia
      WHERE conferencias.id_categoria = 2
      AND usuarios.id_evento = $congreso;
    ";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    return $resultado;
  }
  public function magistrales1($congreso){
    $sql = "SELECT * FROM conferencistas as a
    WHERE 	a.id_congreso = '$congreso'
     ORDER BY RAND() LIMIT 8";
    // Ordenar por prioridad
    //   $sql = "SELECT * FROM conferencistas as a
    // INNER JOIN conferencias as b
    // ON a.id_conferencia = b.id_conferencia
    // WHERE b.id_tipo = 2 AND b.id_congreso = '$congreso'  AND a.id_congreso ='$congreso'
    // ORDER BY prioridad";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    return $resultado;
  }
 public function sesionesEducativas($congreso) {
    // Usar consultas preparadas para evitar inyección SQL
    $sql = "
    SELECT DISTINCT usuarios.* 
    FROM usuarios
    LEFT JOIN usuarios_ponencias
    ON usuarios.id = usuarios_ponencias.id_usuario
    LEFT JOIN conferencias 
    ON usuarios_ponencias.id_ponencia = conferencias.id_ponencia
    LEFT JOIN ponencias 
    ON ponencias.id = conferencias.id_ponencia
    WHERE conferencias.id_categoria = 1
    AND usuarios.id_evento = ?
    AND ponencias.estatus = 1
    AND usuarios.nombres NOT LIKE 'Ejemplo congreso%'
    AND usuarios.apellido_paterno NOT LIKE '2024 Ejemplo%'
    AND usuarios.apellido_paterno NOT LIKE '2024 Ejemplo%'
    AND usuarios.nombres NOT LIKE 'Prueba 2024%'
    AND usuarios.apellido_paterno NOT LIKE 'Ejemplo%'
    AND usuarios.id != '377'
    AND usuarios.id != '381';
    AND usuarios.id != '402';
    ";

    if ($stmt = $this->conexion_db->prepare($sql)) {
        $stmt->bind_param("i", $congreso);
        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $resultado;
    } else {
        return [];
    }
}

  public function talleristas($congreso){
    $sql = "
      SELECT * from talleristas 
      WHERE id_congreso = $congreso;
    ";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    return $resultado;
  }




  
    //despliega listas de conferencistas
    public function get_usuarios($evento){
      $resultado = $this->conexion_db->query("SELECT a.id_conferencista, a.nombre, a.apellidos,
                                              a.cargo, a.empresa, a.empresa_ing, a.cargo_ing, a.pais, a.ciudad, a.foto,
                                              a.autoriza1, a.autoriza2, a.evento_social,
                                              a.id_credenciales,c.id_credenciales, c.usuario
                                              FROM conferencistas as a JOIN credenciales as c
                                              ON a.id_credenciales = c.id_credenciales
                                              WHERE a.id_congreso = '$evento'
                                              ORDER BY id_conferencista DESC");

      $usuarios = $resultado->fetch_all(MYSQLI_ASSOC);

      return $usuarios;
  }
  // public function get_usuarios(){
  //     $resultado = $this->conexion_db->query("SELECT * FROM conferencistas
  //                                             ORDER BY id_conferencista DESC");
  //
  //     $usuarios = $resultado->fetch_all(MYSQLI_ASSOC);
  //
  //     return $usuarios;
  // }

  //Validación del status de permisos (visualización en tabla)
  public function firma($firma){
    if (is_null($firma)) {
      $respuesta = "<i class='fi-alert firma_pendiente'></i>";
    } else if($firma == 0){
      $respuesta = "<i class='fi-x firma_no'></i>";
    }
    else if ($firma == "1"){
        $respuesta = "<i class='fi-checkbox firma_ok'></i>";
    }
    return $respuesta;
  }

  //registrar credencial de conferencista
  public function registroCredencial($us, $pass){
    $sql = "INSERT INTO credenciales VALUES (null, '$us', '$pass', '2' )";
    $consulta = $this->conexion_db->query($sql);
    return $consulta;
  }

  //asignar id_credenciales
  public function idCredencial(){
    $resultado = $this->conexion_db->query('SELECT max(id_credenciales) AS max_idCredencial FROM credenciales');

    $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);

    foreach ($respuesta as $valor) {
      echo $id = $valor['max_idCredencial'];
    }

    return $id;

  }

  //registro de confrencistas
  public function registroConferencista($nombre, $apellidos, $cargo = null, $cargo_ing, $cargo_port = null, $empresa = null,
                                            $empresa_ing, $empresa_port = null, $biografia = null, $biografia_ing, $biografia_port = null, $pais, $ciudad, $fotografia,
                                            $conferencia, $prioridad, $evento){

      $id_credencial = $this->idCredencial();

      // var_dump();
      // die();
      $resultado = $this->conexion_db->query("INSERT INTO conferencistas
                                              VALUES ( null, '$nombre', '$apellidos', '$cargo','$cargo_ing', '$cargo_port',
                                                '$empresa', '$empresa_ing', '$empresa_port', '$biografia', '$biografia_ing',
                                                '$biografia_port', '$pais', '$ciudad', '$fotografia',
                                                null, null, null,'$conferencia', '$id_credencial', '$prioridad', '$evento')");

      return $resultado;

  }

  //Mostrar los datos del conferencista para editar
  public function mostrarDatosEdit($id){

  $resultado = $this->conexion_db->query("SELECT a.id_conferencista, a.nombre, a.apellidos, a.cargo, a.empresa, a.biografia, a.pais,
   a.ciudad, a.foto, a.id_credenciales, a.prioridad, b.id_conferencia, b.conferencia, c.usuario, c.password
 FROM conferencistas AS a
 LEFT JOIN conferencias AS b ON b.id_conferencia = a.id_conferencia
 LEFT JOIN credenciales AS c ON c.id_credencial = a.id_credenciales
 WHERE a.id_credenciales = $id ");

   $datos = $resultado->fetch_all(MYSQLI_ASSOC);

   return $datos;

 }

//Actualizar datos del conferencista sin foto
 public function actualizarSinFoto($usuario, $nombre, $apellidos, $cargo_ing,  $empresa_ing, 
                                   $biografia_ing, $pais, $ciudad, $conferencia_ing, $id, $prioridad){

      $sql = "UPDATE conferencistas SET nombre = '$nombre',
            apellidos = '$apellidos',
            -- cargo = '$cargo',
            cargo_ing = '$cargo_ing',
            -- cargo_port = '$cargo_port',
            -- empresa = '$empresa',
            empresa_ing = '$empresa_ing',
            -- empresa_port = '$empresa_port',
            -- biografia = '$biografia',
            biografia_ing = '$biografia_ing',
            -- biografia_port = '$biografia_port',
            pais = '$pais',
            ciudad = '$ciudad',
            id_conferencia = '$conferencia_ing',
            prioridad = '$prioridad'
            WHERE id_conferencista = '$id' ";

      $resultado = $this->conexion_db->query($sql);

        if ($resultado) {
          $sql = "SELECT * FROM conferencistas WHERE id_conferencista = $id";
          $consulta = $this->conexion_db->query($sql);
          $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

          foreach ($resultado as $valor) {
            $credencial = $valor['id_credenciales'];
          }
          $sql = "UPDATE credenciales SET
                  usuario = '$usuario'
                  WHERE id_credenciales = $credencial";

          $consulta = $this->conexion_db->query($sql);


            return true;
        }
        else{
          $error = "No pudimos realizar la actualización";
          return $error;
        }

            return false;

  }

  public function eliminarFoto($id){
    $sql = "SELECT foto FROM conferencistas WHERE id_conferencista = $id ";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    foreach ($resultado as $valor) {
      unlink("./../../img/uploads/".$valor['foto']);
    }

  }

  //Actualizar datos del conferencista con foto nueva
   public function actualizarConferencista($usuario, $nombre, $apellidos, $cargo_ing, $empresa_ing, 
                                     $biografia_ing,  $pais, $ciudad, $fotografia, $conferencia, $id, $prioridad){
        
      $this->eliminarFoto($id);

        $sql = "UPDATE conferencistas SET nombre = '$nombre',
              apellidos = '$apellidos',
              -- cargo = '$cargo',
              cargo_ing = '$cargo_ing',
              -- cargo_port = '$cargo_port',
              -- empresa = '$empresa',
              empresa_ing = '$empresa_ing',
              -- empresa_port = '$empresa_port',
              -- biografia = '$biografia',
              biografia_ing = '$biografia_ing',
              -- biografia_port = '$biografia_port',
              pais = '$pais',
              ciudad = '$ciudad',
              foto = '$fotografia',
              id_conferencia = '$conferencia',
              prioridad = '$prioridad'
              WHERE id_conferencista = '$id' ";

              $resultado = $this->conexion_db->query($sql);

                if ($resultado) {
                  $sql = "SELECT * FROM conferencistas WHERE id_conferencista = $id";
                  $consulta = $this->conexion_db->query($sql);
                  $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

                  foreach ($resultado as $valor) {
                    $credencial = $valor['id_credenciales'];
                  }
                  $sql = "UPDATE credenciales SET
                          usuario = '$usuario'
                          WHERE id_credenciales = $credencial";

                  $consulta = $this->conexion_db->query($sql);


                    return true;
                }
                else{
                  $error = "No pudimos realizar la actualización";
                  return $error;
                }
      }

 // Eliminar conferencista
  public function eliminar($id){

    $sql = $this->conexion_db->query("DELETE FROM conferencistas WHERE id_conferencista = $id ");

    return $sql;

  }

  //Firma términos
  public function comprobarFirma($id){

   $sql = $this->conexion_db->query("SELECT * FROM conferencistas
                                   WHERE autoriza1 IS NOT NULL
                                    AND  id_conferencista = $id ");

   $resultado = $sql->fetch_all(MYSQLI_ASSOC);

   return $resultado;

 }

 public function firmar($id, $firma1, $firma2){

      $sql = $this->conexion_db->query("UPDATE conferencistas SET
                              autoriza1 = $firma1,
                              autoriza2 = $firma2
                              WHERE id_conferencista = $id ");
      return $sql;

    }


    public function datosConferencia($id){
      $sql = $this->conexion_db->query("SELECT *
                                    FROM conferencistas
                                    LEFT JOIN conferencias
                                    ON conferencia.id_conferencia = conferencistas.id_conferencia
                                    LEFT JOIN temas ON temas.id_tema = conferencia.id_tema
                                    WHERE conferencistas.id_conferencista = $id");
        $resultado = $sql->fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }

    public function comprobarFiesta($id){
    $sql = "SELECT * FROM conferencistas
            WHERE evento_social IS NOT NULL
            AND id_conferencista = $id";
    $ejecutar = $this->conexion_db->query($sql);
    $resultado = $ejecutar->fetch_all(MYSQLI_ASSOC);

    return $resultado;
  }
  
}

 ?>
