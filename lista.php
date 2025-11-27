<?php
$conexion = new mysqli("localhost", "root", "", "registro_autos");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT * FROM vehiculos";
$res = $conexion->query($sql);

echo "<h2>Vehículos Registrados</h2>";
echo "<a href='index.php'>Registrar nuevo</a><br><br>";

if ($res->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>ID</th><th>Marca</th><th>Modelo</th><th>Año</th><th>Placas</th><th>Color</th><th>Eliminar</th></tr>";

    
    while ($fila = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$fila['id']."</td>";
        echo "<td>".$fila['marca']."</td>";
        echo "<td>".$fila['modelo']."</td>";
        echo "<td>".$fila['anio']."</td>";
        echo "<td>".$fila['placas']."</td>";
        echo "<td>".$fila['color']."</td>";
	echo "<td>
      		<a href='eliminar.php?id=".$fila['id']."' 
         	onclick=\"return confirm('¿Seguro que deseas eliminar este vehículo?')\">
         	🗑 Eliminar
      	</a>
      </td>";

        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Aún no hay vehículos registrados.";
}

$conexion->close();
?>
