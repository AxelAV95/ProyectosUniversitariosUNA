<?php 


	include '../data/data.php';
    $pdo = Database::conectar();
    $sql2 = 'SELECT  `rutacodigo` FROM `tbruta`';
   
	//$consulta = "UPDATE `tbrutatarifa` SET `rutatarifalugares`=?,`rutatarifamonto`=? WHERE `rutatarifarutaid` = ? AND `rutatarifaidavuelta`= ?";

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
				<form method="POST" class="form-horizontal" action="../business/rutahorarioaction.php">
				
				<select required id="seleccion" style="width: 180px;" name="idruta">
					<?php echo $combobit2 ?>
				</select>
				<tr>
					<td><button type="button" name="agregar" id="agregar" class="btn btn-success">Agregar horas y buses</button><br><br></td></tr>
				</tr>
				
				<!--<input type="hidden" name="idaVuelta" value="idaVuelta">-->
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
                               <br><br><br>
				
				<div id="inputs">
				</div>
				<table  id="dynamic_field">
				</table>
				<input type="submit" value="Actualizar" name="insertar2" id="insertar2"/>
				</form>
		
	</div>
	</div>


	<script type="text/javascript">
$(document).ready(function(){
    $("#seleccion").change(function(){
        var id2 = $(this).find('option:selected').val();
        var data = {
              "id2" : id2
        };
        alert(data.id2);
     ///OBTENER DATOS CON AJAX
     $.get('ajaxactualizarhorario.php', data, function (response) {

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
    $('#dynamic_field').append('<tr id="row'+i+'"><td><input required type="time" name="hora[]" placeholder="Hora" class="form-control name_list" /></td> <td><select id="bus'+i+'" name="bus[]"></select></td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    listar(i);
	});
  
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#rowi'+button_id+'').remove();
    	$('#rowv'+button_id+'').remove();
    });
  
});
</script>
	 <script type="text/javascript">
	          function listar(i){
                $(document).ready(function() {
                    $.ajax({
                            type: "POST",
                            url: "getbuses.php",
                            success: function(response)
                            {
                                $('#bus'+i).html(response).fadeIn();
                            }
                    });

                });
            
}


</script>
</body>
</html>