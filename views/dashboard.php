<?php
session_start();
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
$Stfirst =  $ST->getSts0To10Days();
$StSecond =  $ST->getSts10To15Days();
$StThird =  $ST->getSts15To21Days();

$Stfirstx =  $ST->getSts0To10Daysx();
$StSecondx =  $ST->getSts10To15Daysx();
$StThirdx =  $ST->getSts15To21Daysx();

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<style>

  .switch {
 --button-width: 3.5em;
 --button-height: 2em;
 --toggle-diameter: 1.5em;
 --button-toggle-offset: calc((var(--button-height) - var(--toggle-diameter)) / 2);
 --toggle-shadow-offset: 10px;
 --toggle-wider: 3em;
 --color-grey: #cccccc;
 --color-green: #8fce00;
    }

.slider {
 display: inline-block;
 width: var(--button-width);
 height: var(--button-height);
 background-color: var(--color-grey);
 border-radius: calc(var(--button-height) / 2);
 position: relative;
 transition: 0.3s all ease-in-out;
}

.slider::after {
 content: "";
 display: inline-block;
 width: var(--toggle-diameter);
 height: var(--toggle-diameter);
 background-color: #fff;
 border-radius: calc(var(--toggle-diameter) / 2);
 position: absolute;
 top: var(--button-toggle-offset);
 transform: translateX(var(--button-toggle-offset));
 box-shadow: var(--toggle-shadow-offset) 0 calc(var(--toggle-shadow-offset) * 4) rgba(0, 0, 0, 0.1);
 transition: 0.3s all ease-in-out;
}

.switch input[type="checkbox"]:checked + .slider {
 background-color: var(--color-green);
}

.switch input[type="checkbox"]:checked + .slider::after {
 transform: translateX(calc(var(--button-width) - var(--toggle-diameter) - var(--button-toggle-offset)));
 box-shadow: calc(var(--toggle-shadow-offset) * -1) 0 calc(var(--toggle-shadow-offset) * 4) rgba(0, 0, 0, 0.1);
}

.switch input[type="checkbox"] {
 display: none;
}

.switch input[type="checkbox"]:active + .slider::after {
 width: var(--toggle-wider);
}

.switch input[type="checkbox"]:checked:active + .slider::after {
 transform: translateX(calc(var(--button-width) - var(--toggle-wider) - var(--button-toggle-offset)));
}

.scrolling-text {
        white-space: nowrap;
        overflow: hidden;
        width: 500px; /* Ajusta el ancho según tus necesidades */
        animation: scrollText 15s linear infinite; /* Ajusta el tiempo según tus necesidades */
    }

    @keyframes scrollText {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    .scrolling-td {
        max-width: 200px; /* Ajusta el ancho según tus necesidades */
        overflow: hidden;
    }
</style>

<style>
        /* Ajusta los estilos según sea necesario */
        .content {
            display: flex;
            flex-wrap: wrap;
           
        }

        .content > div {
            flex: 0 0 48%; /* Tamaño de cada columna en desktop (48% para dos columnas) */
            margin-bottom: 5px;
        }

        @media (max-width: 767px) {
            /* Cambia el diseño a bloques en pantallas más pequeñas */
            .content {
                flex-direction: column;
            }

            .content > div {
                flex: 0 0 100%; /* Tamaño de cada columna en dispositivos móviles (100% para ocupar toda la pantalla) */
            }
        }
    </style>

<style>
    /* Estilo para la superposición */
    .position-relative {
        position: relative;
    }

    .overlay-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
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
  <div class="d-flex flex-row">
    <div class="p-2"><button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button></div>
    <div class="p-2">
      <button  class="btn btn-dark" onclick="window.location.href='agregar.php?componente=tiendas'"  type="button" >
      <i class="fa-solid fa-store"></i> Tiendas
    </button> 

    <button  class="btn btn-dark" onclick="window.location.href='agregar.php?componente=region'"  type="button" >
    <i class="fa-solid fa-compass"></i>  Regiones
    </button>
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
            <a class="nav-link active" aria-current="page" href="#"> <i class="fa-solid fa-house"></i>  DASHBOARD</a>
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
<div class="content mx-auto">
    <div class="col-12 col-md-8 position-relative" style="background-image: url('../assets/img/d0.jpg'); background-size: cover; background-position: center; height: 30em;">

        <!-- Texto en superposición -->
        <div class="overlay-text text-white text-center">
            <p style="font-size: 4em; ">Organizar, Agregar tiendas y regiones</p>
        </div>
    </div>





    <div class="col-12 col-md-4 m-4 p-2 position-relative">
        <div class="container row" onclick="window.location.href='pizarron.php'" style="background-image: url('../assets/img/d2.jpg'); background-size: cover; background-position: center; height: 250px; width: 70vh; border-radius: 40px;">
           

            
        </div>

        <div class="row justify-content-center m-4">
            <div class="col">
                <button type="button" onclick="window.location.href='presaldos.php'" class="btn btn-secondary btn-lg m-3" style="height: 6em "><i class="fa-solid fa-folder-open"></i> Presaldos</button>
                <button type="button" onclick="window.location.href='filtros.php'" class="btn btn-secondary btn-lg m-3" style="height: 6em"><i class="fa-solid fa-magnifying-glass"></i> Filtros, Búsquedas</button>
            </div>
        </div>
    </div>





</div>

<div class="btn-floating">
    <button class="btn-53" data-bs-toggle="modal" data-bs-target="#myModal">
  <div class="original" >+</div>
  <div class="letters">
    
    <span>+</span>
    <span>S</span>
    <span>T</span>
      </div>
</button>

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









<script src="../assets/js/dashboard.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>





