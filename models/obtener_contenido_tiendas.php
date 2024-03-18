<?php
// obtener_contenido_tiendas.php

require_once '../includes/config.php';

if (isset($_GET['id_tienda'])) {
    $id_tienda_seleccionada = $_GET['id_tienda'];

    $sql = "SELECT * FROM st WHERE id_tienda = $id_tienda_seleccionada";
    $result = mysqli_query($conn, $sql);

    // Iterar sobre los resultados y mostrar el contenido
    while ($fila = mysqli_fetch_assoc($result)) {
        echo '<p>'.$fila['nombre'].'</p>';
        echo '<p>'.$fila['id'].'</p>';
        // ... sigue así para otros campos que desees mostrar
    }
}
?>