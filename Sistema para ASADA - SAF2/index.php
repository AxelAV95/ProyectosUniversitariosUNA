
<?php
//Iniciamos la sesión
session_start();

//Evitamos que nos salgan los NOTICES de PHP
error_reporting(E_ALL ^ E_NOTICE);


//Comprobamos si la sesión está iniciada
//Si existe una sesión correcta, mostramos la página para los usuarios
//Sino, mostramos la página de acceso y registro de usuarios
if(isset($_SESSION['usuario']) and $_SESSION['estado'] == 'Autenticado' && $_SESSION['tipo']=='1') {
    header("Location: login/login.php");
	
	die();
} else if(isset($_SESSION['usuario']) and $_SESSION['estado'] == 'Autenticado' && $_SESSION['tipo']=='2'){
  header("Location: login/login.php");
  die();
}else if(!isset($_SESSION['usuario']) and !$_SESSION['estado'] == 'Autenticado' && !$_SESSION['tipo']=='2'){
  header("Location: login/login.php");
  die();
}
?>

