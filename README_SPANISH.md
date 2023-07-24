# PhpRunTime: ¡Ajusta tu configuración de PHP sobre la marcha!
La libreria `PhpRunTime` proporciona métodos para gestionar la configuración de PHP en tiempo de ejecución. Permite establecer, obtener y restaurar opciones de configuración, así como verificar su existencia y estado.

![RUNTIME_PHP](https://github.com/rmunate/PHPInfoServer/assets/91748598/873f40e0-9278-4a82-a50c-5baef7b7691a)

### Tabla de Contenido
1. [Métodos Disponibles](#métodos-disponibles)
2. [Ejemplos de Uso](#ejemplos-de-uso)
   - [Establecer una Opción de Configuración](#establecer-una-opción-de-configuración)
   - [Obtener el Valor de una Opción de Configuración](#obtener-el-valor-de-una-opción-de-configuración)
   - [Restaurar una Opción de Configuración](#restaurar-una-opción-de-configuración)
   - [Restaurar Todas las Opciones de Configuración](#restaurar-todas-las-opciones-de-configuración)
3. [Aclaraciones](#aclaraciones)
4. [Creador](#creador)
5. [Licencia](#licencia)


### Métodos Disponibles

| Método | Descripción |
| - | - |
| `PhpRunTime::set($option, $value)` | Establece el valor de una opción de configuración de PHP en tiempo de ejecución utilizando `ini_set()`. |
| `PhpRunTime::get($option)` | Obtiene el valor actual de una opción de configuración de PHP. Si la opción no está configurada o no se encuentra, retorna `null`. |
| `PhpRunTime::restore($option)` | Restaura el valor de una opción de configuración de PHP a su valor predeterminado. Retorna `true` si la restauración es exitosa, o `false` en caso contrario. |
| `PhpRunTime::restoreAll()` | Restaura todas las opciones de configuración de PHP a sus valores predeterminados. Retorna `true` si todas las restauraciones son exitosas, o `false` si no. |
| `PhpRunTime::isOptionSet($option)` | Verifica si una opción de configuración está establecida y tiene un valor no vacío. Retorna `true` si la opción está configurada, o `false` si no. |
| `PhpRunTime::doesOptionExist($option)` | Verifica si una opción de configuración existe en el archivo `php.ini`. Retorna `true` si la opción existe, o `false` si no. |

### Ejemplos de Uso

#### Establecer una Opción de Configuración

```php
use Rmunate\Server\PhpRunTime;

// Establecer la opción "display_errors" en "On"
PhpRunTime::set('display_errors', 'On');

// Verificar si la opción está configurada y tiene un valor no vacío
if (PhpRunTime::isOptionSet('display_errors')) {
    // 'La opción "display_errors" está activada.';
} else {
    // 'La opción "display_errors" no está configurada.';
}
```

#### Obtener el Valor de una Opción de Configuración

```php
use Rmunate\Server\PhpRunTime;

// Obtener el valor actual de la opción "max_execution_time"
$maxExecutionTime = PhpRunTime::get('max_execution_time');

if ($maxExecutionTime !== null) {
    // "El valor actual de 'max_execution_time' es: $maxExecutionTime segundos.";
} else {
    // "La opción 'max_execution_time' no está configurada.";
}
```

#### Restaurar una Opción de Configuración

```php
use Rmunate\Server\PhpRunTime;

// Establecer temporalmente la opción "memory_limit" en "256M"
PhpRunTime::set('memory_limit', '256M');

// Restaurar la opción "memory_limit" a su valor predeterminado
PhpRunTime::restore('memory_limit');

// Verificar si la opción está configurada y tiene un valor no vacío
if (PhpRunTime::isOptionSet('memory_limit')) {
    // 'La opción "memory_limit" está configurada.';
} else {
    // 'La opción "memory_limit" no está configurada.';
}
```

#### Restaurar Todas las Opciones de Configuración

```php
use Rmunate\Server\PhpRunTime;

// Establecer temporalmente algunas opciones de configuración
PhpRunTime::set('display_errors', 'On');
PhpRunTime::set('error_reporting', E_ALL);

// Restaurar todas las opciones a sus valores predeterminados
PhpRunTime::restoreAll();

// Verificar si las opciones están configuradas y tienen valores no vacíos
if (PhpRunTime::isOptionSet('display_errors') || PhpRunTime::isOptionSet('error_reporting')) {
    // 'Algunas opciones no pudieron ser restauradas.';
} else {
    // 'Todas las opciones fueron restauradas correctamente.';
}
```

### Aclaraciones

- Los cambios realizados con el método `set()` son válidos solo durante la ejecución del script actual y no afectan al archivo `php.ini`. Para hacer cambios permanentes, es necesario editar el archivo `php.ini` manualmente.

- Algunas opciones de configuración pueden estar deshabilitadas en entornos compartidos de alojamiento (shared hosting), lo que puede limitar la capacidad de cambiar ciertas configuraciones.

- Es importante tener cuidado al modificar la configuración de PHP, ya que algunos cambios pueden afectar el rendimiento y la seguridad de las aplicaciones. Se recomienda consultar la documentación oficial de PHP para obtener información detallada sobre cada opción de configuración.

## Creador
- 🇨🇴 Raúl Mauricio Uñate Castro
- Correo electrónico: raulmauriciounate@gmail.com

## Licencia
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)