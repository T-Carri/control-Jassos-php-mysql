<?php
session_start();
require_once '../models/TiendaModel.php';

class TiendaController {
    public function tiendaGo($tienda, $foraneo, $direccion, $idregion) {
        $tiendaModel = new TiendaModel();
        $tiefound = $tiendaModel->getTienda($tienda);

        if ($tiefound !== null) {
            // La región ya existe
            $_SESSION['alert_message'] = 'La tienda ya existe';
            $_SESSION['alert_type'] = 'danger';
        } else {
            // La región no existe, la insertamos
            $result = $tiendaModel->insertTienda($tienda,  $foraneo, $direccion, $idregion);
            if ($result) {
                // Operación exitosa
                header('Location: ../views/agregar.php?componente=tiendas');
                $_SESSION['alert_message'] = 'La tienda se agregó correctamente';
                $_SESSION['alert_type'] = 'success';
            } else {
                // Problema al agregar la región
                $_SESSION['alert_message'] = 'Hubo un problema al agregar la tienda';
                $_SESSION['alert_type'] = 'danger';
            }
        }

        // Redirige a agregar.php
        // Asegúrate de que la redirección se complete antes de enviar más contenido
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputValueTienda = $_POST["nombre_tienda"];
    $inputValueRegionId = $_POST["select_categoria"];
    $inputValueForaneo = ($_POST["tipo_foraneo"] === 'true') ? true : false;
    $inputValueDireccionTienda = $_POST["direccion_tienda"];
    $tieController = new TiendaController();

    $tieController->tiendaGo($inputValueTienda, $inputValueForaneo,  $inputValueDireccionTienda,  $inputValueRegionId );
   
    exit();
  
}
?>