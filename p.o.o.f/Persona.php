<?php
declare(strict_types=1);

abstract class Persona {

    protected int $dni;
    protected string $apy_nom;
    protected string $telefono;
    protected string $direccion;

    public function __construct(int $dni, string $apy_nom, string $telefono, string $direccion) {
        $this->setDni($dni); 
        $this->setApyNom($apy_nom); 
        $this->setTelefono($telefono); 
        $this->setDireccion($direccion); 
    }

    public function getDni(): int {
        return $this->dni;
    }

    public function setDni(int $dni): void {
        if ($dni <= 0) {
            throw new InvalidArgumentException("El DNI debe ser un número positivo.");
        }
        $this->dni = $dni;
    }

    public function getApyNom(): string {
        return $this->apy_nom;
    }

    public function setApyNom(string $apy_nom): void {
        if (empty($apy_nom)) {
            throw new InvalidArgumentException("El nombre y apellido no pueden estar vacíos.");
        }
        $this->apy_nom = $apy_nom;
    }

    public function getTelefono(): string {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): void {
        // Validación simple para teléfono (debe ser numérico y tener 10 caracteres)
        if (!preg_match('/^\d{10}$/', $telefono)) {
            throw new InvalidArgumentException("El teléfono debe ser un número de 10 dígitos.");
        }
        $this->telefono = $telefono;
    }

    public function getDireccion(): string {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): void {
        if (empty($direccion)) {
            throw new InvalidArgumentException("La dirección no puede estar vacía.");
        }
        $this->direccion = $direccion;
    }
}
?>
