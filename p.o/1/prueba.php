<?php
require_once __DIR__ . '/funcionesGlobales.php';  // Ruta correcta desde el directorio actual

$jugadoresAltos = jugadoresMasAltos();  // Llamada a la función que obtiene los jugadores más altos
echo "Los jugadores más altos son:<br>";
foreach ($jugadoresAltos as $jugador) {
    echo $jugador . "<br>";
}
?>

