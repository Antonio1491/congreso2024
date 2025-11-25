<?php

class Tallerista extends Conexion {

    public function __construct() {
        parent::__construct();
    }

    /* ============================================================
       REGISTRO DE TALLERISTA (con status = 1)
    ============================================================ */
    public function registroTallerista($nombre, $apellidos, $cargo, $empresa,
                                      $biografia, $taller, $fotografia, $evento)
    {
        $sql = "INSERT INTO talleristas 
                (id_tallerista, nombre, apellidos, cargo, empresa, id_taller, fotografia, biografia, id_congreso, status)
                VALUES (NULL, '$nombre', '$apellidos', '$cargo', '$empresa', '$taller', '$fotografia', '$biografia', '$evento', 1)";

        return $this->conexion_db->query($sql);
    }

    /* ============================================================
       LISTAR SOLO ACTIVOS
    ============================================================ */
    public function listarActivos($id_congreso) {

        $sql = "SELECT * FROM talleristas
                WHERE id_congreso = $id_congreso
                AND status = 1";

        $resultado = $this->conexion_db->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    /* ============================================================
       MOSTRAR PARA EDITAR
    ============================================================ */
    public function mostrarDatosEdit($id) {

        $sql = "SELECT a.id_tallerista, a.nombre, a.apellidos, a.cargo,
                       a.empresa, b.id_taller, b.titulo, a.fotografia, a.biografia
                FROM talleristas AS a
                LEFT JOIN talleres AS b ON b.id_taller = a.id_taller
                WHERE a.id_tallerista = $id";

        return $this->conexion_db->query($sql);
    }

    /* ============================================================
       ACTUALIZAR SIN FOTO
    ============================================================ */
    public function actualizarSinFoto($nombre, $apellidos, $cargo, $empresa, 
                                      $biografia, $taller, $id)
    {
        $sql = "UPDATE talleristas SET 
                    nombre = '$nombre',
                    apellidos = '$apellidos',
                    cargo = '$cargo',
                    empresa = '$empresa',
                    id_taller = '$taller',
                    biografia = '$biografia'
                WHERE id_tallerista = '$id'";

        return $this->conexion_db->query($sql);
    }

    /* ============================================================
       ELIMINAR FOTO
    ============================================================ */
    public function eliminarFoto($id) {

        $sql = "SELECT fotografia FROM talleristas WHERE id_tallerista = $id";
        $consulta = $this->conexion_db->query($sql);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        foreach ($resultado as $valor) {
            @unlink(dirname(__DIR__, 2) . "/imagenes/" . $valor['fotografia']);
        }
    }

    /* ============================================================
       ACTUALIZAR CON FOTO
    ============================================================ */
    public function actualizarTallerista($nombre, $apellidos, $cargo, $empresa,
                                         $biografia, $fotografia, $taller, $id)
    {
        $this->eliminarFoto($id);

        $sql = "UPDATE talleristas SET 
                    nombre = '$nombre',
                    apellidos = '$apellidos',
                    cargo = '$cargo',
                    empresa = '$empresa',
                    id_taller = '$taller',
                    fotografia = '$fotografia',
                    biografia = '$biografia'
                WHERE id_tallerista = '$id'";

        return $this->conexion_db->query($sql);
    }

    /* ============================================================
       BORRADO LÓGICO (status = NULL)
    ============================================================ */
    public function eliminar($id) {

        $sql = "UPDATE talleristas
                SET status = NULL
                WHERE id_tallerista = $id";

        return $this->conexion_db->query($sql);
    }

}
?>