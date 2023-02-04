<?php 

	include 'mantenimientobusiness.php';


    if (isset($_POST['actualizar'])) {

        if ( !empty($_POST)) {
           $id = $_POST['id'];
           $empleado = $_POST['empleado'];
           $fin = $_POST['fin'];
           $costo = $_POST['costo'];
           $detalle = $_POST['detalle'];
           $total = $_POST['total'];
           $frenos = $_POST['frenos'];
           $carroceria = $_POST['carroceria'];
           $motor = $_POST['motor'];
           $rotula = $_POST['rotula'];

        $mantenimiento = new Mantenimiento();
        $mantenimiento -> setMantenimientoid($id);
        $mantenimiento -> setEmpleadoid($empleado);
        $mantenimiento -> setFechaFin($fin);
        $mantenimiento -> setCostoUnitario($costo);
        $mantenimiento -> setDetalleCostoUnitario($detalle);
        $mantenimiento -> setCostoTotal($total);
        $mantenimiento -> setFrenos($frenos);
        $mantenimiento -> setCarroceria($carroceria);
        $mantenimiento -> setMotor($motor);
        $mantenimiento -> setRotula($rotula);

        $manBuss = new MantenimientoBusiness();
        $manBuss -> actualizarMantenimiento($mantenimiento);
   
        }
   
} else if (isset($_POST['eliminar'])) {

    if ( !empty($_POST)) {
        // keep track post values
        $mantenimientoid = $_POST['id'];
         
        $manBuss = new MantenimientoBusiness();
        $manBuss -> eliminarMantenimiento($mantenimientoid);
         
    }
   
} else if (isset($_POST['insertar'])) {

   if ( !empty($_POST)) {

        // keep track post values
        $vehiculo = $_POST['vehiculo'];
        $empleado = $_POST['empleado'];
        $inicio= $_POST['inicio'];
        $fin= $_POST['fin'];
        $costo= $_POST['costo'];
        $detalle= $_POST['detalle'];
        $total= $_POST['total'];
        $frenos = $_POST['frenos'];
        $carroceria = $_POST['carroceria'];
        $motor = $_POST['motor'];
        $rotula = $_POST['rotula'];

        $mantenimiento = new Mantenimiento();
        $mantenimiento -> setVehiculoid($vehiculo);
        $mantenimiento -> setEmpleadoid($empleado);
        $mantenimiento -> setFechaInicio($inicio);
        $mantenimiento -> setFechaFin($fin);
        $mantenimiento -> setCostoUnitario($costo);
        $mantenimiento -> setDetalleCostoUnitario($detalle);
        $mantenimiento -> setCostoTotal($total);
        $mantenimiento -> setFrenos($frenos);
        $mantenimiento -> setCarroceria($carroceria);
        $mantenimiento -> setMotor($motor);
        $mantenimiento -> setRotula($rotula);

        $manBuss = new MantenimientoBusiness();
        $manBuss -> insertarMantenimiento($mantenimiento);
    }

}else if (isset($_POST['leer'])) {
   
}

?>