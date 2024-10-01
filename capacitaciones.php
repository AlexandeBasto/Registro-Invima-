<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo_capaci.css">
    <title>Cronograma de Capacitaciones</title>
</head>
<body>
    <div id="alerta" class="alerta hidden">
        <span class="alerta-icono">✔️</span>
        Introducción a las Capacitaciones en INVERSIONES LA ESMERALDA 1966 SAS
        <br>
        Las capacitaciones en INVERSIONES LA ESMERALDA 1966 SAS son esenciales para asegurar que el personal cuente con los conocimientos y habilidades necesarias para cumplir con los estándares de calidad, higiene y seguridad en la producción de alimentos. El objetivo principal de las capacitaciones es mejorar el desempeño del equipo de trabajo, reducir los riesgos laborales y garantizar el cumplimiento de la normativa vigente en el sector alimentario.
        <br>
        En Colombia, el Decreto 3075 de 1997 establece que todo el personal que manipule alimentos debe estar capacitado en buenas prácticas de manufactura, higiene personal, y manejo adecuado de los equipos y utensilios. Esto es fundamental para prevenir la contaminación de los alimentos durante su producción y garantizar la seguridad alimentaria.
        <br>
        Por otro lado, el Decreto 1072 de 2015, que compila las normas relacionadas con la seguridad y salud en el trabajo, exige que las empresas, incluidas las panaderías, implementen programas de capacitación en prevención de riesgos laborales. Estas capacitaciones deben estar orientadas a la manipulación segura de maquinaria, el uso adecuado de productos de limpieza y desinfección, y las medidas de protección personal.
        <br>
        La implementación de un programa de capacitaciones continuo en INVERSIONES LA ESMERALDA 1966 SAS no solo asegura el cumplimiento de la ley, sino que también contribuye a la mejora continua de los procesos productivos, garantizando la calidad y seguridad de los productos elaborados.
    </div>

    <div class="container">
        <h1>Cronograma de Capacitaciones</h1>

        <!-- Formulario para agregar capacitación -->
        <div class="formulario">
            <label for="nombre">Nombre de la capacitación:</label>
            <input type="text" id="nombre" placeholder="Ingrese el nombre de la capacitación" required>
            
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" required>

            <button onclick="agregarCapacitacion()">Agregar Capacitación</button>
        </div>

        <!-- Tabla para mostrar el cronograma de capacitaciones -->
        <div class="cronograma">
            <h2>Próximas Capacitaciones</h2>
            <table id="tablaCapacitaciones">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="cuerpoTabla">
                    <!-- Las capacitaciones se agregarán aquí dinámicamente -->
                </tbody>
            </table>
        </div>

        <!-- Área de notificaciones -->
        <div class="notificaciones" id="notificaciones">
            <h3>Próximas Notificaciones</h3>
            <ul id="listaNotificaciones">
                <!-- Las notificaciones aparecerán aquí -->
            </ul>
        </div>
    </div>

    <script>
        // Mostrar la alerta al cargar la página
        document.getElementById('alerta').classList.remove('hidden');

        // Ocultar la alerta al hacer clic en la pantalla
        document.addEventListener('click', function() {
            document.getElementById('alerta').classList.add('hidden');
        });

        // Función para agregar capacitación
        function agregarCapacitacion() {
            const nombre = document.getElementById('nombre').value;
            const fecha = document.getElementById('fecha').value;
            
            if (nombre === '' || fecha === '') {
                alert('Por favor, complete todos los campos.');
                return;
            }

            // Enviar datos a PHP para agregar a la base de datos
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "php/agregar_capacitacion.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (this.status === 200) {
                    alert(this.responseText);
                    cargarCapacitaciones();
                }
            };
            xhr.send("nombre=" + encodeURIComponent(nombre) + "&fecha=" + encodeURIComponent(fecha));

            // Limpiar el formulario
            document.getElementById('nombre').value = '';
            document.getElementById('fecha').value = '';
        }

        // Función para cargar capacitaciones
        function cargarCapacitaciones() {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "php/obtener_capacitaciones.php", true);
            xhr.onload = function() {
                if (this.status === 200) {
                    const capacitaciones = JSON.parse(this.responseText);
                    mostrarCapacitaciones(capacitaciones);
                }
            };
            xhr.send();
        }

// Función para mostrar capacitaciones en la tabla
function mostrarCapacitaciones(capacitaciones) {
    const cuerpoTabla = document.getElementById('cuerpoTabla');
    cuerpoTabla.innerHTML = '';

    capacitaciones.forEach(cap => {
        const nuevaFila = cuerpoTabla.insertRow();

        const celdaNombre = nuevaFila.insertCell(0);
        const celdaFecha = nuevaFila.insertCell(1);
        const celdaAcciones = nuevaFila.insertCell(2);

        celdaNombre.innerText = cap.nombre;
        celdaFecha.innerText = cap.fecha;

        // Calcular la diferencia en días
        const fechaCapacitacion = new Date(cap.fecha);
        const fechaActual = new Date();
        const diffTime = Math.abs(fechaCapacitacion - fechaActual);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        // Resaltar si la capacitación es en 7 días o menos
        if (diffDays <= 7) {
            nuevaFila.classList.add('resaltar');
        }

        // Botón para eliminar capacitación
        const botonEliminar = document.createElement('button');
        botonEliminar.innerText = 'Eliminar';
        botonEliminar.onclick = function () {
            eliminarCapacitacion(cap.id);
        };
        celdaAcciones.appendChild(botonEliminar);
    });
}

        // Función para eliminar capacitación
        function eliminarCapacitacion(id) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "php/eliminar_capacitacion.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (this.status === 200) {
                    alert(this.responseText);
                    cargarCapacitaciones();
                }
            };
            xhr.send("id=" + id);
        }

        // Cargar capacitaciones cuando se cargue la página
        window.onload = cargarCapacitaciones;
        
        // Función para crear notificaciones
function crearNotificacion(nombre, fecha) {
    const notificaciones = document.getElementById('listaNotificaciones');
    const fechaCapacitacion = new Date(fecha);
    const fechaActual = new Date();

    const diffTime = Math.abs(fechaCapacitacion - fechaActual);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    if (diffDays <= 7) {
        const nuevaNotificacion = document.createElement('li');
        nuevaNotificacion.innerText = `Capacitación "${nombre}" en ${diffDays} días.`;
        notificaciones.appendChild(nuevaNotificacion);
    }
}
    </script>
</body>
</html>
