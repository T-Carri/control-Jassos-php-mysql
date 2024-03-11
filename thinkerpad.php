cabeza del carousel //html

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">

cuerpo //html

<div class="carousel-inner">


Giro // Posible iniciacion de etiqueta php
<?php
for each region {
    <div class="carousel-item active" data-bs-interval="10000">
    <div style="display: flex; flex-direction: row; align-items: center;"> 
    //Titulo
    <div style="margin-right: 10px;">
        <h3>{$NOMBREREGION}</h3>
    </div>

    //Boton acelerar region
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
    

    foreach ($StSecond as $sts) {
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


    
   
  </tbody>

</table>
</div>
   </div>






</div>
}

?>





</div>
</div>