<?php

// Configuración de logs por defecto.
$logConfig = [
  'file_path' => 'logs/app.log',
  'format' => "[{timestamp}] [{level}] [{context}] {message} ({file}:{line})",
  'date_format' => 'Y-m-d H:i:s',
  'levels' => [
    'DEBUG' => 0,
    'INFO' => 1,
    'WARNING' => 2,
    'ERROR' => 3,
  ],
  'min_level' => 'INFO',
];

?>