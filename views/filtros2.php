<?php
session_start();
include_once('../models/RegionModel.php');
include_once('../models/TiendaModel.php');
include_once('../models/StModel.php');
include_once('../models/FiltrosModel.php');
if (!isset($_SESSION['email'])) {
    header('Location: ../views/login.php'); 
    exit();
}

$tiendaModel = new TiendaModel();
$tiendas = $tiendaModel->getTiendas();

$ST = new StModel();
$STS = $ST->getSts();



$regionModel = new RegionModel();
$regiones = $regionModel->getRegiones();
//aqui otro 


$databaseConnection = new DatabaseConnection();
$conn = $databaseConnection->getConnection();

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtros</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/filtros.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@floating-ui/core@1.6.0"></script>
<script src="https://cdn.jsdelivr.net/npm/@floating-ui/dom@1.6.3"></script>

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

      <button class="btn btn-dark  ms-2" type="button" data-bs-toggle="modal" data-bs-target="#myModal">
        <i class="fa-solid fa-plus"></i> Agregar ST
      </button>
    </div>
    <div class="flex-grow-1"> <!-- Ocupa el espacio restante -->
      <form class="d-flex " role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar ST" aria-label="Search">
        <button class="btn btn-outline-success" data-bs-toggle="popover" data-bs-title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?"  >Buscar</button>
      </form>
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
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Buscar ST" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </div>
</nav>











<div class="d-flex" id="wrapper">

  <!-- Sidebar -->
  <div class=" border-right" id="sidebar-wrapper " style="background: #C7C8CC;">
  <div class="sidebar-heading text-black text-center ">
  <h5 class="mx-auto">Consulta tienda</h5>
</div>
    <div class="list-group list-group-flush" style="max-height: 500px; overflow-y: auto;">

    <?php 
foreach ($tiendas as $tienda) {
    echo '<strong>';
    echo '<a href="filtros.php?idTienda='.$tienda['id'].'"     class="list-group-item list-group-item-action bg-white text-black tienda-link" style="font-family: Arimo, sans-serif;">'.$tienda['nombre'].'</a>';
    echo '</strong>';
}
?>



    

    </div>
  </div>
  <!-- /#sidebar-wrapper -->

  <!-- Contenido de la página -->
  <div  id="page-content-wrapper" style="width:100%;">

  <div class="container text-center mt-5" style="display: block;">
    <div class="mx-auto">
        <h2 class="text-center" style="opacity: 0.8;">Selecciona una tienda</h2>
    </div>
    <img src="../assets/img/f1.png" style="opacity: 0.8;" />
</div>
</div>








<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Agrega ST</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <form  action="../controllers/StController.php" method="post"  >
        

        <label for="st">FOLIO:</label>
        <input type="text" id="st" name="st" required>

        <label for="tienda">TIENDA:</label>
        <select name="tienda_choose" id="tienda_choose">
        <option value="null">--</option>
        <?php 
foreach ($tiendas as $tienda) {
    echo '<option value="' . $tienda['id'] . '">' . $tienda['nombre'] . '</option>';
}
?>

</select>

       

        <label for="trabajo">TRABAJO A REALIZAR:</label>
        <textarea id="trabajo" name="trabajo" rows="4" required></textarea>

        <label for="fecha">FECHA SOLICITUD:</label>
        <input type="date" id="fecha" name="fecha" required>
        <br>
        <label for="fecha">ESTADO:</label>
        <select name="estado" id="estado">
          <option value="STANDBY">--</option>
          <option value="PENDIENTE">PENDIENTE</option>
          <option value="REVISADO">REVISADO</option>
          <option value="PRESUPUESTADO">PRESUPUESTADO</option>
          <option value="ACEPTADO">ACEPTADO</option>
          <option value="CANCELADO">CANCELADO</option>
        </select>
          
<br>
       <div style="display: flex; flex-direction: row; padding:3%;">
       <div style="flex: 1; padding:3%;" >
       <label for="st">ST ACEPTADO:</label> 
       <label class="switch">
       <input type="checkbox" name="st_aceptado">
       <span class="slider"></span>
       </label>
      </div>
      <div  style="flex: 2; padding:3%;">
        <label for="st">TRABAJO REALIZADO:</label> 
        <br>
        <label class="switch">
      <input type="checkbox" name="trabajo_realizado">
      <span class="slider"></span>
      </label>
      </div>
      </div>
        
        <button id="enviar" class="btn btn-success" type="submit" >Enviar Solicitud</button>
    </form>
    </div>
    
    <!-- Modal footer -->
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
    </div>

    </div>
  </div>
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




<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>  
var popoverList1 = [].slice.call(document.querySelectorAll('[data-bs-toggle = "popover"]'))  
var popoverList2 = popoverList1.map(function (popoverTriggerfun) {  
return new bootstrap.Popover(popoverTriggerfun)  
})  
</script>  

<script>
$(document).ready(function() {
    // Manejar clic en los enlaces de navegación
   
    const urlParams = new URLSearchParams(window.location.search);
    const idTienda = urlParams.get('idTienda');
   
   console.log(idTienda)


if(!idTienda){
  console.log("go ahead")
}else{
  let componente='activos';
   cargarContenedor(idTienda, componente)
}

  
})


function cargarContenedor(idTienda, componente) {
    // Obtener el componente del atributo data-componente del enlace
   
    // Construir el contenido HTML de la navegación basado en el valor del parámetro 'componente'
    var contenidoHTML = '<ul class="nav nav-tabs">' +
        '<li class="nav-item">' +
        '<a id="btnActivos" class="nav-link ' + (componente === 'activos' || componente === null ? 'active' : '') + '" onClick="cargarContenidoTienda('+idTienda+',  \'activos\' )">ST</a>' +
        '</li>' +
        '<li class="nav-item">' +
        '<a id="btnPresaldos" class="nav-link ' + (componente === 'presaldos' ? 'active' : '') + '" onClick="cargarContenidoTienda('+idTienda+', \'presaldos\' )">ST Presaldos</a>' +
        '</li>' +
        '<li class="nav-item">' +
        '<a id="btnSaldos"  class="nav-link ' + (componente === 'saldos' ? 'active' : '') + '"onClick="cargarContenidoTienda('+idTienda+', \'saldos\')">ST Saldos</a>' +
        '</li>' +
        '<li class="nav-item">' +
        '<a id="btnCancelados"  class="nav-link ' + (componente === 'cancelados' ? 'active' : '') + '"onClick="cargarContenidoTienda('+idTienda+', \'cancelados\')">ST Cancelados</a>' +
        '</li>' +
        '</ul>' +
        '<h2 class="tittle_tienda"></h2>' +
        '<table class="table">' +
        '<thead>' +
        '<tr>' +
        '<th scope="col">FOLIO</th>' +
        '<th scope="col">TRABAJO A REALIZAR</th>' +
        '<th scope="col">PORTAL SIM</th>' +
        '<th scope="col">FECHA DE SOLICITUD</th>' +
        '<th scope="col">AUTORIZADO</th>' +
        '<th scope="col">REALIZADO</th>' +
        '<th scope="col">PPTO</th>' +
        '<th scope="col">FACTURA</th>' +
        '<th scope="col">Editar</th>' +
        '</tr>' +
        '</thead>' +
        '<tbody>' +
        '</tbody>' +
        '</table>';

    $('#page-content-wrapper').html(contenidoHTML);

    cargarContenidoTienda(idTienda,'activos');
}



function cargarContenidoTienda(idTienda,  componente) {
  
 
  const urlParams = new URLSearchParams(window.location.search);
    const idTienda = urlParams.get('idTienda');


  console.log(idTienda, componente)

  $('#btnActivos').removeClass('active');
  $('#btnPresaldos').removeClass('active');
  $('#btnSaldos').removeClass('active');
  $('#btnCancelados').removeClass('active');
  
  switch(componente) {
  case 'activos':
    $('#btnActivos').addClass('active');
    $.ajax({
        url: '../actions/get_st_activos.php',
        method: 'GET',
        data: { idTienda: idTienda },
        success: function(response) {
         
if(response == 'SIN STS'){

  $('.table thead').empty();
             $('.table tbody').empty();
              console.log('IMG PARA SIN STS')
let imgRes = '<div class="container text-center " style="display: block;">'+
             '<div class="mx-auto">'+
             '<h2 class="text-center" style="opacity: 0.8;">Sin STS para mostrar</h2>'+
             '</div>'+
             '<img src="../assets/img/f2.png" style="opacity: 0.8;" />'+
             '</div>';


             $('.table tbody').append(imgRes);
             $(function () {
      
    });
        
  

}else{
  var responseObject = JSON.parse(response);
            console.log(response);
            // Limpiar el contenido del cuerpo de la tabla
            $('.table tbody').empty();
            responseObject.forEach(function(item) {
              console.log('test:', item);
                // Crear una nueva fila para cada objeto en 'response'
                var newRow =
                    '<tr style="font-family: Arimo, sans-serif;">' +
                    '<td>' + item.folio + '</td>' +
                    '<td>' + item.trabajo + '</td>' +
                    '<td>' + item.estado_portal + '</td>' +
                    '<td>' + item.fecha + '</td>' +
                    '<td>' + (item.autorizado ? '<span class="badge text-bg-success"><i class="fa-solid fa-check"></i></span>' : '<span class="badge text-bg-danger"><i class="fa-solid fa-xmark"></i></span>') + '</td>' +
                    '<td>' + (item.trabajo_realizado ? '<span class="badge text-bg-success"><i class="fa-solid fa-check"></i></span>' : '<span class="badge text-bg-danger"><i class="fa-solid fa-xmark"></i></span>') + '</td>' +
                    '<td><button type="button" class="btn btn-warning" id=" '+ item.id +'"  data-bs-toggle="popover" data-bs-title="Popover title" data-bs-content="And heres some amazing content. Its very engaging. Right?"><i class="fa-solid fa-arrow-up-from-bracket"></i></button></td>' +
                    '<td><button type="button" class="btn btn-warning"><i class="fa-solid fa-arrow-up-from-bracket"></i></button></td>' +
                    '<td><button type="button" class="btn btn-success" onClick="abrirModal('+item.id+', \''+item.folio+'\', \''+item.nombre+'\', \''+item.trabajo+'\', \''+item.fecha+'\', '+item.id_tienda+', '+item.autorizado+', '+item.trabajo_realizado+', \''+item.estado_portal+'\')" >Editar</button></td>' +
                    '</tr>';

                // Agregar la nueva fila al cuerpo de la tabla
                $('.table tbody').append(newRow);
            });
}

            // Establecer el título de la tienda

            if (responseObject.length > 0) {
                $('.tittle_tienda').text(responseObject[0].nombre);
            } else {
                $('.tittle_tienda').text('No se encontró contenido para la tienda');
            }
        },
        error: function() {
            alert('Error al extraer sts');
        }
    });

    break;
  case 'presaldos':
    $('#btnPresaldos').addClass('active');
    $.ajax({
        url: '../actions/get_st_presaldos.php',
        method: 'GET',
        data: { idTienda: idTienda },
        success: function(response) {
           
if(response == 'SIN STS'){

  $('.table thead').empty();
             $('.table tbody').empty();
              console.log('IMG PARA SIN STS')
let imgRes = '<div class="container text-center " style="display: block;">'+
             '<div class="mx-auto">'+
             '<h2 class="text-center" style="opacity: 0.8;">Sin STS PRESALDADOS para mostrar</h2>'+
             '</div>'+
             '<img src="../assets/img/f2.png" style="opacity: 0.8;" />'+
             '</div>';


             $('.table tbody').append(imgRes);
        
  

}else{
  var responseObject = JSON.parse(response);
            console.log(response);
            // Limpiar el contenido del cuerpo de la tabla
            $('.table tbody').empty();
            responseObject.forEach(function(item) {
              console.log('test:', item);
                // Crear una nueva fila para cada objeto en 'response'
                var newRow =
                    '<tr style="font-family: Arimo, sans-serif;">' +
                    '<td>' + item.folio + '</td>' +
                    '<td>' + item.trabajo + '</td>' +
                    '<td>' + item.estado_portal + '</td>' +
                    '<td>' + item.fecha + '</td>' +
                    '<td>' + (item.autorizado ? '<span class="badge text-bg-success"><i class="fa-solid fa-check"></i></span>' : '<span class="badge text-bg-danger"><i class="fa-solid fa-xmark"></i></span>') + '</td>' +
                    '<td>' + (item.trabajo_realizado ? '<span class="badge text-bg-success"><i class="fa-solid fa-check"></i></span>' : '<span class="badge text-bg-danger"><i class="fa-solid fa-xmark"></i></span>') + '</td>' +
                    '<td><button type="button" class="btn btn-warning"     data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover"><i class="fa-solid fa-arrow-up-from-bracket"></i></button></td>' +
                    '<td><button type="button" class="btn btn-warning"><i class="fa-solid fa-arrow-up-from-bracket"></i></button></td>' +
                    '<td><button type="button" class="btn btn-success" onClick="abrirModal('+item.id+', \''+item.folio+'\', \''+item.nombre+'\', \''+item.trabajo+'\', \''+item.fecha+'\', '+item.id_tienda+', '+item.autorizado+', '+item.trabajo_realizado+', \''+item.estado_portal+'\')" >Editar</button></td>' +
                    '</tr>';

                // Agregar la nueva fila al cuerpo de la tabla
                $('.table tbody').append(newRow);
            });
}


            // Establecer el título de la tienda
            if (responseObject.length > 0) {
                $('.tittle_tienda').text(responseObject[0].nombre);
            } else {
                $('.tittle_tienda').text('No se encontró contenido para la tienda');
            }
        },
        error: function() {
            alert('Error al extraer sts');
        }
    });
    break;
    case 'saldos':
      $('#btnSaldos').addClass('active');
      $.ajax({
        url: '../actions/get_st_saldos.php',
        method: 'GET',
        data: { idTienda: idTienda },
        success: function(response) {
       
if(response == 'SIN STS'){
             $('.table thead').empty();
             $('.table tbody').empty();
              console.log('IMG PARA SIN STS')
let imgRes = '<div class="container text-center " style="display: block;">'+
             '<div class="mx-auto">'+
             '<h2 class="text-center" style="opacity: 0.8;">Sin STS SALDADOS para mostrar</h2>'+
             '</div>'+
             '<img src="../assets/img/f2.png" style="opacity: 0.8;" />'+
             '</div>';


             $('.table tbody').append(imgRes);
        
  

}else{
  var responseObject = JSON.parse(response);
            console.log(response);
            // Limpiar el contenido del cuerpo de la tabla
            $('.table tbody').empty();
            responseObject.forEach(function(item) {
              console.log('test:', item);
                // Crear una nueva fila para cada objeto en 'response'
                var newRow =
                    '<tr style="font-family: Arimo, sans-serif;">' +
                    '<td>' + item.folio + '</td>' +
                    '<td>' + item.trabajo + '</td>' +
                    '<td>' + item.estado_portal + '</td>' +
                    '<td>' + item.fecha + '</td>' +
                    '<td>' + (item.autorizado ? '<span class="badge text-bg-success"><i class="fa-solid fa-check"></i></span>' : '<span class="badge text-bg-danger"><i class="fa-solid fa-xmark"></i></span>') + '</td>' +
                    '<td>' + (item.trabajo_realizado ? '<span class="badge text-bg-success"><i class="fa-solid fa-check"></i></span>' : '<span class="badge text-bg-danger"><i class="fa-solid fa-xmark"></i></span>') + '</td>' +
                    '<td><button id="ppto" type="button" class="btn btn-warning"  data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover"><i class="fa-solid fa-arrow-up-from-bracket"></i></button></td>' +
                    '<td><button id="factura" type="button" class="btn btn-warning"><i class="fa-solid fa-arrow-up-from-bracket"></i></button></td>' +
                    '<td><button type="button" class="btn btn-success" onClick="abrirModal('+item.id+', \''+item.folio+'\', \''+item.nombre+'\', \''+item.trabajo+'\', \''+item.fecha+'\', '+item.id_tienda+', '+item.autorizado+', '+item.trabajo_realizado+', \''+item.estado_portal+'\')" >Editar</button></td>' +
                    '</tr>';

                // Agregar la nueva fila al cuerpo de la tabla
                $('.table tbody').append(newRow);
            });
}


            // Establecer el título de la tienda
            if (responseObject.length > 0) {
                $('.tittle_tienda').text(responseObject[0].nombre);
            } else {
                $('.tittle_tienda').text('No se encontró contenido para la tienda');
            }
        },
        error: function() {
            alert('Error al extraer sts');
        }
    });
    break;

    case 'cancelados':
    $('#btnCancelados').addClass('active');

    $.ajax({
        url: '../actions/get_st_cancelados.php',
        method: 'GET',
        data: { idTienda: idTienda },
        success: function(response) {

if(response == 'SIN STS'){

  $('.table thead').empty();
             $('.table tbody').empty();
              console.log('IMG PARA SIN STS')
let imgRes = '<div class="container text-center " style="display: block;">'+
             '<div class="mx-auto">'+
             '<h2 class="text-center" style="opacity: 0.8;">Sin STS CANCELADOS para mostrar</h2>'+
             '</div>'+
             '<img src="../assets/img/f2.png" style="opacity: 0.8;" />'+
             '</div>';


             $('.table tbody').append(imgRes);
        
  
}else{
  var responseObject = JSON.parse(response);
            console.log(response);
            // Limpiar el contenido del cuerpo de la tabla
            $('.table tbody').empty();
            responseObject.forEach(function(item) {
                // Crear una nueva fila para cada objeto en 'response'
                console.log('test:', item);
                var newRow =
                    '<tr style="font-family: Arimo, sans-serif;">' +
                    '<td>' + item.folio + '</td>' +
                    '<td>' + item.trabajo + '</td>' +
                    '<td>' + item.estado_portal + '</td>' +
                    '<td>' + item.fecha + '</td>' +
                    '<td>' + (item.autorizado ? '<span class="badge text-bg-success"><i class="fa-solid fa-check"></i></span>' : '<span class="badge text-bg-danger"><i class="fa-solid fa-xmark"></i></span>') + '</td>' +
                    '<td>' + (item.trabajo_realizado ? '<span class="badge text-bg-success"><i class="fa-solid fa-check"></i></span>' : '<span class="badge text-bg-danger"><i class="fa-solid fa-xmark"></i></span>') + '</td>' +
                    '<td><button type="button" class="btn btn-warning"  data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover"><i class="fa-solid fa-arrow-up-from-bracket"></i></button></td>' +
                    '<td><button type="button" class="btn btn-warning"><i class="fa-solid fa-arrow-up-from-bracket"></i></button></td>' +
                    '<td><button type="button" class="btn btn-success" onClick="abrirModal('+item.id+', \''+item.folio+'\', \''+item.nombre+'\', \''+item.trabajo+'\', \''+item.fecha+'\', '+item.id_tienda+', '+item.autorizado+', '+item.trabajo_realizado+', \''+item.estado_portal+'\')" >Editar</button></td>' +
                    '</tr>';

                // Agregar la nueva fila al cuerpo de la tabla
                $('.table tbody').append(newRow);
            });
}

          

            // Establecer el título de la tienda
            if (responseObject.length > 0) {
                $('.tittle_tienda').text(responseObject[0].nombre);
            } else {
                $('.tittle_tienda').text('No se encontró contenido para la tienda');
            }
        },
        error: function() {
            alert('Error al extraer sts');
        }
    });

    break;

  default:
    // code block
}

}



   
</script>



<script src="../assets/js/filtros.js"></script>

 
 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>