<?php

/**
 * Script para descargar o actualizar librerías desde Git.
 *
 * @param array $libraries Un array con las librerías a descargar/actualizar. 
 *                        Cada elemento del array debe ser un array asociativo con las claves:
 *                        - 'name': Nombre de la librería.
 *                        - 'git': URL del repositorio Git.
 *                        - 'path': Ruta donde se descargará la librería.
 */
function downloadOrUpdateLibraries(array $libraries) {
  foreach ($libraries as $library) {
    $libraryName = $library['name'];
    $gitUrl = $library['git'];
    $libraryPath = $library['path'];

    echo "Procesando librería: " . $libraryName . PHP_EOL;

    if (is_dir($libraryPath)) {
      // La librería ya existe, actualizar desde Git
      echo "Actualizando desde Git..." . PHP_EOL;
      chdir($libraryPath);
      exec('git pull origin main 2>&1', $output, $returnCode);

      if ($returnCode !== 0) {
        echo "Error al actualizar " . $libraryName . ":" . PHP_EOL;
        print_r($output);
      } else {
        echo "Librería " . $libraryName . " actualizada correctamente." . PHP_EOL;
      }
    } else {
      // La librería no existe, descargar desde Git
      echo "Descargando desde Git..." . PHP_EOL;
      exec('git clone ' . $gitUrl . ' ' . $libraryPath . ' 2>&1', $output, $returnCode);

      if ($returnCode !== 0) {
        echo "Error al descargar " . $libraryName . ":" . PHP_EOL;
        print_r($output);
      } else {
        echo "Librería " . $libraryName . " descargada correctamente." . PHP_EOL;
      }
    }

    echo PHP_EOL;
  }
}

// Define las librerías a descargar/actualizar
$libraries = [
  [
    'name' => 'Librería 1',
    'git' => 'https://github.com/usuario/libreria1.git',
    'path' => 'libs/libreria1'
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