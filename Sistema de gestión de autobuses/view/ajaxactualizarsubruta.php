<?php 


include '../data/data.php';
    $pdo = Database::conectar();
    $id2 =$_GET['id2'];
    $sql= "SELECT * FROM `tbrutatarifa` WHERE `rutatarifarutaid` = $id2";
    $query = "SELECT * FROM `tbruta` WHERE `rutacodigo` = $id2";
    $sql2 = 'SELECT  `rutacodigo` FROM `tbruta`';
    $sql3 = 'SELECT  `rutacodigo`,`rutalugarsalida`,`rutalugardestino` FROM `tbruta`';

    $salida = "";
    $destino = "";
    $minimo = "";
    $maxima = "";

    foreach ($pdo->query($query) as $row) {

        $salida =$row['rutalugarsalida'];
        $destino =$row['rutalugardestino'];
        $minimo = $row['rutatarifaminima'];
        $maxima = $row['rutatarifamaxima'];
    }

    $subrutas = array();
    $monto = array();

   	$idavuelta = "";
	foreach ($pdo->query($sql) as $row) {
		$subrutas = explode("-", $row['rutatarifalugares']);
		$monto = explode("-", $row['rutatarifamonto']);
		$idavuelta = $row['rutatarifaidavuelta'];
	}    

	
	$datoscombinadosIda = array_combine(array_reverse($subrutas), $monto);
  	$datoscombinadosVuelta = array_combine($subrutas, $monto);
	$inputsVuelta = "";
	$i=1;
	
	foreach($datoscombinadosVuelta as $key => $value){
		
		$inputsVuelta.= '<table><tr id="rowv'.$i.'"><td><input value='.$key.' type=text name=subruta[] placeholder=Subruta class=form-control name_list value=/></td><td><input value='.$value.' type=text name=monto[] placeholder=Monto class=form-control name_list value=/></td><td><button type="button" name="remove" id="'.$i.'" class="btn btn-danger btn_remover">X</button></td></tr></table>';
		$i++;
	}

	$inputsIda = "";
	$j=1;
	foreach($datoscombinadosIda as $key => $value){
		
		$inputsIda.= '<table><tr id="rowi'.$j.'"><td><input value='.$key.' type=text id="subruta" name=subruta[] placeholder=Subruta class=form-control name_list value=/></td><td><input value='.$value.' type=text id="monto" name=monto[] onchange="myFunction2()" placeholder=Monto class=form-control name_list value=/></td><td><button type="button" name="remove" id="'.$j.'" class="btn btn-danger btn_remover">X</button></td></tr></table>';
		$j++;
		
	}

	echo json_encode(array($inputsIda,$inputsVuelta,$salida,$destino,$minimo,$maxima));


?>