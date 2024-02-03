<?php 
require_once '../models/StModel.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $folio = $_POST['Folio'];
        $estado = $_POST['Estado'];
        $folioautorizado = $_POST["FolioAutorizado"] === "true" ? 1 : 0;
$trabajoautorizado = $_POST["TrabajoAutorizado"] === "true" ? 1 : 0;
        $newTrabajo = $_POST['NewTrabajo'];
        $fecha = $_POST['NewFecha'];
     
        $stModel = new StModel();

      
        $result = $stModel->editarSt($id, $folio, $estado, $folioautorizado, $trabajoautorizado, $newTrabajo, $fecha );

     

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