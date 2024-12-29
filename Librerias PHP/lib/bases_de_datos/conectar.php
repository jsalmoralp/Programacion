<?php

require_once 'config.php';

/**
 * Función para la conexión a una base de datos MySQL.
 *
 * @param array $config (opcional) Configuración de la conexión. 
 *                      Si se omite, se usa la configuración por defecto.
 * 
 * @return mysqli Objeto de conexión a la base de datos.
 */
function conectar_db_mysqli(array $config = []) {
  global $db_config;

  // Fusionar la configuración por defecto con la configuración personalizada
  $config = array_merge($db_config, $config);

  // Extraer las variables de conexión
  $servername = $config['servername'];
  $username = $config['username'];
  $password = $config['password'];
  $dbname = $config['dbname'];

  // Crear conexión
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verificar la conexión
  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }

  return $conn;
}

?>