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
            <a class="nav-link active" aria-current="page" href="#">INICIO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="filtros.php">FILTROS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="presaldos.php">PRESALDOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="agregar.php">AGREGAR <strong> +</strong></a>
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











    <div class="content">




    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
 
    <div class="carousel-item active" data-bs-interval="10000">
     

    <div style="display: flex; flex-direction: row; align-items: center;">
    <div style="margin-right: 10px;">
        <h3>Region IXTAPALUCA CDMX</h3>
    </div>
    <div>
        <button class="btn btn-dark btn-sm" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
</div>


 

<div id="contenedor">
    <div>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">FOLIO</th>
      <th scope="col">TIENDA</th>
      <th scope="col">TRABAJO A REALIZAR</th>
      <th scope="col">FECHA</th>
      <th scope="col">Editar</th>

    </tr>
  </thead> 
  <tbody>


<?php
foreach ($Stfirst as $sts) {
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
?>

   
  </tbody>
</table>

                                              </div>


                                              <div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">FOLIO</th>
      <th scope="col">TIENDA</th>
      <th scope="col">TRABAJO A REALIZAR</th>
      <th scope="col">FECHA</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php 
foreach ($StSecond as $sts) {
  echo '<tr>';
  echo '<td scope="row">';
  echo $sts['autorizado'] ? 
  '<span class="badge bg-success rounded-pill"> ' . $sts['folio'] . '</span>' : 
  '<span class="badge rounded-pill bg-light text-dark">' . $sts['folio'] . '</span>';
  echo '</td>';
  echo '<td>' . $sts['nombre_tienda'] . '</td>';
  echo '<td>';
  echo $sts['trabajo_realizado'] ? 
  '<span class="badge bg-success rounded-pill"> ' . $sts['trabajo'] . '</span>' : 
  '<span class="badge rounded-pill bg-light text-dark">' . $sts['trabajo'] . '</span>';
  echo '</td>';
  echo '<td>' . $sts['fecha'] . '</td>';
  echo '<td> <button type="button" class="btn btn-warning" onclick="abrirModal(' . $sts['id'] . ', \'' . $sts['folio'] . '\', \'' . $sts['nombre_tienda'] . '\', \'' . $sts['trabajo'] . '\', \'' . $sts['fecha'] . '\',   \'' . $sts['id_tienda'] . '\',   \'' . $sts['autorizado'] . '\',   \'' . $sts['trabajo_realizado'] . '\',  \'' . $sts['estado_portal'] . '\')"><i class="fa-solid fa-pen"></i></button></td>';
  echo '</tr>';
}
?>
    </tr>
   
  </tbody>
</table>

                                           </div>
                                           <div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">FOLIO</th>
      <th scope="col">TIENDA</th>
      <th scope="col">TRABAJO A REALIZAR</th>
      <th scope="col">FECHA</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php 
foreach ($StThird as $sts) {
  echo '<tr>';
  echo '<td scope="row">';
  echo $sts['autorizado'] ? 
  '<span class="badge bg-success rounded-pill" >' . $sts['folio'] . '</span>' : 
  '<span class="badge rounded-pill bg-light text-dark">' . $sts['folio'] . '</span>';
  echo '</td>';
  echo '<td>' . $sts['nombre_tienda'] . '</td>';
  echo '<td>';
  echo $sts['trabajo_realizado'] ? 
  '<span class="badge bg-success rounded-pill"> ' . $sts['trabajo'] . '</span>' : 
  '<span class="badge rounded-pill bg-light text-dark">' . $sts['trabajo'] . '</span>';
  echo '</td>';
  echo '<td>' . $sts['fecha'] . '</td>';
  echo '<td> <button type="button" class="btn btn-warning" onclick="abrirModal(' . $sts['id'] . ', \'' . $sts['folio'] . '\', \'' . $sts['nombre_tienda'] . '\', \'' . $sts['trabajo'] . '\', \'' . $sts['fecha'] . '\',   \'' . $sts['id_tienda'] . '\',   \'' . $sts['autorizado'] . '\',   \'' . $sts['trabajo_realizado'] . '\',  \'' . $sts['estado_portal'] . '\')"><i class="fa-solid fa-pen"></i></button></td>';
  echo '</tr>';
}
?>
    </tr>
   
  </tbody>
</table>

                                            </div>








                                            </div>

</div>


<div class="carousel-item" data-bs-interval="10000">
  
    

<div style="display: flex; flex-direction: row; align-items: center;">
    <div style="margin-right: 10px;">
    <h3>Region IXTAPALUCA FORANEOS</h3>
    </div>
    <div>
        <button class="btn btn-dark btn-sm" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
</div>




   

    <div id="contenedor">
                                              <div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">FOLIO</th>
      <th scope="col">TIENDA</th>
      <th scope="col">TRABAJO A REALIZAR</th>
      <th scope="col">FECHA</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
foreach ($Stfirstx as $sts) {
  echo '<tr>';
  echo '<td scope="row">';
  echo $sts['autorizado'] ? 
    '<span class="badge bg-success rounded-pill"> ' . $sts['folio'] . '</span>' : 
    '<span class="badge rounded-pill bg-light text-dark">' . $sts['folio'] . '</span>';
  echo '</td>';
  echo '<td>' . $sts['nombre_tienda'] . '</td>';
  echo '<td>';
  echo $sts['trabajo_realizado'] ? 
  '<span class="badge bg-success rounded-pill"> ' . $sts['trabajo'] . '</span>' : 
  '<span class="badge rounded-pill bg-light text-dark">' . $sts['trabajo'] . '</span>';
  echo '</td>';
  echo '<td>' . $sts['fecha'] . '</td>';
  echo '<td> <button type="button" class="btn btn-warning" onclick="abrirModal(' . $sts['id'] . ', \'' . $sts['folio'] . '\', \'' . $sts['nombre_tienda'] . '\', \'' . $sts['trabajo'] . '\', \'' . $sts['fecha'] . '\',   \'' . $sts['id_tienda'] . '\',   \'' . $sts['autorizado'] . '\',   \'' . $sts['trabajo_realizado'] . '\',   \'' . $sts['estado_portal'] . '\')"><i class="fa-solid fa-pen"></i></button></td>';
  echo '</tr>';
}
?>
    
   
  </tbody>
</table>

                                              </div>


                                              <div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">FOLIO</th>
      <th scope="col">TIENDA</th>
      <th scope="col">TRABAJO A REALIZAR</th>
      <th scope="col">FECHA</th>
    </tr>
  </thead>
  <tbody>
    
    <?php 
foreach ($StSecondx as $sts) {
  echo '<tr>';
  echo '<td scope="row">';
  echo $sts['autorizado'] ? 
    'badge bg-success rounded-pill" >' . $sts['folio'] . '</span>' : 
    '<span class="badge rounded-pill bg-light text-dark">' . $sts['folio'] . '</span>';
  echo '</td>';
  echo '<td>' . $sts['nombre_tienda'] . '</td>';
  echo '<td>';
  echo $sts['trabajo_realizado'] ? 
  '<span class="badge bg-success rounded-pill"> ' . $sts['trabajo'] . '</span>' : 
  '<span class="badge rounded-pill bg-light text-dark">' . $sts['trabajo'] . '</span>';
  echo '</td>';
  echo '<td>' . $sts['fecha'] . '</td>';
  echo '<td> <button type="button" class="btn btn-warning" onclick="abrirModal(' . $sts['id'] . ', \'' . $sts['folio'] . '\', \'' . $sts['nombre_tienda'] . '\', \'' . $sts['trabajo'] . '\', \'' . $sts['fecha'] . '\',   \'' . $sts['id_tienda'] . '\',   \'' . $sts['autorizado'] . '\',   \'' . $sts['trabajo_realizado'] . '\',  \'' . $sts['estado_portal'] . '\')"><i class="fa-solid fa-pen"></i></button></td>';
  echo '</tr>';
}
?>
    </tr>
   
  </tbody>
</table>

                                           </div>
                                           <div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">FOLIO</th>
      <th scope="col">TIENDA</th>
      <th scope="col">TRABAJO A REALIZAR</th>
      <th scope="col">FECHA</th>
    </tr>
  </thead>
  <tbody>
    <?php 
foreach ($StThirdx as $sts) {
  echo '<tr>';
  echo '<td scope="row">';
  echo $sts['autorizado'] ? 
  '<span class="badge bg-success rounded-pill" >' . $sts['folio'] . '</span>' : 
  '<span class="badge rounded-pill bg-light text-dark">' . $sts['folio'] . '</span>';
  echo '</td>';
  echo '<td>' . $sts['nombre_tienda'] . '</td>';
  echo '<td>';
  echo $sts['trabajo_realizado'] ? 
  '<span class="badge bg-success rounded-pill"> ' . $sts['trabajo'] . '</span>' : 
  '<span class="badge rounded-pill bg-light text-dark">' . $sts['trabajo'] . '</span>';
  echo '</td>';
  echo '<td>' . $sts['fecha'] . '</td>';
  echo '<td> <button type="button" class="btn btn-warning" onclick="abrirModal(' . $sts['id'] . ', \'' . $sts['folio'] . '\', \'' . $sts['nombre_tienda'] . '\', \'' . $sts['trabajo'] . '\', \'' . $sts['fecha'] . '\',   \'' . $sts['id_tienda'] . '\',   \'' . $sts['autorizado'] . '\',   \'' . $sts['trabajo_realizado'] . '\',  \'' . $sts['estado_portal'] . '\')"><i class="fa-solid fa-pen"></i></button></td>';
  echo '</tr>';
}
?>
   
  </tbody>
</table>

                                            </div>








                                            </div>


</div>

</div>
</div>



















<!-- una tabla usa st con menos de 10 dias, otro mayor 10 a 15 dias , otro mas de 15 a 21 dias  -->
<!-- Contenido del dashboard   ZONA, ST, TIENDA,TRABAJO A REALIZAR, FECHA SOLICITUD, PORTAL(PENDIENTE, ACEPTADO, PEDIR PRESALDO, PEDIR CANCELADO,REVISADO), ESTADO(SE SOLICITA CANCELAR ST, TRABAJO REALIZADO-FALTA PPTO, FALTA REALIZAR TRABAJO-FALTA PPTO, FALTA REALIZAR TRABAJO, FALTA PPTO -->



   
    
 
      
  

    
    <!-- <button class="btn btn-primary btn-floating" data-toggle="tooltip" data-placement="top" title="Agregar">
    <i class="bi bi-plus-lg bi-3x "></i>
    </button> -->
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






<script>
    const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})
</script>

<script>


const estados = [
  { value: 'STANDBY', label: '--' },
  { value: 'PENDIENTE', label: 'PENDIENTE' },
  { value: 'REVISADO', label: 'REVISADO' },
  { value: 'PRESUPUESTADO', label: 'PRESUPUESTADO' },
  { value: 'ACEPTADO', label: 'ACEPTADO' },
  { value: 'CANCELADO', label: 'CANCELADO' }
];


function abrirModal(stId, stFolio, stTienda, stTrabajo, stFecha, stTienda_id, stAutorizado, stTrabajoRealizado, stEstado ) {
       
       var modalContent = `    
       <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Editar ST</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div id="modal_dashboard_content" style="display:flex; justify-content: space-between; text-align: center; margin: auto; width: 100%;">
        <div>
            <h4> <span class="badge bg-secondary"> ${stFolio === "0000" ? 'SIN FOLIO' : stFolio} </span>  </h4>
        </div>
        <div>
            <h4><span class="badge bg-secondary"> ${stTienda}</span>   </h4>
        </div>
        <div>
            <h4><span class="badge bg-secondary">${stFecha}</span>  </h4>
        </div>
    </div>
    <div id="modalform" style="background-color:#CFD2CF;">

            <div>
                <label for="tienda">EDITAR FOLIO</label>
                <br>
                <input type="text" id="folioedit" class="form-control" oninput="permitirSoloNumeros(this)" value="${stFolio}">
            </div>



            <div>
                <label for="fecha">ESTADO PORTAL:</label>
                

                <select name="estado" id="estadoedit">
  ${estados.map(element => `<option value="${element.value}"  ${element.value==stEstado?'selected':null}>${element.label}</option>`).join('') }
</select>
            </div>

            

          

            <div style="display: flex; flex-direction: row; align-items: center; margin-bottom: 20px;">
    <div style="margin-right: 20px;">
        <label for="tienda">FOLIO AUTORIZADO:</label>
        <br>
        <label class="switch">
            <input type="checkbox" name="folio_autorizado" id="folioautorizadoedit"  ${stAutorizado === '1' ? 'checked' : null}>
            <span class="slider"></span>
        </label>
    </div>

    <div style="margin-right: 100px;">
        <label for="tienda">TRABAJO AUTORIZADO:</label>
        <br>
        <label class="switch">
            <input type="checkbox" name="trabajo_realizado" id="trabajoautorizadoedit"  ${stTrabajoRealizado === '1' ? 'checked' : ''} >
            <span class="slider"></span>
        </label>
    </div>
</div>




<div   style="display:block; text-align: center; margin: auto; width: 100%;  background-color:#CFD2CF;">

<div style="display: flex; flex-direction: row; align-items: center; margin-bottom: 20px;">
    <div style="margin-right: 20px;">
    <p>

<button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">EDITAR ST</button>
</p>
    </div>
    <div style="margin: 50px, 50px;">

    <p>

    <button class="btn btn-danger" type="button" onClick="eliminarSt(${stId})"  >ELIMINAR ST</button>
</p>
    </div>

    </div>



    <div class="collapse" id="collapseExample">
             <div class="card card-body"   style="background-color:#CFD2CF;">


             <label for="fecha">EDITAR TRABAJO</label>
<br>
<textarea id="trabajoedit" name="trabajo" required>${stTrabajo}</textarea>


                <br>

       

                <label for="fecha">EDITAR FECHA</label>
                <br>
        <input type="date" id="fechaedit" value="${stFecha}" name="fecha" required>

               

            </div>
    </div>
</div>
</div>
    </div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-primary" onclick="editarSt(${stId})">Guardar cambios</button>
</div>`;

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



function cerrarModal() {
        var modalElement = document.getElementById('exampleModal');
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

 
console.log(e1, e2, e3, e4, e5, e6);

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





function permitirSoloNumeros(elemento) {
    elemento.value = elemento.value.replace(/[^0-9]/g, '');
}








</script>





<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 
 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>





