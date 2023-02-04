<%-- 
    Document   : eliminarPaquete
    Created on : 17/05/2018, 12:18:03 PM
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
        <link rel="stylesheet" type="text/css" href="css/UniversalStyle.css">
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sarala" rel="stylesheet">
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Marmelad" rel="style">
        
        <link rel="stylesheet" href="css/MostrarStyle.css">
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
		
		
                 <div class="eliminar-paquetes">
                     
                     <%
            request.getAttribute("Paquetes");
            %>

        <center>
            <h1>Eliminar un Paquete</h1> 
            <br/><br/>

            <form action="eliminarpaquete" method="POST">
                <c:forEach var="paquete" items="${Paquetes}" >              
                <table BORDER=0>                   
                    <tr>
                        <input type="text" name="temp" value="Eliminar" class="input" hidden="true">
                        <input type="text" name="codigo" value="<c:out value="${paquete.getIdPaquete()}"/>" hidden="true" class="input"/>
                        <td><label for="precio">Precio:</label></td>
                        <td><input type="number" name="precio" value="<c:out value="${paquete.getPrecio()}"/>" class="input" required="true"/></td>
                    </tr>                
                    
                    <tr>
                        <td><label for="dias">Dias:</label></td>
                        <td><input type="number" name="dias" value="<c:out value="${paquete.getDias()}"/>" class="input" required="true"/></td>
                    </tr>
                                       
                     <tr>
                        <td><label for="cantidad">N°Personas:</label></td>
                        <td><input type="number" name="cantidad" value="<c:out value="${paquete.getCantidad()}"/>" class="input" required="true"/></td>
                    </tr> 
                    
                    <tr>
                        <td><label for="fecha">Fecha:</label></td>
                        <td><input type="date" name="fecha" value="<c:out value="${paquete.getFecha()}"/>" class="input"required="true"/></td>
                    </tr> 
                    
                    <tr>
                        <td><label for="descripcion">Descripcion:</label></td>
                        <td><input type="text" name="descripcion" value="<c:out value="${paquete.getDescripcion()}"/>" class="input" required="true"/></td>
                    </tr> 
                       
                    <tr>
                        <td><input type="submit" value="Eliminar" class="boton"/></td>
                    </tr>                    
                </table>              
                 </c:forEach>                   
            </form>           
            <br/><br/>                    
            <a href="mostrarpaquete"><h3>Volver al menu principal</h3></a>        
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


