<?php 

	include 'mantenimientoBusiness.php';


    if (isset($_POST['actualizar'])) {

        if ( !empty($_POST)) {
           $id = $_POST['id'];
           $empleado = $_POST['empleado'];
           $fin = $_POST['fin'];
           $costo = $_POST['costo'];
           $detalle = $_POST['detalle'];
           $total = $_POST['mantenimientocostototal'];
           $frenos = $_POST['frenos'];
           $carroceria = $_POST['carroceria'];
           $motor = $_POST['motor'];
           $rotula = $_POST['rotula'];
           $inicio = $_POST['mantenimientofechainicio'];
           $vehiculo = $_POST['mantenimientovehiculoid'];
        $mantenimiento = new Mantenimiento();
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
        $mantenimiento -> setMantenimientoid($id);
        $mantenimiento -> setVehiculoid($vehiculo);

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
        $vehiculo = $_POST['mantenimientovehiculoid'];
        $empleado = $_POST['mantenimientoempleadoid'];
        $inicio= $_POST['mantenimientofechainicio'];
        $fin= $_POST['mantenimientofechafin'];
        //$costo= $_POST['mantenimientocostounitario']; //ARREGLO DE COSTOS UNITARIOS
        $detalle= $_POST['mantenimientodetallecostounitario'];
        $total= $_POST['mantenimientocostototal'];
        $actividades = array(0,0,0,0);
        $actividades = $_POST['actividad']; //ARREGLO DE ACTIVIDADES


        $costo = $_POST['costosunitarios'];
    $N = count($costo);
    $aux = ""; //VARIABLE QUE ALMACENARÁ CADA VALOR SEPARADO POR COMAS
    //RECORRE EL ARRAY
    for($i=0; $i < $N; $i++){
      $aux.=$costo[$i].','; //CONCATENA CON COMA
    }

    $trimCostos = trim($aux,',');

        $frenos = 0;
    $carroceria = 0;
    $motor = 0;
    $rotulaysusp = 0;

    //print_r($actividades);

    foreach($actividades as $elemento){

        if($elemento == "Frenos"){
            $frenos = 1;
        }
        if($elemento == "Carroceria"){
            $carroceria = 1;
        }

        if($elemento == "Motor"){
            $motor = 1;
        }

        if($elemento == "Rotulas"){
            $rotulaysusp = 1;
        }

    }


        /*$frenos = $_POST['mantenimientofrenos'];
        $carroceria = $_POST['mantenimientocarroceria'];
        $motor = $_POST['mantenimientomotor'];
        $rotula = $_POST['mantenimienrorotula'];*/

        $mantenimiento = new Mantenimiento();
        $mantenimiento -> setVehiculoid($vehiculo);
        $mantenimiento -> setEmpleadoid($empleado);
        $mantenimiento -> setFechaInicio($inicio);
        $mantenimiento -> setFechaFin($fin);
        $mantenimiento -> setCostoUnitario($trimCostos);
        $mantenimiento -> setDetalleCostoUnitario($detalle);
        $mantenimiento -> setCostoTotal($total);
        $mantenimiento -> setFrenos($frenos);
        $mantenimiento -> setCarroceria($carroceria);
        $mantenimiento -> setMotor($motor);
        $mantenimiento -> setRotula($rotulaysusp);

        $manBuss = new MantenimientoBusiness();
        $manBuss -> insertarMantenimiento($mantenimiento);
    }

}else if (isset($_POST['leer'])) {
   
}

?>