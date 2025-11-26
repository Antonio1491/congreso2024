<?php
class Programa extends Conexion{

  public function __construct()
  {
    parent::__construct();
  }

  // ========================================================
  //   MOSTRAR SOLO LOS BLOQUES CON status = 1 (VISIBLES)
  // ========================================================
  public function programa($congreso)
  {
    $sql = "SELECT * FROM programa 
            WHERE id_congreso = '$congreso'
            AND status = 1
            ORDER BY fecha";

    $resultado = $this->conexion_db->query($sql);

    $programa = $resultado->fetch_all(MYSQLI_ASSOC);

    return json_encode($programa);
  }

  // ========================================================
  //   CONTENIDO DEL BLOQUE (NO CAMBIA NADA AQUÍ)
  // ========================================================
  public function bloque($tipo, $fecha, $inicio, $fin, $congreso)
  {

    if($tipo === 'Conferencias' OR $tipo === 'Magistral')
    {
      $sql = "SELECT * FROM ponencias 
              WHERE fecha = '$fecha' 
              AND hora_inicio BETWEEN '$inicio' AND '$fin' 
              ORDER BY hora_inicio";

      $resultado =  $this->conexion_db->query($sql);
      $data = $resultado->fetch_all(MYSQLI_ASSOC);

      $contenido = "";
      
      foreach($data as $item){
        $contenido .= "<li><span>".$item["titulo"]."</span></li>";
      }

      return $contenido;

    }
    elseif($tipo === 'Talleres')
    {
      $sql = "SELECT * FROM talleres 
              WHERE fecha = '$fecha' 
              AND inicio BETWEEN '$inicio' AND '$fin'  
              ORDER BY inicio";

      $resultado =  $this->conexion_db->query($sql);
      $data = $resultado->fetch_all(MYSQLI_ASSOC);

      $contenido = "";

      foreach($data as $item){
        $contenido .= "<li><span>".$item["titulo"]."</span></li>";
      }

      return $contenido;
    }

  }

  // ========================================================
  //   GUARDAR BLOQUE (DEJA status COMO YA LO TIENES EN BD)
  // ========================================================
  public function guardarBloque($data)
  {
    $data = json_decode($data);

    $sql = "INSERT INTO programa VALUES (
      null,
      '$data->fecha',
      '$data->inicio',
      '$data->fin',
      '$data->bloque_ing', 
      '$data->tipo', 
      1,                 -- status por defecto
      '$data->congreso'
      )"; 

    $resultado = $this->conexion_db->query($sql);

    return $resultado;
  }

  // ========================================================
  //   ELIMINAR EVENTO SOCIAL (NO TOCAMOS ESTA FUNCIÓN)
  // ========================================================
  public function eliminar($id)
  {
    $sql = $this->conexion_db->query("DELETE FROM eventos_sociales WHERE id_evento = '$id' ");

    return $sql;
  }

  // ========================================================
  //   BORRADO LÓGICO: status = NULL
  // ========================================================
  public function eliminarBloquePrograma($id)
  {
    $sql = $this->conexion_db->query(
      "UPDATE programa SET status = NULL WHERE id = '$id'"
    );

    return $sql;
  }

}
?>