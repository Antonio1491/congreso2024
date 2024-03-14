<?php
class Testimoniales extends Conexion{

    public function __construct(){

      parent::__construct();

    }

    public function borrarTestimonial($id){
      $sql = "DELETE FROM testimoniales WHERE id_testimonial='$id'";
      $consulta = $this->conexion_db->query($sql);
      return $consulta;
    }

    public function getTestimonialById($id){
      $sql = "SELECT * FROM testimoniales
      WHERE id_testimonial = '$id'
      ";
      $consulta = $this->conexion_db->query($sql);
      $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

      return $resultado;
    }

    public function getNameFotoById($id){

      $sql = "SELECT url_foto_testimonial FROM testimoniales
      WHERE id_testimonial = '$id'
      ";
      $consulta = $this->conexion_db->query($sql);
      $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
      $nombre= $resultado[0]['url_foto_testimonial'];
      return $nombre;
    }

    public function actualizarTestimonialFoto($foto,$id){
      $sql = "UPDATE testimoniales
      SET url_foto_testimonial='$foto'
      WHERE id_testimonial='$id'
       ";
      $resultado = $this->conexion_db->query($sql);

      return $resultado;
    }

    public function actualizarTestimonial($nombre,$comentario,$puesto,$empresa,$id){
      $sql = "UPDATE testimoniales
      SET nombre='$nombre',
      comentario= '$comentario',
      puesto= '$puesto',
      empresa = '$empresa'
      WHERE id_testimonial='$id'
       ";
      $resultado = $this->conexion_db->query($sql);

      return $resultado;
    }

    public function guardarTestimonial($nombre,$foto_format,$comentario,$puesto,$empresa){
      $sql = "INSERT INTO testimoniales  VALUES(NULL,'$nombre','$foto_format','$comentario','$puesto','$empresa',NULL)";
      $insertar = $this->conexion_db->query($sql);
      return $insertar;
    }

    public function getTestimoniales(){
        $sql = "SELECT * FROM testimoniales";
        $consulta = $this->conexion_db->query($sql);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $i= 0;
        foreach($resultado as $test){
            $i ++;
            $info = '
            <tr>
            <td class="text-center">'.$i.'</td>
            <td class="text-center"><a href="editarFotoTestimonial.php?id='.$test['id_testimonial'].'"><img src="testimoniales/'.$test['url_foto_testimonial'].'" alt=""></a></td>         
            <td class="text-center">'.$test['nombre'].'</td>
            <td class="text-center">'.$test['comentario'].'</td>
            <td class="text-center">'.$test['empresa'].'</td>
            <td class="text-center">
            <a href="editarTestimonial.php?id='.$test['id_testimonial'].'" class="icono_testimonial"><i class="fi-pencil"></i></a>
            <a id="conferencia-'.$test['id_testimonial'].'" href="borrarTestimonio.php?id='.$test['id_testimonial'].'"  class="borrar"><i class="fi-trash borrar"></i></a>
            </td>
            </tr>
            ';
  
            echo $info; 
  
          }
    }

    public function validarImg($type, $size)
    {
  
      if(($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png") && ($size < 5000000))
      {
       
        return true;
  
      }
  
      return false;
  
    }
  
    //Método setea el nombre de la imagen y la válida devolviendo el nuevo nombre
    public function setImg($img, $size, $type)
    {
      
      $random=bin2hex(random_bytes(2));  //generar cadena random de 4 caracteres 
  
      $imgName = "testimonial-".$random."-".mb_strtolower(str_replace(' ', '-', $img));
  
     if($this -> validarImg($type, $size))
     {
  
      return $imgName;
  
     }
  
     return false;
  
    }
  
    public function guardarImg($img, $tmp_name)
    {
  
      $dir = $_SERVER['DOCUMENT_ROOT'].'/adminCongress-master/cpanel/admin/testimoniales';
  
      // var_dump($dir);
      // var_dump($img);
  
      if(move_uploaded_file($tmp_name, $dir."/".$img))
      {
        return true;
      }
  
      return false;
  
    }



  }

 ?>
