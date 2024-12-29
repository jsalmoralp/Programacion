<?php

require_once 'conectar.php';

/**
 * Modifica datos en una tabla de la base de datos.
 *
 * @param string $tabla Nombre de la tabla.
 * @param array $datos Datos a modificar (clave => valor).
 * @param string $condicion Condición WHERE para la actualización.
 * @param array $config (opcional) Configuración de la conexión.
 * 
 * @return bool True si la modificación fue exitosa, false en caso contrario.
 */
function modificar_datos(string $tabla, array $datos, string $condicion, array $config = []) {
  $conn = conectar_db_mysqli($config);

  $set = [];
  foreach ($datos as $columna => $valor) {
    $set[] = "$columna = '$valor'";
  }
  $set = implode(", ", $set);

  $sql = "UPDATE $tabla SET $set WHERE $condicion";

  $result = $conn->query($sql);
  $conn->close();
  return $result;
}

?>