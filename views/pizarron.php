<?php
session_start();
include_once('../models/RegionModel.php');
include_once('../models/TiendaModel.php');
include_once('../models/StModel.php');
if (!isset($_SESSION['email'])) {
    header('Location: ../views/login.php'); 
    exit();
}


$tiendaModel = new TiendaModel();
$tiendas = $tiendaModel->getTiendas();

$ST = new StModel();
$STS = $ST->getSts();



 

//aqui uno
$last =  $ST->last();
$new =  $ST->new();




$regionModel = new RegionModel();
$regiones = $regionModel->getRegiones();
//aqui otro 

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/pizarron.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <meta http-equiv="refresh" content="60">

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
  
  <div class="p-2">
      <button  class="btn btn-dark" onclick="window.location.href='dashboard.php'"  type="button" >
      <i class="fa-solid fa-house"></i>  Inicio
    </button> 

    <button  id="toggleBtn" class="btn btn-dark btn-arrow" onclick="toggleNavbar()"  type="button" >
      <i class="fa-solid fa-circle-up"></i>
    </button> 
  </div>  
        
  <button class="reset-btn" onclick="resetNavbar()"><i class="fa-solid fa-circle-down"></i></button>
        
      </div>













    <div class="content">

    
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">

<div class="carousel-inner">

<?php
$firstRegion = true; 
foreach ($regiones as $region) {
  // Filtrar los elementos de la primera tabla
  $regionStfirstexample = array_filter($last, function($sts) use ($region) {
      return $sts['id_region_entienda'] == $region['id'];
  });

  // Filtrar los elementos de la segunda tabla 
  $regionStsecondexample = array_filter($new, function($sts) use ($region) {
      return $sts['id_region_entienda'] == $region['id'];
  });

  // Verificar si hay datos en alguna de las tablas
  if (!empty($regionStfirstexample) || !empty($regionStsecondexample)) {
      echo '<div class="carousel-item' . ($firstRegion ? ' active' : '') . '" data-bs-interval="10000">';
      $firstRegion = false;
      echo '<div style="display: flex; flex-direction: row; align-items: center;"> ';
      echo '  <div style="margin-right: 10px;">';
      echo ' <h2><span class="badge text-bg-dark"><i class="fa-solid fa-compass"></i> '.$region['nombre'].'</span></h2>';
      echo '</div>';
      echo '<div>';  
      echo '<button class="btn btn-dark btn-sm" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">';
      echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
      echo '</button>';
      echo '</div>';
      echo '</div>';
      echo '<div id="contenedor">';
      echo '<div>';
      echo '<table class="table">';
      echo '<thead>';
      echo '<tr  style="background-color: black; color: white;  text-align: center;">';
      echo '<th scope="col" style="background-color: black; color: white; text-align: center;"><i class="fa-solid fa-paperclip"></i> FOLIO</th>';
      echo '<th scope="col" style="background-color: black; color: white; text-align: center;"> <i class="fa-solid fa-store"></i></th>';
      echo '<th scope="col" style="background-color: black; color: white; text-align: center;">OBRA</th>';
      echo '<th scope="col" style="background-color: black; color: white; text-align: center;"><i class="fa-solid fa-calendar-days"></i></th>';
      echo '<th scope="col" style="background-color: black; color: white; text-align: center;">Editar</th>';
      echo '</tr>';
      echo ' </thead> ';
      echo '<tbody>';
      
      // Mostrar datos de la primera tabla si existen
      foreach ($regionStfirstexample as $sts) {
          // Código para mostrar los datos de la primera tabla
          echo '<tr>';
          echo '<td scope="row">';
          echo $sts['autorizado'] ? 
          '<span class="badge bg-success rounded-pill"> ' . $sts['folio'] . '</span>' : 
          '<span class="badge rounded-pill bg-light text-dark">' . $sts['folio'] . '</span>';
          echo '</td>';
          echo '<td>';
        
          echo $sts['estado_portal']=='STANDBY' ?   $sts['nombre_tienda']   : null;
        
          echo $sts['estado_portal']=='PENDIENTE' ?  
          '<span class="badge bg-warning text-dark rounded-pill "> '. $sts['nombre_tienda'] .  '</span>' : null;
        
          echo $sts['estado_portal']=='REVISADO' ?  
          '<span class="badge bg-dark rounded-pill "> '. $sts['nombre_tienda'] .  '</span>' : null;
        
        
          echo $sts['estado_portal']=='PRESUPUESTADO' ?  
          '<span class="badge bg-primary rounded-pill "> '. $sts['nombre_tienda'] .  '</span>' : null;
        
          echo $sts['estado_portal']=='CANCELADO' ?  
          '<span class="badge bg-danger rounded-pill "> '. $sts['nombre_tienda'] .  '</span>' : null;
        
        
          echo $sts['estado_portal']=='ACEPTADO' ?  
          '<span class="badge bg-success rounded-pill "> '. $sts['nombre_tienda'] .  '</span>' : null;
        
          echo '</td>';
        
          echo '<td class="scrolling-td" >';
          echo '<div class="single-line scrolling-text">';
          echo $sts['trabajo_realizado'] ? 
          '<span class="badge bg-success rounded-pill "> ' . $sts['trabajo'] . '</span>' : 
          '<span class="badge rounded-pill bg-light text-dark ">' . $sts['trabajo'] . '</span>';
          echo '</div>';
          echo '</td>';
          echo '<td>' . $sts['fecha'] . '</td>';
          
          echo '<td> <button type="button" class="btn btn-warning" onclick="abrirModal(' . $sts['id'] . ', \'' . $sts['folio'] . '\', \'' . $sts['nombre_tienda'] . '\', \'' . $sts['trabajo'] . '\', \'' . $sts['fecha'] . '\',   \'' . $sts['id_tienda'] . '\',   \'' . $sts['autorizado'] . '\',   \'' . $sts['trabajo_realizado'] . '\',  \'' . $sts['estado_portal'] . '\')"><i class="fa-solid fa-pen"></i></button></td>';
          echo '</tr>';
      }

      
      echo ' </tbody>';
      echo '</table>';
      echo ' </div>';
      echo '<div>';
      echo '<table class="table">';
      echo '<thead>';
      echo '<tr  style="background-color: black; color: white;  text-align: center;">';
      echo '<th scope="col" style="background-color: black; color: white; text-align: center;"> <i class="fa-solid fa-paperclip"></i> FOLIO </th>';
      echo '<th scope="col" style="background-color: black; color: white; text-align: center;"> <i class="fa-solid fa-store"></i></th>';
      echo '<th scope="col" style="background-color: black; color: white; text-align: center;">OBRA</th>';
      echo '<th scope="col" style="background-color: black; color: white; text-align: center;"><i class="fa-solid fa-calendar-days"></i></th>';
      echo '<th scope="col" style="background-color: black; color: white; text-align: center;">Editar</th>';
      echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
      
      // Mostrar datos de la segunda tabla si existen
      foreach ($regionStsecondexample as $sts) {
          // Código para mostrar los datos de la segunda tabla
           // Código para mostrar los datos de la segunda tabla
           echo '<tr>';
           echo '<td scope="row">';
           echo $sts['autorizado'] ? 
           '<span class="badge bg-success rounded-pill"> ' . $sts['folio'] . '</span>' : 
           '<span class="badge rounded-pill bg-light text-dark">' . $sts['folio'] . '</span>';
           echo '</td>';
           echo '<td>';
         
           echo $sts['estado_portal']=='STANDBY' ?   $sts['nombre_tienda']   : null;
         
           echo $sts['estado_portal']=='PENDIENTE' ?  
           '<span class="badge bg-warning text-dark rounded-pill "> '. $sts['nombre_tienda'] .  '</span>' : null;
         
           echo $sts['estado_portal']=='REVISADO' ?  
           '<span class="badge bg-dark rounded-pill "> '. $sts['nombre_tienda'] .  '</span>' : null;
         
         
           echo $sts['estado_portal']=='PRESUPUESTADO' ?  
           '<span class="badge bg-primary rounded-pill "> '. $sts['nombre_tienda'] .  '</span>' : null;
         
           echo $sts['estado_portal']=='CANCELADO' ?  
           '<span class="badge bg-danger rounded-pill "> '. $sts['nombre_tienda'] .  '</span>' : null;
         
         
           echo $sts['estado_portal']=='ACEPTADO' ?  
           '<span class="badge bg-success rounded-pill "> '. $sts['nombre_tienda'] .  '</span>' : null;
         
           echo '</td>';
         
           echo '<td class="scrolling-td" >';
           echo '<div class="single-line scrolling-text">';
           echo $sts['trabajo_realizado'] ? 
           '<span class="badge bg-success rounded-pill "> ' . $sts['trabajo'] . '</span>' : 
           '<span class="badge rounded-pill bg-light text-dark ">' . $sts['trabajo'] . '</span>';
           echo '</div>';
           echo '</td>';
           echo '<td>' . $sts['fecha'] . '</td>';
           
           echo '<td> <button type="button" class="btn btn-warning" onclick="abrirModal(' . $sts['id'] . ', \'' . $sts['folio'] . '\', \'' . $sts['nombre_tienda'] . '\', \'' . $sts['trabajo'] . '\', \'' . $sts['fecha'] . '\',   \'' . $sts['id_tienda'] . '\',   \'' . $sts['autorizado'] . '\',   \'' . $sts['trabajo_realizado'] . '\',  \'' . $sts['estado_portal'] . '\')"><i class="fa-solid fa-pen"></i></button></td>';
           echo '</tr>';
      }

      echo ' </tbody> ';
      echo '</table> ';
      echo '</div>';
      echo '</div>';
      echo '</div>';
  }
}
?>
</div>
</div>








</div>



</div>



<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-xl">
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





<!-- Modal -->
<div class="modal " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
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






<script src="../assets/js/pizarron.js" ></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 
 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>