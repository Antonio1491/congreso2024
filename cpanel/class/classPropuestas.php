<?php
// ==========   Propuestas   ===============

class Propuesta extends Conexion{

    public function __construct(){

      parent::__construct();

    }

    // public function listaConferencias($evento){
    //   $sql = "SELECT *
    //           FROM conferencias
    //           WHERE evento = '$evento'
    //           ORDER BY id_conferencia DESC";
    //   $resultado = $this->conexion_db->query($sql);
    //   $conferencias = $resultado->fetch_all(MYSQLI_ASSOC);
    //   return $conferencias;
    // }

    // public function tipoConferencia(){
    //   $resultado = $this->conexion_db->query('SELECT * FROM tipo_conferencia');
    //   $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
    //   return $respuesta;
    // }


    public function getHtmlEjeTematico(){
      $html ="";
      $sql ="SELECT * FROM  area_conferencia";
      $consulta = $this->conexion_db->query($sql);
      $respuesta = $consulta->fetch_all(MYSQLI_ASSOC);

      $html.='<select name="area" id="area" >
      <option value="nulo">Seleccione una opción</option>
      ';

      foreach($respuesta as $valor){
        $html.='
      <option value="'.$valor['id_area'].'">'.$valor['nombre_area'].'</option>
        ';
      }
      $html .= '</select>';

      return $html;


    }

    public function listaPropuestas($evento){  //Lista de propuestas registradas en la convocatoria
      $resultado = $this->conexion_db->query("SELECT * FROM conferencias 
      LEFT JOIN ponencias 
      ON conferencias.id_ponencia = ponencias.id
      lEFT JOIN temas 
      ON ponencias.id_tema = temas.id");
      $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
      return $respuesta;
    }

    //Asignasión de tema a usuario comité
    // public function propuestasAsignadas($id_tema){
    //   $resultado = $this->conexion_db->query("SELECT DISTINCT a.id_conferencia, a.conferencia, a.id_tema, b.nombre,
    //                                         b.apellidos, b.localidad FROM conferencia AS a
    //                                         INNER JOIN conferencista AS b
    //                                         ON a.id_conferencia = b.id_conferencia
    //                                         WHERE a.id_tema = $id_tma
    //                                         GROUP BY id_conferencia");
    //   $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
    //   return $respuesta;
    // }

    public function descripcionPropuesta($id){
      $sql = "SELECT *, ponencias.descripcion as ponencia_descripcion FROM conferencias 
      LEFT JOIN ponencias 
      ON conferencias.id_ponencia = ponencias.id
      lEFT JOIN temas 
      ON ponencias.id_tema = temas.id
      WHERE  ponencias.id = $id";
      $consulta = $this->conexion_db->query($sql);
      $respuesta = $consulta->fetch_all(MYSQLI_ASSOC);
      return $respuesta;

    }

    public function mostrarAutores($id){
      $sql = "SELECT *
            FROM usuarios_ponencias
            RIGHT JOIN usuarios
            ON usuarios_ponencias.id_usuario = usuarios.id
            WHERE $id = usuarios_ponencias.id_ponencia";
      $consulta = $this->conexion_db->query($sql);
      $array = $consulta->fetch_all(MYSQLI_ASSOC);
      return $array;
    }

    //Muestra el número de conferencias registradas en la convocatoria (valor null en la tabla)
    public function totalPropuestas($evento)
    {
      $consulta = $this->conexion_db->query("SELECT count(id) AS totalRegistros FROM ponencias WHERE estatus  = '0' ");
      // $consulta = $this->conexion_db->query("SELECT count(id_conferencia) AS totalRegistros FROM conferencias WHERE status IS NULL AND id_congreso = '$evento' ");
      $respuesta = $consulta->fetch_all(MYSQLI_ASSOC);
      foreach ($respuesta as $value) {
        $resultado = $value['totalRegistros'];
      }
      return $resultado;
    }

    //Aceptacion de propuesta registrada (cambio de status)
    public function aceptarPropuesta($id_propuesta){
      $sql= "UPDATE ponencias SET estatus = 1 WHERE id = $id_propuesta";
      $consulta = $this->conexion_db->query($sql);
      return $consulta;
    }
    public function rechazarPropuesta($id_propuesta){
      $sql= "UPDATE ponencias SET status = 0 WHERE id = $id_propuesta";
      $consulta = $this->conexion_db->query($sql);
      return $consulta;
    }
    

    public function eliminar ($id){
      $sql = "DELETE FROM ponencias WHERE id = $id ";
      $consulta = $this->conexion_db->query($sql);

      return $sql;
    }

    public function actualizarLink ($id, $enlace){
      $sql = "UPDATE conferencias SET link = '$enlace'  WHERE id_conferencia = $id ";
      $consulta = $this->conexion_db->query($sql);
      return true;
    }

}


 ?>
