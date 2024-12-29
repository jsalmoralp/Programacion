<?php

/**
 * Escribe un mensaje en el archivo de logs.
 *
 * @param string $message El mensaje a escribir en el log.
 */
function logMessage(string $message) {
  $logFilePath = 'logs/download_libraries.log'; // Ruta del archivo de logs
  $timestamp = date('Y-m-d H:i:s');
  $logMessage = "[{$timestamp}] {$message}" . PHP_EOL;

  // Asegurarse de que la carpeta de logs existe
  if (!is_dir('logs')) {
    mkdir('logs', 0777, true);
  }

  file_put_contents($logFilePath, $logMessage, FILE_APPEND);
  echo $logMessage; // Mostrar el mensaje en la consola
}

?>