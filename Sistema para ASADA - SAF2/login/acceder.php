<?php
	
//Conectamos a la base de datos
require('../data/conexion.php');

//Obtenemos los datos del formulario de acceso
$userPOST = $_POST["correo"]; 
$passPOST = $_POST["pass"];

/*if(isset($userPOST ) && isset($passPOST )){
  header('Location: login.php');
} */

//Filtro anti-XSS
$userPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $userPOST));
$passPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $passPOST));

//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos
$maxCaracteresUsername = "50";
$maxCaracteresPassword = "60";

//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
if(strlen($userPOST) > $maxCaracteresUsername) {
	die('El nombre de usuario no puede superar los '.$maxCaracteresUsername.' caracteres');
};

if(strlen($passPOST) > $maxCaracteresPassword) {
	die('La contraseña no puede superar los '.$maxCaracteresPassword.' caracteres');
};

//Pasamos el input del usuario a minúsculas para compararlo después con
//el campo "usernamelowercase" de la base de datos
$userPOSTMinusculas = strtolower($userPOST);

//Escribimos la consulta necesaria
$consulta = "SELECT * FROM `tbempleado` WHERE `empleadocorreo`='".$userPOST."'";

//Obtenemos los resultados
$resultado = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_array($resultado);

//Guardamos los resultados del nombre de usuario en minúsculas
//y de la contraseña de la base de datos
$userID = $datos['empleadoid'];
$userBD = $datos['empleadocorreo'];


$consulta2 = "SELECT  `empleadocorreo`,`multiloginid`, `multiloginempleadoid`, `multiloginpassword`, `multilogintipousuario` FROM tbempleado INNER JOIN tbmultilogin ON tbmultilogin.multiloginempleadoid ='".$userID."'";
$resultado2 = mysqli_query($conexion, $consulta2);
$datos2 = mysqli_fetch_array($resultado2);

$passwordBD = $datos2['multiloginpassword'];

if($userBD == "" && $passPOST == ""){

  

  echo '<script>$(".submit").addClass("loading");
  setTimeout(function() {
    $(".submit").addClass("hide-loading");
    // For failed icon just replace ".done" with ".failed"
    $(".failed").addClass("finish");
    
  }, 1000);
  setTimeout(function() {
    $(".submit").removeClass("loading");
    $(".submit").removeClass("hide-loading");
    $(".done").removeClass("finish");
    $(".failed").removeClass("finish");
    $.alert({
      useBootstrap: false,
       boxWidth: "30%",
        title: "Falta información",
        type: "red",
        closeIcon: true,
        draggable: true,
        backgroundDismiss: true,
       content: "Por favor ingresar datos.",
       animation: "scaleX" 


    }); 
   
   
   
  }, 2000);</script>';

}else if($userBD == $userPOST && $passPOST == $passwordBD){

	session_start();
	$_SESSION['usuario'] = $datos['empleadocorreo'];
  $_SESSION['estado'] = 'Autenticado';
  echo $_SESSION['tipo'] = $datos2['multilogintipousuario'];
   echo '<script>
   
   $(".submit").addClass("loading");
   setTimeout(function() {
     $(".submit").addClass("hide-loading");
     // For failed icon just replace ".done" with ".failed"
     $(".done").addClass("finish");

     
     $.alert({
      useBootstrap: false,
       boxWidth: "30%",
        title: "Éxito",
        type: "green",
        backgroundDismiss: true,
       content: "Inicio exitoso, redireccionando....",
       animation: "scaleX" 


    }); 
     
   }, 3000);
   setTimeout(function() {
     $(".submit").removeClass("loading");
     $(".submit").removeClass("hide-loading");
     $(".done").removeClass("finish");
     $(".failed").removeClass("finish");

     
     
     window.location.replace("../index.php");
   
    
   }, 5000);
  
   
   
   </script>';
   // include('index.php');
	/* Sesión iniciada, si se desea, se puede redireccionar desde el servidor */

//Si los datos no son correctos, o están vacíos, muestra un error
//Además, hay un script que vacía los campos con la clase "acceso" (formulario)
} else if ( $userBD != $userPOSTMinusculas || $userPOST == "" || $passPOST == "" || !password_verify($passPOST, $passwordBD) ) {
    echo '<script>$(".submit").addClass("loading");
    setTimeout(function() {
      $(".submit").addClass("hide-loading");
      // For failed icon just replace ".done" with ".failed"
      $(".failed").addClass("finish");
      $.alert({
        useBootstrap: false,
        type: "red",
         boxWidth: "30%",
          title: "Error",
          closeIcon: true,
          draggable: true,
          backgroundDismiss: true,
         content: "Datos incorrectos.",
         animation: "scaleX" 
  
  
      }); 
    }, 3000);
    setTimeout(function() {
      $(".submit").removeClass("loading");
      $(".submit").removeClass("hide-loading");
      $(".done").removeClass("finish");
      $(".failed").removeClass("finish");
      $("#acceso")[0].reset();
     
    }, 5000);</script>';
    
    //die ('<script>$(".acceso").val("");</script>Los datos de acceso son incorrectos');
} else {
	die('Error');
};
?>