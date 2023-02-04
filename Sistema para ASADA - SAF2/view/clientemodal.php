<!-- The Modal -->
<div style="overflow:hidden; " id="myModal" class="modalInsertar" >

<!-- Modal content -->
<div class="modalInsertar-content  animated slideInDown" >
    <div id="titulo">
        <center><h1 id="title-modal">Registrar cliente</h1></center>
        <span class="close" style="font-size: 44px;">&times;</span>
    </div>
  
<form method="post" id="regForm" class="form-emp" action="../business/clienteaction.php">


      <input type="hidden" name="insertar" value="insertar">
      <!-- One "tab" for each step in the form: -->
      
      <label style="font-size: 27px;" id="label-modal">Datos personales: </label>

        <p><input required id="clientenombre" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)) || (event.charCode >= 192 && event.charCode <= 255)' type="text" name="clientenombre" placeholder="Nombre..." oninput="this.className = ''"></p>
              
              <p><input required onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)) || (event.charCode >= 192 && event.charCode <= 255)' id="clienteapellido1" type="text" data-validation="length" data-validation="required" data-validation-length="max29" data-validation-error-msg="Se aceptan máximo 30 caracteres" name="clienteapellido1" placeholder="Primer apellido..." oninput="this.className = ''"></p>
              <p><input required onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)) || (event.charCode >= 192 && event.charCode <= 255)' id="clienteapellido2" data-validation="length" data-validation="required" data-validation-length="max29" data-validation-error-msg="Se aceptan máximo 30 caracteres"  type="text" name="clienteapellido2" placeholder="Segundo apellido..." oninput="this.className = ''"></p>
              <p><input data-validation-error-msg="La longitud de la cédula debe ser 9 dígitos."  type="number" id="clientecedula" class="clientecedula" name="clientecedula" placeholder="Cédula..." oninput="this.className = ''"></p>
    

      <label id="label-modal">Contacto: </label>
        <p><input   id="clientecorreo"  name="clienteemail" type="email" placeholder="Correo..." oninput="this.className = ''"></p>
              <p><input id="clientetelefono" name="clientetelefono" type="number" placeholder="Teléfono..." oninput="this.className = ''"></p>
              <p><input data-validation-error-msg="Debe agregar una dirección o detalles del cliente" data-validation="required" name="clientedireccion" type="textarea" placeholder="Dirección o detalles del cliente..." oninput="this.className = ''"></p>
      

      <label id="label-modal">Datos de abonado: </label>
      
        <div style="display:flex;">
                <select required id="clientetipo" name="clientetipo" >
                        <option value="" disabled selected>Tipo de cliente</option>
                                  <option value="1">Emprego</option>
                                  <option value="2">Domipre</option>
                                  <option value="3">Prevista</option>
                                  
                                  </select>
                                  <i id="tipomensaje" style="font-size: 33px; margin-top: 5px; margin-left:20px;" class="fa fa-exclamation animated infinite tada" aria-hidden="true"></i>
                  </div>
                <div>
                  <select required name="clienteestado" >
                        <option value="" disabled selected>Estado</option>
                                  <option value="1">Activo</option>
                                  <option value="2">Suspendido</option>
                                  <option value="3">Otros</option>
                                  
                                  </select>
                                  
                  </div>
        <div style="display:flex; flex-direction: row;">
              <input data-validation-error-msg="Máximo 10 dígitos."  required data-validation="required"   id="clientemedidor" name="clientemedidor" type="number" placeholder="Medidor..." oninput="this.className = ''">
             <!-- <i style="font-size: 33px; margin-top: 5px; margin-left:20px;" class="fa fa-plus-square" aria-hidden="true"></i>---->
          </div>
          <div style="display:flex;">
        <input id="clientecasasenlazadas" required name="clientecasasenlazadas" type="number" placeholder="Recargo" oninput="this.className = ''"><i id="casasmensaje" style="font-size: 33px; margin-top: 5px; margin-left:20px;" class="fa fa-exclamation animated infinite tada" aria-hidden="true"></i>
        </div>
              
      

      <div style="overflow:auto; display: flex; justify-content: center;">
        <div style="margin-top: 10px;">
          
          <input type="submit" style="display: inline-block;
    border: none;
    border-radius: 10px;
    padding: 0.5rem 1.5rem;
    margin: 0;
    text-decoration: none;
    background: #0069ed;
    color: #ffffff;
    font-family: 'Quicksand', sans-serif;
    font-size: 1rem;
    cursor: pointer;
    text-align: center;
    transition: background 250ms ease-in-out, 
                transform 150ms ease;
    -webkit-appearance: none;
    -moz-appearance: none;background: #333; font-size: 23px; font-weight: bolder;" value="Insertar"/>
        </div>
      </div>

      

</form>

</div>

</div>



<script type="text/javascript">
  
  $( "#clientetipo" ).change(function() {
      //var d = $(this).children("option:selected").val();

      if($(this).children("option:selected").val()=='3'){
       // alert('Prevista seleccionado.');
        $("#clientemedidor").prop('disabled', true);
        $("#clientecasasenlazadas").prop('disabled', true);
      }
      //alert(d);
            
          
});
</script>