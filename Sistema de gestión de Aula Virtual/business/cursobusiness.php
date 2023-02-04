<?php 

include '../data/cursodata.php';

class CursoBusiness{
	private $cursoData;

	public function __construct(){
		$this->cursoData = new CursoData();
	}

	public function obtenerVigencias(){
		return $this->cursoData->obtenerVigencias();
	}

	public function obtenerCarreras(){
		return $this->cursoData->obtenerCarreras();
	}

	public function insertarCurso($curso){
		return $this->cursoData->insertarCurso($curso);
	}

	public function obtenerEstudiantesCurso($profesorid, $cursoid){
		return $this->cursoData->obtenerEstudiantesCurso($profesorid, $cursoid);
	}

	public function obtenerCurso($cursoid){
		return $this->cursoData->obtenerCurso($cursoid);
	}


	public function obtenerRubricaCurso($cursoid){
		return $this->cursoData->obtenerRubricaCurso($cursoid);
	}

	public function insertarRubrica($rubrica){
		return $this->cursoData->insertarRubrica($rubrica);
	}

	public function actualizarRubrica($rubrica){
		return $this->cursoData->actualizarRubrica($rubrica);
	}

	public function obtenerEstudiantesSinCurso($cursoid,$profesorid,$ciclo,$anio,$carreraid){
		return $this->cursoData->obtenerEstudiantesSinCurso($cursoid,$profesorid,$ciclo,$anio,$carreraid);
	}

	public function agregarEstudiantesCurso($estudianteid,$cursoid,$ciclo,$anio){
		return $this->cursoData->agregarEstudiantesCurso($estudianteid,$cursoid,$ciclo,$anio);
	}

	public function actualizarCupoCurso($cursoid, $cantidadEstudiantes){
		return $this->cursoData->actualizarCupoCurso($cursoid, $cantidadEstudiantes);
	}

	public function obtenerCupoCurso($cursoid){
		return $this->cursoData->obtenerCupoCurso($cursoid);
	}

	public function eliminarEstudianteCurso($cursoid, $estudianteid){
		return $this->cursoData->eliminarEstudianteCurso($cursoid, $estudianteid);
	}
	public function obtenerRubrosEstudiante($estudianteid, $cursoid,$ciclo,$anio){
		return $this->cursoData->obtenerRubrosEstudiante($estudianteid, $cursoid,$ciclo,$anio);
	}
	public function actualizarRubrosEstudiante($rubrica,$estudianteid,$ciclo,$anio){
		return $this->cursoData->actualizarRubrosEstudiante($rubrica,$estudianteid,$ciclo,$anio);
	}

	public function obtenerEstudiantesMatriculadosCurso($cursoid){
		return $this->cursoData->obtenerEstudiantesMatriculadosCurso($cursoid);	
	}

	//***------------------------------*/

     public function modificarCurso($curso,$ciclo){
        return $this->cursoData->modificarCurso($curso,$ciclo);
    }
    public function getTotalCurso(){
    	return $this->cursoData->getTotalCursos();
    }

    public function getAllTBCursos(){
        return $this->cursoData->getAllTBCursos();
    }

    public function getAllTBHistorialCurso($curso){
         return $this->cursoData->getAllTBHistorialCurso($curso);
    }

    public function eliminarCurso($id){
        return $this->cursoData->eliminarCurso($id);
    }

    public function getUltimoIdInsertado(){
        return $this->cursoData->getUltimoIdInsertado();
    }

	
}


?>