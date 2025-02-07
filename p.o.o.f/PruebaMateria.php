<?php
require_once 'Estudiante.php';
require_once 'Materia.php';

$materia1 = new Materia('Educación Física', 1);
$materia2 = new Materia('Filosofía', 1);

$estudiante1 = new Estudiante(12345678, 'Diego Maradona', '1234567890', 'Calle el cielo o el infierno', 1001);
$estudiante2 = new Estudiante(87654321, 'Simone De Beauvoir', '0987654321', 'Avenida Libertad', 1002);

$materia1->agregarEstudiante($estudiante1);
$materia1->agregarEstudiante($estudiante2);
$materia2->agregarEstudiante($estudiante2);

echo "Materia: " . $materia1->getNombre() . "\n";
echo "Año de Cursada: " . $materia1->getAnioCursada() . "\n";
echo "Estudiantes:\n";
foreach ($materia1->getEstudiantes() as $estudiante) {
    echo " - " . $estudiante->getApyNom() . "\n";
}

echo "\nMateria: " . $materia2->getNombre() . "\n";
echo "Año de Cursada: " . $materia2->getAnioCursada() . "\n";
echo "Estudiantes:\n";
foreach ($materia2->getEstudiantes() as $estudiante) {
    echo " - " . $estudiante->getApyNom() . "\n";
}

$materia1_serializada = $materia1->serializar();
echo "\nMateria 1 serializada:\n";
print_r($materia1_serializada);

$materia1_deserializada = Materia::deserializar($materia1_serializada);
echo "\nMateria 1 deserializada:\n";
print_r($materia1_deserializada);
?>
