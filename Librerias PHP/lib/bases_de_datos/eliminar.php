<?php

require_once 'conectar.php';

/**
 * Elimina datos de una tabla de la base de datos.
 *
 * @param string $tabla Nombre de la tabla.
 * @param string $condicion Condición WHERE para la eliminación.
 * @param array $config (opcional) Configuración de la conexión.
 * 
 * @return bool True si la eliminación fue exitosa, false en caso contrario.
 */
function eliminar_datos(string $tabla, string $condicion, array $config = []) {
  $conn = conectar_db_mysqli($config);

  $sql = "DELETE FROM $tabla WHERE $condicion";

  $result = $conn->query($sql);
  $conn->close();
  return $result;
}

?>