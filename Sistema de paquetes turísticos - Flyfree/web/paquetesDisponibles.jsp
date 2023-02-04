<%-- 
    Document   : paquetesDisponibles
    Created on : 21/05/2018, 08:27:58 PM
    Author     : andra
--%>

<%@page import="com.flyfree.dominio.Paquete"%>
<%@page import="java.util.LinkedList"%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<!DOCTYPE html>
<html>
<head>
	<title>Insertar destino</title>
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
    <%
            LinkedList<Paquete> listaPaquete = (LinkedList)request.getAttribute("lista");
        %> 
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
				<h2> PAQUETES DISPONIBLES</h2>
			</div>
		</header>
            
            <div class="contenedor-paquetes"> 
            	
	 <c:forEach var="paquetes" items="${lista}" >    
             
             <div class="paquetes">
		 <div class="disponible">
		 	<img class="pic" src="obtenerImagen.jsp?id=${paquetes.getIdPaquete()}">
		 	<div class="short-info">
		 		<h1 class="titulo"><c:out value="${paquetes.getDescripcion()}"/></h1>
		 		<h1 class="desc"><c:out value="${paquetes.getPrecio()}"/></h1>
		 	</div>
		 	<input class="detalles" type="button" name="Más detalles" value="Más detalles">

		 </div>
             
             </div>
                
            </c:forEach> 
            
            
            </div>

		
		

		<footer class="fot margen-interno">
			<nav class="pie">
				<a href="#">Fly free</a>
			</nav>
		</footer>
	</div>

</body>
</html>