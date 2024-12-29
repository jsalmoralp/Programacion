<?php

require_once 'conectar.php';

/**
 * Ejecuta una consulta SQL en la base de datos.
 *
 * @param string $sql Consulta SQL a ejecutar.
 * @param array $config (opcional) Configuración de la conexión.
 * 
 * @return mysqli_result|false Resultado de la consulta o false si falla.
 */
function ejecutar_consulta(string $sql, array $config = []) {
  $conn = conectar_db_mysqli($config);
  $result = $conn->query($sql);
  $conn->close();
  return $result;
}

?>