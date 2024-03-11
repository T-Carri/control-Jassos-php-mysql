<?php
session_start();
require_once '../models/StModel.php';

class StController1 {
    public function stArchiver($id, $archivado) {
        $stModel = new StModel();
        //$stfound = $stModel->getSeguroSt($id);
        
        $result = $stModel->archivarSt($id, $archivado);
        header('Location: ../views/presaldos.php');
        // Redirige a agregar.php
        // Asegúrate de que la redirección se complete antes de enviar más contenido
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputid = $_POST["id"];
    $archivadox= false;
       
    
    $stController = new StController1();
    $stController->stArchiver($inputid,  $archivadox);
    
    exit();
  
}
?>
