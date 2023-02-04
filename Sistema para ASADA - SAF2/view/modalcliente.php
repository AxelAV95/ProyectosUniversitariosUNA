<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/estilomodalmedicion.css">
</head>
<body>

<h2>Insercion de cliente</h2>

<!--<button onclick="document.getElementById('id').style.display='block'" style="width:auto;">INSERTAR</button>-->

<div id="id" class="modal">
  <span onclick="document.getElementById('id').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="../business/clienteaction.php">
    <div class="container">
      <h1>Insertar Cliente</h1>
      <p>Por favor rellene todos los campos</p>
      <hr>
      <label for="cedula"><b>Cedula</b></label>
      <input type="text" placeholder="Cedula aqui..." name="cedula" required>

      <label for="nomb"><b>Nombre</b></label>
      <input type="text" placeholder="Nombre aqui..." name="nomb" required>

      <label for="ape1"><b>Primer apellido</b></label>
      <input type="text" placeholder="Primer apellido aqui..." name="ape1" required>

      <label for="ape2"><b>Segundo apellido</b></label>
      <input type="text" placeholder="Segundo apellido aqui..." name="ape2" required>

      <label for="dire"><b>Direccion</b></label>
      <input type="text" placeholder="Direccion aqui..." name="dire" required>

      <label for="corr"><b>Correo</b></label>
      <input type="text" placeholder="Correo aqui..." name="corr" required>

      <label for="tele"><b>Telefono</b></label>
      <input type="text" placeholder="Telefono aqui..." name="tele" required>

      <label for="medi"><b>Medidor</b></label>
      <input type="text" placeholder="Medidor aqui..." name="medi" required>

      <label for="casas"><b>Casas a su nombre</b></label>
      <input type="text" placeholder="Casas aqui..." name="casas" required>

      <label for="propi"><b>Num. de propiedades</b></label>
      <input type="text" placeholder="Num. de propiedades aqui..." name="propi" required>

      <label for="tipo"><b>Tipo</b></label>
      <input type="text" placeholder="Tipo de cliente aqui..." name="tipo" required>


      
      <!--<label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>-->

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id').style.display='none'" class="cancelbtn">Cancelar</button>
        <button type="submit" class="signupbtn" value="Insertar" name="insertar" id="insertar">Hecho</button>
        <!--<button type="submit" class="signupbtn">Hecho</button>
        <input type="submit" value="Insertar" name="insertar" id="insertar"/>-->
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>