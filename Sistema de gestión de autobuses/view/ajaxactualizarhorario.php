<?php 


include '../data/data.php';
    $pdo = Database::conectar();
    $id2 =$_GET['id2'];
    $sql= "SELECT * FROM `tbrutahorario` WHERE `rutahorarioid` = $id2";

    $horas = array();
    $buses = array();

	foreach ($pdo->query($sql) as $row) {
		$horas = explode("-", $row['rutahorariohora']);
		$buses = explode("-", $row['rutahorariobus']);
		$tipodia = $row['rutahorariotipodia'];
		$idavuelta = $row['rutahorarioidavuelta'];
		$rutaid = $row['rutahorariorutaid'];
	}
	
		 
	$datoscombinados = array_combine($horas, $buses);

	$inputs = "";
	$j=1;
	$inputs.='<table>
	<td>Tipo dia: <input value='.$tipodia.' type=text name="tipodia" placeholder=tipodia class=form-control name_list readonly/></td>
	<td>Ida vuelta: <input value='.$idavuelta.' type=text name="idaVuelta" placeholder=idavuelta class=form-control name_list readonly/></td>
	<td>Ruta : <input value='.$rutaid.' type=text name="idruta" placeholder=idrura class=form-control name_list readonly/></td>';

	foreach($datoscombinados as $key => $value){
		
		$inputs.= '<tr id="rowi'.$j.'"><td><input value='.$key.' type=time name=hora[] placeholder=Hora class=form-control name_list value=/></td><td><input value='.$value.' type=text name=bus[] placeholder=Bus class=form-control name_list value=/></td><td><button type="button" name="remove" id="'.$j.'" class="btn btn-danger btn_remove">X</button></td></tr>';
		$j++;
		
	}
	$inputs.='</table>';
	echo json_encode(array($inputs));
	

?>
