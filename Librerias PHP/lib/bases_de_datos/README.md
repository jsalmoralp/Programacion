# Bases de datos

Este directorio contiene scripts para facilitar las operaciones con bases de datos MySQL.

## Scripts incluidos

* **config.php:** Define la configuración por defecto para la conexión a la base de datos.
* **conectar.php:** Contiene la función `conectar_db_mysqli` para establecer una conexión a la base de datos.
* **consultar.php:** Contiene la función `ejecutar_consulta` para ejecutar consultas SQL.
* **insertar.php:** Contiene la función `insertar_datos` para insertar datos en una tabla.
* **modificar.php:** Contiene la función `modificar_datos` para modificar datos en una tabla.
* **eliminar.php:** Contiene la función `eliminar_datos` para eliminar datos de una tabla.


## Uso

**1. Configuración de la conexión:**

* Edita el archivo `config.php` con los datos de tu base de datos:

```php
<?php

// Configuración de la base de datos
$db_config = [
  'servername' => 'localhost',
  'username' => 'tu_usuario',
  'password' => 'tu_contraseña',
  'dbname' => 'nombre_de_la_base_de_datos',
];

?>
```

**2. Conexión a la base de datos:**

* Incluye el archivo conectar.php en tu script.
* Llama a la función conectar_db_mysqli para obtener un objeto de conexión:

```php
<?php

require_once 'lib/bases_de_datos/conectar.php';

// Conectar a la base de datos usando la configuración por defecto
$conn = conectar_db_mysqli();

// ... código para interactuar con la base de datos ...

// Cerrar la conexión
$conn->close();

?>
```

**3. Ejecución de consultas:**

* Incluye el archivo consultar.php en tu script.
* Utiliza la función ejecutar_consulta para ejecutar una consulta SQL:

```php
<?php

require_once 'lib/bases_de_datos/consultar.php';

// Ejecutar una consulta SELECT
$result = ejecutar_consulta("SELECT * FROM usuarios");

// Procesar el resultado de la consulta
if ($result) {
  while ($row = $result->fetch_assoc()) {
    // ... procesar cada fila del resultado ...
  }
  $result->free();
}

?>
```

**4. Inserción de datos:**

* Incluye el archivo insertar.php en tu script.
* Utiliza la función insertar_datos para insertar datos en una tabla:

```php
<?php

require_once 'lib/bases_de_datos/insertar.php';

// Insertar un nuevo usuario
$datos = [
  'nombre' => 'Juan',
  'email' => '[dirección de correo electrónico eliminada]',
  'contraseña' => 'password123'
];

if (insertar_datos('usuarios', $datos)) {
  echo "Usuario insertado correctamente.";
} else {
  echo "Error al insertar el usuario.";
}

?>
```

**5. Modificación de datos:**

* Incluye el archivo modificar.php en tu script.
* Utiliza la función modificar_datos para modificar datos en una tabla:

```php
<?php

require_once 'lib/bases_de_datos/modificar.php';

// Modificar el email de un usuario
$datos = [
  'email' => '[dirección de correo electrónico eliminada]'
];

if (modificar_datos('usuarios', $datos, "id = 1")) {
  echo "Usuario modificado correctamente.";
} else {
  echo "Error al modificar el usuario.";
}

?>
```

**6. Eliminación de datos:**

* Incluye el archivo eliminar.php en tu script.
* Utiliza la función eliminar_datos para eliminar datos de una tabla:

```php
<?php

require_once 'lib/bases_de_datos/eliminar.php';

// Eliminar un usuario
if (eliminar_datos('usuarios', "id = 1")) {
  echo "Usuario eliminado correctamente.";
} else {
  echo "Error al eliminar el usuario.";
}

?>
```