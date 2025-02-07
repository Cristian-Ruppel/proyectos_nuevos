<?php
require_once 'Persona.php';
require_once 'Estudiante.php';
require_once 'Materia.php';
require_once 'IGestion.php';
require_once 'ISerializar.php';

$estudiante1 = new Estudiante(12345678, 'Diego Maradon', '1234567890', 'Calle el cielo o el infierno', 1001);
$estudiante2 = new Estudiante(87654321, 'Simone De Beauvoir', '0987654321', 'Avenida Libertad', 1002);

$materia1 = new Materia('educacion fisica', 1);
$materia2 = new Materia('Filosofia', 1);

$estudiante1->agregarMateria($materia1);
$estudiante2->agregarMateria($materia1);
$estudiante2->agregarMateria($materia2);

$materia1->agregarEstudiante($estudiante1);
$materia1->agregarEstudiante($estudiante2);
$materia2->agregarEstudiante($estudiante2);

echo "Estudiantes de la materia: " . $materia1->getNombre() . "\n";
foreach ($materia1->getEstudiantes() as $estudiante) {
    echo " - " . $estudiante->getApyNom() . "\n";
}

$estudiante1_serializado = $estudiante1->serializar();
echo "\nEstudiante 1 serializado: \n";
print_r($estudiante1_serializado);

$estudiante1_deserializado = Estudiante::deserializar($estudiante1_serializado);
echo "\nEstudiante 1 deserializado: \n";
print_r($estudiante1_deserializado);

$estudiante1->guardar();
$estudiante1->editar();
$estudiante1->eliminar();
?>
