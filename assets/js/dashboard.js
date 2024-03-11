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
  
  
  