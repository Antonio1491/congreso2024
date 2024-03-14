<?php
class Numeralia extends Conexion{

    public function __construct(){

      parent::__construct();

    }

    public function guardarDatosNumeralia($asistentes,$paises,$ponentes,$conferencistas,$expositores,$talleres,$congreso)
    {
        $sql = "INSERT INTO numeralia VALUES (null, '$asistentes', '$paises',  '$ponentes', '$conferencistas', '$expositores', '$talleres','$congreso')";

        $resultado = $this->conexion_db->query($sql);

            // if($resultado){
            //     echo 'bien';
            // }else{
            //     echo 'error';
            // }
        // echo $asistentes,$paises,$ponentes,$conferencistas,$expositores,$talleres,$congreso;
                return $resultado;
    }


    public function vefificarExisteNumeralia($congreso){
        $sql = "SELECT * FROM numeralia 
        WHERE id_congreso = '$congreso' ";

        $resultado = $this->conexion_db->query($sql);
  
        $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
        if(empty($respuesta)){
            return true;
        }else{
            return false;
        }

    }

    public function tablaNumeralia(){

        $html = "";
        $sql = "SELECT * FROM numeralia 
        INNER JOIN congresos ON numeralia.id_congreso = congresos.id_congreso;
        ";

        $resultado = $this->conexion_db->query($sql);
  
        $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);

        $i = 0;

        foreach($respuesta as $resp){
            $i++;
            $html .= '<tr>
            <td class="text-center">'.$i.'</td>
            <td class="text-center">'.$resp['asistentes'].'</td>
            <td class="text-center">'.$resp['paises'].'</td>
            <td class="text-center">'.$resp['ponentes'].'</td>
            <td class="text-center">'.$resp['conferencistas'].'</td>
            <td class="text-center">'.$resp['expositores'].'</td>
            <td class="text-center">'.$resp['talleres'].'</td>
            <td class="text-center">'.$resp['nombre_evento'].'</td>
            <td class="text-center acciones">
            <a href="editarNumeralia.php?id_numeralia='.$resp['id_numeralia'].'" class="link_encuesta"><i id="'.$resp['id_numeralia'].'" class="fi-checkbox size-72 num-'.$resp['id_numeralia'].'"></i></a>
            </td>
            </tr>';
        }

        return $html;

    }

    public function numeraliaById($numeralia){
        $sql = "SELECT * FROM numeralia 
        WHERE id_numeralia = '$numeralia'
        ";

        $resultado = $this->conexion_db->query($sql);
  
        $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);

        return $respuesta;
    }


    public function actualizarDatosNumeralia($asistentes,$paises,$ponentes,$conferencistas,$expositores,$talleres,$numeralia_id){

        $sql = "UPDATE numeralia
        SET asistentes='$asistentes',
        paises='$paises',
        ponentes='$ponentes',
        conferencistas='$conferencistas',
        expositores='$expositores',
        talleres='$talleres'
        WHERE id_numeralia ='$numeralia_id'";

    $resultado = $this->conexion_db->query($sql);

    return $resultado;

// echo $asistentes,$paises,$ponentes,$conferencistas,$expositores,$talleres,$numeralia_id;

    }

}
?>