<?php
require_once '../models/StModel.php';
// Verificar si se recibieron los datos necesarios
if (isset($_POST['id']) && isset($_POST['campo'])) {
    // Recuperar los datos enviados por AJAX
    $id = $_POST['id'];
    $campo = $_POST['campo'];
    
    
    // Obtener la ruta del archivo desde la base de datos o donde esté almacenada
    // Aquí debes reemplazar esta línea con el código que obtiene la ruta del archivo según el ID y el campo proporcionados
    $ruta_archivo = obtener_ruta_archivo_desde_bd($id, $campo);

    // Verificar si la ruta del archivo existe y eliminar el archivo si es así
    if (file_exists($ruta_archivo)) {
        unlink($ruta_archivo); // Eliminar el archivo

        // Aquí puedes agregar código adicional si necesitas realizar alguna acción después de eliminar el archivo
        actualizar_campo_a_null($id, $campo);
        // Por ejemplo, si necesitas actualizar la base de datos para eliminar la referencia al archivo, aquí podrías escribir esa lógica
echo $ruta_archivo;
        // Devolver una respuesta al cliente (JavaScript) indicando que la eliminación del archivo fue exitosa
        echo "Archivo eliminado correctamente.";
    } else {
        // Si la ruta del archivo no existe, devolver un mensaje de error
        echo "El archivo no existe en la ruta especificada.";
        echo $ruta_archivo; 
    }
} else {
    // Si no se recibieron los datos necesarios, devolver un mensaje de error
    echo "Error: Faltan parámetros en la solicitud.";
}

// Función para obtener la ruta del archivo desde la base de datos (debes implementarla según tu estructura de base de datos y cómo almacenas las rutas de los archivos)
function obtener_ruta_archivo_desde_bd($id, $campo) {
    // Aquí debes escribir el código para obtener la ruta del archivo desde la base de datos según el ID y el campo proporcionados
    // Por ejemplo:

    $stModel = new StModel();
    $ruta = $stModel->consulta_a_la_bd_para_obtener_ruta($id, $campo);
     return $ruta;
}


function actualizar_campo_a_null($id, $campo) {
    $stModel = new StModel();
    $stModel->actualizar_campo_a_null($id, $campo);
}



?>