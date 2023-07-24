<?php

namespace Rmunate\PhpConfigRuntime\Classes;

class Ini
{
    /**
     * Sets a configuration option at runtime.
     *
     * @param string $option The name of the option to set.
     * @param mixed $value The value to set for the option.
     * @return bool Returns true if the option was set successfully, false otherwise.
     */
    public static function set($option, $value)
    {
        return ini_set($option, $value) !== false;
    }

    /**
     * Gets the value of a configuration option.
     *
     * @param string $option The name of the option to retrieve.
     * @return string|false Returns the value of the configuration option, or false on failure.
     */
    public static function get($option)
    {
        return ini_get($option);
    }

    /**
     * Restores the value of a configuration option to its default value.
     *
     * @param string $option The name of the option to restore.
     * @return bool Returns true if the option was restored successfully, false otherwise.
     */
    public static function restore($option)
    {
        return ini_restore($option) !== false;
    }

    /**
     * Gets all the current configuration options and their values.
     *
     * @return array Returns an associative array containing all the current configuration options and their values.
     */
    public static function getAll()
    {
        return ini_get_all();
    }
}
