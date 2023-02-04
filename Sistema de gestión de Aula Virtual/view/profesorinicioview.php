<?php 

include '../business/cursobusiness.php';
include '../business/profesorbusiness.php';

$cursoBusiness = new CursoBusiness();
$vigencias = $cursoBusiness->obtenerVigencias();
$carreras = $cursoBusiness->obtenerCarreras();

include 'modulos/sesion.php';
$profesorBusiness = new ProfesorBusiness();
$cursosProfesor = $profesorBusiness->obtenerCursosProfesor($_SESSION['profesorid']);
$contador = 0;
$cantidadPorPagina = 10;
$paginas = $profesorBusiness->getTotalCursos($_SESSION['profesorid']);


if(!$_GET){
	header('Location: profesorinicioview.php?pagina=1');
} 


?>

<!doctype html>
<html lang="en">
<head>
	<title>Aula Virtual - Cursos</title>
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


</head>
<body>

	<div class="wrapper d-flex align-items-stretch ">


		<?php include 'modulos/profesor/sidebarprofesor.php' ?>

		
		
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
            <br>
            <center>
            	<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCurso" style="margin-bottom: 1rem;">
				Agregar curso
			</button>	
            </center>
			
			<hr class="form-inline">

			<div class="row">

				<?php 

				$inicio = ($_GET['pagina']);
				
				$cursos = $profesorBusiness->obtenerTotalCursosPaginas($_SESSION['profesorid'],$inicio,$cantidadPorPagina );

				//print_r($cursos);
				foreach($cursos as $curso){
					echo '<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 mb-3 curso"  data-curso="'.$curso['cursonombre'].'">
					<div class="card text-center">
					
					<div class="card-body">
					<h4 class="card-title text-wrap" style="font-size: 14px;">'.$curso['cursonombre'].'</h4>
					<p class="card-text "><i class="fas fa-chalkboard" style="font-size: 4rem;"></i></p>

					<div class="col-auto justify-content-center">

					<a href="profesorcursoview.php?cursoid='.$curso['cursoid'].'" class="btn btn-primary">Ver curso</a>


					</div>
					<br>
					<div class="col-auto justify-content-center ">
					
					<i class="far fa-edit btnEditarCurso" data-toggle="modal" data-placement="top" title="Agregar rúbrica" data-target="#modalEditarCurso" style="cursor: pointer;" cursoid="'.$curso['cursoid'].'""></i>
					<a href=""><i data-toggle="tooltip" data-placement="top" title="Eliminar curso" class="fas fa-trash-alt"></i></a>
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




	</div>

	<!--====  Fin Cursos  ====-->


	<!--=========================================
	=            Modal agregar curso            =
	==========================================-->
	
	<div id="modalAgregarCurso" class="modal fade" role="dialog">

		<div class="modal-dialog">

			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">Agregar curso</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">

					<div class="box-body">

						<form method="POST" action="../business/cursoaction.php" >

							<input type="hidden" name="cursoprofesorid" id="cursoprofesorid" value="<?php echo $_SESSION['profesorid']?>"> 

							<div class="form-group">
								<label >Carrera:</label>
								<select name="cursocarrera" id="carreraid" class="form-control" >
									<?php 
									foreach ($carreras as $carrera) {
										echo '<option value="'.$carrera['carreraid'].'">'.$carrera['carreranombre'].'</option>';
									}


									?>	
								</select>


							</div>

							<div class="form-group">
								<label >Sigla:</label>
								<input type="text" class="form-control" name="cursosigla" id="cursosigla" placeholder="Ingrese sigla" >

							</div>

							<div class="form-group">
								<label >Nombre:</label>
								<input type="text" class="form-control" name="cursonombre" id="cursonombre" placeholder="Ingrese nombre" >

							</div>

							<div class="form-group">
								<label >Cupo:</label>
								<input type="number" class="form-control" name="cursocupo" id="cursocupo" placeholder="Ingrese cupo" >

							</div>

							<div class="form-group">
								<label >Vigencia:</label>
								<select name="cursovigencia" id="cursovigencia" class="form-control" >
									<?php 
									foreach ($vigencias as $vigencia) {
										echo '<option value="'.$vigencia['vigenciaid'].'">'.$vigencia['vigenciadescripcion'].'</option>';
									}


									?>								
								</select>


							</div>

							<center><button type="submit" name="insertar" class="btn btn-primary">Insertar</button></center> 
						</form>

					</div>

				</div>

			</div>
		</div>
	</div>

	<!--====  Fin Modal agregar curso  ====-->


	<!--=====================================
	=   	Modal para rúbrica del curso         =
		======================================-->

	<div id="modalEditarCurso" class="modal fade mx-auto " role="dialog" >

		<div class="modal-dialog">

			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">Agregar rúbrica</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">

					<div class="box-body">




						<table class="rubrica table-sm table-secondary mx-auto">
							<form method="POST" id="rubricaForm" >

								<div class="form-group">
									<input type="hidden" name="rubricaid" id="rubricaid">
									<input type="hidden" name="cursoid" id="cursoid">
									<input type="hidden" name="actualizarRubrica" id="actualizarRubrica" class="accion" value="actualizarRubrica">


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
	<!--====  Fin del modal  ====-->



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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.js"></script>
	<script src="js/profesorinicioview.js"></script>

	<script type="text/javascript">
    $(document).ready(function () {
        var url = window.location;
        $('ul.menu-profesor a[href="'+ url +'"]').parent().addClass('active');
        $('ul.menu-profesor a').filter(function() {
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