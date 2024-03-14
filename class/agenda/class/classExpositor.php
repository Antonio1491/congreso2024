<?php



class Expositor extends Conexion{


    // public $expositor = "";
    public function __construct(){
      parent::__construct();
  }


public function guardarDatosExpositor($nombre,$representante,$correo_exp, $congreso){
    
    $sql = "INSERT INTO expositores VALUES(null, '$nombre','$representante','$correo_exp',null, null,'$congreso')";
    $registrar_miembro = $this->conexion_db->query($sql);
    return $registrar_miembro;
}



}

?>