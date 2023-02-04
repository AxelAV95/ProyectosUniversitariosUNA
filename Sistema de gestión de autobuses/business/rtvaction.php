<?php 

	include 'rtvbusiness.php';


	if (isset($_POST['actualizar'])){

         if ( !empty($_POST)) {
        
//UPDATE `tbrtv` SET `rtvfechavencimiento`=[value-4],`rtvmontoacumulado`=[value-6],`rtvestado`=[value-7] WHERE 1
        $val1 = $_POST['empleadoid'];
        $val2 =  $_POST['vehiculoid2'];
        $val3 =  $_POST['fechaV'];
        $val4 =  $_POST['montobase'];
        $val5 =  $_POST['montoacumulado'];
        $val6 =  $_POST['estado'];
        $val7 =  $_POST['rtvid'];

        if($val6 == 0){
            $total = 0;
            $total= $val5+$val4;

            $RTV = new RTV();
            $RTV -> setEmpleadoID($val1);
            $RTV -> setVehiculoID($val2);
            $RTV -> setFechaVencimiento($val3);
            $RTV -> setMontoBase($val4);
            $RTV -> setMontoAcumulado($total);
            $RTV -> setEstado($val6);
            $RTV -> setRTVID($val7);

            $RTVB = new RTVBusiness();
            $RTVB -> ActualizarRTVPendiente($RTV);
        }else if($val6==1){
            $RTV = new RTV();
            $RTV -> setEmpleadoID($val1);
            $RTV -> setVehiculoID($val2);
            $RTV -> setFechaVencimiento($val3);
            $RTV -> setMontoBase($val4);
            $RTV -> setMontoAcumulado(0);
            $RTV -> setEstado($val6);

            $RTVB = new RTVBusiness();
            $RTVB -> ActualizarRTVAprobado($RTV);
        }
        

        }
     
    
     
    

   
} else if (isset($_POST['eliminar'])) {

    if ( !empty($_POST)) {
        // keep track post values
        $rtvid = $_POST['rtvid'];
         
        $RTVBuss = new RTVBusiness();
        $RTVBuss -> eliminarRTV($rtvid);
         
    }

   
} else if (isset($_POST['insertar'])) {

   if ( !empty($_POST)) {
        

        $val1 = $_POST['empleadoid'];
        $val2 =  $_POST['vehiculoid'];
        $val3 =  $_POST['fechaV'];
        $val4 =  $_POST['montobase'];
        $val5 =  $_POST['montoacumulado'];
        $val6 =  $_POST['estado'];

        $RTV = new RTV();
        $RTV -> setEmpleadoID($val1);
        $RTV -> setVehiculoID($val2);
        $RTV -> setFechaVencimiento($val3);
        $RTV -> setMontoBase($val4);
        $RTV -> setMontoAcumulado($val5);
        $RTV -> setEstado($val6);

        $RTVB = new RTVBusiness();
        $RTVB -> insertarRTV($RTV);

        }
    
}else if (isset($_POST['leer'])) {


    

   
}

?>