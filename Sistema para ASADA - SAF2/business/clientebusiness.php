<?php 

	include '../data/clientedata.php';

	class ClienteBusiness{

		private $clienteData;

		public function ClienteBusiness() {
        	$this->clienteData = new ClienteData();
    	}

    	 public function insertarCliente($cliente) {
        return $this->clienteData-> insertarCliente($cliente);
    	}

    public function actualizarCliente($cliente) {
        return $this->clienteData->actualizarCliente($cliente);
    }

    public function actualizarMedidor($cliente) {
        return $this->clienteData->actualizarMedidor($cliente);
    }

    public function eliminarCliente($id) {
        return $this->clienteData->eliminarCliente($id);
    }

    public function obtenerClientes() {
        return $this->clienteData->obtenerClientes();
    }

	}

?>