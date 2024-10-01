<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspección de Presencia de Plagas</title>
    <link rel="stylesheet" href="css/estilo_plagas.css"> <!-- Enlace al archivo CSS externo -->
</head>
<body>

    <div id="alerta" class="alerta hidden">
        <span class="alerta-icono">✔️</span>
        INTRODUCCION
        <br>
        <br>
        Con el propósito de implementar un sistema preventivo de control de plagas, adoptar medidas de saneamiento y cumplir con los parámetros de la Resolución 2674 de 2013, la empresa INVERSIONES LA ESMERALDA 1966 S.A.S, ha desarrollado el siguiente programa de control integral de plagas (MIP), en el cual se establece las líneas de defensa y protección para las diferentes áreas, equipos, utensilios, materia prima, producto terminado y procesos de fabricación ante la amenaza de contaminación que se pueda generar por roedores o insectos.
        <br>
        <br>
        En el presente documento, se describe detalladamente el programa de control de plagas, donde se identifican las plagas comunes en la empresa INVERSIONES LA ESMERALDA 1966 S.A.S, su respectivo  cronograma de control, etc.
    </div>

    <table class="header-table">
        <tr>
            <!-- Celda para el logo -->
            <td rowspan="2" class="logo">
                <img alt="Logo" height="70" src="img/logo pana.png" width="70"/>
            </td>
            <!-- Celda para el título principal -->
            <th colspan="6" class="main-title">INSPECCIÓN DE PRESENCIA DE PLAGAS</th>
            <!-- Celda para la información adicional -->
            <td class="info">Código: ESM2-SGC-FOR-03</td>
        </tr>
        <tr>
            <!-- Segunda fila para el título secundario -->
            <td colspan="6" class="sub-title">SISTEMA DE GESTIÓN DE CALIDAD</td>
            <td class="info">
                <div>Versión: 2-2024</div>
                <div>Fecha: 11/03/2024</div>
            </td>
        </tr>
    </table>

<form  id="inspeccionForm" action="insertar_datos.php" method="POST" onsubmit="enviarFormulario(event)">
    <table class="data-table">
        <thead>
            <tr>
                <th >ÁREA A VERIFICAR</th>
                <td colspan="4">
                <select id="areaVerificar" name="areaVerificar" onchange="cambiarAspectos()">
                    <option disabled selected>SELECCIONE UN ÁREA</option>
                    <option value="BODEGA">BODEGA</option>
                    <option value="EMPAQUE">EMPAQUE</option>
                    <option value="PRODUCCIÓN">PRODUCCIÓN</option>
                    <option value="ZONA EXTERNA Y ALREDEDORES">ZONA EXTERNA Y ALREDEDORES</option>
                </select>
                </td>
                <th colspan="6">Mes y Año</th>
                <td><input type="month" id="mes" name="mes"></td>

            </tr>
            <tr>
                <th>ASPECTO Y ÁREA A VERIFICAR</th>
                <th colspan="8">FECHA</th>
                <th colspan="2">HALLAZGO</th>
                <th>ACCIÓN CORRECTIVA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td id="infoArea1">Rotación y limpieza de estibas correcto</td>
                <td colspan="2"><input type="date" name="fechas[0][]"></td>
                <td colspan="2"><input type="date" name="fechas[0][]"></td>
                <td colspan="2"><input type="date" name="fechas[0][]"></td>
                <td colspan="2"><input type="date" name="fechas[0][]"></td>
                <td id="h1" colspan="2"><input type="text" name="hallazgos[0][]"></td>
                <td colspan="2"><input type="text" name="acciones[0][]"></td>
            </tr>
            <tr>
                <td id="infoArea2">Rotación y limpieza de estibas correcto</td>
                <td colspan="2"><input type="date" name="fechas[1][]"></td>
                <td colspan="2"><input type="date" name="fechas[1][]"></td>
                <td colspan="2"><input type="date" name="fechas[1][]"></td>
                <td colspan="2"><input type="date" name="fechas[1][]"></td>
                <td id="h2" colspan="2"><input type="text" name="hallazgos[1][]"></td>
                <td colspan="2"><input type="text" name="acciones[1][]"></td>
            </tr>
            <tr>
                <td id="infoArea3">Regillas de sifones bien asegurados</td>
                <td colspan="2"><input type="date" name="fechas[2][]"></td>
                <td colspan="2"><input type="date" name="fechas[2][]"></td>
                <td colspan="2"><input type="date" name="fechas[2][]"></td>
                <td colspan="2"><input type="date" name="fechas[2][]"></td>
                <td id="h3" colspan="2"><input type="text" name="hallazgos[2][]"></td>
                <td colspan="2"><input type="text" name="acciones[2][]"></td>
            </tr>
            <tr>
                <td id="infoArea4">Debajo de estibas libre de presencia de plagas</td>
                <td colspan="2"><input type="date" name="fechas[3][]"></td>
                <td colspan="2"><input type="date" name="fechas[3][]"></td>
                <td colspan="2"><input type="date" name="fechas[3][]"></td>
                <td colspan="2"><input type="date" name="fechas[3][]"></td>
                <td id="h4" colspan="2"><input type="text" name="hallazgos[3][]"></td>
                <td colspan="2"><input type="text" name="acciones[3][]"></td>
            </tr>
            <tr>
                <td id="infoArea5">Angeos en buen estado</td>
                <td colspan="2"><input type="date" name="fechas[4][]"></td>
                <td colspan="2"><input type="date" name="fechas[4][]"></td>
                <td colspan="2"><input type="date" name="fechas[4][]"></td>
                <td colspan="2"><input type="date" name="fechas[4][]"></td>
                <td id="h5" colspan="2"><input type="text" name="hallazgos[4][]"></td>
                <td colspan="2"><input type="text" name="acciones[4][]"></td>
            </tr>
            <tr>
                <td id="infoArea6">Alrededor y dentro de recipientes de recoleccion de reciduos sin signos de presencia de plagas</td>
                <td colspan="2"><input type="date" name="fechas[5][]"></td>
                <td colspan="2"><input type="date" name="fechas[5][]"></td>
                <td colspan="2"><input type="date" name="fechas[5][]"></td>
                <td colspan="2"><input type="date" name="fechas[5][]"></td>
                <td id="h6" colspan="2"><input type="text" name="hallazgos[5][]"></td>
                <td colspan="2"><input type="text" name="acciones[5][]"></td>
            </tr>
            <tr>
                <td id="infoArea7">Techo, paredes y pisos sin aberturas o posibles ingresos o anidamiento de plagas</td>
                <td colspan="2"><input type="date" name="fechas[6][]"></td>
                <td colspan="2"><input type="date" name="fechas[6][]"></td>
                <td colspan="2"><input type="date" name="fechas[6][]"></td>
                <td colspan="2"><input type="date" name="fechas[6][]"></td>
                <td id="h7" colspan="2"><input type="text" name="hallazgos[6][]"></td>
                <td colspan="2"><input type="text" name="acciones[6][]"></td>
            </tr>
            <tr>
                <td id="infoArea8">Protecciones de lamparas en buen estado</td>
                <td colspan="2"><input type="date" name="fechas[7][]"></td>
                <td colspan="2"><input type="date" name="fechas[7][]"></td>
                <td colspan="2"><input type="date" name="fechas[7][]"></td>
                <td colspan="2"><input type="date" name="fechas[7][]"></td>
                <td id="h8" colspan="2"><input type="text" name="hallazgos[7][]"></td>
                <td colspan="2"><input type="text" name="acciones[7][]"></td>
            </tr>
            <tr>
                <td id="infoArea9">Puertas sin espacios que permitan ingreso de plagas</td>
                <td colspan="2"><input type="date" name="fechas[8][]"></td>
                <td colspan="2"><input type="date" name="fechas[8][]"></td>
                <td colspan="2"><input type="date" name="fechas[8][]"></td>
                <td colspan="2"><input type="date" name="fechas[8][]"></td>
                <td id="h9" colspan="2"><input type="text" name="hallazgos[8][]"></td>
                <td colspan="2"><input type="text" name="acciones[8][]"></td>
            </tr>
            <tr>
                <td id="infoArea10">Instalaciones electricas aseguradas</td>
                <td colspan="2"><input type="date" name="fechas[9][]"></td>
                <td colspan="2"><input type="date" name="fechas[9][]"></td>
                <td colspan="2"><input type="date" name="fechas[9][]"></td>
                <td colspan="2"><input type="date" name="fechas[9][]"></td>
                <td id="h10" colspan="2"><input type="text" name="hallazgos[9][]"></td>
                <td colspan="2"><input type="text" name="acciones[9][]"></td>
            <tr>
                <td id="infoArea11">Alimentos y empaques sin signos de roido o presencia de plagas</td>
                <td colspan="2"><input type="date" name="fechas[10][]"></td>
                <td colspan="2"><input type="date" name="fechas[10][]"></td>
                <td colspan="2"><input type="date" name="fechas[10][]"></td>
                <td colspan="2"><input type="date" name="fechas[10][]"></td>
                <td id="h11" colspan="2"><input type="text" name="hallazgos[10][]"></td>
                <td colspan="2"><input type="text" name="acciones[10][]"></td>
            </tr>
            <tr>
                <td colspan="2">RESPONSABLE</td>
                <td colspan="4"><input type="text" name="responsable"></td>
                <td colspan="2">VERIFICADO POR</td>
                <td colspan="4"><input type="text" name="verificado"></td>
            </tr>
        </tbody>
    </table>
    <button class="btn2 success3" type="submit" id="submitBtn">Enviar</button>
</form>


    <!-- Nota de aclaración -->
    <p class="notes">NC: NO CUMPLE &nbsp; &nbsp; C: CUMPLE</p>


    <!-- Botón para descargar el Excel -->
    <button onclick="exportarTablaAExcel()" class="btn success">
        <img src="img/excel.png" alt="Icono" style="width: 20px; height: 20px; vertical-align: middle;">
        Descargar en Excel</button>
    <!-- Botón para enviar reporte -->
    <button id="btnEnviarReporte" class="btn2 success2">
        <img src="img/whatsapp2.png" alt="Icono" style="width: 20px; height: 20px; vertical-align: middle;">
        ENVIAR REPORTE
    </button> 

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script>
    function cambiarAspectos() {
        const areaSeleccionada = document.getElementById('areaVerificar').value;
        console.log(areaSeleccionada); // Verifica el valor seleccionado
        
        let aspectos = [];

        switch (areaSeleccionada) {
            case "BODEGA":
                aspectos = [
                    "Uniones entre el piso y las paredes, y paredes y techos en buen estado.",
                    "Rotación y limpieza de estibas correcto.",
                    "Regillas de sifones bien asegurados.",
                    "Debajo de estibas libre de presencia de plaga.",
                    "Angeos en buen estado.",
                    "Alrededor y dentro de recipientes de recoleccion de residuos sin signos de presencia de plagas.",
                    "Techo, paredes y pisos sin aberturas o posibles ingresos o anidamiento de plagas.",
                    "Protecciones de lámparas en buen estado.",
                    "Puertas sin espacios que permitan ingreso de plagas.",
                    "Instalaciones eléctricas aseguradas.",
                    "Alimentos y empaques sin signos de roído o presencia de plagas.",
                    "Barreras de aislamiento en buen estado."
                ];
                break;
            case "EMPAQUE":
                aspectos = [
                    "Uniones entre el piso y las paredes, y paredes y techos en buen estado.",
                    "Rotación y limpieza de estibas correcto.",
                    "Regillas de sifones bien asegurados.",
                    "Angeos en buen estado.",
                    "Alrededor y dentro de recipientes de recoleccion de residuos sin signos de presencia de plagas.",
                    "Techo, paredes y pisos sin aberturas o posibles ingresos o anidamiento de plagas.",
                    "Protecciones de lámparas en buen estado.",
                    "Puertas sin espacios que permitan ingreso de plagas.",
                    "Instalaciones eléctricas aseguradas.",
                    "Alimentos y empaques sin signos de roído o presencia de plagas.",
                    "Barreras de aislamiento en buen estado."
                ];
                break;
            case "PRODUCCIÓN":
                aspectos = [
                    "Uniones entre el piso y las paredes, y paredes y techos en buen estado.",
                    "Debajo, encima y en la parte de atrás de equipos e instalaciones en buen estado.",
                    "Detrás y debajo de equipos, estantes libres de anidamiento de plagas.",
                    "Regillas de sifones bien asegurados.",
                    "Ductos de ventilación y angeos en buen estado.",
                    "Alrededor y dentro de recipientes de recolección de residuos sin signos de presencia de plagas.",
                    "Techo, paredes y pisos sin aberturas o posibles ingresos o anidamiento de plagas.",
                    "Protecciones de lámparas en buen estado.",
                    "Puertas sin espacios que permitan ingreso de plagas.",
                    "Instalaciones eléctricas aseguradas.",
                    "Alimentos y empaques sin signos de roído o presencia de plagas.",
                    "Barreras de aislamiento en buen estado."
                ];
                break;
            case "ZONA EXTERNA Y ALREDEDORES":
                aspectos = [
                    "Revisión de trampas exteriores.",
                    "Trampas 1, 2 y 3 en buen estado.",
                    "Trampa 1.",
                    "Trampa 2.",
                    "Trampa 3.",
                    "Angeos, ventanas y puertas con la hermeticidad que evita el ingreso de plagas.",
                    "Techo, paredes y pisos sin aberturas o posibles ingresos o anidamiento de plagas.",
                    "No se evidencia acumulación de residuos en el área externa.",
                    "Mantenimiento de áreas exteriores en buen estado."
                ];
                break;
        }

        const celdasAspecto = document.querySelectorAll('[id^="infoArea"]');
        
        celdasAspecto.forEach((celda, index) => {
            if (index < aspectos.length) {
                celda.textContent = aspectos[index];
            } else {
                celda.textContent = "";
            }
        });
    }

    function exportarTablaAExcel() {
        // Obtener la tabla HTML
        var tabla = document.querySelector('.data-table');

        // Crear una nueva hoja de cálculo con la tabla
        var wb = XLSX.utils.table_to_book(tabla, {sheet: "Inspección de Plagas"});

        // Generar archivo Excel y descargarlo
        XLSX.writeFile(wb, "inspeccion_plagas.xlsx");
    }

    document.getElementById('btnEnviarReporte').addEventListener('click', function() {
        // Obtener el área a verificar
        let areaVerificar = document.getElementById('areaVerificar').value;

        if (!areaVerificar) {
            alert('Por favor, ingresa un área a verificar.');
            return;
        }

        // Seleccionar todas las celdas de aspecto y hallazgo
        let aspectoCeldas = document.querySelectorAll('[id^="infoArea"]');
        let hallazgoCeldas = document.querySelectorAll('[id^="h"]');

        // Inicializar el mensaje
        let mensaje = `*Área a verificar:* ${areaVerificar}\n*Aspectos y Hallazgos:* \n`;

        // Variable para comprobar si hay hallazgos
        let hayHallazgos = false;

        // Recorrer las celdas de aspecto y hallazgo y agregar al mensaje
        aspectoCeldas.forEach((aspectoCelda, index) => {
            let hallazgo = hallazgoCeldas[index].textContent.trim();
            if (hallazgo) {
                mensaje += `- ${aspectoCelda.textContent}: ${hallazgo}\n`;
                hayHallazgos = true;
            }
        });

        // Si no hay hallazgos, se muestra un mensaje indicando que no hay problemas
        if (!hayHallazgos) {
            mensaje += 'No se encontraron hallazgos en esta inspección.\n';
        }

        // Generar un enlace para WhatsApp
        let whatsappUrl = `https://api.whatsapp.com/send?phone=573125352884&text=${encodeURIComponent(mensaje)}`;
        window.open(whatsappUrl, '_blank');
        alert(mensaje); // Muestra el mensaje final en un alert por ahora
    });

    <script>
    function enviarFormulario(event) {
        // Prevenir el envío por defecto del formulario
        event.preventDefault();

        // Obtener el valor de cada campo
        const areaVerificar = document.getElementById('areaVerificar').value;
        const mes = document.getElementById('mes').value;
        const primeraFecha = document.querySelector('input[type="date"]').value; // Solo la primera fecha
        const hallazgos = document.querySelectorAll('input[name^="hallazgos"]');
        const acciones = document.querySelectorAll('input[name^="acciones"]');
        const responsable = document.querySelector('input[name="responsable"]').value;
        const verificado = document.querySelector('input[name="verificado"]').value;

        // Verificar si 'Área a Verificar' está seleccionada
        if (areaVerificar === "") {
            alert("Por favor, seleccione un área a verificar.");
            return; // Detener la función si falta información
        }

        // Verificar si el 'Mes y Año' está seleccionado
        if (mes === "") {
            alert("Por favor, seleccione un mes y año.");
            return;
        }

        // Verificar solo la primera fecha
        if (primeraFecha === "") {
            alert("Por favor, complete la primera fecha.");
            return;
        }

        // Verificar hallazgos
        for (let i = 0; i < hallazgos.length; i++) {
            if (hallazgos[i].value === "") {
                alert("Por favor, complete todos los hallazgos.");
                return;
            }
        }

        // Verificar acciones correctivas
        for (let i = 0; i < acciones.length; i++) {
            if (acciones[i].value === "") {
                alert("Por favor, complete todas las acciones correctivas.");
                return;
            }
        }

        // Verificar el responsable
        if (responsable === "") {
            alert("Por favor, ingrese el nombre del responsable.");
            return;
        }

        // Verificar quién lo verificó
        if (verificado === "") {
            alert("Por favor, ingrese el nombre de la persona que verificó.");
            return;
        }

        // Si todas las validaciones pasan, entonces enviamos el formulario
        document.getElementById('inspeccionForm').submit();
    }
</script>

</script>
</body>
</html>