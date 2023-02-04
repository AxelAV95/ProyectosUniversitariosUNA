<?php 


	include '../data/data.php';
    $pdo = Database::conectar();
    $sql2 = 'SELECT  `rutacodigo` FROM `tbruta`';
   
	$consulta = "UPDATE `tbrutatarifa` SET `rutatarifalugares`=?,`rutatarifamonto`=? WHERE `rutatarifarutaid` = ? AND `rutatarifaidavuelta`= ?";

	$combobit2 = "";
	$combobit2 .= "<option>------Seleccione ruta----------</option>";
    foreach ($pdo->query($sql2) as $row) {

        $combobit2 .=" <option value='".$row['rutacodigo']."'>".$row['rutacodigo']."</option>"; 
    }

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	     <script src="js/jquery.min.js"></script>  
</head>
<body>


	<br>
	<br>
	<div id="contenedor" style="display: flex; flex-direction: row; ">
			
			<div id="ida" style="padding: 10px 10px 10px 10px; border: 1px solid black;">
		
				<h3 align="center">Ida</h3>
				<form method="POST" class="form-horizontal" action="../business/rutatarifaaction.php">
				
				<select required id="rutaid" style="width: 180px;" name="rutaid">
					<?php echo $combobit2 ?>
				</select>
				<tr>
					<td><button type="button" name="agregarLugar" id="agregarLugar" class="btn btn-success">Agregar lugares y montos</button><br><br></td></tr>
				</tr>
				<br><br><br>
				<input type="hidden" name="idaVuelta" value="idaVuelta">
				<label>Salida<br></label>
				<input id="salida" type="text" name="subruta_[]" value="<?php //echo $salida ?>">
				<input id="minimo" type="number" name="monto_[]" value="<?php //echo $minimo ?>">
				
				<div id="inputsIda">
				</div>
				<table  id="dynamic_field">
				</table>
				
				<label>Destino<br></label>	
				<input id="destino" type="text" name="" >
				<input id="maximo1" type="number" name="" >
				<br><br>
				<!--<input type="submit" name="" value="Actualizar">-->
				<input type="submit" value="Actualizar" name="insertar2" id="insertar2"/>
				</form>
		
	</div>

	<!-- <div id="vuelta" style="padding: 10px 10px 10px 10px;margin-left: 10px; border: 1px solid black;">
		<h3 align="center">Vuelta</h3>
		<form>
			<label>Salida<br></label>
				<input type="hidden" name="idavuelta" value="2">
			<input id="destino2" type="text" name="" >
				<input id="minimo2" type="number" name="" >
				<div id="inputsVuelta">
					
				</div>
			
			<label>Destino<br></label>	
			
				<input id="salida2" type="text" name="" >
				<input id="maximo" type="number" name="" >
				<br><br>
				<input  type="submit" name="" value="Actualizar">
		</form>
		
	</div> -->


	</div>


	<script type="text/javascript">
$(document).ready(function(){
    $("select").change(function(){
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
    $('#agregarLugar').click(function(){
        i++;
    $('#dynamic_field').append('<tr id="row'+i+'"><td><input required type="text" name="subruta[]" placeholder="Subruta" class="form-control name_list" /></td><td><input required type="number" name="monto[]" placeholder="Monto" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
  
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#rowi'+button_id+'').remove();
    	$('#rowv'+button_id+'').remove();
    });
  
});
</script>
	
</body>
</html>