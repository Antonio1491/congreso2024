<?php
class Posters extends Conexion{

    public function __construct(){

      parent::__construct();

    }

    public function getPosters($evento){

        $html = "";
        $sql = "SELECT *
        FROM usuarios_posters
        RIGHT JOIN usuarios
        ON usuarios_posters.id_usuario = usuarios.id
        RIGHT JOIN posters
        ON usuarios_posters.id_poster = posters.id
        WHERE  posters.id_evento = $evento ";
        

        $resultado = $this->conexion_db->query($sql);
  
        $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);

        $i = 0;

        $carpetaDocumentos = $_SERVER['DOCUMENT_ROOT'].'/docs/';
        // var_dump($carpetaDocumentos);

  foreach($respuesta as $resp){
            $doc = $resp['documento'];
            $poster = $resp['poster'];
            
            // $nombre = $resp['nombres'].' '.$resp['apellido_paterno'].' '.$resp['apellido_materno'];

            $i++;
            $html .= '<tr>
            <td class="text-center">'.$i.'</td>
            <td class="text-center">'.$resp['nombre'].'</td>
            <td class="text-center">'.$resp['email'].'</td>
           <td class="text-center">'.$resp['telefono'].'</td>
            <td class="text-center">'.$resp['ciudad'].'</td>';

            if(!empty($doc)){
           $html .='<td class="text-center"><a download href="'.$carpetaDocumentos .$resp['documento'].'"><i class="fi-page-export"></i></a></td>
            ';
            }else{
            $html .='<td class="text-center">No disponible</td>
            ';
            }
            if( !empty($poster)){
                $html .='
                 <td class="text-center"><a download href="'.$carpetaDocumentos .$resp['poster'].'"><i class="fi-page-csv"></i></a></td>
                 ';
                 }else{
                 $html .='
                 <td class="text-center">No disponible</td>
                 ';
             }
             
            $html .=' <td class="text-center acciones">
            <a href="eliminarPoster.php?id='.$resp['id_poster'].'"  class="borrar"><i class="fi-trash borrar"></i></a>

            
            
            </td>';

             $html .='</tr>';
        }

        echo $html;

    }

    public function eliminarPoster($id){
        $sql = "DELETE FROM posters WHERE id='$id'";
        $resultado = $this->conexion_db->query($sql);

        return $resultado;
    }

}
?>