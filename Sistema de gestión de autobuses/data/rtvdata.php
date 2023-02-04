<?php 
	include_once 'data.php';
	include '../domain/RTV.php';

	class rtvData extends Database{

		public function rtvData(){}


        public function actualizarRTVPendiente($RTV){

            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `tbrtv` SET `rtvfechavencimiento`=:rtvfechavencimiento,`rtvmontobase`=:rtvmontobase,`rtvmontoacumulado`=:rtvmontoacumulado,`rtvestado`=:rtvestado WHERE rtvid = :rtvid";

            $fecha = $RTV -> getFechaVencimiento();
            $montoBase = $RTV -> getMontoBase();
            $montoAcumulado = $RTV -> getMontoAcumulado();
            $estado = $RTV -> getEstado();
            $rtvID = $RTV -> getRTVID();

            $q = $pdo->prepare($sql);
            $q -> bindParam(':rtvfechavencimiento', $fecha, PDO::PARAM_STR);
            $q -> bindParam(':rtvmontobase', $montoBase, PDO::PARAM_INT);
            $q -> bindParam(':rtvmontoacumulado', $montoAcumulado, PDO::PARAM_INT);
            $q -> bindParam(':rtvestado', $estado, PDO::PARAM_INT);
            $q -> bindParam(':rtvid', $rtvID, PDO::PARAM_INT);
            $q -> execute();
            Database::desconectar();
            header("Location: ../view/vehiculocrud.php");

        }

        public function actualizarHistorico($vehiculo,$fecha){

            $pdo = Database::conectar();

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'UPDATE tbrtvhistorico SET rtvhistoricoanio=:anio WHERE rtvhistoricovehiculoid =:id';


            $sql2 = "SELECT YEAR('{$fecha}')";
            $stm = $pdo ->prepare($sql2);
            $stm -> execute();
            $result = $stm->fetch(PDO::FETCH_NUM);
            $anio = $result[0];

            $q = $pdo->prepare($sql);
            $q -> bindParam(':anio', $anio, PDO::PARAM_INT);

            $q -> bindParam(':id', $vehiculo, PDO::PARAM_INT);
            $q -> execute();
            Database::desconectar();
            //header("Location: ../view/vehiculocrud.php");


        }

        public function actualizarRTVAprobado($RTV){
            $rtvData = new rtvData();
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `tbrtv` SET `rtvfechavencimiento`=:rtvfechavencimiento,`rtvmontobase`=:rtvmontobase,`rtvmontoacumulado`=:rtvmontoacumulado,`rtvestado`=:rtvestado WHERE rtvvehiculoid = :rtvvehiculoid";

            $fecha = $RTV -> getFechaVencimiento();
            $montoBase = $RTV -> getMontoBase();
            $montoAcumulado = 0;
            $estado = $RTV -> getEstado();
            $rtvID = $RTV -> getVehiculoID();

            $q = $pdo->prepare($sql);
            $q -> bindParam(':rtvfechavencimiento', $fecha, PDO::PARAM_STR);
            $q -> bindParam(':rtvmontobase', $montoBase, PDO::PARAM_INT);
            $q -> bindParam(':rtvmontoacumulado', $montoAcumulado, PDO::PARAM_INT);
            $q -> bindParam(':rtvestado', $estado, PDO::PARAM_INT);
            $q -> bindParam(':rtvvehiculoid', $rtvID, PDO::PARAM_INT);
            $q -> execute();
            Database::desconectar();
            $rtvData -> actualizarHistorico($RTV->getVehiculoID(),$fecha);
            header("Location: ../view/vehiculocrud.php");

        }

		public function agregarHistorico($vehiculo,$empleado){

			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `tbrtvhistorico`(`rtvhistoricoid`, `rtvhistoricovehiculoid`, `rtvhistoricoanio`, `rtvempleadoid`) VALUES (?,?,?,?)";

			$sql2 = "SELECT EXTRACT(YEAR FROM rtvfechavencimiento) FROM tbrtv WHERE rtvvehiculoid = '".  $vehiculo ."'";
			$stm = $pdo ->prepare($sql2);
			$stm -> execute();
			$result = $stm->fetch(PDO::FETCH_ASSOC);
            $anio = $result['EXTRACT(YEAR FROM rtvfechavencimiento)'];

			$stmt = $pdo ->prepare("SELECT MAX(rtvhistoricoid) AS rtvhistoricoid FROM tbrtvhistorico");
			$stmt -> execute();
            $nextId = 1;
            
            if($row = $stmt->fetch()){
                $nextId = $row[0]+1;
            }

              $q = $pdo->prepare($sql);
            $q->execute(array($nextId, $vehiculo,$anio,$empleado));
            Database::desconectar();
           // header("Location: ../view/rtvview.php");


		}

		public function insertarRTV($rtv){

			$rtvData = new rtvData();
			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO `tbrtv`(`rtvid`, `rtvempleadoid`, `rtvvehiculoid`, `rtvfechavencimiento`, `rtvmontobase`, `rtvmontoacumulado`, `rtvestado`) VALUES (?,?,?,?,?,?,?)";

            //OBTENIENDO ULTIMO ID DE LA TABLA RTV
            $stmt = $pdo ->prepare("SELECT MAX(rtvid) AS rtvid FROM tbrtv");
            $stmt -> execute();
            $nextId = 1;
            
            if($row = $stmt->fetch()){
                $nextId = $row[0]+1;
            }


            //OBTENIENDO ID DEL EMPLEADO CON BASE A LA CEDULA
             $stmt2 = $pdo -> prepare("SELECT `empleadoid`FROM `tbempleado` WHERE empleadocedula = ?");
             $stmt2 -> execute(array($rtv->getEmpleadoID()));
             $data = $stmt2 ->fetch(PDO::FETCH_ASSOC);
             $empleadoid = $data['empleadoid'];






            $q = $pdo->prepare($sql);
            $q->execute(array($nextId, $empleadoid, $rtv->getVehiculoID(), $rtv->getFechaVencimiento(), $rtv->getMontoBase(),$rtv->getMontoAcumulado(), $rtv->getEstado()));

           $rtvData->agregarHistorico($rtv->getVehiculoID(), $empleadoid);
            Database::desconectar();
            header("Location: ../view/vehiculocrud.php");


		}

		


/*		public function actualizarRTV($rtv){

			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE tbrtv SET rtvfecharenovacion=?,rtvrepitencia=?,rtvestadoRTV=? WHERE busid = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($rtv -> getFecharenovacion(), $rtv -> getRepitencia(), $rtv -> getEstadoRTV(), $rtv -> getIdBus()));
            Database::desconectar();
            header("Location: ../view/rtvview.php");
			
		}*/

        public function eliminarHistorico($id){



        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM tbrtvhistorico WHERE rtvhistoricovehiculoid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::desconectar();
        }
		public function eliminarRTV($id){
			
			 $rtvData = new rtvData();
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM tbrtv WHERE rtvid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::desconectar();
        $rtvData -> eliminarHistorico($id);
        header("Location: ../view/vehiculocrud.php");

		}

		public function obtenerRTV($rtv){
			
		}


	}

?>
