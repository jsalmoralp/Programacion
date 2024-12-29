<?php

/**
 * Configuración de logs por defecto.
 */
$logConfig = [
  'file_path' => 'logs/download_libraries.log',
  'format' => "[{timestamp}] [{level}] {message}",
  'date_format' => 'Y-m-d H:i:s',
  'levels' => [
    'DEBUG' => 0,
    'INFO' => 1,
    'WARNING' => 2,
    'ERROR' => 3,
  ],
  'min_level' => 'INFO', // Nivel mínimo de registro
];

/**
 * Escribe un mensaje en el archivo de logs.
 *
 * @param string $message El mensaje a escribir en el log.
 * @param string $level Nivel del mensaje (DEBUG, INFO, WARNING, ERROR).
 * @param array $config (opcional) Configuración personalizada para el log.
 */
function logMessage(string $message, string $level = 'INFO', array $config = []) {
  global $logConfig;

  // Fusionar la configuración por defecto con la configuración personalizada
  $config = array_merge($logConfig, $config);

  // Verificar si el nivel del mensaje es suficiente para ser registrado
  if ($config['levels'][$level] < $config['levels'][$config['min_level']]) {
    return;
  }

  $timestamp = date($config['date_format']);
  $logMessage = str_replace(
    ['{timestamp}', '{level}', '{message}'],
    [$timestamp, $level, $message],
    $config['format']
  ) . PHP_EOL;

  // Asegurarse de que la carpeta de logs existe
  $logDir = dirname($config['file_path']);
  if (!is_dir($logDir)) {
    mkdir($logDir, 0777, true);
  }

  file_put_contents($config['file_path'], $logMessage, FILE_APPEND);
  echo $logMessage; // Mostrar el mensaje en la consola
}

?>