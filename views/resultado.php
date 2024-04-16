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
    <title>Busqueda</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/filtros.css">
    <link rel="stylesheet" href="../assets/css/resultado.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>


</head>
<body>
<div class="navbar">
      
      <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
     width="160"      
     height="80"     
     fill="#ffffff"   viewBox="0 0 300.000000 300.000000"
   preserveAspectRatio="xMidYMid meet" 
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
  <div class="d-flex flex-row align-items-center justify-content-between"> <!-- Contenedor de botones y formulario -->
    <div>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="d-flex p-2">
      <button class="btn btn-dark  ms-2" onclick="window.location.href='agregar.php?componente=tiendas'" type="button">
        <i class="fa-solid fa-store"></i> Tiendas
      </button>

      <button class="btn btn-dark  ms-2" onclick="window.location.href='agregar.php?componente=region'" type="button">
        <i class="fa-solid fa-compass"></i> Regiones
      </button>
      <button class="btn btn-dark  ms-2" onclick="window.location.href='filtros.php'"  type="button">
      <i class="fa-solid fa-magnifying-glass"></i> Filtros, Búsquedas
      </button>

      <button class="btn btn-dark  ms-2" type="button" data-bs-toggle="modal" data-bs-target="#myModal">
        <i class="fa-solid fa-plus"></i> Agregar ST
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
            <a class="nav-link active" href="filtros.php"><i class="fa-solid fa-list"></i>  FILTROS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="presaldos.php"><i class="fa-solid fa-folder-open"></i>  PRESALDOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="agregar.php"><strong> +</strong>  AGREGAR </a>
          </li>
        </ul>
        <form class="d-flex" role="search">
        <input class="form-control me-2" id="search" type="search" placeholder="Buscar ST por folio" aria-label="Search" autocomplete="off">
        <button class="btn btn-outline-success" data-bs-toggle="popover" data-bs-title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">Buscar <i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
<div id="result" class="position-absolute bg-white   text-black rounded-3" style=" width: calc(100% - 10px); top: 100%; left: 0; z-index: 999;">

      </div>
    </div>
  </div>
</nav>


<div id="spaceresultados" class="container fluid resultado-container" style="background: #7D7C7C;">








</div>
















<!-- MODAL PARA AGREGAR ST -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg ">
  <div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title  text-center">Agrega ST</h4>
  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<!-- Modal body -->
<div class="modal-body">
<form  action="../controllers/St_resultadoController.php" method="post"  >
        
      
      
      
      
        <div style="display: flex; width: 100%;">

        <div style="width: 60%; padding: 2%;">
  <!-- Contenido del segundo div -->

   

  <label for="trabajo"> <strong>TRABAJO A REALIZAR:</strong></label>
      <textarea class="chamito" id="trabajo" name="trabajo" rows="4" required></textarea>

    
      <label class="chamito" for="fecha"> <strong>ESTADO:</strong></label>
      <select name="estado" id="estado">
        <option value="STANDBY">--</option>
        <option value="PENDIENTE">PENDIENTE</option>
        <option value="REVISADO">REVISADO</option>
        <option value="PRESUPUESTADO">PRESUPUESTADO</option>
        <option value="ACEPTADO">ACEPTADO</option>
        <option value="CANCELADO">CANCELADO</option>
      </select>
        
<br>

<div class="container mx-auto">

<img src="../assets/img/coppel.svg"  style="width: 60%; " alt="Descripción de la imagen SVG">
</div>

</div>



<div style="width: 40%; padding: 3%">
  <!-- Contenido del primer div -->

  <label for="st"><strong> FOLIO:</strong></label>
      <input class="chamito" type="text" id="st" name="st" required>
<br>
      <label for="tienda"><strong>TIENDA:</strong></label>
      <select class="chamito" name="tienda_choose" id="tienda_choose">
      <option value="null">--</option>
      <?php 
foreach ($tiendas as $tienda) {
  echo '<option value="' . $tienda['id'] . '">' . $tienda['nombre'] . '</option>';
}
?>

</select>
<br>
<label for="fecha"><strong>FECHA SOLICITUD:</strong></label>
      <input class="chamito" type="date" id="fecha" name="fecha" required>
      <br>


      

      <div style="display: flex; flex-direction: row; padding:3%;">
     <div style="flex: 1; padding:2%; margin:5%;" >
     <label for="st"> <strong>ST ACEPTADO:</strong></label> 
    
     <label class="switch">
     <input type="checkbox" name="st_aceptado">
     <span class="slider"></span>
     </label>
   
    </div>
   
    <div  style="flex: 2; padding:2%; margin:5%;">
      <label for="st"><strong>TRABAJO REALIZADO:</strong></label> 
      <br>
      <label class="switch">
    <input type="checkbox" name="trabajo_realizado">
    <span class="slider"></span>
    </label>
    </div>
    </div>


    </div>
    
</div>


 

<div class="d-grid gap-2 col-6 mx-auto" style="display: flex; width: 100%; justify-content: center;" class="text-center">
  <button id="enviar" class="btn btn-success btn-lg" type="submit">Agregar</button>
</div>

    
    
      
  </form>
</div>

<!-- Modal footer -->

</div>
  </div>
</div>

<!-- FIN MODAL PARA AGREGAR ST -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl ">
    <div class="modal-content ">
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



<!-- Modal -->
<div class="modal fade" id="exampleModali" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
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







<!--Modalx-->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog  modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Show a second modal and hide this one with the button below.
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-body">
      <embed  type="application/pdf" width="100%" height="700px" />

      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Volver</button>
      </div>
    </div>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>




<script>  

$(document).ready(function() {
  const urlParams = new URLSearchParams(window.location.search);
  const folio = urlParams.get('foliobusqueda');

  if (folio == '0000') {
    console.log("yep", folio)

    $.ajax({
      url: '../actions/get_st_ceros.php',
      method: 'GET',
      data: { folio: folio },
      success: function(response) {
        var responseObject = JSON.parse(response);
        console.log('response', response)

        var cardsHTML = ''; // Creamos una variable para almacenar el HTML de todos los cards

        responseObject.forEach(function(item) {
          console.log('item:',item)
          cardsHTML += '<div class="card">'+
            '<div class="card__img">'+
            '<svg xmlns="http://www.w3.org/2000/svg" width="100%"><rect fill="#ffffff" width="540" height="450"></rect><defs><linearGradient id="a" gradientUnits="userSpaceOnUse" x1="0" x2="0" y1="0" y2="100%" gradientTransform="rotate(222,648,379)"><stop offset="0" stop-color="#ffffff"></stop><stop offset="1" stop-color="#0000FF"></stop></linearGradient><pattern patternUnits="userSpaceOnUse" id="b" width="300" height="250" x="0" y="0" viewBox="0 0 1080 900"><g fill-opacity="0.5"><polygon fill="#0000FF" points="90 150 0 300 180 300"></polygon> <!-- Cambio de color a azul --><polygon points="90 150 180 0 0 0"></polygon><polygon fill="#AAA" points="270 150 360 0 180 0"></polygon><polygon fill="#DDD" points="450 150 360 300 540 300"></polygon><polygon fill="#999" points="450 150 540 0 360 0"></polygon><polygon points="630 150 540 300 720 300"></polygon><polygon fill="#DDD" points="630 150 720 0 540 0"></polygon><polygon fill="#0000FF" points="810 150 720 300 900 300"></polygon> <!-- Cambio de color a azul --><polygon fill="#FFF" points="810 150 900 0 720 0"></polygon><polygon fill="#DDD" points="990 150 900 300 1080 300"></polygon><polygon fill="#0000FF" points="990 150 1080 0 900 0"></polygon> <!-- Cambio de color a azul --><polygon fill="#DDD" points="90 450 0 600 180 600"></polygon><polygon points="90 450 180 300 0 300"></polygon><polygon fill="#666" points="270 450 180 600 360 600"></polygon><polygon fill="#AAA" points="270 450 360 300 180 300"></polygon><polygon fill="#DDD" points="450 450 360 600 540 600"></polygon><polygon fill="#999" points="450 450 540 300 360 300"></polygon><polygon fill="#999" points="630 450 540 600 720 600"></polygon><polygon fill="#FFF" points="630 450 720 300 540 300"></polygon><polygon points="810 450 720 600 900 600"></polygon><polygon fill="#DDD" points="810 450 900 300 720 300"></polygon><polygon fill="#AAA" points="990 450 900 600 1080 600"></polygon><polygon fill="#0000FF" points="990 450 1080 300 900 300"></polygon> <!-- Cambio de color a azul --><polygon fill="#222" points="90 750 0 900 180 900"></polygon><polygon points="270 750 180 900 360 900"></polygon><polygon fill="#DDD" points="270 750 360 600 180 600"></polygon><polygon points="450 750 540 600 360 600"></polygon><polygon points="630 750 540 900 720 900"></polygon><polygon fill="#0000FF" points="630 750 720 600 540 600"></polygon> <!-- Cambio de color a azul --><polygon fill="#AAA" points="810 750 720 900 900 900"></polygon><polygon fill="#666" points="810 750 900 600 720 600"></polygon><polygon fill="#999" points="990 750 900 900 1080 900"></polygon><polygon fill="#999" points="180 0 90 150 270 150"></polygon><polygon fill="#444" points="360 0 270 150 450 150"></polygon><polygon fill="#FFF" points="540 0 450 150 630 150"></polygon><polygon points="900 0 810 150 990 150"></polygon><polygon fill="#222" points="0 300 -90 450 90 450"></polygon><polygon fill="#FFF" points="0 300 90 150 -90 150"></polygon><polygon fill="#FFF" points="180 300 90 450 270 450"></polygon><polygon fill="#666" points="180 300 270 150 90 150"></polygon><polygon fill="#222" points="360 300 270 450 450 450"></polygon><polygon fill="#FFF" points="360 300 450 150 270 150"></polygon><polygon fill="#0000FF" points="540 300 450 450 630 450"></polygon> <!-- Cambio de color a azul --><polygon fill="#222" points="540 300 630 150 450 150"></polygon><polygon fill="#AAA" points="720 300 630 450 810 450"></polygon><polygon fill="#666" points="720 300 810 150 630 150"></polygon><polygon fill="#FFF" points="900 300 810 450 990 450"></polygon><polygon fill="#999" points="900 300 990 150 810 150"></polygon><polygon points="0 600 -90 750 90 750"></polygon><polygon fill="#666" points="0 600 90 450 -90 450"></polygon><polygon fill="#AAA" points="180 600 90 750 270 750"></polygon><polygon fill="#444" points="180 600 270 450 90 450"></polygon><polygon fill="#444" points="360 600 270 750 450 750"></polygon><polygon fill="#999" points="360 600 450 450 270 450"></polygon><polygon fill="#666" points="540 600 630 450 450 450"></polygon><polygon fill ="#0000FF" points="540 600 630 450 450 450"></polygon> <!-- Cambio de color a azul --><polygon fill="#222" points="720 600 630 750 810 750"></polygon><polygon fill="#FFF" points="900 600 810 750 990 750"></polygon><polygon fill="#222" points="900 600 990 450 810 450"></polygon><polygon fill="#DDD" points="0 900 90 750 -90 750"></polygon><polygon fill="#444" points="180 900 270 750 90 750"></polygon><polygon fill="#FFF" points="360 900 450 750 270 750"></polygon><polygon fill="#AAA" points="540 900 630 750 450 750"></polygon><polygon fill="#FFF" points="720 900 810 750 630 750"></polygon><polygon fill="#222" points="900 900 990 750 810 750"></polygon><polygon fill="#222" points="1080 300 990 450 1170 450"></polygon><polygon fill="#FFF" points="1080 300 1170 150 990 150"></polygon><polygon points="1080 600 990 750 1170 750"></polygon><polygon fill="#666" points="1080 600 1170 450 990 450"></polygon><polygon fill="#DDD" points="1080 900 1170 750 990 750"></polygon></g></pattern></defs><rect x="0" y="0" fill="url(#a)" width="100%" height="100%"></rect><rect x="0" y="0" fill="url(#b)" width="100%" height="100%"></rect></svg>'+
            '</div>'+
            '<div class="card__title">Folio: <strong>'+item.folio +'</strong></div>'+
            '<div class="card__title"><strong>'+item.estado_portal +'</strong></div>'+

            '<div class="card__subtitle"> <i class="fa-solid fa-store"></i> <strong>'+item.nombre +'</strong></div>'+
            '<div class="card__subtitle"> <i class="fa-solid fa-compass"></i>  <strong>'+item.nombre_region +'</strong></div>'+ 
            '<div class="card__title"> <i class="fa-solid fa-calendar-days"></i> <strong>'+item.fecha +'</strong></div>'+
            '<div class="card__wrapper">'+
            '<button class="card__btn card__btn-solid" onClick="abrirModal(' + item.id + ', \'' + item.folio + '\', \'' + item.nombre + '\', \'' + item.trabajo + '\', \'' + item.fecha + '\', ' + item.id_tienda + ', ' + item.autorizado + ', ' + item.trabajo_realizado + ', \'' + item.estado_portal + '\', \'' + item.pdf_generador + '\', \'' + item.pdf_plano + '\', \'' + item.pdf_ppto + '\', \'' + item.xml + '\', \'' + item.pdf_factura + '\')"  >Ir a ST</button>'+
            '</div>'+
            '</div>';
        });

        // Insertamos los cards en el contenedor
        $('#spaceresultados').html(cardsHTML);

      },
      error: function() {
        alert('Error al extraer folio 0000');
      }
    });

  } else {
    console.log("no es diferente")

    $.ajax({
      url: '../actions/get_st_folio.php',
      method: 'GET',
      data: { folio: folio },
      success: function(response) {
        var responseObject = JSON.parse(response);

        var cardsHTML = ''; // Creamos una variable para almacenar el HTML de todos los cards

        responseObject.forEach(function(item) {
          cardsHTML += '<div class="card">'+
            '<div class="card__img">'+
            '<svg xmlns="http://www.w3.org/2000/svg" width="100%"><rect fill="#ffffff" width="540" height="450"></rect><defs><linearGradient id="a" gradientUnits="userSpaceOnUse" x1="0" x2="0" y1="0" y2="100%" gradientTransform="rotate(222,648,379)"><stop offset="0" stop-color="#ffffff"></stop><stop offset="1" stop-color="#0000FF"></stop></linearGradient><pattern patternUnits="userSpaceOnUse" id="b" width="300" height="250" x="0" y="0" viewBox="0 0 1080 900"><g fill-opacity="0.5"><polygon fill="#0000FF" points="90 150 0 300 180 300"></polygon> <!-- Cambio de color a azul --><polygon points="90 150 180 0 0 0"></polygon><polygon fill="#AAA" points="270 150 360 0 180 0"></polygon><polygon fill="#DDD" points="450 150 360 300 540 300"></polygon><polygon fill="#999" points="450 150 540 0 360 0"></polygon><polygon points="630 150 540 300 720 300"></polygon><polygon fill="#DDD" points="630 150 720 0 540 0"></polygon><polygon fill="#0000FF" points="810 150 720 300 900 300"></polygon> <!-- Cambio de color a azul --><polygon fill="#FFF" points="810 150 900 0 720 0"></polygon><polygon fill="#DDD" points="990 150 900 300 1080 300"></polygon><polygon fill="#0000FF" points="990 150 1080 0 900 0"></polygon> <!-- Cambio de color a azul --><polygon fill="#DDD" points="90 450 0 600 180 600"></polygon><polygon points="90 450 180 300 0 300"></polygon><polygon fill="#666" points="270 450 180 600 360 600"></polygon><polygon fill="#AAA" points="270 450 360 300 180 300"></polygon><polygon fill="#DDD" points="450 450 360 600 540 600"></polygon><polygon fill="#999" points="450 450 540 300 360 300"></polygon><polygon fill="#999" points="630 450 540 600 720 600"></polygon><polygon fill="#FFF" points="630 450 720 300 540 300"></polygon><polygon points="810 450 720 600 900 600"></polygon><polygon fill="#DDD" points="810 450 900 300 720 300"></polygon><polygon fill="#AAA" points="990 450 900 600 1080 600"></polygon><polygon fill="#0000FF" points="990 450 1080 300 900 300"></polygon> <!-- Cambio de color a azul --><polygon fill="#222" points="90 750 0 900 180 900"></polygon><polygon points="270 750 180 900 360 900"></polygon><polygon fill="#DDD" points="270 750 360 600 180 600"></polygon><polygon points="450 750 540 600 360 600"></polygon><polygon points="630 750 540 900 720 900"></polygon><polygon fill="#0000FF" points="630 750 720 600 540 600"></polygon> <!-- Cambio de color a azul --><polygon fill="#AAA" points="810 750 720 900 900 900"></polygon><polygon fill="#666" points="810 750 900 600 720 600"></polygon><polygon fill="#999" points="990 750 900 900 1080 900"></polygon><polygon fill="#999" points="180 0 90 150 270 150"></polygon><polygon fill="#444" points="360 0 270 150 450 150"></polygon><polygon fill="#FFF" points="540 0 450 150 630 150"></polygon><polygon points="900 0 810 150 990 150"></polygon><polygon fill="#222" points="0 300 -90 450 90 450"></polygon><polygon fill="#FFF" points="0 300 90 150 -90 150"></polygon><polygon fill="#FFF" points="180 300 90 450 270 450"></polygon><polygon fill="#666" points="180 300 270 150 90 150"></polygon><polygon fill="#222" points="360 300 270 450 450 450"></polygon><polygon fill="#FFF" points="360 300 450 150 270 150"></polygon><polygon fill="#0000FF" points="540 300 450 450 630 450"></polygon> <!-- Cambio de color a azul --><polygon fill="#222" points="540 300 630 150 450 150"></polygon><polygon fill="#AAA" points="720 300 630 450 810 450"></polygon><polygon fill="#666" points="720 300 810 150 630 150"></polygon><polygon fill="#FFF" points="900 300 810 450 990 450"></polygon><polygon fill="#999" points="900 300 990 150 810 150"></polygon><polygon points="0 600 -90 750 90 750"></polygon><polygon fill="#666" points="0 600 90 450 -90 450"></polygon><polygon fill="#AAA" points="180 600 90 750 270 750"></polygon><polygon fill="#444" points="180 600 270 450 90 450"></polygon><polygon fill="#444" points="360 600 270 750 450 750"></polygon><polygon fill="#999" points="360 600 450 450 270 450"></polygon><polygon fill="#666" points="540 600 630 450 450 450"></polygon><polygon fill ="#0000FF" points="540 600 630 450 450 450"></polygon> <!-- Cambio de color a azul --><polygon fill="#222" points="720 600 630 750 810 750"></polygon><polygon fill="#FFF" points="900 600 810 750 990 750"></polygon><polygon fill="#222" points="900 600 990 450 810 450"></polygon><polygon fill="#DDD" points="0 900 90 750 -90 750"></polygon><polygon fill="#444" points="180 900 270 750 90 750"></polygon><polygon fill="#FFF" points="360 900 450 750 270 750"></polygon><polygon fill="#AAA" points="540 900 630 750 450 750"></polygon><polygon fill="#FFF" points="720 900 810 750 630 750"></polygon><polygon fill="#222" points="900 900 990 750 810 750"></polygon><polygon fill="#222" points="1080 300 990 450 1170 450"></polygon><polygon fill="#FFF" points="1080 300 1170 150 990 150"></polygon><polygon points="1080 600 990 750 1170 750"></polygon><polygon fill="#666" points="1080 600 1170 450 990 450"></polygon><polygon fill="#DDD" points="1080 900 1170 750 990 750"></polygon></g></pattern></defs><rect x="0" y="0" fill="url(#a)" width="100%" height="100%"></rect><rect x="0" y="0" fill="url(#b)" width="100%" height="100%"></rect></svg>'+
            '</div>'+
            '<div class="card__title">Folio: <strong>'+item.folio +'</strong></div>'+
            '<div class="card__title"><strong>'+item.estado_portal +'</strong></div>'+

            '<div class="card__subtitle"> <i class="fa-solid fa-store"></i> <strong>'+item.nombre +'</strong></div>'+
            '<div class="card__subtitle"> <i class="fa-solid fa-compass"></i>  <strong>'+item.nombre_region +'</strong></div>'+ 
            '<div class="card__title"> <i class="fa-solid fa-calendar-days"></i> <strong>'+item.fecha +'</strong></div>'+
            '<div class="card__wrapper">'+
            '<button class="card__btn card__btn-solid" onClick="abrirModal(' + item.id + ', \'' + item.folio + '\', \'' + item.nombre + '\', \'' + item.trabajo + '\', \'' + item.fecha + '\', ' + item.id_tienda + ', ' + item.autorizado + ', ' + item.trabajo_realizado + ', \'' + item.estado_portal + '\', \'' + item.pdf_generador + '\', \'' + item.pdf_plano + '\', \'' + item.pdf_ppto + '\', \'' + item.xml + '\', \'' + item.pdf_factura + '\')">Ir a ST</button>'+
            '</div>'+
            '</div>';
        });

        // Insertamos los cards en el contenedor
        $('#spaceresultados').html(cardsHTML);

      },
      error: function() {
        alert('Error al extraer folio ####');
      }
    }); 

    
  }
});


</script>





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



$(document).ready(function() {
    // Manejar clic en los enlaces de navegación
   
    const urlParams = new URLSearchParams(window.location.search);
    const idTienda = urlParams.get('idTienda');
   
   


if(!idTienda){
 
}else{
  let componente='activos';
   cargarContenedor(idTienda, componente)
}

  
})



   
</script>





<script src="../assets/js/agregar.js">
    
</script>









<script>
  function renderizarMiniaturaPDF(pdfURL, canvasID) {
    var pdfjsLib = window['pdfjs-dist/build/pdf'];

    var canvas = document.getElementById(canvasID);
    var context = canvas.getContext('2d');

    pdfjsLib.getDocument(pdfURL).promise.then(function(pdf) {
      return pdf.getPage(1);
    }).then(function(page) {
      var viewport = page.getViewport({ scale: 0.5 }); // Escala de la miniatura
      canvas.height = viewport.height;
      canvas.width = viewport.width;

      page.render({
        canvasContext: context,
        viewport: viewport
      });
    });
  }
</script>

<!-- <script src="../assets/js/filtros.js"></script> -->

 
<script>
const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})





const estados = [
    { value: 'STANDBY', label: '--' },
    { value: 'PENDIENTE', label: 'PENDIENTE' },
    { value: 'REVISADO', label: 'REVISADO' },
    { value: 'PRESUPUESTADO', label: 'PRESUPUESTADO' },
    { value: 'ACEPTADO', label: 'ACEPTADO' },
    { value: 'CANCELADO', label: 'CANCELADO' }
  ];
  
  

 //EDICION DE ST GENERAL 
 function abrirModal(stId, stFolio, stTienda, stTrabajo, stFecha, stTienda_id, stAutorizado, stTrabajoRealizado, stEstado, generador, plano, ppto,xml, factura ) {
  var randomParam = Math.random(); 
console.log(stId, stFolio, stTienda, stTrabajo, stFecha, stTienda_id, stAutorizado, stTrabajoRealizado, stEstado, generador, plano, ppto,xml, factura)
  var modalContent = `    
  <div class="modal-header">
    <h2 class="modal-title" id="exampleModalLabel"> <span class="badge bg-dark">Editar ST de la tienda <span class="badge text-bg-secondary"> ${stTienda}</span></span></h2>
    <h2 class="modal-title"  id="exampleModalLabel"><span class="badge bg-dark">  Fecha  <span class="badge bg-secondary">   ${stFecha} </span> </span></h2>
    <h2 class="modal-title"  id="exampleModalLabel"><span class="badge bg-dark">  Folio:  <span class="badge bg-${stAutorizado ? 'success' : 'secondary'}">   ${stFolio==='0000'?'Sin folio':stFolio} </span> </span></h2>
    <h2 class="modal-title"  id="exampleModalLabel"><span class="badge bg-dark">  <span class="badge bg-secondary">   ${stEstado==='STANDBY'?'Sin estado':stEstado} </span> </span></h2>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
   




    <div id="modalform" style="background-color:#CFD2CF;">
    
    <div>
    





<div style="display: flex; width: 100%;">

<div style="width: 60%; padding: 2%;">



<label for="trabajo"> <strong>TRABAJO A REALIZAR:</strong></label>
       
    
        <textarea class="chamito" id="trabajoedit" rows="4" name="trabajo" required>${stTrabajo}</textarea>
<br>
<div style=" width: 100%; ">
    <label for="tienda"> <strong>TRABAJO REALIZADO: </strong></label>
    <br>
    
    <label class="switch">
        <input type="checkbox" name="trabajo_realizado" id="trabajoautorizadoedit" ${stTrabajoRealizado === 1 ? 'checked' : ''}>
        <span class="slider"></span>
    </label>
  

    </div>

    

            <div>
        
            <div class="d-flex justify-content-between">
    ${generador!='null' ? `
    <div class="file-upload-container text-center">
        <p>PDF generador:</p>
        <embed src="${generador}?random=${randomParam}" type="application/pdf" width="50%" height="50px" />
        <div class="text-center">
            <button type="button" class="btn btn-danger btn-sm d-block mb-2" onClick="eliminarArchivo('${stId}', 'pdf_generador')">Eliminar</button>
            <button type="button" class="btn btn-primary btn-sm d-block" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" onClick="vistaprevia('${generador}')">
                <i class="fa-solid fa-eye"></i> Vista previa
    </button>
        </div>
    </div>` : ` 
    
    <div class="file-upload-container text-center style="width: 50%; height: 30px;"">
        <div class="d-block" style="opacity: 0.8; margin:5%;">
            <i class="fa-solid fa-arrow-up-from-bracket" style="font-size: 30px; margin-bottom:10%;"></i><br>
            <label for="pdfGenerador">Subir archivo PDF generador:</label><br>
        </div>
        <input type="file" id="pdfGenerador" name="pdfGenerador" accept=".pdf">
    </div>`
    }
    ${plano !='null' ? `
    <div class="file-upload-container text-center">
        <p>PDF plano:</p>
        <embed src="${plano}?random=${randomParam}" type="application/pdf" width="50%" height="50px" />
        <div class="text-center">
        <button type="button" class="btn btn-danger btn-sm d-block mb-2" onClick="eliminarArchivo('${stId}',  'pdf_plano')" >Eliminar</button>
        <button type="button" class="btn btn-primary btn-sm d-block" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" onClick="vistaprevia('${plano}')"  ><i class="fa-solid fa-eye"></i> Vista previa</button>
        </div>
        </div>` : `
    <div class="file-upload-container text-center" style="width: 50%; height: 30px;">
        <div class="d-block" style="opacity: 0.8; margin:5%;">
            <i class="fa-solid fa-arrow-up-from-bracket" style="font-size: 30px; margin-bottom:10%;"></i><br>
            <label for="pdfPlano">Subir archivo PDF plano:</label><br>
        </div>
        <input type="file" id="pdfPlano" name="pdfPlano" accept=".pdf" style="width: 100%;">
    </div>`
    }
    ${ppto !='null' ? `
    <div class="file-upload-container text-center">
        <p>PDF ppto:</p>
        <embed src="${ppto}?random=${randomParam}" type="application/pdf" width="50%" height="50px" />
        <div class="text-center">
      
        <button type="button" class="btn btn-danger btn-sm d-block mb-2" onClick="eliminarArchivo('${stId}', 'pdf_ppto')" >Eliminar</button>
        <button type="button" class="btn btn-primary  btn-sm d-block" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" onClick="vistaprevia('${ppto}')"  > <i class="fa-solid fa-eye"></i>  Vista previa</button>
        </div>
   
        </div>` : `
    <div class="file-upload-container text-center" style="width: 50%; height: 30px;">
        <div class="d-block" style="opacity: 0.8; margin:5%;">
            <i class="fa-solid fa-arrow-up-from-bracket" style="font-size: 30px; margin-bottom:10%;"></i><br>
            <label for="pdfPpto">Subir archivo PDF ppto:</label><br>
        </div>
        <input type="file" id="pdfPpto" name="pdfPpto" accept=".pdf"  style="width: 100%;">
    </div>
   
    `
    }
    ${
        xml!='null'? `
        <div class="file-upload-container text-center">
            <p>XML:</p>
            <a href="${xml}?random=${randomParam}" download="${stFolio}.xml">Descargar XML con folio: ${stFolio} </a>
            <br><br>
            <button type="button" class="btn btn-danger btn-sm d-block mb-2" onClick="eliminarArchivo('${stId}', 'xml')" >Eliminar</button>
        </div>
        `  : `
        
        <div class="file-upload-container text-center"  style="width: 50%; height: 100px;">
            <div class="d-block" style="opacity: 0.8; margin:5%;">
                <i class="fa-solid fa-arrow-up-from-bracket" style="font-size: 30px;"></i><br>
                <label for="xmlFile">Subir archivo XML:</label><br>
            </div>
            <input type="file" id="xmlFile" name="xmlFile" accept=".xml"  style="width: 100%;">
        </div>
        `  
    }

    ${
        factura!='null'? `
        <div class="file-upload-container text-center">
            <p>PDF factura:</p>
            <embed src="${factura}?random=${randomParam}" type="application/pdf" width="50%"  height="50px" />
        <div class="text-center">
            
            <button type="button" class="btn btn-danger btn-sm d-block mb-2" onClick="eliminarArchivo('${stId}', 'pdf_factura')" >Eliminar</button>
            <button type="button" class="btn btn-primary btn-sm d-block" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"  onClick="vistaprevia('${factura}')" > <i class="fa-solid fa-eye"></i>  Vista previa</button>
            </div>
            </div>
        `  : `
        <div class="file-upload-container text-center" style="width: 50%; height: 100px;">
            <div class="d-block" style="opacity: 0.8; margin:5%;">
                <i class="fa-solid fa-arrow-up-from-bracket" style="font-size: 30px;"></i><br>
                <label for="pdfFile">Subir archivo PDF factura:</label><br>
            </div>
            <input type="file" id="pdfFile" name="pdfFile" accept=".pdf" style="width: 100%;">
       
        </div>
        `  
    }
</div>

        </div>


</div>

<div style="width: 40%; padding: 3%">






<div style="max-width: 300px;">
            <label for="tienda"> <strong>EDITAR FOLIO </strong></label>
            <br>
            <input type="text" id="folioedit"  class="form-control" oninput="permitirSoloNumeros(this)" value="${stFolio}">
        </div>
        <div style="margin-right: 20px;">
    <label for="tienda"> <strong>FOLIO AUTORIZADO: </strong></label>
    <br>
    <label class="switch">
        <input type="checkbox" name="folio_autorizado" id="folioautorizadoedit" ${stAutorizado === 1 ? 'checked' : null}>
        <span class="slider"></span>
    </label>
</div>




<label for="fecha"> <strong>EDITAR FECHA </strong></label>
                    <br>
                    <input type="date" id="fechaedit" value="${stFecha}" name="fecha" required>

                    <br>
      <div style=" margin-bottom: 20px;">
      <label for="fecha"> <strong>ESTADO PORTAL: </strong></label>
            <select name="estado" id="estadoedit">
                ${estados.map(element => `<option value="${element.value}" ${element.value==stEstado?'selected':null}>${element.label}</option>`).join('')}
            </select>
           
<br>
<br>

<div class="text-center" style="margin-right: 100px; width: 100%; ">

    <img src="../assets/img/coppel.svg"  style="width: 60%; " alt="Descripción de la imagen SVG">
    </div>
    <div >
                      <p>
                          <button class="btn btn-danger" type="button" onClick="eliminarSt(${stId})">ELIMINAR ST</button>
                      </p>
                  </div>
</div>


</div>


</div>


</div>
  
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-primary" onclick="editarSt('${stId}', '${stTienda_id}')">Guardar cambios</button>
</div>
`;

console.log('activos:',stId, stFolio, stTienda, stTrabajo, stFecha, stTienda_id, stAutorizado, stTrabajoRealizado, stEstado)

  mostrarModalx(modalContent);
}











function eliminarSt(stId) {


$.ajax({
url: '../actions/delete_st.php', // Ruta a tu script PHP
method: 'POST',
data: { stId: stId }, // Datos que se enviarán al servidor
success: function (response) {
// Maneja la respuesta del servidor, muestra mensajes o realiza otras acciones necesarias


// Cierra el modal después de eliminar
cerrarModalx();
location.reload();


},
error: function () {
alert('Error al eliminar la tienda');
}
});

}








//MODALES



function mostrarModal(content) {
var modalElement = document.getElementById('exampleModal');
var modalBody = modalElement.querySelector('.modal-content');
modalBody.innerHTML = content;

// Abre el modal
var modal = new bootstrap.Modal(modalElement);
modal.show();
}



function cerrarModal() {
   var modalElement = document.getElementById('exampleModal');
   var modal = bootstrap.Modal.getInstance(modalElement);
   modal.hide();
}






function mostrarModalx(content, src) {
var modalElement = document.getElementById('exampleModalToggle');
var modalBody = modalElement.querySelector('.modal-content');
modalBody.innerHTML = content;

// Abre el modal
var modal = new bootstrap.Modal(modalElement);
modal.show();


}


function vistaprevia(src){
  var modalElement2 = document.getElementById('exampleModalToggle2');
  var embedElement = modalElement2.querySelector('embed');

  // Establecer el atributo src del elemento embed con el valor pasado
  embedElement.setAttribute('src', src);
}



function cerrarModalx() {
   var modalElement = document.getElementById('exampleModalToggle');
   var modal = bootstrap.Modal.getInstance(modalElement);
   modal.hide();
}







function editarSt(stId, id_tienda ) {



  var e1 = document.getElementById('folioedit').value;
     var e2 = document.getElementById('estadoedit').value;
var e3 = document.getElementById('folioautorizadoedit').checked;
     var e4 = document.getElementById('trabajoautorizadoedit').checked;
   var e5 = document.getElementById('trabajoedit').value;
    var e6 = document.getElementById('fechaedit').value;  




 $.ajax({
url: '../actions/update_st.php', 
method: 'POST',
data: {id:stId, Folio: e1, Estado: e2, FolioAutorizado:e3 , TrabajoAutorizado:e4, NewTrabajo: e5, NewFecha:e6 }, // Datos que se enviarán al servidor
success: function (response) {
   // Maneja la respuesta del servidor, muestra mensajes o realiza otras acciones necesarias
   
   //alert(response);
   // Cierra el modal después de eliminar
   cerrarModal();
   location.reload();

},
error: function () {
   alert('Error al eliminar la tienda');
}
}); 



var formData = new FormData();
    formData.append('id', stId); // Agrega el id al FormData
    formData.append('id_tienda', id_tienda); // Agrega el id al FormData

  
  var pdfGeneradorElement = document.getElementById('pdfGenerador');
var pdfGenerador = pdfGeneradorElement ? pdfGeneradorElement.files[0] : null;



var pdfPlanoElement = document.getElementById('pdfPlano');
var pdfPlano = pdfPlanoElement ? pdfPlanoElement.files[0] : null;



var pdfPptoElement = document.getElementById('pdfPpto');
var pdfPpto = pdfPptoElement ? pdfPptoElement.files[0] : null;



var pdfFileElement = document.getElementById('pdfFile');
var pdfFile = pdfFileElement ? pdfFileElement.files[0] : null;




var xmlElement = document.getElementById('xmlFile');
var xmlFile = xmlElement ? xmlElement.files[0] : null;






 


     if (pdfGenerador) {
    console.log('pdfGenerador:', pdfGenerador);
    // Realizar acción aquí, por ejemplo, agregar a formData
        formData.append('pdf_generador', pdfGenerador);

  }else {
  // Aquí puedes continuar con tu lógica sabiendo que pdfGenerador está definido.
  console.log('no file');
  // Realizar acción aquí, por ejemplo, agregar a formData
}


  if (pdfPlano) {
    console.log('pdfPlano:', pdfPlano);
    // Realizar acción aquí, por ejemplo, agregar a formData

        formData.append('pdf_plano', pdfPlano);

  } else {
  // Aquí puedes continuar con tu lógica sabiendo que pdfGenerador está definido.
  console.log('no file');
  // Realizar acción aquí, por ejemplo, agregar a formData
}

  if (pdfPpto) {
    console.log('pdfPpto:', pdfPpto);
    // Realizar acción aquí, por ejemplo, agregar a formData
        formData.append('pdf_ppto', pdfPpto);

  }else {
  // Aquí puedes continuar con tu lógica sabiendo que pdfGenerador está definido.
  console.log('no file');
  // Realizar acción aquí, por ejemplo, agregar a formData
}





if (pdfFile) {
    console.log('pdfFile:', pdfFile);
    // Realizar acción aquí, por ejemplo, agregar a formData
       // formData.append('pdf_generador', pdfGenerador);
        formData.append('pdf_factura', pdfFile);

  }else {
  // Aquí puedes continuar con tu lógica sabiendo que pdfGenerador está definido.
  console.log('no file');
  // Realizar acción aquí, por ejemplo, agregar a formData
}


if (xmlFile) {
    console.log('xmlFile:', xmlFile);
    // Realizar acción aquí, por ejemplo, agregar a formData
       // formData.append('pdf_generador', pdfGenerador);
        formData.append('xml', xmlFile);

  }else {
  // Aquí puedes continuar con tu lógica sabiendo que pdfGenerador está definido.
  console.log('no file');
  // Realizar acción aquí, por ejemplo, agregar a formData
}







  $.ajax({
        url: '../actions/upload_archivo.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Aquí puedes manejar la respuesta del servidor
            console.log('upload_archivo:', response);
            cerrarModalx();
            location.reload();
        },
        error: function(xhr, status, error) {
            // Manejar errores
            console.error(error);
        }
    });
}



  























function permitirSoloNumeros(elemento) {
elemento.value = elemento.value.replace(/[^0-9]/g, '');
}



function eliminarArchivo(stId,  campo) {
      $.ajax({
          url: '../actions/delete_archivo.php', // URL para eliminar el archivo en el servidor
          type: 'POST', // O el método HTTP que corresponda
          data: { id: stId, campo: campo }, // Datos que deseas enviar al servidor, como el ID del archivo a eliminar
      }).then(function(response) {
          // Si la eliminación del archivo es exitosa, puedes realizar otra petición AJAX para actualizar el campo en la tabla
          console.log(response);
        location.reload();
      }).then(function() {
          // Después de recargar la página, abrir el modal nuevamente
        //  abrirModalPPTOPDF(stId, stFolio, stTienda, stFecha, id_tienda, pdf_generador, pdf_plano, pdf_ppto);
      }).catch(function(error) {
          // Aquí puedes manejar cualquier error que ocurra durante la eliminación del archivo
          console.error("Error al eliminar el archivo:", error);
      });
  }


</script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>


