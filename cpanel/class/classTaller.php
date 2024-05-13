<?php
class Taller extends Conexion{

    public function __construct(){

      parent::__construct();

    }


    public function listaTalleres(){
      $sql = "SELECT * FROM talleres ORDER BY id_taller DESC";
      $resultado = $this->conexion_db->query($sql);
      $talleres = $resultado->fetch_all(MYSQLI_ASSOC);
      return $talleres;
    }
    public function talleristas($id_congreso){
      $sql = "SELECT * FROM talleristas WHERE id_congreso = '$id_congreso' ";
      $resultado = $this->conexion_db->query($sql);
      $talleristas = $resultado->fetch_all(MYSQLI_ASSOC);
      return $talleristas;
    }

  //Taller
    public function registrarTaller($titulo,
                    $subtitulo, $fecha,
                    $inicio, $fin, $capacidad, $categoria,
                     $descripcion, $fotografia, $evento){

      $sql = "INSERT INTO talleres VALUES
      (null, '$titulo','$subtitulo', '$descripcion',
      '$fecha', '$inicio', '$fin', '$capacidad', '$categoria', '$fotografia',1, $evento )";
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

      foreach ($resultado as $valor) 
      {
        // unlink($_SERVER['DOCUMENT_ROOT']."/build/img/".$valor['foto']);

        //servidor local
        unlink($_SERVER['DOCUMENT_ROOT']."/congreso2024/imagenes/".$valor['foto']);

      }
    }

    public function actualizarTaller($taller, $subtitulo, $fecha, $inicio, $fin, $capacidad, $tipo, $descripcion, $fotografia, $id){

      $eliminarFoto = $this->eliminarFoto($id);

      $sql = "UPDATE talleres SET
              titulo = '$taller',
              subtitulo = '$subtitulo',
              descripcion = '$descripcion',
              fecha = '$fecha',
              inicio = '$inicio',
              fin = '$fin',
              capacidad = '$capacidad',
              categoria = '$tipo',
              foto = '$fotografia'
              WHERE id_taller = '$id'
              ";
      $consultar = $this->conexion_db->query($sql);
    }

    public function actualizarSinFoto($titulo, $subtitulo, $fecha, $inicio, $fin, $capacidad, $categoria, $descripcion, $id){
      $sql = "UPDATE talleres SET
              titulo = '$titulo',
              subtitulo = '$subtitulo',
              descripcion = '$descripcion',
              fecha = '$fecha',
              inicio = '$inicio',
              fin = '$fin',
              capacidad = '$capacidad',
              categoria = '$categoria'
              WHERE id_taller = '$id'
              ";
      $consultar = $this->conexion_db->query($sql);
    }


    public function eliminar($id){

      $sql = "SELECT foto FROM talleres WHERE id_taller = $id ";
      $consulta = $this->conexion_db->query($sql);
      $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

      foreach ($resultado as $valor) 
      {
        // unlink($_SERVER['DOCUMENT_ROOT']."/build/img/".$valor['foto']);

        //servidor local
        unlink($_SERVER['DOCUMENT_ROOT']."/congreso2024/imagenes/".$valor['foto']);

      }

     $sql = $this->conexion_db->query("DELETE FROM talleres
    WHERE id_taller = $id ");
     return $sql;
    }

  }

 ?>
