## Explicación de las mejoras:

* **Configuración por defecto:** Se define un array `$logConfig` con valores por defecto para la ruta del archivo, formato del mensaje, formato de fecha, niveles de log y nivel mínimo de registro.
* **Fusión de configuraciones:** Se utiliza `array_merge` para combinar la configuración por defecto con la configuración personalizada que se pasa como argumento a la función `logMessage`.
* **Niveles de log:** Se define un array `levels` en la configuración para asignar un valor numérico a cada nivel de log. Esto permite controlar qué niveles se registran mediante la opción `min_level`.
* **Nivel mínimo de registro:** Se introduce la opción `min_level` para especificar el nivel mínimo de los mensajes que se registrarán. Por defecto, se registra a partir del nivel `INFO`.
* **Personalización:** Ahora puedes personalizar cualquier aspecto del registro pasando un array `$config` a la función `logMessage` con las opciones que quieras modificar.

## Ejemplo de uso con configuración personalizada:

```php
logMessage("Este es un mensaje de depuración", 'DEBUG'); // No se registra porque el nivel mínimo es INFO

// Registrar un mensaje de error con configuración personalizada
logMessage("Error al conectar a la base de datos", 'ERROR', [
  'file_path' => 'logs/database_errors.log',
  'format' => "{timestamp} - {message} ({level})"
]);
```