<?php
session_start();
require_once '../models/RegionModel.php';
class RegionController {
    public function regionGo($region) {
        $regionModel = new RegionModel();
        $regfound = $regionModel->getRegion($region);
        if ($regfound !== null) {
            $_SESSION['alert_message'] = 'La región ya existe';
            $_SESSION['alert_type'] = 'danger';
        } else {
            $result = $regionModel->insertRegion($region);
            if ($result) {
                header('Location: ../views/agregar.php?componente=region');
                $_SESSION['alert_message'] = 'La región se agregó correctamente';
                $_SESSION['alert_type'] = 'success';
            } else {
                $_SESSION['alert_message'] = 'Hubo un problema al agregar la región';
                $_SESSION['alert_type'] = 'danger';
            }
        }

       
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputValueRegion = $_POST["nombre_region"];
    $regController = new RegionController();
    $regController->regionGo($inputValueRegion);
    
    exit();
  }?>