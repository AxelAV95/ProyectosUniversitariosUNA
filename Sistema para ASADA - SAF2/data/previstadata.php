<?php 
error_reporting(0);
include_once 'data.php';
	include '../domain/prevista.php';

class PrevistaData extends Database{

    public function PrevistaData(){

    }

    public function insertarPrevista($prevista){
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo ->prepare("SELECT MAX(previstaid) AS previstaid  FROM tbprevista");
         $sql = 'INSERT INTO `tbprevista`(`previstaid`, `previstaclienteid`, `previstasaldoanterior`, `previstaabonoactual`, `previstasaldoactual`) VALUES (?,?,?,?,?)';
        echo '<br>';
        $stmt -> execute();
        $nextId = 1;
        if($row = $stmt->fetch()){
            $nextId = $row[0]+1;
        }
        
            $q = $pdo->prepare($sql);
           
            
            $q->execute(array($nextId, $prevista->getIdCliente(),$prevista -> getSaldoActual(),$prevista ->getSaldoAnterior(),$prevista->getSaldoActual()));
            
            Database::desconectar();
            header("Location: ../view/previstaview.php?mensaje=1");

        }
        public function eliminarPrevista($id){
			
			// delete data
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM tbprevista WHERE previstaid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::desconectar();
      //  header("Location: ../view/empleadoview.php");

        }
        
        public function modificarPrevista($id, $prevista){
            $consulta = 'UPDATE `tbprevista` SET `previstaabonoactual`= ?, `previstasaldoactual`=?, `previstasaldoanterior`=? WHERE `previstaid` = ?';
            $sql = 'INSERT INTO `tbhistoricoprevista`(`historicoprevistaprevistaid`, `historicoprevistaclienteid`, `historicoprevistasaldoanterior`, `historicoprevistaabono`, `historicoprevistasaldoactual`, `historicoprevistafecha`) VALUES (?,?,?,?,?,?)';
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            date_default_timezone_set('America/Costa_Rica');
            $date = date("m.d.y");
            // $sql = "UPDATE customers  set name = ?, email = ?, mobile =? WHERE id = ?";
            $q = $pdo->prepare($consulta);
            $q->execute(array( $prevista->getAbonoActual(),$prevista->getSaldoActual(),$prevista->getSaldoAnterior(), $id));
            $p = $pdo->prepare($sql);
            $p->execute(array($id, $prevista->getIdCliente(),$prevista->getSaldoAnterior(),$prevista->getAbonoActual(),$prevista->getSaldoActual(),$date));
            Database::desconectar();
            header("Location: ../view/previstaview.php?mensaje=4");
			

        }
    }

?>