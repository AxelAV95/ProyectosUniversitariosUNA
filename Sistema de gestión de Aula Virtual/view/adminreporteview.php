<?php 

	if(isset($_GET['mensaje']) == 1){
		echo "Subido con exito";
	}

 ?>
 <?php 
include 'modulos/sesion.php';
  ?>
<!doctype html>
<html lang="en">
<head>
	<title>Aula Virtual - Reportes</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    <?php include 'modulos/admin/sidebaradmin.php' ?>
 

    <div id="content" class="p-4 p-md-5 pt-5 ">
    <h2 class="card-title">Sección De Cursos Por Profesor<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-search" width="92" height="92" viewBox="0 0 24 24" stroke-width="2" stroke="#7bc62d" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M12 21h-5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v4.5" />
                        <circle cx="16.5" cy="17.5" r="2.5" />
                        <line x1="18.5" y1="19.5" x2="21" y2="22" />
                      </svg></h2>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
    <img class="card-img-top" src="../view/images/aula.jpg"   height="700">

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

          <!-- <img class="card-img-top" src="../view/images/aula.jpg"  width="600" height="600"> -->
            <!-- /.row -->
            <!-- Main row -->
            <div class="card">
              <div class="card-header">
             
                <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalVerCurso">
                
                  Ver cursos por profesor
                </button> -->
              </div>


              <!-- /.card-header -->
              <div class="row">
                <div class="col">
                  <div class="card">

                    <div class="card-header">
                      
                      

                    </div>

                    <div class="card-body">
                      <table id="tabla-cursos" class="tabla-cursos table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Sigla</th>
                            <th>Nombre</th>
                            <th>Cupos</th>
                            <th>-</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                          <?php
                         
                          foreach ($cursos as $curso) {
                            //var_dump($profesor);
                            echo '<tr>';
                            echo '<td>' . $curso['cursosigla'] . '</td>';

                            echo '<td>' . $curso['cursonombre'] . '</td>';

                            echo '<td>' . $curso['cursocupo'] . '</td>';

                            // echo '<td>' . $curso['cursovigenciaid'] . '</td>';
                            //  echo '<td >';
                            //  echo '<span class="badge badge-light">' . $vigenciaBusiness->getAllTBVigencias($curso['cursovigenciaid'])[0]['vigenciadescripcion'] . '</span>';
                            //  echo '</td>';

                            //echo '<td>' . $curso['cursocarreraid'] . '</td>';

                            //echo '<td>' . $curso['cursoprofesorid'] . '</td>';
                            echo '<td class="text-center">';
                            echo "<div class='btn-group'><button class='btn btn-warning btnVerCurso mr-2 invisible' cursoid='" . $curso["cursoid"] . "' cursosigla='" . $curso["cursosigla"] . "' cursonombre='" . $curso['cursonombre'] . "'cursocupo='" . $curso['cursocupo'] . "'cursovigenciaid='" . $curso['cursovigenciaid'] . "'cursocarreraid='" . $curso['cursocarreraid'] . "'cursoprofesorid='" . $curso['cursoprofesorid'] . "' data-toggle='modal' data-target='#modalVerCurso'><i class='fa fa-pencil-alt'></i></button><button class='btn btn-danger btnEliminarCurso invisible' cursoid='" . $curso["cursoid"] . "' ><i class='fa fa-times'></i></button></div>";
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

    <div id="modalVerCurso" class="modal fade" role="dialog">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">
            <!-- <h4 class="modal-title">Agregar Curso</h4> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div class="box-body">

              <form method="POST" action=".././business/cursoaction.php?">


                <center><button type="submit" name="ver" class="btn btn-primary">Ver cursos relacionados</button></center>
              </form>

            </div>

          </div>

        </div>
      </div>

    </div>


    <div id="modalVerCurso" class="modal fade" role="dialog">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Editar curso</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div class="box-body">

              <form method="POST" action=".././business/cursoaction.php" enctype="multipart/form-data">

                <div class="form-group">
                  <input type="hidden" name="cursoid" id="cursoid">


                </div>
                <div class="form-group">
                  <label>Sigla: </label>
                  <input type="text" class="form-control" name="cursosigla" id="cursosigla" readonly=true>
                </div>
                <div class="form-group">
                  <label>Nombre: </label>
                  <input type="text" class="form-control" name="cursonombre" id="cursonombre" readonly=true>
                </div>
                <div class="form-group">
                  <label>Cupos: </label>
                  <input type="text" class="form-control" name="cursocupo" id="cursocupo">
                </div>


                <center><button type="submit" name="ver" class="btn btn-primary">Actualizar</button></center>
              </form>

            </div>

          </div>

        </div>
      </div>

    </div>

    <!-- /.content-wrapper -->


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

      $('#tabla-cursos').DataTable({
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
    $("#tabla-cursos tbody").on("click", "button.btnVerCurso", function() {

      var cursoid = $(this).attr("cursoid");




      $("#modalVerCurso #cursoid").val(cursoid);





    });



    $(".tabla-cursos tbody").on("click", "button.btnEliminarCurso", function() {

      var cursoid = $(this).attr("cursoid");

      Swal.fire({
        title: '¿Desea eliminar el curso?',
        text: "No se podrá revertir el cambio",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "Cancelar",
        confirmButtonText: 'Eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = ".././business/cursoaction.php?eliminar=true&cursoid=" + cursoid;

        }
      })


    });
  </script>

  </body>
</html>