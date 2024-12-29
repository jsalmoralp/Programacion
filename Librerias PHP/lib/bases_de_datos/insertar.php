<?php

require_once 'conectar.php';

/**
 * Inserta datos en una tabla de la base de datos.
 *
 * @param string $tabla Nombre de la tabla.
 * @param array $datos Datos a insertar (clave => valor).
 * @param array $config (opcional) Configuración de la conexión.
 * 
 * @return bool True si la inserción fue exitosa, false en caso contrario.
 */
function insertar_datos(string $tabla, array $datos, array $config = []) {
  $conn = conectar_db_mysqli($config);

  $columnas = implode(", ", array_keys($datos));
  $valores = "'" . implode("', '", array_values($datos)) . "'";

  $sql = "INSERT INTO $tabla ($columnas) VALUES ($valores)";

  $result = $conn->query($sql);
  $conn->close();
  return $result;
}

?>