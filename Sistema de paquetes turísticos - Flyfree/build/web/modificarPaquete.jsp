<%-- 
    Document   : modificarPaquete
    Created on : 17/05/2018, 08:49:39 AM
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
        <link rel="stylesheet" type="text/css" href="css/UniveralStyle.css">
         <link rel="stylesheet" type="text/css" href="css/tablas.css">
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sarala" rel="stylesheet">
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Marmelad" rel="style">
        
        <link rel="stylesheet" href="css/Mostrartyle.css">
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
				<h2> Modificar paquete</h2>
			</div>
		</header>
		
		<%
            request.getAttribute("Paquetes");
        %>       
                 <div class="modificar-paquetes">
                      <%
            String codigo = request.getParameter("codigo"); 
            String precio = request.getParameter("precio");
            String dias = request.getParameter("dias");
            String cantidad = request.getParameter("cantidad");
            String fecha =request.getParameter("fecha");
            String descripcion =request.getParameter("descripcion");
            String idDestino =request.getParameter("idDestino");
            String idServicio =request.getParameter("idServicio");
         %>

        <center>
            
            <br/><br/>            
            <form action="modificarpaquete" method="POST">
                          
                <table BORDER=1>                   
                    <tr>
                        
                        A<input type="text" name="codigo"  value=<%=codigo%> hidden="true" class="input"/>
                        b<input type="text" name="idDestino"  value=<%=idDestino%> hidden="true" class="input"/>
                        C<input type="text" name="idServicio"  value=<%=idServicio%> hidden="true" class="input"/>
                       
                    </tr>
                    <tr>
                        <td><label for="precio">Precio:</label></td>
                        <td><input type="text" name="precio"  placeholder="$" value=<%= precio%> class="input" required="true"/></td>
                    </tr>                
                    
                    <tr>
                        <td><label for="dias">Dias:</label></td>
                        <td><input type="text" name="dias" value=<%= dias%> class="input" required="true"/></td>
                    </tr>
                                       
                     <tr>
                        <td><label for="cantidad">N°Personas:</label></td>
                        <td><input type="text" name="cantidad" value=<%= cantidad%> class="input" required="true"/></td>
                    </tr> 
                    
                    <tr>
                        <td><label for="fecha">Fecha:</label></td>
                        <td><input type="date" name="fecha" value=<%= fecha%> class="input" required="true"/></td>
                    </tr> 
                    
                    <tr>
                        <td><label for="descripcion">Descripcion:</label></td>
                        <td><input type="text" name="descripcion"  value=<%= descripcion%> class="input" required="true"/></td>
                    </tr> 
                    
                    <tr>                       
                        
                    </tr>  
                </table>
            </form>           
            <br/><br/>
            <td><button class="boton1-1">Modificar </button></td> 
            <button class="boton3" style="margin-bottom: 20px;"onclick="location = 'mostrarpaquete'">Atras </button>
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
