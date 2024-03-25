<?php

// Verificar si se ha enviado algún archivo
if(isset($_FILES['fileInput'])) {
    $file = $_FILES['fileInput'];

    // Directorio donde se almacenarán los archivos subidos (asegúrate de que este directorio exista y tenga permisos de escritura)
    $uploadDirectory = '../archivo/ppto/';

    // Nombre del archivo en el servidor (puedes personalizarlo según tus necesidades)
    $fileName = uniqid('archivo_') . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

    // Ruta completa del archivo en el servidor
    $uploadPath = $uploadDirectory . $fileName;

    // Intentar mover el archivo al directorio de destino
    if(move_uploaded_file($file['tmp_name'], $uploadPath)) {
        // La subida del archivo fue exitosa
        // Devolver la URL del archivo (puedes personalizar la URL según la estructura de tu proyecto)
        $fileUrl = 'https://tudominio.com/' . $uploadPath;
        echo $fileUrl;
    } else {
        // Error al mover el archivo
        echo 'Error: No se pudo subir el archivo. Verifica que el directorio de destino tenga permisos de escritura.';
    }
} else {
    // No se envió ningún archivo
    echo 'Error: No se recibió ningún archivo.';
}

?>