<?php
require_once '../models/BusquedasModel.php';
// Verificar si se ha enviado el parámetro del folio
if(isset($_GET['tienda'])) {
    $tienda = $_GET['tienda'];


    $BM = new BusquedasModel();

    
    $result = $BM->buscadorTiendas($tienda);




    if ($result) {
        echo json_encode($result);
    } else {
        echo "mr tienda";
    }
} else {
    // Devolver un error si no se proporcionó el parámetro del folio
    echo json_encode(array('error' => 'No se proporcionó el folio'));
}
?>
