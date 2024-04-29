<?php 
require_once '../models/BusquedasModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_POST['search'])) {
        $search = $_POST['search'];

        $busquedasModel = new BusquedasModel();

        $result = $busquedasModel->buscadorFiltroNavbar($search);

        if ($result) {
            // Variable para controlar si el resultado "0000" ya se ha mostrado
            $resultado0000_mostrado = false;

            echo '<ul class="list-group">';
            foreach ($result as $row) {
                // Si el folio es "0000" y ya se ha mostrado antes, saltamos a la siguiente iteración del bucle
                if ($row['folio'] == '0000' && $resultado0000_mostrado) {
                    continue;
                }

                echo '<a href="/views/resultado.php?foliobusqueda=' . $row['folio'] . '">';
                echo '<li class="list-group-item border rounded-3 list-group-item-action d-flex justify-content-between align-items-center">';
                echo '<p class="mb-0 text-black"><i class="fa-solid fa-paperclip me-2"></i>' . $row['folio'] . '</p>';
                // Aquí puedes añadir más campos según sea necesario
                // Opción para seleccionar este resultado, por ejemplo, un botón de "Seleccionar"
                // Puedes agregarlo como un botón dentro del <li> o fuera de él, dependiendo de tus necesidades
                echo '</li>';
                echo '</a>';

                // Si el folio es "0000", marcamos la bandera como verdadera para indicar que ya se ha mostrado
                if ($row['folio'] == '0000') {
                    $resultado0000_mostrado = true;
                }
            }
            echo '</ul>';

        } else {
            echo "Error al encontrar resultados.";
        }
    } else {
        echo "Parámetro 'busqueda' no presente en la solicitud POST.";
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>