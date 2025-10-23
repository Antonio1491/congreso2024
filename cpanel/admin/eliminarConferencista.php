<?php
// Empieza buffering para evitar "headers already sent"
ob_start();

include('../class/funciones.php');

if (empty($_GET['id'])) {
    // Fallback inmediato si no viene id
    ob_end_clean();
    header('Location: conferencistas.php', true, 303);
    exit;
}

$id = (int)$_GET['id'];

/**
 * Clase local para evitar conflictos con otras definiciones de Conferencistas.
 * Tiene exactamente el método que necesitamos.
 */
class ConferencistasActions extends Conexion {
    public function eliminarConferencista($idUsuario){
        $sql = "UPDATE usuarios SET id_categoria = 5 WHERE id = ?";
        $stmt = $this->conexion_db->prepare($sql);
        $stmt->bind_param('i', $idUsuario);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }
}

$svc = new ConferencistasActions();
$resultado = $svc->eliminarConferencista($id);

// Determinar a dónde volver
$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

// Seguridad mínima: si el referrer no es del mismo host, ignóralo
if ($referrer) {
    $host = $_SERVER['HTTP_HOST'];
    if (strpos($referrer, $host) === false) {
        $referrer = '';
    }
}

// Fallback en caso de no tener referrer válido
if (!$referrer) {
    // Puedes cambiar esta ruta por la lista de conferencistas que corresponda
    $referrer = 'conferencistas.php';
}

// Si quieres pasar el resultado como querystring (opcional)
// $sep = (parse_url($referrer, PHP_URL_QUERY) ? '&' : '?');
// $referrer .= $sep . 'status=' . ($resultado ? 'ok' : 'error');

// Limpiar cualquier salida y redirigir con 303 (GET "fresco")
ob_end_clean();
header('Location: ' . $referrer, true, 303);
exit;