<?php 

include_once 'data.php';
include '../domain/curso.php';
include '../domain/rubrica.php';

class CursoData extends Database{
	
	public function __construct(){}

	public function obtenerVigencias(){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerVigencias");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function obtenerCarreras(){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerCarreras");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function obtenerCurso($cursoid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerCurso ?");
		$stm->bindParam(1,$cursoid,PDO::PARAM_INT);
		
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function obtenerRubricaCurso($cursoid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerRubricaCurso ?");
		$stm->bindParam(1,$cursoid,PDO::PARAM_INT);
		
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function obtenerEstudiantesCurso($profesorid, $cursoid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerEstudiantesCurso ?,?");
		$stm->bindParam(1,$profesorid,PDO::PARAM_INT);
		$stm->bindParam(2,$cursoid,PDO::PARAM_INT);
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function insertarCurso($curso){
		 $pdo = Database::conectar();
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $stmt = $pdo ->prepare("SELECT MAX(cursoid) AS cursoid  FROM tbcurso");
	        $stmt -> execute();
	        $nextId = 1;
	                
	        if($row = $stmt->fetch()){
	           $nextId = $row[0]+1;
	        }
	        
	        $cursosigla = $curso->getCursosigla();
	        $cursonombre = $curso->getCursonombre();
	        $cursocupo = $curso->getCursocupo();
	        $cursovigenciaid = $curso->getCursovigenciaid();
	        $cursocarreraid = $curso->getCursocarreraid();
	        $cursoprofesorid = $curso->getCursoprofesorid();

	        
	        $insertar = "EXEC insertarCurso ?,?,?,?,?,?,?";
	        $q = $pdo->prepare($insertar);
	        $q ->bindParam(1,$nextId,PDO::PARAM_INT);
	        $q ->bindParam(2,$cursosigla,PDO::PARAM_STR);
	        $q ->bindParam(3,$cursonombre,PDO::PARAM_STR);
	        $q ->bindParam(4,$cursocupo,PDO::PARAM_INT);
	        $q ->bindParam(5,$cursovigenciaid,PDO::PARAM_INT);
	        $q ->bindParam(6,$cursocarreraid,PDO::PARAM_INT);
	        $q ->bindParam(7,$cursoprofesorid ,PDO::PARAM_INT);
	      
			
			$resultado = $q->execute();

            Database::desconectar();

          
	           
	        return $resultado;

	}

	public function insertarRubrica($rubrica){
		$pdo = Database::conectar();
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $stmt = $pdo ->prepare("SELECT MAX(rubricaid) AS rubricaid  FROM tbrubrica");
	        $stmt -> execute();
	        $nextId = 1;
	                
	        if($row = $stmt->fetch()){
	           $nextId = $row[0]+1;
	        }
	             
	        $epccursoid = $rubrica->getCursoid(); 
	        $epcexamen1 = $rubrica->getExamen1(); 
	        $epcexamen2 = $rubrica->getExamen2();  
	        $epcexamen3 = $rubrica->getExamen3();  
	        $epctarea1 = $rubrica->getTarea1(); 
			$epctarea2 = $rubrica->getTarea2(); 
			$epcprueba1 = $rubrica->getPrueba1();  
			$epcprueba2 = $rubrica->getPrueba2();
	        
	        $insertar = "EXEC insertarRubrica ?,?,?,?,?,?,?,?,?";
	        $q = $pdo->prepare($insertar);
	        $q ->bindParam(1,$nextId,PDO::PARAM_INT);
	        $q ->bindParam(2,$epccursoid,PDO::PARAM_INT);
	        $q ->bindParam(3,$epcexamen1,PDO::PARAM_INT);
	        $q ->bindParam(4,$epcexamen2,PDO::PARAM_INT);
	        $q ->bindParam(5,$epcexamen3,PDO::PARAM_INT);
	        $q ->bindParam(6,$epctarea1,PDO::PARAM_INT);
	        $q ->bindParam(7,$epctarea2 ,PDO::PARAM_INT);
	        $q ->bindParam(8,$epcprueba1 ,PDO::PARAM_INT);
	        $q ->bindParam(9,$epcprueba2 ,PDO::PARAM_INT);
	      
			
			$resultado = $q->execute();

            Database::desconectar();

          
	           
	        return $resultado;
	}
	
	public function actualizarRubrica($rubrica){
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$rubricaid = $rubrica->getRubricaid();
		$epccursoid = $rubrica->getCursoid(); 
		$epcexamen1 = $rubrica->getExamen1(); 
		$epcexamen2 = $rubrica->getExamen2();  
		$epcexamen3 = $rubrica->getExamen3();  
		$epctarea1 = $rubrica->getTarea1(); 
		$epctarea2 = $rubrica->getTarea2(); 
		$epcprueba1 = $rubrica->getPrueba1();  
		$epcprueba2 = $rubrica->getPrueba2();

		$actualizar = "EXEC actualizarRubrica ?,?,?,?,?,?,?,?,?";
		$q = $pdo->prepare($actualizar);
		
		$q ->bindParam(1,$rubricaid,PDO::PARAM_INT);
		$q ->bindParam(2,$epccursoid,PDO::PARAM_INT);
		$q ->bindParam(3,$epcexamen1,PDO::PARAM_INT);
		$q ->bindParam(4,$epcexamen2,PDO::PARAM_INT);
		$q ->bindParam(5,$epcexamen3,PDO::PARAM_INT);
		$q ->bindParam(6,$epctarea1,PDO::PARAM_INT);
		$q ->bindParam(7,$epctarea2,PDO::PARAM_INT);
		$q ->bindParam(8,$epcprueba1,PDO::PARAM_INT);
		$q ->bindParam(9,$epcprueba2,PDO::PARAM_INT);


		$resultado = $q->execute();

		Database::desconectar();



		return $resultado;
	}

	public function obtenerEstudiantesSinCurso($cursoid,$profesorid,$ciclo,$anio,$carreraid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerEstudiantesSinCurso ?,?,?,?,?");
		$stm->bindParam(1,$cursoid,PDO::PARAM_INT);
		$stm->bindParam(2,$profesorid,PDO::PARAM_INT);
		$stm->bindParam(3,$ciclo,PDO::PARAM_STR);
		$stm->bindParam(4,$anio,PDO::PARAM_INT);
		$stm->bindParam(5,$carreraid,PDO::PARAM_INT);
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function agregarEstudiantesCurso($estudianteid,$cursoid,$ciclo,$anio){
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo ->prepare("SELECT MAX(epcid) AS epcid  FROM tbpepc");
		$stmt -> execute();
		$nextId = 1;

		if($row = $stmt->fetch()){
			$nextId = $row[0]+1;
		}


		$insertar = "EXEC agregarEstudiantesCurso ?,?,?,?,?";
		$q = $pdo->prepare($insertar);
		$q ->bindParam(1,$nextId,PDO::PARAM_INT);
		$q ->bindParam(2,$estudianteid,PDO::PARAM_INT);
		$q ->bindParam(3,$cursoid,PDO::PARAM_INT);
		$q ->bindParam(4,$ciclo,PDO::PARAM_INT);
		$q ->bindParam(5,$anio,PDO::PARAM_INT);
		
		

		$resultado = $q->execute();

		Database::desconectar();

		return $resultado;
	}

	public function actualizarCupoCurso($cursoid, $cantidadEstudiantes){
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		$actualizar = "EXEC actualizarCupoCurso ?,?";
		$q = $pdo->prepare($actualizar);
		
		$q ->bindParam(1,$cursoid,PDO::PARAM_INT);
		$q ->bindParam(2,$cantidadEstudiantes,PDO::PARAM_INT);
		


		$resultado = $q->execute();

		Database::desconectar();

	}

	public function obtenerCupoCurso($cursoid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerCupoCurso ?");
		$stm->bindParam(1,$cursoid,PDO::PARAM_INT);
		
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function eliminarEstudianteCurso($cursoid, $estudianteid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC eliminarEstudianteCurso ?,?");
		$stm ->bindParam(1,$estudianteid,PDO::PARAM_INT);
		$stm ->bindParam(2,$cursoid,PDO::PARAM_INT);
		$resultado = $stm->execute();
		Database::desconectar();

		return $resultado;
	}

	public function obtenerRubrosEstudiante($estudianteid, $cursoid,$ciclo,$anio){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerRubrosEstudiante ?,?,?,?");
		$stm->bindParam(1,$estudianteid,PDO::PARAM_INT);
		$stm->bindParam(2,$cursoid,PDO::PARAM_INT);
		$stm->bindParam(3,$ciclo,PDO::PARAM_INT);
		$stm->bindParam(4,$anio,PDO::PARAM_INT);
		
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function actualizarRubrosEstudiante($rubrica,$estudianteid,$ciclo,$anio){
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$rubricaid = $rubrica->getRubricaid();
		$epccursoid = $rubrica->getCursoid(); 
		$epcexamen1 = $rubrica->getExamen1(); 
		$epcexamen2 = $rubrica->getExamen2();  
		$epcexamen3 = $rubrica->getExamen3();  
		$epctarea1 = $rubrica->getTarea1(); 
		$epctarea2 = $rubrica->getTarea2(); 
		$epcprueba1 = $rubrica->getPrueba1();  
		$epcprueba2 = $rubrica->getPrueba2();

		$actualizar = "EXEC actualizarRubrosEstudiante ?,?,?,?,?,?,?,?,?,?,?,?";
		$q = $pdo->prepare($actualizar);
		
		$q ->bindParam(1,$rubricaid,PDO::PARAM_INT);
		$q ->bindParam(2,$estudianteid,PDO::PARAM_INT);
		$q ->bindParam(3,$epccursoid,PDO::PARAM_INT);
		$q ->bindParam(4,$epcexamen1,PDO::PARAM_INT);
		$q ->bindParam(5,$epcexamen2,PDO::PARAM_INT);
		$q ->bindParam(6,$epcexamen3,PDO::PARAM_INT);
		$q ->bindParam(7,$epctarea1,PDO::PARAM_INT);
		$q ->bindParam(8,$epctarea2,PDO::PARAM_INT);
		$q ->bindParam(9,$epcprueba1,PDO::PARAM_INT);
		$q ->bindParam(10,$epcprueba2,PDO::PARAM_INT);
		$q ->bindParam(11,$ciclo,PDO::PARAM_STR);
		$q ->bindParam(12,$anio,PDO::PARAM_INT);


		$resultado = $q->execute();

		Database::desconectar();

		return $resultado;

	}

	public function obtenerEstudiantesMatriculadosCurso($cursoid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerEstudiantesMatriculadosCurso ?");
		$stm->bindParam(1,$cursoid,PDO::PARAM_INT);
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	/*----------------------------------------------------*/
	public function modificarCurso($curso,$ciclo){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC actualizarCurso ?,?,?");
		$cursoid = $curso->getCursoid();
		$cursosigla = $curso->getCursosigla();
		$cursonombre = $curso->getCursonombre();
		$cursocupo = $curso->getCursocupo();
		$cursovigenciaid = $curso->getCursovigenciaid();
		$carreraid = $curso->getCursoCarreraid();
		$profesorid = $curso->getCursoProfesorid();
		
		
		$stm ->bindParam(1,$cursoid,PDO::PARAM_INT);
		$stm ->bindParam(2,$cursovigenciaid,PDO::PARAM_INT);
		$stm ->bindParam(3,$ciclo,PDO::PARAM_STR);           
		
		$resultado = $stm->execute();
		Database::desconectar();
		   
		return $resultado;
	}

	public function getTotalCursos(){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("SELECT * FROM tbcurso ");
		$stm->execute();
		
		Database::desconectar();
		return $stm->rowCount();
	}

	public function getAllTBCursos() {
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerCursos");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	 }

	 public function getAllTBHistorialCurso($profesorid) {
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerCursosPorProfe ?");
		$stm ->bindParam(1,$profesorid,PDO::PARAM_INT);
		$resultado = $stm->execute();
		Database::desconectar();
	 }

	 public function eliminarCurso($id){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC eliminarCurso ?");
		$stm ->bindParam(1,$id,PDO::PARAM_INT);
		$resultado = $stm->execute();
		Database::desconectar();
		   
		return $resultado;

	}
}

// $data = new CursoData();
// // $rubrica = new Rubrica(1, 1, 25, 25, 0,10, 10,15, 15);
// $res = $data->obtenerEstudiantesSinCurso(1,1,'Ciclo I',2022);
// print_r($res);

?>