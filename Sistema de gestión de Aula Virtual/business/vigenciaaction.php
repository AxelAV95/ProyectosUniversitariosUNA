<?php 	 
	
	include 'vigenciabusiness.php';

	if(isset($_POST['insertar'])){
		if(isset($_POST['vigenciadescripcion'])
	
		){
			$vigenciaBusiness = new VigenciaBusiness();		
			$vigenciadescripcion = $_POST['vigenciadescripcion'];		
			
			
			
	
			}

		
	    	$beca = new Beca(0,$vigenciadescripcion);				 
			
			
	    	//$resultado = $becaBusiness->insertarBeca($beca);


	    	if($resultado == 1){
	    		//header("location: ../view/cursoadminview.php?mensaje=1" );
	    	}else{
	    		//header("location: ../view/cursoadminview.php?mensaje=4" );
	    	}
			 
		

		
	}else if(isset($_GET['obtenerVigencias'])){

		$vigenciaBusiness = new VigenciaBusiness();
		$vigencias = $vigenciaBusiness ->getAllTBVigencias();
		$opciones = "";

		if(isset($_GET['vigenciaid'])){
			$id = $_GET['vigenciaid'];

			foreach ($vigencias as $vigencia) {
				if($vigencia['vigenciaid'] == $id){
					$opciones .= '<option selected value="'.$bevigenciaca['vigenciaid'].'">'.$vigencia['vigenciadescripcion'].'</option>';
				}else{
					$opciones .= '<option value="'.$vigencia['vigenciaid'].'">'.$vigencia['vigenciadescripcion'].'</option>';
				}
				
			}


		}else{
			foreach ($vigencias as $vigencia) {
				$opciones .= '<option value="'.$vigencia['vigenciaid'].'">'.$vigencia['vigenciadescripcion'].'</option>';
			}
		}
		

		

		
		echo $opciones;
	}
	






?>