<?php

class Tallerista extends Conexion{

    public function __construct(){

      parent::__construct();

    }
        //registro de talleristas
        public function registroTallerista($nombre, $apellidos, $cargo, $empresa,
        $biografia,$taller, $fotografia, $evento){

        $resultado = $this->conexion_db->query("INSERT INTO talleristas
        VALUES ( null, '$nombre', '$apellidos', '$cargo','$empresa', '$taller', '$fotografia', 
        '$biografia', '$evento')");

        return $resultado;

        }

        //Mostrar los datos del conferencista para editar
        public function mostrarDatosEdit($id){

        $resultado = $this->conexion_db->query("SELECT a.id_tallerista, a.nombre, a.apellidos, a.cargo,
        a.empresa,b.id_taller, b.titulo, a.fotografia, a.biografia
        FROM talleristas AS a
        LEFT JOIN talleres AS b ON b.id_taller = a.id_taller
        WHERE a.id_tallerista = $id ");

        return $resultado;

        }


        //Actualizar datos del tallerista sin foto
        public function actualizarSinFoto($nombre, $apellidos, $cargo, $empresa, $biografia,
        $taller, $id){

        $sql = "UPDATE talleristas SET nombre = '$nombre',
        apellidos = '$apellidos',
        cargo = '$cargo',
        empresa = '$empresa',
        id_taller = '$taller',
        biografia = '$biografia'
        WHERE id_tallerista = '$id' ";

        $resultado = $this->conexion_db->query($sql);

        return $resultado;
        }

      public function eliminarFoto($id){
      $sql = "SELECT fotografia FROM talleristas WHERE id_tallerista = $id ";
      $consulta = $this->conexion_db->query($sql);
      $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        foreach ($resultado as $valor) {
        // unlink($_SERVER['DOCUMENT_ROOT']."/img/uploads/talleristas/".$valor['fotografia']);
        unlink($_SERVER['DOCUMENT_ROOT']."/imagenes/".$valor['fotografia']);

        }

      }

      //Actualizar datos del tallerista con foto nueva
      public function actualizarTallerista($nombre, $apellidos, $cargo, $empresa,
      $biografia, $fotografia, $taller, $id){
      $eliminarFoto = $this->eliminarFoto($id);

      $sql = "UPDATE talleristas SET nombre = '$nombre',
      apellidos = '$apellidos',
      cargo = '$cargo',
      empresa = '$empresa',
      id_taller = '$taller',
      fotografia = '$fotografia',
      biografia = '$biografia'
      WHERE id_tallerista = '$id' ";

      $consulta = $this->conexion_db->query($sql);

      return $consulta;
      }

    // Eliminar tallerista
    public function eliminar($id){
      $sql = $this->conexion_db->query("DELETE FROM talleristas WHERE id_tallerista = $id ");
      return $sql;
}

}
?>