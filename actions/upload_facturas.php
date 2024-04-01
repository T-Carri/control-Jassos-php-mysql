<?php
require_once '../models/StModel.php';
// Obtener el id pasado como parámetro desde JavaScript
$id = $_POST['id'];

// Manejar la subida de archivos aquí
$carpetas_destino = array(
    'pdf_factura' => '../archivo/factura/pdf_factura/',
    'xml' => '../archivo/factura/xml/'
    
);

foreach ($_FILES as $nombre_campo => $archivo) {
    // Verificar si se ha seleccionado un archivo
    if (!empty($archivo['name'])) {
        $nombre_temporal = $archivo['tmp_name'];

        // Obtener la extensión del archivo original
        $extension_original = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));

        // Construir el nombre de archivo con el id y la extensión original
        $nombre_archivo = $id . '.' . $extension_original;

        // Obtener la carpeta de destino según el nombre del campo
        $carpeta_destino = $carpetas_destino[$nombre_campo];

        // Verificar si la carpeta de destino existe, si no, crearla
        if (!file_exists($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true); // Crea la carpeta si no existe
        }

        // Construir la ruta completa del archivo
        $ruta_archivo = $carpeta_destino . $nombre_archivo;

        // Verificar el tamaño del archivo (ejemplo: máximo 5MB)
        $tamanio_maximo = 5 * 1024 * 1024; // 5 MB
        if ($archivo['size'] <= $tamanio_maximo) {
            // Mover el archivo al destino
            if (move_uploaded_file($nombre_temporal, $ruta_archivo)) {
                $ST = new StModel();
                // Aquí debes insertar la ruta del archivo en tu base de datos utilizando MySQL
                $ruta_archivo_bd = $ruta_archivo;

                $result = $ST->pathFACTURA($id, $nombre_campo, $ruta_archivo_bd);
                if ($result) {
                    echo json_encode($result);
                } else {
                    echo "ERROR AL COLOCAR EL PATH DEL ARCHIVO";
                } 

                echo 'Archivo ' . $nombre_archivo . ' subido correctamente.<br>';
            } else {
                echo 'Error al subir el archivo ' . $nombre_archivo . '<br>';
            }
        } else {
            echo 'Error: El archivo ' . $nombre_archivo . ' excede el tamaño máximo permitido.<br>';
        }
    }
}

echo 'Proceso completado.';
?>