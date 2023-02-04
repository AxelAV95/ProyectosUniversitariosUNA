<?php 
	include_once 'data.php';
	include '../domain/Empleado.php';

	class EmpleadoData extends Database{

		public function EmpleadoData(){}

        public function actualizarLicencias($val1, $val2, $val3){

                $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `tblicencia` SET `licenciatipolicencia`=:licenciatipolicencia,`licenciafechavencimiento`=:licenciafechavencimiento WHERE  `licenciaempleadoid`=:licenciaempleadoid";


            $q = $pdo->prepare($sql);
            $q -> bindParam(':licenciatipolicencia', $val1, PDO::PARAM_STR);
            $q -> bindParam(':licenciafechavencimiento',$val2 , PDO::PARAM_STR);
            $q -> bindParam(':licenciaempleadoid',$val3 , PDO::PARAM_STR);
            
            $q -> execute();
            
            Database::desconectar();
            header("Location: ../view/empleadocrud.php?mensaje=Licencias actualizadas con éxito.");

        }

        //INSERTA LICENCIAS EN LA TABLA tblicencia
        public function insertarLicenciaEmpleado($empleadoid, $licencias, $fechas){
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo ->prepare("SELECT MAX(licenciaid) AS licenciaid  FROM tblicencia");
             $stmt -> execute();
             $nextId = 1;
            
            if($row = $stmt->fetch()){
                $nextId = $row[0]+1;
            }

            $sql = "INSERT INTO `tblicencia`(`licenciaid`, `licenciaempleadoid`, `licenciatipolicencia`, `licenciafechavencimiento`) VALUES (?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nextId,$empleadoid,$licencias,$fechas));

            return $nextId;
            Database::desconectar();
           // header("Location: ../view/empleadocrud.php");
        }

        public function validarEmpleadoDuplicado($cedula){
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = 'select count(*) as total from tbempleado where empleadocedula = ?';
            $result = $pdo->prepare($consulta);
            $result->bindParam(1,$cedula,PDO::PARAM_INT);
            $result->execute();

            if($result->fetchColumn()==0){ //si no existe el dato lo inserto
                 return false;
            }else{ //si ya existe el dato lo redirecciono para mostrar el mensaje
                 return true;
            }
        }
        //INSERTA EMPLEADO
		public function insertarEmpleado($empleado){
            $empData = new EmpleadoData();
			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $mensaje = "El empleado ya se encuentra registrado.";
            if($empData->validarEmpleadoDuplicado($empleado->getCedula())==true){
                header("Location: ../view/empleadocrud.php?mensaje=$mensaje");
            }else{
                $stmt = $pdo ->prepare("SELECT MAX(empleadoid) AS empleadoid  FROM tbempleado");
            $stmt2 = $pdo ->prepare("SELECT `empleadolicenciaid` FROM `tbempleadolicencia` WHERE `empleadotipolicencia` = ?");
            $stmt3 = $pdo -> prepare("SELECT `tipoempleadoid`FROM `tbtipoempleado` WHERE tipoempleadonombre = ?");

            $stmt -> execute();
          //  $stmt2 -> execute(array($empleado->getTipoLicencia()));
            $stmt3 -> execute(array($empleado->getTipoEmpleado()));
           
             
            $data = $stmt2->fetch(PDO::FETCH_ASSOC);
            $data2 = $stmt3 ->fetch(PDO::FETCH_ASSOC);
            $tipoLic = $data['empleadolicenciaid'];
            $idTipo = $data2['tipoempleadoid'];
            $nextId = 1;
            
            if($row = $stmt->fetch()){
                $nextId = $row[0]+1;
            }
            $licenciaid = $empData ->insertarLicenciaEmpleado($nextId,$empleado->getTipoLicencia(),$empleado -> getFechaVencimiento());
            
            $sql = "INSERT INTO `tbempleado`(`empleadoid`, `empleadocedula`, `empleadonombre`, `empleadoapellido1`, `empleadoapellido2`, `empleadotelefono`, `empleadodireccion`, `empleadocuentabancaria`,`empleadolicenciaid`, `empleadotipo`) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nextId, $empleado -> getCedula(), $empleado -> getNombre(), $empleado -> getApellido1(), $empleado -> getApellido2(), $empleado -> getTelefono(), $empleado -> getDireccion(), $empleado -> getCuentaBancaria(),  $licenciaid, $idTipo));
            Database::desconectar();
            header("Location: ../view/empleadocrud.php?mensaje=Empleado registrado con éxito.");

            }

			


		}

		

        //ACTUALIZA EMPLEADO
		public function actualizarEmpleado($empleado){

            
			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //  $sql = "UPDATE tb_empleados SET empleadocedula=?,empleadonombre=?,empleadoapellido1=?,empleadoapellido2=?,empleadotelefono=?,empleadodireccion=?,empleadocuentabancaria=?,`empleadolicenciaid`=?,`empleadotipo`=? WHERE empleadoid = ?";

            $update = 'UPDATE `tbempleado` SET `empleadocedula`=:empleadocedula,`empleadonombre`=:empleadonombre,`empleadoapellido1`=:empleadoapellido1,`empleadoapellido2`=:empleadoapellido2,`empleadotelefono`=:empleadotelefono,`empleadodireccion`=:empleadodireccion,`empleadocuentabancaria`=:empleadocuentabancaria,`empleadotipo`=:empleadotipo WHERE  `empleadoid` =:empleadoid';

            /*$stmt1 = "UPDATE `tb_empleados` SET `empleadocedula`=?,`empleadonombre`=?,`empleadoapellido1`=?,`empleadoapellido2`=?,`empleadotelefono`=?,`empleadodireccion`=?,`empleadocuentabancaria`=?,`empleadolicenciaid`=?,`empleadotipo`=? WHERE `empleadoid` = ?";*/
           // $stmt2 = $pdo ->prepare("SELECT `empleadolicenciaid` FROM `tbempleadolicencia` WHERE `empleadotipolicencia` = ?");
             //$q = $pdo->prepare($sql);
             $stmt3 = $pdo -> prepare("SELECT `tipoempleadoid`FROM `tbtipoempleado` WHERE tipoempleadonombre = ?");
            // $stmt2 -> execute(array($empleado->getTipoLicencia()));
             $stmt3 -> execute(array($empleado->getTipoEmpleado()));
           
           
             
            //$data = $stmt2->fetch(PDO::FETCH_ASSOC);
            $data2 = $stmt3 ->fetch(PDO::FETCH_ASSOC);
            $cedula = $empleado->getCedula();
            $nombre = $empleado->getNombre();
            $ape1 = $empleado->getApellido1();
            $ape2 = $empleado->getApellido2();
            $tel = $empleado->getTelefono();
            $dir = $empleado->getDireccion();
            $cuenta = $empleado->getCuentaBancaria();
            $id = $empleado -> getIdEmpleado();
          //  $tipoLic = $data['empleadolicenciaid'];
            $idTipo = $data2['tipoempleadoid'];

           // $sql = "UPDATE customers  set name = ?, email = ?, mobile =? WHERE id = ?";
            $q = $pdo->prepare($update);
            $q -> bindParam(':empleadocedula', $cedula, PDO::PARAM_STR);
            $q -> bindParam(':empleadonombre',$nombre , PDO::PARAM_STR);
            $q -> bindParam(':empleadoapellido1',$ape1 , PDO::PARAM_STR);
            $q -> bindParam(':empleadoapellido2', $ape2, PDO::PARAM_STR);
            $q -> bindParam(':empleadotelefono', $tel, PDO::PARAM_STR);
            $q -> bindParam(':empleadodireccion',$dir , PDO::PARAM_STR);
            $q -> bindParam(':empleadocuentabancaria',$cuenta , PDO::PARAM_STR);
           // $q -> bindParam(':empleadolicenciaid', $tipoLic, PDO::PARAM_STR);
            $q -> bindParam(':empleadotipo', $idTipo, PDO::PARAM_STR);
            $q -> bindParam(':empleadoid',$id , PDO::PARAM_STR);
            $q -> execute();
            /*$q->execute(array($empleado -> getCedula(), $empleado -> getNombre(), $empleado -> getApellido1(), $empleado -> getApellido2(), $empleado -> getTelefono(), $empleado -> getDireccion(), $empleado -> getCuentaBancaria(), $tipoLic,
                $idTipo, $empleado -> getIdEmpleado()));*/
            Database::desconectar();
            header("Location: ../view/empleadocrud.php?mensaje=Empleado actualizado con éxito.");
			
		}

        //ELIMINAR EMPLEADO
		public function eliminarEmpleado($id){
			
			// delete data
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM tbempleado WHERE empleadoid = ?";
        $sql2 ="DELETE FROM `tblicencia` WHERE licenciaempleadoid = ?";
        $q = $pdo->prepare($sql);
        $q2 = $pdo->prepare($sql2);
        $q->execute(array($id));
        $q2->execute(array($id));
        Database::desconectar();
        header("Location: ../view/empleadocrud.php?mensaje=Empleado eliminado con éxito.");

		}

		public function obtenerEmpleados($empleado){
			
		}


	}

?>


<?php 

	

?>
