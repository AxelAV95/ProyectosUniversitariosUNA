<?php 
	include_once 'data.php';
	include '../domain/Rutatarifa.php';

	class RutaTarifaData extends Database{

        public function RutaTarifaData(){}
            


            public function validar($rutaid){
                $pdo = Database::conectar();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $consulta = 'select count(*) as total from tbrutatarifa where rutatarifarutaid = ?';
                $result = $pdo->prepare($consulta);
                $result->bindParam(1,$rutaid,PDO::PARAM_INT);
                $result->execute();
    
                if($result->fetchColumn()<=1){ //si no existe el dato lo inserto
                     return false;
                }else{ //si ya existe el dato lo redirecciono para mostrar el mensaje
                     return true;
                }
            }


        public function insertarRutaTarifa($rutaTarifa,$rutaTarifa2){
            $rutData = new RutaTarifaData();
			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if($rutData -> validar($rutaTarifa -> getRutaid())==true){
				header("Location: ../view/rutatarifacrud.php?mensaje=Ya existe la subruta");
			}else{
            $stmt = $pdo ->prepare("SELECT MAX(rutatarifaid) AS rutatarifaid  FROM tbrutatarifa");
        	$stmt2 = $pdo -> prepare("SELECT `rutacodigo`FROM `tbruta` WHERE rutacodigo = ?");
            $stmt -> execute();
            $stmt2 -> execute(array($rutaTarifa->getRutaid()));
             
            $data = $stmt2->fetch(PDO::FETCH_ASSOC);
            $rutaTarifaRuta = $data['rutacodigo'];
            
        	$nextId = 1;
        	if($row = $stmt->fetch()){
        		$nextId = $row[0]+1;
            }
            $ida = 1;
            $vuelta = 2;

			$sql = "INSERT INTO `tbrutatarifa`( `rutatarifaid`,`rutatarifarutaid`,`rutatarifaidavuelta`, `rutatarifalugares`, `rutatarifamonto`) VALUES (?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q2 = $pdo->prepare($sql);

            $q->execute(array($nextId, $rutaTarifaRuta, $ida, $rutaTarifa -> getLugar(), $rutaTarifa -> getMontoCobrar()));
            $nextId++;
            $q2->execute(array($nextId, $rutaTarifaRuta, $vuelta, $rutaTarifa2 -> getLugar(), $rutaTarifa2 -> getMontoCobrar()));

        Database::desconectar();
        header("Location: ../view/rutatarifacrud.php?mensaje=Subruta insertada con exito");
        }
    }

    public function insertarRutaTarifa2($rutaTarifa,$rutaTarifa2){
        $rutData = new RutaTarifaData();
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $a = $rutaTarifa -> getRutaid();
        $sqlDelete = "DELETE FROM tbrutatarifa WHERE rutatarifarutaid = $a";
        $qDelete = $pdo->prepare($sqlDelete);
        $qDelete->execute(array($a));

        if($rutData -> validar($rutaTarifa -> getRutaid())==true){
            header("Location: ../view/rutatarifacrud.php?mensaje=Error.");
        }else{
        $stmt = $pdo ->prepare("SELECT MAX(rutatarifaid) AS rutatarifaid  FROM tbrutatarifa");
        $stmt2 = $pdo -> prepare("SELECT `rutacodigo`FROM `tbruta` WHERE rutacodigo = ?");
        $stmt -> execute();
        $stmt2 -> execute(array($rutaTarifa->getRutaid()));
         
        $data = $stmt2->fetch(PDO::FETCH_ASSOC);
        $rutaTarifaRuta = $data['rutacodigo'];
        
        $nextId = 1;
        if($row = $stmt->fetch()){
            $nextId = $row[0]+1;
        }
        $ida = 1;
        $vuelta = 2;
       
        $sql = "INSERT INTO `tbrutatarifa`( `rutatarifaid`,`rutatarifarutaid`,`rutatarifaidavuelta`, `rutatarifalugares`, `rutatarifamonto`) VALUES (?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q2 = $pdo->prepare($sql);

        $q->execute(array($nextId, $rutaTarifaRuta, $ida, $rutaTarifa -> getLugar(), $rutaTarifa -> getMontoCobrar()));
        $nextId++;
        $q2->execute(array($nextId, $rutaTarifaRuta, $vuelta, $rutaTarifa2 -> getLugar(), $rutaTarifa2 -> getMontoCobrar()));

    Database::desconectar();
    header("Location: ../view/rutatarifacrud.php?mensaje=Subruta Actualizada con exito");
    }
}

        public function actualizarRutaTarifa($rutaTarifa){

			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE tbrutatarifa SET rutatarifalugares=?,rutatarifamonto=? WHERE rutatarifaid = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($rutaTarifa -> getLugar(),$rutaTarifa -> getMontoCobrar(),$rutaTarifa -> getTarifaid()));
            Database::desconectar();
            header("Location: ../view/rutatarifacrud.php?mensaje=subruta actualizada con exito");
			
		}




        public function eliminarRutaTarifa($id){
			
			// delete data
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM tbrutatarifa WHERE rutatarifarutaid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::desconectar();
        header("Location: ../view/rutatarifacrud.php?mensaje=Subrutas eliminadas con exito");

		}

		public function obtenerRutaTarifa($rutatarifa){
			
		}




    }

?>