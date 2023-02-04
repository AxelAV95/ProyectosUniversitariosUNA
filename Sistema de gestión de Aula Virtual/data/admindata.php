<?php 
include_once 'data.php';


class AdminData extends Database{

	public function __construct(){}

	public function verTotalEstudiantes(){
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stm = $pdo->prepare("SELECT * FROM verTotalEstudiantes");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function verTotalProfesores(){
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stm = $pdo->prepare("SELECT * FROM verTotalProfesores");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function verTotalCursos(){
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stm = $pdo->prepare("SELECT * FROM verTotalCursos");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function realizarBackup(){
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if (!file_exists('C:/backup/')) {
			mkdir('C:/backup/', 0777, true);
		}

    	// Statement
		$sql = "
		DECLARE @date VARCHAR(19)
		DECLARE @nombre varchar(30)
		SET @date = CONVERT(VARCHAR(19), GETDATE(), 126)
		SET @date = REPLACE(@date, ':', '-')
		SET @date = REPLACE(@date, 'T', '-')
		SET @nombre = 'bdaula'

		DECLARE @fileName VARCHAR(100)
		SET @fileName = ('C:\backup\_' +@nombre+'_'+ @date + '.bak')

		BACKUP DATABASE bdaula
		TO DISK = @fileName
		WITH 
		FORMAT,
		STATS = 1, 
		MEDIANAME = 'SQLServerBackups',
		NAME = 'Full Backup of dbname';
		";
		try {
			$stmt = $pdo->prepare($sql);
			$resultado = $stmt->execute();
		} catch (PDOException $e) {
			die ("Error executing query. ".$e->getMessage());
		}


		try {
			while ($stmt->nextRowset() != null){};
			//echo "Success";
		} catch (PDOException $e) {
			die ("Error executing query. ".$e->getMessage());
		}

		return $resultado;
	}
}




?>