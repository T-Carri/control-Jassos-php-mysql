<?php
require_once '../includes/config.php';

class TiendaModel {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }
        
  

    public function getTienda($tienda) {
        $sql = "SELECT * FROM tienda WHERE nombre = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $tienda);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function eliminarTienda($tiendaId) {
        $sql = "DELETE FROM tienda WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $tiendaId);
        return $stmt->execute();
    }


    public function editarTienda($tiendaId, $nuevoNombre) {
        $sql = "UPDATE tienda SET nombre = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $nuevoNombre, $tiendaId);
        return $stmt->execute();
    }

        public function getTiendas() {
            $sql = "SELECT 
            t.*, 
            r.nombre AS nombre_region
        FROM 
            tienda t
        INNER JOIN 
            region r ON t.id_region = r.id";
            $result = $this->conn->query($sql);
        
            $tiendas = [];
            while ($row = $result->fetch_assoc()) {
                $tiendas[] = $row;
            }
        
            return $tiendas;
        }    



        public function getTiendasTotal() {
            $sql = "SELECT tienda.*, region.nombre AS nombre_region
            FROM tienda
            INNER JOIN region ON tienda.id_region = region.id";
            $result = $this->conn->query($sql);
        
            $tiendas = [];
            while ($row = $result->fetch_assoc()) {
                $tiendas[] = $row;
            }
        
            return $tiendas;
        }
        


        public function insertTienda($tienda, $foraneo, $direccion, $id_region) {
            $sql = "INSERT INTO tienda (nombre, foraneo, direccion, id_region) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
           
            $stmt->bind_param("sisi", $tienda, $foraneo, $direccion, $id_region);
            return $stmt->execute();
        }
}
?>