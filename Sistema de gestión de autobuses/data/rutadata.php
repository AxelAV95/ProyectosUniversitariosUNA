<?php 
	include_once 'data.php';
	include '../domain/Ruta.php';

	class RutaData extends Database{

		public function RutaData(){}

        
            public function validarDuplicado($codigo){
                $pdo = Database::conectar();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $consulta = 'select count(*) as total from tbruta where rutacodigo = ?';
                $result = $pdo->prepare($consulta);
                $result->bindParam(1,$codigo,PDO::PARAM_INT);
                $result->execute();
    
                if($result->fetchColumn()==0){ //si no existe el dato lo inserto
                     return false;
                }else{ //si ya existe el dato lo redirecciono para mostrar el mensaje
                     return true;
                }
            }
        


            public function insertarRuta($ruta){

            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $rutData = new RutaData();
            $stmt = $pdo ->prepare("SELECT MAX(rutaid) AS rutaid  FROM tbruta");
            $stmt -> execute();

            $nextId = 1;
        	if($row = $stmt->fetch()){
        		$nextId = $row[0]+1;
            }

            $mensaje = "La ruta ya se encuentra registrada.";

            $sql = "INSERT INTO `tbruta`( `rutaid`,`rutacodigo`, `rutalugarsalida`, `rutalugardestino`, `rutatarifaminima`, `rutatarifamaxima`, `rutatiempopromedio`) VALUES (?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);

            if($rutData->validarDuplicado($ruta->getCodigo())==true){
                header("Location: ../view/rutacrud.php?mensaje=$mensaje");
            }else{ 
                $q->execute(array($nextId, $ruta -> getCodigo(), $ruta -> getSalida(), $ruta -> getDestino(), $ruta -> getTarifaMinima(), $ruta -> getTarifaMaxima(), $ruta -> getTiempoPromedio()));
            }
            Database::desconectar();
            header("Location: ../view/rutacrud.php");
		}



		public function actualizarRuta($ruta){

			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $update = 'UPDATE `tbruta` SET `rutacodigo`=:rutacodigo,`rutalugarsalida`=:rutalugarsalida,`rutalugardestino`=:rutalugardestino,`rutatarifaminima`=:rutatarifaminima,`rutatarifamaxima`=:rutatarifamaxima,`rutatiempopromedio`=:rutatiempopromedio WHERE `rutaid` = :rutaid';
           
            $codigo = $ruta->getCodigo();
            $salida = $ruta->getSalida();
            $destino = $ruta->getDestino();
            $tarifaMi = $ruta->getTarifaMinima();
            $tarifaMa = $ruta->getTarifaMaxima();
            $tiempoPromedio = $ruta->getTiempoPromedio();
            $id = $ruta->getIdRuta();

            $q = $pdo->prepare($update);

            $q -> bindParam(':rutacodigo', $codigo, PDO::PARAM_STR);
            $q -> bindParam(':rutalugarsalida', $salida, PDO::PARAM_STR);
            $q -> bindParam(':rutalugardestino',$destino , PDO::PARAM_STR);
            $q -> bindParam(':rutatarifaminima',$tarifaMi , PDO::PARAM_STR);
            $q -> bindParam(':rutatarifamaxima',$tarifaMa , PDO::PARAM_STR);
            $q -> bindParam(':rutatiempopromedio',$tiempoPromedio , PDO::PARAM_STR);
            $q -> bindParam(':rutaid',$id , PDO::PARAM_STR);

            $q -> execute();

            Database::desconectar();
            header("Location: ../view/rutacrud.php");
			
        }
        


		public function eliminarRuta($id){
			
			// delete data
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM tbruta WHERE rutaid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::desconectar();
        header("Location: ../view/rutacrud.php");

		}

		public function obtenerRutas($ruta){
			
		}


	}

?>

