<?php

require_once 'lib/bases_de_datos/mysqli.php';

// Conectar a la base de datos
$conn = conectar_db_mysqli();

// ... código para interactuar con la base de datos ...

// Cerrar la conexión
$conn->close();

?>