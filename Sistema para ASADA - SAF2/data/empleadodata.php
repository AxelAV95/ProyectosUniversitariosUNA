<?php
error_reporting(0);
include_once 'data.php';
	include '../domain/empleado.php';

	class EmpleadoData extends Database{

		public function EmpleadoData(){}


        public function insertar(){

            $retorno = 0;
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //DECLARAR OBJETO
            
            //DECLARAR SENTENCIA SQL
            $sql = "INSERT INTO `tbempleado`( `empleadoid`,`empleadocedula`,`empleadonombre`, `empleadoapellido1`, `empleadoapellido2`,`empleadodireccion`,`empleadocorreo`,`empleadotelefono`) VALUES (?,?,?,?,?,?,?,?)";
            //AGREGAR
            $q = $pdo->prepare($sql);
            $q->execute(array(9999,9999, "Prueba", "Prueba","Prueba","Prueba","Prueba",9999));
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
        $sql = "UPDATE tbempleado SET empleadocedula =?,empleadonombre=?,empleadoapellido1=?,empleadoapellido2=?,empleadodireccion=?,empleadocorreo=?,empleadotelefono=? WHERE empleadoid = ?";
                // $sql = "UPDATE customers  set name = ?, email = ?, mobile =? WHERE id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array( 9999,"Prueba1", "Prueba2", "Prueba3", "Direccion", "Correo", 8888,9999));
        
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
       $sql = "DELETE FROM tbempleado WHERE empleadoid = ?";
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


        

            
		public function insertarEmpleado($empleado){
            
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $ed = new EmpleadoData();
            
            
			$stmt = $pdo ->prepare("SELECT MAX(empleadoid) AS empleadoid  FROM tbempleado");
            $sql = "INSERT INTO `tbempleado`( `empleadoid`,`empleadocedula`,`empleadonombre`, `empleadoapellido1`, `empleadoapellido2`,`empleadodireccion`,`empleadocorreo`,`empleadotelefono`) VALUES (?,?,?,?,?,?,?,?)";
            $stmt -> execute();

           $nextId = 1;
        	
        	if($row = $stmt->fetch()){
        		$nextId = $row[0]+1;
            }
            echo $cedularepetida = $ed->validarEmpleado($empleado -> getCedula());
             echo $emailrepetido = $ed-> validarEmail($empleado->getCorreo());
            if($cedularepetida==false && $emailrepetido == false){
                //$proximoID = $ed->getMaxID($pdo,$stmt);

                $q = $pdo->prepare($sql);
                $q->execute(array($nextId,$empleado -> getCedula(), $empleado -> getNombre(), $empleado ->getApellido1(), $empleado -> getApellido2(),$empleado -> getDireccion(), $empleado -> getCorreo(),  $empleado -> getTelefono()));
                Database::desconectar();
                header("Location: ../view/empleadoview.php?mensaje=1");

            }else{
                header("Location: ../view/empleadoview.php?mensaje=2");
            }
           


		}
		public function actualizarEmpleado($empleado){

			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE tbempleado SET empleadocedula =?,empleadonombre=?,empleadoapellido1=?,empleadoapellido2=?,empleadodireccion=?,empleadocorreo=?,empleadotelefono=? WHERE empleadoid = ?";
            // $sql = "UPDATE customers  set name = ?, email = ?, mobile =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array( $empleado -> getCedula(),$empleado -> getNombre(), $empleado ->getApellido1(), $empleado -> getApellido2(), $empleado -> getDireccion(), $empleado -> getCorreo(), $empleado -> getTelefono(),$empleado -> getId()));
            Database::desconectar();
            header("Location: ../view/empleadoview.php");
			
		}
		
		public function eliminarEmpleado($id){
			
			// delete data
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM tbempleado WHERE empleadoid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::desconectar();
      //  header("Location: ../view/empleadoview.php");

		}

		public function obtenerEmpleados($empleado){
			
        }
        
       /* public function validarEmpleado($cedula){

            //select if(u.Febrero is null, 0, 1) Febrero from tbmediciongeneral u limit 10
            //TRUE; select if(`Enero` is null, 0, 1) from tbmediciongeneral WHERE AnioActual = 2018
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql = 'select if(`empleadocedula` is null, 0, 1) from tbempleado WHERE empleadocedula = '.$cedula.' ';
            $q= $pdo->query($sql);
            echo $valor = $q->fetchColumn();
    
            if($valor == '1'){
                 $resultado = true;
            }else{
                $resultado = false;
            }
            
    
            return $resultado;
        }*/

        public function validarEmpleado($cedula){

            //select if(u.Febrero is null, 0, 1) Febrero from tbmediciongeneral u limit 10
            //TRUE; select if(`Enero` is null, 0, 1) from tbmediciongeneral WHERE AnioActual = 2018
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql = 'select count(*) from tbempleado WHERE empleadocedula =:empleadocedula';
            $stm = $pdo->prepare($sql);
            $stm->bindParam(':empleadocedula', $cedula);
           
            $stm->execute();
            $res = $stm->fetchColumn();
    
            if ($res > 0) {
                return true;
            }
            else {
                return false;
            }
            
    
           
        }

        public function validarEmail($correo){

            //select if(u.Febrero is null, 0, 1) Febrero from tbmediciongeneral u limit 10
            //TRUE; select if(`Enero` is null, 0, 1) from tbmediciongeneral WHERE AnioActual = 2018
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql = 'select count(*) from tbempleado WHERE  empleadocorreo=:empleadocorreo';
            $stm = $pdo->prepare($sql);
           
            $stm->bindParam(':empleadocorreo', $correo);
            $stm->execute();
            $res = $stm->fetchColumn();
    
            if ($res > 0) {
                return true;
            }
            else {
                return false;
            }
            
    
           
        }


	}

?>