<?php 

include_once 'data.php';
include ("../domain/vigencia.php");

class VigenciaData extends Database{
	
	public function __construct(){}


	public function getAllTBVigencias() {
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerVigencias");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	 }

	 public function getTipovigencia($id){	
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerTipoVigencias ?");
		$stm->bindParam(1,$id, PDO::PARAM_INT);
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	
}


?>