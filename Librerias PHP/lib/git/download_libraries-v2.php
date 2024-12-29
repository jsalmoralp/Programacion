<?php

/**
 * Script para descargar o actualizar librerías desde Git.
 *
 * @param array $libraries Un array con las librerías a descargar/actualizar.
 *                        Cada elemento del array debe ser un array asociativo con las siguientes claves:
 *                        - 'name': Nombre de la librería.
 *                        - 'git': URL del repositorio Git.
 *                        - 'path': Ruta donde se descargará la librería.
 *                        - 'branch' (opcional): Rama a utilizar. Por defecto 'main'.
 *                        - 'username' (opcional): Nombre de usuario para autenticación.
 *                        - 'password' (opcional): Contraseña para autenticación.
 */
function downloadOrUpdateLibraries(array $libraries) {
  foreach ($libraries as $library) {
    $libraryName = $library['name'];
    $gitUrl = $library['git'];
    $libraryPath = $library['path'];
    $branch = $library['branch'] ?? 'main';
    $username = $library['username'] ?? null;
    $password = $library['password'] ?? null;

    echo "Procesando librería: " . $libraryName . PHP_EOL;

    $gitCommand = 'git ';
    if ($username && $password) {
      $gitCommand .= '-c credential.helper="store --file=.git/credentials" ';
      file_put_contents($libraryPath . '/.git/credentials', "https://{$username}:{$password}@{$gitUrl}");
    }

    if (is_dir($libraryPath)) {
      echo "Actualizando desde Git (rama: " . $branch . ")..." . PHP_EOL;
      chdir($libraryPath);
      exec($gitCommand . 'checkout ' . $branch . ' 2>&1', $output, $returnCode);
      if ($returnCode !== 0) {
        echo "Error al cambiar a la rama " . $branch . " en " . $libraryName . ":" . PHP_EOL;
        print_r($output);
        continue;
      }
      exec($gitCommand . 'pull origin ' . $branch . ' 2>&1', $output, $returnCode);
      if ($returnCode !== 0) {
        echo "Error al actualizar " . $libraryName . ":" . PHP_EOL;
        print_r($output);
      } else {
        echo "Librería " . $libraryName . " actualizada correctamente." . PHP_EOL;
      }
    } else {
      echo "Descargando desde Git (rama: " . $branch . ")..." . PHP_EOL;
      exec($gitCommand . 'clone -b ' . $branch . ' ' . $gitUrl . ' ' . $libraryPath . ' 2>&1', $output, $returnCode);
      if ($returnCode !== 0) {
        echo "Error al descargar " . $libraryName . ":" . PHP_EOL;
        print_r($output);
      } else {
        echo "Librería " . $libraryName . " descargada correctamente." . PHP_EOL;
      }
    }
  }
}

// Define las librerías a descargar/actualizar
$libraries = [
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
  // ... más librerías
];

// Ejecuta el script
downloadOrUpdateLibraries($libraries);

?>