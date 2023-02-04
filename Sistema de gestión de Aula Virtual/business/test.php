<?php 

include 'profesorbusiness.php';

            
	echo $profesornombre = $_POST['profesornombre'];		
		echo 	$profesorcedula = $_POST['profesorcedula'];
		echo 	$profesoredad = $_POST['profesoredad'];
		echo 	$profesorsexo = $_POST['profesorsexo'];
      echo       $profesorexperiencia = $_POST['profesorexperiencia'];
	echo 		$profesorgrado =  $_POST['profesorgrado'];

	
			$profesor = new Profesor(0,$profesornombre,$profesorcedula,$profesoredad,$profesorsexo,$profesorexperiencia,$profesorgrado,0);	

	$resultado = $profesorBusiness->insertarProfesor($profesor);
	// include 'cursobusiness.php';
	// if(isset($_POST['insertarEstudiante'])){
	// 	$resultado = 0;
	// 	$cursoBusiness = new CursoBusiness();
	// 	foreach($_POST['estudiantescurso'] AS $estudianteid){
	// 		$resultado = $cursoBusiness->agregarEstudiantesCurso($estudianteid,$_POST['cursoid'],$_POST['cursociclo'],$_POST['cursoanio'] );
	// 		if($resultado == 1){

	// 			echo json_encode(1);
	// 			//header("location: ../view/profesorinicioview.php?mensaje=1" );
	// 		}else{
	// 			echo json_encode(4);
	// 			//header("location: ../view/profesorinicioview.php?mensaje=4" );
	// 		}
	// 	}
		
	// }

 ?>