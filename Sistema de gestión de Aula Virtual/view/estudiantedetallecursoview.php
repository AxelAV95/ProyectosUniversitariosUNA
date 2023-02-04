<?php 
include '../business/cursobusiness.php';
include '../business/estudiantebusiness.php';
include '../business/profesorbusiness.php';
if(isset($_GET['cursoid']) && isset($_GET['profesorid']) ){
	$cursoid = $_GET['cursoid'];
	$profesorid = $_GET['profesorid'];
	
}

include 'modulos/sesion.php';
//print_r($_SESSION);
$cursoBusiness = new CursoBusiness();
$estudianteBusiness = new EstudianteBusiness();
$profesorBusiness = new ProfesorBusiness();
$cursoDatos = $cursoBusiness->obtenerCurso($cursoid);
$datosProfesor = $profesorBusiness->obtenerDatosProfesorPorId($profesorid);
//print_r($datosProfesor);
$listaEstudiantes = $cursoBusiness->obtenerEstudiantesMatriculadosCurso($cursoid);
//print_r($listaEstudiantes);
$asignaciones = $estudianteBusiness->obtenerAsignacionesPorEstudiante($_SESSION['estudianteid'],$cursoid);
//print_r($asignaciones);
$desgloseNotas = $estudianteBusiness->obtenerDesgloseNotaEstudiante($_SESSION['estudianteid'],$cursoid);
//print_r($desgloseNotas);
?>

<!doctype html>
<html lang="en">
<head>
	<title>Aula Virtual - Curso - Detalles</title>
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
	<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.css" />
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
	<style>
		.callout{border-radius:.25rem;box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);background-color:#fff;border-left:5px solid #e9ecef;margin-bottom:1rem;padding:1rem}
		.callout.callout-danger{border-left-color:#bd2130}

		.callout.callout-info{border-left-color:#5faee3}
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
					<li class="breadcrumb-item">Detalles</li>
					
				</ol>
			</nav>



			<div class="row">
				<div class="col-12">
					<!-- Custom Tabs -->
					<div class="card">
						<div class="card-header d-flex p-0">
							<h3 class="card-title p-3">Detalles del curso</h3>
							<ul class="nav nav-pills ml-auto p-2">
								<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">General</a></li>
								<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Calificaciones y notas</a></li>
								

							</ul>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1">
									<div class="callout callout-info">
										<h5>Profesor: <?php echo $datosProfesor[0]['profesornombre'] ?></h5>
										<span><h6>Cédula: </h6> <?php echo $datosProfesor[0]['profesorcedula'] ?></span>
										
									</div>

									<div class="row">

										<!-- ./col -->
										<div class="col-md-12">
											<div class="card">
												<div class="card-header">
													<h3 class="card-title">

														Lista de estudiantes
													</h3>
												</div>
												<!-- /.card-header -->
												<div class="card-body">
													<ol>
														<?php 

															foreach($listaEstudiantes as $estudiante){
																echo '<li>'.$estudiante['estudiantenombre'].' ('.$estudiante['estudiantecedula'].')</li>';
															}

														 ?>
													
													</ol>
												</div>
												<!-- /.card-body -->
											</div>
											<!-- /.card -->
										</div>
										<!-- ./col -->


									</div>
								</div>
								<!-- /.tab-pane -->
								<div class="tab-pane" id="tab_2">
									<div class="row">
										<div class="col-md-6">
											<div class="card">
												<div class="card-header">
													<h3 class="card-title">Desglose de asignaciones</h3>
												</div>
												<!-- /.card-header -->
												<div class="card-body">
													<table id="desgloseasignaciones" class="table table-bordered">
														<thead>
															<tr>
																<th style="width: 10px">#</th>
																<th>Asignación</th>

																<th style="width: 40px">Nota</th>
															</tr>
														</thead>
														<tbody>
															<?php 

																foreach($asignaciones as $asignacion){
																	echo '<tr>';
																	echo '<td>'.$asignacion['asignacionid'].'.</td>';
																	echo '<td>'.$asignacion['asignaciondescripcion'].'.</td>';
																	if($asignacion['asignacionnota'] == ""){
																		echo '<td><span class="badge bg-primary text-light">Sin calificar</span></td>';
																	}else{
																		echo '<td><span class="badge bg-primary text-light">'.$asignacion['asignacionnota'].'</span></td>';
																	
																	}
																	echo '</tr>';
																}

															 ?>
															
														</tbody>
													</table>
												</div>

											</div>
											<!-- /.card -->

											
										</div>
										<!-- /.col -->
										<div class="col-md-6">
											<div class="card">
												<div class="card-header">
													<h3 class="card-title">Desglose de nota</h3>

																									</div>
												<!-- /.card-header -->
												<div class="card-body p-0">
													<table class="table">
														<thead>
															<tr>
																<th style="width: 10px">#</th>
																<th>Exámenes</th>
																<th>Tareas</th>
																<th>Pruebas</th>
																<th style="width: 40px">Total</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td><?php echo $desgloseNotas[0]['cursoid'] ?></td>
																<td><?php echo $desgloseNotas[0]['epcexamen1']+ $desgloseNotas[0]['epcexamen2']+ $desgloseNotas[0]['epcexamen3'] ?>%</td>
																<td>
																	<?php echo $desgloseNotas[0]['epctarea1']+ $desgloseNotas[0]['epctarea2']  ?>%
																</td>
																<td><?php echo $desgloseNotas[0]['epcprueba1']+ $desgloseNotas[0]['epcprueba2']  ?>%</td>
																<td><span class="badge bg-primary text-light"><?php 
																$total =$desgloseNotas[0]['epcexamen1']+ $desgloseNotas[0]['epcexamen2']+ $desgloseNotas[0]['epcexamen3']+$desgloseNotas[0]['epctarea1']+ $desgloseNotas[0]['epctarea2']+$desgloseNotas[0]['epcprueba1']+ $desgloseNotas[0]['epcprueba2'];  


																echo $total;
																 ?>%</span></td>
															</tr>
															
														</tbody>
													</table>
												</div>
												<!-- /.card-body -->
											</div>
											<!-- /.card -->

											
										</div>
										<!-- /.col -->
									</div>
								</div>
								<!-- /.tab-pane -->
								<div class="tab-pane " id="tab_3">
									Lorem Ipsum is simply dummy text of the printing and typesetting industry.
									Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
									when an unknown printer took a galley of type and scrambled it to make a type specimen book.
									It has survived not only five centuries, but also the leap into electronic typesetting,
									remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
									sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
									like Aldus PageMaker including versions of Lorem Ipsum.
								</div>
								<!-- /.tab-pane -->
							</div>
							<!-- /.tab-content -->
						</div><!-- /.card-body -->
					</div>
					<!-- ./card -->
				</div>
				<!-- /.col -->
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
		echo "$.jGrowl('Asignación actualizada con éxito',{theme: 'changeCount'});";
	}else if($_GET['mensaje'] == 3){
		echo "$.jGrowl('Asignación eliminada con éxito',{theme: 'changeCount'});";
	}else if($_GET['mensaje'] == 4){
		echo " $.jGrowl('Error al efectuar el proceso',{theme: 'changeCount'});";
	}
	echo "</script>";

	?>

	<script>
		$(function () {

	$('#desgloseasignaciones').DataTable({
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
		},
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
	});
});

	</script>

	<script type="text/javascript" src="js/estudianteasignacionview.js"></script>

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