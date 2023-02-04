<?php 
include '../data/data.php';
    $pdo = Database::conectar();
    $id2 =$_POST['id2'];
    $sql= "SELECT * FROM `tbmantenimiento` WHERE `mantenimientoid` = $id2";
    //$query = "SELECT * FROM `tbmantenimiento` WHERE `rutacodigo` = $id";
    //$sql2 = 'SELECT  `rutacodigo` FROM `tbruta`';
    //$sql3 = 'SELECT  `rutacodigo`,`rutalugarsalida`,`rutalugardestino` FROM `tbruta`';




    $mantenimientodetallecostounitario = "";

    foreach ($pdo->query($sql) as $row) {

        $mantenimientodetallecostounitario =$row['mantenimientodetallecostounitario'];

    }




    $costoUnitario = array();

   	$idavuelta = "";
	foreach ($pdo->query($sql) as $row) {
		$costoUnitario = explode(",", $row['mantenimientocostounitario']);
	}    

  	$datoscombinados = array_combine($costoUnitario);

	$inputs = "";
	$j=1;
	foreach($datoscombinados as $key => $value){
		
		$inputs.= '<table><tr id="rowi'.$j.'"><td><input value='.$key.' type="number" id="costosunitarios" name="costosunitarios[]" placeholder="Costo unitario" class=form-control name_list value=/></td><td><button type="button" name="remove" id="'.$j.'" class="btn btn-danger btn_remover">X</button></td></tr></table>';
		$j++;
		
	}

	echo json_encode(array($inputs,$mantenimientodetallecostounitario));


?>