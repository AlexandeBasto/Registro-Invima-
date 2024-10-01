<?php
$servername = "localhost"; // Cambia esto si tu base de datos está en otro servidor
$username = "root"; // Cambia esto por tu usuario de la base de datos
$password = ""; // Cambia esto por tu contraseña de la base de datos
$dbname = "inversiones"; // Asegúrate de que el nombre de la base de datos sea correcto

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];

// Insertar capacitación
$sql = "INSERT INTO capacitaciones (nombre, fecha) VALUES ('$nombre', '$fecha')";

if ($conn->query($sql) === TRUE) {
    echo "Capacitación agregada correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
