<%-- 
    Document   : mostrarPersonas
    Created on : 21/05/2018, 07:54:43 PM
    Author     : andra
--%>

<%@page import="com.flyfree.dominio.Persona"%>
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
				<h2> VER PERSONAS</h2>
			</div>
		</header>
		 <%
            //recuperar lista
            Destinos destino = (Destinos) request.getAttribute("persona");
            LinkedList<Persona> listaDestinos = (LinkedList<Persona>) request.getAttribute("Personas");// parseo linked list
        %> 
		<div class="tabla-persona">
                    
                    <button class="boton" onclick="location = ''">Nuevo cliente </button> 
			
                <br/><br/> 

			<center>
                <table BORDER="1">
                    <th>Nombre:</th>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Password</th>
                    <th>Genero</th>
                    <th>País</th>
                    <th>Modificar</th>
                     <th>Eliminar</th>
                    

                    <c:forEach var="personas" items="${Personas}" >           
                        <tr>
                            <td><c:out value="${personas.getNombre()}"/></td>     
                            <td><c:out value="${personas.getApellido1()}"/></td>
                            <td><c:out value="${personas.getApellido2()}"/></td>
                            <td><c:out value="${personas.getEmail()}"/></td>
                            <td><c:out value="${personas.getTelefono()}"/></td>
                            <td><c:out value="${personas.getPass()}"/></td>
                            <td><c:out value="${personas.getGenero()}"/></td>
                            <td><c:out value="${personas.getPais()}"/></td>
                            <td><button class="boton1-1" onclick="location = 'modificarDestino.jsp?codigo=${destinos.destinoid} &nombre=${destinos.destinonombre}&ubicacion=${destinos.destinoubicacion}'">Modificar </button></td>
                            <td><button class="boton1-1" onclick="location = 'eliminarPersona.jsp?codigo=${destinos.destinoid}'">Eliminar </button></td>
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