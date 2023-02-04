<?php 

	include 'empleadobusiness.php';


	 if (isset($_POST['insertar'])) {

   if ( !empty($_POST)) {
        // keep track validation errors
        $cedulaError = null;
        $nombreError = null;
        $ape1Error = null;
        $ape2Error = null;
        $telefonoError = null;
        $direccionError = null;
        $correoError = null;
         
         
        // keep track post values
		$id = $_POST['id'];
        $cedula = $_POST['empleadocedula'];
        $nomb = $_POST['empleadonombre'];
        $ape1 = $_POST['empleadoapellido1'];
        $ape2 = $_POST['empleadoapellido2'];
        $corr = $_POST['empleadoemail'];
        $tele = $_POST['empleadotelefono'];
        $dire = $_POST['empleadodireccion'];
         
         
        // validate input
        $valid = true;
		
		
        if (empty($cedula)) {
            $cedulaError = 'Ingrese una cédula';
            $valid = false;
        }
         
        if (empty($nomb)) {
            $nombreError = 'Ingrese un nombre';
            $valid = false;
        } 
         
        if (empty($ape1)) {
            $ape1Error = 'Ingrese apellido 1';
            $valid = false;
        }

        if (empty($ape2)) {
            $ape2Error = 'Ingrese apellido 2';
            $valid = false;
        }

        if (empty($tele)) {
            $telefonoError = 'Ingrese un telefono';
            $valid = false;
        }

        if (empty($dire)) {
            $direccionError = 'Ingrese una dirección';
            $valid = false;
        }

        if (empty($corr)) {
            $correoError = 'Ingrese un correo';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $empleado = new Empleado();
			$empleado -> setId($id);
            $empleado -> setCedula($cedula);
            $empleado -> setNombre($nomb);
            $empleado -> setApellido1($ape1);
            $empleado -> setApellido2($ape2);
            $empleado -> setDireccion($dire);
            $empleado -> setCorreo($corr);
            $empleado -> setTelefono($tele);

            $empleadoBuss = new empleadoBusiness();
            $empleadoBuss -> insertarempleado($empleado);
        }
    }
} else if (isset($_POST['eliminar'])) {

    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        $empleadoBuss = new EmpleadoBusiness();
        $empleadoBuss -> eliminarEmpleado($id);
         
    }
} else if (isset($_POST['actualizar'])) {

    
    


   if ( !empty($_POST)) {
        // keep track validation errors
        $cedulaError = null;
        $nombreError = null;
        $ape1Error = null;
        $ape2Error = null;
        $telefonoError = null;
        $direccionError = null;
        $correoError = null;
         
         
        // keep track post values
		$id = $_POST['id'];
        $cedula = $_POST['cedula'];
        $nomb = $_POST['nomb'];
        $ape1 = $_POST['ape1'];
        $ape2 = $_POST['ape2'];
        $corr = $_POST['corr'];
        $tele = $_POST['tele'];
        $dire = $_POST['dire'];
         
        

    if( valid_email($corr) ) {
         // validate input
         $valid = true;
         if (empty($cedula)) {
             $cedulaError = 'Ingrese una cédula';
             $valid = false;
         }
          
         if (empty($nomb)) {
             $nombreError = 'Ingrese un nombre';
             $valid = false;
         } 
          
         if (empty($ape1)) {
             $ape1Error = 'Ingrese apellido 1';
             $valid = false;
         }
 
         if (empty($ape2)) {
             $ape2Error = 'Ingrese apellido 2';
             $valid = false;
         }
 
         if (empty($tele)) {
             $telefonoError = 'Ingrese un telefono';
             $valid = false;
         }
 
         if (empty($dire)) {
             $direccionError = 'Ingrese una dirección';
             $valid = false;
         }
 
         if (empty($corr)) {
             $correoError = 'Ingrese un correo';
             $valid = false;
         }
          
         // insert data
         if ($valid) {
             $empleado = new Empleado();
             $empleado -> setId($id);
             $empleado -> setCedula($cedula);
             $empleado -> setNombre($nomb);
             $empleado -> setApellido1($ape1);
             $empleado -> setApellido2($ape2);
             $empleado -> setDireccion($dire);
             $empleado -> setCorreo($corr);
             $empleado -> setTelefono($tele);
 
             $empleadoBuss = new EmpleadoBusiness();
             $empleadoBuss -> actualizarEmpleado($empleado);
         }
    } else {
        header("Location: ../view/empleadoview.php?mensaje=3");
    }

         
       
    }
}else if (isset($_POST['leer'])) {
		
    }
    
    function valid_email($email){
    // SET INITIAL RETURN VARIABLES

        $emailIsValid = FALSE;

    // MAKE SURE AN EMPTY STRING WASN'T PASSED

        if (!empty($email))
        {
            // GET EMAIL PARTS

                $domain = ltrim(stristr($email, '@'), '@') . '.';
                $user   = stristr($email, '@', TRUE);

            // VALIDATE EMAIL ADDRESS

                if
                (
                    !empty($user) &&
                    !empty($domain) &&
                    checkdnsrr($domain)
                )
                {$emailIsValid = TRUE;}
        }

    // RETURN RESULT

        return $emailIsValid;
}

  
?>

