<?php 	 
	
	include 'carrerabusiness.php';

	if(isset($_POST['insertar'])){
		if(isset($_POST['carreratipo'])
	
		){
			$carreraBusiness = new CarreraBusiness();		
			$carreratipo = $_POST['carreratipo'];		
			
			
			
	
			}

		
	    	$carrera = new Carrera(0,$carreratipo);				 
			
			
	    	//$resultado = $becaBusiness->insertarBeca($beca);


	    	if($resultado == 1){
	    		header("location: ../view/admincursoview.php?mensaje=1" );
	    	}else{
	    		header("location: ../view/admincursoview.php?mensaje=4" );
	    	}
			 
		

		
	}else if(isset($_GET['obtenerCarreras'])){

		$carreraBusiness = new CarreraBusiness();
		$carreras = $carreraBusiness ->getAllTBCarreras();
		$opciones = "";

		if(isset($_GET['carreraid'])){
			$id = $_GET['carreraid'];

			foreach ($carreras as $carrera) {
				if($carrera['carreraid'] == $id){
					$opciones .= '<option selected value="'.$carrera['carreraid'].'">'.$carrera['tipocarrera'].'</option>';
				}else{
					$opciones .= '<option value="'.$carrera['carreraid'].'">'.$carrera['tipocarrera'].'</option>';
				}
				
			}


		}else{
			foreach ($carreras as $carrera) {
				$opciones .= '<option value="'.$carrera['carreraid'].'">'.$carrera['tipocarrera'].'</option>';
			}
		}
		

		

		
		echo $opciones;
	}
	






?>