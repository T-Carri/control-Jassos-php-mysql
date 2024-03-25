<?php

$envFile = __DIR__ . '../../.env';

if (file_exists($envFile)) {
    $envVars = parse_ini_file($envFile);

    // Configuración de la base de datos
    define('DB_HOSTi', $envVars['DB_HOST_1']);
    define('DB_USERi', $envVars['DB_USER_1']);
    define('DB_PASSWORDi', $envVars['DB_PASSWORD_1'] );
    define('DB_NAMEi', $envVars['DB_NAME_1'] ?? 'sij_localhost');
    // Otras configuraciones globales, si es necesario
    define('SITE_NAMEi', $envVars['SITE_NAME_1']);
} else {
    die('.env file not found. Please create one.');
}

class DatabaseConnectioni {
    private $conn;

    public function __construct() {
        // Configuración de la conexión a la base de datos
        $host = DB_HOSTi;
        $username = DB_USERi;
        $password = DB_PASSWORDi;
        $dbname = DB_NAMEi;

        // Crear una nueva instancia de la conexión
        $this->conn = new mysqli($host, $username, $password, $dbname);

        // Verificar si hay errores de conexión
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

?>