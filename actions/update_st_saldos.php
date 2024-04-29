<?php 
require_once '../models/StModel.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (isset($_POST['id'])) {
        $id = $_POST['id'];
     
$trabajoarchivado = $_POST['TrabajoArchivado'] === "true" ? 1 : 0;
      
     
        $stModel = new StModel();

      
        $result = $stModel->editarStSaldos($id, $trabajoarchivado);

     

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