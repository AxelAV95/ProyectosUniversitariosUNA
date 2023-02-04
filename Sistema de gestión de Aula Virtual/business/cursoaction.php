<?php 
	include 'cursobusiness.php';

	if(isset($_POST['insertar'])){
		if(isset($_POST['cursoprofesorid']) && isset($_POST['cursocarrera'])
			&& isset($_POST['cursosigla']) && isset($_POST['cursonombre'])
			&& isset($_POST['cursocupo'])  && isset($_POST['cursovigencia'])){

			$curso = new Curso(0, $_POST['cursosigla'], $_POST['cursonombre'], $_POST['cursocupo'], $_POST['cursovigencia'], $_POST['cursocarrera'], $_POST['cursoprofesorid']);
			$cursoBusiness = new CursoBusiness();
			$resultado = $cursoBusiness ->insertarCurso($curso);
			if($resultado == 1){
				header("location: ../view/profesorinicioview.php?mensaje=1&pagina=1" );
			}else{
				header("location: ../view/profesorinicioview.php?mensaje=4&pagina=1" );
			}
		}else{
			//mensaje de error faltan campos
			header("location: ../view/profesorinicioview.php?mensaje=3&pagina=1" );
		}
	}else if(isset($_POST['insertarRubrica'])  ){

		if(isset($_POST['cursoid']) && isset($_POST['examen1']) && isset($_POST['examen2']) && isset($_POST['examen3']) && isset($_POST['tarea1']) && isset($_POST['tarea2']) && isset($_POST['prueba1']) && isset($_POST['prueba2'])){
			$cursoBusiness = new CursoBusiness();
			$rubrica = new Rubrica(0, $_POST['cursoid'], $_POST['examen1'], $_POST['examen2'], $_POST['examen3'],$_POST['tarea1'], $_POST['tarea2'], $_POST['prueba1'], $_POST['prueba2']);
			$resultado = $cursoBusiness->insertarRubrica($rubrica);

			if($resultado == 1){
				echo json_encode(1);
				//header("location: ../view/profesorinicioview.php?mensaje=1" );
			}else{
				echo json_encode(4);
				//header("location: ../view/profesorinicioview.php?mensaje=4" );
			}


		}else{
			//mensaje de error faltan campos
			header("location: ../view/profesorinicioview.php?mensaje=3&pagina=1" );
		}

	 } else if(isset($_POST['actualizarRubrica'])){


		if(isset($_POST['cursoid']) && isset($_POST['examen1']) && isset($_POST['examen2']) && isset($_POST['examen3']) && isset($_POST['tarea1']) && isset($_POST['tarea2']) && isset($_POST['prueba1']) && isset($_POST['prueba2']) && isset($_POST['rubricaid'])){

			
			//inserta una rubrica //se debe verificar si ya existe para ese curso
			$cursoBusiness = new CursoBusiness();
			$rubrica = new Rubrica($_POST['rubricaid'], $_POST['cursoid'], $_POST['examen1'], $_POST['examen2'], $_POST['examen3'],$_POST['tarea1'], $_POST['tarea2'], $_POST['prueba1'], $_POST['prueba2']);
		
			$resultado = $cursoBusiness->actualizarRubrica($rubrica);
			if($resultado == 1){
				
				echo json_encode(1);
				//header("location: ../view/profesorinicioview.php?mensaje=1" );
			}else{
				echo json_encode(4);
				//header("location: ../view/profesorinicioview.php?mensaje=4" );
			}

			
		}
		else{
			//mensaje de error faltan campos
			echo json_encode(3);
			//header("location: ../view/profesorinicioview.php?mensaje=3" );
		}
	}else if(isset($_POST['verificarRubrica'])){

		
		$cursoBusiness = new CursoBusiness();
		$rubricas = $cursoBusiness->obtenerRubricaCurso($_POST['id']);

		if(count($rubricas) > 0){

			echo json_encode($rubricas);
		}else{
			echo json_encode(404);
		}
		//va verificar si existe informacion de la rubrica
			//si hay devuelve toda la data para ser seteada a los campos


		//sino, establece todo a cero en los campos con ajax
	}else if(isset($_POST['accion']) == "obtenerEstudianteSinCurso"){
		$cursoBusiness = new CursoBusiness();
		$estudiantes =  $cursoBusiness->obtenerEstudiantesSinCurso($_POST['curso'],$_POST['profesor'],$_POST['ciclo'],$_POST['anio'],$_POST['carrera']);
		
		echo json_encode($estudiantes);
	}else if(isset($_POST['insertarEstudiante']) ){
		$resultado = 0;

		$estudiantes = $_POST['estudiantescurso'];
		$cantidadEstudiantes = count($estudiantes);
		$cursoBusiness = new CursoBusiness();
		foreach($estudiantes AS $estudiante){
			$resultado = $cursoBusiness->agregarEstudiantesCurso($estudiante,$_POST['cursoid'],$_POST['cursociclo'],$_POST['cursoanio'] );

		}

		//llamar el update

		if($resultado == 1){

			$cursoBusiness->actualizarCupoCurso($_POST['cursoid'], $cantidadEstudiantes);

			header("location: ../view/profesorcursoview.php?mensaje=1&cursoid=".$_POST['cursoid'] );
		}else{
			header("location: ../view/profesorcursoview.php?mensaje=4&cursoid=".$_POST['cursoid'] );
		}

	}else if(isset($_GET['eliminar'])){
		if(isset($_GET['cursoid']) && isset($_GET['estudianteid'])){
			$cursoBusiness = new CursoBusiness();
			$resultado = $cursoBusiness->eliminarEstudianteCurso($_GET['cursoid'], $_GET['estudianteid']);
			if($resultado == 1){


				header("location: ../view/profesorcursoview.php?mensaje=3&cursoid=".$_GET['cursoid'] );
			}else{
				header("location: ../view/profesorcursoview.php?mensaje=4&cursoid=".$_GET['cursoid'] );
			}

		}else{
			header("location: ../view/profesorcursoview.php?mensaje=4&cursoid=".$_GET['cursoid'] );
		}
		
	}else if(isset($_POST['actualizarCalificacion'])){
		if(isset($_POST['rubricaid']) && isset($_POST['cursoid']) && isset($_POST['estudianteid']) && isset($_POST['ciclo']) && isset($_POST['anio'])){
			$rubrica = new Rubrica($_POST['rubricaid'], $_POST['cursoid'], $_POST['examen1'], $_POST['examen2'], $_POST['examen3'], $_POST['tarea1'], $_POST['tarea2'], $_POST['prueba1'], $_POST['prueba2']);
			$cursoBusiness = new CursoBusiness();
			$resultado = $cursoBusiness->actualizarRubrosEstudiante($rubrica,$_POST['estudianteid'],$_POST['ciclo'],$_POST['anio']);

			if($resultado == 1){


				header("location: ../view/profesorcursoview.php?mensaje=5&cursoid=".$_POST['cursoid'] );
			}else{
				header("location: ../view/profesorcursoview.php?mensaje=4&cursoid=".$_POST['cursoid'] );
			}


		}
	}else if(isset($_POST['rubrosEstudiante'])){

		
		$cursoBusiness = new CursoBusiness();
		$rubros = $cursoBusiness->obtenerRubrosEstudiante($_POST['estudiante'], $_POST['id'],$_POST['ciclo'],$_POST['anio']);

		if(count($rubros) > 0){

			echo json_encode($rubros);
		}else{
			echo json_encode(404);
		}
		//va verificar si existe informacion de la rubrica
			//si hay devuelve toda la data para ser seteada a los campos


		//sino, establece todo a cero en los campos con ajax
	}else if(isset($_POST['rubrosCurso'])){
		$cursoBusiness = new CursoBusiness();
		$rubros = $cursoBusiness->obtenerRubricaCurso($_POST['curso']);

		if(count($rubros) > 0){

			echo json_encode($rubros);
		}else{
			echo json_encode(404);
		}
	}else if(isset($_POST['actualizar'])){ //------------------
		if(isset($_POST['cursosigla']) && isset($_POST['cursonombre'])
        && isset($_POST['cursocupo']) && isset($_POST['cursovigenciaid'])
        && isset($_POST['cursoid'])){
			$cursoid = $_POST['cursoid'];		
            $cursosigla = $_POST['cursosigla'];			
            $cursonombre = $_POST['cursonombre'];
            $cursocupo = $_POST['cursocupo'];
            $cursovigenciaid = $_POST['cursovigenciaid'];
			$cursocarreraid = $_POST['cursocarreraid'];
			$cursoprofesorid = $_POST['cursoprofesorid'];
           	$ciclo = $_POST['cursociclo'];



				

				$cursoBusiness = new CursoBusiness();
				$curso = new Curso($cursoid, $cursosigla, $cursonombre,$cursocupo,$cursovigenciaid,$cursocarreraid,$cursoprofesorid);
				

	    		$resultado = $cursoBusiness->modificarCurso($curso,$ciclo);

	    		if($resultado == 1){
	    			header("location: ../view/admincursoview.php?mensaje=2" );
	    		}else{
	    			header("location: ../view/admincursoview.php?mensaje=4" );
	    		}

			
		


	}


	}else if(isset($_GET['eliminar'])){
		$cursoid = $_GET['cursoid'];
		
	


		

		$cursoBusiness = new CursoBusiness();
		$resultado = $cursoBusiness->eliminarCurso($cursoid);

		if($resultado == 1){
			header("location: ../view/admincursoview.php?mensaje=3" );
		}else{
			header("location: ../view/admincursoview.php?mensaje=4" );
		}
	}else if(isset($_GET['ver'])){
		$profesorid = $_GET['profesorid'];
	
		$cursoBusiness = new CursoBusiness();
		$resultado = $cursoBusiness->getAllTBHistorialCurso($profesorid);

		if($resultado == 1){
			header("location: ../view/adminreporteview.php?mensaje=3" );
		}else{
			header("location: ../view/adminreporteview.php?mensaje=4" );
		}
	}



?>