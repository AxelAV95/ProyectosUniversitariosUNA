<?php 

	include '../data/rutatarifadata.php';

	class RutaTarifaBusiness{

		private $rutaTarifaData;

		public function RutaTarifaBusiness() {
        	$this->rutaTarifaData = new RutaTarifaData();
    	}

    	 public function insertarRutaTarifa($rutaTarifa,$rutaTarifa2) {
        return $this->rutaTarifaData-> insertarRutaTarifa($rutaTarifa,$rutaTarifa2);
        }
        
        public function insertarRutaTarifa2($rutaTarifa,$rutaTarifa2) {
            return $this->rutaTarifaData-> insertarRutaTarifa2($rutaTarifa,$rutaTarifa2);
            }

    public function actualizarRutaTarifa($rutaTarifa) {
        return $this->rutaTarifaData->actualizarRutaTarifa($rutaTarifa);
    }

    public function eliminarRutaTarifa($id) {
        return $this->rutaTarifaData->eliminarRutaTarifa($id);
    }

    public function obtenerRutaTarifa() {
        return $this->rutaTarifaData->obtenerRutaTarifa();
    }

	}


?>