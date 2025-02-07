<?php
require_once 'Estudiante.php';
require_once 'Materia.php';

$materia1 = new Materia('Educación Física', 1);
$materia2 = new Materia('Filosofía', 1);

$estudiante1 = new Estudiante(12345678, 'Diego Maradona', '1234567890', 'Calle el cielo o el infierno', 1001);
$estudiante2 = new Estudiante(87654321, 'Simone De Beauvoir', '0987654321', 'Avenida Libertad', 1002);

$estudiante1->agregarMateria($materia1);
$estudiante2->agregarMateria($materia2);

echo "Estudiante: " . $estudiante1->getApyNom() . "\n";
echo "DNI: " . $estudiante1->getDni() . "\n";
echo "Materias:\n";
foreach ($estudiante1->getMaterias() as $materia) {
    echo " - " . $materia->getNombre() . "\n";
}

echo "\nEstudiante: " . $estudiante2->getApyNom() . "\n";
echo "DNI: " . $estudiante2->getDni() . "\n";
echo "Materias:\n";
foreach ($estudiante2->getMaterias() as $materia) {
    echo " - " . $materia->getNombre() . "\n";
}

$estudiante1_serializado = $estudiante1->serializar();
echo "\nEstudiante 1 serializado:\n";
print_r($estudiante1_serializado);

$estudiante1_deserializado = Estudiante::deserializar($estudiante1_serializado);
echo "\nEstudiante 1 deserializado:\n";
print_r($estudiante1_deserializado);
?>
