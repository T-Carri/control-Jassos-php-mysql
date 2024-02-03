<?php 
require_once '../models/RegionModel.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_POST['regionId'])) {
        $regionId = $_POST['regionId'];
        $region = $_POST['region'];
     
        $regionModel = new RegionModel();

      
        $result = $regionModel->editarRegion($regionId, $region );

        if ($result) {
            echo "La región se edito con éxito.";
          
        } else {
            echo "Error al editar la región.";
        }
    } else {
        echo "Parámetro 'regionId' no presente en la solicitud POST.";
    }
} else {
    echo "Método de solicitud no permitido.";
}



?>