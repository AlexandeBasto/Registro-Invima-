<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inversiones";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener capacitaciones
$sql = "SELECT id, nombre, fecha FROM capacitaciones";
$result = $conn->query($sql);

$capacitaciones = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $capacitaciones[] = $row;
    }
}

// Devolver JSON
echo json_encode($capacitaciones);

$conn->close();
?>
