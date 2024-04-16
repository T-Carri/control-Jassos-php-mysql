<?php 
require_once '../models/BusquedasModel.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['folio'])) {
       
        $search = $_GET['folio'];
     
     
        $BM = new BusquedasModel();

      
        $result = $BM->buscadorCEROS($search);

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