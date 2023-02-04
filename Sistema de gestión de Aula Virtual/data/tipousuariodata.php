<?php 

include_once 'data.php';
include ("../domain/tipousuario.php");

class TipoUsuarioData extends Database{
	
	public function __construct(){}

	

	public function getUltimoIdInsertado(){
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo ->prepare("SELECT MAX(tipoid) AS tipoid  FROM tbtipousuario");
		$stmt -> execute();
		$nextId = 1;
				
		if($row = $stmt->fetch()){
		   $nextId = $row[0]+1;
		}

		return $nextId;
	}	

	public function insertarTipoUsuario($tipousuario){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC insertarTipoUsuario(?,?)");

		$max = $pdo ->prepare("SELECT MAX(tipoid) AS tipoid  FROM tbtipousuario");
		$max -> execute();
		$nextId = 1;
				
		if($row = $max->fetch()){
		   $nextId = $row[0]+1;
		} 
	
		    
		$tipodescripcion = $tipousuario->getTipodescripcion();
		
	
		
		

		$stm ->bindParam(1,$nextId,PDO::PARAM_INT);
		$stm ->bindParam(2,$tipodescripcion,PDO::PARAM_INT);
		

		$resultado = $stm->execute();
		Database::desconectar();
		   
		return $resultado;
	}

	public function modificarTipoUsuario($tipousuario){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC modificarTipoUsuario(?,?)");
		$tipoid = $tipousuario->getTipoid();
		$tipodescripcion = $tipousuario->getTipodescripcion();
		
		
		
		
		
		$stm ->bindParam(1,$tipoid,PDO::PARAM_INT);
		$stm ->bindParam(2,$tipodescripcion,PDO::PARAM_STR);

		$resultado = $stm->execute();
		Database::desconectar();
		   
		return $resultado;
	}

	public function getTotalTipoUsuarios(){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("SELECT * FROM tbtipousuario ");
		$stm->execute();
		
		Database::desconectar();
		return $stm->rowCount();
	}

	public function getAllTBTipoUsuarios() {
		$pdo = Database::conectar();
		$stm = $pdo->prepare("SELECT * FROM tbtipousuario");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	 }

	 public function getAllTBHistorialTipoUsuario() {
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerHistorialTipoUsuario()");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	 }

	 public function eliminarTipoUsuario($id){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC eliminarTipoUsuario(?)");
		$stm ->bindParam(1,$id,PDO::PARAM_INT);
		$resultado = $stm->execute();
		Database::desconectar();
		   
		return $resultado;

	}
}


?>