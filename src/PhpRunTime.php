<?php

namespace Grupoaltum\PhpConfigRuntime;

use Grupoaltum\PhpConfigRuntime\Bases\BasePhpRunTime;
use Grupoaltum\PhpConfigRuntime\Traits\Ini;
use Grupoaltum\PhpConfigRuntime\Traits\Utilities;

class PhpRunTime extends BasePhpRunTime
{
    use Ini;
    use Utilities;

    /**
     * Set a PHP configuration option using ini_set().
     *
     * @param string $option The name of the option to set.
     * @param mixed $value The value to set for the option.
     * @return bool True if the option was set successfully, false otherwise.
     */
    public static function set(string $option, $value): bool
    {
        if (!$this->isValid($option)) {
            return false;
        }
        return $this->iniSet($option, $value);
    }

    /**
     * Get the current value of a PHP configuration option.
     *
     * @param string $option The name of the option to retrieve.
     * @return mixed|null The current value of the option, or null if the option is not set or not found.
     */
    public static function get(string $option)
    {
        if (!$this->isValid($option)) {
            return null;
        }
        return $this->iniGet($option);
    }

    /**
     * Restore the value of a PHP configuration option to its default value.
     *
     * @param string $option The name of the option to restore.
     * @return bool True if the option was restored successfully, false otherwise.
     */
    public static function restore(string $option): bool
    {
        if (!$this->isValid($option)) {
            return false;
        }
        return $this->iniRestore($option);
    }

    /**
     * Restaura todas las opciones de configuración a sus valores predeterminados.
     *
     * @return bool True si todas las opciones fueron restauradas correctamente, false si no se pudo restaurar alguna opción.
     */
    public static function restoreAll(): bool
    {
        $modifiedOptions = $this->iniGetAll();
        $success = true;
        foreach ($modifiedOptions as $optionName => $optionValue) {
            if ($this->iniRestore($optionName)) {
                $success = false;
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
        if (!$this->isValid($option)) {
            return false;
        }
        $value = $this->iniGet($option);
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
        if (!$this->isValid($option)) {
            return false;
        }

        // Check if the option exists in php.ini.
        return $this->iniGet($option) !== false;
    }
}
