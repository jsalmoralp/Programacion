<?php

// Define las secciones del menú
$secciones = [
    "Base de datos" => [
        "1" => "migrate",
        "2" => "migrate:rollback",
        "3" => "migrate:refresh",
        "4" => "db:seed",
    ],
    "Modelos y migraciones" => [
        "1" => "make:model",
        "2" => "make:migration",
    ],
    "Controladores" => [
        "1" => "make:controller",
        "2" => "make:resource",
    ],
    // ... más secciones y comandos
];

// Función para mostrar el menú
function mostrarMenu($secciones) {
    echo "Menú de comandos de Artisan:\n";
    foreach ($secciones as $nombreSeccion => $comandos) {
        echo "\n  " . $nombreSeccion . ":\n";
        foreach ($comandos as $opcion => $comando) {
            echo "    " . $opcion . ". " . $comando . "\n";
        }
    }
    echo "\n  0. Salir\n";
    echo "\nElige una opción: ";
}

// Bucle principal
while (true) {
    mostrarMenu($secciones);
    $opcion = trim(fgets(STDIN));

    if ($opcion === "0") {
        break;
    }

    // Procesa la opción seleccionada
    foreach ($secciones as $comandos) {
        if (isset($comandos[$opcion])) {
            $comando = $comandos[$opcion];
            echo "Ejecutando comando: php artisan " . $comando . "\n";
            system("php artisan " . $comando);
            break 2; // Sale de los dos bucles
        }
    }

    echo "Opción inválida. Inténtalo de nuevo.\n";
}

echo "¡Hasta luego!\n";

?>