 <?php 

 	 session_start();
//   print_r($_SESSION);
    if(!isset($_SESSION['usuarioidentidad'])){
      header("location: ../index.php");
    }else{
      $usuario = $_SESSION['usuarioidentidad'];
    }
  ?>