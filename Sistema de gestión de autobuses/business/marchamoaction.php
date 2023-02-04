<?php

	include 'marchamobusiness.php';


	if (isset($_POST['actualizar'])){





    if ( !empty($_POST)) {

			// keep track post values
		 $idvehiculo = $_POST['marchamovehiculoid'];
		 $marchamoid = $_POST['marchamoid'];
		 $monto = $_POST['marchamomonto'];
		 $costoMultasInteres= $_POST['marchamomultainteres'];
		 $montoPartes = $_POST['marchamomontopartes'];
		 $fechaPago= $_POST['marchamofechapago'];
		 $neto = $_POST['montoneto'];



				 $marchamo = new Marchamo();
				 $marchamo -> setMarchamoID($marchamoid);
				 $marchamo -> setIdVehiculo($idvehiculo);
				 $marchamo -> setMonto($monto);
				 $marchamo -> setMontoPartes($montoPartes);
				 $marchamo -> setCostoMultasInteres($costoMultasInteres);
				 $marchamo -> setFechaPago($fechaPago);
				 $marchamo -> setNeto($neto);

            $marchamoBuss = new marchamoBusiness();
            $marchamoBuss -> actualizarMarchamo($marchamo);



    }


} else if (isset($_POST['eliminar'])) {

    if ( !empty($_POST)) {
        // keep track post values
        $idvehiculo = $_POST['marchamovehiculoid'];

        $marchamoBuss = new marchamoBusiness();
        $marchamoBuss -> eliminarMarchamo($idvehiculo);

    }


} else if (isset($_POST['insertar'])) {

   if ( !empty($_POST)) {

		 // keep track post values
		 $idvehiculo = $_POST['marchamovehiculoid'];
		 $monto = $_POST['marchamomonto'];
		 $costoMultasInteres= $_POST['marchamomultainteres'];
		 $montoPartes = $_POST['marchamomontopartes'];
		 $fechaPago= $_POST['marchamofechapago'];
		 $neto = $_POST['montoneto'];



				 $marchamo = new Marchamo();
				 $marchamo -> setIdVehiculo($idvehiculo);
				 $marchamo -> setMonto($monto);
				 $marchamo -> setMontoPartes($montoPartes);
				 $marchamo -> setCostoMultasInteres($costoMultasInteres);
				 $marchamo -> setFechaPago($fechaPago);
				 $marchamo -> setNeto($neto);

				 $marchamoBuss = new marchamoBusiness();
         $marchamoBuss -> insertarMarchamo($marchamo);

    }
}else if (isset($_POST['leer'])) {





}

?>
