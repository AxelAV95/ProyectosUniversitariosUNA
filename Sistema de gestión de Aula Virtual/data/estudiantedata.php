<?php 

include_once 'data.php';
include '../domain/estudiante.php';
include_once 'usuariodata.php';
class EstudianteData extends Database{
	
	public function __construct(){}

	public function obtenerAvatarEstudiante($estudiantecedula){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerAvatarEstudiante ?");
		$stm->bindParam(1,$estudiantecedula,PDO::PARAM_INT);
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function obtenerDatosEstudiante($estudiantecedula){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerDatosEstudiante ?");
		$stm->bindParam(1,$estudiantecedula,PDO::PARAM_INT);
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function obtenerCursosEstudiante($estudianteid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerCursosEstudiante ?");
		$stm->bindParam(1,$estudianteid,PDO::PARAM_INT);
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function obtenerTotalCursosEstudiante($estudianteid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerTotalCursosEstudiante ?");
		$stm->bindParam(1,$estudianteid,PDO::PARAM_INT);
		$stm->execute();
		$stm->fetchAll(PDO::FETCH_ASSOC);
		Database::desconectar();
		return $stm->rowCount();
	}

	public function obtenerTotalCursosPaginasEstudiante($estudianteid,$numeroPagina,$paginasTotales){

		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerTotalCursosPaginasEstudiante ?,?,?");
		$stm->bindParam(1,$estudianteid,PDO::PARAM_INT);
		$stm->bindParam(2,$numeroPagina,PDO::PARAM_INT);
		$stm->bindParam(3,$paginasTotales,PDO::PARAM_INT);
		
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function obtenerAsignacionesCursoEstudiante($cursoid, $profesorid){

		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerAsignacionesCursoEstudiante ?,?");
		$stm->bindParam(1,$cursoid,PDO::PARAM_INT);
		$stm->bindParam(2,$profesorid,PDO::PARAM_INT);
		
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function obtenerAsignacionesPorEstudiante($estudianteid,$cursoid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerAsignacionesPorEstudiante ?,?");
		$stm->bindParam(1,$estudianteid,PDO::PARAM_INT);
		$stm->bindParam(2,$cursoid,PDO::PARAM_INT);
		
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function agregarAsignacionEstudiante($fecha,$ruta,$descripcion,$nota,$asigprofid,$estudianteid){
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo ->prepare("SELECT MAX(asignacionid) AS asignacionid  FROM tbasigestudiante");
		$stmt -> execute();
		$nextId = 1;

		if($row = $stmt->fetch()){
			$nextId = $row[0]+1;
		}


		$insertar = "EXEC agregarAsignacionEstudiante ?,?,?,?,?,?,?";
		$q = $pdo->prepare($insertar);
		$q ->bindParam(1,$nextId,PDO::PARAM_INT);
		$q ->bindParam(2,$fecha,PDO::PARAM_STR);
		$q ->bindParam(3,$ruta,PDO::PARAM_STR);
		$q ->bindParam(4,$descripcion,PDO::PARAM_STR);
		$q ->bindParam(5,$nota,PDO::PARAM_INT);
		$q ->bindParam(6,$asigprofid,PDO::PARAM_INT);
		$q ->bindParam(7,$estudianteid ,PDO::PARAM_INT);


		$resultado = $q->execute();

		Database::desconectar();



		return $resultado;
	}

	public function verificarExistenciaAsignacionSubida($estudianteid, $cursoid,$asignacionid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC verificarExistenciaAsignacionSubida ?,?,?");
		$stm->bindParam(1,$estudianteid,PDO::PARAM_INT);
		$stm->bindParam(2,$cursoid,PDO::PARAM_INT);
		$stm->bindParam(3,$asignacionid,PDO::PARAM_INT);
		$stm->execute();
		$resultado = $stm->fetchAll(PDO::FETCH_ASSOC);
		Database::desconectar();
		return $resultado;
	}

	public function obtenerDesgloseNotaEstudiante($estudianteid,$cursoid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerDesgloseNotaEstudiante ?,?");
		$stm->bindParam(1,$estudianteid,PDO::PARAM_INT);
		$stm->bindParam(2,$cursoid,PDO::PARAM_INT);
		
		$stm->execute();
		$resultado = $stm->fetchAll(PDO::FETCH_ASSOC);
		Database::desconectar();
		return $resultado;
	}

	public function obtenerHistorialCursosEstudiante($estudianteid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerHistorialCursosEstudiante ?");
		$stm->bindParam(1,$estudianteid,PDO::PARAM_INT);
		
		$stm->execute();
		$resultado = $stm->fetchAll(PDO::FETCH_ASSOC);
		Database::desconectar();
		return $resultado;
	}

	public function obtenerCarreraNombre($carreraid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerCarreraNombre ?");
		$stm->bindParam(1,$carreraid,PDO::PARAM_INT);
		
		$stm->execute();
		$resultado = $stm->fetchAll(PDO::FETCH_ASSOC);
		Database::desconectar();
		return $resultado;

	}

	public function actualizarPerfilEstudiante($estudiantecedula,$usuarioid,$img){
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$actualizar = "EXEC actualizarPerfilEstudiante ?,?,?";
		$q = $pdo->prepare($actualizar);
		$q ->bindParam(1,$estudiantecedula,PDO::PARAM_INT);
		$q ->bindParam(2,$usuarioid,PDO::PARAM_INT);
		$q ->bindParam(3,$img,PDO::PARAM_STR);
		
		$resultado = $q->execute();

		Database::desconectar();


		return $resultado;
	}

	/*--------------------------------------------------------------*/

	public function getUltimoIdInsertado(){
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo ->prepare("SELECT MAX(estudianteid) AS estudianteid  FROM tbestudiante");
		$stmt -> execute();
		$nextId = 1;

		if($row = $stmt->fetch()){
			$nextId = $row[0]+1;
		}

		return $nextId;
	}	

	public function insertarEstudiante($estudiante){
		$datausuario = new UsuarioData();

		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $pdo->prepare("SELECT MAX(estudianteid) AS estudianteid  FROM tbestudiante");
		$stmt->execute();
		$nextId = 1;

		if ($row = $stmt->fetch()) {
			$nextId = $row[0] + 1;
		}
		try {
			
			$nombre = $estudiante->getEstudiantenombre();                       
			$cedula = $estudiante->getEstudiantecedula();
			$edad = $estudiante->getEstudianteedad();
			$direccion = $estudiante->getEstudiantedireccion();
			$usuarioid = $estudiante->getEstudianteusuarioid();
			$carreraid = $estudiante->getEstudiantecarreraid();
			$becaid = $estudiante->getEstudiantebecaid();

			$datausuario->insertarUsuario($cedula,12345,1,3,'img.png');
			$usuarioid=$datausuario->getUltimoIdInsertado();



			
			$stm = $pdo->prepare("EXEC insertarEstudiante ?,?,?,?,?,?,?,?");
			
			$stm ->bindParam(1,$nextId,PDO::PARAM_INT);
			$stm ->bindParam(2,$nombre,PDO::PARAM_STR);
			$stm ->bindParam(3,$cedula,PDO::PARAM_INT);          
			$stm ->bindParam(4,$edad,PDO::PARAM_INT);
			$stm ->bindParam(5,$direccion,PDO::PARAM_STR);
			$stm ->bindParam(6,$usuarioid,PDO::PARAM_INT);
			$stm ->bindParam(7,$carreraid,PDO::PARAM_INT);
			$stm ->bindParam(8,$becaid,PDO::PARAM_INT);
			$resultado = $stm->execute();


			Database::desconectar();

			
			return $resultado;
		} catch (PDOException $error) {
			echo $error->getMessage();
			
		}
	}

	public function modificarEstudiante($estudiante){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC modificarEstudiante ?,?,?,?,?,?,?");
		$estudianteid = $estudiante->getEstudianteid();
		$estudiantenombre = $estudiante->getEstudiantenombre();
		$estudiantecedula = $estudiante->getEstudiantecedula();
		$estudianteedad = $estudiante->getEstudianteedad();
		$estudiantedireccion = $estudiante->getEstudiantedireccion();   
		$estudiantecarreraid = $estudiante->getEstudiantecarreraid();
		$estudiantebecaid = $estudiante->getEstudiantebecaid();
		$stm ->bindParam(1,$estudianteid,PDO::PARAM_INT);
		$stm ->bindParam(2,$estudiantenombre,PDO::PARAM_STR);
		$stm ->bindParam(3,$estudiantecedula,PDO::PARAM_INT);           
		$stm ->bindParam(4,$estudianteedad,PDO::PARAM_INT);
		$stm ->bindParam(5,$estudiantedireccion,PDO::PARAM_STR);		
		$stm ->bindParam(6,$estudiantecarreraid,PDO::PARAM_INT);
		$stm ->bindParam(7,$estudiantebecaid,PDO::PARAM_INT);
		$resultado = $stm->execute();
		Database::desconectar();

		return $resultado;
	}

	public function getTotalEstudiantes(){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("SELECT * FROM tbestudiante ");
		$stm->execute();
		
		Database::desconectar();
		return $stm->rowCount();
	}

	public function getAllTBEstudiantes() {
		$pdo = Database::conectar();
		$stm = $pdo->prepare("SELECT * FROM tbestudiante");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAllTBHistorialEstudiante() {
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerHistorialEstudiante()");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function eliminarEstudiante($id){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC eliminarEstudiante ?");
		$stm ->bindParam(1,$id,PDO::PARAM_INT);
		$resultado = $stm->execute();
		Database::desconectar();

		return $resultado;

	}
}

// $data = new EstudianteData();

// print_r($data->obtenerTotalCursosPaginasEstudiante(1,1,10));


?>