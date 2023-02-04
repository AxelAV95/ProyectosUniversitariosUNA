<?php 
	
	

	$ds = DIRECTORY_SEPARATOR;  //1
	$rutaArchivo = "";
			$storeFolder = 'images/asignacionp';   //2
			
			if (!empty($_FILES)) {

			    $tempFile = $_FILES['file']['tmp_name'];          //3             

			    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4

			    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
			    $rutaArchivo = $targetPath. $_FILES['file']['name'];


			    move_uploaded_file($tempFile,$targetFile); //6

			}

	

?>
<link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
<link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<style>
	.dz-default {
		height: 200px;
		border: 2px dashed gray;
	}
	.dz-button{
		margin-top: 1rem;
	}
</style>

<div class="card text-center">
	
	<div class="card-body">
		
		<form action="subir.php" class="dropzone" id="asignacionForm">
			<input type="hidden" name="agregarAsignacion" id="agregarAsignacion" value="agregarAsignacion">

			<input type="hidden" name="profesorid" id="profesorid" value="<?php echo $_SESSION['profesorid'] ?>">
			<input type="hidden" name="cursoid" id="cursoid" value="<?php echo $cursoid ?>">
			<div class="form-group">
				<label>Fecha de entrega:</label>

				<input type="date" class="form-control" name="fechaasignacion" id="fechaasignacion" style="border: 1px solid #D3D3D3;" />

				<!-- /.input group -->
			</div>
			<div class="form-group">
				<label>Descripción</label>
				<input type="text" class="form-control" name="asignaciondescripcion" id="asignaciondescripcion" placeholder="Descripción de la asignacion" style="border: 1px solid #D3D3D3;">

			</div><br>
			<hr>
			<div class="btn-group w-100">

				<button type="submit" class="form-control btn btn-primary col text-light"  id="agregar">
 					<i class="fas fa-plus"></i>
					<span style="font-size: 16px;">Agregar</span> 
				</button>
				  <button type="reset" class="btn btn-secondary col cancel">
                        <i class="fas fa-times-circle"></i>
                        <span>Cancelar</span>
                      </button>
			</div>

				
		</form>
	</div>
</div>


    <script src="plugins/jquery/jquery.min.js"></script>
 <script src="plugins/dropzone/min/dropzone.min.js"></script>

<script>

	$( document ).ready(function() {
    $("<i class='fas fa-arrow-circle-down' style='font-size: 3rem; margin-top: 2rem;'></i><br>").insertBefore(".dz-button");
});
	
  
  Dropzone.options.asignacionForm = { // camelized version of the `id`
  	paramName: "file", 
  	dictDefaultMessage: 'Puede arrastrar y soltar archivos aquí para añadirlos',
  	maxFilesize: 2, 
  	method: "post",
  	autoProcessQueue: false,
  	maxFiles: 100,
  	init: function () {
  		var myDropzone = this;

  		this.element.querySelector("#agregar").addEventListener("click", function(e) {
      // Make sure that the form isn't actually being sent.
  			e.preventDefault();
  			e.stopPropagation();
  			myDropzone.processQueue();
  		});
  		this.on("addedfile", file => {
  			alert("A file has been added");
  		});
  		this.on("sending", function(file, xhr, formData) {
  			formData.append("cursoid",$("#cursoid").val());
  			formData.append("asignaciondescripcion",$("#asignaciondescripcion").val());
  			formData.append("fechaasignacion",$("#fechaasignacion").val());


  			for (var key of formData.entries()) {
  				console.log(key[0] + ', ' + key[1]);
  			}
    		//console.log(formData.entries());
  		})
  		document.querySelector(".cancel").onclick = function() {
  			myDropzone.removeAllFiles(true);
  		}
  	}

  };
  
</script>


