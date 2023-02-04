<?php 

include_once 'data.php';
include ("../domain/carrera.php");
class CarreraData extends Database{
	
	public function __construct(){}


	public function getAllTBCarreras() {
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerCarreras");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	 }

	 public function getTipocarrera($id){	
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerTipoCarreras ?");
		$stm->bindParam(1,$id, PDO::PARAM_INT);
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	
}


?>