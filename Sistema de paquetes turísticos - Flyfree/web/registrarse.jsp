<%-- 
    Document   : registrarse
    Created on : 16/05/2018, 09:09:41 PM
    Author     : andra
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
	<title>Registrarse</title>
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
				<h2> REGISTRARSE </h2>
			</div>
		</header>
		<div class="login">

			<form action ="./persona.do">
                            <input type="hidden" name="metodo" value="registrarPersona">
				<input id ="user" class="user" type="text" name="nombre" placeholder="Nombre" required="true"> <br>
				<input class="papellido" type="text" name="apellido1" placeholder="Primer apellido" required="true"> <br>
				<input class="sapellido" type="text" name="apellido2" placeholder="Segundo apellido" required="true"> <br>
				<input class="email" type="text" name="email" placeholder="Email" required="true"> <br>
				<input class="pass" type="password" name="pass" placeholder="Contraseña" required="true"> <br>
			
				<input class="pais" type="text" name="pais" placeholder="País" required="true"> <br>
                <div class ="radio"> 
                            <input class="checkmark1" type="radio" name="genero" value="Masculino"><label class="mas" style="font-size: 23px;">Masculino</label><br> 
                        <input class="checkmark2" type="radio" name="genero" value="Femenino"> <label class="fem" style="font-size: 23px;">Femenino</label><br>
                        </div>
                        <input class="telefono" type="text" name="telefono" placeholder="Teléfono" required="true"> <br>
			<input class="enviar" type="submit" name="" value="Registrarse">
			</form>
		</div>

		<footer class="fot margen-interno">
			<nav class="pie">
				<a href="#">Fly free</a>
			</nav>
		</footer>
	</div>

</body>
</html>
