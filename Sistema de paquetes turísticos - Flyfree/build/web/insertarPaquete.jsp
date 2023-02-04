<%-- 
    Document   : insertarPaquete
    Created on : 17/05/2018, 08:55:41 AM
    Author     : andra
--%>

<%@page import="java.sql.Connection"%>
<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.Statement"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="javax.swing.JOptionPane"%>
<%@page import="java.sql.SQLException"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<!DOCTYPE html>
<html>
<head>
	<title>Paquetes</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estiloGeneral.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/UnivesalStyle.css">
          <link rel="stylesheet" type="text/css" href="css/tablas.css">
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sarala" rel="stylesheet">
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Marmelad" rel="style">
        
        <link rel="stylesheet" href="css/MostrrStyle.css">
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
				<h2> Insertar paquete</h2>
			</div>
		</header>
		
		
                 <div class="modificar-paquetes">
                     <center>
        
        <br/><br/>        
        <form action="./insertarPaquete" method="post" enctype="multipart/form-data" >
            
                <table border=0>
                <tr>    
                    <td><label>Destino</label></td>
                    <td><select name="iddestino" class="selc">
                        <% 
                
             try{
                 String sql = "SELECT * FROM `tbdestino`";
                 Connection con = null;

                 
             Class.forName("com.mysql.jdbc.Driver");   
             con = DriverManager.getConnection("jdbc:mysql://localhost:3306/dbflyfree", "root", "");
             Statement st = con.createStatement();
             ResultSet rs = st.executeQuery(sql);
             
             while(rs.next()){
		String name = rs.getString(2);
		
		%><option value="<%= name %>">
		<% out.println(name); %>
		</option>
		<%} rs.close(); st.close(); 
            }catch(SQLException exc){
                JOptionPane.showMessageDialog(null, "Error de conexion..");
            }
            %>
                   </td>  
                </tr>
                
                <tr>
                    <td><label>     Servicio</label></td>
                    <td><select name="servicioid" class="selc">
                        <% 
                
             try{
                 String sql = "SELECT tipoNombre from tbtipos inner join tbservicios where tbtipos.tipoid = tbservicios.tipoid";
                 Connection con = null;

                 
             Class.forName("com.mysql.jdbc.Driver");   
             con = DriverManager.getConnection("jdbc:mysql://localhost:3306/dbflyfree", "root", "");
             Statement st = con.createStatement();
             ResultSet rs = st.executeQuery(sql);
             
             while(rs.next()){
		String name = rs.getString(1);
		
		%><option value="<%= name %>">
		<% out.println(name); %>
		</option>
		<%} rs.close(); st.close(); 
            }catch(SQLException exc){
                JOptionPane.showMessageDialog(null, "Error de conexion..");
            }
            %></td>  
                </tr>
                
                <tr>
                    <td><label>Descripcion</label></td>
                    <td><input type="text" name="descripcion" class="input" required="true"/></td>  
                </tr>
                
                <tr>
                    <td><label>N°personas</label></td>
                    <td><input type="number" name="cantidad" class="input" required="true"/></td>  
                </tr>
                
                <tr>
                    <td><label>Fecha</label></td>
                    <td><input type="date" name="fecha" class="input" required="true"/></td>  
                </tr>
                
                <tr>
                    <td><label>Dias</label></td>
                    <td><input type="number" name="dias" class="input" required="true"/></td>  
                </tr>
                
                <tr>
                    <td><label>Precio</label></td>
                    <td><input type="number" name="precio" class="input" required="true"/></td>  
                </tr>
                <tr>
                    <td>
                         
                        <label>Imagen: </label><td><input  type="file" name="image" required="required"/></td><br/><br/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                <center><input class="boton1-1" type="submit" name="bt"/> </center> 
                <center><button style="margin-top: 20px;"class="boton1-1" onclick="location = 'mostrarpaquete'">Atras </button></center> 
                    </td>
                </tr>      
                </table>        
            </form>          
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

