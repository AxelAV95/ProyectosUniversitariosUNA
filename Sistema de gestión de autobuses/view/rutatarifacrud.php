<?php 
include '../data/data.php';
    $pdo = Database::conectar();
    
    $sql2 = 'SELECT  `rutacodigo` FROM `tbruta`';
    $sql3 = 'SELECT  `rutacodigo`,`rutalugarsalida`,`rutalugardestino` FROM `tbruta`';

    $combobit2 ="";
    $combobit2 .= "<option required />";
    foreach ($pdo->query($sql2) as $row) {

        $combobit2 .=" <option value='".$row['rutacodigo']."'>".$row['rutacodigo']."</option>"; 
    }
    $combobit3 ="";
    foreach ($pdo->query($sql3) as $row) {

        $combobit3 .=" <option disabled value='".$row['rutacodigo'].",".$row['rutalugarsalida'].",".$row['rutalugardestino']."'>".$row['rutacodigo']." : ".$row['rutalugarsalida']." - ".$row['rutalugardestino']."</option>"; 
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
     
</head>
 
<body>
  <div class="tabla">
    <div class="container">
            <div class="row">
                <h3>Ruta tarifa</h3>
            </div>
            <a href="../index.php" class="btn btn-success">Menú</a>
                    <br><br>
                    <div style="padding: 10px 10px 10px 10px; width:760px; border: 1px solid black;">
                     <form  method="POST" name="rutatarifaform" id="rutatarifaform" class="form-horizontal" action="../business/rutatarifaaction.php">  
                        
                            <table>   
                                
                                <tr>
                                  <td><label>Visualizar rutas segun codigo</label></td><td><select style="width: 220px;">
                                          <?php echo $combobit3; ?>
                                     </select>
                                 </td>
                                 <td> <label>Ruta: </label></td>
                                  <td><select required id="rutaid" style="width: 180px;" name="rutaid" onchange="getSelectValue()">
                                          <?php echo $combobit2; ?>
                                  </select>
                                 </td>
                                 <tr>
                                 <td><button type="button" name="agregarLugar" id="agregarLugar" class="btn btn-success">Agregar lugares y montos</button><br><br></td></tr>
                                </tr>


                                <td><label>Origen:</label></td>
                                <tr>
                                  
                                  <td><input required disabled type="text" id="origensubruta" name="subruta_[]" placeholder="Subruta"></td>
                                  <td><input required disabled type="number" id="origenmontominimo" name="monto_[]" placeholder="Monto minimo" ></td>
                                </tr>
                                
                                <table  id="dynamic_field">
                                </table>
                                
                                <td><label>Destino</label></td><br>
                                <tr>

                                  <td><input disabled type="text" id="destinosubruta" name="subruta_[]" placeholder="Subruta"></td>
                                   <td><input disabled type="number" id="destinomontomaximo" name="" placeholder="Monto maximo" ></td>
                                </tr>
                            
                            </table><br><br>
                             <td><input type="submit" value="Insertar" name="insertar" id="insertar"/> </td>
                             <br><br><br>
                          
                     </form>  
                     </div>
                
            <div class="row">
               
               <table class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th>Id Ruta</th>
                        <th>Lugares</th>
                        <th>Montos</th>
                        <th>Direccion</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                  <tbody>
                  <?php
                   
                   $pdo = Database::conectar();
                   $sql = 'SELECT * FROM tbrutatarifa';
                   foreach ($pdo->query($sql) as $row) {
                    echo '<form  method="post" enctype="multipart/form-data" action="../business/rutatarifaaction.php">';
                    echo '<input type="hidden" name="id" value="' . $row['rutatarifarutaid'] . '">';
                        echo '<tr>';
                            echo '<td><input disabled="disabled" type="text" name="tarifaid" id="tarifaid" value="'. $row['rutatarifarutaid'] . '"/></td>';
                            echo '<td><input type="text" name="lugar" id="lugar" value="'. $row['rutatarifalugares'] . '"/></td>';
                            echo '<td><input type="text" name="monto" id="monto" value="'. $row['rutatarifamonto'] . '"/></td>';
                            echo '<td><input disabled="disabled" type="text" name="idaVuelta" id="idaVuelta" value="'. $row['rutatarifaidavuelta'] . '"/></td>';
                            //echo '<a class="btn" href="verRutaTarifa.php?id='.$row['rutatarifaid'].'">Ver</a>';
                            echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
                        echo '</tr>';
                        echo '</form>';
                        //echo '<td><a href="actualizarRutaTarifa.php?id='. $row['rutatarifaid'] .'"><input  type="submit" value="Actualizar" name="actualizar" id="actualizar"/></a></td>';
                            
                   }
                   Database::desconectar();
                  ?>
                  </tbody>
            </table>
        </div>
    </div>
    </div>

<!--===============================================================================================-->
	<div class="contenedor">
			
			<div id="ida" class="divisor">
		
				<h3 align="center">ACTUALIZAR</h3>
				<form method="POST" class="form-horizontal" action="../business/rutatarifaaction.php">
				
				<select required id="seleccion" style="width: 180px;" name="rutaid">
					<?php echo $combobit2 ?>
				</select>
				<tr>
					<td><button type="button" name="agregarLugares" id="agregarLugares" class="btn btn-success">Agregar lugares y montos</button><br><br></td></tr>
				</tr>
				<br><br><br>
				<input type="hidden" name="idaVuelta" value="idaVuelta">
				<label>Salida<br></label>
				<input disabled placeholder="Salida" id="salida" type="text" name="subruta_[]" value="<?php //echo $salida ?>">
				<input disabled placeholder="Monto minimo" id="minimo" type="number" name="monto_[]" value="<?php //echo $minimo ?>">
				
				<div id="inputsIda">
				</div>
				<table  id="dynamic_fieldd">
				</table>
				
				<label>Destino<br></label>	
				<input disabled placeholder="Destino" id="destino" type="text" name="" >
				<input disabled placeholder="Monto maximo" id="maximo1" type="number" name="" >
				<br><br>
				<!--<input type="submit" name="" value="Actualizar">-->
				<input type="submit" value="Actualizar" name="insertar2" id="insertar2"/>
				</form>
		
	</div>
	</div>
<!--===============================================================================================-->
	<script type="text/javascript">
$(document).ready(function(){
    $("#seleccion").change(function(){
        var id2 = $(this).find('option:selected').val();
        var data = {
              "id2" : id2
        };
        alert(data.id2);
     ///OBTENER DATOS CON AJAX
     $.get('ajaxactualizarsubruta.php', data, function (response) {

     	//alert(response[0]);
      	$('#inputsIda').empty().html(response[0]);
      	$('#inputsVuelta').empty().html(response[1]);
      	$('#salida').empty().val(response[2]);
      	$('#destino').empty().val(response[3]);
      	$('#minimo').empty().val(response[4]);
      	$('#maximo').empty().val(response[5]);
      	$('#minimo1').empty().val(response[4]);
      	$('#maximo1').empty().val(response[5]);

      	$('#salida2').empty().val(response[2]);
      	$('#destino2').empty().val(response[3]);
      	$('#minimo2').empty().val(response[4]);
      	$('#maximo2').empty().val(response[5]);
      	$('#minimo3').empty().val(response[4]);
      	$('#maximo3').empty().val(response[5]);
      	
    }, 'json')
    });
      
});
</script>

	<script>
    $(document).ready(function(){
    var i=1;
    $('#agregarLugares').click(function(){
        i++;
    $('#dynamic_fieldd').append('<tr id="row'+i+'"><td><input required type="text" id="subruta" name="subruta[]" placeholder="Subruta" class="form-control name_list" /></td><td><input required type="number" id="monto" name="monto[]" onchange ="myFunction2()" placeholder="Monto" class="form-control name_list" /></td><td><button type="button" onclick="disablee()" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
  
    $(document).on('click', '.btn_remover', function(){
        var button_id = $(this).attr("id"); 
        $('#rowi'+button_id+'').remove();
    	$('#rowv'+button_id+'').remove();
    });
  
});
</script>

<!--===============================================================================================-->
    <script type="text/javascript">
        var variable='<?php echo $mensaje;?>'
        alert(variable);
    </script>

	<script>
    $(document).ready(function(){
    var i=1;
    $('#agregarLugar').click(function(){
        i++;
    $('#dynamic_field').append('<tr id="row'+i+'"><td><input required type="text" id="subruta" name="subruta[]" placeholder="Subruta" class="form-control name_list" /></td><td><input required type="number" onchange ="myFunction()" id="monto" name="monto[]" placeholder="Monto" class="form-control name_list" /></td><td><button onclick="disable()" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
  
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#row'+button_id+'').remove();
    });
  
});
</script>

<script type="text/javascript">
   <!--
      
      function validar()
      {
      
         if( document.rutatarifaform.lugar.value == "subruta" ){
            alert( "Ingrese minimo un lugar." );
            document.rutatarifaform.lugar.focus() ;
            return false;
         }

         if( document.rutatarifaform.monto.value == "monto" ){
            alert( "Ingrese minimo un monto." );
            document.rutatarifaform.monto.focus() ;
            return false;
         }
         

         return( true );
      }
</script>

<script type="text/javascript">
    
    document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('insertar').disabled = "true";
});
function myFunction() {
  var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
    var nameInput = document.getElementById('subruta').value;
    var nameInput2 = document.getElementById('monto').value;
    console.log(nameInput2);
    if ( nameInput2 == null) {
        document.getElementById('insertar').disabled = true;
    } else {
        document.getElementById('insertar').disabled = false;
    }
}

function disable() {
    
    document.getElementById("insertar").disabled = true;
}
</script>
<script type="text/javascript">
    
    document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('insertar2').disabled = "true";
});
function myFunction2() {
  var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
    var nameInput = document.getElementById('subruta').value;
    var nameInput2 = document.getElementById('monto').value;
    console.log(nameInput2);
    if ( nameInput2 == null) {
        document.getElementById('insertar2').disabled = true;
    } else {
        document.getElementById('insertar2').disabled = false;
    }
}

function disablee() {
    
    document.getElementById("insertar2").disabled = true;
}
</script>

<!-- INPUTS SOLO DE LECTURA---->
<script type="text/javascript">
  $("#origensubruta").attr("readonly", true);
  $("#origenmonto").attr("readonly", true);
  $("#destinosubruta").attr("readonly", true);
  $("#destinomonto").attr("readonly", true);
</script>

<script type="text/javascript">
$(document).ready(function(){
    $("select").change(function(){
        var id = $(this).find('option:selected').val();
        var data = {
              "id" : id
        };
     ///OBTENER DATOS CON AJAX
     $.get('ajax.php', data, function (response) {
      
        $('#origensubruta').empty().val(response.rutalugarsalida);
        $('#destinosubruta').empty().val(response.rutalugardestino);
        $('#origenmontominimo').empty().val(response.rutatarifaminima);
        $('#origenmontomaximo').empty().val(response.rutatarifamaxima);
        //$('#origenmonto').empty().val(response.rutatarifaminima);
        $('#destinomontominimo').empty().val(response.rutatarifaminima);
        $('#destinomontomaximo').empty().val(response.rutatarifamaxima);
        //$('#owner_desc').empty().html(response.description);
    }, 'json')
    });
      
});
</script>
  </body>
</html>