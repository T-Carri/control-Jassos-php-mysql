<?php
session_start();
require_once '../models/StModel.php';

class StController {
    public function stGo($folio, $trabajo, $id_tienda, $fecha, $autorizado, $estado_portal, $trabajo_realizado) {
        $stModel = new StModel();
        $stfound = $stModel->getSt($folio);

        if ($stfound !== null) {
            // La región ya existe
            $_SESSION['alert_message'] = 'Este Folio ya existe';
            $_SESSION['alert_type'] = 'danger';
        } else {
            // La región no existe, la insertamos
            $result = $stModel->insertSt($folio, $trabajo, $id_tienda, $fecha, $autorizado, $estado_portal, $trabajo_realizado);
            if ($result) {
                // Operación exitosa
                $_SESSION['alert_message'] = 'La tienda se agregó correctamente';
                $_SESSION['alert_type'] = 'success';
                header('Location: ../views/dashboard.php');
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
    $inputst = $_POST["st"];
    $inputidtienda = $_POST["tienda_choose"];
    $inputtrabajo = $_POST["trabajo"];
    $inputfecha = $_POST["fecha"];
    $inputestado = $_POST["estado"];
    $st_aceptado = isset($_POST["st_aceptado"]) ? true : false;
    $trabajo_realizado = isset($_POST["trabajo_realizado"]) ? true : false;
   
    
    $stController = new StController();
    $stController->stGo($inputst, $inputtrabajo,  $inputidtienda,  $inputfecha, $st_aceptado, $inputestado,  $trabajo_realizado );
   
    exit();
  
}
?>
