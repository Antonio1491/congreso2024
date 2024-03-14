<?php
class Temas extends Conexion{
  public function __construct(){
      parent::__construct();
  }
  public function listaTemas(){
    $sql = "SELECT * FROM temas WHERE id_tema > 1";
    $resultado = $this->conexion_db->query($sql);
    $talleres = $resultado->fetch_all(MYSQLI_ASSOC);
    return $talleres;
  }
}




 ?>
