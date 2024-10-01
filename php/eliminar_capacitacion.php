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

// Obtener ID
$id = $_POST['id'];

// Eliminar capacitación
$sql = "DELETE FROM capacitaciones WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Capacitación eliminada correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

