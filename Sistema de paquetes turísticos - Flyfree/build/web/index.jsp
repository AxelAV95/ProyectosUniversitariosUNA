<%-- 
    Document   : index
    Created on : 15/05/2018, 11:36:10 PM
    Author     : andra
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
	<title>Fly free</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estiloGeneral.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sarala" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Marmelad" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/texto.css">
</head>
<body>
	<div class="padre">
		<div class="sesion">
			<h1 class="welcome">Bienvenido invitado</h1>
		</div>
		<header class="header">

			<div class="menu">
				<div class="logo">
					<a href="index.jsp"><img class="fly" src="images/flyfreelogo.png" height="82" width="222"></a>
				</div>
				<div class="nav">
					<a href="index.jsp">Inicio</a></li>
    				<a href="login.jsp">Iniciar sesión</a></li>
    				<a href="#">Sobre nosotros</a></li>
    				<a href="#">Tours</a></li>
    				<a href="./paquete.do?metodo=mostrarPaquetesDisponibles">Paquetes</a></li>
    				<a href="#">Contáctenos</a></li>

				</div>
			</div>
			<div class="slider">
                            <div class="text">
                            <p>Viajar es </p>
                            <p>
                                <span class="word observar">observar.</span>
                                <span class="word aprender">aprender.</span>
                                <span class="word aventura">aventura.</span>
                                <span class="word vivir">....vivir.</span>
                                </p>
                            </div>
<script type="text/javascript" src="js/animacion-texto.js"></script>
			</div>
			
			</div>
		</header>
		
		<div class="buscador">
			<form>
				<input class="sb-search-input" placeholder="Buscar destino" type="search" value="" name="search" id="search">
				<input class="busqueda" type="submit" name="buscar" value="Buscar">
			</form>
		</div>
		<section class="section margen-interno">
			<div class="destino">
				
			<article class="destinos">
				<img src="images/argentina.jpg">
				<div class="texto">
					<h3>Argentina</h3>
				 </div>
				
				<h2>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</h2>
				<a href="#">Más información</a>
			</article>

			<article class="destinos">
				<img src="images/mexico.jpg">
				<h3>México</h3>
				<h2>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</h2>
				<a href="#">Más información</a>
			</article>
			
			<article class="destinos">
				<img src="images/españa.jpg">
				<h3>España</h3>
				<h2>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</h2>
				<a href="#">Más información</a>
			</article>

			<article class="destinos">
				<img src="images/china.jpg">
				<h3>China</h3>
				<h2>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</h2>
				<a href="#">Más información</a>
			</article>
			
			<article class="destinos">
				<img src="images/usa.jpg">
				<h3>Estados Unidos</h3>
				<h2>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</h2>
				<a href="#">Más información</a>
			</article>

			<article class="destinos">
				<img src="images/brasil.jpg">
				<h3>Brasil</h3>
				<h2>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</h2>
					
				
				
				<a href="#">Más información</a>
			</article>
			</div>
		</section>

		<footer class="fot margen-interno">
			<nav class="pie">
				<a href="#">Fly free</a>
			</nav>
		</footer>



	</div>

</body>
</html>
