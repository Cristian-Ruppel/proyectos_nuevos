<?php
declare(strict_types=1);

require_once 'IGestion.php';
require_once 'ISerializar.php';

class Materia implements IGestion, ISerializar {
    protected string $nombre;
    protected int $anio_cursada;
    protected array $estudiantes = [];

    public function __construct(string $nombre, int $anio_cursada) {
        $this->nombre = $nombre;
        $this->anio_cursada = $anio_cursada;
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
            'nombre' => $this->nombre,
            'anio_cursada' => $this->anio_cursada,
            'estudiantes' => $this->estudiantes
        ];
    }

    public static function deserializar(array $data): object {
        $materia = new Materia($data['nombre'], $data['anio_cursada']);
        return $materia;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getAnioCursada(): int {
        return $this->anio_cursada;
    }

    public function setAnioCursada(int $anio_cursada): void {
        $this->anio_cursada = $anio_cursada;
    }

    public function agregarEstudiante(Estudiante $estudiante): void {
        $this->estudiantes[] = $estudiante;
    }

    public function getEstudiantes(): array {
        return $this->estudiantes;
    }
}
?>
