<?php
$conexion = new mysqli("localhost", "root", "", "registro_autos");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM vehiculos WHERE id = $id";

if ($conexion->query($sql) === TRUE) {
    echo "Vehículo eliminado correctamente.<br>";
    echo "<a href='lista.php'>Volver a la lista</a>";
} else {
    echo "Error al eliminar: " . $conexion->error;
}

$conexion->close();
?>
