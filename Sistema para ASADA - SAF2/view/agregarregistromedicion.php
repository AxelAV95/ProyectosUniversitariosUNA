<?php 
 // include '../business/empleadoAction.php';

 include '../business/actionmedicion.php';


  //$clientID = $_GET['id'];


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/typeahead.min.js"></script>
    <style type="text/css">
      .tt-dropdown-menu {
  background-color: #FFFFFF;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 8px;
  box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);

  height: 50px;
  width: 172px;
}
    </style>



</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Agregar registro de medición</h3>
                    </div>
             
                    <form name="f" class="form-horizontal" action="../business/actionmedicion.php" method="post">
                      
                      
                        <label class="control-label">Número de medidor:</label> <br>
                       <input onchange="showUser(this.value)" type="text" name="medidorid" class="typeahead tt-query" id="med" autocomplete="off" spellcheck="false" placeholder="Ingrese medidor del cliente" value="#######">
                           <br>
                           <br>
                           <div id="txtHint"><b></b></div>

                        
                     
                      <div class="form-actions">
                        
                          <a class="btn" href="mediciongeneralview.php">Regresar</a>
                        </div>
                    </form>
                </div>
                
                 
    </div> <!-- /container -->

    <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'buscarClente.php?key=%QUERY',
        limit : 10
    });


});


    </script>

   


    <script type="text/javascript">
      
      function cal() {
    try {
      var a = parseInt(document.f.lecturaactual.value),
          b = parseInt(document.f.lecturaanterior.value);
      document.f.metroscubicos.value = a - b;
    } catch (e) {
    }
}
    </script>

<script>
function showUser(str) {
  if (str=='') {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","info/clienteinfo.php?q="+str,true);
  xmlhttp.send();
}
</script>
 <script type="text/javascript">
        
   //var vidFile = document.getElementById("clienteid").files[0].name; 
   // $('#insertar').attr("disabled", true);

      /*if(document.getElementById("txtHint").files.length == 0){
        $('#insertar').attr("disabled", true);
        }else{
        $('#insertar').attr("disabled", false);
    }*/

    /*$('#clienteid').keyup(function(){
        if($(this).val().length !=0){
            $('#insertar').attr('disabled', false);
        }
        else
        {
            $('#insertar').attr('disabled', true);        
        }*/

    </script>



    

  </body>
</html>
        
