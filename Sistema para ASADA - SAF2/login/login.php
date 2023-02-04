


<?php 

/*
    HERRAMIENTAS USADAS: JQUERY-CONFIRM-FONTAWESOMEICONS-JQUERY
    

*/

if(isset($_GET['alert'])){
    $mensaje = $_GET['alert'];
 
  }


session_start();


if(isset($_SESSION['usuario']) and $_SESSION['estado'] == 'Autenticado'  && $_SESSION['tipo']=='1') {
    header("Location: ../welcomeadminindex.php");
	
	die();
} else if(isset($_SESSION['usuario']) and $_SESSION['estado'] == 'Autenticado' && $_SESSION['tipo']=='2'){
    header("Location: ../welcomeuserindex.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iniciar sesión </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../view/css/animate.css" />
    <link rel="stylesheet" href="../view/icon/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../view/css/jquery-confirm.min.css">
    <link rel="stylesheet" href="../view/css/login.css">
    <script src="../view/js/jquery-3.3.1.min.js"></script>
    <script src="../view/js/jquery-confirm.min.js"></script>

    
    
</head>
<body>
    

        

        <div id="contenedor-login" class="animated jackInTheBox">
        
 
            <div id="formulario">   
           
            <div id="mensaje" style="border:1px solid #CCC; padding:10px;"></div>
            <div id="titulo" class="animated bounceIn delay-1s" ><h1> Iniciar sesión</h1> </div>
            <center><img src="../view/img/user.png" width="30" height="30"></center>
                <form id="acceso" > 
                    
                    <div id="entradas-formulario" class="animated bounceIn delay-1s">

                        <div class="col-3">
                            <input required class="effect-1" type="text" id="correo" name="correo" placeholder="Correo">
                            <span class="focus-border"></span>
                        </div>

                        <div class="col-3" style="margin-top:-10px;">
                            <input required class="effect-1" type="password" id="pass" name="pass" placeholder="Contraseña">
                            <span class="focus-border"></span>
                        </div>


                        <a style="margin-bottom:: 50px; font-size:  14px; color: red;" href="formularioregistro.php">¿No tienes una cuenta?<br> <center>Registrate aquí</center> </a>
                        <div class="container-fluid row ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-1 button-holder">
                                                <div class="ajax-button">
                                                    <div class="fa fa-check done"></div>
                                                        <div class="fa fa-close failed"></div>
                                                        <input type="submit" class="submit" type="button" value="Iniciar sesión"">
                                                        
                                                        </div>
                                                </div>
                                            </div>
                                        </div>  
                                </div>

                        </div>
                        

                </form>

                    <!---<div class="container-fluid row animated fadeInLeft delay-2s " style="margin-left: 40%; margin-top: 10%;">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-1 button-holder">
                                    <div class="ajax-button">
                                    
                                        <button class="submit2" onclick="window.location.href='formularioregistro.php'" value="Iniciar sesión"">Registrarse</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>-->

               </div>
        </div>
        

        


        <script>
            //Guardamos el controlador del div con ID mensaje en una variable
            var mensaje = $("#mensaje");
            //Ocultamos el contenedor
            mensaje.hide();

            


            //Cuando el formulario con ID acceso se envíe...
            $("#acceso").on("submit", function(e){
                //Evitamos que se envíe por defecto
                e.preventDefault();
                //Creamos un FormData con los datos del mismo formulario
                var formData = new FormData(document.getElementById("acceso"));



    

            //Llamamos a la función AJAX de jQuery
            $.ajax({
                //Definimos la URL del archivo al cual vamos a enviar los datos
                url: "acceder.php",
                //Definimos el tipo de método de envío
                type: "POST",
                //Definimos el tipo de datos que vamos a enviar y recibir
                dataType: "HTML",
                //Definimos la información que vamos a enviar
                data: formData,
                //Deshabilitamos el caché
                cache: false,
                //No especificamos el contentType
                contentType: false,
                //No permitimos que los datos pasen como un objeto
                processData: false
            }).done(function(echo){

                
                //Una vez que recibimos respuesta
                //comprobamos si la respuesta no es vacía
                if (echo !== "") {
                    //Si hay respuesta (error), mostramos el mensaje
                    mensaje.html(echo);
                    //mensaje.slideDown(500);
                    
                
                } else {
                    //Si no hay respuesta, redirecionamos a donde sea necesario
                    //Si está vacío, recarga la página
                // mensaje.html("si papu");
                    window.location.replace("login");
                }
            });
        });
                
        
        
        </script>

        <script>

            var variable='<?php echo $mensaje;?>'

            if(variable == 1){

$.alert({
        useBootstrap: false,
         boxWidth: '30%',
          title: 'Sesión cerrada',
          type: "green",
          closeIcon: true,
         draggable: true,
         backgroundDismiss: true,
         content: 'Se ha cerrado la sesión.',
         animation: 'Rotate' 


      });

}

if(variable == 2){

 $.alert({
         useBootstrap: false,
          boxWidth: '30%',
           title: 'Registro',
           type: "green",
           closeIcon: true,
          draggable: true,
          backgroundDismiss: true,
          content: 'Registrado correctamente.<br>Puede iniciar sesión. ',
          animation: 'Rotate' 


       });

}
        
        
         </script>
    

</body>
</html>