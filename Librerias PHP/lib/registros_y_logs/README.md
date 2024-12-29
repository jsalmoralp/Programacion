# Registros y Logs

Este directorio contiene scripts para manejar registros y logs.

## Scripts incluidos

* **config_logs.php:** Define la configuración por defecto para el registro de logs.
* **manejador_de_registros.php:** Contiene la función `log_message` para escribir mensajes en un archivo de log.
* **rotar_logs.php:** Contiene la función `rotar_logs` para rotar los archivos de log.

## Uso

**Escribir mensajes en el log:**

```php
<?php

require_once 'registros_y_logs/manejador_de_registros.php';

// Escribir un mensaje de información
log_message("Esta es una prueba de log");

// Escribir un mensaje de error
log_message("Error al conectar a la base de datos", 'ERROR');

// Escribir un mensaje de depuración con configuración personalizada
log_message("Mensaje de depuración", 'DEBUG', [
  'min_level' => 'DEBUG' 
]);

// Escribir un mensaje en un contexto específico
log_message("Error al procesar la solicitud", 'ERROR', [
  'context' => 'api',
  'file_path' => 'logs/api.log'
]);

?>
```

**Rotar logs:**

```php
<?php

require_once 'registros_y_logs/rotar_logs.php';

// Rotar los archivos de log app.log
rotar_logs('logs/app.log');

?>
```

## Configuración:

La configuración por defecto de los logs se encuentra en el array $logConfig en el archivo config_logs.php. Puedes modificar esta configuración o pasar un array con opciones personalizadas a la función log_message.

**Niveles de log:**

- Se definen los siguientes niveles de log:
    - DEBUG
    - INFO
    - WARNING
    - ERROR
    - Puedes configurar el nivel mínimo de registro mediante la opción min_level.

**Manejo de excepciones:**

La función log_message incluye un bloque try-catch para capturar excepciones que puedan ocurrir al escribir en el log.

**Logs por contexto:**

Puedes especificar un contexto para cada mensaje de log mediante la opción context. Esto te permite crear diferentes archivos de log para diferentes partes de tu aplicación.

**Formato de logs:**

El formato de los mensajes de log se puede personalizar mediante la opción format. El formato por defecto incluye la marca de tiempo, el nivel de log, el contexto, el mensaje, el nombre del archivo y la línea donde se generó el mensaje.

## Rotación de logs:

La función rotar_logs te permite rotar los archivos de log para evitar que crezcan demasiado. Puedes configurar el número máximo de archivos a mantener.