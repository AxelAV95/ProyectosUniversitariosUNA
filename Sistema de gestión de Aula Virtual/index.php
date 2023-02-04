
<?php 

  

  session_start();
  if(isset($_SESSION['usuarioidentidad'])){
    if($_SESSION['usuariotipo'] == 1){
      header("location: view/admininicioview.php" );
    }else if($_SESSION['usuariotipo'] == 2){
      header("location: view/profesorinicioview.php?pagina=1" );
    }else if($_SESSION['usuariotipo'] == 3){
      header("location: view/estudianteinicioview.php?pagina=1" );
    }
  }


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Iniciar sesión</title>
  <link rel="icon" href="view/images/camps.png">
	<link rel="stylesheet" href="view/css/bootstrap.min.css">
	<link rel="stylesheet" href="view/css/login.css">
	<link rel="stylesheet" href="view/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="view/plugins/magic.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.css" />
</head>
<body class="hold-transition login-page">

	<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary" style="border-radius: 1rem;">


   
    <div class="card-header text-center">
      <center class="">
   <img src="https://eis.una.ac.cr/authenticationendpoint/images/una-logo.png" height="55" width="120">
</center>
      
    </div>
    <div class="card-body">
      <p class="login-box-msg">Iniciar sesión</p>

      <form action="business/usuarioaction.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="usuarionombre" class="form-control" placeholder="Nombre de usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="usuariopassword" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
         
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-danger btn-block" name="iniciarSesion">Acceder</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <br>
     <!--  <p class="mb-1 text-center">
        <a href="forgot-password.html">Olvidé mi contraseña</a>
      </p> -->
     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>



<br><br><br><br>

<section class="footer-copyright border-top py-3 fixed-bottom" style=" background-color: #212a31;">
        <div class="container d-flex justify-content-center align-items-center">
            <p class="mb-0 producto-item-boton text-white"> Aula Virtual - Proyecto 1</p>

        </div>
    </section>
	


  
	<script src="view/plugins/jquery/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.js"></script>
	<script src="view/js/bootstrap.min.js"></script>
	

<?php 
  //ALERTAS
echo '<script>';

if($_GET['mensaje']==1){
  echo "$.jGrowl('Contraseña actualizada',{theme: 'changeCount'});";
}else if($_GET['mensaje']==2){
  echo "$.jGrowl('Los datos de usuario ingresados no son válidos.',{theme: 'changeCount'});";
}else if($_GET['mensaje'] == 3){
  echo "$.jGrowl('Usuario no existe',{theme: 'changeCount'});";
}else if($_GET['mensaje'] == 4){
  echo " $.jGrowl('Error al iniciar sesión',{theme: 'changeCount'});";
}
echo "</script>";

?>

  <script>
		const selector = document.querySelector('.login-box')
		selector.classList.add('magictime', 'spaceInUp')

	</script>	


</body>
</html>