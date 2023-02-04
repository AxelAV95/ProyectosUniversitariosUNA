<%-- 
    Document   : insertarDestino
    Created on : 16/05/2018, 09:33:22 PM
    Author     : andra
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
	<title>Insertar destino</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estiloGeneral.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/tablas.css">
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
				<h2> INSERTAR DESTINOS</h2>
			</div>
		</header>
		 
		<div class="insertar-destino">
			

			<center>
                <form action="../../insertardestino" method="POST"> 
                    <center>
                        <table BORDER=1 style="margin-top: 50px;">   
                            <tr>
                                <td><label> Nombre: </label></td>
                                <td><p><input type="text" name="destinonombrer"  id="destinonombrer" placeholder="Nombre" required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})" /></p></td>
                            </tr>

                            <tr>
                                <td><label> Ubicacion: </label></td>
                                <td><p><input type="text" name="destinoubicacionr" id="destinoubicacionr" placeholder="Ubicacion" required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"/></p></td>
                            </tr>
                                    
                        </table>
                        <button class="boton">Registrar </button> 
                        <button type="submit" class="boton3" onclick="location = './destino.do?metodo=mostrarDestinos'"> Atras</button>
                    </center>
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
