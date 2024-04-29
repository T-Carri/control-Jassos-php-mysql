<?php




    // Configuración de la base de datos
    define('DB_HOSTi', '198.59.144.15');
    define('DB_USERi', 'jassosmx_darkNight');
    define('DB_PASSWORDi', 'Fs)Fx%-y1kmD' );
    define('DB_NAMEi', 'jassosmx_sij');
    // Otras configuraciones globales, si es necesario
    define('SITE_NAMEi', 'panel.jassosmx.mx' );


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