<?php
class Eventos extends Conexion{
  public function __construct(){
      parent::__construct();
  }
  public function eventos(){
    $sql = "SELECT * FROM eventos_sociales WHERE id_congreso = '$congreso' ";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    return $resultado;

  }

  public function htmlEventos(){
    $sql = "SELECT * FROM eventos_sociales";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

    $html = "";

    foreach($resultado as $res){

      if($res['id_evento'] == 1){
        $cabecera = '<div class="contenedor__talleres--tipo1 evento1">
        <div class="taller1__contenedor row">';
      }
      if($res['id_evento'] == 2){
        $cabecera = '<div class="contenedor__talleres--tipo1 evento2">
        <div class="taller2__contenedor row">';
      }
      if($res['id_evento'] == 3){
        $cabecera = '<div class="contenedor__talleres--tipo1 evento3">
        <div class="taller1__contenedor row">';
      }


      $date=date_create($res['fecha']);
      $format = date_format($date,"M. d  ");
      $hora_inicio = date_create($res['hora_inicio']);
      $hora_format_inicio = date_format($hora_inicio,"g:i a ");
      $hora_fin = date_create($res['hora_fin']);
      $hora_format_fin = date_format($hora_fin,"g:i a ");

      $html .=$cabecera.'
      <div class="column medium-6">
      <h2>'.$res['evento'].'</h2>
      <p>'.$res['descripcion'].'</p>
    <div class="row detalles_evento">
        <div class="column">
          <span><i class="fi-calendar"></i> Date:</span>
          <p>'.$format.'</p>
        </div>
        <div class="column">
          <span><i class="fi-clock"></i> Time:</span>
          <p>'.$hora_format_inicio.' to '.$hora_format_fin.'</p>
        </div>
        <div class="column">
          <span><i class="fi-marker"></i> Location:</span>
          <p>'.$res['lugar'].'</p>
        </div>
      </div>
    </div>

      </div>
      </div>';

    }
    return $html;

  }

  
}
?>