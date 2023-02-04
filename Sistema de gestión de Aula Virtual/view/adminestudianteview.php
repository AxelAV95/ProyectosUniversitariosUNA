
<?php
include '../business/estudiantebusiness.php';
include '../business/becabusiness.php';
include '../business/carrerabusiness.php';
$estudianteBusiness = new EstudianteBusiness();
$estudiantes = $estudianteBusiness->getAllTBestudiantes();
$becaBusiness = new BecaBusiness();
$becas = $becaBusiness->getAllTBBecas();
$carreraBusiness = new CarreraBusiness();
$carreras = $carreraBusiness->getAllTBCarreras();

?>

<?php 
include 'modulos/sesion.php';
?>
<!doctype html>
<html lang="en">
<head>
	<title>Aula Virtual - Estudiantes</title>
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
		#tabla-estudiantes_filter input {
			border: 1px solid #D3D3D3;
		}
	</style>
</head>
<body>

	<div class="wrapper d-flex align-items-stretch ">

		<?php include 'modulos/admin/sidebaradmin.php' ?>
		

		<div id="content" class="p-4 p-md-5 pt-5 ">
      <h2 class="mb-4">Aula Virtual Institucional</h2>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">

              </div><!-- /.col -->

            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">


            <!-- /.row -->
            <!-- Main row -->
            <div class="card">
              <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEstudiante">

                  Agregar estudiante

                </button>
              </div>
              <!-- /.card-header -->
              <div class="row">
                <div class="col">
                  <div class="card">

                    <div class="card-header">
                      <h3 class="card-title"> Estudiantes</h3>
                    </div>

                    <div class="card-body">
                      <table id="tabla-estudiantes" class="tabla-estudiantes table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Cedula</th>
                            <th>Edad</th>
                            <th>Dirección </th>                            
                            <th>Carrera </th>
                            <th>Beca </th>
                            <th>Acciones </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($estudiantes as $estudiante) {

                            echo '<tr>';
                            echo '<td>' . $estudiante['estudiantenombre'] . '</td>';
                            echo '<td>' . $estudiante['estudiantecedula'] . '</td>';
                            echo '<td>' . $estudiante['estudianteedad'] . '</td>';
                            echo '<td>' . $estudiante['estudiantedireccion'] . '</td>';
                            
                            echo '<td >';
                            echo '<span class="badge badge-light">' . $carreraBusiness->getTipoCarrera($estudiante['estudiantecarreraid'])[0]['carreranombre'] . '</span>';
                            echo '</td>';
                            echo '<td >';
                            echo '<span class="badge badge-light">' . $becaBusiness->gettipoBeca($estudiante['estudiantebecaid'])[0]['becatipo'] . '</span>';
                            echo '</td>';
                            echo '<td class="text-center">';
                            echo "<div class='btn-group'><button class='btn btn-warning btnEditarEstudiante mr-2' estudianteid='" . $estudiante["estudianteid"] . "' estudiantenombre='" . $estudiante["estudiantenombre"] . "' estudiantecedula='" . $estudiante['estudiantecedula'] . "'estudianteedad='" . $estudiante['estudianteedad'] . "'estudiantedireccion='" . $estudiante['estudiantedireccion'] . "'estudianteusuarioid='" . $estudiante['estudianteusuarioid'] . "'estudiantecarreraid='" . $estudiante['estudiantecarreraid'] . "'estudiantebecaid='" . $estudiante['estudiantebecaid'] . "' data-toggle='modal' data-target='#modalEditarEstudiante'><i class='fa fa-pencil-alt'></i></button><button class='btn btn-danger btnEliminarEstudiante' estudianteid='" . $estudiante["estudianteid"] . "' ><i class='fa fa-times'></i></button></div>";
                            echo '</td>';
                            echo '</tr>';
                          }

                          ?>
                        </tbody>

                      </table>
                    </div>

                  </div>


                </div>
              </div>




            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

    <div id="modalAgregarEstudiante" class="modal fade" role="dialog">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Agregar Estudiante</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div class="box-body">

              <form method="POST" action="../business/estudianteaction.php">


                <div class="form-group">
                  <label>Nombre:</label>
                  <input type="text" class="form-control" name="estudiantenombre" id="estudiantenombre" placeholder="Ingrese nombre" style="border: 1px solid #D3D3D3;">

                </div>
                <div class="form-group">
                  <label>Cedula: </label>
                  <input type="text" class="form-control" name="estudiantecedula" id="estudiantecedula" placeholder="Ingrese cedula" style="border: 1px solid #D3D3D3;">
                </div>
                <div class="form-group">
                  <label>Edad: </label>
                  <input type="text" class="form-control" name="estudianteedad" id="estudianteedad" placeholder="Ingrese edad" style="border: 1px solid #D3D3D3;">
                </div>
                <div class="form-group">
                  <label>Dirección: </label>
                  <input type="text" class="form-control" name="estudiantedireccion" id="estudiantedireccion" placeholder="Ingrese dirección" style="border: 1px solid #D3D3D3;">
                </div>
               
                <label>Carrera: </label>

                <div class="form-group">
                  <select class="estudiantecarreraid form-control" name="estudiantecarreraid" id="estudiantecarreraid" style="border: 1px solid #D3D3D3;">

                    <option selected>Seleccione la carrera</option>

                    <?php foreach ($carreras as $carrera) {

                      echo ' <option value="' . $carrera['carreraid'] . '" class="badge badge-pill badge-warning" style="font-size: 15px;">' . $carrera['carreranombre'] . '</option>';
                    } ?>




                  </select>
                </div>


                <label>Beca: </label>

                <div class="form-group">
                  <select class="estudiantebecaid form-control" name="estudiantebecaid" id="estudiantebecaid" style="border: 1px solid #D3D3D3;">

                    <option selected>Seleccione la beca</option>

                    <?php foreach ($becas as $beca) {

                      echo ' <option value="' . $beca['becaid'] . '" class="badge badge-pill badge-warning" style="font-size: 15px;">' . $beca['becatipo'] . '</option>';
                    } ?>




                  </select>
                </div>


                <center><button type="submit" name="insertar" class="btn btn-primary">Insertar</button></center>
              </form>

            </div>

          </div>

        </div>
      </div>

    </div>


    <div id="modalEditarEstudiante" class="modal fade" role="dialog">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Editar estudiante</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div class="box-body">

              <form method="POST" action=".././business/estudianteaction.php" enctype="multipart/form-data">


                <input type="hidden" name="estudianteid" id="estudianteid">


                <div class="form-group">
                  <label>Nombre:</label>
                  <input type="text" class="form-control" name="estudiantenombre" id="estudiantenombre" readonly=true style="border: 1px solid #D3D3D3;">

                </div>
                <div class="form-group">
                  <label>Cedula: </label>
                  <input type="text" class="form-control" name="estudiantecedula" id="estudiantecedula" readonly=true style="border: 1px solid #D3D3D3;">
                </div>
                <div class="form-group">
                  <label>Edad: </label>
                  <input type="text" class="form-control" name="estudianteedad" id="estudianteedad" placeholder="Ingrese edad" style="border: 1px solid #D3D3D3;">
                </div>
                <div class="form-group">
                  <label>Dirección: </label>
                  <input type="text" class="form-control" name="estudiantedireccion" id="estudiantedireccion" placeholder="Ingrese dirección" style="border: 1px solid #D3D3D3;">
                </div>
               

                <label>Carrera: </label>

                <div class="form-group">
                  <select class="estudiantecarreraid form-control" name="estudiantecarreraid" id="estudiantecarreraid" style="border: 1px solid #D3D3D3;">

                    <option selected>Seleccione el tipo de carrera</option>

                    <?php foreach ($carreras as $carrera) {

                      echo ' <option value="' . $carrera['carreraid'] . '" class="badge badge-pill badge-warning" style="font-size: 15px;">' . $carrera['carreranombre'] . '</option>';
                    } ?>




                  </select>
                </div>
             
                <label>Tipo de beca: </label>

                <div class="form-group">
                  <select class="estudiantebecaid form-control" name="estudiantebecaid" id="estudiantebecaid" style="border: 1px solid #D3D3D3;">

                    <option selected>Seleccione el tipo de beca</option>

                    <?php foreach ($becas as $beca) {

                      echo ' <option value="' . $beca['becaid'] . '" class="badge badge-pill badge-warning" style="font-size: 15px;">' . $beca['becatipo'] . '</option>';
                    } ?>

                  </select>
                </div>


                <center><button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button></center>
              </form>

            </div>

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
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="plugins/dropzone/min/dropzone.min.js"></script>
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="plugins/toastr/toastr.min.js"></script>



  <?php
  //ALERTAS
  echo '<script>';
  echo " var Toast = Swal.mixin({
       toast: true,
       position: 'top-right',
       showConfirmButton: false,
       timer: 3000,
       timerProgressBar: true
     });";
  if ($_GET['mensaje'] == 1) { //insertar
    echo "Toast.fire({
         icon: 'success',
        title: '<div style=margin-top:0.5rem;>Insertado con éxito.</div>'
     });";
  } else if ($_GET['mensaje'] == 2) { //actualizar
    echo "Toast.fire({
         icon: 'success',
        title: '<div style=margin-top:0.5rem;>Actualizado con éxito.</div>'
     });";
  } else if ($_GET['mensaje'] == 3) { //eliminar
    echo "Toast.fire({
         icon: 'success',
        title: '<div style=margin-top:0.5rem;>Eliminado con éxito.</div>'
     });";
  } else if ($_GET['mensaje'] == 4) { //error
    echo " Toast.fire({
        icon: 'error',
        title: '<div style=margin-top:0.5rem;>Error al efectuar la operación.</div>'
      })";
  }
  echo "</script>";

  ?>

  <script>
    $(function() {

      $('#tabla-estudiantes').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true

      });
    });
  </script>

  <script>
    $("#tabla-estudiantes tbody").on("click", "button.btnEditarEstudiante", function() {


      var estudianteid = $(this).attr("estudianteid");
      var estudiantenombre = $(this).attr("estudiantenombre");
      var estudiantecedula = $(this).attr("estudiantecedula");
      var estudianteedad = $(this).attr("estudianteedad");
      var estudiantedireccion = $(this).attr("estudiantedireccion");
      var estudianteusuarioid = $(this).attr("estudianteusuarioid");
      var estudiantecarreraid = $(this).attr("estudiantecarreraid");
      var estudiantebecaid = $(this).attr("estudiantebecaid");



      $("#modalEditarEstudiante #estudianteid").val(estudianteid);
      $("#modalEditarEstudiante #estudiantenombre").val(estudiantenombre);
      $("#modalEditarEstudiante #estudiantecedula").val(estudiantecedula);
      $("#modalEditarEstudiante #estudianteedad").val(estudianteedad);
      $("#modalEditarEstudiante #estudiantedireccion").val(estudiantedireccion);
      $("#modalEditarEstudiante #estudianteusuarioid").val(estudianteusuarioid);
      $("#modalEditarEstudiante #estudiantecarreraid").val(estudiantecarreraid);
      $("#modalEditarEstudiante #estudiantebecaid").val(estudiantebecaid);




    });



    $(".tabla-estudiantes tbody").on("click", "button.btnEliminarEstudiante", function() {

      var estudianteid = $(this).attr("estudianteid");

      Swal.fire({
        title: '¿Desea eliminar el estudiante?',
        text: "No se podrá revertir el cambio",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "Cancelar",
        confirmButtonText: 'Eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = "../business/estudianteaction.php?eliminar=true&estudianteid=" + estudianteid;

        }
      })


    });
  </script>


<script type="text/javascript">
	$(document).ready(function () {
		var url = window.location;
		
		url = url.toString().substring(0, 76);
		$('ul.menu-admin a[href="'+ url +'"]').parent().addClass('active');
		$('ul.menu-admin a').filter(function() {
			return this.href == url;
		}).parent().addClass('active');
	});
</script> 

<script type="text/javascript" src="js/backup.js"></script>


</body>
</html>