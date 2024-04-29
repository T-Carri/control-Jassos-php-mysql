<?php
require_once '../includes/config.php';

class RegionModel {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }
        
  

    public function getRegion($region) {
        $sql = "SELECT * FROM region WHERE nombre = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $region);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function eliminarRegion($regionId) {
        $sql = "DELETE FROM region WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $regionId);
        return $stmt->execute();
    }


    public function editarRegion($regionId, $nuevoNombre) {
        $sql = "UPDATE region SET nombre = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $nuevoNombre, $regionId);
        return $stmt->execute();
    }

        public function getRegiones() {
            $sql = "SELECT * FROM region";
            $result = $this->conn->query($sql);
        
            $regiones = [];
            while ($row = $result->fetch_assoc()) {
                $regiones[] = $row;
            }
        
            return $regiones;
        }    


    public function insertRegion ($region) {
        $sql = "INSERT INTO region (nombre) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $region);
        return $stmt->execute();

    
}}
?>