<?php
require_once '../models/StModel.php';
// Obtener el id pasado como parámetro desde JavaScript
$id = $_POST['id'];
$id_tienda = $_POST['id_tienda'];

// Manejar la subida de archivos aquí
$carpetas_destino = array(
    'pdf_generador' => '../archivo/ppto/pdf_generador/',
    'pdf_plano' => '../archivo/ppto/pdf_plano/',
    'pdf_ppto' => '../archivo/ppto/pdf_ppto/'
);

foreach ($_FILES as $nombre_campo => $archivo) {
    // Verificar si se ha seleccionado un archivo
    if (!empty($archivo['name'])) {
        $nombre_temporal = $archivo['tmp_name'];

        // Construir el nombre de archivo con el id
        $nombre_archivo = $id . '.pdf'; // Cambia '.pdf' según la extensión del archivo

        // Obtener la carpeta de destino según el nombre del campo
        $carpeta_destino = $carpetas_destino[$nombre_campo];

        // Verificar si la carpeta de destino existe, si no, crearla
        if (!file_exists($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true); // Crea la carpeta si no existe
        }

        // Construir la ruta completa del archivo
        $ruta_archivo = $carpeta_destino . $nombre_archivo;

        // Verificar el tipo de archivo y su tamaño (ejemplo: solo permitir archivos PDF y máximo 5MB)
        $extension = strtolower(pathinfo($ruta_archivo, PATHINFO_EXTENSION));
        $tamanio_maximo = 5 * 1024 * 1024; // 5 MB

        if ($extension == 'pdf' && $archivo['size'] <= $tamanio_maximo) {
            // Mover el archivo al destino
            if (move_uploaded_file($nombre_temporal, $ruta_archivo)) {
                $ST = new StModel();
               
                // Aquí debes insertar la ruta del archivo en tu base de datos utilizando MySQL
                $ruta_archivo_bd = $ruta_archivo;
                // Ejemplo de inserción en MySQL:
                // $sql = "INSERT INTO archivos (ruta) VALUES ('$ruta_archivo_bd')";
                // mysqli_query($conexion, $sql);


                $result = $ST->pathPPTO($id, $nombre_campo, $ruta_archivo_bd);
                



                if ($result) {
                    echo json_encode($result);
                } else {
                    echo "ERROR AL COLOCAR EL PATH DEL ARCHIVO";
                } 

                echo 'Archivo ' . $nombre_archivo . ' subido correctamente, al id:'.$id.'y path:'. $ruta_archivo_bd.'.<br>';
            } else {
                echo 'Error al subir el archivo ' . $nombre_archivo . ' , al id:'.$id.'y path:'. $ruta_archivo_bd.'.<br>';
            }
        } else {
            echo 'Error: El archivo ' . $nombre_archivo . ' no es un PDF válido o excede el tamaño máximo permitido.<br>';
        }
    }
}

echo 'Proceso completado.';
?>