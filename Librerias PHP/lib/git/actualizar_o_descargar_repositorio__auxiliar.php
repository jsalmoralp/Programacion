<?php

require_once 'lib/git/clonar.php';
require_once 'lib/git/actualizar.php';

/**
 * Descarga o actualiza un repositorio Git.
 *
 * @param array $repositories Un array con la información de los repositorios a descargar/actualizar.
 *                            Cada elemento del array debe ser un array asociativo con las siguientes claves:
 *                            - 'name': Nombre del repositorio.
 *                            - 'git': URL del repositorio Git.
 *                            - 'path': Ruta donde se descargará/actualizará el repositorio.
 *                            - 'branch' (opcional): Rama a utilizar. Por defecto 'main'.
 *                            - 'username' (opcional): Nombre de usuario para autenticación.
 *                            - 'password' (opcional): Contraseña para autenticación.
 * 
 * @return bool True si la operación fue exitosa para todos los repositorios, false en caso contrario.
 */
function descargar_o_actualizar_repositorio(array $repositories): bool {
  $success = true; // Variable para controlar el éxito de todas las operaciones

  foreach ($repositories as $repository) {
    $repositoryName = $repository['name'];
    $gitUrl = $repository['git'];
    $repositoryPath = $repository['path'];
    $branch = $repository['branch'] ?? 'main';
    $username = $repository['username'] ?? null;
    $password = $repository['password'] ?? null;

    echo "Procesando repositorio: " . $repositoryName . PHP_EOL;

    if (is_dir($repositoryPath)) {
      echo "Actualizando desde Git (rama: " . $branch . ")..." . PHP_EOL;
      if (!actualizar_repositorio($repositoryPath, $branch, $username, $password)) {
        echo "Error al actualizar el repositorio " . $repositoryName . PHP_EOL;
        $success = false; // Marcar como error si alguna operación falla
        continue;
      }
      echo "Repositorio " . $repositoryName . " actualizado correctamente." . PHP_EOL;
    } else {
      echo "Descargando desde Git (rama: " . $branch . ")..." . PHP_EOL;
      if (!clonar_repositorio($gitUrl, $repositoryPath, $branch, $username, $password)) {
        echo "Error al descargar el repositorio " . $repositoryName . PHP_EOL;
        $success = false; // Marcar como error si alguna operación falla
        continue;
      }
      echo "Repositorio " . $repositoryName . " descargado correctamente." . PHP_EOL;
    }
  }

  return $success; // Devolver true solo si todas las operaciones fueron exitosas
}

// Define los repositorios a descargar/actualizar
$repositories = [
  [
    'name' => 'Librería 1',
    'git' => 'github.com/usuario/libreria1.git',
    'path' => 'libs/libreria1',
    'branch' => 'develop',
    'username' => 'tu_usuario',
    'password' => 'tu_contraseña'
  ],
  [
    'name' => 'Librería 2',
    'git' => 'https://gitlab.com/usuario/libreria2.git',
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