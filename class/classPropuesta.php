<?php
// require "../../../class/phpmailer/src/PHPMailer.php";
// require "../../../class/phpmailer/src/Exception.php";
// require "../../../class/phpmailer/src/SMTP.php";

class Propuesta extends Conexion{

  public function __construct(){

      parent::__construct();

  }

  public function desplegarTemas(){

    $sql = $this->conexion_db->query("SELECT * FROM temas WHERE id_tema > 1");

    $temas = $sql->fetch_all(MYSQLI_ASSOC);

    return $temas;
  }

  public function getTipoConferencia(){

    $sql = $this->conexion_db->query("SELECT * FROM tipo_conferencia WHERE id_tipo > 1");

    $temas = $sql->fetch_all(MYSQLI_ASSOC);

    return $temas;
  }
  public function getSubtemas(){

    $sql = $this->conexion_db->query("SELECT * FROM subtema_conferencias ");

    $temas = $sql->fetch_all(MYSQLI_ASSOC);

    return $temas;
  }

  public function asignarId(){

    $resultado = $this->conexion_db->query('SELECT max(id_conferencia) AS max_idconfe FROM conferencias');

    $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);

    foreach ($respuesta as $valor) {
    $id = $valor['max_idconfe'];
    }

    return $id;

  }

  public function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = addslashes($datos); // Inserta un \ para los apostrofes del texto (textos en inglés)
    return $datos;
  }

  public function registroPropuesta($sesion, $tipoSesion, $modalidadSesion, $subtema, 
                                     $desc, $just, $mod, 
                                  $enlace1, $enlace2, $enlace3, $evento){

    $sql = $this->conexion_db->query("INSERT INTO conferencias VALUES (null, null, '$sesion', null, 
                                    '1', '$tipoSesion', '$modalidadSesion', '$subtema', null, 
                                    '$desc', null, '$just', null, null, 
                                    null, '$mod', '$enlace1', '$enlace2', '$enlace3', null, null, null, 
                                    null, null, null, '$evento')");
    return $sql;

}

  public function registroAspirante($array, $nom, $ap, $em, $em2, $tel, $cargo, $emp, $pais, $ciudad, $exp,
                                     $nomf, $tipof, $tempf, $evento)
  {                    
    $id_sesion = $this->asignarId();

    for ($i=0; $i < $array ; $i++)  
    {
      $nom = $this->filtrado($nom[$i]);
      $ap = $this->filtrado($ap[$i]);
      $em = $this->filtrado($em[$i]);
      $em2 = $this->filtrado($em2[$i]);
      $tel = $this->filtrado($tel[$i]);
      $cargo = $this->filtrado($cargo[$i]);
      $emp = $this->filtrado($emp[$i]);
      $pais = $this->filtrado($pais[$i]);
      $ciudad = $this->filtrado($ciudad[$i]);
      $exp = $this->filtrado($exp[$i]);
      
      // $ap[$i], $em[$i], $em2[$i], $tel[$i], $cargo[$i], $emp[$i], $pais[$i], $ciudad[$i], $exp[$i], $nomf[$i], $id_sesion ;

     $sql = $this->conexion_db->query("INSERT INTO aspirantes
                                   VALUES (null, '$nom', '$ap', '$em', '$em2', '$tel', 
                                   '$cargo', '$emp', '$pais', '$ciudad', '$exp', '$nomf[$i]', 
                                   '$id_sesion', '$evento') ");

                                   var_dump('$nom', '$ap', '$em', '$em2', '$tel', 
                                   '$cargo', '$emp', '$pais', '$ciudad', '$exp', '$nomf[$i]', 
                                   '$id_sesion', '$evento');
                                  //  die();
                                  //Servidor de internet
                                  //  $destino_foto = $_SERVER['DOCUMENT_ROOT'].'/guayaquil/registros/uploads/';

                                  //Servidor localhost
                                   $destino_foto = $_SERVER['DOCUMENT_ROOT'].'/worldparkscongress/img/uploads/';

                                  if ($sql){
                                    echo move_uploaded_file($tempf[$i], $destino_foto.$nomf[$i]);
                                  }


     }/*for*/

     return $sql;

   }

    public function correoRegistroPropuesta($correo){

      
      $mail = new PHPMailer\PHPMailer\PHPMailer();
      $mail->CharSet = 'UTF-8';
              //Luego tenemos que iniciar la validación por SMTP:
              $mail->SMTPDebug = 0 ;
              $mail->IsSMTP();
              $mail->SMTPAuth = true;
              $mail->Host = "smtp.hostinger.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
              $mail->Username = "contenido@congresoparques.com"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente.
              $mail->Password = "contenido1*"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
              $mail->Port = 587; // Puerto de conexión al servidor de envio.
              $mail->SMTPSecure =  "tls"  ; // Habilitar el cifrado TLS
              //cambiar por contenido@congreso@congresoparques.com
              $mail->setFrom("contenido@congresoparques.com"); // A RELLENARDesde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
              $mail->FromName = "Congreso Parques Sudámerica"; //A RELLENAR Nombre a mostrar del remitente.
              $mail->addAddress($correo[0]); // Esta es la dirección a donde enviamos

              $mail->IsHTML(true); // El correo se envía como HTML
              $mail->Subject = "Propuesta Registrada"; // Este es el titulo del email.
              $body = "<html><body>
                            <p>Gracias por enviar tu propuesta de sesión educativa para
                            el 2do Congreso Sudaméricano de Parques Urbanos 2020. Hemos recibido tu información
                            correctamente y se integrará a las sesiones que serán revisadas
                            por nuestro Consejo de Contenido y Educación.</p>
                            <p>Daremos los resultados de la convocatoria en las fechas
                            establecidas y nos comunicaremos previamente en caso de ser
                            necesario.</p>
                            <p>¡Saludos!</p>
                            <p>Vitoria Martín.<br>Dirección de Contenido y Educación. </p>
                        </body></html>";
              // $body .= "Aquí continuamos el mensaje";
              $mail->Body = $body;
              // Mensaje a enviar.
              $exito = $mail->Send(); // Envía el correo.
              //  if($exito){ echo 'El correo fue enviado correctamente.'; }else{ echo 'Hubo un problema. Contacta a un administrador.'; }

    }

    public function mandarCorreo($nombre,$correo,$mensaje){

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->CharSet = 'UTF-8';
        //Luego tenemos que iniciar la validación por SMTP:
        $mail->SMTPDebug = 0 ;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.hostinger.mx"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
        $mail->Username = "directorio.industria@anpr.org.mx"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente.
        $mail->Password = "Informatica14*"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
        $mail->Port = 587;  // Puerto de conexión al servidor de envio.
        $mail->SMTPSecure =  "tls"  ; // Habilitar el cifrado TLS
        //cambiar por contenido@congreso@congresoparques.com
        $mail->setFrom("directorio.industria@anpr.org.mx"); // A RELLENARDesde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
        $mail->FromName = "ANPR"." "."Directorio de la industria"; //A RELLENAR Nombre a mostrar del remitente.
        $mail->addAddress("directorio.industria@anpr.org.mx"); // Esta es la dirección a donde enviamos
        //Se envía copia oculta a vinculación
        // $mail->addBCC('vinculacion@anpr.org.mx'); 
        
        $mail->IsHTML(true); // El correo se envía como HTML
        $mail->Subject = "Registro en el directorio"; // Este es el titulo del email.
        // $mail->msgHTML(file_get_contents('https://anpr.org.mx/informatica/class/templates/basic.html'), __DIR__); // Funciona
        $body = ("La persona: ".$nombre." con el correo: ".$correo."<br> con el mensaje: ".$mensaje." se quiere comunicar con ustedes" );  //Funciona
        // $body .= "Aquí continuamos el mensaje";
        $mail->Body = $body;
        // Mensaje a enviar.
        $exito = $mail->Send(); // Envía el correo.
        if($exito){
          return true;
          }else{ 
            return false;
          }
    }

    public function avisoNuevaSesion($nombre, $apellido){

      $mail = new PHPMailer\PHPMailer\PHPMailer();
      $mail->CharSet = 'UTF-8';
              //Luego tenemos que iniciar la validación por SMTP:
              $mail->SMTPDebug = 0 ;
              $mail->IsSMTP();
              $mail->SMTPAuth = true;
              $mail->Host = "smtp.hostinger.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
              $mail->Username = "contenido@congresoparques.com"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente.
              $mail->Password = "contenido1*"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
              $mail->Port = 587; // Puerto de conexión al servidor de envio.
              $mail->SMTPSecure =  "tls"  ; // Habilitar el cifrado TLS
              //cambiar por contenido@congreso@congresoparques.com
              $mail->setFrom("contenido@congresoparques.com"); // A RELLENARDesde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
              $mail->FromName = "Congreso Parques Sudámerica"; //A RELLENAR Nombre a mostrar del remitente.
              $mail->addAddress("contenido@congresoparques.com"); // Esta es la dirección a donde enviamos

              $mail->IsHTML(true); // El correo se envía como HTML
              $mail->Subject = "Convocatoria Guayaquil"; // Este es el titulo del email.
              $body = "<html><body>
                            <h3>¡Registro Nuevo!</h3>
                            <p>Tienes un registro nuevo en: Convocatoria Sesiones Educativas Guayaquil 2020</p>
                            <p>
                              Nombre: ".$nombre[0]." ".$apellido[0]."<br>
                              
                            </p>
                        </body></html>";
              // $body .= "Aquí continuamos el mensaje";
              $mail->Body = $body;
              // Mensaje a enviar.
              $exito = $mail->Send(); // Envía el correo.
                // if($exito){ echo 'El correo fue enviado correctamente.'; }else{ echo 'Hubo un problema. Contacta a un administrador.'; }

    }

    public function listaPropuestas($evento){  //Lista de propuestas registradas en la convocatoria
      $resultado = $this->conexion_db->query("SELECT DISTINCT a.id_conferencia, a.modalidad, a.status, a.link, a.id_congreso, a.id_tema, b.nombre,
                                            b.apellidos, b.pais, b.ciudad, c.tema FROM conferencias AS a
                                            INNER JOIN aspirantes AS b
                                            ON a.id_conferencia = b.id_conferencia
                                            INNER JOIN temas AS c 
                                            ON a.id_tema = c.id_tema
                                            WHERE a.id_congreso = '$evento'
                                            GROUP BY id_conferencia");
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
      $sql = "SELECT a.conferencia, a.modalidad, a.descripcion, a.justificacion, a.objetivo1,
              a.objetivo2, a.objetivo3, a.link, b.tema
              FROM conferencias as a
              INNER JOIN temas as b
              ON a.id_tema = b.id_tema
              WHERE  a.id_conferencia= $id ";
      $consulta = $this->conexion_db->query($sql);
      $respuesta = $consulta->fetch_all(MYSQLI_ASSOC);
      return $respuesta;

    }

    public function mostrarAutores($id){
      $sql = "SELECT *
            FROM aspirantes
            WHERE $id= id_conferencia";
      $consulta = $this->conexion_db->query($sql);
      $array = $consulta->fetch_all(MYSQLI_ASSOC);
      return $array;
    }

    //Muestra el número de conferencias registradas en la convocatoria (valor null en la tabla)
    public function totalPropuestas($evento){
      $consulta = $this->conexion_db->query("SELECT count(id_conferencia) AS totalRegistros FROM conferencias WHERE status IS NULL AND id_congreso = '$evento' ");
      $respuesta = $consulta->fetch_all(MYSQLI_ASSOC);
      foreach ($respuesta as $value) {
        $resultado = $value['totalRegistros'];
      }
      return $resultado;
    }

    //Aceptacion de propuesta registrada (cambio de status)
    public function aceptarPropuesta($id_propuesta){
      $sql= "UPDATE conferencias SET status = 'aceptada' WHERE id_conferencia = $id_propuesta";
      $consulta = $this->conexion_db->query($sql);
      return $consulta;
    }

    public function eliminar ($id){
      $sql = "DELETE FROM conferencias WHERE id_conferencia = $id ";
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
