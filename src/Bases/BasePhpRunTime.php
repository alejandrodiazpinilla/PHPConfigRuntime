<?php

namespace Grupoaltum\PhpConfigRuntime\Bases;

abstract class BasePhpRunTime
{
    /**
     * Set a PHP configuration option using ini_set().
     *
     * @param string $option The name of the option to set.
     * @param mixed $value The value to set for the option.
     * @return bool True if the option was set successfully, false otherwise.
     */
    abstract public static function set(string $option, $value): bool;

    /**
     * Get the current value of a PHP configuration option.
     *
     * @param string $option The name of the option to retrieve.
     * @return mixed|null The current value of the option, or null if the option is not set or not found.
     */
    abstract public static function get(string $option);

    /**
     * Restore the value of a PHP configuration option to its default value.
     *
     * @param string $option The name of the option to restore.
     * @return bool True if the option was restored successfully, false otherwise.
     */
    abstract public static function restore(string $option): bool;

    /**
     * Restaura todas las opciones de configuración a sus valores predeterminados.
     *
     * @return bool True si todas las opciones fueron restauradas correctamente, false si no se pudo restaurar alguna opción.
     */
    abstract public static function restoreAll(): bool;

    /**
     * Verifica si una opción de configuración está establecida y tiene un valor no vacío.
     *
     * @param string $option El nombre de la opción a verificar.
     * @return bool True si la opción está establecida y tiene un valor no vacío, false si no.
     */
    abstract public static function isOptionSet(string $option): bool;

    /**
     * Check if a PHP configuration option exists (is defined in php.ini).
     *
     * @param string $option The name of the option to check.
     * @return bool True if the option exists, false otherwise.
     */
    abstract public static function doesOptionExist(string $option): bool;
}
