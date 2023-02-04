<?php 	 
	
	include 'becabusiness.php';

	if(isset($_POST['insertar'])){
		if(isset($_POST['becatipo'])
	
		){
			$becaBusiness = new BecaBusiness();		
			$becatipo = $_POST['becatipo'];		
			
			
			
	
			}

		
	    	$beca = new Beca(0,$becatipo);				 
			
			
	    	//$resultado = $becaBusiness->insertarBeca($beca);


	    	if($resultado == 1){
	    		//header("location: ../view/estudianteadminview.php?mensaje=1" );
	    	}else{
	    		//header("location: ../view/estudianteadminview.php?mensaje=4" );
	    	}
			 
		

		
	}else if(isset($_GET['obtenerBecas'])){

		$becaBusiness = new BecaBusiness();
		$becas = $becaBusiness ->getAllTBBecas();
		$opciones = "";

		if(isset($_GET['becaid'])){
			$id = $_GET['becaid'];

			foreach ($becas as $beca) {
				if($beca['becaid'] == $id){
					$opciones .= '<option selected value="'.$beca['becaid'].'">'.$beca['tipobeca'].'</option>';
				}else{
					$opciones .= '<option value="'.$beca['becaid'].'">'.$beca['tipobeca'].'</option>';
				}
				
			}


		}else{
			foreach ($becas as $beca) {
				$opciones .= '<option value="'.$beca['becaid'].'">'.$beca['tipobeca'].'</option>';
			}
		}
		

		

		
		echo $opciones;
	}
	






?>