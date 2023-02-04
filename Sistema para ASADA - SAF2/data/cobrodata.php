<?php
    error_reporting(0);
    include_once 'data.php';
	include '../domain/cobro.php';

	class CobroData extends Database{

        public function CobroData(){

        }

        public function insertar($cobro){

            $cobroData = new CobroData();
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = 'INSERT INTO `tbcobro`(`cobroid`, `cobrofecha`, `cobroclienteid`, `cobroconcepto`, `cobroanio`, `cobromedidorid`, `cobrolecturaactual`, `cobrolecturaanterior`, `cobroconsumometroscubicos`, `cobrotarifabasica`, `cobrototalmetroscuadrados`, `cobroleyhidrante`, `cobrorecargo`, `cobrototalapagar`, `cobroestado`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';

            $stmt = $pdo ->prepare("SELECT MAX(cobroid) AS cobroid  FROM tbcobro");
            $stmt -> execute();

            $nextId = 1;
        	
        	if($row = $stmt->fetch()){
        		$nextId = $row[0]+1;
            }

            $medidorrepetido = $cobroData -> validarCobro($cobro->getMedidor(),$cobro->getAnio(),$cobro->getConceptoMes());

            if($medidorrepetido == false){
                $q = $pdo->prepare($consulta);
                $q->execute(array($nextId,$cobro->getFecha(),$cobro->getClienteID(),$cobro->getConceptoMes(),$cobro->getAnio(),$cobro->getMedidor(),$cobro->getLecturaActual(),$cobro->getLecturaAnterior(),$cobro->getMetrosCubicos(),$cobro->getTarifa(),$cobro->getMetrosCuadrados(),$cobro->getHidrante(),$cobro->getRecargo(),$cobro->getTotal(),$cobro->getEstado() ));
    
                Database::desconectar();
                header("Location: ../view/cobrosview.php?mensaje=1");
            }else{
                header("Location: ../view/cobrosview.php?mensaje=2");
            }
               

            
            
           
        }

        public function validarCobro($medidor,$anio,$mes){

            //select if(u.Febrero is null, 0, 1) Febrero from tbmediciongeneral u limit 10
            //TRUE; select if(`Enero` is null, 0, 1) from tbmediciongeneral WHERE AnioActual = 2018
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
            $sql = 'select count(*) from tbcobro WHERE cobromedidorid=:cobromedidorid and cobroanio=:cobroanio and cobroconcepto=:cobroconcepto';
            $stm = $pdo->prepare($sql);
           
            $stm->bindParam(':cobromedidorid', $medidor);
            $stm->bindParam(':cobroanio', $anio);
            $stm->bindParam(':cobroconcepto', $mes);
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