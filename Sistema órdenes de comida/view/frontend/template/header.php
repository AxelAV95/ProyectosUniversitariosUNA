<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Francois+One&family=Lato:wght@300;700&family=Titan+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../backend/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  
</head>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top " style=" background-color: #b91e1e;">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler d-lg-none text-white" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="collapsibleNavId">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white nav-item-text"  href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
              <!--   <li class="nav-item">
                    <a class="nav-link text-white nav-item-text" href="#">Productos</a>
                </li> -->
                <li class="nav-item">
                    <span style="color: yellow;"></span>
                    <a class="nav-link text-white nav-item-text" href="carritoview.php">Carrito <i class="fas fa-shopping-cart"></i>
                        (<?php
                            if(empty($_SESSION['carrito'])){
                                echo '<span style="color: yellow;">0</span>';
                            }else{
                                echo '<span style="color: yellow;">';
                                echo count($_SESSION['carrito']);
                                echo '</span>';
                            }
                            
                        ?>)</a>
                </li>
                <!-- <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle text-white nav-item-text" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Autenticarse</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Iniciar sesión</a>
                        <a class="dropdown-item" href="#">Registrarse</a>
                    </div>
                </li> -->
            </ul>
           
        </div>
    </nav>
    <br><br><br>
</html>