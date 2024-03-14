<?php
class Hospedaje extends Conexion{

    public function __construct(){

      parent::__construct();

    }

    public function htmlHotel(){

            $sql = "SELECT * FROM hotel WHERE id_congreso = 'WUPC2022' ORDER BY nombre_hotel ASC";
            $resultado = $this->conexion_db->query($sql);
            $hotel = $resultado->fetch_all(MYSQLI_ASSOC);
            $html= '';

            foreach ($hotel as $value) {

                $html .= ' <div class="column medium-2 small-6">
                <div class="item_hotel">
                  <figure >
                    <a href="#hotel'.$value['id_hotel'].'" class="MO"><img src="cpanel/img_hotel/'.$value['url_img'].'" alt=""></a>
                  </figure>
                  <span class="overlay"></span>
                </div>
              </div>';
            }

            return $html;
   
    }

    public function htmlHabitacion(){


        $sql = "SELECT * FROM hotel
        WHERE id_congreso = 'WUPC2022'
        ORDER BY hotel.nombre_hotel ASC";
        $resultado = $this->conexion_db->query($sql);
        $hotel = $resultado->fetch_all(MYSQLI_ASSOC);
        $html= '';


        foreach($hotel as $i => $value ){
            if($i == 0){
                $mostrar = 'mostrar';
            }else{
                $mostrar = '';

            }
            $html .= '
            <div id="hotel'.$value['id_hotel'].'" class="oculto '.$mostrar.'" style="display: block;">
            <div class="row">
                <div class="column medium-6 small-12">
                  <figure>
                    <img src="https://worldurbanparkscongress.com/cpanel/img_hotel/'.$value['url_img'].'" alt="" class="img_desc_hotel">
                  </figure>
                </div>
                <div class="column medium-6 datos_h">
                  <p><span>Location: </span>'.$value['ubicacion'].'</p>
                  <p><span>Reservation Key: </span>"'.$value['clave_reservacion'].'"<span class="clave_reservacion"></span></p>
                  <p><span>Contact: </span>Tel: '.$value['numero_contacto'].' <br>
                  '.$value['correo_contacto'].'</p>
    
                  <a href="'.$value['web'].'" style="font-weight: bold; color: #00b936">
                      <i class="fi-web"></i>
                      Go to website
                  </a> 
                </div>
            </div>
            <div class="row precios_hotel align-center">
              <div class="column medium-4">
                <br>
                <div class="titulo_tabla habitacion">
                  <h6 class="text-center">ROOM</h6>
                </div>
                <div class="tabla">
                  <ul class="titulo-habitacion">';
                  $html .= $this->htmlTipoHab($value['id_hotel']);
                  $html.= '</ul>
                </div>
              </div>
              <div class="column medium-6">
                <div class="row">
                  <span class="impuestos">Taxes not included</span>   
                </div>
                <div class="row">
                  <div class="column medium-6">
                    <div class="titulo_tabla">
                      <h6 class="text-center">PRICE MXN</h6>
                    </div>
                    <div class="tabla">
                      <ul>';
                      $html .= $this->htmlHabitacionIndById($value['id_hotel']);
                  $html .='</ul>
                    </div>
                  </div>
                  <div class="column medium-6">
                    <div class="titulo_tabla">
                      <h6 class="text-center">PRICE USD</h6>
                    </div>
                    <div class="tabla">
                      <ul>';
                      $html .= $this->htmlHabitacionDblById($value['id_hotel']);

                      $html .= '</ul>
                    </div>
                  </div>
                </div>
              </div>
    
             
                </div>
              </div>
            ';
        }

        return $html;
      

    }

    public function htmlTipoHab($id){
        $sql = "SELECT * FROM habitacion
        WHERE id_hotel = '$id'";
        $resultado = $this->conexion_db->query($sql);
        $hotel = $resultado->fetch_all(MYSQLI_ASSOC);

        $html = '';

        foreach($hotel as $value){
            $html .= '<li>'.$value['tipo_habitacion'].'</li>';
        }

        return $html;
    }
    public function htmlHabitacionIndById($id){
        $sql = "SELECT * FROM habitacion
        WHERE id_hotel = '$id'";
        $resultado = $this->conexion_db->query($sql);
        $hotel = $resultado->fetch_all(MYSQLI_ASSOC);

        $html = '';

        foreach($hotel as $value){
            $html .= '<li>$'.number_format($value['precio'], 2).'</li>';
        }

        return $html;
    }
    public function htmlHabitacionDblById($id){
        $sql = "SELECT * FROM habitacion
        WHERE id_hotel = '$id'";
        $resultado = $this->conexion_db->query($sql);
        $hotel = $resultado->fetch_all(MYSQLI_ASSOC);

        $html = '';

        foreach($hotel as $value){
            $html .= '<li>$'.number_format($value['precio_doble'], 2).'</li>';
        }

        return $html;
    }



}

?>