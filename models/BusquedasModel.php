<?php
require_once '../includes/config.php';

class BusquedasModel {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }
        
  
    function buscadorFiltroNavbar($search){
        $sql = "SELECT * FROM st WHERE folio LIKE ?";
        
        // Preparar la consulta con el parámetro de búsqueda
        $stmt = $this->conn->prepare($sql);
        $searchTerm = "%$search%";
        $stmt->bind_param("s", $searchTerm);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener resultados
        $result = $stmt->get_result();
        
        $resultados = [];
        
        // Iterar sobre los resultados y almacenarlos en un array
        while ($row = $result->fetch_assoc()) {
            $resultados[] = $row;
        }
        
        // Cerrar la consulta preparada
        $stmt->close();
        
        return $resultados;
    }
 


    function buscadorCEROS($search){
        $sql = "SELECT 
        st.*, 
        tienda.nombre,
        region.nombre AS nombre_region
    FROM 
        st
    INNER JOIN 
        tienda ON st.id_tienda = tienda.id
    INNER JOIN 
        region ON tienda.id_region = region.id
    WHERE 
        folio LIKE ?
    ";
        
        // Preparar la consulta con el parámetro de búsqueda
        $stmt = $this->conn->prepare($sql);
        $searchTerm = "%$search%";
        $stmt->bind_param("s", $searchTerm);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener resultados
        $result = $stmt->get_result();
        
        $resultados = [];
        
        // Iterar sobre los resultados y almacenarlos en un array
        while ($row = $result->fetch_assoc()) {
            $resultados[] = $row;
        }
        
        // Cerrar la consulta preparada
        $stmt->close();
        
        return $resultados;
    }



    function buscadorFOLIO($search){
        $sql = "SELECT 
        st.*, 
        tienda.nombre,
        region.nombre AS nombre_region
    FROM 
        st
    INNER JOIN 
        tienda ON st.id_tienda = tienda.id
    INNER JOIN 
        region ON tienda.id_region = region.id
    WHERE 
        folio LIKE ?
    ";
        
        // Preparar la consulta con el parámetro de búsqueda
        $stmt = $this->conn->prepare($sql);
        $searchTerm = "%$search%";
        $stmt->bind_param("s", $searchTerm);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener resultados
        $result = $stmt->get_result();
        
        $resultados = [];
        
        // Iterar sobre los resultados y almacenarlos en un array
        while ($row = $result->fetch_assoc()) {
            $resultados[] = $row;
        }
        
        // Cerrar la consulta preparada
        $stmt->close();
        
        return $resultados;
    }





    function buscadorFOLIOS($search){
        $sql = "SELECT 
        st.id
      
    FROM 
        st
 
    WHERE 
        folio LIKE ?
    ";
        
        // Preparar la consulta con el parámetro de búsqueda
        $stmt = $this->conn->prepare($sql);
        $searchTerm = "%$search%";
        $stmt->bind_param("s", $searchTerm);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener resultados
        $result = $stmt->get_result();
        
        $resultados = [];
        
        // Iterar sobre los resultados y almacenarlos en un array
        while ($row = $result->fetch_assoc()) {
            $resultados[] = $row;
        }
        
        // Cerrar la consulta preparada
        $stmt->close();
        
        return $resultados;
    }



    
    function buscadorTIENDAS($search){
        $sql = "SELECT 
                tienda.id   
                FROM 
                tienda
 
    WHERE 
        nombre LIKE ?
    ";
        
        // Preparar la consulta con el parámetro de búsqueda
        $stmt = $this->conn->prepare($sql);
        $searchTerm = "%$search%";
        $stmt->bind_param("s", $searchTerm);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener resultados
        $result = $stmt->get_result();
        
        $resultados = [];
        
        // Iterar sobre los resultados y almacenarlos en un array
        while ($row = $result->fetch_assoc()) {
            $resultados[] = $row;
        }
        
        // Cerrar la consulta preparada
        $stmt->close();
        
        return $resultados;
    }



       
    function buscadorREGIONES($search){
        $sql = "SELECT 
                region.id   
                FROM 
                region
 
    WHERE 
        nombre LIKE ?
    ";
        
        // Preparar la consulta con el parámetro de búsqueda
        $stmt = $this->conn->prepare($sql);
        $searchTerm = "%$search%";
        $stmt->bind_param("s", $searchTerm);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener resultados
        $result = $stmt->get_result();
        
        $resultados = [];
        
        // Iterar sobre los resultados y almacenarlos en un array
        while ($row = $result->fetch_assoc()) {
            $resultados[] = $row;
        }
        
        // Cerrar la consulta preparada
        $stmt->close();
        
        return $resultados;
    }

}?>