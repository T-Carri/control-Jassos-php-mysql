<?php 
require_once '../models/StModel.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['idTienda'])) {
        $tiendaId = $_GET['idTienda'];
     
     
        $ST = new StModel();

      
        $result = $ST->filtros1($tiendaId);

        if ($result) {
            echo json_encode($result);
        } else {
            echo "SIN STS";
        }
    } else {
        echo "Parámetro 'regionId' no presente en la solicitud POST.";
    }


}else {
    echo "Método de solicitud no permitido.";
}

?>