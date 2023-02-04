<?php 	

 include 'estudiantebusiness.php';

 if(isset($_POST['subirAsignacion'])){
		if(isset($_POST['cursoid']) && isset($_POST['profesorid']) && isset($_POST['fechaasignacion']) &&  isset($_POST['asignaciondescripcion']) && isset($_POST['asignacionid']) && isset($_POST['estudianteid'])){
			$ds = DIRECTORY_SEPARATOR;  //1
			$rutaArchivo = "";
			$storeFolder = '../view/images/asignacionp';   //2

			if (!empty($_FILES)) {

			    $tempFile = $_FILES['file']['tmp_name'];          //3             

			    $targetPath = $storeFolder . $ds;  //4

			    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
			    $rutaArchivo = "images/asignacionp". "/". $_FILES['file']['name'];
			   

			    move_uploaded_file($tempFile,$targetFile); //6

			}

			 $estudianteBusiness = new EstudianteBusiness();
				$resultado = $estudianteBusiness->agregarAsignacionEstudiante($_POST['fechaasignacion'],$rutaArchivo ,$_POST['asignaciondescripcion'],0,$_POST['asignacionid'],$_POST['estudianteid']);


			if($resultado == 1){

				//?asignacionid=13&cursoid=1&profesorid=1
				header("location: ../view/estudianteasignacionview.php?mensaje=1&cursoid=".$_POST['cursoid']."&asignacionid=".$_POST['asignacionid']."&profesorid=".$_POST['profesorid'] );
			}else{
				header("location: ../view/estudianteasignacionview.php?mensaje=4&cursoid=".$_POST['cursoid']."&asignacionid=".$_POST['asignacionid']."&profesorid=".$_POST['profesorid']);
			}
		}else{
			header("location: ../view/estudianteasignacionview.php?mensaje=4&cursoid=".$_POST['cursoid']."&asignacionid=".$_POST['asignacionid']."&profesorid=".$_POST['profesorid']);
		}
	}else if(isset($_POST['actualizarPerfil'])){
		if(isset($_POST['estudiantecedula']) && isset($_POST['usuarioid'])){
			$id = $_POST['usuarioid'];
			$cedula = $_POST['estudiantecedula'];
			$ruta = "";
			
			if(isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])){
				
				list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);
				$directorio = "../view/images/perfiles/".$_POST['estudiantecedula'];

				if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "../view/images/default/userdefault.png"){

						unlink("../view/".$_POST["imagenActual"]);

				}else{

						mkdir($directorio, 0755);	
					
				}

				if($_FILES["editarImagen"]["type"] == "image/jpeg"){

						

						$aleatorio = mt_rand(100,999);

						$ruta = $directorio."/".$aleatorio.".jpg";
				     	$rutaAux = "images/perfiles/".$_POST["estudiantecedula"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor(160, 160);
						 imagealphablending($destino, false);
				     	imagesavealpha($destino, true);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, 160, 160, $ancho, $alto);

						imagejpeg($destino, $ruta);

				}

				if($_FILES["editarImagen"]["type"] == "image/png"){

						

						$aleatorio = mt_rand(100,999);

						$ruta = $directorio."/".$aleatorio.".png";
				     	$rutaAux = "images/perfiles/".$_POST["estudiantecedula"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor(160, 160);
						 imagealphablending($destino, false);
				     imagesavealpha($destino, true);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, 160, 160, $ancho, $alto);

						imagepng($destino, $ruta);

				}

				$estudianteBusiness = new EstudianteBusiness();
				
	    		$resultado = $estudianteBusiness->actualizarPerfilEstudiante($cedula,$id,$rutaAux);

	    		if($resultado == 1){
	    			header("location: ../view/estudianteperfilview.php?mensaje=2" );
	    		}else{
	    			header("location: ../view/estudianteperfilview.php.php?mensaje=4" );
	    		}

			}
		}


	}else if(isset($_POST['insertar'])){ //------------------------
		if(isset($_POST['estudiantenombre'])
		&&isset($_POST['estudiantecedula']) && isset($_POST['estudianteedad'])
		&&isset($_POST['estudiantedireccion']) 
        &&isset($_POST['estudiantecarreraid']) &&isset($_POST['estudiantebecaid'])
		){
			$estudianteBusiness = new EstudianteBusiness();		
			$estudiantenombre = $_POST['estudiantenombre'];		
			$estudiantecedula = $_POST['estudiantecedula'];
			$estudianteedad = $_POST['estudianteedad'];
			$estudiantedireccion = $_POST['estudiantedireccion'];
            $estudianteusuarioid = $_POST['estudianteusuarioid'];
			$estudiantecarreraid =  $_POST['estudiantecarreraid'];
            $estudiantebecaid = $_POST['estudiantebecaid'];
			
			
	
			

		
	    	$estudiante = new Estudiante(0,$estudiantenombre,$estudiantecedula,$estudianteedad,$estudiantedireccion,$estudianteusuarioid,$estudiantecarreraid,$estudiantebecaid);				 
			
			
	    	$resultado = $estudianteBusiness->insertarEstudiante($estudiante);


	    	if($resultado == 1){
	    		header("location: ../view/adminestudianteview.php?mensaje=1" );
	    	}else{
	    		header("location: ../view/adminestudianteview.php?mensaje=4" );
	    	}
			 
		

		}else{
			header("location: ../view/adminestudianteview.php?mensaje=5" );
		}
	}else if(isset($_POST['actualizar'])){
		if(isset($_POST['estudiantenombre']) && isset($_POST['estudiantecedula'])
        && isset($_POST['estudianteedad']) && isset($_POST['estudiantedireccion'])
        &&  isset($_POST['estudiantecarreraid'])
        && isset($_POST['estudiantebecaid']) && isset($_POST['estudianteid'])){
			$estudianteid = $_POST['estudianteid'];		
            $estudiantenombre = $_POST['estudiantenombre'];			
            $estudiantecedula = $_POST['estudiantecedula'];
            $estudianteedad = $_POST['estudianteedad'];
            $estudiantedireccion = $_POST['estudiantedireccion'];
     			
			$estudiantecarreraid = $_POST["estudiantecarreraid"];
			$estudiantebecaid = $_POST["estudiantebecaid"];



				

				$estudianteBusiness = new EstudianteBusiness();
				$estudiante = new Estudiante($estudianteid, $estudiantenombre, $estudiantecedula,$estudianteedad,$estudiantedireccion,0,$estudiantecarreraid,$estudiantebecaid);
				

	    		$resultado = $estudianteBusiness->modificarEstudiante($estudiante);

	    		if($resultado == 1){
	    			header("location: ../view/adminestudianteview.php?mensaje=2" );
	    		}else{
	    			header("location: ../view/adminestudianteview.php?mensaje=4" );
	    		}

			
		


	}else{
		header("location: ../view/adminestudianteview.php?mensaje=5" );
	}


	}else if(isset($_GET['eliminar'])){
		$estudianteid = $_GET['estudianteid'];
		
		$estudianteBusiness = new EstudianteBusiness();
		$resultado = $estudianteBusiness->eliminarEstudiante($estudianteid);

		if($resultado == 1){
			header("location: ../view/adminestudianteview.php?mensaje=3" );
		}else{
			header("location: ../view/adminestudianteview.php?mensaje=4" );
		}
	}



 ?>