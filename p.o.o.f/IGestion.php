<?php
declare(strict_types=1);

interface IGestion {
    public function guardar(): void;
    public function editar(): void;
    public function eliminar(): void;
    public function listar(): array;
    public function seleccionarUno(): object;
}
?>
