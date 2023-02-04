
<?php 
include '../business/estudiantebusiness.php';
include 'modulos/sesion.php';
//print_r($_SESSION);

$estudianteBusiness = new EstudianteBusiness();
$cursosEstudiante = $estudianteBusiness->obtenerCursosEstudiante($_SESSION['estudianteid']);
//print_r($cursosEstudiante);
$historialCursos = $estudianteBusiness->obtenerHistorialCursosEstudiante($_SESSION['estudianteid']);
$carrera = $estudianteBusiness->obtenerCarreraNombre($_SESSION['estudiantecarreraid']);
$perfil = $estudianteBusiness->obtenerAvatarEstudiante($_SESSION['estudiantecedula']);

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


	<style>
		#cursos_filter input{
			border: 1px solid #D3D3D3;
		}

		.img-circle{border-radius:50%}
		.profile-user-img{border:3px solid #adb5bd;margin:0 auto;padding:3px;width:100px}
		.profile-username{font-size:21px;margin-top:5px}
	</style>
</head>
<body>

	<div class="wrapper d-flex align-items-stretch ">

		<?php include 'modulos/estudiante/sidebarestudiante.php' ?>
		

	<div id="content" class="p-4 p-md-5 pt-5 ">
		
		 <!--============================
		 =            Perfil
		 =============================-->

		 <div id="content" class="p-4 p-md-5 pt-5 ">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">Perfil</li>
					
				</ol>
			</nav>

			<div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"  src="
                  <?php 
                  	if($perfil[0]['usuarioimgperfil'] == "" || $perfil[0]['usuarioimgperfil'] == "Null" || $perfil[0]['usuarioimgperfil'] == "img.png"  ){
                  		echo 'images/default/userdefault.png';
                  	}else{
                  		echo $perfil[0]['usuarioimgperfil'] 		;
                  	}
                  


                ?>" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php 	echo $_SESSION['estudiantenombre'] ?></h3>

                <p class="text-muted text-center"><?php 	echo $_SESSION['estudiantecedula'] ?></p>

              

                <a href="#" class="btn btn-primary btn-block editarImagen" imagen="<?php echo $perfil[0]['usuarioimgperfil'] ?>" estudiantecedula="<?php echo $_SESSION['estudiantecedula'] ?>" usuarioid="<?php echo $_SESSION['usuarioid'] ?>" data-toggle="modal" data-target="#modalModificarPerfil" style="font-size: 13px;"><b>Cambiar imagen</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detalles del usuario</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Carrera</strong>

                <p class="text-muted">
                 <?php echo $carrera[0]['carreranombre'] ?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Dirección</strong>

                <p class="text-muted"><?php echo $_SESSION['estudiantedireccion'] ?></p>

                

              
              </div>
              <!-- /.card-body -->
            </div>
        </div>


 		</div>

	</div>


<div id="modalModificarPerfil" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Cambiar imagen</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <form method="POST" action="../business/estudianteaction.php"  enctype="multipart/form-data">
       				
       				 <div class="form-group">
                <input type="hidden" name="estudiantecedula" id="estudiantecedula">
                <input type="hidden" name="usuarioid" id="usuarioid">
              </div>

              <div class="form-group">
                <label >Imagen: </label>
                <input type="file" class="nuevaImagen" name="editarImagen">

                <p class="help-block">Peso máximo de la imagen 2MB</p>

                <img src="" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="imagenActual" id="imagenActual">

              </div>
              
             <center><button type="submit" name="actualizarPerfil" class="btn btn-primary">Actualizar</button></center> 
            </form>

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
        title: '<div style=margin-top:0.5rem;>Actualizado con éxito.</div>'
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

	$(".editarImagen").on("click",function(){
		var img = $(this).attr("imagen");
		var cedula = $(this).attr("estudiantecedula");
		var usuarioid = $(this).attr("usuarioid");
		
		$("#modalModificarPerfil #imagenActual").val(img);
		$("#modalModificarPerfil .previsualizar").attr("src", img);
		$("#modalModificarPerfil #estudiantecedula").val(cedula);
		$("#modalModificarPerfil #usuarioid").val(usuarioid);

	});
	
	$(".nuevaImagen").change(function(){

  var imagen = this.files[0];
  
  /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

      $(".nuevaImagen").val("");

       Toast.fire({
          title: "Error al subir la imagen",
          text: "¡La imagen debe estar en formato JPG o PNG!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }else if(imagen["size"] > 2000000){

      $(".nuevaImagen").val("");

       Toast.fire({
          title: "Error al subir la imagen",
          text: "¡La imagen no debe pesar más de 2MB!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }else{

      var datosImagen = new FileReader;
      datosImagen.readAsDataURL(imagen);

      $(datosImagen).on("load", function(event){

        var rutaImagen = event.target.result;

        $(".previsualizar").attr("src", rutaImagen);

      })

    }
})
</script>


<script type="text/javascript">
    $(document).ready(function () {
        var url = window.location;
        $('ul.menu-estudiante a[href="'+ url +'"]').parent().addClass('active');
        $('ul.menu-estudiante a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });
</script> 

</body>
</html>