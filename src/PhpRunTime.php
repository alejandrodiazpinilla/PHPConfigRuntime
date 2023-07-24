<?php

namespace Rmunate\PhpConfigRuntime;

use Rmunate\PhpConfigRuntime\Bases\BasePhpRunTime;
use Rmunate\PhpConfigRuntime\Classes\Ini;
use Rmunate\PhpConfigRuntime\Classes\Utilities;

class PhpRunTime extends BasePhpRunTime
{
    /**
     * Set a PHP configuration option using ini_set().
     *
     * @param string $option The name of the option to set.
     * @param mixed $value The value to set for the option.
     * @return bool True if the option was set successfully, false otherwise.
     */
    public static function set(string $option, $value): bool
    {
        if (!Utilities::isValid($option)) {
            return false;
        }
        return Ini::set($option, $value);
    }

    /**
     * Get the current value of a PHP configuration option.
     *
     * @param string $option The name of the option to retrieve.
     * @return mixed|null The current value of the option, or null if the option is not set or not found.
     */
    public static function get(string $option)
    {
        if (!Utilities::isValid($option)) {
            return null;
        }
        return Ini::get($option);
    }

    /**
     * Restore the value of a PHP configuration option to its default value.
     *
     * @param string $option The name of the option to restore.
     * @return bool True if the option was restored successfully, false otherwise.
     */
    public static function restore(string $option): bool
    {
        if (!Utilities::isValid($option)) {
            return false;
        }
        return Ini::restore($option);
    }

    /**
     * Restaura todas las opciones de configuración a sus valores predeterminados.
     *
     * @return bool True si todas las opciones fueron restauradas correctamente, false si no se pudo restaurar alguna opción.
     */
    public static function restoreAll(): bool
    {
        $modifiedOptions = Ini::getAll();
        $success = false;
        foreach ($modifiedOptions as $optionName => $optionValue) {
            if (Ini::restore($optionName)) {
                $success = true;
            }
        }
        return $success;
    }

    /**
     * Verifica si una opción de configuración está establecida y tiene un valor no vacío.
     *
     * @param string $option El nombre de la opción a verificar.
     * @return bool True si la opción está establecida y tiene un valor no vacío, false si no.
     */
    public static function isOptionSet(string $option): bool
    {
        if (!Utilities::isValid($option)) {
            return false;
        }
        $value = Ini::get($option);
        return $value !== false && $value !== '';
    }

    /**
     * Check if a PHP configuration option exists (is defined in php.ini).
     *
     * @param string $option The name of the option to check.
     * @return bool True if the option exists, false otherwise.
     */
    public static function doesOptionExist(string $option): bool
    {
        if (!Utilities::isValid($option)) {
            return false;
        }

        // Check if the option exists in php.ini.
        return Ini::get($option) !== false;
    }
}
