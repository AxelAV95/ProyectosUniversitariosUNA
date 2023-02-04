<?php 

include_once 'data.php';
include ("../domain/beca.php");

class BecaData extends Database{
	
	public function __construct(){}


	public function getAllTBBecas() {
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerBecas");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	 }

	 public function getTipobeca($id){	
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerTipoBecas ?");
		$stm->bindParam(1,$id, PDO::PARAM_INT);
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	
}


?>