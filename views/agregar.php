<?php
session_start();
include_once('../models/RegionModel.php');
include_once('../models/TiendaModel.php');

if (!isset($_SESSION['email'])) {
    header('Location: ../views/login.php');
    exit();
}


$regionModel = new RegionModel();
$regiones = $regionModel->getRegiones();

$tiendaModel = new TiendaModel();
$tiendas = $tiendaModel->getTiendas();



?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
 

<style>
        .content {
            display: flex;
            justify-content: space-between;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 70px;
            width: 70%;
            height: 100%; /* Establecer altura al 100% */
        }

           /* Agregamos estilos para los contenedores de las tarjetas */
           .card-container {
            display: flex;
            flex-wrap: wrap;
            max-height: 500px; /* Establecer la altura máxima y agregar un desplazamiento vertical */
            overflow-y: auto; /* Agregar desplazamiento vertical */
        }

        .card {
            width: 18rem;
            margin: 10px;                                                                                                                                                                                                                                                                                                                                                                                         
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Soluciones integrales jasso</h1>
      
    </div>
 <nav class="navbar bg-body-tertiary fixed">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

  
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="filtros.php">Filtros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="agregar.php">Agregar  +</a>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Buscar ST" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </div>
</nav>


<div>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link <?php echo (!isset($_GET['componente']) || $_GET['componente'] == 'tiendas') ? 'active' : ''; ?>" href="?componente=tiendas">Agregar tiendas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo isset($_GET['componente']) && $_GET['componente'] == 'region' ? 'active' : ''; ?>" href="?componente=region">Agregar Región</a>
        </li>
    </ul>

    <?php
    // Establece un valor predeterminado si 'componente' no está presente en la URL
    $componente = isset($_GET['componente']) ? $_GET['componente'] : 'tiendas';

    // Muestra el contenido dependiendo de la selección
    if ($componente == 'tiendas') {
        echo '<div style="display: flex; justify-content: space-between;">';

        // Lado izquierdo con el formulario para agregar tiendas
        echo '<div class="form-container">';
        echo '<form action="../controllers/TiendaController.php" method="post">';
        echo '<label for="nombre_tienda">Nombre de la Tienda:</label>';
        echo '<input type="text" id="nombre_tienda" name="nombre_tienda" oninput="convertirAMayusculas(this)"  required>';
        echo '<br>';
        echo '<label for="tipo_foraneo">Selecciona Region:</label>';
        echo '<select id="select_categoria" name="select_categoria" required>';
        foreach ($regiones as $region) {
        echo '<option value=' . $region['id'] . '>' . $region['nombre'] . '</option>';
        
        }
        echo '</select>';
        echo '<br>';
        echo '<label for="tipo_foraneo">Selecciona si es foraneo:</label>';
        echo '<select id="tipo_foraneo" name="tipo_foraneo" required>';
        echo '<option value="true">Foraneo</option>';
        echo '<option value="false">No es foraneo</option>';
        echo '</select>';
        echo '<br>';
        echo '<label for="direccion_tienda">Dirección:</label>';
        echo '<textarea id="direccion_tienda" oninput="convertirAMayusculas(this)"  name="direccion_tienda" rows="4" cols="50" required></textarea>';
        echo '<br>';
        echo '<input type="submit" value="Agregar Tienda">';
        echo '</form>';
        echo '</div>';

        echo '<div class="card-container">';
       
        // Muestra la lista de regiones si está presente
        foreach ($tiendas as $tienda) {
          echo '<div class="card" style="width: 18rem; margin: 10px;">';
          echo '<div class="card-body">';
          echo '<img src="../assets/img/descargar.png" alt="Logo tienda" style="width: 100%; height: auto; border-radius: 5px;">';
          echo '<h5 class="card-title">' . $tienda['nombre'] . '</h5>';
          echo '<p class="card-text">Descripción u otra información relevante</p>';
          echo '<button class="btn btn-primary" onclick="abrirModalEditartienda(' . $tienda['id'] . ', \'' . $tienda['nombre'] . '\')">Editar</button>';
          echo '<button class="btn btn-danger" onclick="abrirModalEliminartienda(' . $tienda['id'] . ', \'' . $tienda['nombre'] . '\')">Eliminar</button>';
          echo '</div>';
          echo '</div>';
      }
        echo '</div>';

        echo '</div>';
    } elseif ($componente == 'region') {
        echo '<div style="display: flex; justify-content: space-between;">';

        // Lado izquierdo con el formulario para agregar tiendas
        echo '<div class="form-container">';
        echo '<form id="miFormulario" action="../controllers/RegionController.php" method="post">';
        echo '<label for="nombre_tienda">Region:</label>';
        echo '<input type="text" id="nombre_region" name="nombre_region" oninput="convertirAMayusculas(this)"  required>';
       
        echo '<br>';
        echo '<input type="submit" value="Agregar region" onClick="submitForm()">';
        echo '</form>';
        echo '</div>';
        
        // Lado derecho con el mensaje "Agregar Tiendas"
        echo '<div class="card-container">';
       
        // Muestra la lista de regiones si está presente
        foreach ($regiones as $region) {
          echo '<div class="card" style="width: 18rem; margin: 10px;">';
          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $region['nombre'] . '</h5>';
          echo '<p class="card-text">Descripción u otra información relevante</p>';
          echo '<button class="btn btn-primary" onclick="abrirModalEditar(' . $region['id'] . ', \'' . $region['nombre'] . '\')">Editar</button>';
          echo '<button class="btn btn-danger" onclick="abrirModalEliminar(' . $region['id'] . ', \'' . $region['nombre'] . '\')">Eliminar</button>';
          echo '</div>';
          echo '</div>';
      }
        echo '</div>';
        
        echo '</div>';

        // Agrega aquí el código HTML específico para "Agregar Región"
    }
    ?>

</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- una tabla usa st con menos de 10 dias, otro mayor 10 a 15 dias , otro mas de 15 a 21 dias  -->
<!-- Contenido del dashboard   ZONA, ST, TIENDA,TRABAJO A REALIZAR, FECHA SOLICITUD, PORTAL(PENDIENTE, ACEPTADO, PEDIR PRESALDO, PEDIR CANCELADO,REVISADO), ESTADO(SE SOLICITA CANCELAR ST, TRABAJO REALIZADO-FALTA PPTO, FALTA REALIZAR TRABAJO-FALTA PPTO, FALTA REALIZAR TRABAJO, FALTA PPTO -->


<script>
    function abrirModalEditar(regionId, regionNombre) {
       
        var modalContent = `
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Región</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="modalInput" class="form-control" oninput="convertirAMayusculas(this)"  placeholder="${regionNombre}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="editarRegion(${regionId})">Guardar cambios</button>
            </div>
        `;

        mostrarModal(modalContent);
    }

    function abrirModalEliminar(regionId, regionNombre ) {
        var modalContent = `
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Región</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar esta región?</p>
                <h5 class="card-title">${regionNombre}</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="eliminarRegion(${regionId})">Eliminar</button>
            </div>
        `;

        mostrarModal(modalContent);
    }






    //  Tienda   

    function abrirModalEditartienda(tiendaId, tiendaNombre) {
       
       var modalContent = `
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Editar Región</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
               <input type="text" id="modalInput" class="form-control" oninput="convertirAMayusculas(this)"  placeholder="${tiendaNombre}">
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
               <button type="button" class="btn btn-primary" onclick="editarTienda(${tiendaId})">Guardar cambios</button>
           </div>
       `;

       mostrarModal(modalContent);
   }

   function abrirModalEliminartienda(tiendaId, tiendaNombre) {
       var modalContent = `
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Eliminar Región</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
               <p>¿Estás seguro de que deseas eliminar esta región?</p>
               <h5 class="card-title">${tiendaNombre}</h5>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
               <button type="button" class="btn btn-danger" onclick="eliminarTienda(${tiendaId})">Eliminar</button>
           </div>
       `;

       mostrarModal(modalContent);
   }









    function mostrarModal(content) {
        var modalElement = document.getElementById('exampleModal');
        var modalBody = modalElement.querySelector('.modal-content');
        modalBody.innerHTML = content;

        // Abre el modal
        var modal = new bootstrap.Modal(modalElement);
        modal.show();
    }

    

    function editarRegion(regionId) {
        var nuevoNombre = document.getElementById('modalInput').value;
        
      $.ajax({
    url: '../actions/update_regiones.php', 
    method: 'POST',
    data: { regionId: regionId, region: nuevoNombre }, // Datos que se enviarán al servidor
    success: function (response) {
        // Maneja la respuesta del servidor, muestra mensajes o realiza otras acciones necesarias
        
        alert(response);
        // Cierra el modal después de eliminar
        cerrarModal();
        location.reload();
    },
    error: function () {
        alert('Error al eliminar la región');
    }
});
    }

    function eliminarRegion(regionId) {

   
      $.ajax({
    url: '../actions/delete_regiones.php', // Ruta a tu script PHP
    method: 'POST',
    data: { regionId: regionId }, // Datos que se enviarán al servidor
    success: function (response) {
        // Maneja la respuesta del servidor, muestra mensajes o realiza otras acciones necesarias
        

        // Cierra el modal después de eliminar
        cerrarModal();
        location.reload();
    },
    error: function () {
        alert('Error al eliminar la región');
    }
});
       
    }




    //  tienda


    function editarTienda(tiendaId) {
        var nuevoNombre = document.getElementById('modalInput').value;
        
      $.ajax({
    url: '../actions/update_tiendas.php', 
    method: 'POST',
    data: { tiendaId: tiendaId, nombre: nuevoNombre }, // Datos que se enviarán al servidor
    success: function (response) {
        // Maneja la respuesta del servidor, muestra mensajes o realiza otras acciones necesarias
        
        alert(response);
        // Cierra el modal después de eliminar
        cerrarModal();
        location.reload();
    },
    error: function () {
        alert('Error al eliminar la tienda');
    }
});
    }




    function eliminarTienda(tiendaId) {

   
      $.ajax({
    url: '../actions/delete_tiendas.php', // Ruta a tu script PHP
    method: 'POST',
    data: { tiendaId: tiendaId }, // Datos que se enviarán al servidor
    success: function (response) {
        // Maneja la respuesta del servidor, muestra mensajes o realiza otras acciones necesarias
        

        // Cierra el modal después de eliminar
        cerrarModal();
        location.reload();
    },
    error: function () {
        alert('Error al eliminar la tienda');
    }
});
       
    }






    function cerrarModal() {
        var modalElement = document.getElementById('exampleModal');
        var modal = bootstrap.Modal.getInstance(modalElement);
        modal.hide();
    }
</script>


<script>
        function submitForm() {
            var form = document.getElementById("miFormulario");
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", form.action, true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Actualizar el contenido de alguna manera (por ejemplo, mostrando mensajes)
                    document.getElementById("resultado").innerHTML = xhr.responseText;
                }
            };

            xhr.send(formData);
        }
    </script>
    
    <script>
    function convertirAMayusculas(elemento) {
        elemento.value = elemento.value.toUpperCase();
    }
</script>
 
      
  





<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>





