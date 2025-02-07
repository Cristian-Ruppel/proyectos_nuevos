<?php
declare(strict_types=1);

interface ISerializar {
    public function serializar(): array;
    public static function deserializar(array $data): object;
}
?>
