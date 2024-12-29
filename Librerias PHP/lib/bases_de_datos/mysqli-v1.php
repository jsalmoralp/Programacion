<?php

// Función para la conexión a una base de datos MySQL
function conectar_db_mysqli() {
  $servername = "localhost";
  $username = "tu_usuario";
  $password = "tu_contraseña";
  $dbname = "nombre_de_la_base_de_datos";

  //*/ Crear conexión 
  $conn = new mysqli($servername, $username, $password, $dbname);

  //*/ Verificar la conexión
  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }
  
  return $conn;
}

/*
***
// Código de ejecución en el script principal, para su uso..
***

<?php

require_once 'lib/bases_de_datos/mysqli.php';

// Conectar a la base de datos
$conn = conectar_db_mysqli();

// ... código para interactuar con la base de datos ...

// Cerrar la conexión
$conn->close();

?>

***
// FIN
***
*/

?>