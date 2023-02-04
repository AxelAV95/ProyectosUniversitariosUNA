<?php 

	include '../data/vehiculodata.php';

	class VehiculoBusiness{

		private $vehiculoData;

		public function VehiculoBusiness() {
        	$this->vehiculoData = new VehiculoData();
    	}

    	 public function insertarVehiculo($vehiculo) {
        return $this->vehiculoData-> insertarVehiculo($vehiculo);
    	}

    public function actualizarVehiculo($vehiculo) {
        return $this->vehiculoData->actualizarVehiculo($vehiculo);
    }

    public function eliminarVehiculo($idvehiculo) {
        return $this->vehiculoData->eliminarVehiculo($idvehiculo);
    }

    public function obtenerVehiculos() {
        return $this->vehiculoData->obtenerVehiculos();
    }

	}

?>