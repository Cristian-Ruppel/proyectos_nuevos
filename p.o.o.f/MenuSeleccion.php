<?php
// Clase Menu
class Menu {
    // Método para mostrar las opciones del menú
    public function mostrarMenu() {
        // Mostrar las opciones del menú
        echo "<h2>Selecciona una opción:</h2>";
        echo "<form method='POST' action=''>"; // El formulario no tiene una acción específica
        echo "<input type='submit' name='opcion' value='1' /> Cargar Materias<br />";
        echo "<input type='submit' name='opcion' value='2' /> Cargar Estudiantes<br />";
        echo "<input type='submit' name='opcion' value='3' /> Asignar Estudiantes a Materias<br />";
        echo "<input type='submit' name='opcion' value='4' /> Agregar Notas a Estudiantes<br />";
        echo "<input type='submit' name='opcion' value='5' /> Cargar desde archivo CSV<br />";
        echo "<input type='submit' name='opcion' value='6' /> Salir<br />";
        echo "</form>";

        // Verificar cuál opción fue seleccionada y ejecutar la acción correspondiente
        if (isset($_POST['opcion'])) {
            $opcion = $_POST['opcion'];
            $this->procesarOpcion($opcion); // Llamada al método para procesar la opción seleccionada
        }
    }

    // Método para procesar las opciones seleccionadas
    private function procesarOpcion($opcion) {
        switch ($opcion) {
            case 1:
                $this->cargarMateria();
                break;
            case 2:
                $this->cargarEstudiante();
                break;
            case 3:
                $this->asignarEstudianteMateria();
                break;
            case 4:
                $this->agregarNota();
                break;
            case 5:
                $this->mostrarOpcionCargaCSV(); // Mostrar opciones para cargar desde archivo CSV
                break;
            case 6:
                echo "Saliendo...\n";
                exit();  // Termina la ejecución del script (no es necesario break después de exit)
            default:
                echo "Opción inválida. Intente nuevamente.\n";
                break;
        }
    }

    // Funciones para cada una de las opciones
    public function cargarMateria() {
        echo "<h3>Ingrese el nombre de la materia:</h3>";
        echo "<form method='POST' action=''>
            <input type='text' name='nombreMateria' placeholder='Nombre de la materia'>
            <input type='text' name='anioMateria' placeholder='Año de la materia'>
            <input type='submit' name='guardarMateria' value='Guardar Materia'>
        </form>";

        if (isset($_POST['guardarMateria'])) {
            $nombre = $_POST['nombreMateria'];
            $anio = $_POST['anioMateria'];
            echo "<p>Materia '$nombre' del año $anio cargada correctamente.</p>";
        }
    }

    public function cargarEstudiante() {
        echo "<h3>Ingrese el nombre del estudiante:</h3>";
        echo "<form method='POST' action=''>
            <input type='text' name='nombreEstudiante' placeholder='Nombre del estudiante'>
            <input type='text' name='dniEstudiante' placeholder='DNI del estudiante'>
            <input type='text' name='direccionEstudiante' placeholder='Dirección del estudiante'>
            <input type='text' name='telefonoEstudiante' placeholder='Teléfono del estudiante'>
            <input type='submit' name='guardarEstudiante' value='Guardar Estudiante'>
        </form>";

        if (isset($_POST['guardarEstudiante'])) {
            $nombre = $_POST['nombreEstudiante'];
            $dni = $_POST['dniEstudiante'];
            $direccion = $_POST['direccionEstudiante'];
            $telefono = $_POST['telefonoEstudiante'];
            echo "<p>Estudiante '$nombre' con DNI $dni cargado correctamente.</p>";
        }
    }

    public function asignarEstudianteMateria() {
        echo "<h3>Ingrese el nombre de la materia:</h3>";
        echo "<form method='POST' action=''>
            <input type='text' name='materia' placeholder='Materia'>
            <input type='text' name='dniEstudiante' placeholder='DNI del estudiante'>
            <input type='submit' name='asignarEstudiante' value='Asignar Estudiante'>
        </form>";

        if (isset($_POST['asignarEstudiante'])) {
            $materia = $_POST['materia'];
            $dni = $_POST['dniEstudiante'];
            echo "<p>Estudiante con DNI $dni asignado a la materia '$materia'.</p>";
        }
    }

    public function agregarNota() {
        echo "<h3>Ingrese el DNI del estudiante:</h3>";
        echo "<form method='POST' action=''>
            <input type='text' name='dniEstudiante' placeholder='DNI del estudiante'>
            <input type='text' name='materia' placeholder='Materia'>
            <input type='text' name='nota' placeholder='Nota'>
            <input type='submit' name='agregarNota' value='Agregar Nota'>
        </form>";

        if (isset($_POST['agregarNota'])) {
            $dni = $_POST['dniEstudiante'];
            $materia = $_POST['materia'];
            $nota = $_POST['nota'];
            echo "<p>Nota '$nota' agregada al estudiante con DNI $dni en la materia '$materia'.</p>";
        }
    }

    public function mostrarOpcionCargaCSV() {
        echo "<h3>Prueba de carga desde archivo CSV...</h3>";
        echo "<h4>Seleccione qué cargar:</h4>";
        echo "<form method='POST' action=''>
            <input type='submit' name='cargarCSV' value='1' /> Cargar estudiantes desde archivo CSV<br />
            <input type='submit' name='cargarCSV' value='2' /> Cargar materias desde archivo CSV<br />
        </form>";

        if (isset($_POST['cargarCSV'])) {
            $opcionCSV = $_POST['cargarCSV'];

            switch ($opcionCSV) {
                case 1:
                    $this->cargarEstudiantesDesdeCSV();
                    break;
                case 2:
                    $this->cargarMateriasDesdeCSV();
                    break;
                default:
                    echo "<p>Opción no válida. Intente nuevamente.</p>";
                    break;
            }
        }
    }

    public function cargarEstudiantesDesdeCSV() {
        echo "<h3>Cargar estudiantes desde archivo CSV:</h3>";
        echo "<form method='POST' enctype='multipart/form-data' action=''>
            <input type='file' name='archivoEstudiantes' accept='.csv'>
            <input type='submit' name='procesarEstudiantes' value='Cargar Estudiantes'>
        </form>";

        if (isset($_POST['procesarEstudiantes'])) {
            $archivo = $_FILES['archivoEstudiantes']['tmp_name'];

            if (file_exists($archivo)) {
                $lineas = file($archivo);
                foreach ($lineas as $linea) {
                    $datos = str_getcsv($linea);
                    echo "Cargando estudiante: " . implode(", ", $datos) . "<br />"; // Imprimir datos del CSV
                }
                echo "<p>Carga masiva de estudiantes completada.</p>";
            } else {
                echo "<p>Error: El archivo no existe.</p>";
            }
        }
    }

    public function cargarMateriasDesdeCSV() {
        echo "<h3>Cargar materias desde archivo CSV:</h3>";
        echo "<form method='POST' enctype='multipart/form-data' action=''>
            <input type='file' name='archivoMaterias' accept='.csv'>
            <input type='submit' name='procesarMaterias' value='Cargar Materias'>
        </form>";

        if (isset($_POST['procesarMaterias'])) {
            $archivo = $_FILES['archivoMaterias']['tmp_name'];

            if (file_exists($archivo)) {
                $lineas = file($archivo);
                foreach ($lineas as $linea) {
                    $datos = str_getcsv($linea);
                    echo "Cargando materia: " . implode(", ", $datos) . "<br />"; // Imprimir datos del CSV
                }
                echo "<p>Carga masiva de materias completada.</p>";
            } else {
                echo "<p>Error: El archivo no existe.</p>";
            }
        }
    }
}
?>
