<%-- 
    Document   : modificarDestino
    Created on : 16/05/2018, 09:54:17 PM
    Author     : andra
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <!DOCTYPE html>
<html>
<head>
	<title>Modificar destino</title>
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
				<h2> Modificar destino</h2>
			</div>
		</header>

		<%
            String cod = request.getParameter("codigo");
            String nomb = request.getParameter("nombre");
            String ubi = request.getParameter("ubicacion");
        %>

        <div class="modificar-destino">
        	 
        	 <br/><br/> 
        	 <form  class="contenedor" action="../../modificardestino" method="POST"> 
                <center>
                    <table BORDER=1 style="margin-top: 50px;">  

                        <input type="text" name="destinoidm" id="destinoidm" placeholder="ID" value=<%= cod%>readonly hidden="true"/></p>

                        <tr>
                            <td><label> Nombre: </label></td>
                            <td><p><input type="text" name="destinonombrem"  id="destinonombrem" placeholder="Nombre"  required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})" value=<%=nomb%> ></p></td>
                        </tr>
                        <tr>
                            <td><label> Ubicacion: </label></td>
                            <td><p><input type="text" name="destinoubicacionm" id="destinoubicacionm" placeholder="Ubicacion" required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})" value=<%= ubi%>></p></td>
                        </tr>
                                
                    </table>
                    <button class="boton1-2">Modificar </button>  
                    <button type="submit" class="boton3" onclick="location = '../../mostrardestinos'"> Atras</button> 
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
    </body>
</html>
