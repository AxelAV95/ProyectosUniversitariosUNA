<!-- The Modal -->
	<div id="myModal" class="modalInsertar" >

  	<!-- Modal content -->
  	<div class="modalInsertar-content  animated slideInDown" >
        <div id="titulo">
            <center><h1 id="title-modal">Registrar empleado</h1></center>
            <span class="close" style="font-size: 44px;">&times;</span>
        </div>
    	
    <form method="post" id="regForm" class="form-emp" action="../business/empleadoaction.php">


          <input type="hidden" name="insertar" value="insertar">
          <!-- One "tab" for each step in the form: -->
          <div class="tab"><label style="font-size: 27px;" id="label-modal">Datos personales: </label>

            <p><input id="empleadonombre" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' type="text" name="empleadonombre" placeholder="Nombre..." oninput="this.className = ''"></p>
                  
                  <p><input onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' id="empleadoapellido1" type="text" data-validation="length" data-validation="required" data-validation-length="max29" data-validation-error-msg="Se aceptan máximo 30 caracteres" name="empleadoapellido1" placeholder="Primer apellido..." oninput="this.className = ''"></p>
                  <p><input onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' id="empleadoapellido2" data-validation="length" data-validation="required" data-validation-length="max29" data-validation-error-msg="Se aceptan máximo 30 caracteres"  type="text" name="empleadoapellido2" placeholder="Segundo apellido..." oninput="this.className = ''"></p>
                  <p><input data-validation-error-msg="La longitud de la cédula debe ser 9 dígitos." data-validation="length" data-validation="required" data-validation-length="min6" type="number" id="empleadocedula" class="empleadocedula" name="empleadocedula" placeholder="Cédula..." oninput="this.className = ''"></p>
          </div>

          <div class="tab"><label id="label-modal">Contacto: </label>
            <p><input data-validation-error-msg="El correo ingresado no es válido."  id="empleadocorreo" data-validation="email" required name="empleadoemail" type="email" placeholder="Correo..." oninput="this.className = ''"></p>
                  <p><input data-validation-error-msg="La longitud del número de teléfono debe ser 8 dígitos." data-validation="length" data-validation="required" data-validation-length="min6" data-validation="number" id="empleadotelefono" name="empleadotelefono" type="number" placeholder="Teléfono..." oninput="this.className = ''"></p>
                  <p><input name="empleadodireccion" type="textarea" placeholder="Dirección..." oninput="this.className = ''"></p>
          </div>

          <div style="overflow:auto; display: flex; justify-content: center;">
            <div style="margin-top: 10px;">
              <button  type="button" style="background: #333; font-size: 23px; font-weight: bolder;" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
              <button type="button" style="background: #333; font-size: 23px; font-weight: bolder;" id="nextBtn"  onclick="nextPrev(1)">Siguiente</button>
            </div>
          </div>

          <!-- Circles which indicates the steps of the form: -->
          <div style="text-align:center;margin-top:24px;">
            <span class="step"></span>
            <span class="step"></span>
            
          </div>

    </form>
    
    </div>

	</div>