<?php

/**
 * Actualiza un repositorio Git.
 *
 * @param string $path Ruta del repositorio a actualizar.
 * @param string $branch (opcional) Rama a actualizar. Por defecto 'main'.
 * @param string $username (opcional) Nombre de usuario para autenticación.
 * @param string $password (opcional) Contraseña para autenticación.
 * 
 * @return bool True si la actualización fue exitosa, false en caso contrario.
 */
function actualizar_repositorio(string $path, string $branch = 'main', string $username = null, string $password = null) {
  $gitCommand = 'git ';
  if ($username && $password) {
    $gitCommand .= '-c credential.helper="store --file=.git/credentials" ';
    file_put_contents($path . '/.git/credentials', "https://{$username}:{$password}@" . obtener_url_repositorio($path));
  }

  chdir($path);

  exec($gitCommand . 'checkout ' . $branch . ' 2>&1', $output, $returnCode);
  if ($returnCode !== 0) {
    echo "Error al cambiar a la rama " . $branch . ":" . PHP_EOL;
    print_r($output);
    return false;
  }

  exec($gitCommand . 'pull origin ' . $branch . ' 2>&1', $output, $returnCode);
  if ($returnCode !== 0) {
    echo "Error al actualizar el repositorio:" . PHP_EOL;
    print_r($output);
    return false;
  }

  return true;
}

/**
 * Obtiene la URL del repositorio Git.
 *
 * @param string $path Ruta del repositorio.
 * 
 * @return string|false URL del repositorio o false si falla.
 */
function obtener_url_repositorio(string $path) {
  chdir($path);
  exec('git config --get remote.origin.url 2>&1', $output, $returnCode);
  if ($returnCode !== 0) {
    echo "Error al obtener la URL del repositorio:" . PHP_EOL;
    print_r($output);
    return false;
  }
  return trim($output[0]);
}

?>