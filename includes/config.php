<?php

$envFile = __DIR__ . '../../.env';

if (file_exists($envFile)) {
    $envVars = parse_ini_file($envFile);

    // Configuración de la base de datos
    define('DB_HOST', $envVars['DB_HOST_1']);
    define('DB_USER', $envVars['DB_USER_1']);
    define('DB_PASSWORD', $envVars['DB_PASSWORD_1'] );
    define('DB_NAME', $envVars['DB_NAME_1'] ?? 'sij_localhost');
    // Otras configuraciones globales, si es necesario
    define('SITE_NAME', $envVars['SITE_NAME_1']);
} else {
    die('.env file not found. Please create one.');
}

?>