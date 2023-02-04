<?php
error_reporting(0);
include_once 'data.php';
	include '../domain/cliente.php';

	class ClienteData extends Database{

		public function ClienteData(){}


        public function insertar(){

        $retorno = 0;
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //DECLARAR OBJETO
        /*$medicion = new Medicion();
       
        $medicion -> setAnio(2099);
        $medicion -> setMedidorID(999999);*/
        //DECLARAR SENTENCIA SQL
        $sql = 'INSERT INTO `tbcliente`(`clienteid`, `clientecedula`, `clientenombre`, `clienteapellido1`, `clienteapellido2`, `clientedireccion`, `clientecorreo`, `clientetelefono`, `clientemedidor`, `clientecasas`, `clientepropiedades`, `clientetipo`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
        //AGREGAR
        $q = $pdo->prepare($sql);
        $q->execute(array(9999,9999, "Prueba", "Prueba","Prueba","Prueba","Prueba",9999,9999,9999,9999,1));
        //SI AGREGO QUE RETORNE 1
        //DE LO CONTRARIO 0
        if( ($q->rowCount()>0)){
            $retorno = 1;
            return $retorno;
        }else{
            $retorno = 0;
            return $retorno;
        }
        

       return $retorno;
        

    }

    public function actualizar(){

        $retorno = 0;
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //DECLARAR OBJETO
       
       $update = 'UPDATE `tbcliente` SET `clientecedula`=:clientecedula,`clientenombre`=:clientenombre,`clienteapellido1`=:clienteapellido1,`clienteapellido2`=:clienteapellido2,`clientedireccion`=:clientedireccion,`clientecorreo`=:clientecorreo,`clientetelefono`=:clientetelefono,`clientemedidor`=:clientemedidor,`clientecasas`=:clientecasas,`clientepropiedades`=:clientepropiedades,`clientetipo`=:clientetipo WHERE  `clienteid` =:clienteid';
           
            $cedula = 9999;
            $nomb = "Prueba1";
            $ape1 = "Prueba2";
            $ape2 = "Prueba3";
            $dire = "Direccion";
            $corr = 9999;
            $tele = 9999;
            $medi = 9999;
            $casas = 9999;
            $propi = 9999;
            $tipo = 2;
            $idcli = 9999;

            $q = $pdo->prepare($update);
            $q -> bindParam(':clientecedula', $cedula, PDO::PARAM_STR);
            $q -> bindParam(':clientenombre',$nomb , PDO::PARAM_STR);
            $q -> bindParam(':clienteapellido1',$ape1 , PDO::PARAM_STR);
            $q -> bindParam(':clienteapellido2', $ape2, PDO::PARAM_STR);
            $q -> bindParam(':clientedireccion', $dire, PDO::PARAM_STR);
            $q -> bindParam(':clientecorreo',$corr , PDO::PARAM_STR);
            $q -> bindParam(':clientetelefono',$tele , PDO::PARAM_STR);
            $q -> bindParam(':clientemedidor',$medi , PDO::PARAM_STR);
            $q -> bindParam(':clientecasas',$casas , PDO::PARAM_STR);
            $q -> bindParam(':clientepropiedades',$propi , PDO::PARAM_STR);
            $q -> bindParam(':clientetipo',$tipo , PDO::PARAM_STR);
            $q -> bindParam(':clienteid',$idcli , PDO::PARAM_STR);
            $q -> execute();
    
        //SI AGREGO QUE RETORNE 1
        //DE LO CONTRARIO 0
        if( ($q->rowCount()>0)){
            $retorno = 1;
            return $retorno;
        }else{
            $retorno = 0;
            return $retorno;
        }
        

       return $retorno;
        

    }
   

   public function eliminar(){

        $retorno = 0;
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //DECLARAR OBJETO
        /*$medicion = new Medicion();
        
        $medicion -> setAnio(2099);
        $medicion -> setMedicionID(9999);*/
        $id = 9999;
        //DECLARAR SENTENCIA SQL
       $sql = "DELETE FROM tbcliente WHERE clienteid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));

    
        //SI AGREGO QUE RETORNE 1
        //DE LO CONTRARIO 0
        if( ($q->rowCount()>0)){
            $retorno = 1;
            return $retorno;
        }else{
            $retorno = 0;
            return $retorno;
        }
        

       return $retorno;
        

    }

        public function getMaxID($pdo,$sql){

        $stmt = $pdo ->prepare($sql);
        $stmt -> execute();
        $cont = 1;
        if($row = $stmt->fetch()){
                $cont = $row[0]+1;
            }
        return $cont;
    }


            
		public function insertarCliente($cliente){
            
            $cd = new ClienteData();
            $pdo = Database::conectar();
            $pdo -> exec("set names utf8");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo ->prepare("SELECT MAX(clienteid) AS clienteid  FROM tbcliente");
            $stmt -> execute();

            $nextId = 1;
        	
        	if($row = $stmt->fetch()){
        		$nextId = $row[0]+1;
        	}
            
            $medidorrepetido = $cd -> validarMedidor($cliente -> getNumeroMedidor());
            if($medidorrepetido == false){

                $sql = "INSERT INTO `tbcliente`( `clienteid`,`clientecedula`, `clientenombre`, `clienteapellido1`, `clienteapellido2`,`clientedireccion`,`clientecorreo`,`clientetelefono`,`clientemedidor`,`clientecasas`,`clientetipo`,`clienteestado`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($nextId, $cliente -> getCedula(), $cliente -> getNombre(), $cliente ->getApellido1(), $cliente -> getApellido2(),$cliente -> getDireccion(), $cliente -> getCorreo(),  $cliente -> getTelefono(),$cliente -> getNumeroMedidor(),$cliente -> getCasasEnlazadas(), $cliente -> getTipoCliente(),$cliente->getEstado()));
                Database::desconectar();
                header("Location: ../view/clienteview.php?mensaje=1");

            }else{
                
                    header("Location: ../view/clienteview.php?mensaje=2");
                
            }
           
        }
        
        public function validarMedidor($medidor){

            //select if(u.Febrero is null, 0, 1) Febrero from tbmediciongeneral u limit 10
            //TRUE; select if(`Enero` is null, 0, 1) from tbmediciongeneral WHERE AnioActual = 2018
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
            $sql = 'select count(*) from tbcliente WHERE  clientemedidor=:clientemedidor';
            $stm = $pdo->prepare($sql);
           
            $stm->bindParam(':clientemedidor', $medidor);
            $stm->execute();
            $res = $stm->fetchColumn();
    
            if ($res > 0) {
                return true;
            }
            else {
                return false;
            }
            
    
           
        }


		/*public function actualizarCliente($cliente){

			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE tbcliente SET clientecedula=?,clientenombre=?,clienteapellido1=?,clienteapellido2=?,clientedireccion=?,clientecorreo=?,clientetelefono=?,clientemedidor=? WHERE clienteid = ?";
            // $sql = "UPDATE customers  set name = ?, email = ?, mobile =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($cliente -> getCedula(), $cliente -> getNombre(), $cliente ->getApellido1(), $cliente -> getApellido2(), $cliente -> getDireccion(), $cliente -> getCorreo(), $cliente -> getTelefono(),$cliente -> getNumeroMedidor(), $cliente -> getIdcliente()));
            Database::desconectar();
            header("Location: ../view/clienteview.php");
			
        }*/
        


        public function actualizarCliente($cliente){

            $cd = new ClienteData();
			$pdo = Database::conectar();
            $pdo -> exec("set names utf8");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            $update = 'UPDATE `tbcliente` SET `clientecedula`=:clientecedula,`clientenombre`=:clientenombre,`clienteapellido1`=:clienteapellido1,`clienteapellido2`=:clienteapellido2,`clientedireccion`=:clientedireccion,`clientecorreo`=:clientecorreo,`clientetelefono`=:clientetelefono,`clientecasas`=:clientecasas,`clientetipo`=:clientetipo, `clienteestado`=:clienteestado WHERE  `clienteid` =:clienteid';
            

            $medidorrepetido = $cd -> validarMedidor($cliente -> getNumeroMedidor());
            if($medidorrepetido==false){
                
                $cedula = $cliente->getCedula();
                $nomb = $cliente->getNombre();
                $ape1 = $cliente->getApellido1();
                $ape2 = $cliente->getApellido2();
                $dire = $cliente->getDireccion();
                $corr = $cliente->getCorreo();
                $tele = $cliente->getTelefono();
               // $medi = $cliente -> getNumeroMedidor();
                $casas = $cliente -> getCasasEnlazadas();
               // $propi = $cliente -> getNumPropiedades();
                $tipo = $cliente -> getTipoCliente();
                $idcli = $cliente -> getIdcliente();
                $estado = $cliente->getEstado();
                $q = $pdo->prepare($update);
                $q -> bindParam(':clientecedula', $cedula, PDO::PARAM_STR);
                $q -> bindParam(':clientenombre',$nomb , PDO::PARAM_STR);
                $q -> bindParam(':clienteapellido1',$ape1 , PDO::PARAM_STR);
                $q -> bindParam(':clienteapellido2', $ape2, PDO::PARAM_STR);
                $q -> bindParam(':clientedireccion', $dire, PDO::PARAM_STR);
                $q -> bindParam(':clientecorreo',$corr , PDO::PARAM_STR);
                $q -> bindParam(':clientetelefono',$tele , PDO::PARAM_STR);
              //  $q -> bindParam(':clientemedidor',$medi , PDO::PARAM_STR);
                $q -> bindParam(':clientecasas',$casas , PDO::PARAM_STR);
               // $q -> bindParam(':clientepropiedades',$propi , PDO::PARAM_STR);
                $q -> bindParam(':clientetipo',$tipo , PDO::PARAM_STR);
                $q -> bindParam(':clienteestado',$estado , PDO::PARAM_STR);
                $q -> bindParam(':clienteid',$idcli , PDO::PARAM_STR);
                $q -> execute();
       
                Database::desconectar();
                header("Location: ../view/clienteview.php?mensaje=4");
            }else{
                header("Location: ../view/clienteview.php?mensaje=2");
            }
           
			
        }


        public function actualizarMedidor($cliente){

            $cd = new ClienteData();
			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            $update = 'UPDATE `tbcliente` SET `clientemedidor`=:clientemedidor WHERE  `clienteid` =:clienteid';
            

            $medidorrepetido = $cd -> validarMedidor($cliente -> getNumeroMedidor());
            if($medidorrepetido==false){
                
                
               
                $medi = $cliente -> getNumeroMedidor();
                
               
                $idcli = $cliente -> getIdcliente();
                
                $q = $pdo->prepare($update);
            
                $q -> bindParam(':clientemedidor',$medi , PDO::PARAM_STR);
                
                $q -> bindParam(':clienteid',$idcli , PDO::PARAM_STR);
                $q -> execute();
       
                Database::desconectar();
                header("Location: ../view/clienteview.php?mensaje=5");
            }else{
                header("Location: ../view/clienteview.php?mensaje=2");
            }
           
			
        }
        


		public function eliminarCliente($id){
			
			// delete data
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM tbcliente WHERE clienteid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::desconectar();
       // header("Location: ../view/clienteview.php");

		}

		public function obtenerClientes($cliente){
			
		}


	}

?>