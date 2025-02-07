<?php
declare(strict_types=1);  

class Jugador {
    private $dni;
    private $nombreCompleto;
    private $fechaDeNacimiento;
    private $altura;
    private $equipo;
    private $puntosTotales;

    public function __construct(int $dni, string $nombreCompleto, string $fechaDeNacimiento, float $altura, string $equipo, int $puntosTotales) {
        $this->dni = $dni;
        $this->nombreCompleto = $nombreCompleto;
        $this->fechaDeNacimiento = $fechaDeNacimiento;
        $this->altura = $altura;
        $this->equipo = $equipo;
        $this->puntosTotales = $puntosTotales;
    }
    public function getDni(): int {
        return $this->dni;
    }
    public function setDni(int $dni): void {
        $this->dni = $dni;
    }
    
    public function getNombreCompleto(): string {
        return $this->nombreCompleto;
    }
    public function setNombreCompleto(string $nombreCompleto): void {
        $this->nombreCompleto = $nombreCompleto;
    }
    public function getFechaDeNacimiento(): string {
        return $this->fechaDeNacimiento;
    }
    
    public function setFechaDeNacimiento(string $fechaDeNacimiento): void {
        $this->fechaDeNacimiento = $fechaDeNacimiento;
    }
    public function getAltura(): float {
        return $this->altura;
    }
    public function setAltura(float $altura): void {
        $this->altura = $altura;
    }
    public function getEquipo(): string {
        return $this->equipo;
    }
    
    public function setEquipo(string $equipo): void {
        $this->equipo = $equipo;
    }
    public function getPuntosTotales(): int {
        return $this->puntosTotales;
    }
    public function setPuntosTotales(int $puntosTotales): void {
        $this->puntosTotales = $puntosTotales;
    }
}
?>













