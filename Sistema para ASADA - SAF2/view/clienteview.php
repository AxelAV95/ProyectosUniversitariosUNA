
<?php
//Reanudamos la sesión
session_start();

//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión

if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
	header('Location: ../index.php');
	die();
} else {
	$estado = $_SESSION['usuario'];

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

  if(isset($_GET['mensajeenvio'])){
    $mensajetipo = $_GET['mensajeenvio'];
 
  }


  
?>
<!DOCTYPE html >
<html lang="en"  >
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="css/tooltipster/dist/css/tooltipster.bundle.min.css" />
<link rel="stylesheet" type="text/css" href="css/tooltipster/dist/css/tooltipster.main.css" />
<script type="text/javascript" src="css/tooltipster/dist/js/tooltipster.bundle.min.js"></script>


    <title>Clientes</title>
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

	<script src="js/clienteAjax.js"></script>
 
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
        <div id="actualizarModalMedidor" onclick="cerrarVentana()"> </div>
        <div id="verModal" onclick="cerrarVentana()"> </div>
        <?php 
                              include 'clientemodal.php';		
    
    
                            ?>

          <div class="animated bounceInLeft" style="margin-right: auto; margin-left: auto; padding: 30px 30px 30px 30px;  background: white; ">
            <div class="row " style="margin-left: auto; margin-right: auto;">
                <div class="col s12 m12">
                   <div class="card blue-grey darken-1" style="width: auto;">
                       <div class="card-content white-text" >
                           <span class="card-title" style="margin-bottom: 70px;"><h1>Clientes</h1></span>
                           <button id="myBtn" style="margin-bottom: 30px; background: #333; font-size: 23px; font-weight: bolder;">Registrar cliente</button>
                           

                            <table id="table_id" style=" padding-top: 20px; padding-bottom: 20px; padding-right: 20px; padding-left: 20px;">
                  <thead>
                    <th>Cédula</th>
                    <th>Nombre/Descripción</th>
                    <th>Primer apellido/Descripción</th>
                    <th>Segundo apellido/Descripción</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Medidor</th>
                    <th>Tipo de cliente</th>
                    <th>Estado</th>
                    <th>Mostrar</th>
                    <th>Actualizar/Enviar correo</th>
                    <th>Eliminar</th>
                  </thead>

                    <tbody>
                      <?php
                   header('Content-type: text/html; charset=utf-8');
                   $pdo = Database::conectar();
                   $pdo -> exec("set names utf8");
                   $sql = 'SELECT * FROM tbcliente';
                   foreach ($pdo->query($sql) as $row) {
                    echo '<form  method="post" enctype="multipart/form-data" action="../business/clienteAction.php">';
                    echo '<input type="hidden" name="id" value="' . $row['clienteid'] . '">';
                            echo '<tr>';
                            echo '<td>'. $row['clientecedula'].'</td>';
                            echo '<td>'. $row['clientenombre'] . '</td>';
                            echo '<td>'. $row['clienteapellido1'] . '</td>';
                             echo '<td>'. $row['clienteapellido2'] . '</td>';
                            echo '<td>'. $row['clientecorreo'] . '</td>';
                            echo '<td>'. $row['clientetelefono'] . '</td>';
                            //echo '<td>'. $row['clientemedidor'] . '</td>';

                            if($row['clientetipo']=="1"){
                              echo '<td>'. $row['clientemedidor'] . '</td>';
                            }else if($row['clientetipo']=="2"){
                              echo '<td>'. $row['clientemedidor'] . '</td>';
                            }else if($row['clientetipo']=="3"){
                              echo '<td>'. "" . '</td>';
                            }

                            echo '<td>'; 
                            
                            if($row['clientetipo']=="1"){
                              echo "Emprego";
                            }else if($row['clientetipo']=="2"){
                              echo "Domipre";
                            }else if($row['clientetipo']=="3"){
                              echo "Prevista";
                            }

                             '</td>';

                             echo '<td>'; 
                            
                            if($row['clienteestado']=="1"){
                              echo "Activo";
                            }else if($row['clienteestado']=="2"){
                              echo "Suspendido";
                            }else if($row['clienteestado']=="3"){
                              echo "Otros";
                            }else if($row['clienteestado']=="4"){
                              echo "Inhabilitado";
                            }

                             '</td>';


                             if($row['clientetipo']=="1" || $row['clientetipo']=="2"){
                              echo '<td><a class="bVer" onclick="veCliente(' . $row['clienteid'] . ')"></a></td>';
                            echo '<td><span class="tooltip" title="Actualizar datos personales"><a class="bActualizar" onclick="actualizaCliente(' . $row['clienteid'] . ')" ></span></a><span class="tooltip" title="Actualizar medidor"><a class="bMedidor" onclick="actualizaMedidorCliente(' . $row['clienteid'] . ')" ></span></a><span class="tooltip" title="Enviar correo"><a class="bEmail" onclick="enviarCorreoCliente(' . $row['clienteid'] . ')" ></span></a></td>';

                            echo '<td><div class="bEliminar" id="'.$row["clienteid"].'" ></div></td>';
                            }else {
                              echo '<td><a class="bVer" onclick="veCliente(' . $row['clienteid'] . ')"></a></td>';
                            echo '<td><span class="tooltip" title="Actualizar datos personales"><a class="bActualizar" onclick="actualizaCliente(' . $row['clienteid'] . ')" ></span></a><span class="tooltip" title="Enviar correo"><a class="bEmail" onclick="enviarCorreoCliente(' . $row['clienteid'] . ')" ></span></a></td>';

                            echo '<td><div class="bEliminar" id="'.$row["clienteid"].'" ></div></td>';
                            }



                            
                                
                                
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



<!-- The Modal -->
<div id="emailModal" class="modalemail">

  

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
                        url:"../business/clienteaction.php",
                        method:"POST",
                        data:{id:id,eliminar:eliminar},
                        success:function(data){
                          //alert("Eliminado con exito");

                          setTimeout(function(){
                            window.location.href="../view/clienteview.php";
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


        $('#clientecedula').mask('000000000');
        $('#clientetelefono').mask('00000000');
        $('#clientemedidor').mask('00000000');
        $('#clientecasasenlazadas').mask('0000');
       



      });

     
    </script>


<script type="text/javascript" src="js/config-table.js"></script>
<script type="text/javascript" src="js/hamburger.menu.script.js"></script>
<script src="js/jquery-confirm.min.js"></script>

<script type="text/javascript" src="js/modal-script-empleado.js"></script>



<script src="js/jqueryform/form-validator/jquery.form-validator.min.js"></script>

<script type="text/javascript" >
  
   // Get the modal
var modalemail = document.getElementById('emailModal');

// Get the button that opens the modal
var btnemail = document.getElementById("emailBtn");

// Get the <span> element that closes the modal
var spanemail = document.getElementsByClassName("closeemail")[0];

// When the user clicks on the button, open the modal 
btnemail.onclick = function() {
  modalemail.style.display = "block";
}



function cerrar(){
  var caja = document.getElementById("emailModal");
    caja.style.display = "none";

}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalemail) {
    modalemail.style.display = "none";
  }
}


</script>
 <script src="js/emailAjax.js">
   

 </script>
<script> 

$("input").change(function(){

  var nombre = $("#clientenombre").val().length;
  var apellido1 = $("#clienteapellido1").val().length;
  var apellido2 = $("#clienteapellido2").val().length;
  var cedula = $("#clientecedula").val().length;
  



      if(nombre > 30){
        $('#clientenombre').val('');
        $("#clientenombre").focus();
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
        $('#clienteapellido1').val('');
        $("#clienteapellido1").focus();
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
        $('#clienteapellido2').val('');
        $("#clienteapellido2").focus();
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
        $('#clientecedula').val('');
      
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
       content: 'Se ha actualizado con éxito.',
       animation: 'Rotate' 


    });
}

 if(variable == 5){

$.alert({
      useBootstrap: false,
       boxWidth: '30%',
        title: 'Mensaje',
       content: 'El medidor se ha actualizado con éxito.',
       animation: 'Rotate' 


    });
}
 
   </script>


  <script>

    function botonCancelar2(){
   
    var caja = document.getElementById("verModal");
    caja.style.display = "none";

   
}

function botonCancelar3(){
   
    var caja = document.getElementById("modalmedidor");
    caja.style.display = "none";

   
}

function veCliente(id){
	
  var caja = document.getElementById("verModal");
  caja.style.display = "block";
  var ajax = nuevoAjax();
  ajax.open("POST","./vercliente.php",true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send("id="+id); 
  ajax.onreadystatechange=function(){

      if(ajax.readyState===4){
          caja.innerHTML=ajax.responseText;
      }
  };
}




  </script>

  <script>

    $( "#casasmensaje" ).click(function() {
      
$.alert({
      useBootstrap: false,
       boxWidth: '30%',
        title: 'Mensaje',
       content: 'Aquí se ingresan el total de casas que están enlazadas al medidor del abonado(Recargo). Este parámetro permite calcular la tárifa básica con base a la cantidad de casas que comparten el mismo medidor. Por defecto es 1 cuando se trata de un solo hogar.',
       animation: 'zoom' 


    });
    
    
      });  

      $( "#tipomensaje" ).click(function() {
      
      $.alert({
            useBootstrap: false,
             boxWidth: '30%',
              title: 'Mensaje',
             content: 'Emprego: Negocio.<br>Domipre: Casa.<br>Prevista: Cliente que paga por una futura disponibilidad del servicio.',
             animation: 'zoom' 
      
      
          });
          
          
            });  
  
   </script>

    <script>
/*
$(document).ready(function() {
     $("#formulario").submit(function()  {
    var val1 = $('#email').val();
    var val2 = $('#asunto').val();
    var val3 = $('#mensaje').val();
    var val4 = $('#nombre').val();
    alert(val1+val2+val3+val4);
    $.ajax({
        type: 'POST',
        url: 'enviar.php',
        data: { val1: val1, val2: val2, val3: val3, val4: val4   },
        success: function(data) {

            
            alert(data);
            $('#result').html(data);
        }
    });
});
});*/


var variable='<?php echo $mensajetipo;?>'

if(variable == 1){

 $.alert({
         useBootstrap: false,
          boxWidth: '30%',
           title: 'Mensaje',
          content: 'Enviado con éxito.',
          animation: 'Rotate' 


       });

}

if(variable == 2){

$.alert({
        useBootstrap: false,
         boxWidth: '30%',
          title: 'Mensaje',
         content: 'Error al enviar',
         animation: 'Rotate' 


      });

}

if(variable == 3){
  $.alert({
        useBootstrap: false,
         boxWidth: '30%',
          title: 'Mensaje',
         content: 'Los correos brindados son incorrectos.',
         animation: 'Rotate' 


      });

}


</script>








  

   
   
</body>
</html>