
<?php 
include '../business/estudiantebusiness.php';
include 'modulos/sesion.php';

$estudianteBusiness = new EstudianteBusiness();
$cursosEstudiante = $estudianteBusiness->obtenerCursosEstudiante($_SESSION['estudianteid']);
$contador = 0;
$cantidadPorPagina = 10;
$paginas = $estudianteBusiness->obtenerTotalCursosEstudiante($_SESSION['estudianteid']);

if(!$_GET){
	header('Location: estudianteinicioview.php?pagina=1');
} 

 
?>
<!doctype html>
<html lang="en">
<head>
	<title>Aula Virtual - Estudiante - Inicio</title>
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
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.css" />
	<link rel="stylesheet" href="css/main.css">
	 <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
	<style>
		#cursos_filter input{
			border: 1px solid #D3D3D3;
		}

	</style>
</head>
<body>

	<div class="wrapper d-flex align-items-stretch ">

		<?php include 'modulos/estudiante/sidebarestudiante.php' ?>
		

	<div id="content" class="p-4 p-md-5 pt-5 ">
		
		 <!--============================
		 =            Cursos            =
		 =============================-->

		 <div id="content" class="p-4 p-md-5 pt-5 ">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">Cursos</li>
					<li class="breadcrumb-item">Año: <?php echo date("Y") ?></li>
				</ol>
			</nav>


			<div class="row">
                <div class="col-md-8 offset-md-2">
                	<center>
                		<span class="label label-default">Buscar curso</span>	
                	</center>
                    
                        <div class="input-group">
                        	
                        	
                            <input type="text" class="form-control form-control-lg" placeholder="Buscar curso" id="filter" style="border: 1px solid #D3D3D3;">
                            
                        </div>
                </div>
            </div>

			<!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCurso" style="margin-bottom: 1rem;">
				Agregar curso
			</button> -->
			<hr class="form-inline">

			<div class="row">

				<?php 

				$inicio = ($_GET['pagina']);
				
				$cursos = $estudianteBusiness->obtenerTotalCursosPaginasEstudiante($_SESSION['estudianteid'],$inicio,$cantidadPorPagina );
				
				foreach($cursos as $curso){
					echo '<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 mb-3 curso" data-curso="'.$curso['cursonombre'].'">
					<div class="card text-center">
					
					<div class="card-body">
					<h4 class="card-title text-wrap" style="font-size: 14px;">'.$curso['cursonombre'].'</h4>
					<p class="card-text "><i class="fas fa-chalkboard" style="font-size: 4rem;"></i></p>

					<div class="col-auto justify-content-center">

					<a href="estudiantecursoview.php?cursoid='.$curso['cursoid'].'&profesorid='.$curso['cursoprofesorid'].'" class="btn btn-primary">Ver curso</a>


					</div>
					<br>
					<div class="col-auto justify-content-center ">
					
					
					</div>
					</div>
					</div>	
					</div>';
				}


				$paginas = ceil($paginas/$cantidadPorPagina);
				?>

			</div>
			<nav>

				<ul class="pagination  justify-content-center mt-4">
					<?php $propiedad = $_GET['pagina'] <= 1 ? "disabled" : "" ; ?>
					<li class="page-item paginacion-item <?php echo $propiedad ?>"><a class="page-link" href="profesorinicioview.php?pagina=<?php echo    $_GET['pagina']-1 ?>">Anterior</a></li>
					<?php 
					for($i = 1;$i <= $paginas;$i++){
						if($_GET['pagina'] == $i){
							echo '<li class="page-item paginacion-item active"><a class="page-link"  href="profesorinicioview.php?pagina='.$i.'">'.$i.'</a></li>';
						}else{
							echo '<li class="page-item paginacion-item"><a class="page-link"  href="profesorinicioview.php?pagina='.$i.'">'.$i.'</a></li>';
						}

					}

					?>
					<?php 
					$propiedad = $_GET['pagina'] >= $paginas ? "disabled" : "" ;
					?>
					<li class="page-item paginacion-item <?php echo $propiedad ?>"><a class="page-link " href="profesorinicioview.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a></li>
				</ul>
			</nav>
		</div>

		 
		 
		 
		 <!--====  End of Cursos  ====-->
		 

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

<script type="text/javascript">
    $(document).ready(function () {
        var url = window.location;
        $('ul.menu-estudiante a[href="'+ url +'"]').parent().addClass('active');
        $('ul.menu-estudiante a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });
</script> 

<script>
	$("#filter").keyup(function(){
    var seleccionarCurso = $(this).val().toLowerCase();;
    filter(seleccionarCurso);
});

function filter(e) {
    var regex = new RegExp('\\b\\w*' + e + '\\w*\\b');
    $('.curso').hide().filter(function () {
        return regex.test($(this).data('curso').toLowerCase())
    }).show();
}

</script>

</body>
</html>