<?php 
	include_once 'data.php';
	include '../domain/Vehiculo.php';

	class VehiculoData extends Database{

        public function VehiculoData(){}
            

        public function validarDuplicado($placa){
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = 'select count(*) as total from tbvehiculo where vehiculoplaca = ?';
            $result = $pdo->prepare($consulta);
            $result->bindParam(1,$placa,PDO::PARAM_INT);
            $result->execute();

            if($result->fetchColumn()==0){ //si no existe el dato lo inserto
                    return false;
            }else{ //si ya existe el dato lo redirecciono para mostrar el mensaje
                    return true;
            }
        }


		public function insertarVehiculo($vehiculo){

			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
            $veData = new VehiculoData();
            $stmt = $pdo ->prepare("SELECT MAX(vehiculoid) AS vehiculoid  FROM tbvehiculo");
            $stmt -> execute();

            $nextId = 1;
        	
        	if($row = $stmt->fetch()){
        		$nextId = $row[0]+1;
            }

            $mensaje = "El vehiculo ya se encuentra registrada.";

            $sql = "INSERT INTO `tbvehiculo`(`vehiculoid`, `vehiculoplaca`, `vehiculomarca`, `vehiculomodelo`, `vehiculotipo`, `vehiculocapacidad`, `vehiculoestado`,`vehiculoempleadoid`) VALUES (?,?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);

            if($veData->validarDuplicado($vehiculo->getPlaca())==true){
                header("Location: ../view/vehiculocrud.php?mensaje=$mensaje");
            }else{ 
                $q->execute(array($nextId, $vehiculo -> getPlaca(), $vehiculo -> getMarca(), $vehiculo -> getModelo(), $vehiculo -> getTipo(), $vehiculo -> getCapacidad(), $vehiculo -> getEstado(), $vehiculo -> getEmpleadoId()));
            }
            Database::desconectar();
            header("Location: ../view/vehiculocrud.php");
        }
        

		public function actualizarVehiculo($vehiculo){

			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE tbvehiculo SET vehiculoplaca=?,vehiculomarca=?,vehiculomodelo=?,vehiculotipo=?,vehiculocapacidad=?,vehiculoestado=?,vehiculoempleadoid=? WHERE vehiculoid = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($vehiculo->getPlaca(), $vehiculo -> getMarca(), $vehiculo -> getModelo(), $vehiculo -> getTipo(), $vehiculo -> getCapacidad(), $vehiculo -> getEstado(), $vehiculo -> getEmpleadoId(),$vehiculo->getIdvehiculo()));
            Database::desconectar();
            header("Location: ../view/vehiculocrud.php");
			
		}

		public function eliminarVehiculo($idvehiculo){
			
			// delete data
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM tbvehiculo WHERE vehiculoid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($idvehiculo));
        Database::desconectar();
        header("Location: ../view/vehiculocrud.php");

		}

		public function obtenerVehiculos($vehiculo){
			
		}


       


	}

?>

