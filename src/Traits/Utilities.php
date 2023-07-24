<?php

namespace Grupoaltum\PhpConfigRuntime\Traits;

trait Utilities
{
    /**
     * Valida si un valor no está vacío y no contiene solo espacios en blanco.
     *
     * @param mixed $value El valor a validar.
     * @return bool Retorna true si el valor es válido, de lo contrario, retorna false.
     */
    public function isValid($value)
    {
        return is_string($value) && trim($value) !== '';
    }
}
