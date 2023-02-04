<?php 
	include_once 'data.php';
	include '../domain/Mantenimiento.php';

	class MantenimientoData extends Database{

        public function MantenimientoData(){}
            


            public function validar($id){
                $pdo = Database::conectar();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $consulta = 'select count(*) as total from tbmantenimiento where mantenimientovehiculoid = ?';
                $result = $pdo->prepare($consulta);
                $result->bindParam(1,$id,PDO::PARAM_INT);
                $result->execute();
    
                if($result->fetchColumn()==0){ //si no existe el dato lo inserto
                     return false;
                }else{ //si ya existe el dato lo redirecciono para mostrar el mensaje
                     return true;
                }
            }

        public function actualizarHistorico($bus, $empleado,$fecha1,$fecha2,$mantid){
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'UPDATE `tbreparacionhistorico` SET `reparacionhistoricoempleadoid`=?,`reparacionhistoricobusid`=?,`reparacionhistoricofecha`=? WHERE `reparacionmantenimientoid` = ?';

            $q = $pdo->prepare($sql);
            $q->execute(array($empleado,$bus,$fecha1."-".$fecha2,$mantid));

            Database::desconectar();


        }

        public function insertarHistorico($bus,$empleado, $fecha1, $fecha2,$mantid){
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'INSERT INTO `tbreparacionhistorico`(`reparacionhistoricoid`, `reparacionhistoricoempleadoid`, `reparacionhistoricobusid`, `reparacionhistoricofecha`, `reparacionmantenimientoid`) VALUES (?,?,?,?,?)';

            $stmt = $pdo ->prepare("SELECT MAX(reparacionhistoricoid) AS reparacionhistoricoid  FROM tbreparacionhistorico");

            
            $stmt -> execute();
            $nextId = 1;
            if($row = $stmt->fetch()){
                $nextId = $row[0]+1;
            }


            $q = $pdo->prepare($sql);

            $q->execute(array($nextId, $empleado,$bus, $fecha1."-".$fecha2,$mantid));

            Database::desconectar();


        }

        public function insertarMantenimiento($mantenimiento){
            $manData = new MantenimientoData();
			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if($manData -> validar($mantenimiento -> getVehiculoid())==true){
				header("Location: ../view/mantenimientocrud.php?mensaje=Ya existe el bus en mantenimiento");
			}else{
            $stmt = $pdo ->prepare("SELECT MAX(mantenimientoid) AS mantenimientoid  FROM tbmantenimiento");

        	//$stmt2 = $pdo -> prepare("SELECT `rutacodigo`FROM `tbruta` WHERE rutacodigo = ?");
           // $stmt -> execute();
            //$stmt2 -> execute(array($mantenimiento->getMantenimientoid()));
             
            //$data = $stmt2->fetch(PDO::FETCH_ASSOC);
            //$rutaTarifaRuta = $data['rutacodigo'];
            $stmt -> execute();
        	$nextId = 1;
        	if($row = $stmt->fetch()){
        		$nextId = $row[0]+1;
            }

			$sql = "INSERT INTO `tbmantenimiento`( `mantenimientoid`,`mantenimientovehiculoid`,`mantenimientoempleadoid`, `mantenimientofechainicio`, `mantenimientofechafin`,`mantenimientocostounitario`,`mantenimientodetallecostounitario`,`mantenimientocostototal`,`mantenimientofrenos`,`mantenimientocarroceria`,`mantenimientomotor`,`mantenimientorotulasuspension`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);

            $q->execute(array($nextId, $mantenimiento -> getVehiculoid(),$mantenimiento -> getEmpleadoid(), $mantenimiento -> getFechaInicio(), $mantenimiento -> getFechaFin(), $mantenimiento -> getCostoUnitario(), $mantenimiento -> getDetalleCostoUnitario(), $mantenimiento -> getCostoTotal(), $mantenimiento -> getFrenos(), $mantenimiento -> getCarroceria(), $mantenimiento -> getMotor(), $mantenimiento -> getRotula()));

            $manData -> insertarHistorico($mantenimiento -> getVehiculoid(), $mantenimiento -> getEmpleadoid(), $mantenimiento -> getFechaInicio(), $mantenimiento -> getFechaFin(), $nextId);

        Database::desconectar();
        header("Location: ../view/mantenimientocrud.php?mensaje=Mantenimiento insertada con exito");
        }
    }

        public function actualizarMantenimiento($mantenimiento){
            $manData = new MantenimientoData();
			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE tbmantenimiento SET mantenimientoempleadoid=?,mantenimientofechafin=?,mantenimientocostounitario=?,mantenimientodetallecostounitario=?,mantenimientocostototal=?,mantenimientofrenos=?,mantenimientocarroceria=?,mantenimientomotor=?,mantenimientorotulasuspension=? WHERE mantenimientoid = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($mantenimiento -> getEmpleadoid(),$mantenimiento -> getFechaFin(),$mantenimiento -> getCostoUnitario(),$mantenimiento -> getDetalleCostoUnitario(),$mantenimiento -> getCostoTotal(),$mantenimiento -> getFrenos(),$mantenimiento -> getCarroceria(),$mantenimiento -> getMotor(),$mantenimiento -> getRotula(),$mantenimiento -> getMantenimientoid()));

            $manData -> actualizarHistorico($mantenimiento -> getVehiculoid(), $mantenimiento -> getEmpleadoid(), $mantenimiento -> getFechaInicio(), $mantenimiento -> getFechaFin(), $mantenimiento -> getMantenimientoid());
            Database::desconectar();


            

            header("Location: ../view/mantenimientocrud.php?mensaje=Mantenimiento actualizado con exito");
			
		}




        public function eliminarMantenimiento($id){
			
			// delete data
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM tbmantenimiento WHERE mantenimientoid = ?";
        $sql2 = "DELETE FROM `tbreparacionhistorico` WHERE `reparacionmantenimientoid` = ?";
        $q = $pdo->prepare($sql);
        $q2 = $pdo->prepare($sql2);
        $q->execute(array($id));
        $q2->execute(array($id));
        Database::desconectar();
        header("Location: ../view/mantenimientocrud.php?mensaje=Mantenimiento eliminado con exito");

		}

		public function obtenerMantenimiento($mantenimiento){
			
		}

//FUNCIONANDO
    function getInfoEmpleado($conn,$id) {
        $sql = 'SELECT * FROM `tbempleado` WHERE empleadoid = '.$id.'';
        $result = "";
        foreach ($conn->query($sql) as $row) {
            $result.= '<td>' .$row['empleadonombre']." ". $row['empleadoapellido1']." ".$row['empleadoapellido2'].'</td>';
    }

    return $result;
    
    }


     //FUNCIONANDO
    function getInfoVehiculo($conn,$id) {
        $sql = 'SELECT * FROM `tbvehiculo` WHERE vehiculoid = '.$id.'';
        $result = "";
        foreach ($conn->query($sql) as $row) {
            $result.= '<td>' .$row['vehiculoplaca'].'</td>';
    }

    return $result;
    
    }

    }

?>