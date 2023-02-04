<?php
//Conectamos a la base de datos
require('../data/conexion.php');

//Obtenemos los datos del formulario de registro
echo $userPOST = $_POST["correo"]; 
echo $passPOST = $_POST["pass"];

/*echo '<script>var d = <?php echo $userPOST ?>";alert("Hola"+d);</script>';*/



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
//$userPOSTMinusculas = strtolower($userPOST);

//Escribimos la consulta necesaria
$consultaUsuarios = "SELECT `empleadoid` FROM `tbempleado` WHERE `empleadocorreo` ='".$userPOST."'";

//Obtenemos los resultados
$resultadoConsultaUsuarios = mysqli_query($conexion, $consultaUsuarios) or die(mysql_error());
$datosConsultaUsuarios = mysqli_fetch_array($resultadoConsultaUsuarios);
$userID = $datosConsultaUsuarios['empleadoid'];

//obtenemos maxid
$nextID = 0;
$consultaMax = "SELECT MAX(multiloginid) AS multiloginid  FROM tbmultilogin";
$resultado = mysqli_query($conexion, $consultaMax) or die(mysql_error());
$datosMax = mysqli_fetch_array($resultado);
echo $nextID = $datosMax['multiloginid']+1;

//Si el input de usuario o contraseña está vacío, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error
if(empty($userPOST) || empty($passPOST)) {
	echo '<script>alert("datos vacios");</script>';
} else {
//Si no hay errores, procedemos a encriptar la contraseña
//Lectura recomendada: https://mimentevuela.wordpress.com/2015/10/08/establecer-blowfish-como-salt-en-crypt-2/
	
	

    //Armamos la consulta para introducir los datos
   echo $consulta = "INSERT INTO `tbmultilogin`(`multiloginid`, `multiloginempleadoid`, `multiloginpassword`, `multilogintipousuario`) 
    VALUES ('$nextID','$userID', '$passPOST' , '2')";
	//$consulta = "INSERT INTO `mmv005` (username, usernamelowercase, password) 
	//VALUES ('$userPOST', '$userPOSTMinusculas' , '$passwordConSalt')";
	
	//Si los datos se introducen correctamente, mostramos los datos
	//Sino, mostramos un mensaje de error
	if(mysqli_query($conexion, $consulta)) {
        
        die('<script>;
        window.location.replace("login.php?alert=2");
        </script>
Registrado con éxito <br>
Ya puedes acceder a tu cuenta <br>
<br>
Datos:<br>
Usuario: '.$userPOST.'<br>
Contraseña: '.$passPOST);
	} else {
		die('Error');
	};
};///Fin comprobación if(empty($userPOST) || empty($passPOST))
?>