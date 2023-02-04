<?php 

	include '../data/rtvdata.php';

	class RTVBusiness{

		private $RTVData;

		public function RTVBusiness() {
        	$this->rtvData = new RTVData();
    	}

    	 public function insertarRTV($rtv) {
        return $this->rtvData-> insertarRTV($rtv);
    	}

    public function actualizarRTVPendiente($rtv) {
        return $this->rtvData->actualizarRTVPendiente($rtv);
    }

    public function actualizarRTVAprobado($rtv) {
        return $this->rtvData->actualizarRTVAprobado($rtv);
    }

    public function eliminarRTV($idbus) {
        return $this->rtvData->eliminarRTV($idbus);
    }

    public function obtenerRTVS() {
        return $this->rtvData->obtenerRTVS();
    }

	}

?>