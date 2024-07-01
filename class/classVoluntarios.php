<?php
class Voluntarios extends Conexion
{
  public function __construct(){
    parent::__construct();
  }

  public function registroEspecial($nombre, $apellidos, $email, $celular, $empresa, $evento)
  {
    $sql = "INSERT INTO asistentes 
            VALUES (null, '$nombre', '$apellidos', '$email', '$celular', '$empresa', '$evento')";

    $consulta = $this->conexion_db->query($sql);

    if ($consulta) {
      return true;
    } else {
      return false;
    }
  }

  public function turnoAsignado($voluntario_id, $turno)
  {
    $sql = "INSERT INTO turnos_asignados VALUES ( $voluntario_id, $turno)";
    $consulta = $this->conexion_db->query($sql);

    if ($consulta) {
      $this->restarCupo($turno);
      return true;
    } else {
      return false;
    }
  }

  public function registroVoluntario($nombre, $apellidos, $email, $celular, $universidad, $city, $country, $semblanza, $razones, $turno, $evento)
  {
    $sql = "INSERT INTO voluntarios VALUES (null, '$nombre', '$apellidos', '$email', '$celular', '$universidad', '$city', '$country', '$semblanza', '$razones', '$evento')";
    $consulta = $this->conexion_db->query($sql);

    if ($consulta) {
      $voluntario_id = $this->conexion_db->insert_id; // Obtener el último ID insertado
      $this->turnoAsignado($voluntario_id, $turno);
      // $email = $this->correoAceptacionVoluntario($email, $nombre, $turno);
      return true;
    } else {
      return false;
    }
  }

  public function restarCupo($turno)
  {
    $sql = "UPDATE turnos_voluntarios SET
            capacidad = (capacidad - 1)
            WHERE id_turno = '$turno'";
    $this->conexion_db->query($sql);
  }

  public function turnos($evento)
  {
    $sql = "SELECT * FROM turnos_voluntarios WHERE evento = '$evento'";
    $consulta = $this->conexion_db->query($sql);
    return $consulta->fetch_all(MYSQLI_ASSOC);
  }

  public function informacionTurno($turno)
  {
    $sql = "SELECT turno, fecha, hora_inicio, hora_fin FROM turnos_voluntarios WHERE id_turno = $turno";
    $consulta = $this->conexion_db->query($sql);
    $array_datos = $consulta->fetch_all(MYSQLI_ASSOC);
    $respuesta = "";
    foreach ($array_datos as $valor) {
      $respuesta .= "
                    <style type='text/css'>
                      table{
                        border: 1px solid gray;
                      }
                      th, td{
                        width: 110px;
                        text-align: center;
                      }
                    </style>
                    <table class='tabla_email'>
                      <caption><h4>Horario Seleccionado</h4></caption>
                      <thead>
                        <tr>
                          <th>Turno</th>
                          <th>Fecha</th>
                          <th>Inicio</th>
                          <th>Fin</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>".$valor["turno"]."</td>
                          <td>".$valor["fecha"]."</td>
                          <td>".$valor["hora_inicio"]."</td>
                          <td>".$valor["hora_fin"]."</td>
                        </tr>
                      </tbody>
                    </table>";
    }
    return $respuesta;
  }

  public function correoAceptacionVoluntario($correo, $nombre, $turno)
  {
    $datosTurno = $this->informacionTurno($turno);
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->CharSet = 'UTF-8';
    //Luego tenemos que iniciar la validación por SMTP:
    $mail->IsSMTP();
    $mail->Host = "smtp.hostinger.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->Username = "contenido@anpr.org.mx"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente.
    $mail->Password = "contenidoVitoria2020"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
    $mail->Port = 587; // Puerto de conexión al servidor de envio.
    $mail->SMTPSecure = "tls"; // Habilitar el cifrado TLS
    $mail->setFrom("contenido@anpr.org.mx"); // A RELLENARDesde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
    $mail->FromName = "Congreso Parques - León, Guanajuato 2023"; //A RELLENAR Nombre a mostrar del remitente.
    $mail->addAddress($correo); // Esta es la dirección a donde enviamos
    $mail->IsHTML(true); // El correo se envía como HTML
    $mail->Subject = "Participación Registrada."; // Este es el titulo del email.
    $body = "<html><body>
                          <p>".$nombre.",<br> Gracias por registrarte como voluntario en el Congreso Mundial de Parques Urbanos 2022.
                          ¡Esta es una gran responsabilidad por lo que será un placer contar con su participación!</p>
                          <p>Los horarios seleccionados son los siguientes:</p>
                          ".$datosTurno."
                          <p>Cada horario es diferente y cada uno tiene una tarea específica, además de ser diferente. Por eso una semana antes del congreso tendremos una capacitación para voluntarios, esta será en línea.
                          <br><br>
                          <p>Vitoria Martín.<br> Departamento de Contenido y Educación.</p>
                      </body></html>";
    $mail->Body = $body;
    $mail->Send(); // Envía el correo.
  }
}
?>