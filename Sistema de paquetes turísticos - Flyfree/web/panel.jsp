<%-- 
    Document   : panel
    Created on : 20/05/2018, 07:57:53 PM
    Author     : andra
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
	<title>Panel</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estiloGeneral.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sarala" rel="stylesheet">
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Marmelad" rel="style">
</head>
<body>
	<div class="padre">
		<div class="sesion">
			<h1 class="welcome">Bienvenido invitado</h1>
		</div>
		<header class="header">

			<div class="menu">
				<div class="logo">
					<a href="index.html"><img class="fly" src="images/flyfreelogo.png" height="82" width="222"></a>
				</div>
				<div class="nav">
					<a href="index.html">Inicio</a></li>
    				<a href="iniciarsesion.html">Iniciar sesión</a></li>
    				<a href="#">Sobre nosotros</a></li>
    				<a href="#">Tours</a></li>
    				<a href="#">Paquetes</a></li>
    				<a href="#">Contáctenos</a></li>

				</div>
			</div>
			<div class="encabezado">
				<h2> PANEL </h2>
			</div>
		</header>
		 
		<div class="panel">
                   
                    <div class="opcion"><a href="./destino.do?metodo=mostrarDestinos"><h1 class="txt-panel">Destinos</h1><img class="img-panel" src="images/logo2.png"></a></div>
                    <div class="opcion"><a href="./paquete.do?metodo=mostrarPaquetes"><h1 class="txt-panel">Paquetes</h1><img class="img-panel" src="images/logo2.png"></a></div>
                    <div class="opcion"><a href="./persona.do?metodo=mostrarPersonas"><h1 class="txt-panel">Clientes</h1><img class="img-panel" src="images/logo2.png"></a></div>
                    <div class="opcion"><a href=""><h1 class="txt-panel">Feedback</h1><img class="img-panel" src="images/logo2.png"></a></div>
                    <div class="opcion"><a href=""><h1 class="txt-panel">Facturas</h1><img class="img-panel" src="images/logo2.png"></a></div>
                    <div class="opcion"><a href=""><h1 class="txt-panel">Servicios</h1><img class="img-panel" src="images/logo2.png"></a></div>
                    <div class="opcion"><a href=""><h1 class="txt-panel">Reservas</h1><img class="img-panel" src="images/logo2.png"></a></div>
                    <div class="opcion"><a href="./paquete.do?metodo=mostrarPaquetesDisponibles"><h1 class="txt-panel">Paquetes disponibles</h1><img class="img-panel" src="images/logo2.png"></a></div>
                       
		
		
                </div>
		<footer class="fot margen-interno">
			<nav class="pie">
				<a href="#">Fly free</a>
			</nav>
		</footer>
	</div>

</body>
</html>