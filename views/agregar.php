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
$tiendastotal = $tiendaModel->getTiendasTotal();



?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/agregar.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
 


</head>
<body>
<div class="navbar">
      
      <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
     width="160"      
     height="80"     
     fill="#ffffff"   viewBox="0 0 300.000000 300.000000"
   preserveAspectRatio="xMidYMid meet" 
   onclick="window.location.href = 'dashboard.php';"
   >
  
  <g transform="translate(0.000000,300.000000) scale(0.050000,-0.050000)"
  fill="#ffffff" stroke="none">
  <path d="M787 5159 c-416 -74 -647 -329 -647 -710 0 -415 182 -580 793 -718
  425 -96 534 -162 590 -357 15 -53 65 -128 136 -204 61 -66 126 -142 143 -169
  l32 -50 27 80 c38 113 34 378 -8 503 -98 288 -285 408 -830 527 -404 88 -509
  154 -543 340 -78 424 419 620 1028 407 77 -27 149 -57 160 -68 54 -54 72 -19
  72 140 0 157 -1 161 -55 182 -224 85 -686 136 -898 97z"/>
  <path d="M2540 2830 l0 -1330 240 0 240 0 0 1330 0 1330 -240 0 -240 0 0
  -1330z"/>
  <path d="M4194 3788 c-130 -171 -233 -321 -229 -333 7 -22 495 599 495 630 0
  44 -51 -14 -266 -297z"/>
  <path d="M3240 3865 c0 -23 557 -575 568 -563 11 10 -533 578 -554 578 -8 0
  -14 -7 -14 -15z"/>
  <path d="M140 2851 l0 -169 162 -51 c430 -136 866 -144 1173 -21 103 42 103
  28 1 166 -47 63 -87 117 -90 122 -2 4 -52 -14 -110 -40 -234 -105 -725 -47
  -1023 121 -110 61 -113 57 -113 -128z"/>
  <path d="M3474 2067 c-34 -34 -5 -109 104 -277 l118 -180 -180 -6 c-218 -7
  -216 -9 -136 104 65 90 83 177 44 216 -14 14 -64 -47 -161 -197 l-141 -217
  372 -5 c204 -3 375 -2 380 2 11 12 -342 559 -366 567 -11 4 -27 1 -34 -7z"/>
  <path d="M3984 1956 c-48 -48 -26 -117 66 -200 92 -84 109 -129 66 -172 -33
  -33 -76 -30 -120 9 -20 18 -43 27 -51 18 -19 -19 69 -91 113 -91 142 0 161
  145 32 253 -120 100 -108 225 15 149 48 -30 70 -14 35 28 -30 36 -122 40 -156
  6z"/>
  <path d="M4291 1949 c-49 -49 -38 -83 59 -187 128 -137 105 -256 -35 -176 -75
  44 -92 31 -35 -26 55 -55 134 -46 185 23 48 64 28 112 -93 219 -71 64 -78 77
  -54 105 32 39 84 43 118 9 13 -13 30 -16 39 -8 21 22 -54 72 -107 72 -25 0
  -59 -14 -77 -31z"/>
  <path d="M4676 1945 c-148 -91 -129 -321 33 -398 188 -90 390 113 300 303 -58
  122 -217 168 -333 95z m251 -54 c119 -111 33 -331 -130 -331 -91 0 -177 95
  -177 197 0 157 192 241 307 134z"/>
  <path d="M5361 1941 c-36 -67 -23 -101 69 -185 92 -84 109 -129 66 -172 -33
  -33 -76 -30 -120 9 -20 18 -43 27 -51 18 -19 -19 69 -91 113 -91 142 0 159
  140 32 256 -117 106 -107 222 12 147 60 -37 88 -27 48 17 -47 52 -142 53 -169
  1z"/>
  <path d="M1040 1808 c-71 -50 -191 -127 -265 -171 -219 -132 -207 -137 356
  -137 l490 0 130 107 c71 59 203 149 294 200 l165 93 -520 -1 -520 -1 -130 -90z"/>
  <path d="M2320 1666 c-38 -73 -73 -141 -77 -150 -3 -9 30 -16 75 -16 l82 0 0
  150 c0 181 6 180 -80 16z"/>
  </g>
  </svg>
  
          
        
      </div>
    <nav class="navbar bg-body-tertiary fixed">
  <div class="container-fluid">
  <div class="d-flex flex-row">
    <div class="p-2"><button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button></div>
    <div class="d-flex p-2">
    <button class="btn btn-dark  ms-2" onclick="window.location.href='filtros.php'"  type="button">
      <i class="fa-solid fa-magnifying-glass"></i> Filtros, Búsquedas
      </button>
      </div>

      <div class="flex-grow-1 position-relative"> <!-- Ocupa el espacio restante -->
      <form class="d-flex" role="search">
          <input class="form-control me-2" id="search" type="search" placeholder="Buscar ST por folio" aria-label="Search" autocomplete="off">
          <button class="btn btn-outline-success" data-bs-toggle="popover" data-bs-title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">Buscar <i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
  <div id="result" class="position-absolute bg-white   text-black rounded-3" style=" width: calc(100% - 10px); top: 100%; left: 0; z-index: 999;">

    </div>
  </div>

</div>


  
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php"> <i class="fa-solid fa-house"></i>  DASHBOARD</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="pizarron.php"><i class="fa-solid fa-chalkboard"></i>  PIZARRÓN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="filtros.php"><i class="fa-solid fa-list"></i>  FILTROS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="presaldos.php"><i class="fa-solid fa-folder-open"></i>  PRESALDOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="agregar.php"><strong> +</strong>  AGREGAR </a>
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
       echo '<div class="alert alert-danger" style="display: none;" role="alert" id="folio-error"></div>';
        
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
        echo '<input type="submit" id="enviar" value="Agregar Tienda">';
        echo '</form>';
        echo '</div>';

        echo '<div class="card-container">';
       
        // Muestra la lista de regiones si está presente
        foreach ($tiendastotal as $tienda) {
          echo '<div class="card" style="width: 18rem; margin: 10px;">';
          echo '<div class="card-body">';
          echo '<img src="../assets/img/descargar.png" alt="Logo tienda" style="width: 100%; height: auto; border-radius: 5px;">';
          echo '<h5 class="card-title">' . $tienda['nombre'] . '</h5>';
          echo '<p class="card-text">REGION:</p>';
          echo '<p class="card-text">'.$tienda['nombre_region'].'</p>';
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
        echo '<input type="text" id="nombre_region" name="nombre_region" oninput="convertirAMayusculas(this)" required>';
       echo '<div class="alert alert-danger" style="display: none;" role="alert" id="folio-error"></div>';
        echo '<br>';
        echo '<input type="submit" id="enviar" value="Agregar region"  >';
        echo '</form>';
        echo '</div>';
        
        // Lado derecho con el mensaje "Agregar Tiendas"
        echo '<div class="card-container">';
       
        // Muestra la lista de regiones si está presente
        foreach ($regiones as $region) {
          echo '<div class="card text-center" style="width: 18rem; margin: 10px; border-radius: 10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">';
          echo '  <div class="card-body">';
          echo '    <i class="fas fa-map-marker-alt fa-3x mb-3"></i>'; // Icono representativo
          echo '    <h5 class="card-title">' . $region['nombre'] . '</h5>'; // Nombre de la región centrado
          echo '    <div class="d-flex justify-content-center">'; // Botones centrados
          echo '      <button class="btn btn-primary mx-2" onclick="abrirModalEditar(' . $region['id'] . ', \'' . $region['nombre'] . '\')">Editar</button>';
          echo '      <button class="btn btn-danger mx-2" onclick="abrirModalEliminar(' . $region['id'] . ', \'' . $region['nombre'] . '\')">Eliminar</button>';
          echo '    </div>';
          echo '  </div>';
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


<script src="../assets/js/agregar.js">
    
</script>


<script>

document.getElementById('nombre_tienda').addEventListener('input', function() {
      var tienda = this.value.trim();
      
        $.ajax({
          url: '../actions/check_tienda.php',
          type: 'GET',
          data: { tienda: tienda },
          success: function(response) {
            console.log(response)
            if (response == 'mr tienda') {
              document.getElementById('folio-error').style.display = 'none'; // Ocultar el mensaje de error
              document.getElementById('enviar').disabled = false;
            } else {
              document.getElementById('folio-error').innerHTML = 'Esta tienda ya existe';
              document.getElementById('folio-error').style.display = 'block'; // Mostrar el mensaje de error
              document.getElementById('enviar').disabled = true;
            }
          }
        });
      
    });





   


</script>

<script>
   document.getElementById('nombre_region').addEventListener('input', function() {
    var region = this.value.trim();
    console.log(region);
    $.ajax({
        url: '../actions/check_region.php',
        type: 'GET',
        data: { region: region },
        success: function(response) {
            console.log('REGION:', response);
            if (response == 'mr region') {
                document.getElementById('folio-error').style.display = 'none'; // Ocultar el mensaje de error
                document.getElementById('enviar').disabled = false;
            } else {
                document.getElementById('folio-error').innerHTML = 'Esta región ya existe';
                document.getElementById('folio-error').style.display = 'block'; // Mostrar el mensaje de error
                document.getElementById('enviar').disabled = true;
            }
        }
    });
});
</script>



<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


<script>
$(document).ready(function(){
    $('#search').focus()

    $('#search').on('keyup', function(){
        var search = $(this).val();
        $.ajax({
            type: 'POST',
            url: '../actions/search.php',
            data: {'search': search},
            beforeSend: function(){
                $('#result').html('<img src="img/pacman.gif">');
            }
        })
        .done(function(resultado){
            $('#result').html(resultado);
        })
        .fail(function(){
            alert('Hubo un error');
        });
    });

    var blurTimeout;
    $('#search').on('blur', function(){
        blurTimeout = setTimeout(function() {
            $('#result').empty(); // Vaciamos el contenido de los resultados
        }, 200); // Retrasamos la ejecución del evento blur durante 200 milisegundos
    });

    // Cancelar la ejecución del evento blur si se hace clic en un enlace dentro de los resultados
    $('#result').on('click', 'a', function() {
        clearTimeout(blurTimeout);
    });
});





  document.getElementById('st').addEventListener('blur', function() {
    var folio = this.value.trim();
    if (folio !== '0000') {
      $.ajax({
        url: '../actions/check_folio.php',
        type: 'GET',
        data: { folio: folio },
        success: function(response) {
          console.log(response)
          if (response == 'mr hoo') {
            document.getElementById('folio-error').style.display = 'none'; // Ocultar el mensaje de error
            document.getElementById('enviar').disabled = false;
          } else {
            document.getElementById('folio-error').innerHTML = 'El folio ya existe';
            document.getElementById('folio-error').style.display = 'block'; // Mostrar el mensaje de error
            document.getElementById('enviar').disabled = true;
          }
        }
      });
    } else {
      // Si el folio es '0000', limpiar el mensaje de error y habilitar el botón de enviar
      document.getElementById('folio-error').innerHTML = '';
      document.getElementById('folio-error').style.display = 'none'; // Ocultar el mensaje de error
      document.getElementById('enviar').disabled = false;
    }
  });




  function permitirSoloNumeros(elemento) {
elemento.value = elemento.value.replace(/[^0-9]/g, '');
}

</script>




<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>





