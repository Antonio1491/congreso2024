<?php
class Usuario extends Conexion
{
  public $usuario;
  public $password;
  public $fotografia;
  public $tipo;
  public $nombre;
  public $apellidos;

  public function __construct()
  {
    parent::__construct();
  }

  public function all($congreso)
  {

      $sql = "SELECT *
        FROM credenciales AS combinacion";
      
      $resultado = $this->conexion_db->query($sql);

      $data = $resultado->fetch_all(MYSQLI_ASSOC);

    return json_encode($data);

  }

  public function usuariosAsignados($idCongreso)
  {
    $sql = "SELECT * FROM credencial_congreso WHERE id_congreso = '$idCongreso'";

    $resultado = $this->conexion_db->query($sql);

    $data = $resultado->fetch_all(MYSQLI_ASSOC);

    return json_encode($data);
    
  }

  public function tipoUsuario()
  {
    //Despliega los diferentes dipos de usuario que puede dar de alta un administrdor
    $sql = "SELECT * FROM tipo_credenciales WHERE id_tipo != 0 ";

    $resultado = $this->conexion_db->query($sql);

    $data = $resultado->fetch_all(MYSQLI_ASSOC);

    return json_encode($data);
  }

  public function agregarUsuario(
    $nombre, 
    $apellidos, 
    $usuario, 
    $password, 
    $tipo, 
    $congreso,
    $temas)
  {
    

    $sql = "INSERT INTO credenciales VALUES(
      null, 
      '$nombre', 
      '$apellidos', 
      '$usuario', 
      '$password',
      null,
      '$tipo'
    )";

    $resultado = $this->conexion_db->query($sql);
    
    if( $resultado && !empty($temas))
    {
      //consultar el id_credencial del nuevo usuario
      $sql ="SELECT id_credencial FROM credenciales ORDER BY id_credencial DESC LIMIT 1";
      $result = $this->conexion_db->query($sql);
      $idCredencial = $result->fetch_all(MYSQLI_ASSOC);
      $idCredencial = $idCredencial[0]['id_credencial'];

      foreach($temas as $key => $value)
      {
        
      $sql = "INSERT INTO comite_tema 
              VALUES (NULL,'$idCredencial', '$value', '$congreso')" ;

      $resultado = $this->conexion_db->query($sql);

      }

  

    }
    if($resultado){
        return true;

    }else{
        return false;
    }


    
  }

  //Método que válida el formato de una imagen
  public function validarImg($type, $size)
  {
    if(($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png") && ($size < 5000000))
    {
      return true;
    }
    return false;
  }

  public function saveFotografia($img)
  {
    $random=bin2hex(random_bytes(2));  //generar cadena random de 4 caracteres 
    $imgNameFormat = $random."-".mb_strtolower(str_replace(' ', '-', $img["name"]));

    if($this -> validarImg($img["type"], $img["size"]))
    {
      //directorio servidor
      // $dir = $_SERVER['DOCUMENT_ROOT'].'/cpanel/img/';
      //directorio local
      $dir = __DIR__.'/../../img/';

      if(move_uploaded_file($img["tmp_name"], $dir.$imgNameFormat))
      {
        return $imgNameFormat;
      }

    }
    return false;
  }


  /* Método que identifica los congresos del usuario */
  public function congresosByUsuario($idCredencial)
  {
    $sql = "SELECT * FROM credencial_congreso 
      JOIN congresos 
      ON credencial_congreso.id_congreso = congresos.id_congreso
      WHERE credencial_congreso.id_credencial = '$idCredencial' ";

    $resultado = $this->conexion_db->query($sql);

    $data = $resultado->fetch_all(MYSQLI_ASSOC);
    // var_dump($data);

    return json_encode($data);

  }



}


?>