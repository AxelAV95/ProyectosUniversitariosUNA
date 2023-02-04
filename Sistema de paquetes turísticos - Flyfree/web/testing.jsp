<%-- 
    Document   : testing
    Created on : 23/05/2018, 11:33:00 AM
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
        <h1>Hello World!</h1>
        <%
             String idDestino = request.getParameter("idDestino");
        String idServicio = request.getParameter("idServicio");
        String precio = request.getParameter("precio");
        String dias = request.getParameter("dias");
        String cantidad = request.getParameter("cantidad");
        String fecha = request.getParameter("fecha");
        String descripcion = request.getParameter("descripcion");
        


        %>
        
        <%= idDestino%>
        <%= idServicio%>
        <%= precio%>
        <%= dias%>
        <%= cantidad%>
        <%= fecha%>
        <%= descripcion%>
        
        
        
    </body>
</html>
