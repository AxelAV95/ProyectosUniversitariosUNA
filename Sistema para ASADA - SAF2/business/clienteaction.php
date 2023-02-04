<?php 

	include 'clientebusiness.php';


	if (isset($_POST['actualizar'])){

    if ( !empty($_POST)) {
         // keep track validation errors

         $idcli = "";
        $cedula = "";
        $nomb = "";
        $ape1 = "";
        $ape2 = "";
        $corr = "";
        $tele = "";
        $dire = "";
        $casas = "";
        $estado = "";
        $tipo = "";
        if(isset($_POST['clientecedula']) ){
            $cedula = $_POST['clientecedula'];    
        }else{
            $cedula = "";
        }

        if(isset($_POST['clienteemail'])){
            
            if(valid_email($_POST['clienteemail'])){
                $corr = $_POST['clienteemail'];    
            }else{
                header("Location: ../view/clienteview.php?mensaje=3");
            }
        }else{
            $corr = "";
        }

        if(isset( $_POST['clientetelefono'])){
            $tele = $_POST['clientetelefono'];
        }else{
            $tele = "";
        }

        // keep track post values
        $idcli = $_POST['clienteid'];
        
        $nomb = $_POST['clientenombre'];
        $ape1 = $_POST['clienteapellido1'];
        $ape2 = $_POST['clienteapellido2'];
        
        
        $dire = $_POST['clientedireccion'];
       // $medi = $_POST['clientemedidor'];
        $casas = $_POST['clientecasasenlazadas'];
        $estado = $_POST['clienteestado'];
        $tipo = $_POST['clientetipo'];

        $cliente = new Cliente();
            $cliente -> setCedula($cedula);
            $cliente -> setNombre($nomb);
            $cliente -> setApellido1($ape1);
            $cliente -> setApellido2($ape2);
            $cliente -> setDireccion($dire);
            $cliente -> setCorreo($corr);
            $cliente -> setTelefono($tele);
            //$cliente -> setNumeroMedidor($medi);
            $cliente -> setCasasEnlazadas($casas);
            $cliente->setEstado($estado);
            $cliente -> setTipoCliente($tipo);
            $cliente -> setIdcliente($idcli);
            
            $cliBuss = new ClienteBusiness();
            $cliBuss -> actualizarCliente($cliente);

         


            
        
    } 

   
} else if (isset($_POST['eliminar'])) {

    if ( !empty($_POST)) {
        // keep track post values
        $idcli = $_POST['id'];
         
        $cliBuss = new ClienteBusiness();
        $cliBuss -> eliminarCliente($idcli);
         
    }

   
} else if (isset($_POST['insertar'])) {

    

     if(empty($_POST['clientemedidor']) || empty($_POST['clientecasasenlazadas'])  ){


        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo ->prepare("SELECT MAX(clienteid) AS clienteid FROM tbcliente");
            $stmt -> execute();

            $nextId=1;
            
            if($row = $stmt->fetch()){
                $nextId = $row[0]+1;
             //echo '<br>';
            // echo decbin($nextId);
            }
            





          // keep track post values
       echo $cedula = "";
       echo $nomb = $_POST['clientenombre'];
        echo $ape1 = $_POST['clienteapellido1'];
        echo  $ape2 = $_POST['clienteapellido2'];
        echo $corr = $_POST['clienteemail'];
        echo $tele = "";
        echo $dire = $_POST['clientedireccion'];
        echo $medi = $nextId;
        
        
        echo $casas = 0;
        echo $estado = $_POST['clienteestado'];
        //$propi = $_POST['propi'];
        echo $tipo = $_POST['clientetipo'];
     }else if(isset($_POST['clientecedula']) || isset($_POST['clientetelefono']) || isset($_POST['clientemedidor']) || isset($_POST['clientecasasenlazadas']) ){

          // keep track post values
        $cedula = $_POST['clientecedula'];
        $nomb = $_POST['clientenombre'];
        $ape1 = $_POST['clienteapellido1'];
        $ape2 = $_POST['clienteapellido2'];
        $corr = $_POST['clienteemail'];
        $tele = $_POST['clientetelefono'];
        $dire = $_POST['clientedireccion'];
        $medi = $_POST['clientemedidor'];
        $casas = $_POST['clientecasasenlazadas'];
        $estado = $_POST['clienteestado'];
        //$propi = $_POST['propi'];
        $tipo = $_POST['clientetipo'];

    }

     

   
        // insert data
            $cliente = new Cliente();
            $cliente -> setCedula($cedula);
            $cliente -> setNombre($nomb);
            $cliente -> setApellido1($ape1);
            $cliente -> setApellido2($ape2);
            $cliente -> setDireccion($dire);
            $cliente -> setCorreo($corr);
            $cliente -> setTelefono($tele);
            $cliente -> setNumeroMedidor($medi);
            $cliente -> setCasasEnlazadas($casas);
            //$cliente -> setNumPropiedades($propi);
            $cliente -> setTipoCliente($tipo);
            $cliente->setEstado($estado);
            $cliBuss = new ClienteBusiness();
            $cliBuss -> insertarCliente($cliente);
        // keep track validation errors
         
         
       
         
        
    
}else if (isset($_POST['leer'])) {

   
}else if (isset($_POST['actualizarmedidor'])){

    if ( !empty($_POST)) {
        $cliente = new Cliente();
        $medi= $_POST['clientemedidor'];
    $idcli = $_POST['clienteid'];


    $cliente -> setNumeroMedidor($medi);
    $cliente -> setIdcliente($idcli);
    $cliBuss = new ClienteBusiness();
    $cliBuss -> actualizarMedidor($cliente);

    }

   

    




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

  function getMaxID(){

    $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo ->prepare("SELECT MIN(clientemedidor) AS clienteid FROM tbcliente");
            $stmt -> execute();

            $nextId =777771;
            
            if($row = $stmt->fetch()){
                $nextId = $row[0]+1;
            }

        return $nextId;
    }

//UPDATE `myTable` SET `myField` = null




/*SQL
    set @rowid:=9000000000;
update tbcliente set clienteid=@rowid:=@rowid+1 ;


*/