<?php
include '../business/profesorbusiness.php';
$profesorBusiness = new ProfesorBusiness();
$profesores = $profesorBusiness->getAllTBProfesores();
//$resultado = $profesorBusiness->getAllTBProfesorCursos(7);



?>
 <?php 
include 'modulos/sesion.php';
  ?>
<!doctype html>
<html lang="en">
<head>
	<title>Aula Virtual - Profesores</title>
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
    #tabla-profesores_filter input {
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProfesor">

                  Agregar profesor

                </button>
              </div>
              <!-- /.card-header -->
              <div class="row">
                <div class="col">
                  <div class="card">

                   

                    <div class="card-body">
                      <table id="tabla-profesores" class="tabla-profesores table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Cedula</th>
                            <th>Edad</th>
                            <th>Sexo </th>
                            <th>Experiencia </th>
                            <th>Grado </th>
                            
                            <th>Acciones </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($profesores as $profesor) {
                           
                            echo '<tr>';
                            echo '<td>' . $profesor['profesornombre'] . '</td>';

                            echo '<td>' . $profesor['profesorcedula'] . '</td>';

                            echo '<td>' . $profesor['profesoredad'] . '</td>';

                            echo '<td>' . $profesor['profesorsexo'] . '</td>';

                            echo '<td>' . $profesor['profesorexperiencia'] . '</td>';

                            echo '<td>' . $profesor['profesorgrado'] . '</td>';

                           
                            echo '<td class="text-center">';
                            echo "<div class='btn-group'>
                            <button title='Modificar profesor' class='btn btn-warning btnEditarProfesor mr-2' profesorid='" . $profesor["profesorid"] . "' profesornombre='" . $profesor["profesornombre"] . "' profesorcedula='" . $profesor['profesorcedula'] . "'profesoredad='" . $profesor['profesoredad'] . "'profesorsexo='" . $profesor['profesorsexo'] . "'profesorexperiencia='" . $profesor['profesorexperiencia'] . "'profesorgrado='" . $profesor['profesorgrado'] . "'profesorusuarioid='" . $profesor['profesorusuarioid'] . "' data-toggle='modal' data-target='#modalEditarProfesor'><i class='fa fa-pencil-alt'></i></button>
                           <button title='Eliminar profesor' class='btn btn-danger btnEliminarProfesor mr-2' profesorid='" . $profesor["profesorid"] . "' ><i class='fa fa-times'></i></button>
                            <button title='Reporte de cursos' class='btn btn-info btnVerCursos mr-2' profesorid='" . $profesor["profesorid"] . "' data-toggle='modal' data-target='#modalVerCursos'><i class='fas fa-info-circle'></i></button>
                            <button title='Reporte total cursos impartidos' class='btn btn-info btnVerCursosTotal mr-2' profesorid='" . $profesor["profesorid"] . "'><i class='fab fa-slack-hash'></i></button>

                            </div>";
                            
                            
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

    <div id="modalAgregarProfesor" class="modal fade" role="dialog">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Formulario profesor</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div class="box-body">

              <form method="POST" action="../business/profesoraction.php">


                <div class="form-group">
                  <label>Nombre:</label>

                  <input type="text" class="form-control" name="profesornombre" id="profesornombre" placeholder="Ingrese el nombre" style="border: 1px solid #D3D3D3;">

                </div>
                <div class="form-group">
                  <label>Cédula:</label>
                  <input type="text" class="form-control" name="profesorcedula" id="profesorcedula" placeholder="Ingrese la cedula" style="border: 1px solid #D3D3D3;">

                </div>
                <div class="form-group">
                  <label>Edad:</label>
                  <input type="text" class="form-control" name="profesoredad" id="profesoredad" placeholder="Ingrese la edad" style="border: 1px solid #D3D3D3;">

                </div>
                <div class="form-group">
                  <label>Sexo:</label>
                  <input type="text" class="form-control" name="profesorsexo" id="profesorsexo" placeholder="Ingrese el sexo" style="border: 1px solid #D3D3D3;">

                </div>
                <div class="form-group">
                  <label>Experiencia:</label>
                  <input type="text" class="form-control" name="profesorexperiencia" id="profesorexperiencia" placeholder="Ingrese la experiencia" style="border: 1px solid #D3D3D3;">

                </div>
                <div class="form-group">
                  <label>Grado:</label>
                  <input type="text" class="form-control" name="profesorgrado" id="profesorgrado" placeholder="Ingrese grado" style="border: 1px solid #D3D3D3;">

                </div>


                <input type="hidden" class="form-control" name="profesorusuarioid" id="profesorusuarioid" value="2">



                <center><button type="submit" name="insertar" class="btn btn-primary">Insertar</button></center>
              </form>

            </div>

          </div>

        </div>
      </div>

    </div>


    <div id="modalEditarProfesor" class="modal fade" role="dialog">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Editar profesor</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div class="box-body">

              <form method="POST" action=".././business/profesoraction.php" enctype="multipart/form-data">

                <div class="form-group">
                  <input type="hidden" name="profesorid" id="profesorid">


                </div>

                <div class="form-group">
                  <label>Nombre:</label>
                  <input type="text" class="form-control" name="profesornombre" id="profesornombre" readonly=true style="border: 1px solid #D3D3D3;">

                </div>
                <div class="form-group">
                  <label>Cedula: </label>
                  <input type="text" class="form-control" name="profesorcedula" id="profesorcedula" readonly=true style="border: 1px solid #D3D3D3;">
                </div>
                <div class="form-group">
                  <label>Edad: </label>
                  <input type="text" class="form-control" name="profesoredad" id="profesoredad" placeholder="Ingrese edad" style="border: 1px solid #D3D3D3;">
                </div>
                <div class="form-group">
                  <label>Sexo: </label>
                  <input type="text" class="form-control" name="profesorsexo" id="profesorsexo" placeholder="Ingrese sexo" style="border: 1px solid #D3D3D3;">
                </div>
                <div class="form-group">
                  <label>Experiencia: </label>
                  <input type="text" class="form-control" name="profesorexperiencia" id="profesorexperiencia" placeholder="Ingrese experiencia" style="border: 1px solid #D3D3D3;">
                </div>
                <div class="form-group">
                  <label>Grado: </label>
                  <input type="text" class="form-control" name="profesorgrado" id="profesorgrado" placeholder="Ingrese grado" style="border: 1px solid #D3D3D3;">
                </div>

                <center><button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button></center>
              </form>

            </div>

          </div>

        </div>
      </div>

    </div>

    <div id="modalVerCursos" class="modal fade" role="dialog">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Ver cursos por profesor</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div class="box-body">

              <table class="tabla-cursos table table-bordered table-hover">
                <thead>
                  <th>Sigla</th>
                  <th>Nombre</th>
                  <th>Estudiantes Matriculados</th>
                  <th>Periodo</th>
                </thead>

                <tbody id="cursos">


                </tbody>

              </table>

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

      $('#tabla-profesores').DataTable({
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


    $(function() {

      $('.tabla-cursos').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true

      });
    });
  </script>

  <script>
    $("#tabla-profesores tbody").on("click", "button.btnEditarProfesor", function() {


      var profesorid = $(this).attr("profesorid");


      var profesornombre = $(this).attr("profesornombre");
      var profesorcedula = $(this).attr("profesorcedula");
      var profesoredad = $(this).attr("profesoredad");
      var profesorsexo = $(this).attr("profesorsexo");
      var profesorexperiencia = $(this).attr("profesorexperiencia");
      var profesorgrado = $(this).attr("profesorgrado");
      var profesorusuarioid = $(this).attr("profesorusuarioid");
      console.log(profesorusuarioid);


      $("#modalEditarProfesor #profesorid").val(profesorid);
      $("#modalEditarProfesor #profesornombre").val(profesornombre);
      $("#modalEditarProfesor #profesorcedula").val(profesorcedula);
      $("#modalEditarProfesor #profesoredad").val(profesoredad);
      $("#modalEditarProfesor #profesorsexo").val(profesorsexo);

      $("#modalEditarProfesor #profesorexperiencia").val(profesorexperiencia);
      $("#modalEditarProfesor #profesorgrado").val(profesorgrado);
      // $("#modalEditarProfesor #profesorusuarioid").val(profesorusuarioid);



    });

    $(".tabla-profesores tbody").on("click", "button.btnVerCursos", function() {
      $("#cursos").empty();
      var profesorid = $(this).attr("profesorid");
      
      var datos = {
        id: profesorid,
        accion: "obtenerCursos"
      };
      console.log(datos);
      // console.log(datos);
      $.ajax({

        url: "../business/profesoraction.php",
        method: "POST",
        data: datos,

        success: function(respuesta) {

          console.log(respuesta);
          $("#cursos").append(respuesta);

        }

      });



    });

    $(".tabla-profesores tbody").on("click", "button.btnVerCursosTotal", function() {
      $("#cursos").empty();
      var profesorid = $(this).attr("profesorid");
    
      var datos = {
        id: profesorid,
        accion2: "obtenerTotalCursos"
      };
      console.log(datos);
      // console.log(datos);
      $.ajax({

        url: "../business/profesoraction.php",
        method: "POST",
        data: datos,

        success: function(respuesta) {
          Swal.fire({
        title: 'Total de cursos impartidos',
        text: respuesta
       
      })
          console.log(respuesta);
         

        }

      });



    });

    $(".tabla-profesores tbody").on("click", "button.btnEliminarProfesor", function() {

      var profesorid = $(this).attr("profesorid");

      Swal.fire({
        title: '¿Desea eliminar el profesor?',
        text: "No se podrá revertir el cambio",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "Cancelar",
        confirmButtonText: 'Eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = "../business/profesoraction.php?eliminarProfesor=true&profesorid=" + profesorid;
        }
      })


    });
  </script>


<script type="text/javascript">
    $(document).ready(function () {
        var url = window.location;
        url = url.toString().substring(0, 74);
        
        $('ul.menu-admin a[href="'+ url +'"]').parent().addClass('active');
        $('ul.menu-admin a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });
</script> 

<script type="text/javascript" src="js/backup.js"></script>
  </body>
</html>