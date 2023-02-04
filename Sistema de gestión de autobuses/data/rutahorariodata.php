<?php 
	include_once 'data.php';
	include '../domain/RutaHorario.php';

	class RutahorarioData extends Database{

		public function RutahorarioData(){}

        public function insertarRutaHorario($horario){
			$rhdata = new RutahorarioData();
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if($rhdata -> validarHorarios($horario -> getRutaid(),$horario -> getTipodia(),$horario -> getIdavuelta())==true){
				header("Location: ../view/horariocrud.php?mensaje=Ya existe el horario");
			}else{
			
			//   $rhdata -> validarBuses($horario -> getRutaid(),$horario -> getBus(),$horario -> getHora(),$horario -> getTipodia(),$horario -> getIdavuelta());
            $stmt = $pdo ->prepare("SELECT MAX(rutahorarioid) AS rutahorarioid  FROM tbrutahorario");
             $stmt -> execute();
             $nextId = 1;
            
            if($row = $stmt->fetch()){
                $nextId = $row[0]+1;
            }

            $sql = "INSERT INTO `tbrutahorario`(`rutahorarioid`, `rutahorariorutaid`, `rutahorariotipodia`, `rutahorariohora`, `rutahorariobus` , `rutahorarioidavuelta`) VALUES (?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nextId,$horario->getRutaid(),$horario->getTipodia(),$horario->getHora(),$horario->getBus(),$horario->getIdavuelta()));

            //return $nextId;
            Database::desconectar();
           header("Location: ../view/horariocrud.php?mensaje=Horario Insertado con exito");
			}
        }

        public function insertarRutaHorario2($horario){
            $rhdata = new RutahorarioData();

            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $a = $horario -> getHorarioid(); 

			$sqlDelete = "DELETE FROM tbrutahorario WHERE rutahorarioid = $a";
            $qDelete = $pdo->prepare($sqlDelete);
            $qDelete->execute(array($a));
			//validarBuses($horario -> getRutaid(),$horario -> getBus(),$horario -> getHora(),$horario -> getTipodia(),$horario -> getIdavuelta());
            $stmt = $pdo ->prepare("SELECT MAX(rutahorarioid) AS rutahorarioid  FROM tbrutahorario");
             $stmt -> execute();
             $nextId = 1;
            
            if($row = $stmt->fetch()){
                $nextId = $row[0]+1;
            }

            $sql = "INSERT INTO `tbrutahorario`(`rutahorarioid`, `rutahorariorutaid`, `rutahorariotipodia`, `rutahorariohora`, `rutahorariobus` , `rutahorarioidavuelta`) VALUES (?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($a,$horario->getRutaid(),$horario->getTipodia(),$horario->getHora(),$horario->getBus(),$horario->getIdavuelta()));

            //return $nextId;
            Database::desconectar();
           header("Location: ../view/horariocrud.php?mensaje=Horario Actualizado con exito");
        }
		
		public function validarHorarios($rutaid,$tipodia,$idavuelta){
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = 'select count(*) as total from tbrutahorario where rutahorariorutaid = ? and rutahorariotipodia=? and rutahorarioidavuelta = ?';
            $result = $pdo->prepare($consulta);
            $result->bindParam(1,$rutaid,PDO::PARAM_INT);
			$result->bindParam(2,$tipodia,PDO::PARAM_STR);
			$result->bindParam(3,$idavuelta,PDO::PARAM_INT);
            $result->execute();

            if($result->fetchColumn()==0){ //si no existe el dato lo inserto
                 return false;
            }else{ //si ya existe el dato lo redirecciono para mostrar el mensaje
                 return true;
            }
        }
		
		public function validarBuses($bus,$hora,$tipodia,$idavuelta){
			$idavueltainversa = 0;
			if($idavuelta == 1){
				$idavueltainversa = 2;
			}else{
				$idavueltainversa = 1;
         }
         
			$pdo = Database::conectar();
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = "SELECT * FROM tbrutahorario WHERE  rutahorariotipodia={$tipodia}";
         $result = $pdo->prepare($consulta);
			$result->bindParam(1,$tipodia,PDO::PARAM_STR);
         $result -> execute();
         $message = "wrong answer";
         echo "<script type='text/javascript'>alert('$message');</script>";
		}
		
		public function actualizarHorario($horario){

			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE tbrutahorario SET rutahorariohora=? WHERE rutahorarioid = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($horario -> getHora(),$horario -> getHorarioid()));
            Database::desconectar();
            header("Location: ../view/horariocrud.php?mensaje=Horario actualizado con exito");
			
		}
		
		public function eliminarHorario($id){
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM tbrutahorario WHERE rutahorarioid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::desconectar();
        header("Location: ../view/horariocrud.php?mensaje=Horario eliminado con exito");

		}

		public function obtenerHorarios($horario){
			
		}


	}

?>
