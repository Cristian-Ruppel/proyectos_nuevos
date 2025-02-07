<?php
#clase Administrativo

declare(strict_types=1);
require_once 'Empleado.php';

class Administrativo extends Empleado
{
    private string $area;

    public function setArea(string $area): void
    {
        $this->area = $area;
    }

    public function calcularSueldo(int $cant_dias): float
    {
        if ($this->area === 'Ventas') {
            $this->valor_dia *= 1.15;
        } elseif ($this->area === 'Tesorería') {
            $this->valor_dia *= 1.20;
        } elseif ($this->area === 'RecursosHumanos') {
            $this->valor_dia *= 1.10;
        }

        return parent::calcularSueldo($cant_dias);
    }
}
