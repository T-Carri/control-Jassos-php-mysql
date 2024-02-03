<?php
require_once '../includes/config.php';

class StModel {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }
        
  /* INSERT INTO st (folio, trabajo, id_tienda, fecha, autorizado, estado_portal, trabajo_realizado)
VALUES (12345, 'Trabajo de ejemplo', 1, '2024-01-19', true, 'En proceso', false);
 */


    public function insertSt($folio, $trabajo, $id_tienda, $fecha, $autorizado, $estado_portal, $trabajo_realizado) {
        $sql = "INSERT INTO st(folio, trabajo, id_tienda, fecha, autorizado, estado_portal, trabajo_realizado) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssissss", $folio, $trabajo, $id_tienda, $fecha, $autorizado, $estado_portal, $trabajo_realizado);
        return $stmt->execute();
    }


    public function getSt($folio) {
        $sql = "SELECT * FROM st WHERE (folio = ? AND folio <> '0000')";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $folio);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }


    public function getSts() {
        $sql = "SELECT * FROM st";
        $result = $this->conn->query($sql);
    
        $sts = [];
        while ($row = $result->fetch_assoc()) {
            $sts[] = $row;
        }
    
        return $sts;
    }    


//NO FORANEOS

public function getSts0To10Days() {
    $sql = "SELECT 
    st.*, 
    tienda.nombre AS nombre_tienda, 
    tienda.foraneo AS foraneo_tienda
FROM 
    st
INNER JOIN 
    tienda ON st.id_tienda = tienda.id
WHERE 
    (
        (st.fecha BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 10 DAY))
        OR (st.fecha < CURDATE() AND DATEDIFF(CURDATE(), st.fecha) <= 10)
    )
    AND tienda.foraneo = 0";

    $result = $this->conn->query($sql);
    $sts = [];
    while ($row = $result->fetch_assoc()) {
        $sts[] = $row;
    }

    return $sts;
}
    
    public function getSts10To15Days() {

        $sql = "SELECT st.*, tienda.nombre AS nombre_tienda, tienda.foraneo AS foraneo_tienda
        FROM st
        INNER JOIN tienda ON st.id_tienda = tienda.id
        WHERE (st.fecha BETWEEN DATE_ADD(CURDATE(), INTERVAL 10 DAY) AND DATE_ADD(CURDATE(), INTERVAL 14 DAY))
        AND tienda.foraneo = 0";

        
        $result = $this->conn->query($sql);
    
        $sts = [];
        while ($row = $result->fetch_assoc()) {
            $sts[] = $row;
        }
    
        return $sts;
    }

    public function getSts15To21Days() {

        $sql = "SELECT st.*, tienda.nombre AS nombre_tienda, tienda.foraneo AS foraneo_tienda
        FROM st
        INNER JOIN tienda ON st.id_tienda = tienda.id
        WHERE (st.fecha BETWEEN DATE_ADD(CURDATE(), INTERVAL 15 DAY) AND DATE_ADD(CURDATE(), INTERVAL 21 DAY))
        AND tienda.foraneo = 0";


        $result = $this->conn->query($sql);
    
        $sts = [];
        while ($row = $result->fetch_assoc()) {
            $sts[] = $row;
        }
    
        return $sts;
    }
 
//FORANEOS


public function getSts0To10Daysx() {
    $sql = "SELECT 
    st.*, 
    tienda.nombre AS nombre_tienda, 
    tienda.foraneo AS foraneo_tienda
FROM 
    st
INNER JOIN 
    tienda ON st.id_tienda = tienda.id
WHERE 
    (
        (st.fecha BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 10 DAY))
        OR (st.fecha < CURDATE() AND DATEDIFF(CURDATE(), st.fecha) <= 10)
    )
    AND tienda.foraneo = 1";

    $result = $this->conn->query($sql);
    $sts = [];
    while ($row = $result->fetch_assoc()) {
        $sts[] = $row;
    }

    return $sts;
}



/* public function getSts0To10Daysx() {

    $sql = "SELECT st.*, tienda.nombre AS nombre_tienda, tienda.foraneo AS foraneo_tienda 
    FROM st
    INNER JOIN tienda ON st.id_tienda = tienda.id
    WHERE (st.fecha BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 10 DAY)) 
    AND tienda.foraneo = 1";

  
    $result = $this->conn->query($sql);

    $sts = [];
    while ($row = $result->fetch_assoc()) {
        $sts[] = $row;
    }

    return $sts;
} */

public function getSts10To15Daysx() {

    $sql = "SELECT st.*, tienda.nombre AS nombre_tienda, tienda.foraneo AS foraneo_tienda
    FROM st
    INNER JOIN tienda ON st.id_tienda = tienda.id
    WHERE (st.fecha BETWEEN DATE_ADD(CURDATE(), INTERVAL 10 DAY) AND DATE_ADD(CURDATE(), INTERVAL 14 DAY))
    AND tienda.foraneo = 1";

    
    $result = $this->conn->query($sql);

    $sts = [];
    while ($row = $result->fetch_assoc()) {
        $sts[] = $row;
    }

    return $sts;
}

public function getSts15To21Daysx() {

    $sql = "SELECT st.*, tienda.nombre AS nombre_tienda, tienda.foraneo AS foraneo_tienda 
    FROM st
    INNER JOIN tienda ON st.id_tienda = tienda.id
    WHERE (st.fecha BETWEEN DATE_ADD(CURDATE(), INTERVAL 15 DAY) AND DATE_ADD(CURDATE(), INTERVAL 21 DAY))
    AND tienda.foraneo = 1";


    $result = $this->conn->query($sql);

    $sts = [];
    while ($row = $result->fetch_assoc()) {
        $sts[] = $row;
    }

    return $sts;
}
    

public function eliminarSt($stId) {
    $sql = "DELETE FROM st WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $stId);
    return $stmt->execute();
}


//Folio: e1, Estado: e2, FolioAutorizado:e3 , TrabajoAutorizado:e4, NewIdTienda: e5, NewFecha:e6 
public function editarSt($id, $folio, $estado_portal, $autorizado, $trabajo_realizado, $trabajo, $fecha ) {
    $sql = "UPDATE st SET folio = ?, estado_portal = ?, autorizado = ?, trabajo_realizado = ?, trabajo = ?, fecha = ? WHERE id =? ";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sssssss",  $folio, $estado_portal, $autorizado, $trabajo_realizado, $trabajo, $fecha, $id );
    return $stmt->execute();
}

/* 


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

       

 */
}
?>
 