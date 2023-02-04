<?php 

	include '../business/profesorbusiness.php';

	$profesorBusiness = new ProfesorBusiness();

 ?>
 <?php 
include 'modulos/sesion.php';

$historialCursos = $profesorBusiness->obtenerHistorialCursosProfesor($_SESSION['profesorid']);

//print_r($historialCursos);
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

	<style>
		#cursos_filter input{
			border: 1px solid #D3D3D3;
		}

	</style>
</head>
<body>

	<div class="wrapper d-flex align-items-stretch ">

		<?php include 'modulos/profesor/sidebarprofesor.php' ?>
		

	<div id="content" class="p-4 p-md-5 pt-5 ">
		<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">Historial de cursos</li>
					
				</ol>
			</nav>
	

 	<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Historial de cursos</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Sigla</th>
                      <th>Curso</th>
                      <th>Ciclo</th>
                      <th>Año</th>
                      <th>Estado</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 

                  		foreach($historialCursos as $historial){
                  			echo '<tr data-widget="expandable-table" aria-expanded="false">';
                  			echo '<td>'.$historial['cursosigla'].'</td>';
                  			echo '<td>'.$historial['cursonombre'].'</td>';
                  			echo '<td>'.$historial['epcciclo'].'</td>';
                  			echo '<td>'.$historial['epcanio'].'</td>';
                  			echo '<td>'.$historial['vigenciadescripcion'].'</td>';
                  			
                  			echo '</tr>';
                  		}
                  	 ?>
                  
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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


<script type="text/javascript">
    $(document).ready(function () {
        var url = window.location;
        $('ul.menu-profesor a[href="'+ url +'"]').parent().addClass('active');
        $('ul.menu-profesor a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });
</script> 


  </body>
</html>