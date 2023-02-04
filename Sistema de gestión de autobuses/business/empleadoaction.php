<?php 

	include 'empleadobusiness.php';


	if (isset($_POST['actualizar'])){

         if ( !empty($_POST)) {
        
        $cedulaError = null;
        $nombreError = null;
        $ape1Error = null;
        $ape2Error = null;
        $telefonoError = null;
        $direccionError = null;
        $cuentaBancariaError = null;
       // $numeroLicenciaError = null;
        $tipoLicenciaError = null;
         
         
        // keep track post values
        $idemp = $_POST['idemp'];
        $cedula = $_POST['cedula'];
        $nombre= $_POST['nombre'];
        $ape1= $_POST['ape1'];
        $ape2= $_POST['ape2'];
        $tel= $_POST['tel'];
        $dir= $_POST['dir'];
        $cuentaB= $_POST['cuentaB'];
       // $numLic= $_POST['numLic'];
       // $tipoLic = $_POST['tipoLic'];
        $tipoEmp = $_POST['tipoEmp'];
      //  $fechaV = $_POST['fechaV'];
        $aux1 = "";
        $aux2 = "";

       /* foreach ($tipoLic as $option ) {
                $aux1 .= $option.','; // I am separating Values with a comma (,) so that I can extract data using explode()
        } 
        foreach ($fechaV as $option ) {
                $aux2 .= $option.','; // I am separating Values with a comma (,) so that I can extract data using explode()
        } */
        
         /*$trimLicenciasSeleccionadas = trim($aux1, ',');
          $trimFechasV = trim($aux2, ',');*/

            $empleado = new Empleado();
            $empleado -> setCedula($cedula);
            $empleado -> setNombre($nombre);
            $empleado -> setApellido1($ape1);
            $empleado -> setApellido2($ape2);
            $empleado -> setTelefono($tel);
            $empleado -> setDireccion($dir);
            $empleado -> setCuentaBancaria($cuentaB);
           // $empleado -> setNumLicencia($numLic);
          //  $empleado -> setTipoLicencia($trimLicenciasSeleccionadas);
            $empleado -> setIdEmpleado($idemp);
            $empleado -> setTipoEmpleado($tipoEmp);
         //   $empleado -> setFechaVencimiento($trimFechasV);
            $empBuss = new EmpleadoBusiness();
            $empBuss -> actualizarEmpleado($empleado);

            
        
    } 

   
} else if (isset($_POST['eliminar'])) {

    if ( !empty($_POST)) {
        // keep track post values
        $idemp = $_POST['idemp'];
         
        $empBuss = new EmpleadoBusiness();
        $empBuss -> eliminarEmpleado($idemp);
         
    }

   
} else if (isset($_POST['insertar'])) {

   if ( !empty($_POST)) {
        // keep track validation errors
        $cedulaError = null;
        $nombreError = null;
        $ape1Error = null;
        $ape2Error = null;
        $telefonoError = null;
        $direccionError = null;
        $cuentaBancariaError = null;
     //   $numeroLicenciaError = null;
        $tipoLicenciaError = null;
         
         
        // keep track post values
        $cedula = $_POST['cedula'];
        $nombre= $_POST['nombre'];
        $ape1= $_POST['ape1'];
        $ape2= $_POST['ape2'];
        $tel= $_POST['tel'];
        $dir= $_POST['dir'];
        $cuentaB= $_POST['cuentaB'];
      //  $numLic= $_POST['numLic'];
        
        $tipoLic = $_POST['tipoLic'];
        $tipoEmp = $_POST['tipoEmp'];
          $fechaV = $_POST['fechaV'];
        $aux1 = "";
        $aux2 = "";

        foreach ($tipoLic as $option ) {
                $aux1 .= $option.','; // I am separating Values with a comma (,) so that I can extract data using explode()
        } 
        foreach ($fechaV as $option ) {
                $aux2 .= $option.','; // I am separating Values with a comma (,) so that I can extract data using explode()
        } 
        
         $trimLicenciasSeleccionadas = trim($aux1, ',');
          $trimFechasV = trim($aux2, ',');
         
        
            $empleado = new Empleado();
            $empleado -> setCedula($cedula);
            $empleado -> setNombre($nombre);
            $empleado -> setApellido1($ape1);
            $empleado -> setApellido2($ape2);
            $empleado -> setTelefono($tel);
            $empleado -> setDireccion($dir);
            $empleado -> setCuentaBancaria($cuentaB);
           // $empleado -> setNumLicencia($numLic);
            $empleado -> setTipoLicencia($trimLicenciasSeleccionadas);
            $empleado -> setFechaVencimiento($trimFechasV);
            $empleado -> setTipoEmpleado($tipoEmp);

            $empBuss = new EmpleadoBusiness();
            $empBuss -> insertarEmpleado($empleado);
        
    }
}else if (isset($_POST['actualizarLic'])) {



         if ( !empty($_POST)) {
            $empID = $_POST['empID'];
            $tipoLic = $_POST['tipoLic'];
            $fechaV = $_POST['fechaV'];
            $aux1 = "";
            $aux2 = "";

        foreach ($tipoLic as $option ) {
                $aux1 .= $option.','; // I am separating Values with a comma (,) so that I can extract data using explode()
        } 
        foreach ($fechaV as $option ) {
                $aux2 .= $option.','; // I am separating Values with a comma (,) so that I can extract data using explode()
        } 
        
         $trimLicenciasSeleccionadas = trim($aux1, ',');
          $trimFechasV = trim($aux2, ',');

          $empBuss = new EmpleadoBusiness();
            $empBuss -> actualizarLicencias($trimLicenciasSeleccionadas,$trimFechasV,$empID);


         }
    

   
}

?>