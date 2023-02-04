<?php  
  
  include '../../business/ordenbusiness.php';

  $ordenBusiness = new OrdenBusiness();
  $ordenes = $ordenBusiness->getAllTBOrdenes();
  
?>

<?php 
   include 'template/sesion.php';
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Orden | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Navbar -->
  <?php include 'template/header.php' ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link d-flex justify-content-center ">
     <!--  <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Panel de administración SO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background: #0f0c29;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
      
        <div class="info d-flex justify-content-between">
          <i class="fas fa-user text-light mr-3" style="font-size: 23px;"></i>
          <a href="#" class="d-block"><?php echo $usuario ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="index.php" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="productoview.php" class="nav-link ">
              <i class="nav-icon fas fa-hamburger"></i>
              <p>
                Productos
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="ordenview.php" class="nav-link active">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Órdenes
              </p>
            </a>
          </li>

           <li class="nav-item ">
            <a href="categoriaview.php" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Categorías
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="usuarioview.php" class="nav-link">
               <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="usuarioview.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="fas fa-users-cog nav-icon"></i>
                  <p>Gestionar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tipousuarioview.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="fas fa-users-cog nav-icon"></i>
                  <p>Tipos</p>
                </a>
              </li>
            </ul>
          </li>
         
         <li class="nav-item ">
            <a href="historialview.php" class="nav-link">
               <i class="nav-icon fas fa-history"></i>
              <p>
                Historial
              </p>
            </a>
          </li>

          

         <li class="nav-item ">
            <a href="../../business/usuarioaction.php?cerrarSesion=true" class="nav-link">
               <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Cerrar sesión
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Órdenes</h1>
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
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="ordenes" class="tabla-ordenes table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Cliente</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Método</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    <?php 
                        foreach($ordenes as $orden){
                          echo '<tr>';
                          echo '<td>'.$orden['ordenclientenombre'].'</td>';
                          echo '<td>'.$orden['ordenclientetelefono'].'</td>';
                          echo '<td>'.$orden['ordenclientecorreo'].'</td>';

                         

                          if($orden['ordenmetodo'] == 1){
                             echo '<td><span class="badge badge-pill badge-info">Efectivo</span></td>';

                          }else if($orden['ordenmetodo'] == 2){
                              echo '<td><span class="badge badge-pill badge-info">Sinpe</span></td>';
                          }else if($orden['ordenmetodo'] == 3){
                              echo '<td><span class="badge badge-pill badge-info">Tarjeta</span></td>';
                          }

                          echo '<td>'.$orden['ordenfecha'].'</td>';
                          echo '<td>'.$orden['ordentotal'].'</td>';

                          if($orden['ordenestado'] == 1){
                            echo '<td><span class="badge badge-success">Completada</span></td>';
                          }else if($orden['ordenestado'] == 2){
                            echo '<td><span class="badge badge-warning">Pendiente</span></td>';
                          }else if($orden['ordenestado'] == 3){

                          }
                        //  echo '<td>'.$orden['ordenestado'].'</td>';
                          echo '<td>';
                          echo "<div class='btn-group'><button class='btn btn-warning btnEditarOrden' ordenid='".$orden["ordenid"]."' ordenestado='".$orden["ordenestado"]."' data-toggle='modal' data-target='#modalEditarOrden'><i class='fa fa-pencil-alt'></i></button>
                            <button class='btn btn-primary btnVerDetalleOrden' ordenid='".$orden["ordenid"]."' data-toggle='modal' data-target='#modalVerDetalleOrden'><i class='fas fa-info-circle'></i></i></button>
                            <button class='btn btn-danger btnEliminarOrden' ordenid='".$orden["ordenid"]."' ><i class='fa fa-times'></i></button></div>";
                          echo '</td>';
                          echo '</tr>';
                        }




                    ?>


                  </tbody>
                 
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'template/footer.php'; ?>

  <div id="modalEditarOrden" class="modal fade" role="dialog">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Procesar orden</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <form method="POST" action="../../business/ordenaction.php"  enctype="multipart/form-data">

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" >Estado</label>
                </div>
                <select class="ordenestado" name="ordenestado" id="ordenestado">

                  <option selected >Elegir...</option>
                  <option value="2" class="badge badge-pill badge-warning" style="font-size: 15px;">Pendiente</option>
                  <option value="1" style="font-size: 15px;" class="badge badge-pill badge-success">Completado</option>
                  
                </select>
              </div>
              <div class="form-group">
                <input type="hidden" name="ordenid" id="ordenid">
                
              </div>
              
              <center><button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button></center> 
            </form>

          </div>

        </div>

      </div>
    </div>

  </div>

  <div id="modalVerDetalleOrden" class="modal fade" role="dialog">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Detalle orden</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <table class="tabla-detalles table table-bordered table-hover">
              <thead>
                <th>ID</th>
                <th>N°Orden</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
              </thead>

              <tbody id="detalles">
                

              </tbody>
              
            </table>

          </div>

        </div>

      </div>
    </div>

  </div>


</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

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

<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<script src="https://unpkg.com/web-audio-daw"></script>
<script src="dist/js/notificacion.js"></script>

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
  if($_GET['mensaje']==1){ //insertar
    echo "Toast.fire({
         icon: 'success',

        title: '<div style=margin-top:0.5rem;>Insertado con éxito.</div>'
     });";
  }else if($_GET['mensaje']==2){ //actualizar
    echo "Toast.fire({
         icon: 'success',
        title: '<div style=margin-top:0.5rem;>Actualizado con éxito.</div>'
     });";
  }else if($_GET['mensaje'] == 3){ //eliminar
    echo "Toast.fire({
         icon: 'success',
        title: '<div style=margin-top:0.5rem;>Eliminado con éxito.</div>'
     });";
  }else if($_GET['mensaje'] == 4){ //error
    echo " Toast.fire({
        icon: 'error',
        title: '<div style=margin-top:0.5rem;>Error al efectuar la operación.</div>'
      })";
  }
  echo "</script>";

?>

<script>
  $(function () {

    $('#ordenes').DataTable({
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
       "order": [[7, 'desc']]
    });
  });
</script>


<script>
  $(".tabla-ordenes tbody").on("click", "button.btnEditarOrden", function(){

    var ordenid = $(this).attr("ordenid");
    var ordenestado = $(this).attr("ordenestado");
   
    $("#modalEditarOrden #ordenid").val(ordenid);
    if(ordenestado == 1){
      $("#modalEditarOrden #ordenestado").val('1');
    }else if(ordenestado == 2){
      $("#modalEditarOrden #ordenestado").val('2'); 
    }
    

  

});

  $(".tabla-ordenes tbody").on("click", "button.btnVerDetalleOrden", function(){
    $("#detalles").empty();
    var ordenid = $(this).attr("ordenid");
    $("#modalEditarOrden #ordenid").val(ordenid);
    var datos = {id: ordenid, accion: "obtenerDetalles"};
    console.log(datos);
   // console.log(datos);
    $.ajax({

              url:"../../business/ordenaction.php",
              method: "POST",
              data: datos,
              
              success:function(respuesta){
                  
                  console.log(respuesta);
                  $("#detalles").append(respuesta);

              }

    });

  

});

  
$(".tabla-ordenes tbody").on("click", "button.btnEliminarOrden", function(){

  var ordenid = $(this).attr("ordenid");
 
  Swal.fire({
        title: '¿Desea eliminar la orden?',
        text: "No se podrá revertir el cambio",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
         cancelButtonText: "Cancelar",
        confirmButtonText: 'Eliminar'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "../../business/ordenaction.php?eliminar=true&id="+ordenid;
     
          }
    })


});

</script>


</body>
</html>
