<?php 

	include '../data/rutahorariodata.php';

	class RutahorarioBusiness{

		private $rutahorarioData;

		public function RutahorarioBusiness() {
        	$this->rutahorarioData = new RutahorarioData();
    	}

    	 public function insertarHorario($horario) {
        return $this->rutahorarioData-> insertarRutaHorario($horario);
		}
		
		public function insertarHorario2($horario) {
			return $this->rutahorarioData-> insertarRutaHorario2($horario);
			}

		public function obtenerHorarios() {
        return $this->rutahorarioData->obtenerHorarios();
		}
		
		public function actualizarHorario($horario) {
        return $this->rutahorarioData->actualizarHorario($horario);
		}
		
		public function eliminarHorario($id) {
        return $this->rutahorarioData->eliminarHorario($id);
		}

	}

?>