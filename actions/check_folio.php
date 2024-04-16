<?php
require_once '../models/BusquedasModel.php';
// Verificar si se ha enviado el parámetro del folio
if(isset($_GET['folio'])) {
    $folio = $_GET['folio'];

 // Si el folio es '0000', se devuelve directamente 'mr hoo'
 if ($folio === '0000') {
    echo "mr hoo";
    exit; // Salir del script para evitar procesamiento adicional
}
    $BM = new BusquedasModel();

    
    $result = $BM->buscadorFOLIOS($folio);




    if ($result) {
        echo json_encode($result);
    } else {
        echo "mr hoo";
    }
} else {
    // Devolver un error si no se proporcionó el parámetro del folio
    echo json_encode(array('error' => 'No se proporcionó el folio'));
}
?>
