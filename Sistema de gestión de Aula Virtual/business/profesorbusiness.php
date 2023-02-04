<?php 

include '../data/profesordata.php';

class ProfesorBusiness{
	private $profesorData;

	public function __construct(){
		$this->profesorData = new ProfesorData();
	}

	public function obtenerDatosProfesor($cedula){
		return $this->profesorData->obtenerDatosProfesor($cedula);
	}

	public function obtenerCursosProfesor($profesorid){
		return $this->profesorData->obtenerCursosProfesor($profesorid);
	}

	public function getTotalCursos($profesorid){
		return $this->profesorData->getTotalCursos($profesorid);
	}

	public function obtenerTotalCursosPaginas($profesorid,$numeroPagina,$paginasTotales ){
		return $this->profesorData->obtenerTotalCursosPaginas($profesorid,$numeroPagina,$paginasTotales );
	}
	public function agregarAsignacionProfesor($fecha,$ruta,$descripcion,$profesor,$curso){
		return $this->profesorData->agregarAsignacionProfesor($fecha,$ruta,$descripcion,$profesor,$curso);
	}

	public function obtenerAsignacionesProfesor($profesorid,$cursoid){
		return $this->profesorData->obtenerAsignacionesProfesor($profesorid,$cursoid);
	}
	public function  eliminarAsignacionProfesor($asignacionid){
		return $this->profesorData->eliminarAsignacionProfesor($asignacionid);
	}

	public function obtenerAsignacionesSubidas($asignacionid,$cursoid){
		return $this->profesorData->obtenerAsignacionesSubidas($asignacionid,$cursoid);
	}
	public function calificarEstudiante($porcentaje,$cursoid,$profesorid,$estudianteid,$ciclo,$anio,$tipoRubro,$asignacionid,$nota){
		return $this->profesorData->calificarEstudiante($porcentaje,$cursoid,$profesorid,$estudianteid,$ciclo,$anio,$tipoRubro,$asignacionid,$nota);
	}

	public function obtenerDatosProfesorPorId($profesorid){
		return $this->profesorData->obtenerDatosProfesorPorId($profesorid);
	}

	public function obtenerTiempoRestanteAsignacion($asignacionid,$fecha){
		return $this->profesorData->obtenerTiempoRestanteAsignacion($asignacionid,$fecha);
	}

	public function obtenerHorasRestantesAsignacion($asignacionid,$fecha){
		return $this->profesorData->obtenerHorasRestantesAsignacion($asignacionid,$fecha);
	}

	public function obtenerDiasRestantesAsignacion($asignacionid,$fecha){
		return $this->profesorData->obtenerDiasRestantesAsignacion($asignacionid,$fecha);
	}

	public function obtenerHistorialCursosProfesor($profesorid){
		return $this->profesorData->obtenerHistorialCursosProfesor($profesorid);
	}

	/*---------------------------------------------------------*/

	public function insertarProfesor($profesor){
      
        return $this->profesorData->insertarProfesor($profesor);
    }

     public function modificarProfesor($profesor){
        return $this->profesorData->modificarProfesor($profesor);
    }
    public function getTotalProfesor(){
    	return $this->profesorData->getTotalProfesores();
    }

    public function getAllTBProfesores(){
        return $this->profesorData->getAllTBProfesores();
    }

    public function getAllTBHistorialProfesor(){
         return $this->profesorData->getAllTBHistorialProfesor();
    }

    public function eliminarProfesor($id){
        return $this->profesorData->eliminarProfesor($id);
    }

    public function getUltimoIdInsertado(){
        return $this->profesorData->getUltimoIdInsertado();
    }

    public function hacerRespaldo($id){
       
        return $this->profesorData->hacerRespaldo($id);
    }
    public function getAllTBProfesorCursos($id){
        return $this->profesorData->getAllTBProfesorCursos($id);
    }
    public function getAllTBProfesorCursostotal($id){
        return $this->profesorData->getAllTBProfesorCursostotal($id);
    }
}


?>