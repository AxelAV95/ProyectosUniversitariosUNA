
<?php
//Reanudamos la sesión
session_start();

//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
if($_SESSION['tipo'] == '2'){
	header('Location: ../index.php');
}
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
  $user= "Usuario: <br>"."<p style='font-size: 16px;'>".$estado."</p>";


  if(isset($_GET['mensaje'])){
    $mensaje = $_GET['mensaje'];
 
  }


  
?>
<!DOCTYPE html >
<html lang="en"  >
<head>
    <meta charset="UTF-8">
    <title>Empleados</title>
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
	<script src="./js/empleadoAjax.js"></script>
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
     html{
    zoom: 90%;
}
   </style>

    

    
   <style type="text/css">

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
              <div style="display:flex; flex-direction:row;"><h4 id="welcome" style="" class="text1"><?php echo $user?></h4></div>
            </div>
            <a style="text-decoration:none;" href="<?php if($_SESSION['tipo'] == '2'){
                echo 'userindex.php';
            }else{
              echo 'adminindex.php';
            }
              ?>"><li  ><i class="fa fa-home fa-2x " aria-hidden="true"></i><h4 class="text1">Inicio</h4></li></a>
            <a style="text-decoration:none;" href="empleadoview.php"><li ><i class="fa fa-users  fa-2x" aria-hidden="true"></i></span><h4 class="text1">Empleados</h4></li></a>
           
            
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

          <div class="animated bounceInLeft" style="margin-right: auto; margin-left: auto; padding: 30px 30px 30px 30px;  background: white; ">
            <div class="row " style="margin-left: auto; margin-right: auto;">
                <div class="col s12 m11">
                   <div class="card blue-grey darken-1" style="width: auto;">
                       <div class="card-content white-text" >
                           <span class="card-title" style="margin-bottom: 70px;"><h1>Empleados</h1></span>
                           <button id="myBtn" style="margin-bottom: 30px; background: #333; font-size: 23px; font-weight: bolder;">Registrar empleado</button>
                           <?php 
                              include 'empleadomodal.php';		
    
    
                            ?>
  



                          <table id="table_id" style=" padding-top: 20px; padding-bottom: 20px; padding-right: 20px; padding-left: 20px;">
                             <thead>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Primer apellido</th>
                                <th>Segundo apellido</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Mostrar</th>
                                <th>Actualizar</th>
                                <th>Eliminar</th>
                              </thead>
                             <tbody>
                             <?php
                                  
                                  $pdo = Database::conectar();
                                   $pdo -> exec("set names utf8");
                                  $sql = 'SELECT * FROM tbempleado';
                                  foreach ($pdo->query($sql) as $row) {
                                            echo '<form  method="post" enctype="multipart/form-data" action="../business/empleadoaction.php">';
                                            echo '<input type="hidden" name="id" value="' . $row['empleadoid'] . '">';
                                            echo '<tr>';
                                            echo '<td>'. $row['empleadocedula'] . '</td>';
                                            echo '<td>'. $row['empleadonombre'] . '</td>';
                                            echo '<td>'. $row['empleadoapellido1'] . '</td>';
                                            echo '<td>'. $row['empleadoapellido2'] . '</td>';
                                            echo '<td>'. $row['empleadocorreo'] . '</td>';
                                            echo '<td>'. $row['empleadotelefono'] . '</td>';
                                            echo '<td>'. $row['empleadodireccion'] . '</td>';

                                            echo '<td><a class="bVer" onclick="veEmpleado(' . $row['empleadoid'] . ')"></a></td>';
                                            echo '<td><a class="bActualizar" onclick="actualizaEmpleado(' . $row['empleadoid'] . ')" ></a></td>';
                                            echo '<td><div name ="eliminar" class="bEliminar" id="'.$row["empleadoid"].'" ></div></td>';
                                            echo '</tr>';
                                            echo '</form>';
                                  }
                                  Database::desconectar();
                              ?>
            
                            </tbody>
                          </table>
                   </div>
                </div>
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
                        url:"../business/empleadoaction.php",
                        method:"POST",
                        data:{id:id,eliminar:eliminar},
                        success:function(data){
                          //alert("Eliminado con exito");

                          setTimeout(function(){
                            window.location.href="../view/empleadoview.php";
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
<script type="text/javascript">
      
      $(document).ready(function(){


        $('#empleadocedula').mask('000000000');
        $('#empleadotelefono').mask('00000000');
       



      });

     
    </script>


<script type="text/javascript" src="js/config-table.js"></script>
<script type="text/javascript" src="js/hamburger.menu.script.js"></script>
<script src="js/jquery-confirm.min.js"></script>

<script type="text/javascript" src="js/modal-script-empleado.js"></script>


<script src="js/jqueryform/form-validator/jquery.form-validator.min.js"></script>

<script> 

$("input").change(function(){

  var nombre = $("#empleadonombre").val().length;
  var apellido1 = $("#empleadoapellido1").val().length;
  var apellido2 = $("#empleadoapellido2").val().length;
  var cedula = $("#empleadocedula").val().length;
  



      if(nombre > 30){
        $('#empleadonombre').val('');
        $("#empleadonombre").focus();
        $.alert({
              useBootstrap: false,
               boxWidth: '30%',
                title: 'Advertencia',
                backgroundDismiss: true,
               content: 'Máximo 30 caracteres.',
               animation: 'Rotate' 


            });
        $('#nextBtn').attr("disabled", true);
      }else{
        $('#nextBtn').attr("disabled", false);
      }

      if(apellido1 > 30){
        $('#empleadoapellido1').val('');
        $("#empleadoapellido1").focus();
        $.alert({
              useBootstrap: false,
               boxWidth: '30%',
                title: 'Advertencia',
                backgroundDismiss: true,
               content: 'Máximo 30 caracteres.',
               animation: 'Rotate' 


            });
        $('#nextBtn').attr("disabled", true);
      }else{
        $('#nextBtn').attr("disabled", false);
      }

      if(apellido2 > 30){
        $('#empleadoapellido2').val('');
        $("#empleadoapellido2").focus();
        $.alert({
              useBootstrap: false,
               boxWidth: '30%',
                title: 'Advertencia',
                backgroundDismiss: true,
               content: 'Máximo 30 caracteres.',
               animation: 'Rotate' 


            });
      }else{
        $('#nextBtn').attr("disabled", false);
      }


      if(cedula < 9){
        $('#nextBtn').attr("disabled", true);
        $('#empleadocedula').val('');
       // $("#empleadocedula").focus();
        /*$.alert({
              useBootstrap: false,
               boxWidth: '30%',
                title: 'Advertencia',
                backgroundDismiss: true,
               content: 'Por favor ingresar la cédula completa.',
               animation: 'Rotate' 


            });*/
      }else{
        $('#nextBtn').attr("disabled", false);
      }

  });




</script>

<script> 

        
$.validate({
  modules : 'date, security'
  
      
});


</script>

<script>


/*$(document).ready(function(e) {
    $('#reg').click(function() {

    var sender_email = $('#empleadocorreo').val();
    // Check if the Fields are empty or not.
    if ($.trim(sender_email).length == 0 ) {
        alert('All fields are mandatory,Try again');
        e.preventDefault();
    }
    if (validate_Email(sender_email)) {
         alert('Nice!! your Email is valid, now you can continue..');
         $('#reg').attr("disabled", true);
    }
    else {

        alert('Invalid Email Address');
        $('#reg').attr("disabled", false);
        e.preventDefault();
    }
    });
}); 







function validate_Email(sender_email) {
     var expression = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if (expression.test(sender_email)) {
        return true;
    }
    else {
        return false;
    }
}*/

</script>


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
               content: 'Ya existe este registro.',
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
 
   </script>


  <script>

    function botonCancelar2(){
    //window.location.reload(true);
    var caja = document.getElementById("verModal");
    caja.style.display = "none";

   
}

function veEmpleado(id){
	
  var caja = document.getElementById("verModal");
  caja.style.display = "block";
  var ajax = nuevoAjax();
  ajax.open("POST","./verempleado.php",true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send("id="+id); 
  ajax.onreadystatechange=function(){

      if(ajax.readyState===4){
          caja.innerHTML=ajax.responseText;
      }
  };
}


  </script>

</body>
</html>