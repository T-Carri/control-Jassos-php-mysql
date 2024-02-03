<?php 
require_once '../models/StModel.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_POST['stId'])) {
        $stId = $_POST['stId'];

     
        $stModel = new StModel();

      
        $result = $stModel->eliminarSt($stId);

        if ($result) {
            echo "La tienda se eliminó con éxito.";
          
        } else {
            echo "Error al eliminar la tienda.";
        }
    } else {
        echo "Parámetro 'tiendaId' no presente en la solicitud POST.";
    }
} else {
    echo "Método de solicitud no permitido.";
}



?>