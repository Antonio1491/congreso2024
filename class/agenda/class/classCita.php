<?php

require('phpmailer/src/PHPMailer.php');
require('phpmailer/src/Exception.php');
require('phpmailer/src/SMTP.php');


class Agenda extends Conexion{

    public $nombreExp;
    public $correoExpo;



    // public $expositor = "";
    public function __construct(){
      parent::__construct();
  }



  public function getExpositores($congreso){
    $sql = "SELECT * FROM expositores WHERE id_congreso = '$congreso' ";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    return $resultado;
  }


  public function getFecha($congreso){
    $sql = "SELECT fecha_inicio, fecha_fin FROM congresos WHERE id_congreso = '$congreso' ";
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    return $resultado;


}




public function guardarCita($nombre,$telefono,$email,$organizacion,$id_expo, $fecha, $congreso) {

// $this->$expositor = $id_expo;

    $sql = "INSERT INTO asistentes VALUES(null, '$nombre','$telefono','$email','$organizacion', '$congreso')";
    $registrar_miembro = $this->conexion_db->query($sql);


    
    $fechas = $this->getId();
    foreach ($fechas as $id_user) {
        $id_usuario = $id_user['id_asistente'];
    }

    if($id_usuario){
        

     $sql3 = "INSERT INTO agenda_expositores VALUES(null, '$id_expo','$fecha','$id_usuario', '$congreso')";
     $registrar_fecha = $this->conexion_db->query($sql3);
    }else{
        echo '<script>
    setTimeout(function(){ 
    alert("Hubo un error intentalo de nuevo");
    window.location.href = "../index.php";
    }, 2000);
    </script>';
  

    }

    return $registrar_miembro;
    
}


public function getId(){
    $sql2 = "SELECT id_asistente FROM asistentes ORDER BY id_asistente DESC LIMIT 1 ";
    $consulta = $this->conexion_db->query($sql2);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    return $resultado;
}


public function getEmailExpo($id_expo){
    $sql3 = "SELECT * FROM expositores WHERE id_expositor = $id_expo";
    $consulta = $this->conexion_db->query($sql3);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

    foreach ($resultado as $exp) {
        $email_expo = $exp['email'];
    }

    $this->correoExpo = $email_expo;
    return $email_expo;
}


public function correoExpo($nombre,$telefono,$email,$organizacion,$fecha) {

    $correoExp = $this->correoExpo;

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->CharSet = 'UTF-8';
  //Luego tenemos que iniciar la validación por SMTP:
    $mail->SMTPDebug = 0 ;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.hostinger.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
    $mail->Username = "soporte@anpr.org.mx"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente.
    $mail->Password = "anpr2018*!"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
    $mail->Port = 587;  // Puerto de conexión al servidor de envio.
    $mail->SMTPSecure =  "tls"  ; // Habilitar el cifrado TLS
    //cambiar por contenido@congreso@congresoparques.com
    $mail->setFrom("soporte@anpr.org.mx"); // A RELLENARDesde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
    $mail->FromName = "Expo Parques"." "."cita generada"; //A RELLENAR Nombre a mostrar del remitente.
    $mail->addAddress($correoExp); // Esta es la dirección a donde enviamos
    //Se envía copia oculta a vinculación
    // $mail->addBCC('vinculacion@anpr.org.mx'); 

    $mail->IsHTML(true); // El correo se envía como HTML
    $mail->Subject = "Cita congreso parques"; // Este es el titulo del email.
    // $mail->msgHTML(file_get_contents('https://anpr.org.mx/informatica/class/templates/basic.html'), __DIR__); // Funciona
    $body = ($nombre." "." solicitó una cita para Expo Parques el día:"." ".$fecha." "."Datos para contactarlo: "." Teléfono: ".$telefono." Email: ".$email." "." De la empresa: "." ".$organizacion." "."<br> Ponte en contacto con el para definir la hora disponible." );  //Funciona
    // $body .= "Aquí continuamos el mensaje";
    $mail->Body = $body;
    // Mensaje a enviar.
    $exito = $mail->Send(); // Envía el correo.
    // if($exito){ echo 'El correo fue enviado correctamente.'; }else{ echo 'Hubo un problema. Contacta a un administrador.'; }

    return $exito;

}
public function getNombreExpositor($id_expo) {


    $sql3 = "SELECT * FROM expositores WHERE id_expositor = $id_expo";
    $consulta = $this->conexion_db->query($sql3);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
       
    foreach ($resultado as $exp) {
        $nom_exp = $exp['nombre_expositor'];
    }

     $this->nombreExp = $nom_exp;
    return $nom_exp;
}

public function sendCorrreoUsuario($nombre,$email,$fecha,$id_expo) {

    $nom = $this->nombreExp;


    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->CharSet = 'UTF-8';
  //Luego tenemos que iniciar la validación por SMTP:
    $mail->SMTPDebug = 0 ;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.hostinger.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
    $mail->Username = "soporte@anpr.org.mx"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente.
    $mail->Password = "anpr2018*!"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
    $mail->Port = 587;  // Puerto de conexión al servidor de envio.
    $mail->SMTPSecure =  "tls"  ; // Habilitar el cifrado TLS
    //cambiar por contenido@congreso@congresoparques.com
    $mail->setFrom("soporte@anpr.org.mx"); // A RELLENARDesde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
    $mail->FromName = "Expo Parques"." "."cita generada"; //A RELLENAR Nombre a mostrar del remitente.
    $mail->addAddress($email); // Esta es la dirección a donde enviamos
    //Se envía copia oculta a vinculación
    // $mail->addBCC('vinculacion@anpr.org.mx'); 

    $mail->IsHTML(true); // El correo se envía como HTML
    $mail->Subject = "Cita congreso parques"; // Este es el titulo del email.
    // $mail->msgHTML(file_get_contents('https://anpr.org.mx/informatica/class/templates/basic.html'), __DIR__); // Funciona
    $body =  ("Gracias por tu interés en Expo Parques.<br> En breve, un representante de la empresa"." "."$nom"." "."se pondrá en contacto contigo para confirmar la cita de la fecha:"." ".$fecha." "."y disponibilidad de horarios. <br> <br> Saludos cordiales, Congreso Parques Sudamérica 2021 <br>");  //Funciona
    $body.=("<br><img src='https://www.congresoparques.com/agenda/img/img-angeda.png' alt='' srcset=''>");// $body .= "Aquí continuamos el mensaje";
    $mail->Body = $body;
    // Mensaje a enviar.
    $exito = $mail->Send(); // Envía el correo.
    // if($exito){ echo 'El correo fue enviado correctamente.'; }else{ echo 'Hubo un problema. Contacta a un administrador.'; }

   
    return $exito;

}

}

 














?>