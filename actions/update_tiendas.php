<?php 
require_once '../models/TiendaModel.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_POST['tiendaId'])) {
        $tiendaId = $_POST['tiendaId'];
        $nombre = $_POST['nombre'];
     
        $tiendaModel = new TiendaModel();

      
        $result = $tiendaModel->editarTienda($tiendaId, $nombre);

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