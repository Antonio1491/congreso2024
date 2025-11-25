<?php
class Taller extends Conexion{

    public function __construct(){
        parent::__construct();
    }

    // ============================================
    // LISTA DE TALLERES (solo activos)
    // ============================================
    public function listaTalleres($evento){
        $evento = intval($evento);

        $sql = "SELECT * FROM talleres 
                WHERE id_evento = $evento
                AND status = 1
                ORDER BY id_taller DESC";

        $resultado = $this->conexion_db->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function talleristas($id_congreso){
        $sql = "SELECT * FROM talleristas WHERE id_congreso = '$id_congreso'";
        $resultado = $this->conexion_db->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // ============================================
    // REGISTRAR TALLER
    // ============================================
    public function registrarTaller($titulo, $subtitulo, $fecha,
                                    $inicio, $fin, $capacidad, 
                                    $categoria, $descripcion, 
                                    $fotografia, $evento){

        $sql = "INSERT INTO talleres 
                (id_taller, titulo, subtitulo, descripcion,
                 fecha, inicio, fin, capacidad, categoria, 
                 foto, disponible, status, id_evento)
                VALUES
                (NULL, '$titulo', '$subtitulo', '$descripcion',
                '$fecha', '$inicio', '$fin', '$capacidad', 
                '$categoria', '$fotografia', 1, 1, $evento)";

        return $this->conexion_db->query($sql);
    }

    public function mostrarTaller($id){
        $id = intval($id);
        $resultado = $this->conexion_db->query("SELECT * FROM talleres WHERE id_taller = '$id'");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // ============================================
    // ACTUALIZAR TALLER CON FOTO
    // ============================================
    public function actualizarTaller($taller, $subtitulo, $fecha,
                                     $inicio, $fin, $capacidad, $tipo,
                                     $descripcion, $fotografia, $id){

        $id = intval($id);

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
                WHERE id_taller = '$id'";

        return $this->conexion_db->query($sql);
    }

    // ============================================
    // ACTUALIZAR TALLER SIN FOTO
    // ============================================
    public function actualizarSinFoto($titulo, $subtitulo, $fecha,
                                      $inicio, $fin, $capacidad, 
                                      $categoria, $descripcion, $id){

        $id = intval($id);

        $sql = "UPDATE talleres SET
                titulo = '$titulo',
                subtitulo = '$subtitulo',
                descripcion = '$descripcion',
                fecha = '$fecha',
                inicio = '$inicio',
                fin = '$fin',
                capacidad = '$capacidad',
                categoria = '$categoria'
                WHERE id_taller = '$id'";

        return $this->conexion_db->query($sql);
    }

    // ============================================
    // BORRADO LÓGICO (NO BORRA LA FOTO)
    // ============================================
    public function eliminar($id){

        $id = intval($id);

        // SOLO se actualiza el status = NULL
        $sql = "UPDATE talleres
                SET status = NULL
                WHERE id_taller = $id";

        return $this->conexion_db->query($sql);
    }

}
?>