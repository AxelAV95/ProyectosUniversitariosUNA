<?php 

include '../data/estudiantedata.php';

class EstudianteBusiness{
	private $estudianteData;

	public function __construct(){
		$this->estudianteData = new EstudianteData();
	}
	
	public function obtenerAvatarEstudiante($estudiantecedula){
		return $this->estudianteData-> obtenerAvatarEstudiante($estudiantecedula);
	}

	public function obtenerDatosEstudiante($estudiantecedula){
		return $this->estudianteData->obtenerDatosEstudiante($estudiantecedula);
	}

	public function obtenerCursosEstudiante($estudianteid){
		return $this->estudianteData->obtenerCursosEstudiante($estudianteid);
	}

	public function obtenerTotalCursosEstudiante($estudianteid){
		return $this->estudianteData->obtenerTotalCursosEstudiante($estudianteid);	
	}

	public function obtenerTotalCursosPaginasEstudiante($estudianteid,$numeroPagina,$paginasTotales){
		return $this->estudianteData->obtenerTotalCursosPaginasEstudiante($estudianteid,$numeroPagina,$paginasTotales);
	}

	public function obtenerAsignacionesCursoEstudiante($cursoid, $profesorid){
		return $this->estudianteData->obtenerAsignacionesCursoEstudiante($cursoid, $profesorid);
	}

	public function obtenerAsignacionesPorEstudiante($estudianteid,$cursoid){
		return $this->estudianteData->obtenerAsignacionesPorEstudiante($estudianteid,$cursoid);
	}

	public function agregarAsignacionEstudiante($fecha,$ruta,$descripcion,$nota,$asigprofid,$estudianteid){
		return $this->estudianteData->agregarAsignacionEstudiante($fecha,$ruta,$descripcion,$nota,$asigprofid,$estudianteid);
	}

	public function verificarExistenciaAsignacionSubida($estudianteid, $cursoid,$asignacionid){
		return $this->estudianteData->verificarExistenciaAsignacionSubida($estudianteid, $cursoid,$asignacionid);
	}

	public function obtenerDesgloseNotaEstudiante($estudianteid,$cursoid){
		return $this->estudianteData->obtenerDesgloseNotaEstudiante($estudianteid,$cursoid);
	}

	public function obtenerHistorialCursosEstudiante($estudianteid){
		return $this->estudianteData->obtenerHistorialCursosEstudiante($estudianteid);	
	}

	public function obtenerCarreraNombre($carreraid){
		return $this->estudianteData->obtenerCarreraNombre($carreraid);	
	}

	public function actualizarPerfilEstudiante($estudiantecedula,$usuarioid,$img){
		return $this->estudianteData->actualizarPerfilEstudiante($estudiantecedula,$usuarioid,$img);
	}

	/*---------------------------------------------------*/
	public function insertarEstudiante($estudiante){
      
        return $this->estudianteData->insertarEstudiante($estudiante);
    }

     public function modificarEstudiante($estudiante){
        return $this->estudianteData->modificarEstudiante($estudiante);
    }
    public function getTotalEstudiante(){
    	return $this->estudianteData->getTotalEstudiantes();
    }

    public function getAllTBEstudiantes(){
        return $this->estudianteData->getAllTBEstudiantes();
    }

    public function getAllTBHistorialEstudiante(){
         return $this->estudianteData->getAllTBHistorialEstudiante();
    }

    public function eliminarEstudiante($id){
        return $this->estudianteData->eliminarEstudiante($id);
    }

    public function getUltimoIdInsertado(){
        return $this->estudianteData->getUltimoIdInsertado();
    }

}


?>