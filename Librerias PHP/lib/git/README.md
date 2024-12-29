# Git

Este directorio contiene scripts para interactuar con repositorios Git.

## Scripts incluidos

* **clonar.php:** Contiene la función `clonar_repositorio` para clonar un repositorio Git.
* **actualizar.php:** Contiene la función `actualizar_repositorio` para actualizar un repositorio Git.
* **actualizar_o_descargar_repositorio__auxiliar.php:** Contiene la función `descargar_o_actualizar_repositorio` para descargar o actualizar múltiples repositorios.

## Uso

**Clonar un repositorio:**

```php
<?php

require_once 'lib/git/clonar.php';

// Clonar un repositorio público
clonar_repositorio('[se quitó una URL no válida]', 'ruta/local/del/repositorio');

// Clonar un repositorio privado
clonar_repositorio(
  '[se quitó una URL no válida]', 
  'ruta/local/del/repositorio', 
  'main', 
  'tu_usuario', 
  'tu_contraseña'
);

?>
```

**Actualizar un repositorio:**

```php
<?php

require_once 'lib/git/actualizar.php';

// Actualizar un repositorio
actualizar_repositorio('ruta/local/del/repositorio');

// Actualizar un repositorio con autenticación
actualizar_repositorio(
  'ruta/local/del/repositorio', 
  'main', 
  'tu_usuario', 
  'tu_contraseña'
);

?>
```

**Descargar o actualizar múltiples repositorios:**

```php
<?php

require_once 'lib/git/actualizar_o_descargar_repositorio__auxiliar.php';

// Define los repositorios a descargar/actualizar
$repositories = [
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
  // ... más repositorios
];

// Ejecuta el script
if (descargar_o_actualizar_repositorio($repositories)) {
  echo "Todas las operaciones se completaron correctamente." . PHP_EOL;
} else {
  echo "Hubo errores en algunas operaciones." . PHP_EOL;
}

?>
```