
<?php
  //Reanudamos la sesión
  session_start();

  //Comprobamos si el usuario está logueado
  //Si no lo está, se le redirecciona al index
  if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
    header('Location: ../index.php');
    die();
  } else {
    $correo = $_SESSION['usuario'];
    
  };
?>

<?php 
  include '../data/data.php';
  include '../business/businessmedicion.php';
  $user = "Usuario: <br>"."<p style='font-size: 16px;'>".$correo."</p>";

  if(isset($_GET['mensaje'])){
    $mensaje = $_GET['mensaje'];
  }
?>

<?php 

    $pdo = Database::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $mesActual ='';
     $mescondicion = date('m');
    $mesAnterior = '';
    $anioActual = date("Y");
    $anioAnterior = '';
    $consultaActual = "";

    
    //SI EL MES ES ENERO SE HACE OTRO TIPO DE CONSULTA QUE ENLACE CON EL AÑO ANTERIOR
    if($mescondicion == '01'){
        $mesActual = $meses[11];

        $anioAnterior = date("Y")-1;
        $consultaActual = 'SELECT `clientenombre`,`clienteapellido1`,`clienteapellido2`, `medicionid`, `medicionclientemedidorid`, `AnioActual`,  `'.$mesActual.'` FROM `tbmediciongeneral` INNER JOIN `tbcliente` WHERE `AnioActual` = '.$anioAnterior.' AND tbcliente.clientemedidor = tbmediciongeneral.medicionclientemedidorid';
    }else{
      $mesActual = $meses[date('n')-2];
     $consultaActual = 'SELECT `clientenombre`,`clienteapellido1`,`clienteapellido2`, `medicionid`, `medicionclientemedidorid`, `AnioActual`, `'.$mesActual.'`  FROM `tbmediciongeneral` INNER JOIN `tbcliente` WHERE `AnioActual` = '.$anioActual.' AND tbcliente.clientemedidor = tbmediciongeneral.medicionclientemedidorid';
    }

?>

<!DOCTYPE html >
<html lang="en"  >
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="css/tooltipster/dist/css/tooltipster.bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="css/tooltipster/dist/css/tooltipster.main.css" />
    <script type="text/javascript" src="css/tooltipster/dist/js/tooltipster.bundle.min.js"></script>




    <title>Cobros</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/modal.css">
    <!--ANIMACIONES-->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <!-- OTROS-->
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/estilos.css">
   
    <link rel="stylesheet" type="text/css" href="css/cartas.css">
    <script src="js/jquery-3.3.1.min.js"></script>
	  <script src="js/cobroAjax.js"></script>
    <!--TABLAS-->
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="css/tabla.css">
    <!--ICONOS -->
    <link rel="stylesheet" href="icon/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/jquery-confirm.min.css">
    <link rel="stylesheet" href="css/scroll.css">
    <link rel="stylesheet" href="css/steps.css">
    
    <!--SLIDER RECARGO---->
    <style>
        .switch {
          position: relative;
          display: inline-block;
          width: 60px;
          height: 34px;
        }

        .switch input { 
          opacity: 0;
          width: 0;
          height: 0;
        }

        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
        }

        .slider:before {
          position: absolute;
          content: "";
          height: 26px;
          width: 26px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
        }

        input:checked + .slider {
          background-color: #2196F3;
        }

        input:focus + .slider {
          box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
          -webkit-transform: translateX(26px);
          -ms-transform: translateX(26px);
          transform: translateX(26px);
        }

        /* SLIDERS REDONDOS */
        .slider.round {
          border-radius: 34px;
        }

        .slider.round:before {
          border-radius: 50%;
        }
    </style>

    
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

        <div id="cobrosrealizados" onclick="cerrarVentana()"> </div>
        <div id="cobrospendientes" onclick="cerrarVentana()"> </div>
        <div id="cobrosModal" onclick="cerrarVentana()"> </div>
       
        <?php 
          include 'modalcobrosrealizados.php';	
        ?>
        <?php 
           include 'modalcobrospendientes.php';		
        ?>
       
          <div class="animated bounceInLeft" style="margin-right: auto; margin-left: auto; padding: 30px 30px 30px 30px;  background: white; ">
            <div class="row " style="margin-left: auto; margin-right: auto;">
            <span class="card-title" style="margin-bottom: 170px;"><h1>Cobros</h1></span>
             <center>   <div class="col s12 m12">
                   <div class="card blue-grey darken-1" style="width: auto;">
                       <div class="card-content white-text" >
                              
                            <table id="table_id" style=" padding-top: 20px; padding-bottom: 20px; padding-right: 20px; padding-left: 20px;">
                              <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Primer apellido </th>
                                <th>Segundo apellido </th>
                                <th>Medidor</th>
                                <th>Mes</th>
                                <th>Medición correspondiente</th>
                                <th>Año</th>
                                
                                <th>Desglose</th>
                                
                              </thead>

                                <tbody>
                                  <?php
                              
                              $pdo = Database::conectar();
                              $pdo -> exec("set names utf8");
                              
                              foreach ($pdo->query($consultaActual) as $row) {
                                
                                
                                        echo '<tr>';
                                        echo '<td>'. $row['medicionid'].'</td>';
                                        echo '<td>'. $row['clientenombre'].'</td>';
                                        echo '<td>'. $row['clienteapellido1'].'</td>';
                                        echo '<td>'. $row['clienteapellido2'].'</td>';
                                      
                                        echo '<td>'. $row['medicionclientemedidorid'].'</td>';
                                        echo '<td>'. $mesActual.'</td>';
                                        echo '<td>'. $row[$mesActual] . '</td>';

                                        echo '<td>'. $row['AnioActual'] . '</td>';
                                      
                                      
                                        echo '<td><a class="bVer" onclick="realizarCobro(' . $row['medicionclientemedidorid'] . ')"></a></td>';
                                            
                                            
                                            echo '</tr>';
                                      
                              }
                              Database::desconectar();
                              ?>
                                        
                                        </tbody>
                              </table>

                   </div>
                </div>
            </div></center>
           </div>

           <div style="display:flex;justify-content:center;align-items:center;">
               <button id="cobroboton" style="margin-bottom: 30px; background: #333; font-size: 23px; font-weight: bolder;">Consultar clientes con cobros efectuados</button>
               <button id="cobroboton2" style="margin-left:10px; margin-bottom: 30px; background: #333; font-size: 23px; font-weight: bolder;">Consultar clientes pendientes de cobro</button>
               <button id="cobroboton3" style="margin-left:10px; margin-bottom: 30px; background: #333; font-size: 23px; font-weight: bolder;">Gestionar cobros</button>
            </div>

      </div>
       
        
        
    </main>
  <footer class="footer" style="background: #000428;  /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #004e92, #000428);  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #004e92, #000428); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  border:  1px;
  border-top-style: solid;border-color: white;"><h3 style="text-align: center; color: white; padding-top: 18px;"><strong>SAF 2 &#169;
</strong></h3>

</footer>

  <script type="text/javascript">
    
      $(document).ready(function(){


        $(document).on('click', '.bEliminar', function(){
              var id = $(this).attr("id");
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

<script type="text/javascript" src="js/config-table.js"></script>
<script type="text/javascript" src="js/hamburger.menu.script.js"></script>
<script src="js/jquery-confirm.min.js"></script>

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
               content: 'Ya se ha realizaco el cobro a este cliente.',
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
    var bandera = true;
    var recargo = 0;
    var totalActual= 0;
    var sumarecargo = 0;
    var respuestaPorcentaje = 0;
    var restaRecargo = 0;


   
    function getRecargo(){
      $( "#cobrorecargo" ).prop( "disabled", true );
        $(document).ready(function(){

                if(bandera){
                 
                  var id = $("#cobromedidor").val();
                  var total =  $("#cobrototalapagar").val();
                  recargo = id+"/"+total;
                 
                  $( "#cobrorecargo" ).prop( "disabled", false );
                  
                    $.ajax({
                        type: 'post',
                        url: 'recargo.php' ,
                        dataType: 'json',
                        data: 'recargo='+recargo,
                        success: function( response ) {
                       
                            $('#cobrorecargo').val(response[0]);
                            respuestaPorcentaje = parseInt(response[0]);
                            totalActual = parseInt($('#cobrototalapagar').val());
                            sumarecargo =  parseInt($('#cobrototalapagar').val())+parseInt(response[0]);
                            $('#cobrototalapagar').val(sumarecargo);
                            $('#cobrotarifa').val(response[1]);
                            
                        } 
                    }); 
                    bandera = false;
                }else{
                 
                    $('#cobrorecargo').val('');
                    $('#cobrototalapagar').val('');
                    restarecargo =  sumarecargo -parseInt(respuestaPorcentaje);
                    
                    $('#cobrototalapagar').val(restarecargo);
                    sumarecargo = 0;
                    respuestaPorcentaje = 0;
                    totalActual = 0;
                    restarecargo = 0;
                    $( "#cobrorecargo" ).prop( "disabled", true );
                    bandera = true;

                }
              
            
        });

    }

    function botonCancelar(){
   
    var caja = document.getElementById("cobrosModal");
    caja.style.display = "none";
    bandera = true;
}


   
   </script>

  <script>

          // Get the modal
      var modal = document.getElementById('cobro');

      // Get the button that opens the modal
      var btn = document.getElementById("cobroboton");
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks on the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
        document.body.style.overflow = 'hidden';
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
        document.body.style.overflow = 'auto';
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
          document.body.style.overflow = 'auto';
        }
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
          modal2.style.display = "none";
          document.body.style.overflow = 'auto';
        }

        // When the user clicks on the button, open the modal 
        btn2.onclick = function() {
          modal2.style.display = "block";
          document.body.style.overflow = 'hidden';
        }

        // When the user clicks on <span> (x), close the modal

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal2) {
            modal2.style.display = "none";
            document.body.style.overflow = 'auto';
          }
        }

</script>

<script type="text/javascript">

  function reconexion (){
        
        var total = $('#cobrototalapagar').val();
      //  alert(total);
        var rec = $('#cobroreconexion').val();
        var new_total = parseInt(total)+parseInt(rec);
            // show hide paragraph on button click
            $("#campo_rec").toggle("slow", function(){
                // check paragraph once toggle effect is completed
                if($("#campo_rec").is(":visible")){
                   // alert("The paragraph  is visible.");
                    //alert($('#cobrototalapagar').val());
                    $('#cobrototalapagar').val(new_total);
                }else{
                    //alert("The paragraph  is hidden.");
                     $('#cobrototalapagar').val(parseInt(total)-parseInt(rec));
                }
            });
     

  }
    
</script>



</body>
</html>