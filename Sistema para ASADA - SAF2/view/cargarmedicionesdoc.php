<?php 
	include '../data/data.php';
	include 'PDF/pdf/plantilla.php';
	require_once dirname(__FILE__) . '/Classes/PHPExcel.php';



	//require 'PDF/pdf/conexion.php';
	$pdo = Database::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $clientesNoActualizados = array();
    $clientesNoRegistrados = array();
    $clientesActualizados = array();

	sleep(3);

?>

<?php 
$mes_aux = '';
	//VERIFICA SI RECIBIÓ XML
	if(isset($_FILES['file']['name']) &&  $_FILES['file']['name'] != ''){
		//GUARDAR NOMBRE
		$nombre = $_FILES['file']['name'];
		//VERIFICO SI CUMPLE CONDICIONES DE FORMATO
		if(verificarNombreDocumento($nombre) == true && verificarExtension($nombre)==true){

			$split_nombre = explode("-", $_FILES['file']['name']);
			$carpetaPrincipal = 'Documentos';
			$aux_year = explode(".", $split_nombre[2]);
			$subCarpeta1 = $aux_year[0];
			$subCarpeta2 = $split_nombre[1];
			 $rutageneral = $carpetaPrincipal.'/'.$subCarpeta1.'/'.$subCarpeta2.'/';
			if (!file_exists($rutageneral)) {
    			mkdir($rutageneral, 0777, true);
    			//echo 'se creó directorio';
				
			}
			//SE GUARDA EL DOCUMENTO
			//$ubicacionguardado = 'Documentos/'.$_FILES['file']['name'];
 		     move_uploaded_file($_FILES['file']['tmp_name'], $rutageneral.$_FILES['file']['name']);
 		   //  echo 'se traslada archivo';
 		    $data = simplexml_load_file($rutageneral.'/'.$_FILES['file']['name']);

 		    /*echo '<br>Cliente de XML';
			echo '<pre>';
			print_r($data);
			echo '</pre>';*/
 		    $anio_aux = $data->medicion[0]->anio;
 		    $mes_aux =$subCarpeta2;


			

				if(verificarRegistrosAño($anio_aux)== true){ //X
					//echo 'si existe registro<br>';
					

					for($i = 0; $i < count($data); $i++){
						 //OBTENGO LOS VALORES DEL XML
						   $medidor = $data->medicion[$i]->medidorid;
						   $mes = $data->medicion[$i]->mes;
						   $anio = $data->medicion[$i]->anio;
						    $metros = $data->medicion[$i]->metrosconsumidos;

						if(verificarRegistroClienteAño($medidor,$anio)==true){ //X
							//echo 'si hay en el año<br>';
							if(verificarRegistroMedicionClienteMes($medidor,$mes,$anio) == true){ //X
								//echo 'si hay en el mes<br>';
								//$clientesNoActualizados = array(array((string)$medidor,(string)$mes,(string)$anio));
								$res = '1';
								array_push($clientesNoActualizados,array((string)$medidor,(string)$metros,(string)$mes,(string)$anio));
							}else{
								//echo 'no hay en el mes, actualizar<br>';
								$actualizado = actualizarRegistroMesAño($medidor,$metros,$mes,$anio); //X
								if($actualizado ==true){
									$res = '1';
								//	echo 'se ha actualizado<br>';
									//$clientesActualizados = array(array((string)$medidor,(string)$mes,(string)$anio));
									array_push($clientesActualizados,array((string)$medidor,(string)$metros,(string)$mes,(string)$anio));
								}else{
									$res = '1';
									//echo 'no se ha actualizado<br>';
									//$clientesNoActualizados = array(array((string)$medidor,(string)$mes,(string)$anio));
									array_push($clientesNoActualizados,array((string)$medidor,(string)$metros,(string)$mes,(string)$anio));
								}
							}

						}else{
							$nuevoregistro = crearRegistroClienteAño($medidor, $anio_aux);
							//echo 'se crea nuevo registro<br>';
							if($nuevoregistro == true){
								//echo 'se creó nuevo registro<br>';
								$actualizado = actualizarRegistroMesAño($medidor,$metros,$mes,$anio);

								if($actualizado == true){
									//echo 'se ha actualizado<br>';
									//$clientesActualizados = array(array((string)$medidor,(string)$mes,(string)$anio));
									array_push($clientesActualizados,array((string)$medidor,(string)$metros,(string)$mes,(string)$anio));
									$res = '1';
								}else{
									//$clientesNoActualizados = array(array((string)$medidor,(string)$mes,(string)$anio));
									array_push($clientesNoActualizados,array((string)$medidor,(string)$metros,(string)$mes,(string)$anio));
									$res = '1';
									//echo 'no se ha actualizado<br>';
								}

							}else{
								//echo 'no registrado el cliente<br>';
								//$clientesNoRegistrados = array(array((string)$medidor,(string)$mes,(string)$anio));
								$res = '1';
								array_push($clientesNoRegistrados,array((string)$medidor,(string)$mes,(string)$anio));
							}
						}

					}

				}else{
					$res = '4';
					$respuesta = "No existen registros para el año especificado. Para crearlos utilice la opción en el módulo de medición.";
				}

			/*}else{
				$respuesta = "No se ha podido guardar el documento.";
			}*/

		}else{
			$res = '2';
			$respuesta = "El documento no cumple con las especificaciones necesarias.";
		}

	}else{
		$res = '3';
		//documento no recibido
		 $respuesta = "No se recibió ningún documento";
	}

	if($res == '1'){
		$res = '1';

		guardarPDFNoActualizados($clientesNoActualizados,$rutageneral,$subCarpeta2,$subCarpeta1);
		guardarPDFActualizados($clientesActualizados,$rutageneral,$subCarpeta2,$subCarpeta1);
		guardarPDFClientesNoRegistrados($clientesNoRegistrados,$rutageneral,$subCarpeta2,$subCarpeta1);
		excelNoActualizados($clientesNoActualizados,$rutageneral,$subCarpeta2,$subCarpeta1);
		excelActualizados($clientesActualizados,$rutageneral,$subCarpeta2,$subCarpeta1);
		$div = 'RECIBO DOCUMENTO';
		$mensaje = '<div class="alert alert-success">Datos de medición cargados correctamente.</div>';
		$link = '<a href="Historias de usuario.pdf">Download</a>';
		$reporte = '<br><a target="_blank" href="'.$rutageneral.'REPORTE CLIENTES NO ACTUALIZADOS'.'-'.$mes_aux.'-'.$anio_aux.'.pdf'.'">Reporte clientes no actualizados.</a><br><a target="_blank" href="'.$rutageneral.'REPORTE CLIENTES ACTUALIZADOS'.'-'.$mes_aux.'-'.$anio_aux.'.pdf'.'">Reporte clientes actualizados.</a><br><a target="_blank" href="'.$rutageneral.'REPORTE CLIENTES NO REGISTRADOS'.'-'.$mes_aux.'-'.$anio_aux.'.pdf'.'">Reporte clientes no registrados.</a><br><a target="_blank" href="Documentos">Carpeta de documentos</a>';
		$retorno = array($mensaje,$div,$reporte,$res);
	

	}


	if($res == '2'){
		$res = '2';
		$div = '';
		$mensaje = '';
		$reporte = 'El documento no cumple con las especificaciones necesarias.';
		$retorno = array($mensaje,$div,$reporte,$res);
		//echo json_encode($retorno);



	}
	if($res == '3'){
		$res = '3';
		$div = '';
		$mensaje = '';
		$reporte = 'No se recibió ningún documento';
		$retorno = array($mensaje,$div,$reporte,$res);
		//echo json_encode($retorno);
	}

	if($res == '4'){
		$res = '4';
		$div = '';
		$mensaje = '';
		$reporte = 'No existen registros para el año especificado. Para crearlos utilice la opción en el módulo de medición.';
		$retorno = array($mensaje,$div,$reporte,$res);
		//echo json_encode($retorno);
	}
	

	echo json_encode($retorno);
	/*
	RESPUESTAS:
	1: EXITO
	2: NO CUMPLE CONDICIONES
	3: NINGUN DOCUMENTO

	*/



	/*echo '<br>Cliente no registrados';
	echo '<pre>';
	print_r($clientesNoRegistrados);
	echo '</pre>';
	echo '<br>';
	echo '<pre>';
	echo '<br>Cliente no actualizados';
	print_r($clientesNoActualizados);
	echo '</pre>';
	echo '<br>Cliente actualizados';
	echo '<pre>';
	print_r($clientesActualizados);
	echo '</pre>';

	echo 'corriendo el arreglo';*/
	/*echo $clientesNoActualizados[0][0];
	echo $clientesNoActualizados[0][1];
	echo $clientesNoActualizados[0][2];*/
	/*for ($i=0; $i < count($clientesNoActualizados) ; $i++) { 
		echo $med = $clientesNoActualizados[$i][0];
		echo $month = $clientesNoActualizados[$i][1];
		echo $year = $clientesNoActualizados[$i][2];
		echo '<br>';
	}*/


		
	/*foreach ($clientesNoActualizados as $key => $item) {
  foreach($item as $key => $name){
     echo $name;

  }
}*/

/*guardarPDFNoActualizados($clientesNoActualizados,$rutageneral,$subCarpeta2,$subCarpeta1);
guardarPDFActualizados($clientesActualizados,$rutageneral,$subCarpeta2,$subCarpeta1);
guardarPDFClientesNoRegistrados($clientesNoRegistrados,$rutageneral,$subCarpeta2,$subCarpeta1);
crearExcelNoActualizados($clientesNoActualizados,$rutageneral,$subCarpeta2,$subCarpeta1);
crearExcelActualizados($clientesActualizados,$rutageneral,$subCarpeta2,$subCarpeta1);





	$div = 'RECIBO DOCUMENTO';
	$mensaje = '<div class="alert alert-success">Datos de medición cargados correctamente.</div>';
	$link = '<a href="Historias de usuario.pdf">Download</a>';
	$reporteNoActualizados = '<br><a target="_blank" href="'.$rutageneral.'REPORTE CLIENTES NO ACTUALIZADOS'.'-'.$mes_aux.'-'.$anio_aux.'.pdf'.'">Reporte clientes no actualizados.</a><br><a target="_blank" href="'.$rutageneral.'REPORTE CLIENTES ACTUALIZADOS'.'-'.$mes_aux.'-'.$anio_aux.'.pdf'.'">Reporte clientes actualizados.</a><br><a target="_blank" href="'.$rutageneral.'REPORTE CLIENTES NO REGISTRADOS'.'-'.$mes_aux.'-'.$anio_aux.'.pdf'.'">Reporte clientes no registrados.</a><br><a target="_blank" href="'.$rutageneral.'">Carpeta de documentos</a>';
	$retorno = array($mensaje,$div,$reporteNoActualizados);
	echo json_encode($retorno);*/

?>

<?php 

	
	function excelActualizados($data_array,$rutageneral,$mes,$anio){

			$nombre = 'REPORTE CLIENTES ACTUALIZADOS'.'-'.$mes.'-'.$anio.'.xls';
					// create php excel object
			$doc = new PHPExcel();
      
			// Fuente de la primera fila en negrita
			$boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

			$doc->getActiveSheet()->getStyle('A1:D2')->applyFromArray($boldArray);    
			
			$dataArray = $data_array;
			 
			// set active sheet 
			$doc->setActiveSheetIndex(0);
			 
			// read data to active sheet
			$doc->getActiveSheet()->fromArray($dataArray);
			 
			//save our workbook as this file name

			 
			$objWriter = PHPExcel_IOFactory::createWriter($doc, 'Excel5');
			 
			//force user to download the Excel file without writing it to server's HD
			$objWriter->save($rutageneral.$nombre);


	}
	
	function excelNoActualizados($data_array,$rutageneral,$mes,$anio){

			$nombre = 'REPORTE CLIENTES NO ACTUALIZADOS'.'-'.$mes.'-'.$anio.'.xls';
					// create php excel object
			$doc = new PHPExcel();
      
			// Fuente de la primera fila en negrita
			$boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

			$doc->getActiveSheet()->getStyle('A1:D2')->applyFromArray($boldArray);    
			
			$dataArray = $data_array;
			 
			// set active sheet 
			$doc->setActiveSheetIndex(0);
			 
			// read data to active sheet
			$doc->getActiveSheet()->fromArray($dataArray);
			 
			//save our workbook as this file name

			 
			$objWriter = PHPExcel_IOFactory::createWriter($doc, 'Excel5');
			 
			//force user to download the Excel file without writing it to server's HD
			$objWriter->save($rutageneral.$nombre);


	}
	function crearExcelNoActualizados($data_array,$rutageneral,$mes,$anio){
		$nombre = $rutageneral.'REPORTE CLIENTES NO ACTUALIZADOS'.'-'.$mes.'-'.$anio.'.csv';
		$file = fopen($nombre, 'w');
 
		// save the column headers
		fputcsv($file, array('Medidor', 'Metros', 'Mes', 'Año'));
		 
		// Sample data. This can be fetched from mysql too
		$data = $data_array;
		 
		// save each row of the data
		foreach ($data as $row)
		{
		fputcsv($file, $row);
		}
		 
		// Close the file
		fclose($file);

	}

	function crearExcelActualizados($data_array,$rutageneral,$mes,$anio){
		$nombre = $rutageneral.'REPORTE CLIENTES ACTUALIZADOS'.'-'.$mes.'-'.$anio.'.csv';
		$file = fopen($nombre, 'w');
 
		// save the column headers
		fputcsv($file, array('Medidor', 'Metros', 'Mes', 'Año'));
		 
		// Sample data. This can be fetched from mysql too
		$data = $data_array;
		 
		// save each row of the data
		foreach ($data as $row)
		{
		fputcsv($file, $row);
		}
		 
		// Close the file
		fclose($file);

	}


	function guardarPDFActualizados($clientesActualizados,$rutageneral,$mes,$anio){

		$pdf = new PDFActualizados();
		$pdf->SetMargins(25,20,10);
		$pdf->AliasNbPages();
		$pdf->AddPage();
		
		
		$pdf->SetFillColor(232,232,232);
		
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,6,'MEDIDOR',1,0,'C',1);
		$pdf->Cell(40,6,'METROS',1,0,'C',1);
		$pdf->Cell(40,6,'MES',1,0,'C',1);
		$pdf->Cell(40,6,utf8_decode('AÑO'),1,0,'C',1);

		$pdf ->Ln();
		//$pdf->Cell(70,6,'MUNICIPIO',1,1,'C',1);
		
		$pdf->SetFont('Arial','',10);

		if(empty($clientesActualizados)){

			$pdf->Cell(40,6,'Ninguno',1,0,'C');
			$pdf->Cell(40,6,'Ninguno',1,0,'C');
			$pdf->Cell(40,6,'Ninguno',1,0,'C');
			$pdf->Cell(40,6,'Ninguno',1,0,'C');
			$pdf ->Ln();
		}else{
			for($i=0; $i < count($clientesActualizados) ; $i++) { 

			$pdf->Cell(40,6,$clientesActualizados[$i][0],1,0,'C');
			$pdf->Cell(40,6,$clientesActualizados[$i][1],1,0,'C');
			$pdf->Cell(40,6,$clientesActualizados[$i][2],1,0,'C');
			$pdf->Cell(40,6,$clientesActualizados[$i][3],1,0,'C');
			$pdf ->Ln();
			
		}

		}

		
		
		$pdf->Output('F', $rutageneral.'REPORTE CLIENTES ACTUALIZADOS'.'-'.$mes.'-'.$anio.'.pdf', true);

	}

	function guardarPDFNoActualizados($clientesNoActualizados,$rutageneral,$mes,$anio){

		$pdf = new PDFNoActualizados();
		$pdf->SetMargins(25,20,10);

		$pdf->AliasNbPages();
		$pdf->AddPage();
		
		
		$pdf->SetFillColor(232,232,232);
		
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,6,'MEDIDOR',1,0,'C',1);
		$pdf->Cell(40,6,'METROS',1,0,'C',1);
		$pdf->Cell(40,6,'MES',1,0,'C',1);
		$pdf->Cell(40,6, utf8_decode('AÑO'),1,0,'C',1);

		$pdf ->Ln();
		//$pdf->Cell(70,6,'MUNICIPIO',1,1,'C',1);
		
		$pdf->SetFont('Arial','',10);

		if(empty($clientesNoActualizados)){

			$pdf->Cell(40,6,'Ninguno',1,0,'C');
			$pdf->Cell(40,6,'Ninguno',1,0,'C');
			$pdf->Cell(40,6,'Ninguno',1,0,'C');
			$pdf->Cell(40,6,'Ninguno',1,0,'C');
			$pdf ->Ln();
		}else{
			for($i=0; $i < count($clientesNoActualizados) ; $i++) { 

			$pdf->Cell(40,6,$clientesNoActualizados[$i][0],1,0,'C');
			$pdf->Cell(40,6,$clientesNoActualizados[$i][1],1,0,'C');
			$pdf->Cell(40,6,$clientesNoActualizados[$i][2],1,0,'C');
			$pdf->Cell(40,6,$clientesNoActualizados[$i][3],1,0,'C');
			$pdf ->Ln();
			
		}
			
		}

		
		
		/*while($row = $resultado->fetch_assoc())
		{
			$pdf->Cell(60,6,$row['clientenombre'],1,0,'C').
			$pdf->Cell(60,6,$row['clienteapellido1'],1,0,'C');
			$pdf->Cell(60,6,$row['clienteapellido2'],1,0,'C');
			$pdf ->Ln();
			//$pdf->Cell(70,6,utf8_decode($row['municipio']),1,1,'C');
		}*/
		$pdf->Output('F', $rutageneral.'REPORTE CLIENTES NO ACTUALIZADOS'.'-'.$mes.'-'.$anio.'.pdf', true);
		
	}

	function guardarPDFClientesNoRegistrados($clientesNoRegistrados,$rutageneral,$mes,$anio){

		$pdf = new PDFNoRegistrados();
		$pdf->SetMargins(15,20,10);
		$pdf->AliasNbPages();
		$pdf->AddPage();
		
		
		$pdf->SetFillColor(232,232,232);
		
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(60,6,'MEDIDOR',1,0,'C',1);
		$pdf->Cell(60,6,'MES',1,0,'C',1);
		$pdf->Cell(60,6,utf8_decode('AÑO'),1,0,'C',1);

		$pdf ->Ln();
		//$pdf->Cell(70,6,'MUNICIPIO',1,1,'C',1);
		
		$pdf->SetFont('Arial','',10);


		if(empty($clientesNoRegistrados)){

			$pdf->Cell(60,6,'Ninguno',1,0,'C');
			$pdf->Cell(60,6,'Ninguno',1,0,'C');
			$pdf->Cell(60,6,'Ninguno',1,0,'C');
			$pdf ->Ln();
		}else{
			for($i=0; $i < count($clientesNoRegistrados) ; $i++) { 

			$pdf->Cell(60,6,$clientesNoRegistrados[$i][0],1,0,'C');
			$pdf->Cell(60,6,$clientesNoRegistrados[$i][1],1,0,'C');
			$pdf->Cell(60,6,$clientesNoRegistrados[$i][2],1,0,'C');
			$pdf ->Ln();
			
			}

		}



		
		
		$pdf->Output('F', $rutageneral.'REPORTE CLIENTES NO REGISTRADOS'.'-'.$mes.'-'.$anio.'.pdf', true);

	}

	function verificarNombreDocumento($nombre){
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo", "Junio","Julio","Agosto","Septiembre","Octubre","Noviembre", "Diciembre");
		$formato = explode("-", $nombre);

		if($formato[0]=="Mediciones" && ($formato[1] == $meses[0] || $formato[1] == $meses[1] || $formato[1] == $meses[2] || $formato[1] == $meses[3] || $formato[1] == $meses[4] || $formato[1] == $meses[5] || $formato[1] == $meses[6] || $formato[1] == $meses[7] || $formato[1] == $meses[8] || $formato[1] == $meses[9] || $formato[1] == $meses[10] || $formato[1] == $meses[11] )){

			return true;

		}else{
			return false;
		}

	}

	function verificarExtension($nombre){

		$extension = array('xml');
 			$archivo_data = explode('.', $nombre);
 		    $archivo_extension = end($archivo_data);
 			
 		    //VERIFICA EXTENSION DEL ARCHIVO QUE SEA XML
 		    if(in_array($archivo_extension, $extension)){
 		    	return true;
 		    }else{
 		    	return false;
 		    }

	}
	
	function verificarRegistrosAño($anio){
		$pdo = Database::conectar();
    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$consulta_registros = 'SELECT count(*) FROM `tbmediciongeneral` WHERE `AnioActual` ='.$anio;

	  	$q1 = $pdo->prepare($consulta_registros);
	  	$q1 -> execute();

	  	$numero_resultados = $q1->fetchColumn();
	  	//VERIFICO SI HAY REGISTROS EN X AÑO
	  	if($numero_resultados>0){
	  		return true;
	  	}else{
	  		return false;
	  	}
	}

	function verificarRegistroClienteAño($medidor, $anio){
		$pdo = Database::conectar();
    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$consulta_registro_cliente = 'SELECT * FROM `tbmediciongeneral` WHERE  `medicionclientemedidorid` = '.$medidor.' AND `AnioActual` = '.$anio.'';

    	$q2 = $pdo->prepare($consulta_registro_cliente);
		$q2 -> execute();
		/*--------------------------------------------*/
		//SI EXISTE, ENTONCES SE CONSULTA PARA VER SI TIENE MEDICION EN ESE MES ESPECIFIC
		if( $q2->rowCount()>0){
			return true;
		}else{
			return false;
		}

	}

	function verificarRegistroMedicionClienteMes($medidor,$mes,$anio){
		$pdo = Database::conectar();
    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$consulta_medicion_cliente= 'SELECT `'.$mes.'` FROM `tbmediciongeneral` WHERE `'.$mes.'` > 0 AND `medicionclientemedidorid` = '.$medidor.' AND `AnioActual` = '.$anio.'';


		$q4 = $pdo->prepare($consulta_medicion_cliente);
		$q4 -> execute();
		//SI HAY UN DATO DE MEDICION, SE GUARDA EN UN ARRAY EL CLIENTE PARA LUEGO HACER REPORTE SOBRE EL
		if( $q4->rowCount()>0){
			return true;
		}else{
			return false;
		}
	}

	function crearRegistroClienteAño($medidor,$anio){
		$pdo = Database::conectar();
    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$crear_registro = 'INSERT INTO `tbmediciongeneral`(`medicionid`, `medicionclientemedidorid`, `Enero`, `Febrero`, `Marzo`, `Abril`, `Mayo`, `Junio`, `Julio`, `Agosto`, `Septiembre`, `Octubre`, `Noviembre`, `Diciembre`, `AnioActual`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
    	$ultimo_id =  'SELECT MAX(medicionid) AS medicionid  FROM tbmediciongeneral';
    	$proximoID = getMaxID($pdo,$ultimo_id);

    	$q = $pdo->prepare($crear_registro);
		$q->execute(array($proximoID, $medidor, 0,0,0,0,0,0,0,0,0,0,0,0,$anio));

		if($q->rowCount()>0){
			return true;
		}else{
			return false;
		}
        Database::desconectar();
	}

	function getMaxID($pdo,$sql){

        $stmt = $pdo ->prepare($sql);
        $stmt -> execute();
        $cont = 1;
        if($row = $stmt->fetch()){
                $cont = $row[0]+1;
            }
        return $cont;
    }

	function actualizarRegistroMesAño($medidor, $metrosconsumidos, $mes, $anio){
		$pdo = Database::conectar();
    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$actualizar_medicion = 'UPDATE `tbmediciongeneral` SET `'.$mes.'`=:mes WHERE `medicionclientemedidorid` =:medidorid AND `AnioActual` =:anio';

    	$q = $pdo->prepare($actualizar_medicion);
        $q -> bindParam(':mes', $metrosconsumidos, PDO::PARAM_STR);
        $q -> bindParam(':medidorid', $medidor, PDO::PARAM_STR);
        $q -> bindParam(':anio', $anio, PDO::PARAM_STR);
        
        $q -> execute();

        if($q->rowCount()>0){
			return true;
		}else{
			return false;
		}


        Database::desconectar();
	}


?>