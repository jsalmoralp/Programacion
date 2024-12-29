<?php

require_once 'config_logs.php';

/**
 * Escribe un mensaje en el archivo de logs.
 *
 * @param string $message El mensaje a escribir en el log.
 * @param string $level Nivel del mensaje (DEBUG, INFO, WARNING, ERROR). Por defecto 'INFO'.
 * @param array $config (opcional) Configuración personalizada para el log.
 */
function log_message(string $message, string $level = 'INFO', array $config = []) {
  global $logConfig;

  try {
    $config = array_merge($logConfig, $config);

    if ($config['levels'][$level] < $config['levels'][$config['min_level']]) {
      return;
    }

    $timestamp = date($config['date_format']);
    $trace = debug_backtrace()[0];
    $file = $trace['file'];
    $line = $trace['line'];
    $context = $config['context'] ?? 'general'; // Contexto por defecto

    $logMessage = str_replace(
      ['{timestamp}', '{level}', '{message}', '{file}', '{line}', '{context}'],
      [$timestamp, $level, $message, $file, $line, $context],
      $config['format']
    ) . PHP_EOL;

    $logDir = dirname($config['file_path']);
    if (!is_dir($logDir)) {
      mkdir($logDir, 0777, true);
    }

    file_put_contents($config['file_path'], $logMessage, FILE_APPEND);

  } catch (Exception $e) {
    // Manejo de excepciones al registrar el mensaje
    echo "Error al escribir en el log: " . $e->getMessage() . PHP_EOL;
  }
}

?>