<?php 
include '../data/data.php';
    $pdo = Database::conectar();

	$sql1 = 'SELECT  `rutacodigo` FROM `tbruta`';
    $sql2 = 'SELECT  `rutahorariorutaid`,`rutahorarioid` FROM `tbrutahorario`';
    $combobit ="";
    $combobit2 ="";

    foreach ($pdo->query($sql1) as $row) {
        $combobit .=" <option value='".$row['rutacodigo']."'>".$row['rutacodigo']."</option>"; 
    }

    foreach ($pdo->query($sql2) as $row) {
        $combobit2 .=" <option value='".$row['rutahorarioid']."'>".$row['rutahorarioid']."</option>"; 
    }
    

    if(isset($_GET['mensaje'])){
      $mensaje = $_GET['mensaje'];
   
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../css/bootstrp.min.css" rel="stylesheet">
    <script src="../js/boottrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
     <script src="js/jquery.min.js"></script>   
     <style type="text/css">
       
       input{
        width: 120px;
       }
       table {
  width: 30%;
  height: 100px;
}


     </style>
</head>
 
<body>
  <div class="tabla">
    <div class="container">
            <div class="row">
                <h3>Horario</h3>
            </div>
            <a href="../index.php" class="btn btn-success">Menú</a>
             <div class="form-group">  <!-- FORM IDA -->
                     <form onsubmit="return(validar());" method="POST" name="horarioform" id="horarioform" action="../business/rutahorarioAction.php">  
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field"> 
										<td>Id de ruta<select style="width: 120px;" name="idruta">
										<?php echo $combobit; ?>
										</select></td>
										</select></td>
										<td>Tipo de dia<select style="width: 120px;" name="tipodia">
										<option>Normal</option>
										<option>Feriado</option>
										</select></td>
										<td> Ida o vuelta
                                   <select style="width: 120px;" name="idaVuelta">
                                            <option value="1">Ida</option> 
                                            <option value="2">Vuelta</option> 
                                   </select>
                               </td>
 
                    <td><button type="button" name="agregarHora" id="agregarHora" class="btn btn-success">Agregar hora</button></td>  
                    <td>
                    <input type="submit" value="Insertar" name="insertar" id="insertar"/> </td>
                     
                    
                            
                               </table>  
                               
                          </div>  
                     </form>  
                </div>  
				
				
            <div class="row">
               
                <table class="table table-striped table-bordered" >
                  <thead>
                    <tr>
                    <th>Id horario</th>
                      <th>Id Ruta</th>
                      <th>Tipo de dia</th>
                      <th>Hora</th>
					  <th>Bus</th>
					  <th>Ida o vuelta</th>
                      <th>Acción</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                   
                   $pdo = Database::conectar();
                   $sql = 'SELECT * FROM tbrutahorario';
                   foreach ($pdo->query($sql) as $row) {
                    echo '<form  method="post" enctype="multipart/form-data" action="../business/rutahorarioAction.php">';
                    echo '<input type="hidden" name="idhorario" value="' . $row['rutahorarioid'] . '">';
                            echo '<tr>';
                            echo '<td><input type="text" name="id" id="id" value="'. $row['rutahorarioid'] . '"/></td>';
                            echo '<td><input type="text" name="rutaid" id="rutaid" value="'. $row['rutahorariorutaid'] . '"/></td>';
                            echo '<td><input type="text" name="tipodia" id="tipodia" value="'. $row['rutahorariotipodia'] .  '"/></td>';
							echo '<td><input type="text" name="hora" id="hora" value="'. $row['rutahorariohora'] .  '"/></td>';
							echo '<td><input type="text" name="bus" id="bus" value="'. $row['rutahorariobus'] .  '"/></td>';
							echo '<td><input type="text" name="idaVuelta" id="idaVuelta" value="'. $row['rutahorarioidavuelta'] .  '"/></td>';
                            echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
                               
                            echo '</tr>';
                            echo '</form>';
							//echo '<td><a href="horarioview.php?id='. $row['rutahorarioid'] .'"><input  type="submit" value="Actualizar" name="actualizar" id="actualizar"/></a></td>';

                   }
                   Database::desconectar();
                  ?>
                  </tbody>

            </table>
        </div>
    </div> <!-- /container -->
    </div>

<!-- ===================================================================================== -->
    <br>
	<br>
	<div class="contenedor">
			
			<div id="ida"  class="divisor">
		
				<h3 align="center">ACTUALIZAR</h3>
				<form method="POST" class="form-horizontal" action="../business/rutahorarioAction.php">
				
				<select required id="seleccion" style="width: 180px;" name="rutahorarioid">
					<?php echo $combobit2 ?>
				</select>
				<tr>
					<td><button type="button" name="agregar" id="agregar" class="btn btn-success">Agregar horas y buses</button><br><br></td></tr>
				</tr>
				
				<br><br><br>
				
				<div id="inputs">
				</div>
				<table  id="dynamic_fieldd">
				</table>
				<input type="submit" value="Actualizar" name="insertar2" id="insertar2"/>
				</form>
		
	</div>
	</div>

<!-- ===================================================================================== -->


	<script type="text/javascript">
$(document).ready(function(){
    $("#seleccion").change(function(){
        var id2 = $(this).find('option:selected').val();
        alert(id2);
        var data = {
              "id2" : id2
        };
     ///OBTENER DATOS CON AJAX
     $.get('ajaxActualizarHorario.php', data, function (response) {

     	//alert(response[0]);
      	$('#inputs').empty().html(response[0]);

    }, 'json')
    });
      
});
</script>

	<script>
    $(document).ready(function(){
    var i=1;
    $('#agregar').click(function(){
        i++;
    $('#dynamic_fieldd').append('<tr id="row'+i+'"><td><input required type="time" name="hora[]" placeholder="Hora" class="form-control name_list" /></td> <td><select id="bus'+i+'" name="bus[]"></select></td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    listar(i);
	});
  
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#rowi'+button_id+'').remove();
    });
  
});
</script>

<!-- ===================================================================================== -->

      <script>  
 $(document).ready(function(){  
      var i=0;  
      $('#agregarHora').click(function(){  
           i++;
            $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="time" onchange ="myFunction()" id="hora" name="hora[]" placeholder="Ingrese hora" class="form-control name_list" /></td><td><select id="bus'+i+'" name="bus[]"></select></td><td><button onclick="disable()" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'); 
			 

            listar(i);
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
           i=0;
      });  
      
 });  
 </script>
 <script type="text/javascript">
   
 
    var variable='<?php echo $mensaje;?>'
 
    alert(variable);

 </script>

 <script type="text/javascript">
	          function listar(i){
                $(document).ready(function() {
                    $.ajax({
                            type: "POST",
                            url: "getbusesdisponibles.php",
                            success: function(response)
                            {
                                $('#bus'+i).html(response).fadeIn();
                            }
                    });

                });
            
}


</script>

<script type="text/javascript">
   <!--
      
      function validar()
      {
      
         if( document.horarioform.idruta.value == "" ){
            alert( "Seleccione una ruta." );
            document.horarioform.idruta.focus() ;
            return false;
         }
		 if(document.getElementById("hora").value.length == 0)
		{
				alert("Inserte horas");
				return false;
		}
		
         if( document.horarioform.hora.value == "" ){
            alert( "Seleccione alguna hora." );
            document.horarioform.hora.focus() ;
            return false;
         }
         return( true );
      }
   //-->
</script>

<script type="text/javascript">
    
    document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('insertar').disabled = "true";
});
function myFunction() {
    var nameInput = document.getElementById('hora').value;
    console.log(nameInput);
    if ( nameInput == null) {
        document.getElementById('insertar').disabled = true;
    } else {
        document.getElementById('insertar').disabled = false;
    }
}

function disable() {
    
    document.getElementById("insertar").disabled = true;
}


</script>



  </body>
</html>