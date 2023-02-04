<%-- 
    Document   : paquetes
    Created on : 17/05/2018, 08:29:12 AM
    Author     : andra
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<!DOCTYPE html>
<html>
<head>
	<title>Paquetes</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estiloGeneral.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/tablas.css">
        <link rel="stylesheet" type="text/css" href="css/MostarStyle.css">
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
				<h2> PAQUETES</h2>
			</div>
		</header>
		
		<%
            request.getAttribute("Paquetes");
        %>       
        <div class="tabla-paquetes">
       <center>
        <br/><br/>
         <button class="boton1-1" onclick="location = 'insertarPaquete.jsp'">Nuevo Paquete </button>
        <br/><br/>
        <table BORDER="1">
            <th>Precio:</th>
            <th>Dias</th>
            <th>N°Personas</th>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Modificar</th>
             <th>Eliminar</th>
            <c:forEach var="paquetes" items="${Paquetes}" >           
                <tr>
                    <td><c:out value="${paquetes.getPrecio()}"/></td>
                    <td><c:out value="${paquetes.getDias()}"/></td>     
                    <td><c:out value="${paquetes.getCantidad()}"/></td>
                    <td><c:out value="${paquetes.getFecha()}"/></td>
                    <td><c:out value="${paquetes.getDescripcion()}"/></td>
                    <td><button class="boton1-1" onclick="location = 'modificarPaquete.jsp?codigo=${paquetes.getIdPaquete()} &precio=${paquetes.getPrecio()}&dias=${paquetes.getDias()}&cantidad=${paquetes.getCantidad()} &fecha=${paquetes.getFecha()} &descripcion=${paquetes.getDescripcion()} &idDestino=${paquetes.getIdDestino().getDestinoid()} &idServicio=${paquetes.getIdServicio()}'">Modificar </button></td>
                    <td><button class="boton1-1" onclick="location = 'eliminarpaquete?codigo=${paquetes.getIdPaquete()}'">Eliminar </button></td>
                </tr>
            </c:forEach> 
        </table>
        <br/><br/>
        
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
