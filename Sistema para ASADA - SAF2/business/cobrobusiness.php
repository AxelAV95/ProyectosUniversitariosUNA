<?php 

	include '../data/cobrodata.php';

	class CobroBusiness{

		private $cobroData;

		public function CobroBusiness() {
        	$this->cobroData = new CobroData();
    	}

    	 public function insertarCobro($cobro) {
            return $this->cobroData-> insertar($cobro);
    	}

  
	}

?>