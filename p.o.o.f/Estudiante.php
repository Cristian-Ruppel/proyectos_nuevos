<?php
declare(strict_types=1);

require_once 'Persona.php';
require_once 'IGestion.php';
require_once 'ISerializar.php';

class Estudiante extends Persona implements IGestion, ISerializar {
    private array $materias = [];
    private int $nro_legajo;

    public function __construct(int $dni, string $apy_nom, string $telefono, string $direccion, int $nro_legajo) {
        parent::__construct($dni, $apy_nom, $telefono, $direccion);
        $this->nro_legajo = $nro_legajo;
    }

    public function guardar(): void {
    }

    public function editar(): void {
    }

    public function eliminar(): void {
    }

    public function listar(): array {
        return [];
    }

    public function seleccionarUno(): object {
        return $this;
    }

    public function serializar(): array {
        return [
            'dni' => $this->getDni(),
            'apy_nom' => $this->getApyNom(),
            'telefono' => $this->getTelefono(),
            'direccion' => $this->getDireccion(),
            'nro_legajo' => $this->nro_legajo,
            'materias' => array_map(function($materia) {
                return $materia->getNombre();
            }, $this->materias)
        ];
    }

    public static function deserializar(array $data): object {
        $estudiante = new Estudiante(
            $data['dni'],
            $data['apy_nom'],
            $data['telefono'],
            $data['direccion'],
            $data['nro_legajo']
        );
        return $estudiante;
    }

    public function getNroLegajo(): int {
        return $this->nro_legajo;
    }

    public function setNroLegajo(int $nro_legajo): void {
        $this->nro_legajo = $nro_legajo;
    }

    public function agregarMateria(Materia $materia): void {
        $this->materias[] = $materia;
    }

    public function getMaterias(): array {
        return $this->materias;
    }
}
?>
