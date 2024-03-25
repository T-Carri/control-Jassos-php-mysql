<?php
session_start();
require_once '../models/RegionModel.php';

class RegionController {
    public function regionGo($region) {
        $regionModel = new RegionModel();
        $regfound = $regionModel->getRegion($region);

        if ($regfound !== null) {
            // La región ya existe
            $_SESSION['alert_message'] = 'La región ya existe';
            $_SESSION['alert_type'] = 'danger';
        } else {
            // La región no existe, la insertamos
            $result = $regionModel->insertRegion($region);
            if ($result) {
                // Operación exitosa
                $_SESSION['alert_message'] = 'La región se agregó correctamente';
                $_SESSION['alert_type'] = 'success';
            } else {
                // Problema al agregar la región
                $_SESSION['alert_message'] = 'Hubo un problema al agregar la región';
                $_SESSION['alert_type'] = 'danger';
            }
        }

        // Redirige a agregar.php
        // Asegúrate de que la redirección se complete antes de enviar más contenido
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputValueRegion = $_POST["nombre_region"];
    $regController = new RegionController();
    $regController->regionGo($inputValueRegion);
    header('Location: ../views/agregar.php?componente=region');
    exit();
  
}
?>