<?php
include('../class/funciones.php');
$id = $_GET['id'];

$eliminar = new Programa();
$resultado = $eliminar->eliminarBloquePrograma($id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Eliminar</title>
</head>
<body>

<?php if ($resultado) : ?>

<script>
Swal.fire({
    icon: "success",
    title: "Eliminado con éxito",
    text: "El bloque fue eliminado correctamente",
    confirmButtonText: "OK"
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = "programa.php";
    }
});
</script>

<?php else : ?>

<script>
Swal.fire({
    icon: "error",
    title: "Error",
    text: "No se pudo eliminar el bloque",
    confirmButtonText: "OK"
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = "programa.php";
    }
});
</script>

<?php endif; ?>

</body>
</html>