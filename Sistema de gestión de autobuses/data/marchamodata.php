<?php
	include_once 'data.php';
	include '../domain/Marchamo.php';

	class marchamoData extends Database{

		public function marchamoData(){}

		public function validarVehiculoDuplicado($vehiculo){
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = 'select count(*) as total from tbmarchamo where marchamovehiculoid = ?';
            $result = $pdo->prepare($consulta);
            $result->bindParam(1,$vehiculo,PDO::PARAM_INT);
            $result->execute();

            if($result->fetchColumn()==0){ //si no existe el dato lo inserto
                 return false;
            }else{ //si ya existe el dato lo redirecciono para mostrar el mensaje
                 return true;
            }

            

        }

		public function insertarMarchamo($marchamo){

			$marD = new marchamoData();
			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $mensaje = "El vehiculo ya se encuentra registrado.";
            if($marD -> validarVehiculoDuplicado($marchamo -> getIdVehiculo())){
            	header("Location: ../view/marchamoview.php?mensaje=$mensaje");
            }else{
            	$sql = "INSERT INTO `tbmarchamo`(`marchamoid`, `marchamovehiculoid`, `marchamomonto`, `marchamomontopartes`, `marchamofechapago`, `marchamomultainteres`,`marchamomontoneto`) VALUES (?,?,?,?,?,?,?)";
         

					  $stmt = $pdo ->prepare("SELECT MAX(marchamoid) AS marchamoid  FROM tbmarchamo");
						$stmt -> execute();
						$nextId = 1;

	        	if($row = $stmt->fetch()){
	        		$nextId = $row[0]+1;
	        	}

            $q = $pdo->prepare($sql);
						$q -> execute(array($nextId, $marchamo-> getIdVehiculo(), $marchamo -> getMonto() ,$marchamo -> getMontoPartes(), $marchamo -> getFechaPago(), $marchamo -> getcostoMultasInteres(), $marchamo -> getNeto()));

            Database::desconectar();
            header("Location: ../view/marchamoview.php");
            }
						
		}


		public function actualizarMarchamo($marchamo){

			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						//$sql = "UPDATE `tbmarchamo` SET `marchamomonto`=?,`marchamomontopartes`=?,`marchamofechapago`=?,`marchamomultainteres`=?,`marchamomontoneto`=? WHERE marchamoid = ?";
                        $sql = 'UPDATE `tbmarchamo` SET `marchamomonto`=?,`marchamomontopartes`=?,`marchamofechapago`=?,`marchamomultainteres`=?,`marchamomontoneto`=? WHERE `marchamoid` = ?';

            $q = $pdo->prepare($sql);
            $q -> execute(array(  $marchamo -> getMonto() ,$marchamo -> getMontoPartes(), $marchamo -> getFechaPago(), $marchamo -> getcostoMultasInteres(),  $marchamo -> getNeto(),$marchamo -> getMarchamoID()));
            Database::desconectar();
            header("Location: ../view/marchamoview.php");

		}

		public function eliminarMarchamo($idbus){

			// delete data
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM tbmarchamo WHERE marchamovehiculoid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($idbus));
        Database::desconectar();
        header("Location: ../view/marchamoview.php");

		}

		public function obtenerMarchamo($marchamo){

		}


	}

?>
