<?php
class Conferencia extends Propuesta{

    public function __construct(){

      parent::__construct();

    }

    public function listaConferencias($evento){
      $sql = "SELECT * FROM conferencias
      WHERE status = 'aceptada'
      AND id_congreso = '$evento'
      ORDER BY id_conferencia DESC";
      $resultado = $this->conexion_db->query($sql);
      $conferencias = $resultado->fetch_all(MYSQLI_ASSOC);
      return $conferencias;
    }

    public function temas(){
      $sql = "SELECT * FROM temas";
      $resultado = $this->conexion_db->query($sql);
      $tipoConferencia = $resultado->fetch_all(MYSQLI_ASSOC);
      return $tipoConferencia;
    }

    public function conferenciaTipo(){
      $sql = "SELECT * FROM tipo_conferencia";
      $resultado = $this->conexion_db->query($sql);
      $tipoConferencia = $resultado->fetch_all(MYSQLI_ASSOC);
      return $tipoConferencia;
    }

    public function mostrarConferencia($id){
      $resultado = $this->conexion_db->query("SELECT a.conferencia,
      a.conferencia_ing, a.conferencia_port, a.id_tema, a.id_tipo, a.modalidadSesion,
       a.descripcion, a.descripcion_ing, a.descripcion_port, a.objetivo1,
      a.objetivo2, a.objetivo3, a.fecha,
      a.inicio, a.fin, a.salon, b.id_tema, b.tema, t.tipo,sub.id_subtema, sub.subtema
      FROM conferencias AS a
      LEFT JOIN temas as b ON b.id_tema = a.id_tema
      LEFT JOIN tipo_conferencia as t ON t.id_tipo = a.id_tipo
      LEFT JOIN subtema_conferencias as sub ON sub.id_subtema = a.subtema 
      WHERE id_conferencia = '$id' ");
      $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
      return $respuesta;
    }

    public function registrar($conferencia_ing,
                    $tipoSesion, $modalidadSesion, $subtema, $descripcion_ing, 
                    $objetivo1, $objetivo2, $objetivo3,
                    $fecha, $hora, $hora_fin, $lugar,
                    $evento){

                      // var_dump($conferencia_ing,
                      // $tipoSesion, $modalidadSesion, $subtema, $descripcion_ing, 
                      // $objetivo1, $objetivo2, $objetivo3,
                      // $fecha, $hora, $hora_fin, $lugar,
                      // $evento);
                      // die();

      $sql = "INSERT INTO conferencias VALUES
      (null, null, '$conferencia_ing', null, '1', '$tipoSesion', '$modalidadSesion', '$subtema',
       null, '$descripcion_ing',null, null, '$objetivo1', '$objetivo2', '$objetivo3', null, null,
      NULL, NULL, 'aceptada', '$fecha', '$hora', '$hora_fin', '$lugar', null, '$evento')";
      $resultado = $this->conexion_db->query($sql);
      return $resultado;
    }

    public function actualizar($conferencia_ing, $fecha, $hora, $hora_fin,
    $lugar, $tipo, $modalidadSesion, $subtema, $descripcion_ing, 
    $objetivo1, $objetivo2, $objetivo3, $id){

    //   die();
    $sql = "UPDATE conferencias SET
              -- conferencia = '$conferencia',
              conferencia_ing = '$conferencia_ing',
              -- conferencia_port = '$conferencia_port',
              -- id_tema = '$tema',
              id_tipo = '$tipo',
              modalidadSesion = '$modalidadSesion',
              subtema = '$subtema',
              -- descripcion = '$descripcion',
              descripcion_ing = '$descripcion_ing',
              -- descripcion_port = '$descripcion_port',
              objetivo1 = '$objetivo1',
              objetivo2 = '$objetivo2',
              objetivo3 = '$objetivo3',
              fecha = '$fecha',
              inicio = '$hora',
              fin = '$hora_fin',
              salon = '$lugar'
              WHERE id_conferencia = '$id' ";

      $resultado = $this->conexion_db->query($sql);

      return $resultado;
    }

    public function eliminar($id){
     $sql = $this->conexion_db->query("DELETE FROM conferencias WHERE id_conferencia = $id ");
     return $sql;
    }

  }

 ?>
