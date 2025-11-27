<?php
$conexion = new mysqli("localhost", "root", "", "registro_autos");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$anio = $_POST['anio'];
$placas = $_POST['placas'];
$color = $_POST['color'];

$sql = "INSERT INTO vehiculos (marca, modelo, anio, placas, color)
        VALUES ('$marca', '$modelo', '$anio', '$placas', '$color')";

if ($conexion->query($sql) === TRUE) {
    echo "Vehículo guardado con éxito<br>";
    echo "<a href='index.php'>Registrar otro</a><br>";
    echo "<a href='lista.php'>Ver lista</a>";
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();
?>
