

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

    /*Carga las dependencias especificas */
  include '../data/data.php';
  include '../business/businessmedicion.php';

  $usuario = "saf2@domain.com";
    $welcome = "Usuario: <br>"."<p style='font-size: 16px;'>".$estado."</p>";
    
  

  /*Mensaje que se obtiene de los data, ya sea que el usuario  haya insertado, o que exista
  un registro en la  base de datos.*/ 
  if(isset($_GET['mensaje'])){
      $mensaje = $_GET['mensaje'];
   
    }

 
?>
<!DOCTYPE html >
<html lang="en"  >
<head>
    
    <meta charset="UTF-8">
    <title>Mediciones</title>
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/modal.css">
    <link rel="stylesheet" type="text/css" href="css/botones-form.css">
    <!--ANIMACIONES-->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <!-- OTROS-->
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/min.css">
    <link rel="stylesheet" type="text/css" href="js/script-tablas.js">
    <link rel="stylesheet" type="text/css" href="css/cartas.css">
    <link rel="stylesheet" href="css/scroll.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <!--TABLAS-->
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="css/tabla.css">
    <!--ICONOS -->
    
    <link rel="stylesheet" type="text/css" href="css/estilomodal.css">
    <link rel="stylesheet" href="icon/font-awesome-4.7.0/css/font-awesome.min.css">


<!----------PROGRESS BAR---->
 <style type="text/css">
   @-webkit-keyframes progress-bar-stripes{from{background-position:40px 0}to{background-position:0 0}}@-o-keyframes progress-bar-stripes{from{background-position:40px 0}to{background-position:0 0}}@keyframes progress-bar-stripes{from{background-position:40px 0}to{background-position:0 0}}.progress{height:20px;margin-bottom:20px;overflow:hidden;background-color:#f5f5f5;border-radius:4px;-webkit-box-shadow:inset 0 1px 2px rgba(0,0,0,.1);box-shadow:inset 0 1px 2px rgba(0,0,0,.1)}.progress-bar{float:left;width:0;height:100%;font-size:12px;line-height:20px;color:#fff;text-align:center;background-color:#337ab7;-webkit-box-shadow:inset 0 -1px 0 rgba(0,0,0,.15);box-shadow:inset 0 -1px 0 rgba(0,0,0,.15);-webkit-transition:width .6s ease;-o-transition:width .6s ease;transition:width .6s ease}.progress-bar-striped,.progress-striped .progress-bar{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);-webkit-background-size:40px 40px;background-size:40px 40px}.progress-bar.active,.progress.active .progress-bar{-webkit-animation:progress-bar-stripes 2s linear infinite;-o-animation:progress-bar-stripes 2s linear infinite;animation:progress-bar-stripes 2s linear infinite}.progress-bar-success{background-color:#5cb85c}.progress-striped .progress-bar-success{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent)}.progress-bar-info{background-color:#5bc0de}.progress-striped .progress-bar-info{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent)}.progress-bar-warning{background-color:#f0ad4e}.progress-striped .progress-bar-warning{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent)}.progress-bar-danger{background-color:#d9534f}.progress-striped .progress-bar-danger{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent)}
 </style>

 <style type="text/css">
 .btn{display:inline-block;padding:6px 12px;margin-bottom:0;font-size:14px;font-weight:400;line-height:1.42857143;text-align:center;white-space:nowrap;vertical-align:middle;-ms-touch-action:manipulation;touch-action:manipulation;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-image:none;border:1px solid transparent;border-radius:4px}.btn.active.focus,.btn.active:focus,.btn.focus,.btn:active.focus,.btn:active:focus,.btn:focus{outline:thin dotted;outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}.btn.focus,.btn:focus,.btn:hover{color:#333;text-decoration:none}.btn.active,.btn:active{background-image:none;outline:0;-webkit-box-shadow:inset 0 3px 5px rgba(0,0,0,.125);box-shadow:inset 0 3px 5px rgba(0,0,0,.125)}.btn.disabled,.btn[disabled],fieldset[disabled] .btn{cursor:not-allowed;filter:alpha(opacity=65);-webkit-box-shadow:none;box-shadow:none;opacity:.65}a.btn.disabled,fieldset[disabled] a.btn{pointer-events:none}.btn-default{color:#333;background-color:#fff;border-color:#ccc}.btn-default.focus,.btn-default:focus{color:#333;background-color:#e6e6e6;border-color:#8c8c8c}.btn-default:hover{color:#333;background-color:#e6e6e6;border-color:#adadad}.btn-default.active,.btn-default:active,.open>.dropdown-toggle.btn-default{color:#333;background-color:#e6e6e6;border-color:#adadad}.btn-default.active.focus,.btn-default.active:focus,.btn-default.active:hover,.btn-default:active.focus,.btn-default:active:focus,.btn-default:active:hover,.open>.dropdown-toggle.btn-default.focus,.open>.dropdown-toggle.btn-default:focus,.open>.dropdown-toggle.btn-default:hover{color:#333;background-color:#d4d4d4;border-color:#8c8c8c}.btn-default.active,.btn-default:active,.open>.dropdown-toggle.btn-default{background-image:none}.btn-default.disabled.focus,.btn-default.disabled:focus,.btn-default.disabled:hover,.btn-default[disabled].focus,.btn-default[disabled]:focus,.btn-default[disabled]:hover,fieldset[disabled] .btn-default.focus,fieldset[disabled] .btn-default:focus,fieldset[disabled] .btn-default:hover{background-color:#fff;border-color:#ccc}.btn-default .badge{color:#fff;background-color:#333}.btn-primary{color:#fff;background-color:#337ab7;border-color:#2e6da4}
  btn-primary{color:#fff;background-color:#337ab7;border-color:#2e6da4}.btn-primary.focus,.btn-primary:focus{color:#fff;background-color:#286090;border-color:#122b40}.btn-primary:hover{color:#fff;background-color:#286090;border-color:#204d74}.btn-primary.active,.btn-primary:active,.open>.dropdown-toggle.btn-primary{color:#fff;background-color:#286090;border-color:#204d74}.btn-primary.active.focus,.btn-primary.active:focus,.btn-primary.active:hover,.btn-primary:active.focus,.btn-primary:active:focus,.btn-primary:active:hover,.open>.dropdown-toggle.btn-primary.focus,.open>.dropdown-toggle.btn-primary:focus,.open>.dropdown-toggle.btn-primary:hover{color:#fff;background-color:#204d74;border-color:#122b40}.btn-primary.active,.btn-primary:active,.open>.dropdown-toggle.btn-primary{background-image:none}.btn-primary.disabled.focus,.btn-primary.disabled:focus,.btn-primary.disabled:hover,.btn-primary[disabled].focus,.btn-primary[disabled]:focus,.btn-primary[disabled]:hover,fieldset[disabled] .btn-primary.focus,fieldset[disabled] .btn-primary:focus,fieldset[disabled] .btn-primary:hover{background-color:#337ab7;border-color:#2e6da4}.btn-primary .badge{color:#337ab7;background-color:#fff}
 </style>

 <!---------------------------->
<style type="text/css">
  .alert h4{margin-top:0;color:inherit}.alert .alert-link{font-weight:700}.alert>p,.alert>ul{margin-bottom:0}.alert>p+p{margin-top:5px}.alert-dismissable,.alert-dismissible{padding-right:35px}.alert-dismissable .close,.alert-dismissible .close{position:relative;top:-2px;right:-21px;color:inherit}.alert-success{color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6}.alert-success hr{border-top-color:#c9e2b3}.alert-success .alert-link{color:#2b542c}.alert-info{color:#31708f;background-color:#d9edf7;border-color:#bce8f1}.alert-info hr{border-top-color:#a6e1ec}.alert-info .alert-link{color:#245269}.alert-warning{color:#8a6d3b;background-color:#fcf8e3;border-color:#faebcc}.alert-warning hr{border-top-color:#f7e1b5}.alert-warning .alert-link{color:#66512c}.alert-danger{color:#a94442;background-color:#f2dede;border-color:#ebccd1}.alert-danger hr{border-top-color:#e4b9c0}.alert-danger .alert-link{color:#843534}
</style>


   <style type="text/css">
     html{
    zoom: 90%;
}
   </style>


<style type="text/css">
  /* The Modal (background) */
.modal_doc {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  /*overflow: auto;  Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content_doc {
  background: white;
box-shadow: 10px 7px 40px -2px rgba(0,0,0,0.75);
  border-radius: 30px;
  margin: 5% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 58%; /* Could be more or less, depending on screen size */
  height: 80%;
}

/* The Close Button */
.cerrar-doc-modal {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.cerrar-doc-modal:hover,
.cerrar-doc-modal:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

#cargar_form{
  margin-top: 30px;
  width: 500px;
  height: 240px;
  border: 4px dashed gray;
  border-radius: 10px;
}


#subida{
  position: absolute;
  margin: 0;
  padding: 0;
  width: 34%;
  height: 39%;
  outline: none;
  opacity: 0;
}

#reporte{
  margin-top: 19%;border: 1px dashed black; width: 500px;height: 170px;display: flex;flex-direction: column;justify-content: center;align-items: center; opacity: 0.7; display: none;
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

    <style type="text/css">

        

       
      
        #welcome {
            animation-duration: 3s;
 
        /* animation-iteration-count: infinite;*/
        }

       /* .alert-success{width: 200px; height: 50px; color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6; border-radius: 10px;}*/


        /*TABLA*/
        #user_data {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #user_data td, user_data th {
            border: 1px solid #ddd;
            padding: 8px;
            
        }


        #user_data tr:nth-child(even){background-color: #f2f2f2;}

        #user_data tr:hover {background-color: #ddd;}

        #user_data th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background: #333; 
            color: white;
        }

        #contenedor-tabla{
            margin-right: auto; 
            margin-left: auto; 
            padding: 30px 30px 30px 30px;  
            background: white;
            height: 848px;
        }

    </style>

</head>
<body style="">
        
    <!--HEADER-->
   <header><span class="lnr lnr-menu show"></span> </header>

    <!--MAIN-->
    <main style="<?php if($_SESSION['tipo'] == '2'){
                echo 'height:900px';
            }else{
              echo 'height:auto';
            }
              ?>;"  >
        <!--CONTENEDOR MENÚ-->
        <div  style="  box-shadow: 2px 0px;" id="content-menu" class="content-menu " >
      
            <div style=" box-shadow: 0px 2px;  opacity: 0.8; cursor: none; width: auto; height: 120px; background: #000428;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #004e92, #000428);  /* Chrome 10-25, Safari 5.1-6 */background: linear-gradient(to right, #004e92, #000428); /">
              <i style="color: white;font-size: 35px;margin-left: 252px; margin-top: 10px;" class="fa fa-user-circle" aria-hidden="true"></i>
              <div style="display:flex; flex-direction:row;"><h4 id="welcome" style="" class="text1"><?php echo $welcome ?></h4></div>
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
        </div>
           <!--CONTENIDO-->
        <div id="contenido" class="contenido" style="width: 100%; overflow: auto; ">
     
        <?php include "modalmedicion.php" ?>
        <?php include 'consultaclientesmodal.php';	?>
        <?php include 'crearregistrosmodal.php';  ?>

          <div id="contenedor-tabla" class="animated bounceInLeft" style="width:auto; height:auto;" >
          
          <span class="card-title" style="display: flex; justify-content: center; paddint-top: 50px;"><h1 style="">Medición</h1></span>
          
            <div class="row " style="margin-left: auto; margin-right: auto; ">
            
                <div class="col s12 m12">
                
                   <div class="card blue-grey darken-1" style="width:auto;">
                      
                       <div style="margin-top: 3%;" class="card-content white-text" >
                       <button onclick="document.body.style.overflow = 'hidden';;document.getElementById('id').style.display='block'"style="margin-bottom: 30px; background: #333; font-size: 23px; font-weight: bolder;font-family:Quicksand"class="pure-button pure-button-primary" >Insertar registro por cliente</button>   
                        <button id="nuevosregboton" onclick="" style="margin-bottom: 30px; background: #333; font-size: 23px; font-weight: bolder;font-family:Quicksand"class="pure-button pure-button-primary" >Insertar registros múltiples de clientes</button>   

                        <button id="load-document" onclick="" style="margin-bottom: 30px; background: #333; font-size: 23px; font-weight: bolder;font-family:Quicksand"class="pure-button pure-button-primary" >Cargar documento</button>         
                       <button id="cobroboton2" onclick="" style="margin-bottom: 30px; background: #333; font-size: 23px; font-weight: bolder;font-family:Quicksand"class="pure-button pure-button-primary" >Consultar medidor de cliente</button>           
                       

                          <br><br>

                          
                          <table style="margin-left: -30px;" id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
                             <th>ID</th>
                             <th>Cliente</th>
                             <th>Medidor</th>
                              <th>Enero</th>
                              <th>Febrero</th>
                              <th>Marzo</th>
                              <th>Abril</th>
                              <th>Mayo</th>
                              <th>Junio</th>
                              <th>Julio</th>
                              <th>Agosto</th>
                              <th>Septiembre</th>
                              <th>Octubre</th>
                              <th>Noviembre</th>
                              <th>Diciembre</th>
                              <th>Año</th>
                              
                              
                              <th>Eliminar</th>
      </tr>
     </thead>
    </table>
                       </div>
                        <div class="card-action">
                         
                       
                        </div>
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

<script type="text/javascript" src="js/config-table.js"></script>

<script src="js/jquery-confirm.min.js"></script>
<link rel="stylesheet" href="css/jquery-confirm.min.css">

<script type="text/javascript" src="js/jquery.modal.min.js"></script>

 

  <script type="text/javascript" language="javascript" >

  var esp = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ ",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sSearch":         "Buscar:",
    "sInfoPostFix":    "",
    
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
 $(document).ready(function(){

  
  

  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#user_data').DataTable({
    "language": esp,
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"getregistromediciones.php",
     type:"POST"
    }
   });
  }


  function update_data(id, column_name, value, actualizar)
  {
   $.ajax({
    url:"../business/actionmedicion.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value, actualizar:actualizar},
    success:function(data)
    {
    // $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#user_data').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }


  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   //alert(id);
   var column_name = $(this).data("column");
   var value = $(this).text();
   var actualizar = 'actualizar';


   $.confirm({
    boxWidth: '30%',
theme: 'supervan',
     useBootstrap: false,
     animation: 'zoom',
    closeAnimation: 'scale',
    autoClose: 'Cancelar|8000',
    title: 'Actualizar',
    content: '¿Está seguro que desea actualizar este registro?',
    
     
    buttons: {
        
        Confirmar: function () {

          update_data(id, column_name, value, actualizar);


            $.alert({
              useBootstrap: false,
               boxWidth: '30%',
                title: 'Mensaje',
               content: 'Actualizado con éxito',
               animation: 'Rotate' 


            });
        },
        Cancelar: function () {
           $('#user_data').DataTable().destroy();
            fetch_data(); 
        }
    }
});



   
  });


  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
  // alert(id);
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
             url:"../business/actionmedicion.php",
             method:"POST",
             data:{id:id,eliminar:eliminar},
             success:function(data){
              //$('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
              $('#user_data').DataTable().destroy();
              fetch_data();
             }
            });
            /*/setInterval(function(){
             $('#alert_message').html('');  
            }, 5000);*/
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
   /*if(confirm("¿Desea eliminar este registro?"))
   {
    
   }*/
  });


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
               content: 'Ya existe este registro.',
               animation: 'Rotate' 


            });
     }

     if(variable == 3){

        $.alert({
              useBootstrap: false,
               boxWidth: '30%',
                title: 'Mensaje',
               content: 'Registros creados exitosamente.',
               animation: 'Rotate' 


            });
     }
  

     if(variable == 4){

        $.alert({
              useBootstrap: false,
               boxWidth: '30%',
                title: 'Mensaje',
               content: 'No se pueden crear los registros, ya que existen en el año especificado.',
               animation: 'Rotate' 


            });
     }
   </script>

<script type="text/javascript" src="js/hamburger.menu.script.js">

</script>

<script> 

    function botonCancelar(){
    //window.location.reload(true);
    document.getElementById("regForm").reset();
    $('#txtHint').empty();
    var caja = document.getElementById("id");
    caja.style.display = "none";
    document.body.style.overflow = 'auto';
    

   
}



</script>

<script> 
function hello(){
    alert("hello world");
}
</script>

<script>
        
            // Get the modal
        var modal2 = document.getElementById('cobro2');

        // Get the button that opens the modal
        var btn2 = document.getElementById("cobroboton2");
        // Get the <span> element that closes the modal
        var span2 = document.getElementsByClassName("close2")[0];

        span2.onclick = function() {
           document.body.style.overflow = 'auto';
          modal2.style.display = "none";
        }

        // When the user clicks on the button, open the modal 
        btn2.onclick = function() {
          document.body.style.overflow = 'hidden';
          modal2.style.display = "block";
          
        }

        // When the user clicks on <span> (x), close the modal

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal2) {
             document.body.style.overflow = 'auto';
            modal2.style.display = "none";

          }
        }

</script>

<script>

            // Get the modal
        var modal3 = document.getElementById('nuevosregistros');

        // Get the button that opens the modal
        var btn3 = document.getElementById("nuevosregboton");
        // Get the <span> element that closes the modal
        var span3 = document.getElementsByClassName("close3")[0];

        span3.onclick = function() {
          document.body.style.overflow = 'auto';
          modal3.style.display = "none";

        }

        // When the user clicks on the button, open the modal 
        btn3.onclick = function() {
          modal3.style.display = "block";
          document.body.style.overflow = 'hidden';
        }

        // When the user clicks on <span> (x), close the modal

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal3) {
            modal3.style.display = "none";
            document.body.style.overflow = 'auto';
          }
        }

</script>

<!-- The Modal -->
<div id="cargarDocumentoModal" class="modal_doc">

  <!-- Modal content -->
  <div class="modal-content_doc">
    <span class="cerrar-doc-modal">&times;</span>
    <div id="contenedor" style="display: flex;flex-direction: column;">
      <div id="formulario" style="margin-top: -1%; display: flex;align-items: center;justify-content: center;">

        <form method="post" id="cargar_form" enctype="multipart/form-data">
            <div class="form-group" style="display: flex;justify-content: center;align-items: center;">
           
           <input type="file" name="file" id="subida" required />
           <p style="margin-top: 90px;">Arrastre sus archivos aquí o clickee en esta área.</p>
          </div>
      <br />
          <div class="form-group" style="margin-top: 37%;display: flex;justify-content: center;align-items: center;">
           <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Cargar documento" />
          </div>
        </form>
        
      </div>
      <div style="margin-top:4%;margin-left: auto;margin-right: auto; width: 50%;">
         <div  class="progress"> <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div> </div>
      </div>
      
      <div id="resultados" style="display: flex; justify-content: center;align-items: center; flex-direction: column; ">
        

        <div style="display: flex; justify-content: center;align-items: center; width: 40%;">
          <center><span id="reporte"></span> </center>
        </div>

        <!----<div id="reporte" style="margin-top: 2%;border: 1px dashed black; width: 500px;height: 100px;display: flex;flex-direction: column;justify-content: center;align-items: center; opacity: 0.7;">---->
            

        </div>

        
        </div>
       
    </div>
    
  </div>

</div>

<!-----------MODAL DOCUMENTO------------------>
<script type="text/javascript">
      // Get the modal
    var modal_documento = document.getElementById('cargarDocumentoModal');

    // Get the button that opens the modal
    var btn_documento = document.getElementById("load-document");

    // Get the <span> element that closes the modal
    var span_documento = document.getElementsByClassName("cerrar-doc-modal")[0];

    // When the user clicks on the button, open the modal 
    btn_documento.onclick = function() {
      modal_documento.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span_documento.onclick = function() {
      modal_documento.style.display = "none";
      $('#reporte').css('display', 'none');
      location.reload('mediciongeneralview.php');
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal_documento) {
        modal_documento.style.display = "none";
        $('#reporte').css('display', 'none');
      }
    }
</script>

<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="jquery-confirm.min.js"></script>

<!-----------CONTADOR DE DOCUMENTOS------------------>
<script type="text/javascript">

  $(document).ready(function(){
  $('form input').change(function () {
    var fileName = document.getElementById('subida').files[0].name;
  //alert(fileName);
    $('form p').text(this.files.length + " archivo seleccionado - "+fileName);
  });
});
</script>

<script type="text/javascript">
  function animateCSS(element, animationName, callback) {
    const node = document.querySelector(element)
    node.classList.add('animated', animationName)

    function handleAnimationEnd() {
        node.classList.remove('animated', animationName)
        node.removeEventListener('animationend', handleAnimationEnd)

        if (typeof callback === 'function') callback()
    }

    node.addEventListener('animationend', handleAnimationEnd)
}
</script>

<script>
$(document).ready(function(){
 $('#cargar_form').on('submit', function(event){
  event.preventDefault();

  $.ajax({
   url:"cargarmedicionesdoc.php",
   method:"POST",
   data: new FormData(this),
   contentType:false,
   cache:false,
   dataType:"json",
   processData:false,
   async: true,
   beforeSend:function(){
    $('#submit').attr('disabled','disabled'),
    $('#submit').val('Cargando...');
   },
   xhr: function () {
      var xhr = new window.XMLHttpRequest();
      //Upload Progress
      xhr.upload.addEventListener("progress", function (evt) {
         if (evt.lengthComputable) {
        var percentComplete = (evt.loaded / evt.total) * 100; $('div.progress > div.progress-bar').css({ "width": percentComplete + "%" }); } }, false);
 
//Download progress
 xhr.addEventListener("progress", function (evt)
 {
 if (evt.lengthComputable)
  { var percentComplete = (evt.loaded / evt.total) *100;
 $("div.progress > div.progress-bar").css({ "width": percentComplete + "%" }); } },
false);
return xhr;
},
   
  

   success:function(data)
   {
    //$('#message').html(data[0]);
   // alert(data[3]);
    if(data[3]=='2'){
        $('#reporte').html(data[2]).css('display', 'none');
      $('form p').text('Arrastre sus archivos aquí o clickee en esta área.');
    $('#cargar_form')[0].reset();
    
    $('#submit').attr('disabled', false);
    $('#submit').val('Cargar documento');
    $( ".progress-bar" ).css( "width", "0%" ).attr( "aria-valuenow", 0);
      $.alert({
        useBootstrap: false,
        
         boxWidth: "30%",
          title: "Error con documento",
          type:'blue',
          backgroundDismiss: true,
          draggable: true,
        
         content: "El documento no cumple con las especificaciones necesarias.",
         animation: "scaleX" 
  
  
      }); 

    }


    if(data[3]=='4'){
        $('#reporte').html(data[2]).css('display', 'none');
      $('form p').text('Arrastre sus archivos aquí o clickee en esta área.');
    $('#cargar_form')[0].reset();
    
    $('#submit').attr('disabled', false);
    $('#submit').val('Cargar documento');
    $( ".progress-bar" ).css( "width", "0%" ).attr( "aria-valuenow", 0);
      $.alert({
        useBootstrap: false,
        
         boxWidth: "30%",
          title: "Registros inexistentes",
          type:'blue',
          backgroundDismiss: true,
          draggable: true,
        
         content: "No existen registros para el año especificado. Para crearlos utilice la opción en el módulo de medición: Insertar registros múltiples de clientes.",
         animation: "scaleX" 
  
  
      }); 
      modal_documento.style.display = "none";
      setTimeout(function(){
        animateCSS('#nuevosregboton', 'bounce');
      }, 5000);



      
     // $('#nuevosregboton').css('background-color','white');

    }

    if(data[3]=='1'){
      $('#reporte').html(data[2]).css('display', 'block');
    $('form p').text('Arrastre sus archivos aquí o clickee en esta área.');
    $('#cargar_form')[0].reset();
    
    $('#submit').attr('disabled', false);
    $('#submit').val('Cargar documento');
    $( ".progress-bar" ).css( "width", "0%" ).attr( "aria-valuenow", 0);
    $.alert({
        useBootstrap: false,
        
         boxWidth: "30%",
          title: "Datos de medición procesados",
          type:'blue',
          backgroundDismiss: true,
          draggable: true,
        
         content: "Los datos de medición brindados en el archivo han sido procesados. Para más información, revisar reportes.",
         animation: "scaleX" 
  
  
      }); 

    }

    
   }
  })

  /*setInterval(function(){
   $('#message').html('');
  }, 5000);*/

  /*setInterval(function(){
   $('#message').html('');
  }, 5000);*/

 });
});
</script>

<script type="text/javascript">
  
  $(document).keydown(function(e) {
    // ESCAPE key pressed
    if (e.keyCode == 27) {
         modal_documento.style.display = "none";
    }
});
</script>

</body>
</html>