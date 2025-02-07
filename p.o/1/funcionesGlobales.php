<?php
declare(strict_types=1);

function jugadoresMasAltos(): array {
    $jugadores = [];
    $maxAltura = 0;

    // Usar la ruta correcta relativa al directorio actual (__DIR__ se refiere a donde está el script actual)
    $archivo = fopen(__DIR__ . '/2024-TR-jugadores.csv', 'r');  

    if ($archivo === false) {
        die("No se pudo abrir el archivo CSV");
    }

    while (($data = fgetcsv($archivo)) !== false) {
        // Validar que los datos sean correctos
        if (isset($data[0], $data[3])) {
            $nombre = $data[0]; // Nombre del jugador
            $altura = (float)$data[3]; // Altura del jugador (columna 3)

            if ($altura > $maxAltura) {
                $maxAltura = $altura;  // Actualizar la altura máxima
                $jugadores = [$nombre];  // Resetear la lista de jugadores
            } elseif ($altura == $maxAltura) {
                $jugadores[] = $nombre;  // Añadir el jugador a la lista
            }
        }
    }

    fclose($archivo);

    return $jugadores;
}
?>
