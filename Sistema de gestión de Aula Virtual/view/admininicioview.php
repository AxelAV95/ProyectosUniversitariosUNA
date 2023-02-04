<?php 
	
include '../business/adminbusiness.php';
$adminBusiness = new AdminBusiness();
$totalProfesores = $adminBusiness->verTotalProfesores();
$totalEstudiantes = $adminBusiness->verTotalEstudiantes();
$totalCursos = $adminBusiness->verTotalCursos();
?>

<?php 
include 'modulos/sesion.php';
?>
<!doctype html>
<html lang="en">
<head>
	<title>Aula Virtual - Inicio</title>
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
	<link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<link rel="stylesheet" href="plugins/toastr/toastr.min.css">
	<link
	rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
	/>

	<link
	rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
	/>
	<style>
		#cursos_filter input{
			border: 1px solid #D3D3D3;
		}

	</style>
</head>
<body>

	<div class="wrapper d-flex align-items-stretch ">

		<?php include 'modulos/admin/sidebaradmin.php' ?>


		<div id="content" class="p-4 p-md-5 pt-5 ">

			


			 <div class="row">
			 	<div class="col-lg-6 col-md-6 col-sm-12">

			 		<center>
			 		 <h2 class="mb-4">Aula Virtual Institucional</h2>
			 		 <img src="images/camps.png" alt="" style="border-radius: 1rem;" class="animate__animated animate__pulse animate__slow animate__infinite">
			 		 </center>
			 		
			 	</div>
			 	<div class="col-lg-6 col-md-6 col-sm-12 mt-4">
			 		<div class="card text-left">
			 			
			 			<div class="card-body">
			 				<h4 class="card-title text-left">Información general</h4>
			 				<label for="totalestudiantes"><b>Total estudiantes:</b> <?php echo $totalEstudiantes[0]['Total'] ?></label><br>

			 				<label for="totalprofesores"><b>Total profesores:</b> <?php echo $totalProfesores[0]['Total'] ?> </label><br>
			 				<label for="totalcursos"><b>Total cursos:</b> <?php echo $totalCursos[0]['Total'] ?> </label>
			 				<!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			 				<a href="#" class="btn btn-primary">Go somewhere</a> -->
			 			</div>
			 		</div>
			 	</div>
			 </div>






		</div>

		<script src="plugins/jquery/jquery.min.js"></script>
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
		<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
		<script src="plugins/toastr/toastr.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>




		<script type="text/javascript">
			$(document).ready(function () {
				var url = window.location;
				$('ul.menu-admin a[href="'+ url +'"]').parent().addClass('active');
				$('ul.menu-admin a').filter(function() {
					return this.href == url;
				}).parent().addClass('active');
			});
		</script> 


		<script type="text/javascript" src="js/backup.js"></script>

	</body>
	</html>