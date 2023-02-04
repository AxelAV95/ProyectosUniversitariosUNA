
<?php 
include '../data/data.php';
if(isset($_GET['mensaje'])){
    $mensaje = $_GET['mensaje'];
 
  }



?>

<?php 

	//obtener datos del cliente
		$id = null;
         if ( !empty($_POST['id'])) {  //_GET
            $id = $_POST['id'];//_REQUEST
        }else{
        header("Location: clienteview.php");
        }
        
    if ( null==$id ) {
        header("Location: ../clienteview.php");
    } else {
        $pdo = Database::conectar();
        $pdo -> exec("set names utf8");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbcliente where clienteid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::desconectar();
    }


    $correo = $data['clientecorreo'];
    $cliente_info = $data['clientenombre']." ".$data['clienteapellido1']." ".$data['clienteapellido2'];
?>

<style type="text/css">
	
	.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btn {
  border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
  margin-bottom: 20px;
}



.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
</style>

<style type="text/css">

   /* The Modal (background) */
.modalemail {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
 
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content-email {

 background-color: white;

box-shadow: 6px 7px 25px 2px rgba(0,0,0,0.75);
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
  border-radius: 20px;
}

/* The Close Button */
.cerrar {
  color: black;
  float: right;
  font-size: 38px;
  font-weight: bold;
}

.cerrar:hover,
.cerrar:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

#contenedor-elementos{
	display: flex;
	flex-direction: column;
	padding: 20px 20px 20px 20px;
	justify-content: center;
	align-items: center;
}

.input-email{
	width: 50%;
	border-radius: 20px;
	box-shadow: 6px 7px 25px 2px rgba(0,0,0,0.29);
}

.area-mensaje{
	margin-bottom: 20px;
	height: 150px;
	width: 80%;
}

.enviar{
	margin-top: 20px;

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
    -moz-appearance: none;background: #333; font-size: 23px; font-weight: bolder;
	width: 30%;
}

   </style>

<!-- Modal content -->
  <div class="modal-content-email animated bounceInLeft">

  	<span class="cerrar" onclick="cerrar();">&times;</span>

  	

  		<form method="post" id="formulario-correo" enctype="multipart/form-data" action="script-correo.php">
  			<div id="contenedor-elementos">
  				<input type="hidden" name="cliente-info" value="<?php echo $cliente_info ?>">
  			

  			<label><h2 style="font-size: 25px;font-family: 'Quicksand';">Para:</h2></label>
  		<input style="text-align: center;font-size: 23px;"  required class="input-email" type="email" id="clientecorreo" name="clientecorreo" value="<?php echo $correo ?>">

  		<label style="text-align: left;"><h2 style="font-size: 25px;font-family: 'Quicksand';">De:</h2> </label>
		<input style="text-align: center;font-size: 23px;" required class="input-email" type="email" id="asadacorreo" name="asadacorreo" value="andrade.axel.21@outlook.es"> 

		<label><h2 style="font-size: 25px;font-family: 'Quicksand';">Asunto:</h2> </label>
		<input style="text-align: center;font-size: 23px;"  required class="input-email" type="text" name="asunto" >
 	

		<label><h2 style="font-size: 25px;font-family: 'Quicksand';">Mensaje:</h2> </label>
		<textarea style="border-radius: 20px;font-size: 23px;" class="area-mensaje" id="mensaje-correo" name="mensaje-correo" required></textarea>	

		<!---<input class="input-email" type="file" name="archivo" accept=".doc,.docx, .pdf" >---->

		<div class="upload-btn-wrapper">
  <button class="btn">Subir un archivo</button>
  <input style="font-size: 23px;" type="file" id="archivos" name="archivo[]" accept=".doc,.docx, .pdf" multiple/>
</div>
		


		<input  onclick="validarEmail(document.getElementById('clientecorreo'))" class="enviar" type="submit" name="enviarcorreo" value="Enviar correo">
		</div>
  			
  		</form>

  		
  	
    
    
    
  </div>

  <script type="text/javascript">
    function validarEmail( email ) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) )
        alert("Error: La dirección de correo " + email + " es incorrecta.");
}
  </script>


  

