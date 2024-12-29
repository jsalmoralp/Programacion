# Script para descargar o actualizar librerías desde Git

## Explicación

**Definición de la función `downloadOrUpdateLibraries`:**

* Recibe un array `$libraries` que contiene la información de las librerías a descargar o actualizar.
* Itera sobre cada librería en el array.
* Para cada librería, verifica si el directorio ya existe (`is_dir`).
    * Si existe, ejecuta `git pull origin main` para actualizar la librería.
    * Si no existe, ejecuta `git clone` para descargar la librería.
* Muestra mensajes de éxito o error en la consola.

**Definición del array `$libraries`:**

* Define un array con la información de las librerías que quieres gestionar.
* Cada elemento del array es un array asociativo con las claves `name`, `git` y `path`.

**Ejecución del script:**

* Llama a la función `downloadOrUpdateLibraries` con el array `$libraries`.

## Para usar el script:

1. Guarda el código como un archivo PHP (por ejemplo, `download_libraries.php`).
2. Reemplaza los valores en el array `$libraries` con la información de tus librerías.
3. Ejecuta el script desde la línea de comandos: `php download_libraries.php`

## Consideraciones:

* Asegúrate de tener Git instalado en tu sistema.
* Este script asume que la rama principal del repositorio se llama "main". Si la rama principal tiene otro nombre (como "master"), deberás modificarlo en el código.
* Puedes personalizar el script para que se ajuste a tus necesidades, como agregar manejo de errores más robusto, opciones de configuración, etc.
* Este script usa `exec`, que puede ser un riesgo de seguridad si no se usa con cuidado. Asegúrate de validar las entradas y escapar de cualquier dato externo antes de usarlo en `exec`.