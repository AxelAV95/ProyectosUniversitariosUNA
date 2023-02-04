<?php 

include '../business/profesorbusiness.php';
include '../business/cursobusiness.php';
include '../business/carrerabusiness.php';
include '../business/vigenciabusiness.php';
$profesorBusiness = new ProfesorBusiness();
$profesores = $profesorBusiness->getAllTBProfesores();
$cursoBusiness = new CursoBusiness();
$cursos = $cursoBusiness->getAllTBCursos();
$carreraBusiness = new CarreraBusiness();
$carreras = $carreraBusiness->getAllTBCarreras();
$vigenciaBusiness = new VigenciaBusiness();
$vigencias = $vigenciaBusiness->getAllTBVigencias();

 ?>
 <?php 
include 'modulos/sesion.php';
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

  <style>
    #tabla-cursos_filter input {
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
              <!--<div class="card-header">
                 <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCurso">

                  Agregar Curso

                </button> 
              </div>-->
              <!-- /.card-header -->
              <div class="row">
                <div class="col">
                  <div class="card">

                    <div class="card-header">
                      <h3 class="card-title"> Cursos</h3>
                    </div>

                    <div class="card-body">
                      <table id="tabla-cursos" class="tabla-cursos table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Sigla</th>
                            <th>Nombre</th>
                         
                            <th>Estado </th>
                            
                            <th>Profesor </th>
                            <th>Acciones </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($cursos as $curso) {
                            //var_dump($profesor);
                            echo '<tr>';
                            echo '<td>' . $curso['cursosigla'] . '</td>';

                            echo '<td>' . $curso['cursonombre'] . '</td>';

                           

                           // echo '<td>' . $curso['cursovigenciaid'] . '</td>';
                           echo '<td >';
                           echo '<span class="badge badge-light">' . $vigenciaBusiness->getTipoVigencia($curso['cursovigenciaid'])[0]['vigenciadescripcion'] . '</span>';
                           echo '</td>';

                            

                            echo '<td>' . $profesorBusiness->obtenerDatosProfesorPorId($curso['cursoprofesorid'])[0]['profesornombre']  . '</td>';
                            echo '<td class="text-center">';
                            echo "<div class='btn-group'><button class='btn btn-warning btnEditarCurso mr-2' cursoid='". $curso["cursoid"]."' cursosigla='" . $curso["cursosigla"] . "' cursonombre='" . $curso['cursonombre'] . "'cursocupo='" . $curso['cursocupo'] . "'cursovigenciaid='" . $curso['cursovigenciaid'] . "'cursocarreraid='" . $curso['cursocarreraid'] . "'cursoprofesorid='" . $curso['cursoprofesorid'] . "' data-toggle='modal' data-target='#modalEditarCurso'><i class='fa fa-pencil-alt'></i></button><button class='btn btn-danger btnEliminarCurso' cursoid='" . $curso["cursoid"] . "' ><i class='fa fa-times'></i></button></div>";
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

    <div id="modalAgregarCurso" class="modal fade" role="dialog">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Agregar Curso</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div class="box-body">

              <form method="POST" action=".././business/cursoaction.php?">

              <div class="form-group">
                  <label>Sigla: </label>
                  <input type="text" class="form-control" name="cursosigla" id="cursosigla" placeholder="Ingrese sigla">
                </div>
                <div class="form-group">
                  <label>Nombre:</label>

                  <input type="text" class="form-control" name="cursonombre" id="cursonombre" placeholder="Ingrese el nombre">

                </div>
                <div class="form-group">
                  <label>Cupo: </label>
                  <input type="text" class="form-control" name="cursocupo" id="cursocupo" placeholder="Ingrese cupos">
                </div>
                <label>Vigencia: </label>

                <div class="form-group">
                  <select class="cursovigenciaid form-control" name="cursovigenciaid" id="cursovigenciaid">

                    <option selected>Seleccione la vigencia</option>

                    <?php foreach ($vigencias as $vigencia) {

                      echo ' <option value="' . $vigencia['vigenciaid'] . '" class="badge badge-pill badge-warning" style="font-size: 15px;">' . $vigencia['vigenciadescripcion'] . '</option>';
                    } ?>




                  </select>
                </div>
                <label>Carrera: </label>

                <div class="form-group">
                  <select class="cursocarreraid form-control" name="cursocarreraid" id="cursocarreraid">

                    <option selected>Seleccione la carrera</option>

                    <?php foreach ($carreras as $carrera) {

                      echo ' <option value="' . $carrera['carreraid'] . '" class="badge badge-pill badge-warning" style="font-size: 15px;">' . $carrera['carreranombre'] . '</option>';
                    } ?>




                  </select>
                </div>
                <label>Profesor: </label>

                <div class="form-group">
                  <select class="cursoprofesorid form-control" name="cursoprofesorid" id="cursoprofesorid">

                    <option selected>Seleccione el profesor</option>

                    <?php foreach ($profesores as $profesor) {

                      echo ' <option value="' . $profesor['profesorid'] . '" class="badge badge-pill badge-warning" style="font-size: 15px;">' . $profesor['profesornombre'] . '</option>';
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


    <div id="modalEditarCurso" class="modal fade" role="dialog">

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

              <form method="POST" action="../business/cursoaction.php" enctype="multipart/form-data">

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
                  <input type="text" class="form-control" name="cursocupo" id="cursocupo" readonly=true>
                </div>

               

                <label>Vigencia del curso: </label>

                <div class="form-group">
                  <select class="cursovigenciaid form-control" name="cursovigenciaid" id="cursovigenciaid" style="border: 1px solid #D3D3D3;">

                    <option selected>Seleccione la vigencia</option>

                    <?php foreach ($vigencias as $vigencia) {

                      echo ' <option value="'.$vigencia['vigenciaid'] . '" class="badge badge-pill badge-warning" style="font-size: 15px;">' . $vigencia['vigenciadescripcion'] . '</option>';
                    } ?>




                  </select>
                </div>

                <div class="form-group">
                  <select class="cursociclo form-control" name="cursociclo" style="border: 1px solid #D3D3D3;">

                    <option value="Ciclo I">Ciclo I</option>
                    <option value="Ciclo II">Ciclo II</option>





                  </select>
                </div>
              
                <div class="form-group">
                  <label>Carrera: </label>
                  <input type="text" class="form-control" name="cursocarreraid" id="cursocarreraid" readonly=true>
                </div>
                <div class="form-group">
                  <label>Profesor: </label>
                  <input type="text" class="form-control" name="cursoprofesorid" id="cursoprofesorid" readonly=true>
                </div>

                <center><button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button></center>
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
    $("#tabla-cursos tbody").on("click", "button.btnEditarCurso", function() {
 
      var cursoid = $(this).attr("cursoid");
      var cursosigla = $(this).attr("cursosigla");
      var cursonombre = $(this).attr("cursonombre");
      var cursocupo = $(this).attr("cursocupo");
      var cursovigenciaid = $(this).attr("cursovigenciaid");
      var cursocarreraid = $(this).attr("cursocarreraid"); 
      var cursoprofesorid = $(this).attr("cursoprofesorid");
    


      $("#modalEditarCurso #cursoid").val(cursoid);
      $("#modalEditarCurso #cursosigla").val(cursosigla);
      $("#modalEditarCurso #cursonombre").val(cursonombre);
      $("#modalEditarCurso #cursocupo").val(cursocupo);
      $("#modalEditarCurso #cursovigenciaid").val(cursovigenciaid);
      $("#modalEditarCurso #cursocarreraid").val(cursocarreraid);
      $("#modalEditarCurso #cursoprofesorid").val(cursoprofesorid);
      



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
          window.location = "../business/cursoaction.php?eliminar=true&cursoid=" + cursoid;

        }
      })


    });
  </script>
<script type="text/javascript">
    $(document).ready(function () {
        var url = window.location;
        url = url.toString().substring(0, 71);
        $('ul.menu-admin a[href="'+ url +'"]').parent().addClass('active');
        $('ul.menu-admin a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });
</script> 

<script type="text/javascript" src="js/backup.js"></script>

  </body>
</html>