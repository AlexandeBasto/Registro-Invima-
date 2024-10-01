
<?php
// conexion.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inversiones"; // Nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$areaVerificar = $_POST['areaVerificar'];
$mes = $_POST['mes'];
$responsable = $_POST['responsable'];
$verificado = $_POST['verificado'];

// Preparar una consulta para cada fila del formulario
for ($i = 0; $i < count($_POST['fechas']); $i++) {
    $fechas = $_POST['fechas'][$i]; // Las fechas en cada fila
    $hallazgos = $_POST['hallazgos'][$i][0]; // Los hallazgos en cada fila
    $acciones = $_POST['acciones'][$i][0]; // Las acciones correctivas en cada fila
    $aspecto = "Aspecto " . ($i + 1); // Este valor puede ser dinámico según tu lógica de "Aspecto"

        // Declarar los aspectos de cada área
        $aspectosPorArea = [
            "BODEGA" => [
                "Uniones entre el piso y las paredes, y paredes y techos en buen estado",
                "Rotación y limpieza de estibas correcto",
                "Regillas de sifones bien asegurados",
                "Debajo de estibas libre de presencia de plaga",
                "Angeos en buen estado",
                "Alrededor y dentro de recipientes de recolección de residuos sin signos de plagas",
                "Techo, paredes y pisos sin aberturas o posibles ingresos o anidamiento de plagas",
                "Protecciones de lámparas en buen estado",
                "Puertas sin espacios que permitan ingreso de plagas",
                "Instalaciones eléctricas aseguradas",
                "Alimentos y empaques sin signos de roído o presencia de plagas",
                "Barreras de aislamiento en buen estado"
            ],
            "EMPAQUE" => [
                "Uniones entre el piso y las paredes, y paredes y techos en buen estado",
                "Rotación y limpieza de estibas correcto",
                "Regillas de sifones bien asegurados",
                "Angeos en buen estado",
                "Alrededor y dentro de recipientes de recolección de residuos sin signos de presencia de plagas",
                "Techo, paredes y pisos sin aberturas o posibles ingresos o anidamiento de plagas",
                "Protecciones de lámparas en buen estado",
                "Puertas sin espacios que permitan ingreso de plagas",
                "Instalaciones eléctricas aseguradas",
                "Alimentos y empaques sin signos de roído o presencia de plagas",
                "Barreras de aislamiento en buen estado"
            ],
            "PRODUCCIÓN" => [
                "Uniones entre el piso y las paredes, y paredes y techos en buen estado",
                "Debajo, encima y en la parte de atrás de equipos e instalaciones en buen estado",
                "Detrás y debajo de equipos, estantes libres de anidamiento de plagas",
                "Regillas de sifones bien asegurados",
                "Ductos de ventilación y angeos en buen estado",
                "Alrededor y dentro de recipientes de recolección de residuos sin signos de presencia de plagas",
                "Techo, paredes y pisos sin aberturas o posibles ingresos o anidamiento de plagas",
                "Protecciones de lámparas en buen estado",
                "Puertas sin espacios que permitan ingreso de plagas",
                "Instalaciones eléctricas aseguradas",
                "Alimentos y empaques sin signos de roído o presencia de plagas",
                "Barreras de aislamiento en buen estado"
            ],
            "ZONA EXTERNA Y ALREDEDORES" => [
                "Revisión de trampas exteriores",
                "Trampas 1, 2 y 3 en buen estado",
                "Trampa 1",
                "Trampa 2",
                "Trampa 3",
                "Angeos, ventanas y puertas con la hermeticidad que evita el ingreso de plagas",
                "Techo, paredes y pisos sin aberturas o posibles ingresos o anidamiento de plagas",
                "No se evidencia acumulación de residuos en el área externa",
                "Mantenimiento de áreas exteriores en buen estado"
            ]
        ];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO inspeccion_plagas (area_verificar, mes_año, aspecto, fechas, hallazgos, acciones, responsable, verificado)
            VALUES ('$areaVerificar', '$mes', '$aspecto', '".json_encode($fechas)."', '$hallazgos', '$acciones', '$responsable', '$verificado')";

    if ($conn->query($sql) === TRUE) {
        echo "Datos insertados correctamente para el aspecto $aspecto.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>



