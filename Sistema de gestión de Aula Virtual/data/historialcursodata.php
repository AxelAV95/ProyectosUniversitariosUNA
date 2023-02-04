<?php 

include_once 'data.php';
include ("../domain/usuario.php");

class HistorialCursoData extends Database{
	
	public function __construct(){}

	

	public function getUltimoIdInsertado(){
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo ->prepare("SELECT MAX(historialid) AS historialid  FROM tbhistorialcurso");
		$stmt -> execute();
		$nextId = 1;
				
		if($row = $stmt->fetch()){
		   $nextId = $row[0]+1;
		}

		return $nextId;
	}	

	public function insertarHistorialCurso($cursoid,$password,$estado,$tipo,$img){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC insertarHistorialCurso ?,?,?,?,?,?");

		$max = $pdo ->prepare("SELECT MAX(usuarioid) AS usuarioid  FROM tbusuario");
		$max -> execute();
		$nextId = 1;
				
		if($row = $max->fetch()){
		   $nextId = $row[0]+1;
		} 
	
	

		$stm ->bindParam(1,$nextId,PDO::PARAM_INT);
		$stm ->bindParam(2,$cursoid,PDO::PARAM_INT);
		$stm ->bindParam(3,$password,PDO::PARAM_INT);           
		$stm ->bindParam(4,$estado,PDO::PARAM_STR);
		$stm ->bindParam(5,$tipo,PDO::PARAM_INT);
		$stm ->bindParam(6,$img,PDO::PARAM_INT);

		$resultado = $stm->execute();
		Database::desconectar();
		   
		return $resultado;
	}

	
	public function getAllTBHistorialCursos() {
		$pdo = Database::conectar();
		$stm = $pdo->prepare("SELECT * FROM tbhistorialcurso");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	 }



	 public function eliminarHistorialCurso($id){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC eliminarHistorialCurso ?");
		$stm ->bindParam(1,$id,PDO::PARAM_INT);
		$resultado = $stm->execute();
		Database::desconectar();
		   
		return $resultado;

	}
}


?>