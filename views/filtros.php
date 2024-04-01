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


<style>
    .file-upload-container {
        position: relative;
        border: 2px dashed rgba(0, 0, 0, 0.5); /* Color opaco para el borde punteado */
        padding: 10px;
        margin-right: 5px;
        width: 30em;
        
    }

    .file-upload-container:hover {
        border-color: rgba(0, 0, 0, 0.7); /* Cambia el color del borde cuando se pasa el ratón */
    }

  


    .cookies-card {
  width: 280px;
  height: fit-content;
  background-color: rgb(255, 250, 250);
  border-radius: 10px;
  border: 1px solid rgb(206, 206, 206);
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: space-between;
  padding: 10px;
  gap: 15px;
  position: relative;
  font-family: Arial, Helvetica, sans-serif;
  box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.066);
}

.cookie-heading {
  color: rgb(34, 34, 34);
  font-weight: 800;
}
.cookie-para {
  font-size: 14px;
  font-weight: 500;
  color: rgb(51, 51, 51);
}
.button-wrapper {
  width: 100%;
  height: auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
}
.cookie-button {
  width: 50%;
  padding: 8px 0;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
.accept {
  background-color: rgb(34, 34, 34);
  color: white;
}
.reject {
  background-color: #ececec;
  color: rgb(34, 34, 34);
}
.accept:hover {
  background-color: rgb(0, 0, 0);
}
.reject:hover {
  background-color: #ddd;
}
.exit-button {
  position: absolute;
  top: 17px;
  right: 17px;
  width: 20px;
  height: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: transparent;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
.exit-button:hover {
  background-color: #ddd;
  color: white;
}
.svgIconCross {
  height: 10px;
}



</style>


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
    <form class="d-flex" role="search">
    <input class="form-control me-2" type="search" placeholder="Buscar ST por folio " aria-label="Search">
    <button class="btn btn-outline-success" data-bs-toggle="popover" data-bs-title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">Buscar <i class="fa-solid fa-magnifying-glass"></i></button>
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
  <div class=" border-right" id="sidebar-wrapper " >
  <div class="sidebar-heading text-black text-center ">
  <h5 class="mx-auto">Consulta tienda</h5>
</div>
    <div class="list-group list-group-flush" style="max-height: 500px; overflow-y: auto; padding: 10%;">

    <?php 
    require '../includes/configlite.php';
$databaseConnection = new DatabaseConnectioni();
$conn = $databaseConnection->getConnection();

foreach ($tiendas as $tienda) {
    // Consulta para contar el número de elementos en la tabla st para la tienda actual
    $sql = "SELECT COUNT(*) AS num_st FROM st WHERE id_tienda = ? AND (
      st.autorizado != true
      OR st.trabajo_realizado != true
  )
  AND st.estado_portal != 'CANCELADO'
  AND st.archivado != true";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $tienda['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $num_st = $row['num_st'];

    // Mostrar el nombre de la tienda con el número de elementos de la tabla st
    echo '<strong>';
    echo '<a href="filtros.php?posComponente=activos&idTienda='.$tienda['id'].'" class="list-group-item list-group-item-action bg-white text-black tienda-link" style="font-family: Arimo, sans-serif;"> <i class="fa-solid fa-store"></i> '.$tienda['nombre'].'<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-'.($num_st == 0 ? 'light' : 'danger').'">'.$num_st.'<span class="visually-hidden">unread messages</span></span></a>';
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
<form  action="../controllers/StController.php" method="post"  >
        
      
      
      
      
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




<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>



<script>
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


function cargarContenedor(idTienda, componente) {
    // Obtener el componente del atributo data-componente del enlace
   
    // Construir el contenido HTML de la navegación basado en el valor del parámetro 'componente'
    var contenidoHTML = '<ul class="nav nav-tabs">' +
        '<li class="nav-item">' +
        '<a id="btnActivos" href="?posComponente=activos&idTienda=' + idTienda + '"  class="nav-link" onClick="cargarContenidoTienda(' + idTienda + ', \'activos\' )">ST</a>' +
        '</li>' +
        '<li class="nav-item">' +
        '<a id="btnCancelados" href="?posComponente=cancelados&idTienda=' + idTienda + '"  class="nav-link" onClick="cargarContenidoTienda(' + idTienda + ', \'cancelados\')">ST Cancelados</a>' +
        '</li>' +
        '<li class="nav-item">' +
        '<a id="btnPresaldos" href="?posComponente=presaldos&idTienda=' + idTienda + '" class="nav-link" onClick="cargarContenidoTienda(' + idTienda + ', \'presaldos\' )">ST Presaldos</a>' +
        '</li>' +
        '<li class="nav-item">' +
        '<a id="btnSaldos" href="?posComponente=saldos&idTienda=' + idTienda + '"   class="nav-link" onClick="cargarContenidoTienda(' + idTienda + ', \'saldos\')">ST Saldos</a>' +
        '</li>' +
        '</ul>' +
        '<div  ><h2><span class="badge  text-bg-dark tittle_tienda" > </span></h2></div>' +
        '<table class="table">' +
        '<thead>' +
        '<tr>' +
        '<th scope="col" style="background-color: black; color: white;  text-align: center;">FOLIO <br> <i class="fa-solid fa-paperclip"></i></th>' +
'<th scope="col" style="background-color: black; color: white; text-align: center;">OBRA <br> <i class="fa-solid fa-helmet-safety"></i></th>' +
'<th scope="col" style="background-color: black; color: white; text-align: center;">REALIZADO <br> <i class="fa-solid fa-list-check"></i> </th>' +
'<th scope="col" style="background-color: black; color: white;  text-align: center;">PORTAL SIM</th>' +
'<th scope="col" style="background-color: black; color: white;  text-align: center;">FECHA DE SOLICITUD</th>' +

'<th scope="col" style="background-color: black; color: white; text-align: center;">PPTO <br> <i class="fa-solid fa-file"></i></th>' +
'<th scope="col" style="background-color: black; color: white; text-align: center;">FACTURA <br> <i class="fa-solid fa-file"></i></th>' +
'<th scope="col" style="background-color: black; color: white; text-align: center;"> EDITAR <br> <i class="fa-solid fa-feather"></i></th>' +
        '</tr>' +
        '</thead>' +
        '<tbody>' +
        '</tbody>' +
        '</table>';

    $('#page-content-wrapper').html(contenidoHTML);

    cargarContenidoTienda(idTienda,'activos');
}



function cargarContenidoTienda(idTienda,  componente) {
  
 

 

  $('#btnActivos').removeClass('active');
  $('#btnPresaldos').removeClass('active');
  $('#btnSaldos').removeClass('active');
  $('#btnCancelados').removeClass('active');
  


  const urlParams = new URLSearchParams(window.location.search);
    const posComponente = urlParams.get('posComponente');


   let componentex;

if(posComponente==null){
  componentex =  'activos';
}else{ componentex = posComponente;}

  switch(componentex) {
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
           
            // Limpiar el contenido del cuerpo de la tabla
            $('.table tbody').empty();
            responseObject.forEach(function(item) {
              console.log('activos:', item);


              var backgroundColor;
switch (item.estado_portal) {
    case 'PENDIENTE':
        backgroundColor = '#FCDC2A'; // Color para PENDIENTE
        break;
    case 'STANDBY':
        backgroundColor = '#C7C8CC'; // Color para STANBY
        break;
    case 'ACEPTADO':
        backgroundColor = '#87A922'; // Color para ACEPTADO
        break;

        case 'REVISADO':
        backgroundColor = '#9195F6'; // Color para ACEPTADO
        break;

        case 'PRESUPUESTADO':
        backgroundColor = '#387ADF'; // Color para ACEPTADO
        break;

        case 'CANCELADO':
        backgroundColor = '#E72929'; // Color para ACEPTADO
        break;
    default:
        backgroundColor = ''; // Color predeterminado
}
                // Crear una nueva fila para cada objeto en 'response'
                var newRow =
'<tr style="font-family: Arimo, sans-serif; border: 2px ridge grey; ">' +
'<td style="border-right: 2px dashed grey; text-align: center;">'+(item.autorizado? '<h3><span class="badge text-bg-success"> <strong>  ' + item.folio + ' </strong></span></h3>':'<h3><span class="badge text-bg-light"> <strong>  ' + item.folio + ' </strong></span></h3>')+'</td>' +
'<td style="border-right: 2px dashed grey; text-align: center;' + 
'<div class="cookies-card">'+
'<h6 class="cookie-heading">'+ (item.trabajo_realizado ? '<span class="badge text-bg-success">'+ item.nombre+' <i class="fa-solid fa-check"></i></span>' : '<span class="badge text-bg-light">' +item.nombre+' <i class="fa-solid fa-brush"></i></span>') +'</h6>'+
'<p class="cookie-para">'+ item.trabajo + '</p>'+

'</td>' +
'<td style="border-right: 2px dashed grey; text-align: center;"><h3>' + (item.trabajo_realizado ? '<span class="badge text-bg-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Trabajo realizado"><i class="fa-solid fa-check"></i></span>' : '<span class="badge text-bg-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Trabajo sin realizar"><i class="fa-solid fa-xmark"></i></span>') + '</h3></td>' +
'<td style="border-right: 2px dashed grey; text-align: center; background-color: ' + backgroundColor + ';" ><strong>  ' +( item.estado_portal=='STANDBY'?'-':item.estado_portal) + '</strong> </td>' +
'<td style="border-right: 2px dashed grey; text-align: center;"><h3><span class="badge text-bg-secondary"><strong> ' + item.fecha + '</strong></span><h3> </td>' +


'<td style="border-right: 2px dashed grey; text-align: center;">' +
    '<button type="button" class="btn btn-' + (item.pdf_generador || item.pdf_plano || item.pdf_ppto ? 'dark' : 'warning') + '" id="' + item.id + '" onClick="abrirModalPPTOPDF(' + item.id + ', \'' + item.folio + '\', \'' + item.nombre + '\', \'' + item.fecha + '\', ' + item.id_tienda + ', \'' + item.pdf_generador + '\', \'' + item.pdf_plano + '\', \'' + item.pdf_ppto + '\')">' +
        (item.pdf_generador || item.pdf_plano || item.pdf_ppto ? '<i class="fa-solid fa-eye"></i> ' : '<i class="fa-solid fa-arrow-up-from-bracket"></i>') +
    '</button>' +
'</td>' +
'<td style="border-right: 2px dashed grey; text-align: center;">' +
    '<button type="button" class="btn btn-' + (item.xml || item.pdf_factura ? 'dark' : 'warning') + '" id="' + item.id + '" onClick="abrirModalFACTURAPDF(' + item.id + ', \'' + item.folio + '\', \'' + item.nombre + '\', \'' + item.fecha + '\', ' + item.id_tienda + ', \'' + item.xml + '\', \'' + item.pdf_factura + '\')">' +
        (item.xml || item.pdf_factura ? '<i class="fa-solid fa-eye"></i> ' : '<i class="fa-solid fa-arrow-up-from-bracket"></i>') +
    '</button>' +
'</td>' +

'<td style="text-align: center;"><button type="button" class="btn btn-success" onClick="abrirModal(' + item.id + ', \'' + item.folio + '\', \'' + item.nombre + '\', \'' + item.trabajo + '\', \'' + item.fecha + '\', ' + item.id_tienda + ', ' + item.autorizado + ', ' + item.trabajo_realizado + ', \'' + item.estado_portal + '\')">Editar <i class="fa-solid fa-feather"></i></button></td>'+
'</tr>';

                // Agregar la nueva fila al cuerpo de la tabla
                $('.table tbody').append(newRow);
            });
}

            // Establecer el título de la tienda

            if (responseObject.length > 0) {
              $('.tittle_tienda').html('<i class="fa-solid fa-store"></i> ' + responseObject[0].nombre);

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
                var backgroundColor;
switch (item.estado_portal) {
    case 'PENDIENTE':
        backgroundColor = '#F9F07A'; // Color para PENDIENTE
        break;
    case 'STANDBY':
        backgroundColor = '#C7C8CC'; // Color para STANBY
        break;
    case 'ACEPTADO':
        backgroundColor = '#9BCF53'; // Color para ACEPTADO
        break;

        case 'REVISADO':
        backgroundColor = '#9195F6'; // Color para ACEPTADO
        break;

        case 'PRESUPUESTADO':
        backgroundColor = '#387ADF'; // Color para ACEPTADO
        break;

        case 'CANCELADO':
        backgroundColor = '#E72929'; // Color para ACEPTADO
        break;
    default:
        backgroundColor = ''; // Color predeterminado
}
                // Crear una nueva fila para cada objeto en 'response'
     



   


var newRow =
'<tr style="font-family: Arimo, sans-serif; border: 2px ridge grey; ">' +
'<td style="border-right: 2px dashed grey; text-align: center;">'+(item.autorizado? '<h3><span class="badge text-bg-success"> <strong>  ' + item.folio + ' </strong></span></h3>':'<h3><span class="badge text-bg-light"> <strong>  ' + item.folio + ' </strong></span></h3>')+'</td>' +
'<td style="border-right: 2px dashed grey; text-align: center;' + 
'<div class="cookies-card">'+
  '<h6 class="cookie-heading">'+ (item.trabajo_realizado ? '<span class="badge text-bg-success">'+ item.nombre+' <i class="fa-solid fa-check"></i></span>' : '<span class="badge text-bg-light">' +item.nombre+' <i class="fa-solid fa-brush"></i></span>') +'</h6>'+
 '<p class="cookie-para">'+ item.trabajo + '</p>'+

'</td>' +
'<td style="border-right: 2px dashed grey; text-align: center;"><h3>' + (item.trabajo_realizado ? '<span class="badge text-bg-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Trabajo realizado"><i class="fa-solid fa-check"></i></span>' : '<span class="badge text-bg-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Trabajo sin realizar"><i class="fa-solid fa-xmark"></i></span>') + '</h3></td>' +
'<td style="border-right: 2px dashed grey; text-align: center; background-color: ' + backgroundColor + ';" ><strong>  ' +( item.estado_portal=='STANDBY'?'-':item.estado_portal) + '</strong> </td>' +
'<td style="border-right: 2px dashed grey; text-align: center;"><h3><span class="badge text-bg-secondary"><strong> ' + item.fecha + '</strong></span><h3> </td>' +


'<td style="border-right: 2px dashed grey; text-align: center;">' +
    '<button type="button" class="btn btn-' + (item.pdf_generador || item.pdf_plano || item.pdf_ppto ? 'dark' : 'warning') + '" id="' + item.id + '" onClick="abrirModalPPTOPDF(' + item.id + ', \'' + item.folio + '\', \'' + item.nombre + '\', \'' + item.fecha + '\', ' + item.id_tienda + ')">' +
        (item.pdf_generador || item.pdf_plano || item.pdf_ppto ? '<i class="fa-solid fa-eye"></i> ' : '<i class="fa-solid fa-arrow-up-from-bracket"></i>') +
    '</button>' +
'</td>' +
'<td style="border-right: 2px dashed grey; text-align: center;">' +
    '<button type="button" class="btn btn-' + (item.xml || item.pdf_factura ? 'dark' : 'warning') + '" id="' + item.id + '" onClick="abrirModalFACTURAPDF(' + item.id + ', \'' + item.folio + '\', \'' + item.nombre + '\',\'' + item.fecha + '\', ' + item.id_tienda + ')">' +
        (item.xml || item.pdf_factura ? '<i class="fa-solid fa-eye"></i> ' : '<i class="fa-solid fa-arrow-up-from-bracket"></i>') +
    '</button>' +
'</td>' +
'<td style="text-align: center;"><button type="button" class="btn btn-success" onClick="abrirModalPRESALDOS(' + item.id + ', \'' + item.folio + '\', \'' + item.nombre + '\', \'' + item.trabajo + '\', \'' + item.fecha + '\', ' + item.id_tienda + ', ' + item.autorizado + ', ' + item.trabajo_realizado + ', \'' + item.estado_portal + '\',\'' + item.archivado + '\')"  >Editar <i class="fa-solid fa-feather"></i></button></td>'+
'</tr>'
;



                // Agregar la nueva fila al cuerpo de la tabla
                $('.table tbody').append(newRow);
            });
}


            // Establecer el título de la tienda
            if (responseObject.length > 0) {
              $('.tittle_tienda').html('<i class="fa-solid fa-store"></i> ' + responseObject[0].nombre);
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
                var backgroundColor;
switch (item.estado_portal) {
    case 'PENDIENTE':
        backgroundColor = '#F9F07A'; // Color para PENDIENTE
        break;
    case 'STANDBY':
        backgroundColor = '#C7C8CC'; // Color para STANBY
        break;
    case 'ACEPTADO':
        backgroundColor = '#9BCF53'; // Color para ACEPTADO
        break;

        case 'REVISADO':
        backgroundColor = '#9195F6'; // Color para ACEPTADO
        break;

        case 'PRESUPUESTADO':
        backgroundColor = '#387ADF'; // Color para ACEPTADO
        break;

        case 'CANCELADO':
        backgroundColor = '#E72929'; // Color para ACEPTADO
        break;
    default:
        backgroundColor = ''; // Color predeterminado
}
                // Crear una nueva fila para cada objeto en 'response'
      






var newRow =
'<tr style="font-family: Arimo, sans-serif; border: 2px ridge grey; ">' +
'<td style="border-right: 2px dashed grey; text-align: center;">'+(item.autorizado? '<h3><span class="badge text-bg-success"> <strong>  ' + item.folio + ' </strong></span></h3>':'<h3><span class="badge text-bg-light"> <strong>  ' + item.folio + ' </strong></span></h3>')+'</td>' +
'<td style="border-right: 2px dashed grey; text-align: center;' + 
'<div class="cookies-card">'+
  '<h6 class="cookie-heading">'+ (item.trabajo_realizado ? '<span class="badge text-bg-success">'+ item.nombre+' <i class="fa-solid fa-check"></i></span>' : '<span class="badge text-bg-light">' +item.nombre+' <i class="fa-solid fa-brush"></i></span>') +'</h6>'+
 '<p class="cookie-para">'+ item.trabajo + '</p>'+

'</td>' +
'<td style="border-right: 2px dashed grey; text-align: center;"><h3>' + (item.trabajo_realizado ? '<span class="badge text-bg-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Trabajo realizado"><i class="fa-solid fa-check"></i></span>' : '<span class="badge text-bg-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Trabajo sin realizar"><i class="fa-solid fa-xmark"></i></span>') + '</h3></td>' +
'<td style="border-right: 2px dashed grey; text-align: center; background-color: ' + backgroundColor + ';" ><strong>  ' +( item.estado_portal=='STANDBY'?'-':item.estado_portal) + '</strong> </td>' +
'<td style="border-right: 2px dashed grey; text-align: center;"><h3><span class="badge text-bg-secondary"><strong> ' + item.fecha + '</strong></span><h3> </td>' +

'<td style="border-right: 2px dashed grey; text-align: center;">' +
    '<button type="button" class="btn btn-' + (item.pdf_generador || item.pdf_plano || item.pdf_ppto ? 'dark' : 'warning') + '" id="' + item.id + '" onClick="abrirModalPPTOPDF(' + item.id + ', \'' + item.folio + '\', \'' + item.nombre + '\', \'' + item.fecha + '\', ' + item.id_tienda + ')">' +
        (item.pdf_generador || item.pdf_plano || item.pdf_ppto ? '<i class="fa-solid fa-eye"></i> ' : '<i class="fa-solid fa-arrow-up-from-bracket"></i>') +
    '</button>' +
'</td>' +
'<td style="border-right: 2px dashed grey; text-align: center;">' +
    '<button type="button" class="btn btn-' + (item.xml || item.pdf_factura ? 'dark' : 'warning') + '" id="' + item.id + '" onClick="abrirModalFACTURAPDF(' + item.id + ', \'' + item.folio + '\', \'' + item.nombre + '\',\'' + item.fecha + '\', ' + item.id_tienda + ')">' +
        (item.xml || item.pdf_factura ? '<i class="fa-solid fa-eye"></i> ' : '<i class="fa-solid fa-arrow-up-from-bracket"></i>') +
    '</button>' +
'</td>' +

'<td style="text-align: center;"><button type="button" class="btn btn-dark" onClick="abrirModalSALDOS(' + item.id + ', \'' + item.folio + '\', \'' + item.nombre + '\', \'' + item.trabajo + '\', \'' + item.fecha + '\', ' + item.id_tienda + ', ' + item.autorizado + ', ' + item.trabajo_realizado + ', \'' + item.estado_portal + '\',\'' + item.archivado + '\')" >Revisar <i class="fa-solid fa-feather"></i></button></td>'+
'</tr>'
;



                // Agregar la nueva fila al cuerpo de la tabla
                $('.table tbody').append(newRow);
            });
}


            // Establecer el título de la tienda
            if (responseObject.length > 0) {
              $('.tittle_tienda').html('<i class="fa-solid fa-store"></i> ' + responseObject[0].nombre);

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
                var backgroundColor;
switch (item.estado_portal) {
    case 'PENDIENTE':
        backgroundColor = '#F9F07A'; // Color para PENDIENTE
        break;
    case 'STANDBY':
        backgroundColor = '#C7C8CC'; // Color para STANBY
        break;
    case 'ACEPTADO':
        backgroundColor = '#9BCF53'; // Color para ACEPTADO
        break;

        case 'REVISADO':
        backgroundColor = '#9195F6'; // Color para ACEPTADO
        break;

        case 'PRESUPUESTADO':
        backgroundColor = '#387ADF'; // Color para ACEPTADO
        break;

        case 'CANCELADO':
        backgroundColor = '#E72929'; // Color para ACEPTADO
        break;
    default:
        backgroundColor = ''; // Color predeterminado
}
                // Crear una nueva fila para cada objeto en 'response'
                var newRow =
                '<tr style="font-family: Arimo, sans-serif; border: 2px ridge grey; ">' +
'<td style="border-right: 2px dashed grey; text-align: center;">'+(item.autorizado? '<h3><span class="badge text-bg-success"> <strong>  ' + item.folio + ' </strong></span></h3>':'<h3><span class="badge text-bg-light"> <strong>  ' + item.folio + ' </strong></span></h3>')+'</td>' +
'<td style="border-right: 2px dashed grey; text-align: center;' + 
'<div class="cookies-card">'+
'<h6 class="cookie-heading">'+ (item.trabajo_realizado ? '<span class="badge text-bg-success">'+ item.nombre+' <i class="fa-solid fa-check"></i></span>' : '<span class="badge text-bg-light">' +item.nombre+' <i class="fa-solid fa-brush"></i></span>') +'</h6>'+

'<p class="cookie-para">'+ item.trabajo + '</p>'+

'</td>' +
'<td style="border-right: 2px dashed grey; text-align: center;"><h3>' + (item.trabajo_realizado ? '<span class="badge text-bg-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Trabajo realizado"><i class="fa-solid fa-check"></i></span>' : '<span class="badge text-bg-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Trabajo sin realizar"><i class="fa-solid fa-xmark"></i></span>') + '</h3></td>' +
'<td style="border-right: 2px dashed grey; text-align: center; background-color: ' + backgroundColor + ';" ><strong>  ' +( item.estado_portal=='STANDBY'?'-':item.estado_portal) + '</strong> </td>' +
'<td style="border-right: 2px dashed grey; text-align: center;"><h3><span class="badge text-bg-secondary"><strong> ' + item.fecha + '</strong></span><h3> </td>' +

'<td style="border-right: 2px dashed grey; text-align: center;">' +
    '<button type="button" class="btn btn-' + (item.pdf_generador || item.pdf_plano || item.pdf_ppto ? 'dark' : 'warning') + '" id="' + item.id + '" onClick="abrirModalPPTOPDF(' + item.id + ', \'' + item.folio + '\', \'' + item.nombre + '\', \'' + item.fecha + '\', ' + item.id_tienda + ')">' +
        (item.pdf_generador || item.pdf_plano || item.pdf_ppto ? '<i class="fa-solid fa-eye"></i> ' : '<i class="fa-solid fa-arrow-up-from-bracket"></i>') +
    '</button>' +
'</td>' +
'<td style="border-right: 2px dashed grey; text-align: center;">' +
    '<button type="button" class="btn btn-' + (item.xml || item.pdf_factura ? 'dark' : 'warning') + '" id="' + item.id + '" onClick="abrirModalFACTURAPDF(' + item.id + ', \'' + item.folio + '\', \'' + item.nombre + '\',\'' + item.fecha + '\', ' + item.id_tienda + ')">' +
        (item.xml || item.pdf_factura ? '<i class="fa-solid fa-eye"></i> ' : '<i class="fa-solid fa-arrow-up-from-bracket"></i>') +
    '</button>' +
'</td>' +
'<td style="text-align: center;"><button type="button" class="btn btn-success" onClick="abrirModal(' + item.id + ', \'' + item.folio + '\', \'' + item.nombre + '\', \'' + item.trabajo + '\', \'' + item.fecha + '\', ' + item.id_tienda + ', ' + item.autorizado + ', ' + item.trabajo_realizado + ', \'' + item.estado_portal + '\')">Editar <i class="fa-solid fa-feather"></i></button></td>'+
'</tr>'
;
                // Agregar la nueva fila al cuerpo de la tabla
                $('.table tbody').append(newRow);
            });
}

          

            // Establecer el título de la tienda
            if (responseObject.length > 0) {
              $('.tittle_tienda').html('<i class="fa-solid fa-store"></i> ' + responseObject[0].nombre);
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
 function abrirModal(stId, stFolio, stTienda, stTrabajo, stFecha, stTienda_id, stAutorizado, stTrabajoRealizado, stEstado ) {
  

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
<div class="text-center" style="margin-right: 100px; width: 100%; ">

    <img src="../assets/img/coppel.svg"  style="width: 60%; " alt="Descripción de la imagen SVG">
    </div>
     



    

            <div>
        
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
    <button type="button" class="btn btn-primary" onclick="editarSt(${stId})">Guardar cambios</button>
</div>
`;

console.log('activos:',stId, stFolio, stTienda, stTrabajo, stFecha, stTienda_id, stAutorizado, stTrabajoRealizado, stEstado)

  mostrarModal(modalContent);
}








function abrirModalPRESALDOS(stId, stFolio, stTienda, stTrabajo, stFecha, stTienda_id, stAutorizado, stTrabajoRealizado, stEstado, stArchivado ) {
        
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
    
    <div  >
    





<div style="display: flex; width: 100%;">

<div style="width: 60%; padding: 2%;">



<label for="trabajo"> <strong>OBRA:</strong></label>
       
    
        <textarea class="chamito" id="trabajoedit" rows="4" name="trabajo" disabled>${stTrabajo}</textarea>
<br>
<div style=" width: 100%; display: flex;">
<div style=" width: 50%; ">
    <label for="tienda"> <strong>TRABAJO REALIZADO: </strong></label>
    <br>
    
    <label class="switch">
        <input type="checkbox" name="trabajo_realizado" id="trabajoautorizadoedit" ${stTrabajoRealizado === 1 ? 'checked' : ''}>
        <span class="slider"></span>
    </label>
  
    </div>
  


    <div style=" width: 50%; " >
     <label for="saldar"><strong>SALDAR:</strong></label>
     <br>
     <label class="switch">
         <input type="checkbox" name="trabajo_saldado" id="trabajosaldadoedit"  ${stArchivado === 1 ? 'checked' : ''} >
         <span class="slider"></span>
     </label>
    </div>
    </div>

<div class="text-center" style="margin-right: 100px; width: 100%; ">

    <img src="../assets/img/coppel.svg"  style="width: 60%; " alt="Descripción de la imagen SVG">
    </div>
     



    

            <div>
        
        </div>


</div>

<div style="width: 40%; padding: 3%">






<div style="max-width: 300px;">
            <label for="tienda"> <strong>FOLIO: </strong></label>
            <br>
            <input type="text" id="folioedit"  class="form-control" oninput="permitirSoloNumeros(this)" value="${stFolio}" disabled>
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
    <button type="button" class="btn btn-primary" onclick="editarStPresaldo(${stId})">Guardar cambios</button>
</div>

`;
    console.log('presaldos:',stId, stFolio, stTienda, stTrabajo, stFecha, stTienda_id, stAutorizado, stTrabajoRealizado, stEstado, stArchivado)
        mostrarModal(modalContent);
    }
    
    //EDICION DE ST SALDADOS
    //Boton para regresar a PRESALDOS
    function abrirModalSALDOS(stId, stFolio, stTienda, stTrabajo, stFecha, stTienda_id, stAutorizado, stTrabajoRealizado, stEstado, stArchivado  ) {
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
       
    
        <textarea class="chamito" id="trabajoedit" rows="4" name="trabajo" disabled>${stTrabajo}</textarea>
<br>
<div style=" width: 100%; display: flex;">
<div style=" width: 50%; ">
    <label for="tienda"> <strong>TRABAJO REALIZADO: </strong></label>
    <br>
    
    <h2>${stTrabajoRealizado ? '<span class="badge bg-dark"><i class="fa-solid fa-check"></i></span>' : '<span class="badge bg-danger"><i class="fa-solid fa-xmark"></i></span>'}</h2>



    </div>
    <div style=" width: 50%; ">
                <label for="trabajopresaldadoedit">
                    <h4>Regresar a presaldos:</h4>
                </label>
                <br>
                <label class="switch">
                    <input type="checkbox" name="trabajo_presaldado" id="trabajopresaldadoedit" ${stArchivado === '1' ? 'checked' : ''}>
                    <span class="slider"></span>
                </label>
            </div>
            </div>

<div class="text-center" style="margin-right: 100px; width: 100%; ">

    <img src="../assets/img/coppel.svg"  style="width: 60%; " alt="Descripción de la imagen SVG">
    </div>
     



    

            <div>
        
        </div>


</div>

<div style="width: 40%; padding: 3%">






<div style="max-width: 300px;">
            <label for="tienda"> <strong>EDITAR FOLIO </strong></label>
            <br>
            <input type="text" id="folioedit"  class="form-control" oninput="permitirSoloNumeros(this)" value="${stFolio}" disabled>
        </div>
        <div style="margin-right: 20px;">
    <label for="tienda"> <strong>FOLIO AUTORIZADO: </strong></label>
    <br>

    <h2>${stAutorizado ? '<span class="badge bg-dark"><i class="fa-solid fa-check"></i></span>' : '<span class="badge bg-danger"><i class="fa-solid fa-xmark"></i></span>'}</h2>


   
</div>




<label for="fecha"> <strong>EDITAR FECHA </strong></label>
                    <br>
                    <input type="date" id="fechaedit" value="${stFecha}" name="fecha" disabled>

                    <br>
      <div style=" margin-bottom: 20px;">
      <label for="fecha"> <strong>ESTADO PORTAL: </strong></label>
            <select name="estado" id="estadoedit" disabled>
                ${estados.map(element => `<option value="${element.value}" ${element.value==stEstado?'selected':null}>${element.label}</option>`).join('')}
            </select>
           



<br>
<br>

<div >
                 
                </div>

</div>


</div>




</div>


</div>
 
     
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-primary"onclick="editarStSaldo(${stId})">Guardar cambios</button>
</div>`;

    
    
    mostrarModal(modalContent);
    }
    
    
     






//modal ppto pdf 


function abrirModalPPTOPDF(stId, stFolio, stTienda,  stFecha, id_tienda, pdf_generador, pdf_plano, pdf_ppto ) {
  var modalContent = `    
    <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Subir archivos presupuesto de ST ${stTienda} con folio ${stFolio}</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <div class="d-flex justify-content-between">
            ${pdf_generador!='null' ? `
            <div class="file-upload-container text-center">
                <h5>PDF generador:</h5>
                <embed src="${pdf_generador}" type="application/pdf" width="100%" height="300px" />
            </div>` : 
            `
                <div class="file-upload-container text-center">
                    <div class="d-block" style="opacity: 0.8; margin:6%;">
                        <i class="fa-solid fa-arrow-up-from-bracket" style="font-size: 40px; margin-bottom:10%;"></i><br>
                        <label for="pdfGenerador">Subir archivo PDF generador:</label><br>
                    </div>
                    <input type="file" id="pdfGenerador" name="pdfGenerador" accept=".pdf">
                
            </div>`
            }
            ${pdf_plano !='null' ? `
            <div class="file-upload-container text-center">
                <h5>PDF plano:  </h5>
                <embed src="${pdf_plano}" type="application/pdf" width="100%" height="300px" />
            </div>` : 
            `
                <div class="file-upload-container text-center">
                    <div class="d-block" style="opacity: 0.8; margin:20%;">
                        <i class="fa-solid fa-arrow-up-from-bracket" style="font-size: 40px; margin-bottom:10%;"></i><br>
                        <label for="pdfPlano">Subir archivo PDF plano:</label><br>
                    </div>
                    <input type="file" id="pdfPlano" name="pdfPlano" accept=".pdf">
                
            </div>`
            }
            ${pdf_ppto !='null' ? `
            <div class="file-upload-container text-center">
                <h5>PDF presupuesto: ${pdf_ppto}</h5>
                <embed src="${pdf_ppto}" type="application/pdf" width="100%" height="300px" />
            </div>` : 
            `
                <div class="file-upload-container text-center">
                    <div class="d-block" style="opacity: 0.8; margin:6%;">
                        <i class="fa-solid fa-arrow-up-from-bracket" style="font-size: 40px; margin-bottom:10%;"></i><br>
                        <label for="pdfPpto">Subir archivo PDF presupuesto:</label><br>
                    </div>
                    <input type="file" id="pdfPpto" name="pdfPpto" accept=".pdf">
                </div>
           `
            }
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" onclick="subirArchivosPPTO(${stId}, ${id_tienda})">Subir</button>
    </div>`;



  mostrarModali(modalContent);
}



function abrirModalFACTURAPDF(stId, stFolio, stTienda,  stFecha, id_tienda, xml, pdf_factura ) {
  var modalContent = `    
  <div class="modal-header">
    <h3 class="modal-title" id="exampleModalLabel">Subir archivos factura  de ST ${stTienda} con folio ${stFolio}</h3>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="d-flex justify-content-between">
        <div class="file-upload-container text-center">
            <div class="d-block" style="opacity: 0.8; margin:6%;">
                <i class="fa-solid fa-arrow-up-from-bracket" style="font-size: 40px;"></i><br>
                <label for="xmlFile">Subir archivo XML:</label><br>
            </div>
            <input type="file" id="xmlFile" name="xmlFile" accept=".xml">
        </div>
        <div class="file-upload-container text-center">
            <div class="d-block" style="opacity: 0.8; margin:6%;">
                <i class="fa-solid fa-arrow-up-from-bracket" style="font-size: 40px;"></i><br>
                <label for="pdfFile">Subir archivo PDF factura:</label><br>
                <p>${pdf_factura}</p>
                <p>${xml}</p>
               
            </div>
            <input type="file" id="pdfFile" name="pdfFile" accept=".pdf">
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-success" onclick="subirArchivosFACTURA(${stId}, ${id_tienda})">Subir</button>
</div>

`;


  mostrarModali(modalContent);
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




function mostrarModali(content) {
var modalElement = document.getElementById('exampleModali');
var modalBody = modalElement.querySelector('.modal-content');
modalBody.innerHTML = content;

// Abre el modal
var modal = new bootstrap.Modal(modalElement);
modal.show();
}



function cerrarModali() {
   var modalElement = document.getElementById('exampleModali');
   var modal = bootstrap.Modal.getInstance(modalElement);
   modal.hide();
}

function editarSt(stId) {



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

}



function editarStPresaldo(stId) {



var e1 = document.getElementById('folioedit').value;
   var e2 = document.getElementById('estadoedit').value;
var e3 = document.getElementById('folioautorizadoedit').checked;
   var e4 = document.getElementById('trabajoautorizadoedit').checked;
   var e7 = document.getElementById('trabajosaldadoedit').checked;
 var e5 = document.getElementById('trabajoedit').value;
  var e6 = document.getElementById('fechaedit').value;  


console.log(e1, e2, e3, e4, e5, e6);

$.ajax({
url: '../actions/update_st_presaldos.php', 
method: 'POST',
data: {id:stId, Folio: e1, Estado: e2, FolioAutorizado:e3 , TrabajoAutorizado:e4, TrabajoArchivado:e7, NewTrabajo: e5, NewFecha:e6 }, // Datos que se enviarán al servidor
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

}


function editarStSaldo(stId) {

   var e7 = document.getElementById('trabajopresaldadoedit').checked;
 

$.ajax({
url: '../actions/update_st_saldos.php', 
method: 'POST',
data: {id:stId, TrabajoArchivado:e7 }, // Datos que se enviarán al servidor
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



}



function eliminarSt(stId) {


$.ajax({
url: '../actions/delete_st.php', // Ruta a tu script PHP
method: 'POST',
data: { stId: stId }, // Datos que se enviarán al servidor
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





function subirArchivosPPTO(stId, id_tienda) {
    var formData = new FormData();
    formData.append('id', stId); // Agrega el id al FormData
    formData.append('id_tienda', id_tienda); // Agrega el id al FormData

    formData.append('pdf_generador', document.getElementById('pdfGenerador').files[0]);
formData.append('pdf_plano', document.getElementById('pdfPlano').files[0]);
formData.append('pdf_ppto', document.getElementById('pdfPpto').files[0]);

    $.ajax({
        url: '../actions/upload_ppto.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Aquí puedes manejar la respuesta del servidor
            console.log('test:', response);
            cerrarModali();
            location.reload();
        },
        error: function(xhr, status, error) {
            // Manejar errores
            console.error(error);
        }
    });
}




function subirArchivosFACTURA(stId, id_tienda) {
    var formData = new FormData();
    formData.append('id', stId); // Agrega el id al FormData
    formData.append('id_tienda', id_tienda); // Agrega el id al FormData

    formData.append('pdf_factura', document.getElementById('pdfFile').files[0]);
formData.append('xml', document.getElementById('xmlFile').files[0]);


    $.ajax({
        url: '../actions/upload_facturas.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Aquí puedes manejar la respuesta del servidor
            console.log('test:', response);
            cerrarModali();
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


</script>


 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>