<%-- 
    Document   : verDestinos
    Created on : 16/05/2018, 10:03:38 PM
    Author     : andra
--%>

<%@page import="java.util.LinkedList"%>
<%@page import="com.flyfree.dominio.Destinos"%>
<%@page import="com.flyfree.dominio.Destinos"%>
<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
	<title>Insertar destino</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estiloGeneral.css">
        <link rel="stylesheet" type="text/css" href="css/tablas.css">
	<link rel="stylesheet" type="text/css" href="fontawesome.min.css">
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
				<h2> VER DESTINOS</h2>
			</div>
		</header>
		 <%
            //recuperar lista
            Destinos destino = (Destinos) request.getAttribute("destino");
            LinkedList<Destinos> listaDestinos = (LinkedList<Destinos>) request.getAttribute("destinos");// parseo linked list
        %> 
		<div class="tabla-destinos">
			<button class="boton" onclick="location = 'insertarDestino.jsp'">Nuevo Destino </button> 
                <br/><br/> 

			<center>
                <table BORDER="1">
                    <th>Nombre:</th>
                    <th>Ubicacion</th>
                    <th>Modificar:</th>
                    <th>Eliminar</th>

                    <c:forEach var="destinos" items="${destinos}" >           
                        <tr>
                            <td><c:out value="${destinos.getDestinonombre()}"/></td>     
                            <td><c:out value="${destinos.getDestinoubicacion()}"/></td>
                            <td><button class="boton1-1" onclick="location = 'modificarDestino.jsp?codigo=${destinos.destinoid} &nombre=${destinos.destinonombre}&ubicacion=${destinos.destinoubicacion}'">Modificar </button></td>
                            <td><button class="boton1-1" onclick="location = 'eliminardestino?codigo=${destinos.destinoid}'">Eliminar </button></td>
                        </tr>
                    </c:forEach> 
                </table>
            </center>
		</div>
		
		

		<footer class="fot margen-interno">
			<nav class="pie">
				<a href="#">Fly free</a>
			</nav>
		</footer>
	</div>

</body>
</html>