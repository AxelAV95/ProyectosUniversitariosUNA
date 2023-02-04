<?php 
include '../business/cursobusiness.php';
include '../business/profesorbusiness.php';
if(isset($_GET['cursoid'])){
	$cursoid = $_GET['cursoid'];
}
include 'modulos/sesion.php';

$cursoBusiness = new CursoBusiness();
$profesorBusiness = new ProfesorBusiness();
$cursoDatos = $cursoBusiness->obtenerCurso($cursoid);
$asignaciones = $profesorBusiness->obtenerAsignacionesProfesor($_SESSION['profesorid'],$cursoid);


?>

<!doctype html>
<html lang="en">
<head>
	<title>Aula Virtual - Curso - Asignaciones</title>
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
	  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

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
					<li class="breadcrumb-item">Mis asignaciones</li>
				</ol>
			</nav>

			<div class="container-fluid">
				<div class="row">
					<!-- left column -->
					<div class="col-md-12">
						<div class="card text-center">

							<div class="card-body">
								<h6 class="card-title">Asignaciones</h6>
								<form action="../business/profesoraction.php" method="POST" class="dropzone" id="asignacionForm" enctype='multipart/form-data'>
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
											<i class="fas fa-plus animate__animated animate__pulse animate__infinite"></i>
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

					</div>
				</div>

			</div><!-- /.container-fluid -->


			<div class="card-body">
				<table id="asignacionesp" class="tabla-asigp table table-bordered table-hover">
					<thead>
						<tr>
							<th>Fecha de entrega</th>
							<th>Descripción</th>
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
							echo "<div class='btn-group'><a data-toggle='tooltip' data-placement='top' title='Descargar'  class='btn btn-info' href='".$asignacion['asignacionruta']."' target='_blank'><i class='fas fa-download'></i></a><a data-toggle='tooltip' data-placement='top' title='Ver asignaciones subidas'  class='btn btn-primary' href='profesorasignacionsubidaview.php?asignacionid=".$asignacion['asignacionid']."&cursoid=".$cursoid."  '><i class='fas fa-folder'></i></a><button data-toggle='tooltip' data-placement='top' title='Eliminar'  class='btn btn-danger btnEliminarAsignacion' asignacionid='".$asignacion['asignacionid']."'   ><i class='fa fa-times'></i></button></div>";
							echo '</td>';
							echo '</tr>';
						}

						?>

					</tbody>

				</table>
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

	<script type="text/javascript" src="js/profesorasignacionview.js"></script>


	<script>

/* Elimina una asignación
Detalles: Aunque la elimine, no elimina el archivo */

		$(".tabla-asigp tbody").on("click", "button.btnEliminarAsignacion", function(){

			var cursoid = "<?php echo $cursoid; ?>";
			var asignacionid =  $(this).attr("asignacionid");

			$.confirm({
				title: '¿Desea eliminar la <br><br> asignación?',
				content: 'No se podrá revertir el cambio',
				theme: 'supervan',
				draggable: false,
				animation: 'zoom',
				closeAnimation: 'scale',
				buttons: {
					Eliminar: function () {
						window.location = "../business/profesoraction.php?eliminar=true&asignacionid="+asignacionid+"&cursoid="+cursoid;
					},
					Cancelar: function () {
						$.alert('Se ha cancelado el proceso');
					}
				}
			});
		});	
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