<?php 	 
	
	include 'tipousuariobusiness.php';

	if(isset($_POST['insertar'])){
		if(isset($_POST['tipoid'])
		 && isset($_POST['tipodescripcion'])
		){
			$estudianteBusiness = new EstudianteBusiness();			
			$tipodescripcion = $_POST['tipodescripcion'];
		
			
			
	
			}

		
	    	$tipousuario = new TipoUsuario(0,$tipodescripcion);				 
			
			
	    	$resultado = $tipousuarioBusiness->insertarTipoUsuario($tipousuario);


	    	if($resultado == 1){
	    		header("location: ../view/admininicioview.php?mensaje=1" );
	    	}else{
	    		header("location: ../view/admininicioview.php?mensaje=4" );
	    	}
			 
		

		
	}else if(isset($_POST['actualizar'])){
		if(isset($_POST['tipoid']) && isset($_POST['tipodescripcion'])
 ){
			$tipoid = $_POST['tipoid'];		
            $tipodescripcion = $_POST['tipodescripcion'];			
           



				}

				$tipousuarioBusiness = new TipoUsuarioBusiness();
				$tipousuario = new TipoUsuario($tipoid, $tipodescripcion);
				

	    		$resultado = $tipousuarioBusiness->modificarTipoUsuario($tipousuario);

	    		if($resultado == 1){
	    			header("location: ../view/admininicioview.php?mensaje=2" );
	    		}else{
	    			header("location: ../view/admininicioview.php?mensaje=4" );
	    		}

			
		


	


	}else if(isset($_GET['eliminar'])){
		$tipousuarioid = $_GET['tipousuarioid'];
		
	


		

		$tipousuarioBusiness = new TipoUsuarioBusiness();
		$resultado = $tipousuarioBusiness->eliminarTipoUsuario($tipousuarioid);

		if($resultado == 1){
			header("location: ../view/admininicioview.php?mensaje=3" );
		}else{
			header("location: ../view/admininicioview.php?mensaje=4" );
		}
	}






?>