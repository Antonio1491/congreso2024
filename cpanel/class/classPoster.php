<?php
// Carga Conexion solo si no existe
if (!class_exists('Conexion')) {
    require_once __DIR__ . '/funciones.php';
}

// Evita declarar dos veces la clase
if (!class_exists('Posters')) {

class Posters extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    // === LISTA SOLO REGISTROS ACTIVOS (id_status = 1) ===
    public function getPosters($evento)
    {
        $evento = (int)$evento;

        $sql = "
            SELECT
                p.id        AS poster_id,
                p.id_evento AS poster_evento,
                p.nombre    AS poster_titulo,
                p.documento,
                p.poster,
                u.id        AS usuario_id,
                u.email,
                u.telefono,
                u.ciudad
            FROM posters p
            LEFT JOIN usuarios_posters up ON up.id_poster = p.id
            LEFT JOIN usuarios u          ON u.id = up.id_usuario
            WHERE p.id_evento = {$evento}
              AND p.id_status = 1        /* <<< SOLO activos */
            ORDER BY p.id DESC
        ";

        $resultado = $this->conexion_db->query($sql);

        if (!$resultado) {
            echo '<tr><td colspan="8" class="text-center">Error en consulta</td></tr>';
            return;
        }

        $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
        $carpetaDocumentos = 'https://congresoparques.com/docs/';
        $i = 0;
        $html = '';

        foreach ($respuesta as $resp) {
            $i++;
            $doc    = $resp['documento'] ?? '';
            $poster = $resp['poster'] ?? '';

            $html .= '<tr>';
            $html .= '<td class="text-center">'.$i.'</td>';
            $html .= '<td class="text-center">'.htmlspecialchars($resp['poster_titulo'] ?? '').'</td>';
            $html .= '<td class="text-center">'.htmlspecialchars($resp['email'] ?? '').'</td>';
            $html .= '<td class="text-center">'.htmlspecialchars($resp['telefono'] ?? '').'</td>';
            $html .= '<td class="text-center">'.htmlspecialchars($resp['ciudad'] ?? '').'</td>';

            // Documento
            if ($doc !== '') {
                $html .= '<td class="text-center"><a download href="'.$carpetaDocumentos.$doc.'"><i class="fi-page-export"></i></a></td>';
            } else {
                $html .= '<td class="text-center">No disponible</td>';
            }

            // Poster
            if ($poster !== '') {
                $html .= '<td class="text-center"><a download href="'.$carpetaDocumentos.$poster.'"><i class="fi-page-csv"></i> '.$carpetaDocumentos.$poster.'</a></td>';
            } else {
                $html .= '<td class="text-center">No disponible</td>';
            }

            // Acciones (no mostramos status)
            $html .= '<td class="text-center acciones">
                        <a href="eliminarPoster.php?id='.$resp['poster_id'].'" class="borrar">
                          <i class="fi-trash borrar"></i>
                        </a>
                      </td>';

            $html .= '</tr>';
        }

        echo $html;
    }

    // === BORRADO LÓGICO: id_status = NULL ===
    public function eliminarPoster($id)
    {
        $id = (int)$id;
        $sql = "UPDATE posters SET id_status = NULL WHERE id = {$id}";
        return $this->conexion_db->query($sql);
    }
}

} // cierre if (!class_exists('Posters'))