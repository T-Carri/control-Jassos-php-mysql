<?php
require_once '../includes/config.php';

class UsuarioModel {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function getUserByEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }


    public function insertUser($nombre, $email, $hashed_password) {
        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $nombre, $email, $hashed_password);
        return $stmt->execute();

    // Puedes agregar más funciones relacionadas con la gestión de usuarios aquí
}
}
?>