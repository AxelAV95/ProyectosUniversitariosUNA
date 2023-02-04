<?php
//Reanudamos la sesión
session_start();

//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
if($_SESSION['tipo'] == '1'){
	header('Location: index.php');
}


if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado' ) {
	header('Location: index.php');
	die();
} else {
	$estado = $_SESSION['usuario'];
	$salir = '<a href="logout.php" target="_self">Cerrar sesión</a>';
	//require('recursos/sesiones.php');
};
?>

<meta charset="utf-8">
<title>Bienvenido usuario</title>
</head>

<body>
<div><p>Hola, <?php echo $estado; ?><br>
<?php echo $salir; ?></p><div>

<a href="test.php">Da click papu</a>
</body>
</html>