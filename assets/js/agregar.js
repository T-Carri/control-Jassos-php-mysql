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

function convertirAMayusculas(elemento) {
    elemento.value = elemento.value.toUpperCase();
}