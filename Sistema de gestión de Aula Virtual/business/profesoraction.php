<?php 
include 'profesorbusiness.php';

if(isset($_POST['agregarAsignacion'])){
	if(isset($_POST['cursoid']) && isset($_POST['profesorid']) && isset($_POST['fechaasignacion']) &&  isset($_POST['asignaciondescripcion']) ){
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

			$profesorBusiness = new ProfesorBusiness();
			$resultado = $profesorBusiness->agregarAsignacionProfesor($_POST['fechaasignacion'],$rutaArchivo,$_POST['asignaciondescripcion'],$_POST['profesorid'],$_POST['cursoid']);


			if($resultado == 1){


				header("location: ../view/profesorasignacionview.php?mensaje=1&cursoid=".$_POST['cursoid'] );
			}else{
				header("location: ../view/profesorasignacionview.php?mensaje=4&cursoid=".$_POST['cursoid'] );
			}
		}else{
			header("location: ../view/profesorasignacionview.php?mensaje=4&cursoid=".$_POST['cursoid'] );
		}
	}else if(isset($_GET['eliminar'])){
		if(isset($_GET['asignacionid']) && isset($_GET['cursoid'])){
			$profesorBusiness = new ProfesorBusiness();
			$resultado = $profesorBusiness->eliminarAsignacionProfesor($_GET['asignacionid']);
			if($resultado == 1){


				header("location: ../view/profesorasignacionview.php?mensaje=3&cursoid=".$_GET['cursoid'] );
			}else{
				header("location: ../view/profesorasignacionview.php?mensaje=4&cursoid=".$_GET['cursoid'] );
			}
		}
	}else if(isset($_POST['actualizarPorcentaje'])){
		if(isset($_POST['rubronota']) && isset($_POST['cursoid']) && isset($_POST['profesorid']) && isset($_POST['estudianteid']) && isset($_POST['ciclo']) && isset($_POST['anio']) && isset($_POST['tipoRubro']) && isset($_POST['asignacionid'])){
			
			$profesorBusiness = new ProfesorBusiness();
			$calificacion = intval($_POST['rubronota'])*intval($_POST['valorRubro'])/100;
			$resultado = $profesorBusiness->calificarEstudiante($calificacion,$_POST['cursoid'],$_POST['profesorid'],$_POST['estudianteid'],$_POST['ciclo'],$_POST['anio'],$_POST['tipoRubro'],$_POST['asignacionid'],$_POST['rubronota']);

			if($resultado == 1){


				header("location: ../view/profesorasignacionsubidaview.php?mensaje=2&cursoid=".$_POST['cursoid']."&asignacionid=".$_POST['asignacionid'] );
			}else{
				header("location: ../view/profesorasignacionsubidaview.php?mensaje=4&cursoid=".$_POST['cursoid']."&asignacionid=".$_POST['asignacionid']  );
			}
		}

	}else if(isset($_POST['insertar'])){ ///--------------------
		
		if(isset($_POST['profesornombre']) && isset($_POST['profesorcedula']) && isset($_POST['profesoredad']) &&isset($_POST['profesorsexo']) && isset($_POST['profesorexperiencia']) && isset($_POST['profesorgrado']) ){
			
			$profesorBusiness = new ProfesorBusiness();		
			$profesornombre = $_POST['profesornombre'];		
			$profesorcedula = $_POST['profesorcedula'];
			$profesoredad = $_POST['profesoredad'];
			$profesorsexo = $_POST['profesorsexo'];
			$profesorexperiencia = $_POST['profesorexperiencia'];
			$profesorgrado =  $_POST['profesorgrado'];

			
			

			

			
			$profesor = new Profesor(0,$profesornombre,$profesorcedula,$profesoredad,$profesorsexo,$profesorexperiencia,$profesorgrado,0);				 
			
			
			$resultado = $profesorBusiness->insertarProfesor($profesor);


			if($resultado == 1){
				header("location: ../view/adminprofesorview.php?mensaje=1" );
			}else{
				header("location: ../view/adminprofesorview.php?mensaje=4" );
			}


		}else{
			header("location: ../view/adminprofesorview.php?mensaje=5" );
		}
		
	}else if(isset($_POST['actualizar'])){
		if(isset($_POST['profesornombre']) && isset($_POST['profesorcedula'])
			&& isset($_POST['profesoredad']) && isset($_POST['profesorsexo'])
			&& isset($_POST['profesorexperiencia'])&& isset($_POST['profesorgrado']) && isset($_POST['profesorid'])){
			$profesorid = $_POST['profesorid'];		
		$profesornombre = $_POST['profesornombre'];			
		$profesorcedula = $_POST['profesorcedula'];
		$profesoredad = $_POST['profesoredad'];
		$profesorsexo = $_POST['profesorsexo'];
		$profesorexperiencia = $_POST['profesorexperiencia'];			
		$profesorgrado = $_POST["profesorgrado"];
		
			//echo $_POST['profesorid']."idprofe";




		$profesorBusiness = new ProfesorBusiness();
		$profesor = new Profesor($profesorid, $profesornombre, $profesorcedula,$profesoredad,$profesorsexo,$profesorexperiencia,$profesorgrado,0);


		$resultado = $profesorBusiness->modificarProfesor($profesor);

		if($resultado == 1){
			header("location: ../view/adminprofesorview.php?mensaje=2" );
		}else{
			header("location: ../view/adminprofesorview.php?mensaje=4" );
		}

	}



	


}else if(isset($_GET['eliminarProfesor'])){
	$profesorid = $_GET['profesorid'];

	$profesorBusiness = new ProfesorBusiness();
	$resultado = $profesorBusiness->eliminarProfesor($profesorid);

	if($resultado == 1){
		header("location: ../view/adminprofesorview.php?mensaje=3" );
	}else{
		header("location: ../view/adminprofesorview.php?mensaje=4" );
	}
}else if(isset($_GET['respaldar'])){
	$profesorid = $_GET['profesorid'];

	$profesorBusiness = new ProfesorBusiness();
	$resultado = $profesorBusiness->hacerRespaldo($profesorid);
	
	if($resultado == 1){
		header("location: ../view/backup.php?mensaje=3" );
	}else{
		header("location: ../view/backup.php?mensaje=4" );
	}
}else if(isset($_POST['accion'])){
	$profesorid = $_POST['id'];
	$profesorBusiness = new ProfesorBusiness();
	$resultado = $profesorBusiness->getAllTBProfesorCursos($profesorid);

	$datos = "";
	for ($i=0; $i < count($resultado) ; $i++) { 
		$datos .= "<tr>";
		$datos .= "<td>".$resultado[$i]['cursosigla']."</td>";
		$datos .= "<td>".$resultado[$i]['cursonombre']."</td>";
		$datos .= "<td>".$resultado[$i]['Total']."</td>";	
		$datos .= "<td>".$resultado[$i]['epcciclo']."</td>";		
		$datos .= "</tr>";

	}
	echo $datos;


	
}else if(isset($_POST['accion2'])){
	$profesorid = $_POST['id'];
	$profesorBusiness = new ProfesorBusiness();
	$resultado = $profesorBusiness->getAllTBProfesorCursostotal($profesorid);

	echo $resultado[0]["Total"];

	
}




?>