<?php

// Define las secciones del menú
$secciones = [
    "Base de datos" => [
        "1" => "migrate",
        "2" => "migrate:rollback",
        "3" => "migrate:refresh",
        "4" => "migrate:reset",
        "5" => "migrate:status",
        "6" => "db:seed",
        "7" => "db:wipe",
    ],
    "Cache y cola" => [
        "1" => "cache:clear",
        "2" => "cache:forget",
        "3" => "queue:work",
        "4" => "queue:listen",
        "5" => "queue:restart",
        "6" => "queue:failed",
    ],
    "Modelos y migraciones" => [
        "1" => "make:model",
        "2" => "make:migration",
        "3" => "make:factory",
        "4" => "make:seeder",
    ],
    "Controladores" => [
        "1" => "make:controller",
        "2" => "make:resource",
        "3" => "make:request",
        "4" => "make:policy",
    ],
    "Vistas" => [
        "1" => "make:view",
        "2" => "view:clear",
    ],
    "Rutas" => [
        "1" => "route:list",
        "2" => "route:cache",
        "3" => "route:clear",
    ],
    "Tests" => [
        "1" => "test",
        "2" => "make:test",
    ],
    "Miscelánea" => [
        "1" => "key:generate",
        "2" => "storage:link",
        "3" => "vendor:publish",
        "4" => "inspire",
        "5" => "tinker",
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
    $comandoEncontrado = false;
    foreach ($secciones as $comandos) {
        if (isset($comandos[$opcion])) {
            $comando = $comandos[$opcion];
            echo "Ejecutando comando: php artisan " . $comando . "\n";
            system("php artisan " . $comando);
            $comandoEncontrado = true;
            break;
        }
    }

    if (!$comandoEncontrado) {
        echo "Opción inválida. Inténtalo de nuevo.\n";
    }
}

echo "¡Hasta luego!\n";

?>