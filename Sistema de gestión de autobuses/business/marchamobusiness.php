<?php 

	include '../data/marchamodata.php';

	class marchamoBusiness{

		private $marchamoData;

		public function marchamoBusiness() {
        	$this->marchamoData = new marchamoData();
    	}

    	 public function insertarMarchamo($marchamo) {
        return $this->marchamoData-> insertarMarchamo($marchamo);
    	}

    public function actualizarMarchamo($marchamo) {
        return $this->marchamoData->actualizarMarchamo($marchamo);
    }

    public function eliminarMarchamo($idbus) {
        return $this->marchamoData->eliminarMarchamo($idbus);
    }

    public function obtenerMarchamos() {
        return $this->marchamoData->obtenerMarchamos();
    }

	}

?>