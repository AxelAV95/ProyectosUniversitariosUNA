<?php 

include_once 'data.php';
include '../domain/profesor.php';
include_once 'usuariodata.php';

class ProfesorData extends Database{
	
	public function __construct(){}

	public function obtenerDatosProfesor($cedula){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerDatosProfesor ?");
		$stm->bindParam(1,$cedula,PDO::PARAM_INT);
		
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function obtenerCursosProfesor($profesorid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerCursosProfesor ?");
		$stm->bindParam(1,$profesorid,PDO::PARAM_INT);
		
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);

	}

	public function getTotalCursos($profesorid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerTotalCursosImpartidos ?");
		$stm->bindParam(1,$profesorid,PDO::PARAM_INT);
		$stm->execute();
		$stm->fetchAll(PDO::FETCH_ASSOC);
		Database::desconectar();
		return $stm->rowCount();
	}

	public function obtenerTotalCursosPaginas($profesorid,$numeroPagina,$paginasTotales ){

		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerTotalCursosPaginas ?,?,?");
		$stm->bindParam(1,$profesorid,PDO::PARAM_INT);
		$stm->bindParam(2,$numeroPagina,PDO::PARAM_INT);
		$stm->bindParam(3,$paginasTotales,PDO::PARAM_INT);
		
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);

	}

	public function agregarAsignacionProfesor($fecha,$ruta,$descripcion,$profesor,$curso){
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo ->prepare("SELECT MAX(asignacionid) AS asignacionid  FROM tbasigprofesor");
		$stmt -> execute();
		$nextId = 1;

		if($row = $stmt->fetch()){
			$nextId = $row[0]+1;
		}


		$insertar = "EXEC agregarAsignacionProfesor ?,?,?,?,?,?";
		$q = $pdo->prepare($insertar);
		$q ->bindParam(1,$nextId,PDO::PARAM_INT);
		$q ->bindParam(2,$fecha,PDO::PARAM_STR);
		$q ->bindParam(3,$ruta,PDO::PARAM_INT);
		$q ->bindParam(4,$descripcion,PDO::PARAM_INT);
		$q ->bindParam(5,$profesor,PDO::PARAM_INT);
		$q ->bindParam(6,$curso,PDO::PARAM_INT);
		

		$resultado = $q->execute();

		Database::desconectar();


		return $resultado;
	}

	public function obtenerAsignacionesProfesor($profesorid,$cursoid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerAsignacionesProfesor ?,?");
		$stm->bindParam(1,$profesorid,PDO::PARAM_INT);
		$stm->bindParam(2,$cursoid,PDO::PARAM_INT);
		
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function  eliminarAsignacionProfesor($asignacionid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC eliminarAsignacionProfesor ?");
		$stm ->bindParam(1,$asignacionid,PDO::PARAM_INT);

		$resultado = $stm->execute();
		Database::desconectar();

		return $resultado;
	}

	public function obtenerAsignacionesSubidas($asignacionid,$cursoid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerAsignacionesSubidas ?,?");
		$stm->bindParam(1,$asignacionid,PDO::PARAM_INT);
		$stm->bindParam(2,$cursoid,PDO::PARAM_INT);
		
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function calificarEstudiante($porcentaje,$cursoid,$profesorid,$estudianteid,$ciclo,$anio,$tipoRubro,$asignacionid,$nota){

		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



		$actualizar = "EXEC calificarAsignacionEstudiante ?,?,?,?,?,?,?,?,?";
		$q = $pdo->prepare($actualizar);
		$q ->bindParam(1,$porcentaje,PDO::PARAM_INT);
		$q ->bindParam(2,$nota,PDO::PARAM_INT);
		$q ->bindParam(3,$cursoid,PDO::PARAM_INT);
		$q ->bindParam(4,$profesorid,PDO::PARAM_INT);
		$q ->bindParam(5,$estudianteid,PDO::PARAM_INT);
		$q ->bindParam(6,$ciclo,PDO::PARAM_STR);
		$q ->bindParam(7,$anio,PDO::PARAM_INT);
		$q ->bindParam(8,$tipoRubro,PDO::PARAM_INT);
		$q ->bindParam(9,$asignacionid,PDO::PARAM_INT);
		

		$resultado = $q->execute();

		Database::desconectar();


		return $resultado;

	}
	
	public function obtenerDatosProfesorPorId($profesorid)	{
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerDatosProfesorPorId ?");
		$stm->bindParam(1,$profesorid,PDO::PARAM_INT);
		
		
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}


	public function obtenerDiasRestantesAsignacion($asignacionid,$fecha){
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stm = $pdo->prepare("EXEC obtenerTiempoRestanteAsignacionDias ?,?");
		$stm->bindParam(1,$asignacionid,PDO::PARAM_INT);
		$stm->bindParam(2,$fecha,PDO::PARAM_INT);
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function obtenerHorasRestantesAsignacion($asignacionid,$fecha){
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stm = $pdo->prepare("EXEC obtenerTiempoRestanteAsignacionHoras ?,?");
		$stm->bindParam(1,$asignacionid,PDO::PARAM_INT);
		$stm->bindParam(2,$fecha,PDO::PARAM_INT);
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function obtenerTiempoRestanteAsignacion($asginacionid,$fecha){
		$data = new ProfesorData();
		$dias = $data->obtenerDiasRestantesAsignacion($asginacionid,$fecha);
		$horas = $data->obtenerHorasRestantesAsignacion($asginacionid,$fecha);

		if($dias[0]['tiempoRestanteDias'] < 0){
			$tiempoTotal = abs($dias[0]['tiempoRestanteDias'])." días y ".intval(abs($horas[0]['tiempoRestanteHoras']/60))." horas";
		}else{
			$tiempoTotal = "Atrasada por ".abs($dias[0]['tiempoRestanteDias'])." días y ".intval(abs($horas[0]['tiempoRestanteHoras']/60))." horas";
		}
		

		return $tiempoTotal;
	}

	public function obtenerHistorialCursosProfesor($profesorid){
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerHistorialCursosProfesor ?");
		$stm->bindParam(1,$profesorid,PDO::PARAM_INT);
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	/*-------------------------------------------------*/
	public function getUltimoIdInsertado()
	{
		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo->prepare("SELECT MAX(profesorid) AS profesorid  FROM tbprofesor");
		$stmt->execute();
		$nextId = 1;

		if ($row = $stmt->fetch()) {
			$nextId = $row[0] + 1;
		}

		return $nextId;
	}

	public function insertarProfesor($profesor)
	{
		$datausuario = new UsuarioData();


		$pdo = Database::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $pdo->prepare("SELECT MAX(profesorid) AS profesorid  FROM tbprofesor");
		$stmt->execute();
		$nextId = 1;

		if ($row = $stmt->fetch()) {
			$nextId = $row[0] + 1;
		}

		$nombre = $profesor->getProfesornombre();
		$cedula = $profesor->getProfesorcedula();
		$edad = $profesor->getProfesoredad();
		$sexo = $profesor->getProfesorsexo();
		$experiencia = $profesor->getProfesorexperiencia();
		$grado = $profesor->getProfesorgrado();


		$datausuario->insertarUsuario($cedula,12345,1,2,'Null');
		$usuarioid=$datausuario->getUltimoIdInsertado();

		
		

		$stm = $pdo->prepare("EXEC insertarProfesor ?,?,?,?,?,?,?,?");
		$stm->bindParam(1, $nextId, PDO::PARAM_INT);
		$stm->bindParam(2, $nombre, PDO::PARAM_STR);
		$stm->bindParam(3, $cedula, PDO::PARAM_INT);
		$stm->bindParam(4, $edad, PDO::PARAM_INT);
		$stm->bindParam(5, $sexo, PDO::PARAM_STR);
		$stm->bindParam(6, $experiencia, PDO::PARAM_INT);
		$stm->bindParam(7, $grado, PDO::PARAM_STR);
		$stm->bindParam(8, $usuarioid, PDO::PARAM_INT);
		$resultado = $stm->execute();


		Database::desconectar();


		return $resultado;
	}

	public function modificarProfesor($profesor)
	{
		//var_dump($profesor);
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC modificarProfesor ?,?,?,?,?,?,?");
		$profesorid = $profesor->getProfesorid();
		$profesornombre = $profesor->getProfesornombre();
		$profesorcedula = $profesor->getProfesorcedula();
		$profesoredad = $profesor->getProfesoredad();
		$profesorsexo = $profesor->getProfesorsexo();
		$profesorexperiencia = $profesor->getProfesorexperiencia();
		$profesorgrado = $profesor->getProfesorgrado();
	
		$stm->bindParam(1, $profesorid, PDO::PARAM_INT);
		$stm->bindParam(2, $profesornombre, PDO::PARAM_STR);
		$stm->bindParam(3, $profesorcedula, PDO::PARAM_INT);
		$stm->bindParam(4, $profesoredad, PDO::PARAM_INT);
		$stm->bindParam(5, $profesorsexo, PDO::PARAM_STR);
		$stm->bindParam(6, $profesorexperiencia, PDO::PARAM_INT);
		$stm->bindParam(7, $profesorgrado, PDO::PARAM_STR);
		
		$resultado = $stm->execute();
		Database::desconectar();

		return $resultado;
	}

	public function getTotalProfesores()
	{
		$pdo = Database::conectar();
		$stm = $pdo->prepare("SELECT * FROM tbprofesor ");
		$stm->execute();

		Database::desconectar();
		return $stm->rowCount();
	}

	public function getAllTBProfesores()
	{
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerProfesores");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAllTBHistorialProfesor()
	{
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerHistorialProfesor");
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function eliminarProfesor($id)
	{
		
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC eliminarProfesor ?");
		$stm->bindParam(1, $id, PDO::PARAM_INT);
		$resultado = $stm->execute();
		Database::desconectar();

		return $resultado;
	}

	public function hacerRespaldo($id)
	{
		
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC copiaBD ?");	
		$stm->bindParam(1, $id, PDO::PARAM_INT);	
		$resultado = $stm->execute();
		Database::desconectar();
		
		return $resultado;
		
	}

	
	public function getAllTBProfesorCursos($id)
	{
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerCursosPorProfesor ?");
		$stm->bindParam(1, $id, PDO::PARAM_INT);	
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getAllTBProfesorCursostotal($id)
	{
		$pdo = Database::conectar();
		$stm = $pdo->prepare("EXEC obtenerTotalCursosProfesor ?");
		$stm->bindParam(1, $id, PDO::PARAM_INT);	
		$stm->execute();
		Database::desconectar();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}
}

// $data = new ProfesorData();

// $dias = $data->obtenerDiasRestantesAsignacion(13,'2022-11-14');
// $horas = $data->obtenerHorasRestantesAsignacion(13,'2022-11-14');
// print_r($dias);
// print_r($horas);
// echo $tiempoTotal = abs($dias[0]['tiempoRestanteDias'])." días y ".intval(abs($horas[0]['tiempoRestanteHoras']/60))." horas.";

// echo '<br>';

// echo $data->obtenerTiempoRestanteAsignacion(13,'2022-11-14');
//$pro = new Profesor(10,"yo",123,34,'m',2,"mio",2);
//echo $data->insertarProfesor($pro);


?>