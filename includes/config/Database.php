<?php
 DEFINE ('DB_USUARIO', 'root');
  //DEFINE ('DB_USUARIO', 'u951310947_sistemas');

   DEFINE('DB_CONTRASENA', 'root');
  //DEFINE('DB_CONTRASENA', 'Anpr2023*');

  DEFINE ('DB_NOMBRE', 'u951310947_congreso2023');

   DEFINE ('DB_SERVER', 'localhost');
  //DEFINE ('DB_SERVER', 'localhost');

  DEFINE ('DB_CHARSET', 'UTF8');

class Database{
    
  protected $conexion;

  public function __construct(){
    $this->conexion = new mysqli(DB_SERVER, DB_USUARIO, DB_CONTRASENA, DB_NOMBRE);
    if ($this->conexion->connect_errno) {
      echo "Error al conectar MySql" . $this->conexion->connect_error;
      exit();
      }
      $this->conexion->set_charset(DB_CHARSET);
    //   echo "Connected successfully";
  }
}


?>