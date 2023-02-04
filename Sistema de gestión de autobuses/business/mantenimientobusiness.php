<?php 

	include '../data/mantenimientodata.php';

	class MantenimientoBusiness{

		private $mantenimientoData;

		public function MantenimientoBusiness() {
        	$this->mantenimientoData = new MantenimientoData();
    	}

    	 public function insertarMantenimiento($mantenimiento) {
        return $this->mantenimientoData-> insertarMantenimiento($mantenimiento);
    	}

    public function actualizarMantenimiento($mantenimiento) {
        return $this->mantenimientoData->actualizarMantenimiento($mantenimiento);
    }

    public function eliminarMantenimiento($id) {
        return $this->mantenimientoData->eliminarMantenimiento($id);
    }

    public function obtenerMantenimiento() {
        return $this->mantenimientoData->obtenerMantenimiento();
    }

	}


?>