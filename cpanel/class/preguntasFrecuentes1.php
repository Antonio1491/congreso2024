<?php
class PreguntasFrecuentes extends Conexion{

    public function __construct(){

      parent::__construct();

    }

    public function htmlTemas(){
        $sql = "SELECT * FROM tema_preguntas";
        $insertar = $this->conexion_db->query($sql);
      $resultado = $insertar->fetch_all(MYSQLI_ASSOC);
        $html = "";
      foreach ($resultado as $values) {

        $html .='
        <option value="'.$values['id_tema'].'">'.$values['tema'].'</option>
        ';

      }

      return $html;

  }


  
  public function htmlTemasGet($id){
    $sql = "SELECT * FROM tema_preguntas
    ";
    $insertar = $this->conexion_db->query($sql);
  $resultado = $insertar->fetch_all(MYSQLI_ASSOC);


  $sql1 = "SELECT * FROM preguntas_frecuentes
  WHERE id_pregunta = '$id'
  ";
  $insertar1 = $this->conexion_db->query($sql1);
$resultado1 = $insertar1->fetch_all(MYSQLI_ASSOC);


    $html = "";
  foreach ($resultado as $values) {

    $valor1 = $resultado1[0]['id_tema'];

    $valor2 = $values['id_tema'];

    if($valor1 == $valor2) {
      $html .='<option selected="selected" value="'.$values['id_tema'].'">'.$values['tema'].'</option>';
  }
  else {
    $html .= '    <option value="'.$values['id_tema'].'">'.$values['tema'].'</option>';
  }

  }
  return $html;
}

public function getPreguntasValues($id){
  $sql1 = "SELECT * FROM preguntas_frecuentes
  WHERE id_pregunta = '$id'
  ";
  $insertar1 = $this->conexion_db->query($sql1);
$resultado1 = $insertar1->fetch_all(MYSQLI_ASSOC);

return $resultado1;
}

public function actulizarPreguntasFrecuentes($pregunta,$respuesta,$tema,$id){
  $sql = "UPDATE preguntas_frecuentes
  SET pregunta='$pregunta',
  respuesta='$respuesta',
  id_tema='$tema'
  WHERE id_pregunta='$id'";
  $actualizar = $this->conexion_db->query($sql);
  return $actualizar;


}

  public function insertarPreguntFrecuente($pregunta,$respuesta,$tema){
    $sql = "INSERT INTO preguntas_frecuentes VALUES (NULL,'$pregunta', '$respuesta', '$tema')";

    $insertar = $this->conexion_db->query($sql);

    return $insertar;

  }

  public function borrarPreguntaFrecuente($id){
    $sql = "DELETE FROM preguntas_frecuentes 
    WHERE id_pregunta = '$id'";

    $eliminar = $this->conexion_db->query($sql);

    return $eliminar;

  }

  public function htmlPreguntas(){
    $sql1 = "SELECT * FROM tema_preguntas";
    $insertar1 = $this->conexion_db->query($sql1);
  $resultado1 = $insertar1->fetch_all(MYSQLI_ASSOC);


  $html ='';
  foreach($resultado1 as $value){

    $consultar = $this->htmlRespuestas($value['id_tema']);

    if($consultar == false){
      $html.= '';
    }else{
    $html.= '
      <div class="row tituloPreguntas">
      <h2 class="subtituloAvenirA ">'.$value['tema'].'</h2>
      </div>
      <div class="row lista_preguntas">
      ';
      $html .=$this->htmlRespuestas($value['id_tema']);
      $html.= '</div>';
    }

  
  }

  return $html;
  }
  
  public function htmlRespuestas($id){
    $sql = "SELECT * FROM preguntas_frecuentes
    WHERE id_tema = '$id'
    ";
    $insertar = $this->conexion_db->query($sql);

  $resultado = $insertar->fetch_all(MYSQLI_ASSOC);

    $html = '';
    $html.='<ul class="accordion" data-accordion data-allow-all-closed="true">';

    $i = 0;

  foreach($resultado as $v => $values){

    if($i == 0){
      $html.= '
      <li class="accordion-item is-active " data-accordion-item>
        <a href="#" class="accordion-title">+ '.$values['pregunta'].'</a>
        <div class="accordion-content" data-tab-content>
          <p>'.nl2br($values['respuesta']).'</p>
        </div>
      </li>
  ';
    }else{
    
    $html.= '
        <li class="accordion-item " data-accordion-item>
          <a href="#" class="accordion-title">+ '.$values['pregunta'].'</a>
          <div class="accordion-content" data-tab-content>
            <p>'.nl2br($values['respuesta']).'</p>
          </div>
        </li>
    ';
    }
    $i++;
  }
  $html.= '</ul>';

  if(empty($resultado)){
    return false;
  }else{
    return $html;

  }



  }
  

  public function getPreguntasFrecuentes(){
    $sql = "SELECT * FROM preguntas_frecuentes
    INNER JOIN tema_preguntas ON preguntas_frecuentes.id_tema = tema_preguntas.id_tema
    ";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    $i= 0;
    foreach($resultado as $test){
        $i ++;
        $info = '
        <tr>
        <td class="text-center">'.$i.'</td>
        <td class="text-center">'.$test['pregunta'].'</td>
        <td class="">'.$test['respuesta'].'</td>
        <td class="text-center">'.$test['tema'].'</td>
        <td class="text-center acciones">
        <a href="editarPreguntaFrecuente.php?id='.$test['id_pregunta'].'" class="icono_testimonial"><i class="fi-pencil"></i></a>
        <a id="conferencia-'.$test['id_pregunta'].'" href="borrarPreguntaFrecuente.php?id='.$test['id_pregunta'].'"  class="borrar"><i class="fi-trash borrar"></i></a>
        </td>
        </tr>
        ';

        echo $info; 

      }
  }
}

 ?>
