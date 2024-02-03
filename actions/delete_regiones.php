<?php 
require_once '../models/RegionModel.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_POST['regionId'])) {
        $regionId = $_POST['regionId'];

     
        $regionModel = new RegionModel();

      
        $result = $regionModel->eliminarRegion($regionId);

        if ($result) {
            echo "La región se eliminó con éxito.";
          
        } else {
            echo "Error al eliminar la región.";
        }
    } else {
        echo "Parámetro 'regionId' no presente en la solicitud POST.";
    }
} else {
    echo "Método de solicitud no permitido.";
}



?>