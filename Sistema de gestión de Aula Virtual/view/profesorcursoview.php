<?php 

	include '../business/cursobusiness.php';
	include '../business/estudiantebusiness.php';

	if(isset($_GET['cursoid'])){
		$cursoid = $_GET['cursoid'];
	}

	include 'modulos/sesion.php';


	$cursoBusiness = new CursoBusiness();
	$estudianteBusiness = new EstudianteBusiness();
	$cursoDatos = $cursoBusiness->obtenerCurso($cursoid);
	$carreraid = $cursoDatos[0]['cursocarreraid'];
	$estudiantes = $cursoBusiness->obtenerEstudiantesCurso($_SESSION['profesorid'],$cursoid);
	

 ?>

<!doctype html>
<html lang="en">
<head>
	<title>Aula Virtual - Curso - Estudiantes</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="images/camps.png">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
	<link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<link rel="stylesheet" href="plugins/toastr/toastr.min.css">
	 <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.css" />
	 <link rel="stylesheet" href="css/main.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">


	<style>
		
		#estudiantes_filter input{
			border: 1px solid gray;
		}



	</style>
</head>
<body>

	<div class="wrapper d-flex align-items-stretch ">

		<?php include 'modulos/profesor/sidebarcursoprofesor.php' ?>
	

	<div id="content" class="p-4 p-md-5 pt-5 ">

	<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="profesorinicioview.php">Cursos</a></li>
				<li class="breadcrumb-item">Año: <?php echo date("Y") ?></li>
				<li class="breadcrumb-item"><?php echo $cursoDatos[0]['cursonombre'] ?></li>
			</ol>
		</nav>



		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-header">
						<button class="btn btn-primary btnAgregarEstudiante" data-toggle="modal" data-target="#modalAgregarEstudiante" style="margin-bottom: 1rem;">


			Agregar estudiantes

		</button>
				<span class="float-right badge bg-primary text-light" style="font-size: 16px;">Cupos disponibles: <?php echo $cursoBusiness->obtenerCupoCurso($cursoid)[0]['cursocupo']; ?></span>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="estudiantes" class="tabla-estudiantes table table-bordered table-hover">
							<thead>
								<tr>
									<th>Estudiante</th>
									<th>Cédula</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>

								<?php 

									foreach ($estudiantes as $estudiante) {
										echo '<tr>';
										echo '<td>'.$estudiante['estudiantenombre'].'</td>';
										echo '<td>'.$estudiante['estudiantecedula'].'</td>';
										 echo '<td>';
                          echo "<div class='btn-group'><button data-toggle='tooltip' data-placement='top' title='Calificar' class='btn btn-info  btnEditarCalificacion'  estudianteid='".$estudiante['estudianteid']."' data-toggle='modal' data-target='#modalCalificarCurso' ><i class='fa fa-pencil-alt'></i></button><button class='btn btn-danger btnEliminarEstudiante' estudianteid='".$estudiante['estudianteid']."' ><i class='fa fa-times'></i></button></div>";
                          echo '</td>';
										echo '</tr>';
									}

								?>
								
							</tbody>
							
						</table>
					</div>
					<!-- /.card-body -->
				</div>


			</div>
		</div>

	</div>




</div>

<div id="modalAgregarEstudiante" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title">Agregar estudiantes</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">

				<div class="box-body">

					<form method="POST" id="estudianteForm" action="../business/cursoaction.php" >

						<input type="hidden" name="cursoprofesorid" id="cursoprofesorid" value="<?php echo $_SESSION['profesorid']?>"> 
						<input type="hidden" name="cursoid" id="cursoid" value="<?php echo $cursoid?>"> 
						<input type="hidden" name="insertarEstudiante" id="insertarEstudiante" value="insertarEstudiante">

						<div class="form-group">
							<label >Ciclo:</label>
							<select class="form-control" name="cursociclo" id="cursociclo">
								<option value="Ciclo I">Ciclo I</option>
								<option value="Ciclo II">Ciclo II</option>
							</select>
							<label style="margin-top: 0.5rem;" >Año:</label>
							<select class="form-control" name="cursoanio" id="cursoanio">
								
							</select>

						</div>

						<div class="form-group">
							<label>Estudiantes</label>
							<select class="form-control" name="estudiantescurso[]" id="estudiantescurso" multiple="multiple">
								
							</select>
						</div>
						<center>
							<button type="submit" name="insertarEstudiante" class="btn btn-primary">Insertar</button>
						</center> 
					</form>

				</div>

			</div>

		</div>
	</div>



</div>

<div id="modalCalificarCurso" class="modal fade mx-auto " role="dialog" >

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title">Calificar</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">

				<div class="box-body">

					


					<table class="rubrica table-sm table-secondary mx-auto">
						<form method="POST" id="rubricaForm" action="../business/cursoaction.php" >

							<div class="form-group">
								<input type="hidden" name="rubricaid" id="rubricaid">
								<input type="hidden" name="cursoid" id="cursoid">
								<input type="hidden" name="estudianteid" id="estudianteid">
								<input type="hidden" name="ciclo" id="ciclo">
								<input type="hidden" name="anio" id="anio">
								<input type="hidden" name="actualizarCalificacion" id="actualizarCalificacion" class="accion" value="actualizarCalificacion">


							</div>
							<tbody>
								<tr>
									<th >Examen 1</th>
									<td>
										<input type="text" class="form-control" name="examen1" id="examen1">
									</td>
								</tr>
								<tr>
									<th >Examen 2</th>
									<td>
										<input type="text" class="form-control" name="examen2" id="examen2">
									</td>
								</tr>
								<tr>
									<th >Examen 3</th>
									<td>
										<input type="text" class="form-control" name="examen3" id="examen3">
									</td>
								</tr>
								<tr>
									<th >Tarea 1</th>
									<td>
										<input type="text" class="form-control" name="tarea1" id="tarea1">
									</td>
								</tr>
								<tr>
									<th >Tarea 2</th>
									<td>
										<input type="text" class="form-control" name="tarea2" id="tarea2">
									</td>
								</tr>

								<tr>
									<th>Prueba 1</th>
									<td>
										<input type="text" class="form-control" name="prueba1" id="prueba1">
									</td>
								</tr>

								<tr>
									<th >Prueba 2</th>
									<td>
										<input type="text" class="form-control" name="prueba2" id="prueba2">
									</td>
								</tr>


								<tr>
									<th>Total</th>
									<td>
										<span class="form-control" name="total" id="total"></span>
									</td>






								</tr>


							</tbody>



						</table>
						<br>
						<tr >
							<center>
								<td >
									<button  type="submit" id="botonRubrica" class="btn btn-primary ">Actualizar</button>
								</td>
							</tr>
						</center>
					</form>
				</div>

			</div>

		</div>
	</div>

</div>
	
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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

	<script>
		
	</script>
	

	<?php 
  //ALERTAS
  echo '<script>';
  
  if($_GET['mensaje']==1){
  			echo "$.jGrowl('Estudiantes agregados con éxito',{theme: 'changeCount'});";
  	}else if($_GET['mensaje']==2){
  		echo "$.jGrowl('Estudiantes actualizados con éxito',{theme: 'changeCount'});";
  	}else if($_GET['mensaje'] == 3){
  		echo "$.jGrowl('Estudiantes eliminados con éxito',{theme: 'changeCount'});";
  	}else if($_GET['mensaje'] == 4){
  		echo " $.jGrowl('Error al efectuar el proceso',{theme: 'changeCount'});";
  	}else if($_GET['mensaje']== 5){
  		echo " $.jGrowl('Rubros actualizados con éxito',{theme: 'changeCount'});";
  	}
  echo "</script>";

?>
	


	<script>
		$(".btnAgregarEstudiante").on('click', function(){

			var cursoid = "<?php echo $cursoid; ?>";
			var profesorid =  $("#cursoprofesorid").val();
			var ciclocurso = $("#cursociclo").val();
			var aniocurso= $("#cursoanio").val();
			var carreraid = "<?php echo $carreraid ?>";
			
			
			$.ajax({
				url: '../business/cursoaction.php',
				type: 'post',
				data: {curso:cursoid,profesor:profesorid,ciclo:ciclocurso, anio:aniocurso, carrera:carreraid ,accion:"obtenerEstudianteSinCurso" },
				dataType: 'json',
				success:function(respuesta){
					
					console.log(respuesta);
					var tamanio = respuesta.length;

					$("#estudiantescurso").empty();
					for( var i = 0; i<tamanio; i++){
						var id = respuesta[i]['estudianteid'];
						var nombre = respuesta[i]['estudiantenombre'];
						$("#estudiantescurso").append("<option value='"+id+"'  >"+nombre+"</option>");
					}
				}
			});
		});


	</script>

	<script>
		$(document).ready(function() {
			$('#estudiantescurso').select2({
				allowClear: true
			});
		});
	</script>
	
	<script>
  $(function () {

    $('#estudiantes').DataTable({
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
	$("#cursociclo").change(function(){
			
			var cursoid = "<?php echo $cursoid; ?>";
			var profesorid =  $("#cursoprofesorid").val();
			var ciclocurso = $("#cursociclo").val();
			var aniocurso= $("#cursoanio").val();
			var carreraid = "<?php echo $carreraid ?>";

			$.ajax({
				url: '../business/cursoaction.php',
				type: 'post',
				data: {curso:cursoid,profesor:profesorid,ciclo:ciclocurso, anio:aniocurso, carrera:carreraid ,accion:"obtenerEstudianteSinCurso" },
				dataType: 'json',
				success:function(respuesta){
					
					console.log(respuesta);
					var tamanio = respuesta.length;

					$("#estudiantescurso").empty();
					for( var i = 0; i<tamanio; i++){
						var id = respuesta[i]['estudianteid'];
						var nombre = respuesta[i]['estudiantenombre'];
						$("#estudiantescurso").append("<option value='"+id+"'  >"+nombre+"</option>");
					}
				}
			});
		});

	$('#cursoanio').change(function(){

		var cursoid = "<?php echo $cursoid; ?>";
			var profesorid =  $("#cursoprofesorid").val();
			var ciclocurso = $("#cursociclo").val();
			var aniocurso= $("#cursoanio").val();
			var carreraid = "<?php echo $carreraid ?>";

			$.ajax({
				url: '../business/cursoaction.php',
				type: 'post',
				data: {curso:cursoid,profesor:profesorid,ciclo:ciclocurso, anio:aniocurso, carrera:carreraid ,accion:"obtenerEstudianteSinCurso" },
				dataType: 'json',
				success:function(respuesta){
					
					console.log(respuesta);
					var tamanio = respuesta.length;

					$("#estudiantescurso").empty();
					for( var i = 0; i<tamanio; i++){
						var id = respuesta[i]['estudianteid'];
						var nombre = respuesta[i]['estudiantenombre'];
						$("#estudiantescurso").append("<option value='"+id+"'  >"+nombre+"</option>");
					}
				}
			});
		});



                
</script>

<script>
	$(".tabla-estudiantes tbody").on("click", "button.btnEliminarEstudiante", function(){

		var cursoid = "<?php echo $cursoid; ?>";

		var estudianteid =  $(this).attr("estudianteid");
	
		$.confirm({
			title: '¿Desea eliminar el <br><br> estudiante?',
			content: 'No se podrá revertir el cambio',
			theme: 'supervan',
			draggable: false,
			animation: 'zoom',
			closeAnimation: 'scale',
			buttons: {
				Eliminar: function () {
					window.location = "../business/cursoaction.php?eliminar=true&cursoid="+cursoid+"&estudianteid="+estudianteid ;
				},
				Cancelar: function () {
					$.alert('Se ha cancelado el proceso');
				}
			}
		});
	});

	$(".tabla-estudiantes tbody").on("click", "button.btnEditarCalificacion", function(){
		var total = 0;
		var cursoid = "<?php echo $cursoid; ?>";

		var estudianteid =  $(this).attr("estudianteid");
	//	alert(estudianteid);
		


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
					text: 'Actualizar calificación',
					btnClass: 'btn-blue',
					action: function () {
						cursociclo = this.$content.find('.cursociclo').val();
						cursoanio = this.$content.find('.cursoanio').val();
						if(!cursociclo || !cursoanio ){
							$.alert('Campos obligatorios');
							return false;
						}else{
							$("#modalCalificarCurso #ciclo").val(cursociclo);
							$("#modalCalificarCurso #anio").val(cursoanio);
							$("#modalCalificarCurso #cursoid").val(cursoid);
								$("#modalCalificarCurso #estudianteid").val(estudianteid);
             	
							$.ajax({
								type: "POST",
								url: "../business/cursoaction.php",
								data: {estudiante:estudianteid, id:cursoid, ciclo:cursociclo, anio:cursoanio, rubrosEstudiante:'rubrosEstudiante'},
								dataType:"json",
								success: function(respuesta){
									console.log(respuesta);
									if(respuesta == 404){
										$.alert({
											title: 'Mensaje',
											content: 'Rubros no disponibles para este período',
										});
									}else{
										$('#modalCalificarCurso #rubricaid ').val(respuesta[0]['epcid']);

										$('#modalCalificarCurso #examen1 ').val(respuesta[0]['epcexamen1']);
										$('#modalCalificarCurso #examen2 ').val(respuesta[0]['epcexamen2']);
										$('#modalCalificarCurso #examen3 ').val(respuesta[0]['epcexamen3']);
										$('#modalCalificarCurso #tarea1 ').val(respuesta[0]['epctarea1']);
										$('#modalCalificarCurso #tarea2 ').val(respuesta[0]['epctarea2']);
										$('#modalCalificarCurso #prueba1 ').val(respuesta[0]['epcprueba1']);
										$('#modalCalificarCurso #prueba2 ').val(respuesta[0]['epcprueba2']);

										$('.rubrica tr td ').each(function(){
											$(this).find('input').each(function(){
												total = total+ parseInt($(this).val());

											})
										})
										$('#modalCalificarCurso #total').append(total);
										$('#modalCalificarCurso').modal('toggle');
									}
									

								}
							});
             	
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

	$("#modalCalificarCurso table tr td input").change(function() { 

		var total = 0;

		$('#modalCalificarCurso #total').empty();

		$('#modalCalificarCurso .rubrica tr td ').each(function(){
			$(this).find('input').each(function(){
				total = total+ parseInt($(this).val());

			})
		})

		$('#modalCalificarCurso .rubrica tr td ').each(function(){
			$(this).find('input').each(function(){
				if($(this).val() > 100){
					$(this).val(0);
					$(this).focus();

				}

			})
		})

	
		if(total > 100){
			$.jGrowl("Los porcentajes tienen que sumar 100%",{theme: 'changeCount'});
			$('#modalCalificarCurso #botonRubrica'). prop('disabled', true);
		}else if(0 < total && total <= 100){
			$('#modalCalificarCurso #botonRubrica'). prop('disabled', false);

		}
	
		$('#modalCalificarCurso #total').append(total);
	}); 
</script>

	<script>
		let dateDropdown = document.getElementById('cursoanio'); 

		let currentYear = new Date().getFullYear();    
		let earliestYear = 1970;     
		while (currentYear >= earliestYear) {      
			let dateOption = document.createElement('option');          
			dateOption.text = currentYear;      
			dateOption.value = currentYear;        
			dateDropdown.add(dateOption);      
			currentYear -= 1;    
		}
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