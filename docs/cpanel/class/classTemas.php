<?php
class Tema extends Conexion{

    public function __construct(){

      parent::__construct();

    }

    public function listaTemas(){
      $sql = "SELECT * FROM temas";
      $resultado = $this->conexion_db->query($sql);
      $talleres = $resultado->fetch_all(MYSQLI_ASSOC);
      
      return $talleres;
    }
    public function listaTemasUsuario($id){
      $sql = "SELECT * FROM temas";
      $resultado = $this->conexion_db->query($sql);
      $talleres = $resultado->fetch_all(MYSQLI_ASSOC);
      
      echo json_encode($talleres);
    }
    public function temasCongreso($evento){
      $sql = "SELECT * FROM temas_congreso 
      LEFT JOIN temas ON temas_congreso.tema = temas.id_tema 
      WHERE temas_congreso.congreso = '$evento' ";
      $resultado = $this->conexion_db->query($sql);
      $temas = $resultado->fetch_all(MYSQLI_ASSOC);
      return $temas;
    }

    public function registrarTema($tema,
                    $descripcion, $icono){
      $sql = "INSERT INTO temas VALUES
      (null,'$tema',  '$descripcion', '$icono')";
      $resultado = $this->conexion_db->query($sql);
      return $resultado;
    }

    public function mostrarTema($id){
      $resultado = $this->conexion_db->query("SELECT *
      FROM temas
      WHERE id = '$id' ");
      $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
      return $respuesta;
    }

    public function eliminarFoto($id){
      $sql = "SELECT icono FROM temas WHERE id = $id ";
      $consulta = $this->conexion_db->query($sql);
      $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
      foreach ($resultado as $valor) {
        unlink("imagenes/".$valor['icono']);
      }
    }


    public function actualizar($tema,
                    $descripcion,  $icono, $id){

      $eliminarFoto = $this->eliminarFoto($id);

      $sql = "UPDATE temas SET
              tema = '$tema',
              descripcion = '$descripcion',
              icono = '$icono'
              WHERE id = '$id'
              ";
      $consultar = $this->conexion_db->query($sql);
    }

    public function actualizarSinFoto($tema,
                    $descripcion, $id){
      $sql = "UPDATE temas SET
      tema = '$tema',
      descripcion = '$descripcion'
      WHERE id = '$id'
              ";
      $consultar = $this->conexion_db->query($sql);
    }

    public function eliminar($id){
     $sql = $this->conexion_db->query("DELETE FROM temas
    WHERE id = '$id' ");
     return $sql;
    }

  }

 ?>
