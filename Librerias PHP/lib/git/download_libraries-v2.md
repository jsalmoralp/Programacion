# Script para descargar o actualizar librerías desde Git (sin log_handler)

Este script te permite descargar o actualizar librerías desde repositorios Git. Es útil para automatizar la gestión de dependencias en tus proyectos PHP.

## Uso

1. **Guarda el código** como un archivo PHP (por ejemplo, `download_libraries.php`).
2. **Configura las librerías:**
   - Edita el array `$libraries` con la información de las librerías que quieres gestionar.
   - Cada elemento del array debe ser un array asociativo con las siguientes claves:
     - `name`: Nombre de la librería.
     - `git`: URL del repositorio Git.
     - `path`: Ruta donde se descargará la librería.
     - `branch` (opcional): Rama a utilizar. Por defecto `main`.
     - `username` (opcional): Nombre de usuario para autenticación (si el repositorio es privado).
     - `password` (opcional): Contraseña para autenticación (si el repositorio es privado).
3. **Ejecuta el script:**
   - Abre una terminal y navega hasta la ubicación del archivo `download_libraries.php`.
   - Ejecuta el script con el comando `php download_libraries.php`
4. **Consideraciones:**
    - Autenticación: Si el repositorio es privado, debes proporcionar las credenciales de autenticación (`username` y `password`). Ten en cuenta que este método almacena las credenciales en texto plano, lo que puede ser un riesgo de seguridad. Se recomienda utilizar métodos más seguros como SSH o tokens de acceso personal.
    - Seguridad: Este script utiliza `exec`, que puede ser un riesgo de seguridad si no se usa con cuidado. Asegúrate de validar las entradas y escapar de cualquier dato externo antes de usarlo en `exec`.
    - Mensajes en la consola: El script mostrará mensajes en la consola indicando el progreso de la descarga o actualización de cada librería.

## Ejemplo de configuración

```php
$libraries = [
  [
    'name' => 'Librería 1',
    'git' => '[github.com/usuario/libreria1.git](https://github.com/usuario/libreria1.git)',
    'path' => 'libs/libreria1',
    'branch' => 'develop',
    'username' => 'tu_usuario',
    'password' => 'tu_contraseña'
  ],
  [
    'name' => 'Librería 2',
    'git' => '[https://gitlab.com/usuario/libreria2.git](https://gitlab.com/usuario/libreria2.git)',
    'path' => 'libs/libreria2'
  ],
  // ... más librerías
];
```
