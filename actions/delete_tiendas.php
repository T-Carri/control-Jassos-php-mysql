<?php 
require_once '../models/TiendaModel.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_POST['tiendaId'])) {
        $tiendaId = $_POST['tiendaId'];

     
        $tiendaModel = new TiendaModel();

      
        $result = $tiendaModel->eliminarTienda($tiendaId);

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