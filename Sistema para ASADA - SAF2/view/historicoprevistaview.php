
<?php
//Reanudamos la sesión
session_start();

//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
/*if($_SESSION['tipo'] == '2'){
	header('Location: ../index.php');
}*/
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
	header('Location: ../index.php');
	die();
} else {
	$estado = $_SESSION['usuario'];
	//$salir = '<a href="logout.php" target="_self">Cerrar sesión</a>';
	//require('recursos/sesiones.php');
};
?>

<?php 
  include '../data/data.php';
  include '../business/businessmedicion.php';
  $usuario = "saf2@domain.com";
  $user = "Usuario: <br>"."<p style='font-size: 16px;'>".$estado."</p>";


  if(isset($_GET['mensaje'])){
    $mensaje = $_GET['mensaje'];
 
  }


  
?>
<!DOCTYPE html >
<html lang="en"  >
<head>
    <meta charset="UTF-8">
    <title>Previstas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/modal.css">
    <!--ANIMACIONES-->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <!-- OTROS-->
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/min.css">
    <link rel="stylesheet" type="text/css" href="js/script-tablas.js">
    <link rel="stylesheet" type="text/css" href="css/cartas.css">
    <script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/previstaAjax.js"></script>
    <!--TABLAS-->
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="css/tabla.css">
    <!--ICONOS -->
    <link rel="stylesheet" href="icon/font-awesome-4.7.0/css/font-awesome.min.css">

   
    <link rel="stylesheet" href="css/jquery-confirm.min.css">
    <link rel="stylesheet" href="css/scroll.css">
    <link rel="stylesheet" href="css/steps.css">
    

    
   <style type="text/css">

      select{
        padding: 5px;
    width: 100%;
    margin-bottom: 10px;
    font-size: 23px;
    font-family: 'Quicksand';
    border: 1px solid #aaaaaa;
      }

      @font-face {

        font-family: 'Nunito Sans';
        font-family: 'Quicksand';
        src: local('Nunito Sans'), local('Nunito Sans'), url(fonts/NunitoSans-Light.ttf) format('truetype');
        src: local('Quicksand'), local('Quicksand'), url(fonts/Quicksand-Regular.ttf) format('truetype');
        
        
        
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
   <link rel="stylesheet" type="text/css" href="css/botones-form.css">


</head>
<body >
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
              <div style="display:flex; flex-direction:row;"><h4 id="welcome" style="" class="text1"><?php echo $user ?></h4></div>
            </div>
            <a style="text-decoration:none;" href="<?php if($_SESSION['tipo'] == '2'){
                echo 'userindex.php';
            }else{
              echo 'adminindex.php';
            }
              ?>"><li  ><i class="fa fa-home fa-2x " aria-hidden="true"></i><h4 class="text1">Inicio</h4></li></a>
               <?php 

if($_SESSION['tipo'] == '1'){
  echo '<a style="text-decoration:none;" href="empleadoview.php"><li ><i class="fa fa-users  fa-2x" aria-hidden="true"></i></span><h4 class="text1">Empleados</h4></li></a>';
}else{
  echo '';
}


?>
            
            
            <a style="text-decoration: none" href="clienteview.php"><li ><i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i><h4 class="text1">Cliente</h4></li></a>
            <?php 

if($_SESSION['tipo'] == '1'){
  echo '<a style="text-decoration: none" href="usuarioview.php"><li ><i class="fa fa-user-o fa-2x" aria-hidden="true"></i><h4 class="text1">Usuarios</h4></li></a>';
}else{
  echo '';
}


?>
            <a style="text-decoration:none;" href="mediciongeneralview.php"><li ><span style="font-size: 40px" class="lnr lnr-drop icon"></span><h4 class="text1">Medición</h4></li></a>
            <a style="text-decoration:none;" href=""><li ><i class="fa fa-file-text-o  fa-2x" aria-hidden="true"></i></span><h4 class="text1">Facturas</h4></li></a>
            <a style="text-decoration:none;" href="cobrosview.php"><li ><i class="fa fa-money  fa-2x" aria-hidden="true"></i></span><h4 class="text1">Cobros</h4></li></a>
            <a style="text-decoration:none;" href="previstaview.php"><li ><span style="font-size: 40px" class="lnr lnr-enter icon1"></span><h4 class="text1">Previstas</h4></li></a>
         
            <a href="../login/logout.php" style="text-decoration:none;" href=""><li ><i class="fa fa-sign-out  fa-2x" aria-hidden="true"></i></span><h4 class="text1">Cerrar sesión</h4></li></a>


           
            
        </div>


		
        <div id="contenido" class="contenido" style="width: 100%; overflow: auto;">
        <div id="actualizarModal" onclick="cerrarVentana()"> </div>
        <div id="verModal" onclick="cerrarVentana()"> </div>
        <?php 
                              include 'previstamodal.php';		
    
    
                            ?>

          <div class="animated bounceInLeft" style="margin-right: auto; margin-left: auto; padding: 30px 30px 30px 30px;  background: white; ">
            <div class="row " style="margin-left: auto; margin-right: auto;">
                <div class="col s12 m12">
                   <div class="card blue-grey darken-1" style="width: auto;">
                       <div class="card-content white-text" >
                           <span class="card-title" style="margin-bottom: 70px;"><h1>Historico de cobro de previstas</h1></span>
                           

                            <table id="table_id" style=" padding-top: 20px; padding-bottom: 20px; padding-right: 20px; padding-left: 20px;">
                  <thead>
                    <th>Prevista ID</th>
                    <th>Nombre</th>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Saldo anterior</th>
                    <th>Abono</th>
                    <th>Saldo actual</th>
                    <th>Fecha</th>
                  </thead>

                    <tbody>
                      <?php
                   
                   $pdo = Database::conectar();
                   $pdo -> exec("set names utf8");
                   $sql = 'SELECT * FROM tbhistoricoprevista';
                   foreach ($pdo->query($sql) as $row) {
                    echo '<form  method="post" enctype="multipart/form-data" action="../business/previstaaction.php">';

                            echo '<tr>';
                            echo '<td>'. $row['historicoprevistaprevistaid'] . '</td>';
                            echo '<td>'.  getNombreCliente($pdo,$row['historicoprevistaclienteid']).'</td>';
                            echo '<td>'.  getApellido1Cliente($pdo,$row['historicoprevistaclienteid']).'</td>';
                            echo '<td>'.  getApellido2Cliente($pdo,$row['historicoprevistaclienteid']).'</td>';
                            echo '<td>'. $row['historicoprevistasaldoanterior'] . '</td>';
                            echo '<td>'. $row['historicoprevistaabono'] . '</td>';
                            echo '<td>'. $row['historicoprevistasaldoactual'] . '</td>';
                            echo '<td>'. $row['historicoprevistafecha'] . '</td>';
                           
                          
                                
                                
                                echo '</tr>';
                            echo '</form>';
                   }
                   Database::desconectar();
                  ?>
                            
                            </tbody>
                          </table>



                   </div>
                </div>
                 <button id="cobroprevista" onclick="window.location.href='previstaview.php'" style="margin-bottom: 30px; background: #333; font-size: 23px; font-weight: bolder;font-family:Quicksand"class="pure-button pure-button-primary" >Volver a previstas</button>  
            </div>
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




 

<script type="text/javascript">
        function calcular(va){
          var saldrest = document.getElementById("saldrest");
          var saldact = document.getElementById("saldact");
          saldrest.value = saldact.value - va;
        }
        </script>
  <script type="text/javascript">
    
      $(document).ready(function(){


        $(document).on('click', '.bEliminar', function(){
              var id = $(this).attr("id");
              //alert(id);
              var eliminar = 'eliminar';
              $.confirm({
                theme: 'supervan',
                title: 'Confirmar',
                icon: 'fa fa-spinner fa-spin',
                content: '¿Desea eliminar este registro ?',
                boxWidth: '30%',
                animation: 'zoom',
                closeAnimation: 'scale',
                  autoClose: 'Cancelar|8000',

                useBootstrap: false,
                buttons: {
                    Confirmar: function () {
                      $.ajax({
                        url:"../business/previstaaction.php",
                        method:"POST",
                        data:{id:id,eliminar:eliminar},
                        success:function(data){
                          //alert("Eliminado con exito");

                          setTimeout(function(){
                            window.location.href="../view/previstaview.php";
                        }, 2000);
                          

                        }
                        });
                        setInterval(function(){
                        $('#alert_message').html('');  
                        }, 5000);
                        $.alert({
                          useBootstrap: false,
                          boxWidth: '30%',
                            title: 'Mensaje',
                          content: 'Eliminado con éxito',
                          animation: 'Rotate' 


                        });
                    },

                    Cancelar: function () {

                        
                    }
                    
                }
            });
      
      });

      




    });
  </script>

<script type="text/javascript" src="js/hamburger.menu.script.js"></script>
<script type="text/javascript" src="js/jquery.mask.js"></script>



<script type="text/javascript" src="js/config-table.js"></script>
<script type="text/javascript" src="js/hamburger.menu.script.js"></script>
<script src="js/jquery-confirm.min.js"></script>

<script type="text/javascript" src="js/modal-script-usuario.js"></script>


<script src="js/jqueryform/form-validator/jquery.form-validator.min.js"></script>







<script type="text/javascript">
     var variable='<?php echo $mensaje;?>'

     if(variable == 1){

      $.alert({
              useBootstrap: false,
               boxWidth: '30%',
                title: 'Mensaje',
               content: 'Insertado con éxito.',
               animation: 'Rotate' 


            }); 

     }

     if(variable == 2){

        $.alert({
              useBootstrap: false,
               boxWidth: '30%',
                title: 'Mensaje',
               content: 'Ya existe un cliente registrado con el medidor especificado.',
               animation: 'Rotate' 


            });
     }

     if(variable == 3){

$.alert({
      useBootstrap: false,
       boxWidth: '30%',
        title: 'Mensaje',
       content: 'El email que intentó actualizar no es válido.',
       animation: 'Rotate' 


    });
}

if(variable == 4){

$.alert({
      useBootstrap: false,
       boxWidth: '30%',
        title: 'Mensaje',
       content: 'Actualizado con éxito.',
       animation: 'Rotate' 


    });
}
 
   </script>


  <script>

    function botonCancelar2(){
    //window.location.reload(true);
    var caja = document.getElementById("verModal");
    caja.style.display = "none";

   
}

function verPrevista(id){
	
  var caja = document.getElementById("verModal");
  caja.style.display = "block";
  var ajax = nuevoAjax();
  ajax.open("POST","./verprevista.php",true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send("id="+id); 
  ajax.onreadystatechange=function(){

      if(ajax.readyState===4){
          caja.innerHTML=ajax.responseText;
      }
  };
}


  </script>

   
   <?php 
   
   function getNombreCliente($pdo, $id) {
       
	   
    $sql = 'SELECT * FROM `tbcliente` WHERE `clienteid` = '.$id.' AND `clientetipo` = 3';
    $result = "";
    foreach ($pdo->query($sql) as $row) {
        $result.= $row['clientenombre'];

        
     }

    return $result;

}

function getApellido1Cliente($pdo, $id) {
       
     
    $sql = 'SELECT * FROM `tbcliente` WHERE `clienteid` = '.$id.' AND `clientetipo` = 3';
    $result = "";
    foreach ($pdo->query($sql) as $row) {
        $result.= $row['clienteapellido1'];

        
     }

    return $result;

}

function getApellido2Cliente($pdo, $id) {
       
     
    $sql = 'SELECT * FROM `tbcliente` WHERE `clienteid` = '.$id.' AND `clientetipo` = 3';
    $result = "";
    foreach ($pdo->query($sql) as $row) {
        $result.= $row['clienteapellido2'];

        
     }

    return $result;

}
   
   ?>
   

</body>
</html>