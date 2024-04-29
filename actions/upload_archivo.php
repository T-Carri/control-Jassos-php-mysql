<?php
require_once '../models/StModel.php';
// Obtener el id pasado como parámetro desde JavaScript
$id = $_POST['id'];
$id_tienda = $_POST['id_tienda'];

// Manejar la subida de archivos aquí
$carpetas_destino = array(
    'pdf_generador' => '../archivo/ppto/pdf_generador/',
    'pdf_plano' => '../archivo/ppto/pdf_plano/',
    'pdf_ppto' => '../archivo/ppto/pdf_ppto/',
    'pdf_factura' => '../archivo/factura/pdf_factura/',
    'xml' => '../archivo/factura/xml/'
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
            
            echo "Carpeta destino: $carpeta_destino<br>";
echo "Nombre archivo: $nombre_archivo<br>";
echo "Ruta completa: $ruta_archivo<br>";
            
            if (move_uploaded_file($nombre_temporal, $ruta_archivo)) {
                
                
                    if ($_FILES[$nombre_campo]['error'] !== UPLOAD_ERR_OK) {
        // Manejar el error según el código de error
        switch ($_FILES[$nombre_campo]['error']) {
            case UPLOAD_ERR_INI_SIZE:
                echo 'Error: El archivo excede la directiva upload_max_filesize en php.ini.';
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo 'Error: El archivo excede el tamaño máximo permitido por el formulario.';
                break;
            case UPLOAD_ERR_PARTIAL:
                echo 'Error: El archivo no se ha subido completamente.';
                break;
            case UPLOAD_ERR_NO_FILE:
                echo 'Error: No se ha seleccionado ningún archivo para subir.';
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                echo 'Error: Falta el directorio temporal.';
                break;
            case UPLOAD_ERR_CANT_WRITE:
                echo 'Error: Error al escribir el archivo en el disco.';
                break;
            case UPLOAD_ERR_EXTENSION:
                echo 'Error: Una extensión PHP detuvo la subida del archivo.';
                break;
            default:
                echo 'Error desconocido al subir el archivo.';
                break;
        }
        // Terminar la ejecución del script si hay un error
        return;
    }

                
                
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
                echo 'Error al subir el archivo ' . $nombre_archivo . '<br>';
            }
        } else {
            echo 'Error: El archivo ' . $nombre_archivo . ' no es un PDF válido o excede el tamaño máximo permitido.<br>';
        }
    }
}

echo 'Proceso completado.';
?>