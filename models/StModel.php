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



    public function getSeguroSt($id) {
        $sql = "SELECT * FROM st WHERE id =?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id);
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
    st.fecha < CURDATE()
    AND tienda.foraneo = 0
    AND (st.autorizado != true OR st.estado_portal != 'ACEPTADO' OR st.trabajo_realizado != true)
";

    $result = $this->conn->query($sql);
    $sts = [];
    while ($row = $result->fetch_assoc()) {
        $sts[] = $row;
    }

    return $sts;
}
    
    public function getSts10To15Days() {

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
            st.fecha BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 21 DAY)
        )
        AND tienda.foraneo = 0
        AND (st.autorizado != true OR st.estado_portal != 'ACEPTADO' OR st.trabajo_realizado != true)";

        
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
    st.fecha < CURDATE()
    AND tienda.foraneo = 1
    AND (st.autorizado != true OR st.estado_portal != 'ACEPTADO' OR st.trabajo_realizado != true)";

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
        st.fecha BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 21 DAY)
    )
    AND tienda.foraneo = 1
    AND (st.autorizado != true OR st.estado_portal != 'ACEPTADO' OR st.trabajo_realizado != true)";

    
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


//presaldos

public function editarStPresaldos($id, $folio, $estado_portal, $autorizado, $trabajo_realizado, $archivado, $trabajo, $fecha ) {
    $sql = "UPDATE st SET folio = ?, estado_portal = ?, autorizado = ?, trabajo_realizado = ?, archivado=?, trabajo = ?, fecha = ? WHERE id =? ";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssssssss",  $folio, $estado_portal, $autorizado, $trabajo_realizado, $archivado ,$trabajo, $fecha, $id );
    return $stmt->execute();
}



public function editarStSaldos($id, $archivado ) {
    $sql = "UPDATE st SET  archivado=? WHERE id =? ";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ss",  $archivado,  $id );
    return $stmt->execute();
}


public function getPresaldos() {
    $sql = "SELECT 
    st.*, 
    tienda.nombre AS nombre_tienda, 
    tienda.foraneo AS foraneo_tienda
FROM 
    st
INNER JOIN 
    tienda ON st.id_tienda = tienda.id
WHERE   
     st.autorizado = true
    AND st.estado_portal = 'ACEPTADO'
    AND st.trabajo_realizado = true
    AND st.archivado != true
    "
    ;
    $result = $this->conn->query($sql);

    $sts = [];
    while ($row = $result->fetch_assoc()) {
        $sts[] = $row;
    }

    return $sts;
}  



public function getArchivados() {
    $sql = "SELECT 
    st.*, 
    tienda.nombre AS nombre_tienda, 
    tienda.foraneo AS foraneo_tienda
FROM 
    st
INNER JOIN 
    tienda ON st.id_tienda = tienda.id
WHERE   
     st.autorizado = true
    AND st.estado_portal = 'ACEPTADO'
    AND st.trabajo_realizado = true
    AND st.archivado = true
    "
    ;
    $result = $this->conn->query($sql);

    $sts = [];
    while ($row = $result->fetch_assoc()) {
        $sts[] = $row;
    }

    return $sts;
}  






public function archivarSt($id, $archivado ) {
    $sql = "UPDATE st SET archivado = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ss",  $archivado, $id );
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

//for pizarron 

public function pizarronway() {
    $sql = "SELECT 
    st.*, 
    tienda.nombre AS nombre_tienda, 
    tienda.foraneo AS foraneo_tienda,
    tienda.id_region AS id_region_entienda
FROM 
    st
INNER JOIN 
    tienda ON st.id_tienda = tienda.id
WHERE 
    st.fecha <= CURDATE()
    AND tienda.foraneo = 0
    AND (st.autorizado != true OR st.estado_portal != 'ACEPTADO' OR st.trabajo_realizado != true)
";

    $result = $this->conn->query($sql);
    $sts = [];
    while ($row = $result->fetch_assoc()) {
        $sts[] = $row;
    }

    return $sts;
}
   

public function pizarronwayx() {
    $sql = "SELECT 
    st.*, 
    tienda.nombre AS nombre_tienda, 
    tienda.foraneo AS foraneo_tienda,
    tienda.id_region AS id_region_entienda
FROM 
    st
INNER JOIN 
    tienda ON st.id_tienda = tienda.id
WHERE 
    st.fecha <= CURDATE()
    AND tienda.foraneo = 1
    AND (st.autorizado != true OR st.estado_portal != 'ACEPTADO' OR st.trabajo_realizado != true)
";

    $result = $this->conn->query($sql);
    $sts = [];
    while ($row = $result->fetch_assoc()) {
        $sts[] = $row;
    }

    return $sts;
}




//Funciones con efecto en filtros

//no 1. practicamente activos 

public function filtros1($id) {
    // Preparar la consulta con un marcador de posición
    $sql = "SELECT 
    st.*, 
    tienda.nombre
FROM 
    st
    INNER JOIN 
    tienda ON st.id_tienda = tienda.id
WHERE   
    st.id_tienda = ?
    AND (
        st.autorizado != true
        OR st.trabajo_realizado != true
    )
    AND st.estado_portal != 'CANCELADO'
    AND st.archivado != true";

    // Preparar la sentencia
    $stmt = $this->conn->prepare($sql);

    // Enlazar el valor de $id al marcador de posición
    $stmt->bind_param("i", $id);  // "i" indica que el valor es un entero

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado de la consulta
    $result = $stmt->get_result();

    // Recorrer los resultados y almacenarlos en un array
    $sts = [];
    while ($row = $result->fetch_assoc()) {
        $sts[] = $row;
    }

    // Cerrar la sentencia
    $stmt->close();

    return $sts;
}




//no 2. practicamente desactivos 

public function filtros2($id) {
    // Preparar la consulta con un marcador de posición
    $sql = "SELECT 
        st.*, 
        tienda.nombre
    FROM 
        st
        INNER JOIN 
    tienda ON st.id_tienda = tienda.id
   WHERE   
        st.id_tienda = ?
    AND st.autorizado = true
    AND st.estado_portal = 'ACEPTADO'
    AND st.trabajo_realizado = true
    AND st.archivado != true";

    // Preparar la sentencia
    $stmt = $this->conn->prepare($sql);

    // Enlazar el valor de $id al marcador de posición
    $stmt->bind_param("i", $id);  // "i" indica que el valor es un entero

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado de la consulta
    $result = $stmt->get_result();

    // Recorrer los resultados y almacenarlos en un array
    $sts = [];
    while ($row = $result->fetch_assoc()) {
        $sts[] = $row;
    }

    // Cerrar la sentencia
    $stmt->close();

    return $sts;
}




public function filtros3($id) {
    // Preparar la consulta con un marcador de posición
    $sql = "SELECT 
        st.*, 
        tienda.nombre
    FROM 
        st
        INNER JOIN 
    tienda ON st.id_tienda = tienda.id
   WHERE   
        st.id_tienda = ?
        AND st.archivado = true";

    // Preparar la sentencia
    $stmt = $this->conn->prepare($sql);

    // Verificar si la preparación de la sentencia fue exitosa
    if (!$stmt) {
        die("Error al preparar la consulta: " . $this->conn->error);
    }

    // Enlazar el valor de $id al marcador de posición
    $stmt->bind_param("i", $id);  // "i" indica que el valor es un entero

    // Ejecutar la consulta
    $stmt->execute();

    // Verificar si la ejecución de la consulta fue exitosa
    if (!$stmt->execute()) {
        die("Error al ejecutar la consulta: " . $stmt->error);
    }

    // Obtener el resultado de la consulta
    $result = $stmt->get_result();

    // Verificar si se obtuvieron resultados
    if (!$result) {
        die("Error al obtener resultados de la consulta: " . $stmt->error);
    }

    // Recorrer los resultados y almacenarlos en un array
    $sts = [];
    while ($row = $result->fetch_assoc()) {
        $sts[] = $row;
    }

    // Cerrar la sentencia
    $stmt->close();

    return $sts;
}



public function filtros4($id) {
    // Preparar la consulta con un marcador de posición
    $sql = "SELECT 
        st.*, 
        tienda.nombre
    FROM 
        st
        INNER JOIN 
    tienda ON st.id_tienda = tienda.id
   WHERE   
        st.id_tienda = ?
        AND st.estado_portal = 'CANCELADO'";

    // Preparar la sentencia
    $stmt = $this->conn->prepare($sql);

    // Enlazar el valor de $id al marcador de posición
    $stmt->bind_param("i", $id);  // "i" indica que el valor es un entero

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado de la consulta
    $result = $stmt->get_result();

    // Recorrer los resultados y almacenarlos en un array
    $sts = [];
    while ($row = $result->fetch_assoc()) {
        $sts[] = $row;
    }

    // Cerrar la sentencia
    $stmt->close();

    return $sts;
}







public function pathPPTO($id, $campo_bd, $ruta) {
    $sql = "UPDATE st SET $campo_bd = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ss", $ruta, $id);
    return $stmt->execute();
}


public function pathFACTURA($id, $campo_bd, $ruta) {
    $sql = "UPDATE st SET $campo_bd = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ss", $ruta, $id);
    return $stmt->execute();
}

 



public function consulta_a_la_bd_para_obtener_ruta($id, $campo) {
    $sql = "SELECT $campo FROM st WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        return $row[$campo]; // Devolver el valor específico del campo
    } else {
        return null;
    }
}







public function actualizar_campo_a_null($id, $campo) {
    // Preparar la consulta SQL para actualizar el campo a NULL
    $sql = "UPDATE st SET $campo = NULL WHERE id = ?";
    
    // Preparar la declaración y ejecutar la consulta
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id); // Suponiendo que $id es un entero, cambiar "i" según corresponda
    $stmt->execute();

    // Verificar si la consulta se ejecutó correctamente
    if ($stmt->affected_rows > 0) {
        // La actualización se realizó con éxito
        return true;
    } else {
        // Ocurrió un error al ejecutar la consulta
        return false;
    }
}

}
?>