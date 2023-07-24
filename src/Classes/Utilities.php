<?php

namespace Rmunate\PhpConfigRuntime\Classes;

class Utilities
{
    /**
     * Valida si un valor no está vacío y no contiene solo espacios en blanco.
     *
     * @param mixed $value El valor a validar.
     * @return bool Retorna true si el valor es válido, de lo contrario, retorna false.
     */
    public static function isValid($value)
    {
        return is_string($value) && trim($value) !== '';
    }
}
