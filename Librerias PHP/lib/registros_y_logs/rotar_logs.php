<?php

/**
 * Rota los archivos de logs.
 *
 * @param string $logFilePath Ruta del archivo de log.
 * @param int $maxFiles Número máximo de archivos de log a mantener. Por defecto 5.
 */
function rotar_logs(string $logFilePath, int $maxFiles = 5) {
  if (!file_exists($logFilePath)) {
    return;
  }

  for ($i = $maxFiles - 1; $i > 0; $i--) {
    $oldFile = $logFilePath . '.' . $i;
    $newFile = $logFilePath . '.' . ($i + 1);
    if (file_exists($oldFile)) {
      rename($oldFile, $newFile);
    }
  }

  rename($logFilePath, $logFilePath . '.1');
}

?>