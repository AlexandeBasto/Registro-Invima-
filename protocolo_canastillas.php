<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo_canast.css">
    <title>Protocolo Canastillas</title>
</head>
<body>
    <?php
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "inversiones");

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Inserción de datos si el formulario se envía
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $desinfectante = $_POST['desinfectante'];
        $periodicidad = $_POST['periodicidad'];
        $fecha = $_POST['fecha'];
        $area = $_POST['area'];

        // Consulta SQL para insertar los datos
        $sql = "INSERT INTO protocolo_canastillas (desinfectante, periodicidad, fecha, area) 
                VALUES ('$desinfectante', '$periodicidad', '$fecha', '$area')";

        if ($conn->query($sql) === TRUE) {
            echo "Datos insertados correctamente.";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Obtener la próxima fecha del protocolo
    $result = $conn->query("SELECT fecha, periodicidad FROM protocolo_canastillas ORDER BY fecha DESC LIMIT 1");
    $proxima_fecha = "";
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fecha_actual = new DateTime($row['fecha']);

        // Calcular próxima fecha dependiendo de la periodicidad
        if ($row['periodicidad'] == "SEMANAL") {
            $fecha_actual->modify('+7 days');
        } elseif ($row['periodicidad'] == "MENSUAL") {
            $fecha_actual->modify('+1 month');
        }
        $proxima_fecha = $fecha_actual->format('Y-m-d');
    }
    ?>

    <!-- Formulario -->
    <form method="POST">
        <table class="tabla-protocolo">
            <thead>
                <tr>
                    <td colspan="12">
                        PROTOCOLO CANASTILLAS
                    </td>
                </tr>
                <tr>
                    <th>Desinfectante Utilizado</th>
                    <th>Periodicidad</th>
                    <th>Fecha</th>
                    <th>Área de Lavado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="desinfectante" required></td>
                    <td>
                        <select name="periodicidad" required>
                            <option value="SEMANAL">SEMANAL</option>
                            <option value="MENSUAL">MENSUAL</option>
                        </select>
                    </td>
                    <td><input type="date" name="fecha" required></td>
                    <td><input type="text" name="area" required></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="12">
                        PROXIMO PROTOCOLO: 
                        <span class="proxima-fecha" style="color: red;">
                            <?php echo $proxima_fecha; ?>
                        </span>
                    </td>
                </tr>
            </tfoot>
        </table>
        <input type="submit" value="Guardar">
    </form>

    <!-- Mostrar registros de la base de datos -->
    <h2>Registros del Protocolo Canastillas</h2>
    <table class="tabla-registros">
        <thead>
            <tr>
                <th>ID</th>
                <th>Desinfectante</th>
                <th>Periodicidad</th>
                <th>Fecha</th>
                <th>Área de Lavado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consultar los registros de la base de datos
            $result = $conn->query("SELECT * FROM protocolo_canastillas ORDER BY fecha DESC");

            if ($result->num_rows > 0) {
                // Mostrar cada registro
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['desinfectante'] . "</td>";
                    echo "<td>" . $row['periodicidad'] . "</td>";
                    echo "<td>" . $row['fecha'] . "</td>";
                    echo "<td>" . $row['area'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay registros disponibles.</td></tr>";
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
