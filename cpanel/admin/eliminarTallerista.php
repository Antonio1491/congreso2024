<?php
include('../class/funciones.php');

$id = $_GET['id'];

$tallerista = new Tallerista();
$resultado = $tallerista->eliminar($id);

if ($resultado) {
    echo "<script>window.history.go(-1);</script>";
} else {
    echo '<script>
        Swal.fire({
            title: "Error al eliminar el registro",
            icon: "warning",
        }).then(() => window.history.go(-1));
    </script>';
}
?>