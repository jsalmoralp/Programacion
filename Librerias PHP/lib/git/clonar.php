<?php

/**
 * Clona un repositorio Git.
 *
 * @param string $gitUrl URL del repositorio Git.
 * @param string $path Ruta donde se clonará el repositorio.
 * @param string $branch (opcional) Rama a clonar. Por defecto 'main'.
 * @param string $username (opcional) Nombre de usuario para autenticación.
 * @param string $password (opcional) Contraseña para autenticación.
 * 
 * @return bool True si la clonación fue exitosa, false en caso contrario.
 */
function clonar_repositorio(string $gitUrl, string $path, string $branch = 'main', string $username = null, string $password = null) {
  $gitCommand = 'git clone ';
  if ($username && $password) {
    $gitCommand .= '-c credential.helper="store --file=.git/credentials" ';
    file_put_contents($path . '/.git/credentials', "https://{$username}:{$password}@{$gitUrl}");
  }
  $gitCommand .= '-b ' . $branch . ' ' . $gitUrl . ' ' . $path . ' 2>&1';

  exec($gitCommand, $output, $returnCode);

  if ($returnCode !== 0) {
    echo "Error al clonar el repositorio:" . PHP_EOL;
    print_r($output);
    return false;
  }

  return true;
}

?>