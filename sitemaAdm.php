<?php
public function testCalcularSueldo(): void
{
    $administrativo = new Administrativo(...);

    $this->assertSueldo($administrativo, 'Tesoreria', 30, 1198800.00);
    $this->assertSueldo($administrativo, 'Ventas', 30, 1148850.00);
    $this->assertSueldo($administrativo, 'Recursos Humanos', 30, 1098900.00);
    $this->assertSueldo($administrativo, 'Legales', 30, 999000.00);
    
    $sueldo = $administrativo->calcularSueldo(-1);
    $this->errors_log["ERROR_CALCULAR_SUELDO_DIAS_FUERA_DEL_RANGO"] = $sueldo === 0.0 ? 1 : 0;
}

private function assertSueldo(Administrativo $administrativo, string $area, int $dias, float $expected): void
{
    $administrativo->setArea($area);
    $sueldo = $administrativo->calcularSueldo($dias);
    $this->errors_log["ERROR_CALCULAR_SUELDO_$area"] = $sueldo === $expected ? 1 : 0;
}
