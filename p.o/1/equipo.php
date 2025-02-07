<?php
declare(strict_types=1);

class Equipo {
    private $nombre;
    private $ciudad;
    private $partidosJugados;
    private $partidosGanados; 

    public function __construct(string $nombre, string $ciudad, int $partidosJugados, int $partidosGanados) {
        $this->nombre = $nombre;
        $this->ciudad = $ciudad;
        $this->partidosJugados = $partidosJugados;
        $this->partidosGanados = $partidosGanados;
    }
    public function getNombre(): string {
        return $this->nombre;
    }
    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }
    public function getCiudad(): string {
        return $this->ciudad;
    }
    public function setCiudad(string $ciudad): void {
        $this->ciudad = $ciudad;
    }
    public function getPartidosJugados(): int {
        return $this->partidosJugados;
    }
    public function setPartidosJugados(int $partidosJugados): void {
        $this->partidosJugados = $partidosJugados;
    }
    public function getPartidosGanados(): int {
        return $this->partidosGanados;
    }
    public function setPartidosGanados(int $partidosGanados): void {
        $this->partidosGanados = $partidosGanados;
    }

    public function __toString(): string {
        return "Equipo: {$this->nombre}, Ciudad: {$this->ciudad}, Partidos Jugados: {$this->partidosJugados}, Partidos Ganados: {$this->partidosGanados}";
    }
}

$equipo1 = new Equipo('River Plate', 'Buenos Aires', 2929, 2000);
echo "$equipo1";
?>
