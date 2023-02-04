<?php 
  
  if(isset($_GET['user'])){
    $usuario =$_GET['user'];
  }else{
    header("location: index.php");
  }


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/camps.png">
	<title>Iniciar sesión</title>
	<link rel="stylesheet" href="view/css/bootstrap.min.css">
	<link rel="stylesheet" href="view/css/login.css">
	<link rel="stylesheet" href="view/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="view/plugins/magic.min.css">
</head>
<body class="hold-transition login-page">

	<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary" style="border-radius: 1rem;">
    <div class="card-header text-center">
      <h2><b>Reestablecer clave</b></h2>
    </div>
    <div class="card-body">
      
      <form action="business/usuarioaction.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="usuarionombre" id="usuarionombre" class="form-control" placeholder="Nombre de usuario" readonly value="<?php echo $usuario ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="usuarioclaveactual" id="usuarioclaveactual" class="form-control" placeholder="Clave actual">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="usuarionuevaclave" id="usuarionuevaclave" placeholder="Nueva clave">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="usuarioverificarclave" id="usuarioverificarclave" placeholder="Verifique la clave">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
         
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" id="botonCambiar" name="cambiarClave" onclick="verificarCampos();" class="btn btn-danger btn-block">Cambiar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <br>
     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<br><br>
 <center><a href="index.php" class="btn btn-primary">Iniciar sesión</a></center>
<br><br><br><br>

<section class="footer-copyright border-top py-3 fixed-bottom" style=" background-color: #212a31;">
        <div class="container d-flex justify-content-center align-items-center">
            <p class="mb-0 producto-item-boton text-white"> Aula Virtual - Proyecto 1</p>

        </div>
    </section>
	
	<script src="view/plugins/jquery/jquery.js"></script>
	<script src="view/js/bootstrap.min.js"></script>
	<script>
		const selector = document.querySelector('.login-box')
		selector.classList.add('magictime', 'spaceInDown')

	</script>	

  <script>
    //event.preventDefault();


    function verificarCampos(){
      var claveActual = $("#usuarioclaveactual").val();
      var nuevaClave = $("#usuarionuevaclave").val();
      var verificarClave = $("#usuarioverificarclave").val();
      
      var espaciosEnBlanco = /^\S*$/;
      var mayusculas = /^(?=.*[A-Z]).*$/;
      var minusculas = /^(?=.*[a-z]).*$/;
      var numeros = /^(?=.*[0-9]).*$/;
      var caracterespecial =/^(?=.*[~`!@#$%^&*()--+={}\[\]|\\:;"'<>,.?/_₹]).*$/;
      var longitud = /^.{8,16}$/;

      if(!espaciosEnBlanco.test(nuevaClave)){
        $("#usuarionuevaclave").val("");
         alert("La clave no debe tener espacios en blanco.");
         $("#usuarionuevaclave").focus();
          event.preventDefault(); 
      }

      else if(!mayusculas.test(nuevaClave)){
        $("#usuarionuevaclave").val("");
         alert("La clave debe tener al menos una mayúscula.");
         $("#usuarionuevaclave").focus();
          event.preventDefault(); 
      }

      else if(!minusculas.test(nuevaClave)){
        $("#usuarionuevaclave").val("");
         alert("La clave debe tener al menos una minúscula.");
         $("#usuarionuevaclave").focus();
          event.preventDefault(); 
      }

      else if(!numeros.test(nuevaClave)){
        $("#usuarionuevaclave").val("");
         alert("La clave debe tener al menos un número.");
         $("#usuarionuevaclave").focus();
          event.preventDefault(); 
      }

      else if(!caracterespecial.test(nuevaClave)){
        $("#usuarionuevaclave").val("");
         alert("La clave debe tener al menos un caracter especial.");
         $("#usuarionuevaclave").focus();
          event.preventDefault(); 
      }else if(!longitud.test(nuevaClave)){
        $("#usuarionuevaclave").val("");
         alert("La clave debe tener tener una longitud de 8 a 16 caracteres.");
         $("#usuarionuevaclave").focus();
          event.preventDefault(); 
      }
      else{
        if( nuevaClave == verificarClave){
          return true;
        }else{
          alert("Las claves no coinciden")
          $("#usuarionuevaclave").focus();
          event.preventDefault();  
        }
      }

      
      
    }

  </script>
</body>
</html>