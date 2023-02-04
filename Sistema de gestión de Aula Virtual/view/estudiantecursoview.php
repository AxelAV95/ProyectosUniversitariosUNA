<?php 

date_default_timezone_set('America/Costa_Rica');
include '../business/cursobusiness.php';
include '../business/estudiantebusiness.php';
include '../business/profesorbusiness.php';
if(isset($_GET['cursoid']) && isset($_GET['profesorid'])){
	$cursoid = $_GET['cursoid'];
	$profesorid = $_GET['profesorid'];
}


?>
<?php 
include 'modulos/sesion.php';

$cursoBusiness = new CursoBusiness();
$profesorBusiness = new ProfesorBusiness();
$cursoDatos = $cursoBusiness->obtenerCurso($cursoid);
$estudianteBusiness = new EstudianteBusiness();
$asignaciones = $estudianteBusiness->obtenerAsignacionesCursoEstudiante($cursoid, $profesorid);

?>
<!doctype html>
<html lang="en">
<head>
	<title>Aula Virtual - Inicio</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="images/camps.png">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
	<link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<link rel="stylesheet" href="plugins/toastr/toastr.min.css">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.css" />
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
	<style>
		


	</style>

</head>
<body>

	<div class="wrapper d-flex align-items-stretch ">

		<?php include 'modulos/estudiante/sidebarestudiantecurso.php' ?>



		<div id="content" class="p-4 p-md-5 pt-5 ">

			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="estudianteinicioview.php">Cursos</a></li>
					<li class="breadcrumb-item">Año: <?php echo date("Y") ?></li>
					<li class="breadcrumb-item"><?php echo $cursoDatos[0]['cursonombre'] ?></li>
					<li class="breadcrumb-item"><a href="estudiantecursoview.php?cursoid=<?php echo $cursoid ?>&profesorid=<?php echo $profesorid ?>">Mis asignaciones</a></li>
					
				</ol>
			</nav>



			<div class="card-body">
				<table id="asignacionesestudiantes" class="tabla-asige table table-bordered table-hover">
					<thead>
						<tr>
							<th>Fecha de entrega</th>
							<th>Descripción</th>
							<th>Tiempo restante</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>

						<?php 
						
						foreach ($asignaciones as $asignacion) {
							echo '<tr>';
							echo '<td>'.$asignacion['asignacionfecha'].'</td>';
							echo '<td>'.$asignacion['asignaciondescripcion'].'</td>';
							echo '<td>';

							echo $profesorBusiness->obtenerTiempoRestanteAsignacion($asignacion['asignacionid'],date('d-m-y'));
							


							echo '</td>';
							echo '<td>';
							echo "<div class='btn-group'>";

							if(strpos($profesorBusiness->obtenerTiempoRestanteAsignacion($asignacion['asignacionid'],date('d-m-y')), 'Atrasada por') !== false){
								echo "<a class='btn btn-info' href='".$asignacion['asignacionruta']."' target='_blank' ata-toggle='tooltip' data-placement='top' title='Descargar'><i class='fas fa-download'></i></a>";
								echo "<a class='btn btn-primary' href='estudianteasignacionview.php?asignacionid=".$asignacion['asignacionid']."&cursoid=".$cursoid."&profesorid=".$profesorid."&vencida=1' data-toggle='tooltip' data-placement='top' title='Subir asignación'><i class='fas fa-file-upload'></i></a>";
							
							}else{
								echo "<a class='btn btn-info' href='".$asignacion['asignacionruta']."' target='_blank' ata-toggle='tooltip' data-placement='top' title='Descargar'><i class='fas fa-download'></i></a>
							<a class='btn btn-primary' href='estudianteasignacionview.php?asignacionid=".$asignacion['asignacionid']."&cursoid=".$cursoid."&profesorid=".$profesorid."' data-toggle='tooltip' data-placement='top' title='Subir asignación'><i class='fas fa-file-upload'></i></a>";
							}					
							echo "</div>";
							echo '</td>';
							echo '</tr>';
						}

						?>

					</tbody>

				</table>
			</div>

		</div>




	</div>

	<div id="modalAgregarCalificacion" class="modal fade" role="dialog">

		<div class="modal-dialog">

			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">Agregar calificación</h4>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<i class="fas fa-exclamation-circle float-right" id="consultarRubros" cursoid="<?php echo $cursoid ?>" style="font-size: 1rem; cursor: pointer;" data-toggle="Consultar rubros de curso" data-placement="top" title="Consultar rubros de curso"> </i>
					<div class="box-body">

						<form method="POST" id="calificarForm" action="../business/profesoraction.php" >

							<input type="hidden" name="cursoid" id="cursoid">
							<input type="hidden" name="profesorid" id="profesorid">
							<input type="hidden" name="estudianteid" id="estudianteid">
							<input type="hidden" name="ciclo" id="ciclo">
							<input type="hidden" name="anio" id="anio">
							<input type="hidden" name="tipoRubro" id="tipoRubro">
							<input type="hidden" name="asignacionid" id="asignacionid" value="<?php echo $asignacionid ?>">
							<input type="hidden" name="actualizarPorcentaje" id="actualizarPorcentaje" value="actualizarPorcentaje">

							<div class="form-group">
								<label >Rubro:</label>
								<select class="form-control" name="rubrocalificacion" id="rubrocalificacion" style="border: 1px solid #D3D3D3;">
									<option value="0">Seleccione un rubro</option>
									<option value="1">Examen 1</option>
									<option value="2">Examen 2</option>
									<option value="3">Examen 3</option>
									<option value="4">Tarea 1</option>
									<option value="5">Tarea 2</option>
									<option value="6">Prueba 1</option>
									<option value="7">Prueba 2</option>

								</select>						
							</div>

							<div class="form-group">
								<label>Porcentaje:</label>
								<input type="number"  min="0" max="100" class="form-control" name="rubronota" id="rubronota" placeholder="Nota de la asignación" style="border: 1px solid #D3D3D3;">
							</div>

							<center>
								<div class="form-group">
									<button  type="submit" id="botonCalificar" class="btn btn-primary ">Calificar</button>
								</div>
							</center>
					</form>

				</div>

			</div>

		</div>
	</div>



</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>



<?php 
  //ALERTAS
echo '<script>';

if($_GET['mensaje']==1){
	echo "$.jGrowl('Asignación agregada con éxito',{theme: 'changeCount'});";
}else if($_GET['mensaje']==2){
	echo "$.jGrowl('Asignación calificada con éxito',{theme: 'changeCount'});";
}else if($_GET['mensaje'] == 3){
	echo "$.jGrowl('Asignación eliminada con éxito',{theme: 'changeCount'});";
}else if($_GET['mensaje'] == 4){
	echo " $.jGrowl('Error al efectuar el proceso',{theme: 'changeCount'});";
}
echo "</script>";

?>

<script>
	$(function () {

		$('#asignacionesestudiantes').DataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
			},
			"paging": true,
			"lengthChange": false,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>

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
     

  			if($("#fechaasignacion").val() == ""){
  				e.preventDefault();

  				$.jGrowl('Debe agregar una fecha de entrega',{theme: 'changeCount'});
  				$("#fechaasignacion").focus();
  			}else if($("#asignaciondescripcion").val() == ""){
  				e.preventDefault();

  				$.jGrowl('Debe agregar una descripción',{theme: 'changeCount'});
  				$("#asignaciondescripcion").focus();
  			}else{
  				e.preventDefault();
  				e.stopPropagation();
  				myDropzone.processQueue();

  			}
  			
  		});
  		this.on("addedfile", file => {
  			//alert("A file has been added");
  		});
  		this.on("sending", function(file, xhr, formData) {
  			formData.append("cursoid",$("#cursoid").val());
  			formData.append("profesorid",$("#profesorid").val());
  			formData.append("asignaciondescripcion",$("#asignaciondescripcion").val());
  			formData.append("fechaasignacion",$("#fechaasignacion").val());
  			formData.append("agregarAsignacion",$("#agregarAsignacion").val());

  			for (var key of formData.entries()) {
  				console.log(key[0] + ', ' + key[1]);
  			}
    		
  		})

  		this.on("queuecomplete", function() {

  			$.jGrowl('Asignación agregada con éxito',{theme: 'changeCount'});
  			window.location.href = "profesorasignacionview.php?cursoid="+$("#cursoid").val()+"&mensaje=1";
  		})
  		document.querySelector(".cancel").onclick = function() {
  			myDropzone.removeAllFiles(true);
  		}
  	}

  };
  
</script>

<script>
	$(function () {

		$('#cursos').DataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
			},
			"paging": true,
			"lengthChange": false,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>

<script>
	var porcentaje = 0;
	var cursoid = 0;
	var profesorid = 0;
	var estudianteid = 0;
	var cursociclo = "";
	var cursoanio = 0;
	var rubro = 0;
	
	

	$(".tabla-asige tbody").on("click", "button.btnCalificarAsignacion", function(){
		//alert("siuu");

		cursoid = "<?php echo $cursoid; ?>";
		profesorid = $(this).attr("profesorid");
		estudianteid = $(this).attr("estudianteid");
		//alert(cursoid);
		$.ajax({
			url: '../business/cursoaction.php',
			type: 'post',
			data: {curso:cursoid, rubrosCurso:"rubrosCurso" },
			dataType: 'json',
			success:function(respuesta){
				rubros = respuesta;
				console.log(rubros);
			}

		});

		$.confirm({
			title: 'Seleccionar periodo',
			content: '' +
			'<form action="">' +
			'<div class="form-group">' +

			'<label >Ciclo:</label>' +
			'<select class="form-control cursociclo" name="cursociclo" id="cursociclo">'+
			'<option value="Ciclo I">Ciclo I</option>'+
			'<option value="Ciclo II">Ciclo II</option>'+
			'</select>'+
			'<label style="margin-top: 0.5rem;" >Año:</label>'+
			'<input type="number" name="cursoanio" class="cursoanio form-control" style="border: 1px solid #D3D3D3;" />'+

			'</div>' +
			'</form>',
			buttons: {
				formSubmit: {
					text: 'Continuar',
					btnClass: 'btn-blue',
					action: function () {
						cursociclo = this.$content.find('.cursociclo').val();
						cursoanio = this.$content.find('.cursoanio').val();
						if(!cursociclo || !cursoanio ){
							$.alert('Campos obligatorios');
							return false;
						}else{
							$('#modalAgregarCalificacion').modal('toggle');
							
							rubro = $("#rubrocalificacion option:selected").val();
							porcentaje = $("#rubronota").val();
							$('#modalAgregarCalificacion #cursoid').val(cursoid);
							$('#modalAgregarCalificacion #profesorid').val(profesorid);
							$('#modalAgregarCalificacion #estudianteid').val(estudianteid);
							$('#modalAgregarCalificacion #ciclo').val(cursociclo);
							$('#modalAgregarCalificacion #anio').val(cursoanio);
							$('#modalAgregarCalificacion #tipoRubro').val(rubro);
							

						}

					}
				},
				Cancelar: function () {
            //close
				},
			},
			onContentReady: function () {
        // bind to events
				var jc = this;
				this.$content.find('form').on('submit', function (e) {
            // if the user submits the form by pressing enter in the field.
					e.preventDefault();
            jc.$$formSubmit.trigger('click'); // reference the button and click it
          });
			}
		});
	});
</script>

<script>

	$("#rubrocalificacion").on("change",function(){
		$("#rubronota").val(0);
		
		$('#modalAgregarCalificacion #tipoRubro').val($("#rubrocalificacion option:selected").val());
	});

	var rubros = Array();
	$("#rubronota").on("change",function(){
		var opcion = $("#rubrocalificacion option:selected").val();
		console.log(rubros);
		console.log(opcion);
		if(opcion == 0){
			$.jGrowl('Debe seleccionar una opción válida',{theme: 'changeCount'});
			$("#rubrocalificacion option:selected").focus();
		}else if(opcion == 1){
			if( $(this).val() >=  parseInt(rubros[0]['epcexamen1']+1) ){
				$.jGrowl('El porcentaje ingresado es mayor al establecido.',{theme: 'changeCount'});
				$(this).val(0);
				$(this).focus();
			}
		}else if(opcion == 2){
			if($(this).val() >  parseInt(rubros[0]['epcexamen2'])){
				$.jGrowl('El porcentaje ingresado es mayor al establecido.',{theme: 'changeCount'});
				$(this).val(0);
				$(this).focus();
			}
		}else if(opcion == 3){
			if($(this).val() >  parseInt(rubros[0]['epcexamen3'])){
				$.jGrowl('El porcentaje ingresado es mayor al establecido.',{theme: 'changeCount'});
				$(this).val(0);
				$(this).focus();
			}
		}else if(opcion == 4){
			if($(this).val() > parseInt( rubros[0]['epctarea1'])){
				$.jGrowl('El porcentaje ingresado es mayor al establecido.',{theme: 'changeCount'});
				$(this).val(0);
				$(this).focus();
			}
		}else if(opcion == 5){
			if($(this).val() > parseInt( rubros[0]['epctarea2'])){
				$.jGrowl('El porcentaje ingresado es mayor al establecido.',{theme: 'changeCount'});
				$(this).val(0);
				$(this).focus();
			}
		}else if(opcion == 6){
			if($(this).val() > parseInt( rubros[0]['epcprueba1'])){
				$.jGrowl('El porcentaje ingresado es mayor al establecido.',{theme: 'changeCount'});
				$(this).val(0);
				$(this).focus();
			}
		}else if(opcion == 7){
			if($(this).val() > parseInt( rubros[0]['epcprueba2'])){
				$.jGrowl('El porcentaje ingresado es mayor al establecido.',{theme: 'changeCount'});
				$(this).val(0);
				$(this).focus();
			}
		}

		//hacer un ajax para verificar que en cuanto al tipo de rubro,
		//se debe hacer una consulta a la rubrica del curso para
		//verificar si el valor ingresado es mayor, si es mayor
		//mostrar un mensaje de que no está permitida tal cantidad
		//para este rubro
	});

	$("#consultarRubros").on("click",function(){

		var cursoid = $(this).attr("cursoid");
		//alert(cursoid);
		$.ajax({
			url: '../business/cursoaction.php',
			type: 'post',
			data: {curso:cursoid, rubrosCurso:"rubrosCurso" },
			dataType: 'json',
			success:function(respuesta){

				console.log(respuesta);				
				$.dialog({
					title: 'Rubros curso',
					content: 'Examen 1: '+respuesta[0]['epcexamen1']+"%<br>Examen 2: "+respuesta[0]['epcexamen2']+"%<br>Examen 3: "+respuesta[0]['epcexamen3']+"%<br>Tarea 1: "+respuesta[0]['epctarea1']+"%<br>Tarea 2: "+respuesta[0]['epctarea2']+"%<br>Prueba 1: "+respuesta[0]['epcprueba1']+"%<br>Prueba 2: "+respuesta[0]['epcprueba2']+"%"
				});
			}

		});

	})

</script>

<script type="text/javascript">
    $(document).ready(function () {
        var url = window.location;
        $('ul.menu-curso a[href="'+ url +'"]').parent().addClass('active');
        $('ul.menu-curso a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });
</script> 

</body>
</html>