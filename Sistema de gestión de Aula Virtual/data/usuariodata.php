<?php 

include_once 'data.php';

class UsuarioData extends Database{
	
	public function __construct(){}


	public function actualizarEstadoUsuario($usuario, $password){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC actualizarClaveUsuario ?,?");
		$stm->bindParam(1,$usuario,PDO::PARAM_INT);
		$stm->bindParam(2,$password,PDO::PARAM_STR);
		$resultado = $stm->execute();
		Database::desconectar();
		return $resultado;
	}

	public function getDatosUsuario($usuario, $password) {
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerDatosUsuario ?,?");
		$stm->bindParam(1,$usuario,PDO::PARAM_INT);
		$stm->bindParam(2,$password,PDO::PARAM_STR);
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAllTBusuarios() {
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerUsuarios");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	/*--------------------------------------------------------*/
	public function getUltimoIdInsertado(){
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo ->prepare("SELECT MAX(usuarioid) AS usuarioid  FROM tbusuario");
		$stmt -> execute();
		$nextId = 1;

		if($row = $stmt->fetch()){
			$nextId = $row[0];
		}

		return $nextId;
	}	

	public function insertarUsuario($cedula,$password,$estado,$tipo,$img){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC insertarUsuario ?,?,?,?,?,?");

		$max = $pdo ->prepare("SELECT MAX(usuarioid) AS usuarioid  FROM tbusuario");
		$max -> execute();
		$nextId = 1;

		if($row = $max->fetch()){
			$nextId = $row[0]+1;
		} 



		$stm ->bindParam(1,$nextId,PDO::PARAM_INT);
		$stm ->bindParam(2,$cedula,PDO::PARAM_INT);
		$stm ->bindParam(3,$password,PDO::PARAM_INT);           
		$stm ->bindParam(4,$estado,PDO::PARAM_STR);
		$stm ->bindParam(5,$tipo,PDO::PARAM_INT);
		$stm ->bindParam(6,$img,PDO::PARAM_INT);

		$resultado = $stm->execute();
		Database::desconectar();

		return $resultado;
	}

	public function modificarUsuario($usuario){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC modificarUsuario(?,?,?,?,?,?)");
		$usuarioid = $usuario->getUsuarioid();
		$usuarioidentidad = $usuario->getUsuarioidentidad();
		$usuarioestado = $usuario->getUsuarioestado();
		$usuariopassword = $usuario->getUsuariopassword();
		$usuariotipo = $usuario->getUsuariotipo();
		$usuarioimgperfil = $usuario->getUsuarioimgperfil();
		
		
		
		
		$stm ->bindParam(1,$usuarioid,PDO::PARAM_INT);
		$stm ->bindParam(2,$usuarioidentidad,PDO::PARAM_INT);
		$stm ->bindParam(3,$usuarioestado,PDO::PARAM_INT);           
		$stm ->bindParam(4,$usuariopassword,PDO::PARAM_STR);
		$stm ->bindParam(5,$usuariotipo,PDO::PARAM_INT);
		$stm ->bindParam(6,$usuarioimgperfil,PDO::PARAM_INT);
		$resultado = $stm->execute();
		Database::desconectar();

		return $resultado;
	}

	public function getTotalUsuarios(){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("SELECT * FROM tbusuario ");
		$stm->execute();
		
		Database::desconectar();
		return $stm->rowCount();
	}

	

	public function getAllTBHistorialUsuario() {
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerHistorialUsuario()");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function eliminarUsuario($id){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC eliminarUsuario(?)");
		$stm ->bindParam(1,$id,PDO::PARAM_INT);
		$resultado = $stm->execute();
		Database::desconectar();

		return $resultado;

	}


	

	
	
}

//$usua = new UsuarioData();
//echo $usua->realizarBackup();
//echo $usua->getUltimoIdInsertado();


?>