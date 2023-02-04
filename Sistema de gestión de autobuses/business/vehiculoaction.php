<?php 

	include 'vehiculobusiness.php';


	if (isset($_POST['actualizar'])){
     
    if ( !empty($_POST)) {
         // keep track validation errors
		$idvehiculoError = null;
        $placaError = null;
        $marcaError = null;
        $modeloError = null;
        $tipoError = null;
        $capacidadError = null;
        $estadoError = null;
		$empleadoidError = null;
         
         
        // keep track post values
		$id = $_POST['id'];
        $placa = $_POST['placa'];
        $marca= $_POST['marca'];
        $modelo= $_POST['modelo'];
        $tipo= $_POST['tipo'];
        $capacidad= $_POST['capacidad'];
        $estado= $_POST['estado'];
		$empleadoid=$_POST['empleadoid'];
         
        // validate input
        $valid = true;
		
		if (empty($id)) {
            $idvehiculoError = 'Ingrese un id del vehiculo';
            $valid = false;
        }
        if (empty($placa)) {
            $placaError = 'Ingrese una placa';
            $valid = false;
        } 
         
        if (empty($marca)) {
            $marcaError = 'Ingrese una marca';
            $valid = false;
        }

        if (empty($modelo)) {
            $modeloError = 'Ingrese un modelo';
            $valid = false;
        }

        if (empty($tipo)) {
            $tipoError = 'Ingrese un tipo de vehiculo';
            $valid = false;
        }

        if (empty($capacidad)) {
            $capacidadError = 'Ingrese la capacidad del vehiculo';
            $valid = false;
        }

        if (empty($estado)) {
            $estadoError = 'Ingrese el estado del vehiculo';
            $valid = false;
        }
		if (empty($empleadoid)) {
            $empleadoidError = 'Seleccione un chofer para el vehiculo';
            $valid = false;
        }
         
        if ($valid) {

            $vehiculo = new Vehiculo();
			$vehiculo -> setIdvehiculo($id);
            $vehiculo -> setPlaca($placa);
            $vehiculo -> setMarca($marca);
            $vehiculo -> setModelo($modelo);
            $vehiculo -> setTipo($tipo);
            $vehiculo -> setCapacidad($capacidad);
            $vehiculo -> setEstado($estado);
            $vehiculo -> setEmpleadoId($empleadoid);

            $vehiculoBuss = new vehiculoBusiness();
            $vehiculoBuss -> actualizarVehiculo($vehiculo);

            
        }
    }

   
} else if (isset($_POST['eliminar'])) {

    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        $vehiculoBuss = new vehiculoBusiness();
        $vehiculoBuss -> eliminarVehiculo($id);
         
    }

   
} else if (isset($_POST['insertar'])) {

   if ( !empty($_POST)) {
        // keep track validation errors
        $placaError = null;
        $marcaError = null;
        $modeloError = null;
        $tipoError = null;
        $capacidadError = null;
        $estadoError = null;
		$empleadoidError = null;
         
         
        // keep track post values
        $placa = $_POST['placa'];
        $marca= $_POST['marca'];
        $modelo= $_POST['modelo'];
        $tipo= $_POST['tipo'];
        $capacidad= $_POST['capacidad'];
        $estado= $_POST['estado'];
		$empleadoid=$_POST['empleadoid'];
         
        // validate input
        $valid = true;

        if (empty($placa)) {
            $placaError = 'Ingrese una placa';
            $valid = false;
        }
         
        if (empty($marca)) {
            $marcaError = 'Ingrese una marca';
            $valid = false;
        }

        if (empty($modelo)) {
            $modeloError = 'Ingrese un modelo';
            $valid = false;
        }

        if (empty($tipo)) {
            $tipoError = 'Ingrese un tipo de vehiculo';
            $valid = false;
        }

        if (empty($capacidad)) {
            $capacidadError = 'Ingrese la capacidad del vehiculo';
            $valid = false;
        }

        if (empty($estado)) {
            $estadoError = 'Ingrese el estado del vehiculo';
            $valid = false;
        }
		
		if (empty($empleadoid)) {
            $empleadoidError = 'Seleccione un chofer para el vehiculo';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $vehiculo = new Vehiculo();
            $vehiculo -> setPlaca($placa);
            $vehiculo -> setMarca($marca);
            $vehiculo -> setModelo($modelo);
            $vehiculo -> setTipo($tipo);
            $vehiculo -> setCapacidad($capacidad);
            $vehiculo -> setEstado($estado);
            $vehiculo -> setEmpleadoId($empleadoid);

            $vehiculoBuss = new vehiculoBusiness();
            $vehiculoBuss -> insertarVehiculo($vehiculo);
        }
    }
}else if (isset($_POST['leer'])) {


    

   
}

?>