<!-- Esta plantilla se copia para montar las diferentes secciones del menú y
luego agregar el contenido 

<?php
 include 'data/data.php';
//Reanudamos la sesión
session_start();

//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
if($_SESSION['tipo'] == '1'){
	header('Location: index.php');
}
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
	header('Location: index.php');
	die();
} else {
	$usuario = $_SESSION['usuario'];
//	$salir = '<a href="logout.php" target="_self">Cerrar sesión</a>';
	//require('recursos/sesiones.php');
};
?>

<?php
    $welcome ="";
    $welcome = "Usuario: <br>"."<p style='font-size: 16px;'>".$usuario."</p>";
    
  if(isset($_GET['mensaje'])){
    $mensaje = $_GET['mensaje'];
 
  }



?>
-->

<!DOCTYPE html >
<html lang="en"  >
<head>
    <meta charset="UTF-8">
    <title>SAF2</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="view/icon/style.css">
    <link rel="stylesheet" href="view/css/estilos.css">
    <link rel="stylesheet" type="text/css" href="view/css/animate.css">
    <link rel="stylesheet" type="text/css" href="view/css/min.css">
    <link rel="stylesheet" type="text/css" href="view/js/script-tablas.js">
    <link rel="stylesheet" type="text/css" href="view/css/cartas.css">
    <script src="view/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="view/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="view/icon/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="view/css/scroll.css">
    <link rel="stylesheet" type="text/css" href="view/css/botones-form.css">
    <link rel="stylesheet" type="text/css" href="view/css/tabla.css">
    
    <link rel="stylesheet" href="view/css/jquery-confirm.min.css">
<script src="view/js/jquery-confirm.min.js"></script>
    
    <style type="text/css">

      @font-face {

        font-family: 'Nunito Sans';
        font-family: 'Quicksand';
        src: local('Nunito Sans'), local('Nunito Sans'), url(view/fonts/NunitoSans-Light.ttf) format('truetype');
        src: local('Quicksand'), local('Quicksand'), url(view/fonts/Quicksand-Regular.ttf) format('truetype');
        
        
        
      }
        h1{
          font-family: 'Quicksand';
          font-style: normal;
          font-weight: 700;
          
        }
        th, td{
          font-family: 'Quicksand';
          font-size: 22px;
        }

        #welcome{
          font-family: 'Quicksand';
          margin-left: 35px;text-shadow: 2px 2px black; font-size: 18px; padding-bottom: 30px; padding-top: 12px; color: white;
        }
          
        
      
   </style>




</head>
<body style="">
  <div id="contenedor_carga">
        <div id="carga"></div>
    </div>

   <header><span class="lnr lnr-menu show"></span></header>
    <main style="<?php if($_SESSION['tipo'] == '2'){
                echo 'height:900px';
            }else{
              echo 'height:auto';
            }
              ?>;"  >
    <div  style="  box-shadow: 2px 0px;" id="content-menu" class="content-menu " >
      
      <div style=" box-shadow: 0px 2px;  opacity: 0.8; cursor: none; width: auto; height: 120px; background: #000428;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #004e92, #000428);  /* Chrome 10-25, Safari 5.1-6 */background: linear-gradient(to right, #004e92, #000428); /">
        <i style="color: white;font-size: 35px;margin-left: 252px; margin-top: 10px;" class="fa fa-user-circle" aria-hidden="true"></i>
        <div style="display:flex; flex-direction:row;"><h4 id="welcome" style="" class="text1"><?php echo $welcome ?></h4></div>
      </div>
      <a style="text-decoration:none;" href="view/userindex.php"><li  ><i class="fa fa-home fa-2x " aria-hidden="true"></i><h4 class="text1">Inicio</h4></li></a>
     
      
      <a style="text-decoration: none" href="view/clienteview.php"><li ><i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i><h4 class="text1">Cliente</h4></li></a>
      <a style="text-decoration:none;" href="view/mediciongeneralview.php"><li ><span style="font-size: 40px" class="lnr lnr-drop icon"></span><h4 class="text1">Medición</h4></li></a>
      <a style="text-decoration:none;" href=""><li ><i class="fa fa-file-text-o  fa-2x" aria-hidden="true"></i></span><h4 class="text1">Facturas</h4></li></a>
      <a style="text-decoration:none;" href="view/cobrosview.php"><li ><i class="fa fa-money  fa-2x" aria-hidden="true"></i></span><h4 class="text1">Cobros</h4></li></a>
      <a style="text-decoration:none;" href="view/previstaview.php"><li ><span style="font-size: 40px" class="lnr lnr-enter icon1"></span><h4 class="text1">Previstas</h4></li></a>
   
      <a href="login/logout.php" style="text-decoration:none;" href=""><li ><i class="fa fa-sign-out  fa-2x" aria-hidden="true"></i></span><h4 class="text1">Cerrar sesión</h4></li></a>


     
      
  </div>

        <div class="contenido" style="width: 100%; overflow: auto;">

          <!-- Aquí se agrega el contenido que se necesite -->
          <!-- Se puede agregar una card que son formas personalizadas que

            se encuentran en la carpeta css *ver medicion*-->  

            <div   id="tools" style="display:flex;justify-content: center;
  align-items: center; flex-direction:row; align-content: stretch; height: 800px; "> 

  
  <div class="row animated fadeInRight"   style="border-radius: 30px;" >
    <div class="col s14 m14" >
      <div class="card  large blue-grey darken-1 ">
        <div class="card-content white-text " >
          <center><span class="card-title" ><h4 style="font-family: 'Quicksand', sans-serif; font-size: 23px;">Medidas generales</h4></span></center>
          <table  style=" margin-top: 80px;padding-top: 20px; padding-bottom: 20px; padding-right: 20px; padding-left: 20px;">
                             <thead>
                                <th>Rangos</th>
                                <th>Domipre</th>
                                <th>Emprego</th>
                                
                              </thead>
                             <tbody>
                             <?php
                                  
                                  $pdo = Database::conectar();
                                  $sql = 'SELECT * FROM tbmedidaestandar';
                                  foreach ($pdo->query($sql) as $row) {
                                           
                                            echo '<input type="hidden" name="id" value="' . $row['medidaestandarid'] . '">';
                                            echo '<tr>';
                                            echo '<td>'. $row['medidaestandarrango'] . '</td>';
                                            echo '<td>'. $row['medidaestandardomipre'] . '</td>';
                                            echo '<td>'. $row['medidaestandaremprego'] . '</td>';
                                         
                                            
                                  }
                                  Database::desconectar();
                              ?>
            
                            </tbody>
                          </table>
        
        </div>
        <div class="card-action">
         
        </div>
      </div>
    </div>
  </div>

  <div  class="row animated fadeInUp"  style="border-radius: 30px;" >
    <div class="col s14 m14" >
      <div class="card  large blue-grey darken-1 ">
        <div class="card-content white-text " >
          <center><span class="card-title" ><h4 style="font-family: 'Quicksand', sans-serif; font-size: 23px;">Calculadora</h4></span></center>
        <?php     include 'view/tools/calculadora.php';	
        ?>
        
        </div>
        <div class="card-action">
         
        </div>
      </div>
    </div>
  </div>

  

              
            <div id="welcome-modal" class="modal">
              <p align="center"><strong>Bienvenido a SAF2<strong></p>
              <div ><img style="display: block; margin-right: auto; margin-left: auto;" src="view/css/imagenes/drop.gif" height="152" width="142"></div>
              <br>
            
            </div>




           

           </div>
       
        
        
    </main>
   <footer class="footer" style="background: #000428;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #004e92, #000428);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #004e92, #000428); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
border:  1px;
border-top-style: solid;


border-color: white;"><h3 style="text-align: center; color: white; padding-top: 18px;"><strong>SAF 2 &#169;
</strong></h3></footer>

<script type="text/javascript" src="view/js/config-table.js"></script>
<script type="text/javascript" src="view/js/script-menu.js"></script>

<script src="view/js/jquery.modal.min.js"></script>
<link rel="stylesheet" href="view/css/jquery.modal.min.css" />
<link rel="stylesheet" href="view/css/loading.css" />



  <!---WELCOME MODAL--->
<script type="text/javascript">
 
      setTimeout(function(){
        $("#welcome-modal").modal();
        $('html, body').css({
          overflow: 'auto',
          height: 'auto'
      });}, 2000);
   
</script>

  <!---LOADER--->
    <script type="text/javascript">
      $('html, body').css({
        overflow: 'hidden',
        height: '100%'
      });
        window.onload = function(){
            var contenedor = document.getElementById('contenedor_carga');
            contenedor.style.visibility = 'hidden';
            contenedor.style.opacity = '0';

        }

    </script>

    <script>
		 $("#resultado").hide();
            $(document).ready(function(){
                $('#calc-form').on('submit', function(e){
                	$('#resultado').empty();
                    //Stop the form from submitting itself to the server.
                    e.preventDefault();
                   
                    var metros = $('#metroscubicos').val();

                    if(metros==""){
                      $.alert({
              useBootstrap: false,
               boxWidth: '30%',
                title: 'Mensaje',
               content: 'Debe ingresar un valor.',
               animation: 'Rotate' 


            }); 

                    }else{
                      $.ajax({
                        type: "POST",
                        url: 'view/tools/data.php',
                        data: { metros: metros},
                        success: function(data){

                          
                           $('#resultado').append(data);
                           $("#resultado").modal({
                            fadeDuration: 100
                           });
                          // $("#resultado").show();
                        }
                    });
                    }
                    
                    
                });

               
            });
        </script>

</body>
</html>
