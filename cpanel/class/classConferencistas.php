<?php
class Conferencistas extends Conexion{   //utilizar variables y métodos dentro la clase conexión

  public function __construct(){

      parent::__construct();

  }
  public function guardarDocumentos($archivo,$video1,$video2,$video3,$id_credencial){
    $sql = "SELECT * FROM conferencistas WHERE id_credenciales = $id_credencial ";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

    $id_conf = $resultado[0]['id_conferencista'];
    $link1 = !empty($video1) ? "'$video1'" : "NULL";
    $link2 = !empty($video2) ? "'$video2'" : "NULL";
    $link3 = !empty($video3) ? "'$video3'" : "NULL";

    $sql1 = "INSERT INTO material_conferencia VALUES (null,'$archivo', $link1 ,$link2, $link3, '$id_conf')";
    $consulta1 = $this->conexion_db->query($sql1);

    return $consulta1;


  }
    public function validarDocumentos($id_credencial){

    $sql = "SELECT * FROM conferencistas WHERE id_credenciales = '$id_credencial' ";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

    $id_conf = $resultado[0]['id_conferencista'];

    $sql1 = "SELECT * FROM material_conferencia WHERE id_conferencista = '$id_conf' ";
    $consulta1 = $this->conexion_db->query($sql1);
    $resultado1 = $consulta1->fetch_all(MYSQLI_ASSOC);


    if(!empty($resultado1)){
      return true;
    }else{
      return false;
    }

  }

  public function validarImg($type, $size)
  {

    if(($type == "application/ppt" || $type == "application/pdf") && ($size < 105906176))
    {
     
      return true;

    }

    return false;

  }

  //Método setea el nombre de la imagen y la válida devolviendo el nuevo nombre
  public function setImg($img, $size, $type)
  {
    
    $random=bin2hex(random_bytes(2));  //generar cadena random de 4 caracteres 

    $imgName = "wup-".$random."-".mb_strtolower(str_replace(' ', '-', $img));

   if($this -> validarImg($type, $size))
   {

    return $imgName;

   }

   return false;

  }

  public function guardarImg($img, $tmp_name)
  {

    $dir = $_SERVER['DOCUMENT_ROOT'].'/congreso2023_convocatorias/imagenes/';

    // var_dump($dir);
    // var_dump($img);

    if(move_uploaded_file($tmp_name, $dir."/".$img))
    {
      return true;
    }

    return false;

  }

  //despliega listas de conferencistas
  public function get_usuarios($evento)
  {

      $resultado = $this->conexion_db->query("SELECT * FROM usuarios_ponencias as up
      LEFT JOIN ponencias ON up.id_ponencia = ponencias.id
      LEFT JOIN usuarios as u ON up.id_usuario = u.id
      WHERE ponencias.estatus = '1' 
      AND u.id_categoria = '2' 
      AND u.id_evento = $evento
      ORDER BY u.id DESC");

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
  public function registroCredencial($nombre, $us, $pass){
    $sql = "INSERT INTO credenciales VALUES (null,'$nombre', null ,'$us', '$pass', null, 2 )";
    $consulta = $this->conexion_db->query($sql);
    return $consulta;
  }

  //asignar id_credenciales
  public function idCredencial(){
    $resultado = $this->conexion_db->query('SELECT max(id_credencial) AS max_idCredencial FROM credenciales');

    $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);

    foreach ($respuesta as $valor) {
      echo $id = $valor['max_idCredencial'];
    }

    return $id;

  }

  //registro de confrencistas
  public function registroConferencista($email, $password, $nombres, $apellido_paterno, $apellido_materno, $cargo, $empresa,
                                          $pais, $ciudad, $estado, $conferencia, $fotografia, $biografia,
                                          $evento){

      // $id_credencial = $this->idCredencial();
      $resultado = $this->conexion_db->query("INSERT INTO usuarios
                                              VALUES ( null, '$nombres', '$apellido_paterno', '$apellido_materno',
                                                '$email', '$password', null, null, null, '$cargo', '$empresa',  
                                                '$pais', '$estado', '$ciudad', '$biografia', '$fotografia',                                                
                                                now(), 1, 2,'$evento', now() )");

      if($resultado)
      {
        $sql = "SELECT id FROM usuarios ORDER BY id DESC LIMIT 1 ";

        $resultado = $this->conexion_db->query($sql);

        $data = $resultado->fetch_all(MYSQLI_ASSOC);

        $id_usuario = $data[0]['id'];

        // var_dump($id_usuario);
        // exit();

        if($resultado)
        {

          //registrar usuarios_ponencias
          $sql = "INSERT INTO usuarios_ponencias (id_usuario, id_ponencia) 
                  VALUES ('$id_usuario','$conferencia')";

          $ejecutar =  $this->conexion_db->query($sql);
          
          return true;

        }

      }

      else{
        return false;
      }

      return false;

  }

  //Mostrar los datos del conferencista para editar
  public function mostrarDatosEdit($id){

  $resultado = $this->conexion_db->query("SELECT * FROM `usuarios_ponencias` as g
  LEFT JOIN usuarios as u ON g.id_usuario = u.id
  RIGHT JOIN ponencias as p ON g.id_ponencia = p.id
  WHERE g.id_usuario =  '$id' ");

  $datos = $resultado->fetch_all(MYSQLI_ASSOC);

  return $datos;

 }

//Actualizar datos del conferencista sin foto
 public function actualizarSinFoto($usuario, $password, $nombres, $apellido_paterno,$apellido_materno,$cargo, $empresa, $biografia, $pais, $ciudad, $conferencia, $id){

      $sql = "UPDATE usuarios SET 
            nombres = '$nombres',
            apellido_paterno = '$apellido_paterno',
            apellido_materno = '$apellido_materno',
            email = '$usuario',
            password = '$password',
            cargo = '$cargo',
            empresa = '$empresa',
            biografia = '$biografia',
            pais = '$pais',
            ciudad = '$ciudad',
            -- id_conferencia = '$conferencia',
            modificacion = now()
            WHERE id = $id ";

      $resultado = $this->conexion_db->query($sql);

        if ($resultado) {

          $sql = "UPDATE usuarios_ponencias SET
                  id_ponencia = '$conferencia'
                  WHERE id_usuario = $id";

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
    $sql = "SELECT fotografia FROM usuarios WHERE id = $id ";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    foreach ($resultado as $valor) {
      //Producción 
      unlink($_SERVER['DOCUMENT_ROOT']."/imagenes/".$valor['fotografia']);

      //Local
      // unlink($_SERVER['DOCUMENT_ROOT']."/congreso2024/imagenes/".$valor['fotografia']);
    }

  }

  //Actualizar datos del conferencista con foto nueva
  public function actualizarConferencista($usuario, $password, $nombres, $apellido_paterno, $apellido_materno, $cargo, $empresa, $biografia, $pais, $ciudad, $conferencia, $id, $fotografia){
        $eliminarFoto = $this->eliminarFoto($id);

        $sql = "UPDATE usuarios SET  
            nombres = '$nombres',
            apellido_paterno = '$apellido_paterno',
            apellido_materno = '$apellido_materno',
            email = '$usuario',
            password = '$password',
            cargo = '$cargo',
            empresa = '$empresa',
            biografia = '$biografia',
            fotografia = '$fotografia',
            pais = '$pais',
            ciudad = '$ciudad',
            modificacion = now()
            WHERE id = $id ";

              $resultado = $this->conexion_db->query($sql);

              if ($resultado) {

                $sql = "UPDATE usuarios_ponencias SET
                        id_ponencia = '$conferencia'
                        WHERE id_usuario = $id";
      
                $consulta = $this->conexion_db->query($sql);
      
      
                  return true;
              }
              else{
                $error = "No pudimos realizar la actualización";
                return $error;
              }
      
                  return false;
      }

 // Eliminar conferencista
  public function eliminar($id){

    $sql = "SELECT fotografia FROM usuarios WHERE id = $id ";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    foreach ($resultado as $valor) {
      // $destino= $_SERVER['DOCUMENT_ROOT'].'/congreso2024/imagenes/' ;
      //Producción 
      unlink($_SERVER['DOCUMENT_ROOT']."/imagenes/".$valor['fotografia']);
      //Local
      // unlink($_SERVER['DOCUMENT_ROOT']."/congreso2024/imagenes/".$valor['fotografia']);
    }

    $sql = $this->conexion_db->query("DELETE FROM usuarios WHERE id = $id ");

    return $sql;

  }

  //Firma términos
  public function comprobarFirma($id){

   $sql = $this->conexion_db->query("SELECT * FROM conferencistas
                                   WHERE autoriza1 IS NOT NULL
                                    AND  id_credenciales = $id ");

   $resultado = $sql->fetch_all(MYSQLI_ASSOC);

   return $resultado;

 }

 public function firmar($id, $firma1, $firma2){

      $sql = $this->conexion_db->query("UPDATE conferencistas SET
                              autoriza1 = $firma1,
                              autoriza2 = $firma2
                              WHERE id_credenciales = $id ");
      return $sql;

    }


    public function datosConferencia($id){
      $sql = $this->conexion_db->query("SELECT *
FROM conferencistas
LEFT JOIN conferencias
ON conferencias.id_conferencia = conferencistas.id_conferencia
LEFT JOIN temas ON temas.id_tema = conferencias.id_tema
WHERE conferencistas.id_credenciales = '$id'");
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
